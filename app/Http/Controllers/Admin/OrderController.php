<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendSms;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarNumber;
use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Diagnosis;
use App\Models\Grade;
use App\Models\Item;
use App\Models\Models;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Permission;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Code;
use App\Models\PaymentCancel;
use App\Models\Purchase;
use App\Models\Warranty;
use App\Repositories\DiagnosisRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Mockery\Exception;


class OrderController extends Controller
{
    /**
     * @param Request $request
     * 주문 인덱스 페이지
     * 주문상태, 검색기간, 검색어를 필터링하여 주문 검색
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where = Order::whereNotIn('status_cd', [101]);

        // 정렬옵션
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');
        if($sort){
            if($sort == 'status'){
                $where->orderBy('status_cd', $sort_orderby);
            }else{
                $where->orderBy($sort, $sort_orderby);
            }
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
        //검색조건
        $search_fields = [
            "order_num" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "email" => '이메일'
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
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
            }
        }
        $entrys = $where->paginate(25);

        //엔지니어 목록
        $engineers = Role::find(5)->users->pluck('name', 'id');

        return view('admin.order.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'engineers', 'status_cd', 'sort_orderby' ,'sort'));
    }

    /**
     * @param Int $id
     * 주문 상세보기 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //주문 seq번호에 의한 주문 검색
        $order = Order::findOrFail($id);
        //결제정보
        $payment = Payment::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $payment_cancel = PaymentCancel::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        //주문에 대한 차량 정보
        $car = $order->car;
        //전체 정비소 리스트
        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')
            ->join('users', function ($join) {
                $join->on('user_extras.users_id', 'users.id')
                    ->where('users.status_cd', 1);
            })
            ->orderBy('area', 'asc')->groupBy('area')->whereNotNull('aliance_id')->whereNotNull('area')->get();

        //전체 엔지니어 리스트
        $engineers = Role::find(5)->users->pluck('name', 'id');
        //전체 기술사 리스트
        $technicians = Role::find(6)->users->pluck('name', 'id');
        return view('admin.order.show', compact('order', 'payment', 'payment_cancel', 'car', 'garages', 'engineers', 'technicians'));
    }


    public function create(Request $request, $page = 1)
    {
        $user = Auth::user();

        $users = Role::find(2)->users->pluck('name', 'name');
        $brands = Brand::select('id', 'name')
            ->orderByRaw('CASE WHEN id = 5 THEN 8 WHEN id = 6 THEN 9 WHEN id = 4 OR id = 19 OR id = 38 OR id = 74 OR id = 44 THEN 5 WHEN id = 1 OR id = 28 OR id = 45 THEN 1 ELSE 3 END ASC, name ASC')
            ->get();
        $areas = UserExtra::whereNotIn('users_id', [4])
            ->join('users', function ($join) {
                $join->on('user_extras.users_id', 'users.id')
                    ->where('users.status_cd', 1);
            })
            ->orderBy(DB::raw('field(area, "서울시")'), 'desc')->orderBy('area', 'asc')->groupBy('area')->whereNotNull('aliance_id')->whereNotNull('area')->get();
        $sel_hours = [
            '09' => '9시', '10' => '10시', '11' => '11시', '12' => '12시', '13' => '13시', '14' => '14시', '15' => '15시', '16' => '16시', '17' => '17시'
        ];

        return view('admin.order.create', compact('user', 'users', 'areas', 'brands', 'sel_hours'));
    }

    public function store(Request $request){
        try{
            if($request->get('diag_param')){
                $this->validate($request, [
                    'orderer_name' => 'required|min:2',
                    'orderer_mobile' => 'required|min:9',
                    'car_number' => 'required',
                    'vin_number' => 'required',
                    'brands_id' => 'required',
                    'models_id' => 'required',
                    'details_id' => 'required',
                    'grades_id' => 'required',
                    'areas' => 'required',
                    'sections' => 'required',
                    'garages' => 'required',
                    'reservation_at' => 'required',
                    'sel_time' => 'required'
                ], [],
                    [
                        'orderer_mobile' => '주문자 휴대폰번호',
                        'car_number' => '차량번호',
                        'vin_number' => '차대번호',
                        'grades' => '차량 정보',
                        'garages' => '대리점 정보',
                        'reservation_at' => '예약날짜',
                        'sel_time' => '예약시간'
                    ]);
            }else{
                $this->validate($request, [
                    'orderer_name' => 'required|min:2',
                    'orderer_mobile' => 'required|min:9',
                    'order_number' => 'required',
                    'order_number_confirm' => 'required'
                ], [],
                    [
                        'orderer_id' => '주문자',
                        'orderer_mobile' => '주문자 휴대폰번호',
                        'order_number' => '주문번호'
                    ]);

            }

            DB::beginTransaction();
            $user = Auth::user();
            $input = $request->all();

            //car 생성
            $car = Car::create($input);

            //order 생성
            $order = Order::create([
                'car_number' => $request->get('car_number'),
                'orderer_id' => $user->id,
                'orderer_name' => $request->get('orderer_name'),
                'orderer_mobile' => $request->get('orderer_mobile'),
                'status_cd' => '102',
                'flooding_state_cd' => $request->get('flood') ? 1 : 0,
                'accident_state_cd' => $request->get('accident') ? 1 : 0,
            ]);

            //car_number 생성
            $car_number = CarNumber::create([
                'orders_id'=> $order->id,
                'cars_id'=> $car->id,
                'vin_number'=> $request->get('vin_number'),
                'car_number'=> $request->get('car_number')
            ]);

            //order_item 생성 및 가격 계산
            $price = 0;
            foreach ($request->get('items') as $item){
                $order_item = new OrderItem();
                $order_item->orders_id = $order->id;
                $order_item->group_id = $order->id;
                if($car->brand->car_type == 'n'){
                    $order_item->car_sort = 'N';
                    // 국산은 1, 3, 5
                    if($item == 'diagnosis'){
                        $order_item->items_id = 1;
                        $order_item->price = Item::find(1)->price;
                        $order_item->save();
                        $diagno_item_id = $order_item->id;
                    }else if($item == 'certificate'){
                        $order_item->items_id = 3;
                        $order_item->price = Item::find(3)->price;
                        $order_item->save();
                        $certi_item_id = $order_item->id;
                    }else{
                        $order_item->items_id = 5;
                        $order_item->price = Item::find(5)->price;
                        $order_item->save();
                        $ew_item_id = $order_item->id;
                    }
                }else{
                    $order_item->car_sort = 'F';
                    // 외산은 2, 4, 7
                    if($item == 'diagnosis'){
                        $order_item->items_id = 2;
                        $order_item->price = Item::find(2)->price;
                        $order_item->save();
                        $diagno_item_id = $order_item->id;
                    }else if($item == 'certificate'){
                        $order_item->items_id = 4;
                        $order_item->price = Item::find(4)->price;
                        $order_item->save();
                        $certi_item_id = $order_item->id;
                    }else{
                        $order_item->items_id = 7;
                        $order_item->price = Item::find(7)->price;
                        $order_item->save();
                        $ew_item_id = $order_item->id;
                    }

                }
                $price = $price + $order_item->price;
            }


            //purchase 생성
            $purchase = new Purchase();
            $purchase->amount = $price;
            if($user->hasRole("admin")){
                $purchase->type = 22;
            }else{
                $purchase->type = 23;
            }
            $purchase->status_cd = 102;
            $purchase->save();

            //order 갱신
            $order->update([
                'car_numbers_id' => $car_number->id,
                'group_id' => $order->id,
                'purchase_id' => $purchase->id
            ]);


            //diagnosis 생성
            if($request->get('diag_param')){
                $reservation_date = new DateTime($request->get('reservation_at') . ' ' . $request->get('sel_time') . ':00:00');
                $diagnosis = new Diagnosis();
                $diagnosis->orders_id = $order->id;
                $diagnosis->order_items_id = $diagno_item_id;
                $diagnosis->car_numbers_id = $car_number->id;
                $diagnosis->status_cd = 112;
                $diagnosis->garage_id = $request->get('garages');
                $diagnosis->reservation_at = $reservation_date->format('Y-m-d H:i:s');
                $diagnosis->save();
            }
            if($request->get('order_number')){
                list($car_number, $datekey) = explode("-", $request->get('order_number'));
                $order_date = Carbon::createFromFormat('ymd', $datekey);
                $diag_order = Order::where('car_number', $car_number)
                    ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                    ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                    ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))
                    ->whereNotIn('status_cd', ['101', '100'])->first();
            }

            //certificate 생성
            if(!$request->get('diag_param')){
                if($request->get('certi_param')){
                    $certificate = Certificate::create([
                       'orders_id' => $order->id,
                       'order_items_id' => $certi_item_id,
                       'car_numbers_id' => $car_number->id,
                       'status_cd' => 112,
                       'diagnosis_id' => $diag_order->diagnosis->id,
                    ]);
                }
                //warranty 생성
                if($request->get('ew_param')){
                    $warranty = Warranty::create([
                        'orders_id' => $order->id,
                        'order_items_id' => $certi_item_id,
                        'car_numbers_id' => $car_number->id,
                        'status_cd' => 112,
                        'diagnosis_id' => $diag_order->diagnosis->id,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', '주문정보가 수정되었습니다.');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', '에러가 발생햇습니다.');

        }
    }


    /**
     * @param Request $request
     * 고객 정보 변경
     * 차량번호, 침수여부, 사고여부 변경
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Request $request
     * 고객의 차량 정보 변경
     * @return \Illuminate\Http\RedirectResponse
     */
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



