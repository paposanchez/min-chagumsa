<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Repositories\DiagnosisRepository;
use DB;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

        public function __invoke(Request $request){
                $where = Order::orderBy('orders.id', 'DESC')->whereIn('orders.status_cd',  [109]);

                $search_fields = [
                        "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name'=>'주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
                ];

                //기간 검색
                $trs = $request->get('trs');
                $tre = $request->get('tre');


                if($trs && $tre){
                        //시작일, 종료일이 모두 있을때
                        $where = $where->where(function($qry) use($trs, $tre){
                                $qry->where("diagnose_at", ">=", $trs)
                                ->where("diagnose_at", "<=", $tre);
                        })->orWhere(function($qry) use($trs, $tre){
                                $qry->where("diagnosed_at", ">=", $trs)
                                ->where("diagnosed_at", "<=", $tre);
                        });

                }elseif ($trs && !$tre){
                        //시작일만 있을때
                        $where = $where->where(function($qry) use($trs){
                                $qry->where("diagnose_at", ">=", $trs);
                        })->orWhere(function($qry) use($trs){
                                $qry->where("diagnosed_at", ">=", $trs);
                        });
                }else if(!$trs && $tre){
                        $where = $where->where(function($qry) use($tre){
                                $qry->where("diagnosed_at", "<=", $tre);
                        })->orWhere(function($qry) use($tre){
                                $qry->where("diagnosed_at", "<=", $tre);
                        });
                }

                //검색어 검색
                $sf = $request->get('sf'); //검색필드
                $s = $request->get('s'); //검색어

                if($sf && $s){
                        if($sf != "order_num"){
                                if(in_array($sf, ["car_number", "orderer_name", "orderer_mobile"])){
                                        $where = $where->where($sf, 'like', '%'.$s.'%');
                                }
                        }else{
                                $order_split = explode("-", $s);
                                if(count($order_split) == 2){
                                        $datekey = $order_split[0];
                                        $car_number = $order_split[1];

                                        $where = $where->where("datekey", $datekey)->where("car_number", $car_number);
                                }
                                else{
                                        $where = $where->where("datekey", $s)->orWhere("car_number", $s);
                                }
                        }
                }

                $entrys = $where->paginate(25);

                return view('admin.certificate.index', compact('search_fields', 'entrys', 'search_fields'));
        }



        public function edit($id)
        {
                $order = Order::where("status_cd", '>',107)->findOrFail($id);


                /**
                * 기본정보: 자동차등록증 / 차대번호 / 주행거리 / 색상 / 추가옵션
                * 주요외판: 전방 /    후방 / 좌측 / 우측 / 교환 / 부식
                * 주요내판 및 골격: 차량하단 / 엔진 / 교환 / 용접/판금 수리
                * 침수흔적: 실내악취 / 앞좌석 실내바닥 / 트런크 실내바닥 / 엔진 / 부식
                * 차량내외부 점검: 차량외판 / 차량실내점검
                * 주행테스트: 엔진작동상태 / 변속기 작동상태 / 브레이크작동상태 / 얼라인먼트 / 조향장치 작동상태 / 작동상태의견
                * 차량 작동상태 점검: 엔진 작동상태 / 변속기작동상태 / 브레이크작동상태 / 조향장치 작동상태 / 오일 등 누유상태
                * 차량 작동상태 점검2: 타이어 상태 / 엔진오일 상태 / 냉각수 상태 / 브레이크패드 상태 / 배터리 상태
                *
                */




                $diagnosis = new DiagnosisRepository();
                $entrys = $diagnosis->prepare($order->id)->get();

                if ($order->car) {
                        $car = $order->car;
                } else {
                        $car = $order->orderCar;
                }

                $grades = [
                        '' => '등급을 선택해주세요.', 'AA' => 'AA', 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'
                ];

                $select_color = Code::getSelectList('color_cd');
                $select_vin_yn = Code::getSelectList('yn');
                $select_transmission = Code::getSelectList("transmission");
                $select_fueltype = Code::getSelectList('fuel_type');
                $kinds = Code::getSelectList('kind_cd');
                $certificate_states = Code::getSelectList('certificate_state_cd');


                return view('admin.order.edit', compact('order', 'grades', 'kinds', 'certificate_states', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd', 'entrys', 'car'));
        }


        /**
        * 인증서 데이터 갱신
        * section==basic : 주문 및 차량정보. 해당 데이터에 대한 처리는 무조건 update만 존재한다. 대상 테이블: order, car, certificates
        * section==history : 이력정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
        * section==price: 가격정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
        * @param Request $request
        */
        public function update(Request $request, $id)
        {


                $section = $request->get('section');

                $order_where = Order::find($id);

                if ($order_where->status_cd == 109) {
                        return redirect()->back()->with('error', '발급완료된 인증서입니다.');
                }

                $certificates_where = Certificate::find($id);

                if (in_array($section, ['basic', 'history', 'price'])) {
                        if ($section == 'basic') {

                                $order_data = [
                                        "car_number" => $request->get('orders_car_number'),
                                        "mileage" => $request->get('orders_mileage'),
                                        "status_cd" => 108
                                ];


                                $car_data = [
                                        "brands_id" => $request->get("brands_id"),
                                        "models_id" => $request->get("models_id"),
                                        "details_id" => $request->get("details_id"),
                                        "grades_id" => $request->get("grades_id"),
                                        "vin_number" => $request->get('cars_vin_number'),
                                        "imported_vin_number" => $request->get('car_imported_vin_number'),
                                        "registration_date" => $request->get('cars_registration_date'),
                                        "exterior_color_cd" => $request->get('cars_exterior_color'),
                                        "interior_color_cd" => $request->get('cars_interior_color'),
                                        "year" => $request->get('cars_year'),
                                        "transmission_cd" => $request->get('cars_transmission_cd'),
                                        "displacement" => $request->get('cars_displacement'),
                                        "fuel_consumption" => $request->get('cars_fuel_consumption'),
                                        "engine_type" => $request->get("cars_engine_type"),
                                        "fueltype_cd" => $request->get("cars_fueltype_cd")
                                ];

                                $certificate_data = [
                                        'orders_id' => $order_where->id,
                                        'vin_yn_cd' => $request->get("certificates_vin_yn_cd"),
                                        'price' => $request->get('pst'),
                                        'history_owner' => $request->get('certificates_history_owner'),
                                        'history_maintance' => $request->get('certificates_history_maintance')
                                ];

                        } elseif ($section == 'history') {
                                $order_data = ["status_cd" => 108];


                                $car_data = [];

                                if ($certificates_where) {
                                        $certificate_data = [
                                                "history_insurance" => $request->get("certificates_history_insurance"),
                                                "history_purpose" => $request->get("certificates_history_purpose"),
                                                "history_garage" => $request->get("certificates_history_garage"),
                                        ];
                                } else {
                                        $certificate_data = null;
                                }


                        } else {
                                $order_data = ['status_cd' => 109]; //최종 발행함
                                $car_data = [];
                                $certificate_data = [
                                        "price" => $request->get("pst"),
                                        "vat" => $request->get("certificates_vat"),
                                        "new_car_price" => $request->get("certificates_new_car_price"),
                                        "basic_registraion" => $request->get("certificates_basic_registraion"),
                                        "basic_registraion_depreciation" => $request->get("certificates_basic_registraion_depreciation"),
                                        "basic_mounting_cd" => $request->get("certificates_basic_mounting_cd"),
                                        "basic_etc" => $request->get("certificates_basic_etc"),
                                        "usage_mileage_cd" => $request->get("certificates_usage_mileage_cd"),
                                        "usage_mileage_depreciation" => $request->get("certificates_usage_mileage_depreciation"),
                                        "usage_history_cd" => $request->get("certificates_usage_history_cd"),
                                        "usage_history_depreciation" => $request->get("certificates_usage_history_depreciation"),
                                        "performance_tire_cd" => $request->get("certificates_performance_tire_cd"),
                                        "performance_exterior_cd" => $request->get("certificates_performance_exterior_cd"),
                                        "performance_interior_cd" => $request->get("certificates_performance_interior_cd"),
                                        "performance_device_cd" => $request->get("certificates_performance_device_cd"),
                                        "performance_depreciation" => $request->get("certificates_performance_depreciation"),
                                        "special_flooded_cd" => $request->get("certificates_special_flooded_cd"),
                                        "special_fire_cd" => $request->get("certificates_special_fire_cd"),
                                        "special_fulllose_cd" => $request->get("certificates_special_fulllose_cd"),
                                        "special_remodel_cd" => $request->get("certificates_special_remodel_cd"),
                                        "special_etc_cd" => $request->get("certificates_special_etc_cd"),
                                        "special_depreciation" => $request->get("certificates_special_depreciation"),
                                        "valuation" => $request->get("certificates_valuation"),
                                        "opinion" => $request->get("certificates_opinion"),
                                ];
                        }

                        //DB처리
                        /**
                        * child table부터 처리 해야 하므로 car 또는 certificates 테이블 처리후 order를 처리해야 한다.
                        */


                        try {
                                DB::beginTransaction();

                                $order_car = $order_where->orderCar;
                                if (count($car_data) > 0) {
                                        $cars_id = $order_where->cars_id;

                                        $car_filter = array_filter(array_map('trim', $car_data));


                                        if ($cars_id) {
                                                $car_where = Car::find($cars_id);
                                        } else {
                                                $car_where = new Car();
                                        }

                                        foreach ($car_filter as $property => $value) {
                                                try {
                                                        $car_where->$property = $value;
                                                } catch (\Exception $e) {
                                                        //                            dd($property, $e->getMessage(), $car_where);
                                                }
                                        }

                                        //                $car_where->update($car_filter);
                                        $car_where->save();

                                        $order_data['cars_id'] = $car_where->id;
                                }

                                if (count($certificate_data) > 0) {

                                        $certificates_filter = array_filter(array_map('trim', $certificate_data));


                                        if (!$certificates_where) {
                                                $certificates_where = new Certificate();
                                        }

                                        foreach ($certificates_filter as $property => $value) {
                                                $certificates_where->$property = $value;
                                        }

                                        $certificates_where->save();

                                }
                                if (count($order_data) > 0) {

                                        $order_filter = array_filter(array_map('trim', $order_data));
                                        $order_where->update($order_filter);
                                        $order_where->save();
                                }

                                DB::commit();

                                return redirect()->back()->with('success', '인증서 정보가 갱신되었습니다');

                        } catch (\Exception $e) {
                                DB::rollBack();

                                return redirect()->back()->with('error', '인증서 정보가 갱신이 실패하였습니다.<br>' . $e->getMessage());
                        }


                }


        }

}
