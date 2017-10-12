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
use App\Repositories\CertificateRepository;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{

    public function index(Request $request)
    {
        $where = Order::whereIn('orders.status_cd', [107, 108, 109]);

        // 정렬옵션
        if ($request->get('sort') == 'order_num') {
            $where
                ->orderBy('car_number', 'ASC')
                ->orderBy('created_at', 'ASC');
        } else {
            $where->orderBy('id', 'DESC');
        }

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs) {
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs);
            });
        }

        if ($tre) {
            $where->where(function ($qry) use ($tre) {
                $qry->where("created_at", "<=", $tre);
            });
        }

        $search_fields = [
            "order_id" => "주문아이디",
            "order_num" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "engineer_name" => "엔지니어명",
            "bcs_name" => "BCS명",
            "tech_name" => "기술사명"
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'order_id':
                    $where->where('id', 'like', '%' . $s . '%');
                    break;
                case 'car_number':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'order_num':
                    list($car_number, $datekey) = explode("-", $s);

                    if ($car_number && $datekey) {
                        $order_date = Carbon::createFromFormat('ymd', $datekey);
                        $where
                            ->where('car_number', $car_number)
                            ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                            ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                            ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'));
                    }
                    break;
                case 'orderer_name':
                    $where->where('orderer_name', 'like', '%' . $s . '%');
                    break;
                case 'orderer_mobile':
                    $where->where('orderer_mobile', 'like', '%' . $s . '%');
                    break;
                case 'engineer_name':
                    $where->whereHas('engineer', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'bcs_name':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
            }
        }

        $entrys = $where->paginate(25);

        return view('admin.certificate.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys'));
    }

    public function show(Request $reqeust, $order_id, $page = 'summary')
    {
        if (!in_array($page, ['performance', 'price', 'history', 'summary'])) {
            $page = 'summary';
        }

        $handler = new CertificateRepository();
        return $handler->prepareWithId($order_id)->generate($page);
    }


    public function edit(Request $reqeust, $order_id)
    {
        $order = Order::where("status_cd", 108)->findOrFail($order_id);


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


        // $diagnosis = new DiagnosisRepository();
        // $entrys = $diagnosis->prepare($order->id)->get();

        if ($order->car) {
            $car = $order->car;
        } else {
            $car = $order->orderCar;
        }


        $grades = Code::getSelectList('grade_state_cd');
        $select_color = Code::getSelectList('color_cd');
        $select_vin_yn = Code::getSelectList('yn');
        $select_transmission = Code::getSelectList("transmission");
        $select_fueltype = Code::getSelectList('fuel_type');
        $kinds = Code::getSelectList('kind_cd');
        $certificate_states = Code::getSelectList('certificate_state_cd');
        $operation_state_cd = Code::getSelectList('operation_state_cd');
        $standard_states = Code::getSelectList('standard_cd');

        return view('admin.certificate.edit', compact('order', 'grades', 'kinds', 'certificate_states', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd', 'car', 'standard_states', 'operation_state_cd'));
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

        $certificates_where = Certificate::where('orders_id', $order_where->id)->first();
        if (!$certificates_where) {
            return redirect()->back()->with('error', '잘못된 인증서입니다. 관리자에게 문의하세요.');
        }

        $order_data = [
            "car_number" => $request->get('orders_car_number'),
            "mileage" => $request->get('orders_mileage'),
            "status_cd" => 108
        ];


        $car_data = [
            "brands_id" => $order_where->car->brands_id,
            "models_id" => $order_where->car->models_id,
            "details_id" => $order_where->car->details_id,
            "grades_id" => $order_where->car->grades_id,
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
            "fueltype_cd" => $request->get("cars_fueltype_cd"),
            "passenger" => $request->get("passenger"),
            "kind_cd" => $request->get("kind_cd"),
            "exterior_color_etc" => $request->get('car_exterior_color_etc') ? $request->get('car_exterior_color_etc') : '',
            "fueltype_etc" => $request->get('car_fueltype_etc') ? $request->get('car_fueltype_etc') : ''
        ];

        $certificate_data = [
            "orders_id" => $order_where->id,
            "vin_yn_cd" => $request->get("certificates_vin_yn_cd"),
//            "history_owner" => $request->get('certificates_history_owner'),
            "history_maintance" => $request->get('certificates_history_maintance'),
            "history_insurance" => $request->get("certificates_history_insurance"),
            "history_purpose" => $request->get("certificates_history_purpose"),
            "history_garage" => $request->get("certificates_history_garage"),
            "price" => $request->get("pst"),
            //            "vat" => $request->get("certificates_vat"),
            "new_car_price" => $request->get("certificates_new_car_price"),
            "basic_registraion" => $request->get("certificates_basic_registraion"),
            "basic_registraion_depreciation" => $request->get("basic_registraion_depreciation"),
            "basic_etc" => $request->get("certificates_basic_etc"),
            "usage_mileage_cd" => $request->get("certificates_usage_mileage_cd"),
            "usage_mileage_depreciation" => $request->get("certificates_usage_mileage_depreciation"),
            "usage_history_cd" => $request->get("certificates_usage_history_cd"),
            "usage_history_depreciation" => $request->get("certificates_usage_history_depreciation"),

            "performance_exterior_cd" => $request->get("performance_exterior_cd"),          //차량외부점검
            "performance_interior_cd" => $request->get('performance_interior_cd'),          //차량내부점검
            "performance_plugin_cd" => $request->get('performance_plugin_cd'),              //전장장착품작동상태
            "performance_broken_cd" => $request->get("performance_broken_cd"),              //고잔진단
            "performance_engine_cd" => $request->get('performance_engine_cd'),              //원동기
            "performance_transmission_cd" => $request->get('performance_transmission_cd'),  //변속기
            "performance_power_cd" => $request->get('performance_power_cd'),                //동력전달
            "performance_steering_cd" => $request->get('performance_steering_cd'),          //조향장치 및 현가장치
            "performance_braking_cd" => $request->get('performance_braking_cd'),            //제동장치
            "performance_electronic_cd" => $request->get('performance_electronic_cd'),      //전기장치
            "performance_tire_cd" => $request->get('performance_tire_cd'),                  //휠&타이어
            "performance_driving_cd" => $request->get('performance_driving_cd'),            //주행테스트
//            "performance_flooded_cd" => $request->get("performance_flooded_cd"),
//            "performance_consumption_cd" => $request->get("performance_consumption_cd"),
//            "performance_exteriortest_cd" => $request->get('performance_exteriortest_cd'),
//            "performance_accident_cd" => $request->get('performance_accident_cd'),
//            "performance_interiortest_cd" => $request->get('performance_interiortest_cd'),

            "exterior_comment" => $request->get('exterior_comment'),
            "interior_comment" => $request->get('interior_comment'),
            "plugin_comment" => $request->get('plugin_comment'),
            "broken_comment" => $request->get('broken_comment'),
            "engine_comment" => $request->get('engine_comment'),
            "transmission_comment" => $request->get('transmission_comment'),
            "power_comment" => $request->get('power_comment'),
            "steering_comment" => $request->get('steering_comment'),
            "braking_comment" => $request->get('braking_comment'),
            "electronic_comment" => $request->get('electronic_comment'),
            "tire_comment" => $request->get('tire_comment'),
            "driving_comment" => $request->get('driving_comment'),
//            "flooded_comment" => $request->get('flooded_comment'),
//            "consumption_comment" => $request->get('consumption_comment'),
//            "accident_comment" => $request->get('accident_comment'),
//            "interiortest_comment" => $request->get('interiortest_comment'),
//            "exteriortest_comment" => $request->get('exteriortest_comment'),

            "performance_depreciation" => $request->get("performance_depreciation"), // 차량성능상태 감가금액
            "history_depreciation" => $request->get('history_depreciation'), // 사용이력 감가금액 ( 현재 없음 )
            "basic_depreciation" => $request->get("basic_depreciation"), // 기본가격 감가금액 ( 현재없음 )
            //            "special_depreciation" => $request->get("special_depreciation"), // 특별요인 감가금액 ( 현재없음 )
            "special_flooded_cd" => $request->get("certificates_special_flooded_cd"),
            "special_fire_cd" => $request->get("certificates_special_fire_cd"),
            "special_fulllose_cd" => $request->get("certificates_special_fulllose_cd"),
            "special_remodel_cd" => $request->get("certificates_special_remodel_cd"),
            "special_etc_cd" => $request->get("certificates_special_etc_cd"),
            "special_depreciation" => $request->get("special_depreciation"),
            "valuation" => $request->get("certificates_valuation"),
            "opinion" => $request->get("certificates_opinion"),
            "grade" => $request->get('grade_state_cd'),
            "usage_flood_cd" => $request->get('certificates_usage_flood_cd')
        ];


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
                        return response()->json($e->getMessage());
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

    public function assign(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $order = Order::where("status_cd", 107)->findOrFail($id);
            //                        $order->engineer_id = Auth::id();
            $order->technist_id = Auth::id();
            $order->status_cd = 108;
            $order->save();

            $certificate = new Certificate();
            $certificate->orders_id = $order->id;
            $certificate->save();

            DB::commit();

            return response()->json(true);


        } catch (Exception $e) {
            DB::rollBack();

            return response()->json($e->getMessage());

        }
    }

    public function issue(Request $request)
    {

        try {
            $order_id = $request->get('order_id');
            $order = Order::findOrFail($order_id);
            $order->status_cd = 109;
            $order->save();

            return response()->json('success');
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

}