    /**
     * @param Request $request
     * 주문취소
     * 현재 주문이 입고 이후의 상태면 취소가 불가능하다.
     * @return \Illuminate\Http\RedirectResponse
     */
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

                $payment = Payment::OrderBy('id', 'DESC')->whereIn('resultCd', [3001, 4000, 4100])
                    ->where('orders_id', $order_id)->first();
                if ($payment) {
                    $tid = $payment->tid;//거래아이디
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

        if ($event == 'success') {
            //문자, 메일 송부하기
            $orderer_name = $order->orderer_name;
            $order_num = $order->getOrderNumber();
            try {
                //메일전송=
                $mail_message = [
                    'enter_date' => $order->reservation->reservation_at, 'garage' => $order->garage->name, 'price' => $order->item->price
                ];
                Mail::send(new \App\Mail\Ordering($order->orderer->email, "[차검사 주문 취소]", $mail_message, 'message.email.cancel-ordering-user'));
            } catch (\Exception $e) {
                //                throw  new Exception($e->getMessage());
            }

            try {
                // SMS전송
                $bcs_message = view('message.sms.cancel-ordering-bcs', compact('orderer_name', 'order_num'));
                $user_message = view('message.sms.cancel-ordering-user');
                event(new SendSms($order->orderer_mobile, '[차검사 주문 취소]', $user_message));
                event(new SendSms($order->garage->user_extra->ceo_mobile, '[차검사 주문 취소]', $bcs_message));
            } catch (\Exception $e) {
            }
            //발송 끝
        }

        return redirect()->route('order.show', $order_id)
            ->with($event, $message);
    }

