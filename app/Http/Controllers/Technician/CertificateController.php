<?php

namespace App\Http\Controllers\Technician;

use App\Models\Car;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Repositories\CertificateRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\SendSms;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{

    /**
     * @param Request $request
     * 인증서 인덱스 페이지
     * 주문상태, 검색기간, 검색어를 필터링하여 주문 검색
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where = Order::where('status_cd', ">=", 107)->orderBy('status_cd')->orderBy('created_at', 'DESC');

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');


        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("diagnose_at", ">=", $trs)
                    ->where("diagnose_at", "<=", $tre);
            })->orWhere(function ($qry) use ($trs, $tre) {
                $qry->where("diagnosed_at", ">=", $trs)
                    ->where("diagnosed_at", "<=", $tre);
            });

        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where = $where->where(function ($qry) use ($trs) {
                $qry->where("diagnose_at", ">=", $trs);
            })->orWhere(function ($qry) use ($trs) {
                $qry->where("diagnosed_at", ">=", $trs);
            });
        } else if (!$trs && $tre) {
            $where = $where->where(function ($qry) use ($tre) {
                $qry->where("diagnosed_at", "<=", $tre);
            })->orWhere(function ($qry) use ($tre) {
                $qry->where("diagnosed_at", "<=", $tre);
            });
        }

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if ($sf && $s) {
            if ($sf != "order_num") {
                if (in_array($sf, ["car_number", "orderer_name", "orderer_mobile"])) {
                    $where = $where->where($sf, 'like', '%' . $s . '%');
                }
            } else {
                $order_split = explode("-", $s);
                if (count($order_split) == 2) {
                    $datekey = $order_split[1];
                    $car_number = $order_split[0];
                    $date_array = str_split($datekey, 2);

                    $date = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                    $next_day = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                    $where = $where->where('car_number', $car_number)
                        ->where('created_at', '>=', $date)
                        ->where('created_at', '<=', $next_day);

                } else {
                    if (strlen($s) > 6) {
                        $where = $where->where('car_number', $s);
                    } else {
                        $date_array = str_split($s, 2);
                        $date = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                        $next_day = Carbon::create('20' . '' . $date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                        $where = $where->where('created_at', '>=', $date)->where('created_at', '<=', $next_day);
                    }
                }
            }
        }

        $entrys = $where->paginate(25);

        return view('technician.certificate.index', compact('search_fields', 'entrys', 'search_fields', 'status_cd', 's', 'sf', 'trs', 'tre'));
    }

    /**
     * @param Request $reqeust
     * @param Int $order_id
     * @param string $page
     * 해당 주문에 대한 인증서 미리보기 페이지
     * @return string
     */
    public function show(Request $reqeust, $order_id, $page = 'summary')
    {
        if (!in_array($page, ['performance', 'price', 'history', 'summary'])) {
            $page = 'summary';
        }

        $handler = new CertificateRepository();
        return $handler->prepareWithId($order_id)->generate($page);
    }

    /**
     * @param Request $request
     * @param Int $order_id
     * 인증서 수정 및 작성 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $order_id)
    {
        $order = Order::where("status_cd", '>', 107)->findOrFail($order_id);

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

        return view('technician.certificate.edit', compact('order', 'grades', 'kinds', 'certificate_states', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd', 'car', 'standard_states', 'operation_state_cd'));
    }

    /**
     * @param Request $request
     * 인증서 데이터 갱신
     * section==basic : 주문 및 차량정보. 해당 데이터에 대한 처리는 무조건 update만 존재한다. 대상 테이블: order, car, certificates
     * section==history : 이력정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * section==price: 가격정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->get('order_id');

        $order_where = Order::find($id);

        if ($order_where->status_cd == 109) {
            return redirect()->back()->with('error', '발급완료된 인증서입니다.');
        }

        $certificates_where = Certificate::where('orders_id', $order_where->id)->first();
        if (!$certificates_where) {
            return redirect()->back()->with('error', '잘못된 인증서입니다. 관리자에게 문의하세요.');
        }

        //주문정보 갱신, 검토중
        $order_data = [
            "car_number" => $request->get('orders_car_number'),
            "mileage" => $request->get('orders_mileage'),
        ];

        //차량정보 갱신
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

        //인증서 정보 갱신
        $certificate_data = [
            "orders_id" => $order_where->id,
            "vin_yn_cd" => $request->get("certificates_vin_yn_cd"),
            "history_owner" => $request->get('certificates_history_owner'),
            "history_insurance" => $request->get("certificates_history_insurance"),
            "history_purpose" => $request->get("certificates_history_purpose"),
            "history_garage" => $request->get("certificates_history_garage"),
            "price" => $request->get("pst"),
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
            "performance_depreciation" => $request->get("performance_depreciation"), // 차량성능상태 감가금액
            "history_depreciation" => $request->get('history_depreciation'), // 사용이력 감가금액 ( 현재 없음 )
            "basic_depreciation" => $request->get("basic_depreciation"), // 기본가격 감가금액 ( 현재없음 )
            "special_flooded_cd" => $request->get("certificates_special_flooded_cd"),
            "special_fire_cd" => $request->get("certificates_special_fire_cd"),
            "special_fulllose_cd" => $request->get("certificates_special_fulllose_cd"),
            "special_remodel_cd" => $request->get("certificates_special_remodel_cd"),
            "special_etc_cd" => $request->get("certificates_special_etc_cd"),
            "special_depreciation" => $request->get("special_depreciation"),
            "valuation" => $request->get("certificates_valuation"),
            "opinion" => $request->get("certificates_opinion"),
            "grade" => $request->get('grade_state_cd'),
            "usage_flood_cd" => $request->get('certificates_usage_flood_cd'),
            "flood_comment" => $request->get('flood_comment'),
            "history_comment" => $request->get('history_comment'),
            "pictures" => $request->get('selecte_picture_id')
        ];

        /**
         * DB처리
         * child table부터 처리 해야 하므로 car 또는 certificates 테이블 처리후 order를 처리해야 한다.
         */

        try {
            DB::beginTransaction();

            if (count($car_data) > 0) {
                $cars_id = $order_where->cars_id;

                $car_filter = array_filter($car_data, function($value){
                    return ($value !== null && $value !== false && $value !== '');
                });

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

                $car_where->save();

                $order_data['cars_id'] = $car_where->id;
            }

            if (count($certificate_data) > 0) {

                $certificates_filter = array_filter($certificate_data, function($value){
                    return ($value !== null && $value !== false && $value !== '');
                });

                if (!$certificates_where) {
                    $certificates_where = new Certificate();
                }

                foreach ($certificates_filter as $property => $value) {
                    $certificates_where->$property = $value;
                }

                $certificates_where->save();

            }
            if (count($order_data) > 0) {

                $order_filter = array_filter($order_data, function($value){
                    return ($value !== null && $value !== false && $value !== '');
                });
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

    /**
     * @param Request $request
     * @param Int $id
     * 인증서 발급 시작
     * 주문상태를 검토중으로 변경
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $order = Order::where("status_cd", 107)->findOrFail($id);
            $order->technist_id = Auth::user()->id;
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

    /**
     * @param Request $request
     * 인증서 발급처리
     * 주문상태를 인증서 발급 완료로 변경
     * 고객에게 메일, 문자 전송
     * @return \Illuminate\Http\JsonResponse
     */
    public function issue(Request $request)
    {
        $obj = $request->get('params');
        $params = [];
        parse_str($obj, $params);

        $validate = Validator::make($params, [
            'cars_vin_number' => 'required',
            'car_imported_vin_number' => 'nullable',
            'cars_registration_date' => 'required',
            'cars_exterior_color' => 'required',
            'cars_year' => 'required',
            'cars_transmission_cd' => 'required',
            'cars_displacement' => 'required',
            'cars_fuel_consumption' => 'required',
            'cars_engine_type' => 'required',
            'cars_fueltype_cd' => 'required',
            'passenger' => 'required',
            'kind_cd' => 'required',

            'certificates_new_car_price' => 'required',
            'pst' => 'required',
            'basic_depreciation' => 'required',
            'certificates_basic_registraion' => 'required',
            'basic_registraion_depreciation' => 'required',
            'certificates_basic_etc' => 'required',
            'history_depreciation' => 'required',
            'certificates_usage_mileage_cd' => 'required',
            'certificates_usage_mileage_depreciation' => 'required',
            'certificates_usage_history_cd' => 'required',
            'certificates_usage_history_depreciation' => 'required',
            'certificates_usage_flood_cd' => 'required',
            'performance_depreciation' => 'required',
            'performance_exterior_cd' => 'required',
            'performance_interior_cd' => 'required',
            'performance_plugin_cd' => 'required',
            'performance_broken_cd' => 'required',
            'performance_engine_cd' => 'required',
            'performance_transmission_cd' => 'required',
            'performance_power_cd' => 'required',
            'performance_steering_cd' => 'required',
            'performance_braking_cd' => 'required',
            'performance_electronic_cd' => 'required',
            'performance_tire_cd' => 'required',
            'performance_driving_cd' => 'required',
            'special_depreciation' => 'required',
            'certificates_valuation' => 'required',
            'grade_state_cd' => 'required',
            'certificates_opinion' => 'required'
        ],[],[
            'cars_vin_number' => '차대번호',
            'cars_registration_date' => '최초등록',
            'cars_exterior_color' => '외부색상',
            'cars_year' => '연식',
            'cars_transmission_cd' => '변속기',
            'cars_displacement' => '배기량',
            'cars_fuel_consumption' => '연비',
            'cars_engine_type' => '엔진타입',
            'cars_fueltype_cd' => '사용연료',
            'passenger' => '승차인원',
            'kind_cd' => '차종',
            'certificates_vin_yn_cd' => '차대번호 동일성확인',
            'certificates_new_car_price' => '산차출고가격',
            'pst' => '기준가격(P)',
            'basic_depreciation' => '기본평가(A)',
            'certificates_basic_registraion' => '등록일보정 옵션',
            'basic_registraion_depreciation' => '등록일보정 감가금액',
            'certificates_basic_etc' => '색상등 기타 감가금액',
            'history_depreciation' => '주요이력평가(B)',
            'certificates_usage_mileage_cd' => '주행거리 옵션',
            'certificates_usage_mileage_depreciation' => '주행거리 감가금액',
            'certificates_usage_history_cd' => '사고/수리이력 옵션',
            'certificates_usage_history_depreciation' => '사고/수리이력 감가금액',
            'certificates_usage_flood_cd' => '침수점검',
            'performance_depreciation' => '종합진단결과(C) 감가금액',
            'performance_exterior_cd' => '차량외부점검',
            'performance_interior_cd' => '차량내부점검',
            'performance_plugin_cd' => '전장장착품작동상태',
            'performance_broken_cd' => '고장진단',
            'performance_engine_cd' => '원동기',
            'performance_transmission_cd' => '변속기',
            'performance_power_cd' => '동력전달',
            'performance_steering_cd' => '조향장치 및 현가장치',
            'performance_braking_cd' => '제동장치',
            'performance_electronic_cd' => '전기장치',
            'performance_tire_cd' => '휠&타이어',
            'performance_driving_cd' => '주행테스',
            'special_depreciation' => '특별요인(S)',
            'certificates_valuation' => '평가금액',
            'grade_state_cd' => '등급평가',
            'certificates_opinion' => '종합의견'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        try {
            DB::beginTransaction();
            $order_id = $params['order_id'];
            $order = Order::findOrFail($order_id);
            $order->status_cd = 109;
            $order->save();

            //문자, 메일 송부하기
            $order_number = $order->getOrderNumber();
            $certificate_url = 'http://certi.chagumsa.com/'.$order_number;
            $user = User::find($order->orderer_id);

            try {
                //메일전송
                $mail_message = [
                    'order_number' => $order_number, 'certificate_url' => $certificate_url
                ];
                Mail::send(new \App\Mail\Ordering($user->email, "차검사 인증서 발급이 완료되었습니다.", $mail_message, 'message.email.fin-certification-user'));
            } catch (\Exception $e) {
            }

            try {
                // SMS전송
                $user_message = view('message.sms.fin-certification-user', compact('order_number', 'certificate_url'))->render();
                event(new SendSms(Auth::user()->mobile, '', $user_message));
            } catch (\Exception $e) {
            }
            //발송 끝
            DB::commit();
            return response()->json('success');
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage());
        }
    }


}
