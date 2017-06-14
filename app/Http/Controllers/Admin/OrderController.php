<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;


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
        $select_color = Code::getCodesByGroup('diagnosis_info_color');
        $select_attachment_status = Code::getCodesByGroup('attachment_status');

        return view('admin.order.edit', compact('order', 'select_color', 'select_attachment_status'));
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



}
