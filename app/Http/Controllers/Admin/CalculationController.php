<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Order;


class CalculationController extends Controller
{
    public function index(Request $request)
    {
        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];
        $where = Order::orderBy('orders.id', 'DESC')->whereIn('orders.status_cd', [109]);

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];
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

        $entrys = $where->paginate(25);

        return view('admin.calculation.index', compact('search_fields', 'entrys', 'tre', 'trs', 'status_cd'));
    }
}
