<?php

namespace App\Http\Controllers\Bcs;

use App\Repositories\DiagnosisRepository;
use Doctrine\DBAL\Types\ObjectType;
use DateTime;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Car;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Code;
use App\Models\ScTran;
use App\Models\PaymentCancel;
use App\Models\Purchase;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];
        $user = Auth::user();

        $where = Order::orderBy('status_cd', 'DESC')->orderBy('created_at', 'DESC')->where('garage_id', $user->id);

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where = $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre);
            })->orWhere(function ($qry) use ($trs, $tre) {
                $qry->where("updated_at", ">=", $trs)
                    ->where("updated_at", "<=", $tre);
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where = $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs);
            })->orWhere(function ($qry) use ($trs) {
                $qry->where("updated_at", ">=", $trs);
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

        return view('bcs.order.index', compact('search_fields', 'entrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::findOrFail($id);
        $payment = Payment::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);
        $payment_cancel = PaymentCancel::orderBy('id', 'DESC')->where('orders_id', $id)->paginate(25);

        if ($order->car) {
            $car = $order->car;
        } else {
            $car = $order->orderCar;
        }
        return view('bcs.order.edit', compact('order', 'payment', 'payment_cancel', 'car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reservationChange(Request $request)
    {
        try {
            $order_id = $request->get('order_id');
            $date = $request->get('date');
            $time = $request->get('time');

            $reservation_date = new DateTime($date . ' ' . $time . ':00:00');

            $reservation = Reservation::where('orders_id', $order_id)->first();
            $reservation->reservation_at = $reservation_date->format('Y-m-d H:i:s');;
            $reservation->save();

            $order = Order::find($order_id);
            $order->status_cd = 104;
            $order->save();

            return response()->json('success');
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    //  예약확정
    public function confirmation($order_id)
    {
        try {
            $reservation = Reservation::where('orders_id', $order_id);
            $reservation->update([
                'updated_id' => Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);

            $order = Order::find($order_id);
            $order->status_cd = 104;
            $order->save();

            $diagnosis = new DiagnosisRepository();
            $diagnosis->prepare($order->id)->create($order->id);

            return response()->json(true);
        } catch (Exception $ex) {
            return response()->json(false);
        }
    }

}
