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
use App\Models\Role;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Code;
use App\Models\PaymentCancel;
use App\Models\Purchase;
use App\Models\Warranty;
use App\Http\Controllers\Controller;
use App\Traits\Template;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        $sort_orderby = $request->get('sort_orderby');
        $sort = $request->get('sort');
        if (!$sort) {
            $where = Order::whereNotIn('status_cd', [101])->orderBy('created_at', 'DESC');
        } else {
            $where = Order::whereNotIn('status_cd', [101]);
        }

        // 정렬옵션
        if ($sort) {
            if ($sort == 'status') {
                $where->orderBy('status_cd', $sort_orderby);
            } else {
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
            "chakey" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "email" => '이메일'
        ];

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            if ($sf == 'car_number') {
                $where->where('car_number', 'like', '%' . $s . '%');
            } else {
                $where->where($sf, 'like', '%' . $s . '%');
            }
        }

        $entrys = $where->paginate(25);

        //엔지니어 목록
        $engineers = Role::find(5)->users->pluck('name', 'id');

        return view('admin.order.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'engineers', 'status_cd', 'sort_orderby', 'sort'));
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
        $p_flag = 0;

        if($order->status_cd == 100){
            $p_flag = 1;
        }

        $order_items = OrderItem::where('orders_id', $order->id)->get();

        // 진행중인 상품 검색 후 플래그값 변경
        foreach ($order_items as $order_item) {
            //$list[key($order_item->getReport())] = $order_item->getReport()[key($order_item->getReport())];
            if (in_array($order_item->getReport()[key($order_item->getReport())]->status_cd, [114, 126, 115, 120])) {
                $p_flag = 1;
            }
        }

        //부모 주문
        $parent_order = $order->getParentOrder;

        //전체 정비소 리스트
        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')
            ->join('users', function ($join) {
                $join->on('user_extras.users_id', 'users.id')
                    ->where('users.status_cd', Code::getIdByGroupAndName('user_status', 'active'));
            })
            ->orderBy('area', 'asc')->groupBy('area')->get();

        $my_brand = $order->brand;
        $models = Models::where('brands_id', $my_brand->id)->orderBy("name", 'ASC')->pluck('name', 'id');

        return view('admin.order.show', compact('order', 'garages', 'order_items', 'my_brand', 'models', 'parent_order', 'p_flag'));
    }


    public function create(Request $request, $page = 1)
    {
        $user = Auth::user();

        $users = Role::find(2)->users->pluck('name', 'name');
        $brands = Brand::select('id', 'name')
            ->orderByRaw('CASE WHEN id = 5 THEN 8 WHEN id = 6 THEN 9 WHEN id = 4 OR id = 19 OR id = 38 OR id = 74 OR id = 44 THEN 5 WHEN id = 1 OR id = 28 OR id = 45 THEN 1 ELSE 3 END ASC, name ASC')
            ->get();
        $areas = UserExtra::select()->join('users', function ($join) {
            $join->on('user_extras.users_id', 'users.id')
                ->where('users.status_cd', Code::getIdByGroupAndName('user_status', 'active'));
        })
            ->orderBy(DB::raw('field(area, "서울시")'), 'desc')->orderBy('area', 'asc')->groupBy('area')->whereNotNull('aliance_id')->get();

        $items = Item::all();


        $sel_hours = config('chagumsa.sel_hour');


        return view('admin.order.create', compact('user', 'users', 'areas', 'brands', 'sel_hours', 'items'));
    }


    public function store(Request $request)
    {

        try {
            if ($request->get('diag_param')) {
                $this->validate($request, [
                    'orderer_name' => 'required|min:2',
                    'orderer_email' => 'required|min:2',
                    'orderer_mobile' => 'required|min:9',
                    'car_number' => 'required',
//                    'vin_number' => 'required',
                    'brands_id' => 'required',
                    'models_id' => 'required',
                    'details_id' => 'required',
                    'grades_id' => 'required',
                    'areas' => 'required',
                    'sections' => 'required',
                    'garages' => 'required',
                    'reservation_at' => 'required',
                    'sel_time' => 'required',
                    'diagnosis' => 'required',
                    'items' => 'required'
                ], [],
                    [
                        'orderer_mobile' => '주문자 휴대폰번호',
                        'orderer_email' => '주문자 이메일',
                        'car_number' => '차량번호',
                        'vin_number' => '차대번호',
                        'grades' => '차량 정보',
                        'garages' => '대리점 정보',
                        'reservation_at' => '예약날짜',
                        'sel_time' => '예약시간',
                        'diagnosis' => '진단상품',
                        'items' => '상품'
                    ]);
            } else {
                $this->validate($request, [
                    'orderer_name' => 'required|min:2',
                    'orderer_email' => 'required|min:2',
                    'orderer_mobile' => 'required|min:9',
                    'order_number' => 'required',
                    'order_number_confirm' => 'required',
                    'items' => 'required'
                ], [],
                    [
                        'orderer_id' => '주문자',
                        'orderer_email' => '주문자이메일',
                        'orderer_mobile' => '주문자 휴대폰번호',
                        'order_number' => '주문번호',
                        'items' => '상품'
                    ]);

            }

            DB::beginTransaction();
            $user = Auth::user();

            // 신규 진단일 경우
            $old_order = null;
            $old_diagnosis = null;
            if (!$request->get('diag_param')) {
                // 기존 주문이 있는 경우
                $old_order = Order::where('chakey', $request->get('order_number'))->first();

                // 기존 주문이 있는경우 기존주문의 진단번호
                $old_diagnosis = Diagnosis::where('chakey', $request->get('order_number'))->first();
                $car_number = $old_order->carNumber;
                $car = $car_number->car;
            }

            //order 생성
            $order = Order::create([
                'orderer_id' => $user->id,
                'orderer_name' => $request->get('orderer_name'),
                'orderer_mobile' => $request->get('orderer_mobile'),
                'orderer_email' => $request->get('orcerer_email') ? $request->get('orcerer_email') : $user->email,
                'status_cd' => Code::getIdByGroupAndName('order_state', 'ordered'),
                'car_number' => $old_order ? $old_order->car_number : $request->get('car_number'),
                'brands_id' => $old_order ? $old_order->brands_id : $request->get('brands_id'),
                'models_id' => $old_order ? $old_order->models_id : $request->get('models_id'),
                'details_id' => $old_order ? $old_order->details_id : $request->get('details_id'),
                'grades_id' => $old_order ? $old_order->grades_id : $request->get('grades_id')
            ]);

            $chakey = $order->createChakey($request->get('car_number'));

            // 주문상품생성
            $item_ids = explode(',', $request->get('items'));
            $items = Item::whereIn("id", $item_ids)->get();

            foreach ($items as $item) {
                $order_item = OrderItem::create([
                    'orders_id' => $order->id,
                    'group_id' => $old_order ? $old_order->id : $order->id,
                    'type_cd' => $item->type_cd,
                    'car_sort_cd' => $item->car_sort_cd,
                    'items_id' => $item->id,
                    'price' => $item->price,
                    'commission' => $item->commission,
                    'wage' => $item->wage,
                    'guarantee' => $item->guarantee,
                    'alliance_ratio' => $item->alliance_ratio,
                    'certi_ratio' => $item->certi_ratio,
                    'self_ratio' => $item->self_ratio
                ]);
                //diagnosis 생성
                if ($item->type_cd == Code::getIdByGroupAndName('report_type', 'diagnosis')) {

                    $reservation_date = new DateTime($request->get('reservation_at') . ' ' . $request->get('sel_time') . ':00:00');
                    Diagnosis::create([
                        'orders_id' => $order->id,
                        'order_items_id' => $order_item->id,
                        'chakey' => $chakey,
                        'status_cd' => Code::getIdByGroupAndName('report_state', 'order'),
                        'garage_id' => User::where('name', $request->get('garages'))->first()->id,
                        'reservation_at' => $reservation_date->format('Y-m-d H:i:s')
                    ]);
                }

                //certificate 생성
                if ($old_diagnosis && $item->type_cd == Code::getIdByGroupAndName('report_type', 'certificate')) {
                    Certificate::create([
                        'diagnosis_id' => $old_diagnosis->id,
                        'car_numbers_id' => $car_number->id,
                        'chakey' => $chakey,
                        'technist_id' => 41, //윤대권 미리 지정
                        'order_items_id' => $order_item->id,
                        'status_cd' => Code::getIdByGroupAndName('report_state', 'order'),
                    ]);
                }

                //warranty 생성
                if ($old_diagnosis && $item->type_cd == Code::getIdByGroupAndName('report_type', 'warranty')) {
                    $warranty = Warranty::where('diagnosis_id', $old_diagnosis->id)->orderBy('created_at', 'desc')->first();
                    if ($warranty && $warranty->expired_at > Carbon::now()) {
                        return redirect()->back()->with('error', '적용중인 보증프로그램이 존재합니다.');
                    }

                    Warranty::create([
                        'diagnosis_id' => $old_diagnosis->id,
                        'car_numbers_id' => $car_number->id,
                        'order_items_id' => $order_item->id,
                        'chakey' => $chakey,
                        'status_cd' => Code::getIdByGroupAndName('report_state', 'order'),
                    ]);

                }
            }

            // 결제생성
            $purchase = new Purchase();
            $purchase->amount = $request->get('price');

            // 결제타입
            if ($user->hasRole("admin")) {
                $purchase->type = 22;
            } else {
                $purchase->type = 23;
            }
            $purchase->status_cd = 102;
            $purchase->save();


            // order 갱신
            $order->update([
                'chakey' => $chakey,
                'group_id' => $old_order ? $old_order->id : $order->id,
                'purchase_id' => $purchase->id
            ]);

            DB::commit();
            return redirect()->route('order.show', $order->id)->with('success', '주문생성 되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
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
            'mobile' => 'required',
            'car_number' => 'required',
        ], [],
            [
                'name' => '주문자명',
                'mobile' => '주문자연락처',
                'car_number' => '차량번호',
            ]);

        $order = Order::findOrFail($request->get('id'));
        $order->orderer_name = $request->get('name');
        $order->orderer_mobile = $request->get('mobile');
        $order->car_number = $request->get('car_number');
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
        try {
            $this->validate($request, [
                'models_id' => 'required',
                'details_id' => 'required',
                'grades_id' => 'required'
            ], [],
                [
                    'models_id' => '모델명',
                    'details_id' => '세부모델명',
                    'grades_id' => '등급명'
                ]);

            $order = Order::findOrFail($request->get('id'));
            $order->models_id = $request->get('models_id');
            $order->details_id = $request->get('details_id');
            $order->grades_id = $request->get('grades_id');
            $order->save();

            return redirect()->back()->with('success', '차정보가 수정되었습니다.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }

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
            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('sel_text')) {
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
//            if ($user->status_cd != 2 && $user->user_extra->area == $request->get('sel_area') && $user->user_extra->section == $request->get('sel_section')) {
            if ($user->status_cd != 2 && $user->user_extra->section == $request->get('sel_text')) {
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
    public function getModels(Request $request)
    {
        $brand_id = $request->get('sel_id');

        $models = Models::where('brands_id', $brand_id)->orderBy("name", 'ASC')->get();
        return $models;
    }

    /**
     * 차량 세부모델 조회 메소드
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getDetails(Request $request)
    {
        $model_id = $request->get('sel_id');
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
        $detail_id = $request->get('sel_id');
        $grades = Grade::where('details_id', $detail_id)->where('items_id', '>', '0')->get();
        return $grades;
    }

    public function orderNumberCheck(Request $request)
    {
        try {
            $chakey = $request->get('order_number');
            $diagnosis = Diagnosis::where('chakey', $chakey)->first();

            if ($diagnosis && $diagnosis->status_cd == 115) {
                return response()->json('success');
            } else {
                throw new Exception('fail');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getCarType(Request $request)
    {
        $brand_id = $request->get('brand_id');
        $brand = Brand::findOrFail($brand_id);

        return response()->json($brand->car_type);
    }

    public function getItems(Request $request)
    {
        $type = $request->get('type');
        $items = Item::whereIn('type_cd', [122, 123]);

        if ($type == 'f') {
            $items->where('car_sort_cd', 125);
        } else {
            $items->where('car_sort_cd', 124);
        }

        return $items->get();
    }

    public function getEtcItems(Request $request)
    {
        $type = $request->get('type');
        $items = Item::select();
        $list = [];
        if ($type == 'f') {
            $items->where('car_sort_cd', 125);
        } else {
            $items->where('car_sort_cd', 124);
        }

        foreach ($items->get() as $item) {
            $list[] = array(
                'id' => $item->id,
                'name' => $item->name,
                'type_cd' => $item->type_cd,
                'display_name' => $item->type->name,
                'price' => $item->price
            );
        }

        return $list;
    }

    public function orderCancel(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'order_id' => 'required'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->with('error', '주문번호가 누락되었습니다.');
            }

            DB::beginTransaction();
            $order_id = $request->get('order_id');
            $order = Order::findOrFail($order_id);
            $purchase = $order->purchase;

            $order_items = OrderItem::where('orders_id', $order_id)->get();

            // 진행중인 상품이 있을시 뒤로 되돌리기
            foreach ($order_items as $order_item) {
                //$list[key($order_item->getReport())] = $order_item->getReport()[key($order_item->getReport())];
                if (in_array($order_item->getReport()[key($order_item->getReport())]->status_cd, [114, 126, 115, 120])) {
                    return redirect()->back()->with('error', '현재 진행중인 상품이 존재합니다.');
                }
            }

            $cancelAmt = $purchase->amount;

            $payment = Payment::OrderBy('id', 'DESC')->whereIn('resultCd', [3001, 4000, 4100])->where('orders_id', $order_id)->first();
            $message = '';
            $event = '';
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
                        $purchase->status_cd = 100;
                        $purchase->save();

                        $message = trans('web/mypage.cancel_complete');
                        $event = 'success';
                    } else {
                        // PG 결제취소 오류
                        $message = "해당 결제내역에 대한 결제취소를 진행할 수 없습니다.<br>";
                        if (isset($cancel_process->result_msg)) $message .= "결제취소 거부 사유: " . $cancel_process->result_msg;
                        $event = 'error';

                        return redirect()->route('order.show', $order_id)->with($event, $message);
                    }
                }


            } else {
                // PG결제가 아닌 통장 입금
                // todo 무통장 입금 등 따른 처리가 필요
                $order->status_cd = 100;
                $order->refund_status = 1;
                $order->save();

                //purchases 업데이트
                $purchase->status_cd = 100;
                $purchase->save();

                $message = trans('web/mypage.cancel_complete');
                $event = 'success';
            }

            // order_item 삭제
            OrderItem::where('orders_id', $order_id)->delete();

            DB::commit();
            return redirect()->route('order.show', $order_id)->with($event, $message);
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', '현재 진행중인 상품이 존재합니다.');
        }
    }

}