    /**
     * @param Request $request
     * 정비소 구/군 정보 리스트
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSection(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $sections = [];
        foreach ($users as $user) {
            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('garage_area')) {
                $sections[$user->user_extra->section] = $user->user_extra->section;
            }
        }
        return response()->json(array_keys($sections));
    }

    /**
     * @param Request $request
     * 정비소명 정보 리스트
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAddress(Request $request)
    {
        $users = \App\Models\Role::find(4)->users;
        $garages = [];
        foreach ($users as $user) {
            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
                $garages[$user->id] = $user->name;
            }
        }
        return response()->json($garages);

    }

    /**
     * 차량 모델 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    // public function getModels(Request $request)
    // {
    //     $brand_id = $request->get('brand');
    //
    //     $models = Models::where('brands_id', $brand_id)->orderBy("name", 'ASC')->get();
    //     return $models;
    // }

    /**
     * 차량 세부모델 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getDetails(Request $request)
    {
        $model_id = $request->get('b');
        $details = Detail::where('models_id', $model_id)->orderBy("name", 'ASC')->get();
        return $details;
    }

    /**
     * 차량 등급 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getGrades(Request $request)
    {
        $detail_id = $request->get('detail');
        $grades = Grade::where('details_id', $detail_id)->where('items_id', '>', '0')->get();
        return $grades;
    }

    public function orderNumberCheck(Request $request){
        try{
            list($car_number, $datekey) = explode("-", $request->get('order_number'));
            $order_date = Carbon::createFromFormat('ymd', $datekey);
            $order = Order::where('car_number', $car_number)
                ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))
                ->whereNotIn('status_cd', ['101', '100'])->first();
            return $order;
        }catch(\Exception $e){
            return $e->getMessage();
        }




    }

}
