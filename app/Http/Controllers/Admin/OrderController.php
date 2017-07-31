<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Car;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use App\Repositories\DiagnosisRepository;

use Carbon\Carbon;
use App\Models\ScTran;

class OrderController extends Controller
{

    public function index(Request $request){

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name'=>'주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];

        $where = Order::orderBy('orders.id', 'DESC');

        //주문상태
        $status_cd = $request->get('status_cd');
        if($status_cd){
            $where = $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if($trs && $tre){
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function($qry) use($trs, $tre){
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre);
            })->orWhere(function($qry) use($trs, $tre){
                $qry->where("updated_at", ">=", $trs)
                    ->where("updated_at", "<=", $tre);
            });
        }elseif ($trs && !$tre){
            //시작일만 있을때
            $where = $where->where(function($qry) use($trs){
                $qry->where("created_at", ">=", $trs);
            })->orWhere(function($qry) use($trs){
                $qry->where("updated_at", ">=", $trs);
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
            }
        }


        $entrys = $where->paginate(25);


        return view('admin.order.index', compact('search_fields', 'entrys'));
    }

    public function show($id){
        $order = Order::findOrFail($id);

        $car = $order->car;



        return view('admin.order.detail', compact('order'));
    }

    public function edit($id){

        $order = Order::findOrFail($id);
        $select_color = Helper::getCodeSelectArray(Code::getCodesByGroup('color_cd'), 'color_cd', '외부색상을 선택해 주세요.');

        $select_vin_yn = Helper::getCodeSelectArray(Code::getCodesByGroup('yn'), 'yn', '차대번호 동일성을 확인해 주세요.');
        $select_transmission = Helper::getCodeSelectArray(Code::getCodesByGroup("transmission"),'transmission', '변속기 타입을 선택해 주세요.');
        $select_fueltype = Helper::getCodeSelectArray(Code::getCodesByGroup('fuel_type'), 'fuel_type', '사용연료 타입을 선택해 주세요.');

        //인증서가 없는경우 form 처리를 위하여
        if(isset($order->certificates) === false){
            $order->certificates = new Certificate();
        }

        /*
        //todo 정검 및 기본 정보 데이터 조회 및 연동 필요함 ( diagnosis part )
        // url: http://api.cargumsa.com/diagnosis?order_id=4&user_id=5

        $client = new Client();
        $query_string = [
            "order_id" => $order->id,
            "user_id" => 5
//            "user_id" => Auth::user()->id
        ];
        $response = $client->request('GET', 'http://api.cargumsa.com/diagnosis?order_id=4&user_id=5', [
//            'query' => $query_string
        ]);

        $json_data = json_decode($response->getBody(), true);
        */
        $diagnosis = new DiagnosisRepository();
        $entrys = $diagnosis->prepare($order->id)->get();

        /**
         * 기본정보: 자동차등록증 / 차대번호 / 주행거리 / 색상 / 추가옵션
         * 주요외판: 전방 /	후방 / 좌측 / 우측 / 교환 / 부식
         * 주요내판 및 골격: 차량하단 / 엔진 / 교환 / 용접/판금 수리
         * 침수흔적: 실내악취 / 앞좌석 실내바닥 / 트런크 실내바닥 / 엔진 / 부식
         * 차량내외부 점검: 차량외판 / 차량실내점검
         * 주행테스트: 엔진작동상태 / 변속기 작동상태 / 브레이크작동상태 / 얼라인먼트 / 조향장치 작동상태 / 작동상태의견
         * 차량 작동상태 점검: 엔진 작동상태 / 변속기작동상태 / 브레이크작동상태 / 조향장치 작동상태 / 오일 등 누유상태
         * 차량 작동상태 점검2: 타이어 상태 / 엔진오일 상태 / 냉각수 상태 / 브레이크패드 상태 / 배터리 상태
         *
         */





        return view('admin.order.edit', compact('order', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd', 'entrys'));
    }

    public function store(Request $request){
        $order_status = $request->get("order_status");
        $id = $request->get('id');

        if($order_status){
            //주문상태 변경
            /**
             * todo: 주문취소의 경우 pg 결제와 연동 필요함.
             */
            if(in_array($order_status, [100, 104, 108])){
                $row = Order::findOrFail($id);
                if($row){
                    $row->status_cd = $order_status;
                    $row->save();
                    return Redirect::back();
                }
            }
        }

    }

    /**
     * 보험사고 이력 이미지 등록
     * @param Request $request
     * @return array
     */
    public function insuranceFile(Request $request){

        $result = [
            'success' => '',
            'msg' => '',
            'id' => '',
            'img_path' => ''
        ];

        $id = $request->get('id');
        if($id){

            try{
                $uploader_name = "insurance_file";
                $uploader = new Receiver($request);
                $response = $uploader->receive($uploader_name, function ($file) use ($id) {
                    // 파일이동

                    $path_prefix = storage_path('app/upload');
                    $path = '/insurance/' . $id;
//                    if(!is_dir($path_prefix)){
//                        mkdir($path_prefix, 0777, true);
//                    }

//                    $file_new_name = "insurance-" . $id . '.' . $file->getClientOriginalExtension();
                    $file_new_name = "insurance-" . $id;

                    $file->move($path_prefix . $path, $file_new_name);

                    try {
                        $file_size = $file->getClientSize();
                        $result = 'OK';
                    } catch (RuntimeException $ex) {
                        $file_size = 0;
                        $result = 'FAIL';
                    }

                    return [
                        'original' => $file->getClientOriginalName(),
                        'source' => $file_new_name,
                        'path' => $path,
                        'size' => $file_size,
                        'extension' => $file->getClientOriginalExtension(),
                        'mime' => $file->getClientMimeType(),
                        'hash' => md5($file),
                        'path_prefix' => $path_prefix,
                        'path' => $path,
                        'file_new_name' => $file_new_name,
                        'result' => $result
                    ];
                });

//                $result['raw'] = $response;

                // 업로드 성공시
                if ($response['result']) {
                    $certificate_row = Certificate::findOrFail($id);
                    if($certificate_row){

                        $certificate_row->history_insurance_file = 1;

                        $certificate_row->save();

                        $result["success"] = true;
                        $result["msg"] = "Done";
                        $result["img_path"] = "/order/insurance-file-view/". $id;
                        $result["id"] = $id;
                    }else{
                        //보험사고이력 이미지 등록 실패
                        $result["success"] = false;
                        $result["msg"] = "등록 실패";
                    }

                }else{
                    $result['success'] = false;
                    $result['msg'] = "upload fail";
                }

            }catch (\Exception $e){
                $result['success'] = false;
                $result['msg'] = "upload fail: ".$e->getMessage();
            }

        }else{
            $result['success'] = false;
            $result['msg'] = 'id not found';
        }
        return $result;
    }

    /**
     * 보험사고 이력 이미지 열람
     * @param int $id
     * @return binarary
     */
    public function insuranceFileView($id){

        $image = public_path('assets/img/noimage.png');

        if($id){
            $path_prefix = storage_path('app/upload');
            $path = '/insurance/' . $id;

            $image_path = $path_prefix . '/' . $path . '/insurance-' . $id;
//            dd($image_path);
            if(is_file($image_path)){
                $image = $image_path;
            }
        }

        return response()->file($image);


    }

    /**
     * 용도변경이력, 차고지이력 등록 갱신
     * {["경기도 용인시", "경기도 파주시"]}
     * @param Request $request
     * @return array
     */
    public function history(Request $request){
        $method = $request->get('method');
        $id = $request->get('id');
        $data = $request->get('data');

        $result = [
            'success' => false, 'msg' => '', "data" => ""
        ];

        if($method && $id && $data){
            $where = Certificate::findOrFail($id);
            if($where){
                $history = $where->$method;

                if($history){

                    $history_list = json_decode($where->$method);
                    array_push($history_list, $data);
                    $filter_list = json_encode(array_unique($history_list));

                    $where->$method = $filter_list;

                }else{
                    $filter_list = json_encode([$data]);
                    $where->$method = $filter_list;
                }
                $where->save();

                $result["success"] = true;
                $result["msg"] = "Done";
                $result["data"] = json_decode($filter_list, true);
            }else{
                $result["success"] = false;
                $result["msg"] = "해당 인증서가 없습니다.";
            }
        }else{
            //비정상 값 입력
            $result["success"] = false;
            $result["msg"] = "필수 파라미터 입력 오류입니다.";
        }
        return $result;
    }

    /**
     * 인증서 데이터 갱신
     * section==basic : 주문 및 차량정보. 해당 데이터에 대한 처리는 무조건 update만 존재한다. 대상 테이블: order, car, certificates
     * section==history : 이력정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * section==price: 가격정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * @param Request $request
     */
    public function update(Request $request, $id){


        $section = $request->get('section');

        if(in_array($section, ['basic', 'history', 'price'])){
            if($section == 'basic'){
                $order_data = [
                    "car_number" => $request->get('orders_car_number'),
                    "mileage" => $request->get('	orders_mileage'),
                ];
                $car_data = [
                    "vin_number" => $request->get('cars_vin_number'),
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
                    'vin_yn_cd' => $request->get("certificates_vin_yn_cd")
                ];
            }
            elseif ($section == 'history'){
                $order_data = [];
                $car_data = [];
                $certificate_data = [
                    "history_insurance" => $request->get("history_insurance"),
                    "history_owner" => $request->get("certificates_history_owner"),
                    "history_maintance" => $request->get("certificates_history_maintance"),
                    "history_purpose" => $request->get("certificates_history_purpose"),
                    "history_garage" => $request->get("certificates_history_garage"),
                ];

            }else{
                $order_data = [];
                $car_data = [];
                $certificate_data = [
                    "pst" => $request->get("pst"),
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

            $order_where = Order::findOrFail($id);

            if(count($car_data) > 0){
                $cars_id = $order_where->cars_id;
                $car_where = Car::findOrFail($cars_id);
                if($car_where){

                    $car_filter = array_filter(array_map('trim', $car_data));
                    $car_where->update($car_filter);
                    $car_where->save();
                }
            }

            if(count($certificate_data) > 0){

                $certificates_filter = array_filter(array_map('trim', $certificate_data));

                $certificates_where = Certificate::findOrFail($id);
                if($id){
                    $certificates_where->update($certificates_filter);
                }else{
                    $certificates_where = new Certificate();

                    $certificates_where->insert($certificates_filter);
                }

                try{
                    $certificates_where->save();
                }catch (\Exception $e){
//                    dd($id, $e->getMessage());
                }

            }

            if(count($order_data) > 0){

                $order_filter = array_filter(array_map('trim', $order_data));
                $order_where->update($order_filter);
                $order_where->save();
            }

            return \redirect()->route("order.edit", ["id" => $id])->with('success', '인증서 정보가 갱신되었습니다');
        }
    }

}
