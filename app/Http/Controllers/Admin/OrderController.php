<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendSms;
use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Code;
use App\Models\Brand;
use App\Models\Detail;
use App\Models\Grade;
use App\Models\Item;
use App\Models\Models;
use App\Models\ScTran;
use App\Models\PaymentCancel;
use App\Models\Purchase;

use App\Repositories\DiagnosisRepository;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Redirect;


use Mockery\Exception;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        $where = Order::where('status_cd', ">=", 100)->whereNotIn('status_cd', [101]);
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
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre)
                    ->orWhere(function ($qry) use ($trs, $tre) {
                        $qry->where("updated_at", ">=", $trs)
                            ->where("updated_at", "<=", $tre);
                    });
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs)
                    ->orWhere(function ($qry) use ($trs) {
                        $qry->where("updated_at", ">=", $trs);
                    });
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


        $engineers = Role::find(5)->users->pluck('name', 'id');

        return view('admin.order.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'engineers', 'status_cd', 'sf', 's', 'tre', 'trs', 'status_cd'));
    }

    public function show($id)
    {

        $order = Order::findOrFail($id);

        $payment = Payment::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $payment_cancel = PaymentCancel::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $car = $order->car;

        $brands = Brand::select('id', 'name')->get();

        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')->groupBy('area')->whereNotNull('aliance_id')->get();
        $engineers = Role::find(5)->users->pluck('name', 'id');
        $technicians = Role::find(6)->users->pluck('name', 'id');
        return view('admin.order.show', compact('order', 'payment', 'payment_cancel', 'car', 'brands', 'garages', 'engineers', 'technicians'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $select_color = Helper::getCodeSelectArray(Code::getCodesByGroup('color_cd'), 'color_cd', '외부색상을 선택해 주세요.');

        $select_vin_yn = Helper::getCodeSelectArray(Code::getCodesByGroup('yn'), 'yn', '차대번호 동일성을 확인해 주세요.');
        $select_transmission = Helper::getCodeSelectArray(Code::getCodesByGroup("transmission"), 'transmission', '변속기 타입을 선택해 주세요.');
        $select_fueltype = Helper::getCodeSelectArray(Code::getCodesByGroup('fuel_type'), 'fuel_type', '사용연료 타입을 선택해 주세요.');

        //인증서가 없는경우 form 처리를 위하여
        if (isset($order->certificates) === false) {
            $order->certificates = new Certificate();
        }


        $diagnosis = new DiagnosisRepository();
        $entrys = $diagnosis->prepare($order->id)->get();

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
        $car = $order->car;
        $grades = [
            '' => '등급을 선택해주세요.', 'AA' => 'AA', 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'
        ];

        $kinds = Helper::getCodeSelectArray(Code::getCodesByGroup('kind_cd'), 'kind_cd', '차종을 선택해 주세요.');

        $certificate_states = Code::getSelectList('certificate_state_cd');


        return view('admin.order.edit', compact('order', 'grades', 'kinds', 'certificate_states', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd', 'entrys', 'car'));
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'order_status' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', "필수파라미터가 입력되지 않았습니다.");
        }


        $status_cd = $request->get("order_status");
        $id = $request->get('id');

        if ($status_cd) {
            //주문상태 변경
            /**
             * todo: 주문취소의 경우 pg 결제와 연동 필요함.
             */
            if (in_array($status_cd, [100, 104, 108])) {
                $row = Order::find($id);
                if ($row) {

                    $purchase = Purchase::find($id);

                    $current_status = $row->status_cd;
                    if (($current_status <= 105 && $status_cd == 100) || ($current_status > 105 && $status_cd > 105)) {

                        $row->status_cd = $status_cd;
                        if ($status_cd == 100) {
                            //결제취소 연동 및 refund_status 업데이트처리함.
                            //1. 결제취소 처리
                            $payment_cancel = PaymentCancel::OrderBy('id', 'DESC')->whereIn('resultCd', [2001, 2002])
                                ->where('orders_id', $id)->first();
                            if ($payment_cancel) {
                                //PG 결제취소는 완료하였으나 order의 결제상태를 수정 안됨
                                if (in_array($payment_cancel->resultCd, [2001, 2002])) {
                                    if ($current_status != 100) {
                                        //결제취소 PG연동은 완료 되었으나, order 상태가 변경 안됨.
                                        $row->status_cd = 100;
                                        $row->refund_status = 1;
                                        $row->save();

                                        //purchases 업데이트
                                        if ($purchase) {
                                            $purchase->status_cd = 100;
                                            $purchase->save();
                                        }
                                    }
                                    $message = "결제취소를 완료 하였습니다.";
                                }
                            } else {
                                //결제취소 진행

                                $cancelAmt = $row->item->price;

                                $payment = Payment::OrderBy('id', 'DESC')->whereIn('resultCd', [3001, 4000, 4100])->where('orders_id', $id)->first();
                                if ($payment) {
                                    $tid = $payment->tid; //PG 거래ID

                                    $payment_cancel = new PaymentCancel();
                                    $cancel_process = $payment_cancel->paymentCancelProcess($id, $cancelAmt, $tid);

                                    if (in_array($cancel_process->result_cd, [2001, 2002])) {

                                        if (isset($cancel_process->PayMethod)) $payment_cancel->payMethod = $cancel_process->PayMethod;
                                        if (isset($cancel_process->CancelDate)) $payment_cancel->cancelDate = $cancel_process->CancelDate;
                                        if (isset($cancel_process->CancelTime)) $payment_cancel->cancelTime = $cancel_process->CancelTime;
                                        if (isset($cancel_process->result_cd)) $payment_cancel->resultCd = $cancel_process->result_cd;
                                        $cancel_process->cancelAmt = $cancelAmt;
                                        $payment_cancel->orders_id = $id;
                                        $payment_cancel->save();

                                        //결제취소완료 또는 진행 중. 상태 업데이트 및 결제취소 로그 기록
                                        $row->status_cd = 100;
                                        $row->refund_status = 1;
                                        $row->save();

                                        //purchases 업데이트
                                        if ($purchase) {
                                            $purchase->status_cd = 100;
                                            $purchase->save();
                                        }

                                        return Redirect::back()->with('success', "결제취소 요청완료 및 주문상태가 업데이트 되었습니다.");
                                    } else {
                                        return Redirect::back()->with('error', "PG사의 결제취소 오류로 주문상태를 업데이트하지 못하였습니다.<br>상세 메세지: " . $cancel_process->result_msg);
                                    }

                                } else {

                                    //결제승인 내역이 없음.
                                    //결제내역을 없으나, 해당 주문에 대한 취소가 불가함
                                    return Redirect::back()->with('error', "결제정보가 누락되어 해당 주문의 상태를 변경할 수 없습니다.");
                                }


                            }

                        } else {

                            // 주문상태가 진단이후이므로 진단 이후 상태로 모두 변경 가능함.
                            if (in_array($status_cd, [106, 107, 108, 109])) {
                                $row->status_cd = $status_cd;
                                $row->save();
                            }
                        }

                    } else {
                        return Redirect::back()->with('error', "주문상태를 확인해주세요.<br>현재 주문상태: " . Helper::getCodeName($row->status_cd));
                    }

                    return Redirect::back()->with('success', "주문상태가 업데이트 되었습니다.");
                } else {
                    return Redirect::back()->with('error', '해당 주문이 없습니다.');
                }
            }
        }

    }

    /**
     * 보험사고 이력 이미지 등록
     * @param Request $request
     * @return array
     */
    public function insuranceFile(Request $request)
    {

        $result = [
            'success' => '',
            'msg' => '',
            'id' => '',
            'img_path' => ''
        ];

        $id = $request->get('id');
        if ($id) {

            try {
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
                    if ($certificate_row) {

                        $certificate_row->history_insurance_file = 1;

                        $certificate_row->save();

                        $result["success"] = true;
                        $result["msg"] = "Done";
                        $result["img_path"] = "/order/insurance-file-view/" . $id;
                        $result["id"] = $id;
                    } else {
                        //보험사고이력 이미지 등록 실패
                        $result["success"] = false;
                        $result["msg"] = "등록 실패";
                    }

                } else {
                    $result['success'] = false;
                    $result['msg'] = "upload fail";
                }

            } catch (\Exception $e) {
                $result['success'] = false;
                $result['msg'] = "upload fail: " . $e->getMessage();
            }

        } else {
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
    public function insuranceFileView($id)
    {

        $image = public_path('assets/img/noimage.png');

        if ($id) {
            $path_prefix = storage_path('app/upload');
            $path = '/insurance/' . $id;

            $image_path = $path_prefix . '/' . $path . '/insurance-' . $id;
            //            dd($image_path);
            if (is_file($image_path)) {
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
    public function history(Request $request)
    {
        $method = $request->get('method');
        $id = $request->get('id');
        $data = $request->get('data');

        $result = [
            'success' => false, 'msg' => '', "data" => ""
        ];

        if ($method && $id && $data) {
            $where = Certificate::findOrFail($id);
            if ($where) {
                $history = $where->$method;

                if ($history) {

                    $history_list = json_decode($where->$method);
                    array_push($history_list, $data);
                    $filter_list = json_encode(array_unique($history_list));

                    $where->$method = $filter_list;

                } else {
                    $filter_list = json_encode([$data]);
                    $where->$method = $filter_list;
                }
                $where->save();

                $result["success"] = true;
                $result["msg"] = "Done";
                $result["data"] = json_decode($filter_list, true);
            } else {
                $result["success"] = false;
                $result["msg"] = "해당 인증서가 없습니다.";
            }
        } else {
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

    public function reservationChange(Request $request)
    {
        try {


            $order_id = $request->get('order_id');
            $date = $request->get('date');
            $time = $request->get('time');

            $reservation_date = new DateTime($date . ' ' . $time . ':00:00');

            $reservation = Reservation::where('orders_id', $order_id)->first();
            $reservation->reservation_at = $reservation_date->format('Y-m-d H:i:s');
            $reservation->save();


            $order = Order::find($order_id);
            $order->status_cd = 103;
            $order->save();

            //기존 진단데이터 삭제
            Diagnosis::where('orders_id', $order->id)->delete();

            //문자, 메일 송부하기
            $user_info = User::find($order->orderer_id);
            $enter_date = $reservation->reservation_at;
            $daily = array('일','월','화','수','목','금','토');
            $week_day = $daily[date('w', strtotime($enter_date))];
            $garage_info = User::find($order->garage_id);
            $garage = $garage_info->name;
            $garage_extra = UserExtra::where('users_id', $garage_info->id)->first();
            $address = $garage_extra->address;
            $tel = $garage_extra->phone;
            $price = $order->item->price;

            try {
                //메일전송
                $mail_message = [
                    'enter_date' => $enter_date, 'garage' => $garage, 'price' => $price
                ];
                Mail::send(new \App\Mail\Ordering($user_info->email, "차검사 차량입고 예약시간이 변경되었습니다.", $mail_message, 'message.email.change-reservation-user'));
            } catch (\Exception $e) {
                return response()->json($e->getMessage());
            }

            try{
                // SMS전송
//                $bcs_message = view('message.sms.change-reservation-bcs', compact('enter_date', 'week_day', 'garage', 'address', 'tel'));
                $user_message = view('message.sms.change-reservation-user', compact('enter_date', 'week_day', 'garage', 'address', 'tel', 'price'));
                event(new SendSms($order->orderer_mobile, '', $user_message));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }
            //발송 끝


            return response()->json('success');
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }

    }



    //  예약확정
    public function confirmation($order_id)
    {
        try {
            $reservation = Reservation::where('orders_id', $order_id)->first();
            $reservation->update([
                'updated_id' => Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);

            $order = Order::find($order_id);
            $order->status_cd = 104;
            $order->save();

            //기존 진단데이터 삭제
            Diagnosis::where('orders_id', $order->id)->delete();

            $diagnosis = new DiagnosisRepository();
            $diagnosis->prepare($order->id)->create($order->id);

            //문자, 메일 송부하기
            $user_info = User::find($order->orderer_id);
            $enter_date = $reservation->reservation_at;
            $daily = array('일','월','화','수','목','금','토');
            $week_day = $daily[date('w', strtotime($enter_date))];
            $garage_info = User::find($order->garage_id);
            $garage = $garage_info->name;
            $garage_extra = UserExtra::where('users_id', $garage_info->id)->first();
            $address = $garage_extra->address;
            $tel = $garage_extra->phone;

            try{
                //메일전송
                $mail_message = [
                    'enter_date'=>$enter_date, 'week_day' => $week_day, 'garage' => $garage, 'address' => $address, 'tel' => $tel
                ];
                Mail::send(new \App\Mail\Ordering($user_info->email, "고객님의 차량입고 예약시간이 확정되었습니다.", $mail_message, 'message.email.confirmation-ordering-user'));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }

            try{
                // SMS전송
                $user_message = view('message.sms.confirmation-ordering-user', compact('enter_date', 'week_day', 'garage', 'address', 'tel'));
                event(new SendSms($order->orderer_mobile, '', $user_message));
            }catch (\Exception $e){
                return response()->json($e->getMessage());
            }
            //발송 끝


            return response()->json(true);
        } catch (Exception $ex) {
            return response()->json(false);
        }

    }


    public function userUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required'
        ], [],
            [
                'name' => '주문자명',
                'mobile' => '주문자연락처'
            ]);
        $order = Order::findOrFail($request->get('id'));
        $order->orderer_name = $request->get('name');
        $order->orderer_mobile = $request->get('mobile');
        $order->save();

        return redirect()->back()->with('success', '주문정보가 수정되었습니다.');

    }

    public function carUpdate(Request $request)
    {
        $this->validate($request, [
            'car_number' => 'required',

        ], [],
            [
                'car_number' => '차량번호',
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->car_number = $request->get('car_number');
        $order->flooding_state_cd = $request->get('flooding_state_cd');
        $order->accident_state_cd = $request->get('accident_state_cd');
        $order->save();
        return redirect()->back()->with('success', '차정보가 수정되었습니다.');
    }

    public function bcsUpdate(Request $request)
    {
        $this->validate($request, [
            'garages' => 'required',
            'engineer' => 'required'
        ], [],
            [
                'garages' => '차량번php호',
                'engineer' => '엔지니어'
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->garage_id = $request->get('garages');
        $order->engineer_id = $request->get('engineer');
        $order->save();

        return redirect()->back()->with('success', 'BCS정보가 수정되었습니다.');
    }

    public function techUpdate(Request $request)
    {
        $this->validate($request, [
            'technician' => 'required',

        ], [],
            [
                'technician' => '차량번php호',
            ]);
        $order = Order::findOrFail($request->get('id'));
        $order->technist_id = $request->get('technician');
        $order->save();

        return redirect()->back()->with('success', '기술사정보가 수정되었습니다.');
    }

    public function orderCancel(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'order_id' => 'required'
        ]);


        if ($validate->fails()) {
            return redirect()->back()->with('error', '주문번호가 누락되었습니다.');
        }

        $order_id = $request->get('order_id');


        $order = Order::find($order_id);
        $event = '';
        if ($order) {

            $purchase = Purchase::find($order->purchase_id);

            if (in_array($order->status_cd, [101, 102, 103, 104])) {
                $cancelAmt = $order->item->price;
                //                $cancelAmt = 1000; //todo 가격부문을 위에 것으로 변경해야 함.


                $payment = Payment::OrderBy('id', 'DESC')->whereIn('resultCd', [3001, 4000, 4100])
                    ->where('orders_id', $order_id)->first();

                if ($payment) {
                    $tid = $payment->tid;//거래아이디
                    //        $moid = $payment->moid;//상품주문번호
                    $cancelMsg = "고객요청";
                    $partialCancelCode = 0; //전체취소
                    $dataType = "json";


                    $payment_cancel = PaymentCancel::OrderBy('id', 'DESC')->whereIn('resultCd', [2001, 2002])
                        ->where('orders_id', $order_id)->first();
                    if ($payment_cancel) {
                        if (in_array($payment_cancel->resultCd, [2001, 2002])) {
                            if ($order->status_cd != 100) {
                                //결제취소 PG연동은 완료 되었으나, order 상태가 변경 안됨.
                                $order->status_cd = 100;
                                $order->refund_status = 1;
                                $order->save();
                            }
                            $event = 'success';
                            $message = trans('web/mypage.cancel_complete');

                        }
                    } else {
                        $payment_cancel = new PaymentCancel();
                        $cancel_process = $payment_cancel->paymentCancelProcess($order_id, $cancelAmt, $tid);

                        if (in_array($cancel_process->result_cd, [2001, 2002])) {

                            //                            dd($cancel_process);

                            if (isset($cancel_process->PayMethod)) $payment_cancel->payMethod = $cancel_process->PayMethod;
                            if (isset($cancel_process->CancelDate)) $payment_cancel->cancelDate = $cancel_process->CancelDate;
                            if (isset($cancel_process->CancelTime)) $payment_cancel->cancelTime = $cancel_process->CancelTime;
                            if (isset($cancel_process->result_cd)) $payment_cancel->resultCd = $cancel_process->result_cd;
                            $payment_cancel->cancelAmt = $cancelAmt;
                            $payment_cancel->orders_id = $order_id;
                            $payment_cancel->save();

                            //결제취소완료 또는 진행 중. 상태 업데이트 및 결제취소 로그 기록
                            $order->status_cd = 100;
                            $order->refund_status = 1;
                            $order->save();

                            //purchases 업데이트
                            if ($purchase) {
                                $purchase->status_cd = 100;
                                $purchase->save();
                            }

                            $message = trans('web/mypage.cancel_complete');
                            $event = 'success';
                        } else {
                            //                            dd($cancel_process);
                            $message = "해당 결제내역에 대한 결제취소를 진행할 수 없습니다.<br>";
                            if (isset($cancel_process->result_msg)) $message .= "결제취소 거부 사유: " . $cancel_process->result_msg;
                            $event = 'error';
                        }


                    }


                } else {
                    if (in_array($order->status_cd, [101, 102, 103, 104])) {
                        //주문상태가 결제 완료가 아니며, 주문신청/예약확인/입고대기/입고 상태까지만 주문 취소를 함.
                        $order->status_cd = 100;
                        $order->refund_status = 1;
                        $order->save();


                        //purchases 업데이트
                        if ($purchase) {
                            $purchase->status_cd = 100;
                            $purchase->save();
                        }

                        $message = trans('web/mypage.cancel_complete');
                        $event = 'success';

                    } else {

                        $code = Code::find($order->status_cd);

                        $message = "차량 입고 완료 및 차량 상태 점검의 경우 주문을 취소할수 없습니다.<br>입고 이전 주문이 취소 불가일경우 관리자에게 문의해 주세요.";
                        if ($code) {
                            $message .= "<br>현재 상태: " . trans('code.order_state.' . $code->name);
                        }
                        $event = 'error';
                    }

                }
            }//주문취소가 가능한 상태코드값
            else {
                $message = "주문취소는 차량 입고 이후에는 취소 불가입니다.<br>자세한 사항은 관리자에게 문의해 주세요.";
                $event = 'error';
            }//주문 상태가 입고완료로 진행되어 처리못함을 표시함.

        } else {
            $message = "해당 주문을 확인할 수 없습니다.<br>관리자에게 문의해 주세요.";
            $event = 'error';
        }

        if($event == 'success'){
            //문자, 메일 송부하기
            $orderer_name = $order->orderer_name;
            $order_number = $order->getOrderNumber();
            try {
                //메일전송
                $mail_message = [
                    'enter_date' => $order->reservation->reservation_at, 'garage' => $order->garage, 'price' => $order->item->price
                ];
                Mail::send(new \App\Mail\Ordering($order->orderer->email, "제목", $mail_message, 'message.email.cancel-ordering-user'));
            } catch (\Exception $e) {
//                return response()->json($e->getMessage());
            }

            try {
                // SMS전송

                $bcs_message = view('message.sms.cancel-ordering-bcs', compact('orderer_name', 'order_number'));
                $user_message = view('message.sms.');
                event(new SendSms($order->orderer_mobile, '[차검사 주문 취소]',$user_message));
                event(new SendSms($order->garage->user_extra->ceo_mobile, '[차검사 주문 취소]', $bcs_message));
            } catch (\Exception $e) {
//                return response()->json($e->getMessage());
            }
            //발송 끝

        }

        return redirect()->route('order.show', $order_id)
            ->with($event, $message);
    }


    public function getSection(Request $request)
    {


        $users = \App\Models\Role::find(4)->users;
        $sections = [];
        foreach ($users as $user) {
            if ($user->user_extra->area == $request->get('garage_area')) {
                $sections[$user->user_extra->section] = $user->user_extra->section;
            }

        }

        return response()->json(array_keys($sections));

    }

    public function getAddress(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $garages = [];
        foreach ($users as $user) {
            if ($user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
                $garages[$user->id] = $user->name;
            }

        }
        return response()->json($garages);

    }

    public function getFullAddress(Request $request)
    {
        try {
            $garage_id = $request->get('garage_id');
            $full_address = UserExtra::where('users_id', $garage_id)->first()->address;
            if (!$full_address) {
                $full_address = new UserExtra();
            }


            return response()->json($full_address);
        } catch (\Exception $ex) {
            return response()->json('error');
        }
    }

    public function getEngineer(Request $request)
    {
        try {
            $users = Role::findOrFail(5)->users;
            $engineers = [];

            foreach ($users as $user) {
                if (isset($user->user_extra->users_id)) {
                    if ($user->user_extra->users_id == $request->get('garage_id')) {
                        $engineers[$user->id] = $user->name;
                    }
                }

                if (isset($user->user_extra->garage_id)) {
                    if ($user->user_extra->garage_id == $request->get('garage_id')) {
                        $engineers[$user->id] = $user->name;
                    }
                }
            }

            return response()->json(array_unique($engineers));
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }

    }

    public function diagnosing(Request $request){
        try{
            $order_id = $request->get('order_id');
            $engineer_id = $request->get('engineer_id');

            $order = Order::findOrFail($order_id);

            $order->engineer_id = $engineer_id;
            $order->diagnose_at = new DateTime('now');
            $order->status_cd = 106;
            $order->save();

            return response()->json('success');
        }catch(\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }


}
