<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Order;


class CalculationController extends Controller
{
    /**
     * @param Request $request
     * 정산관리 인덱스 페이지
     * 인증서 발급된 주문에 한해 노출한다.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where = OrderItem::orderBy('orders_id', 'DESC');

        $search_fields = [
            "chakey" => "주문번호",'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];
        $type_cd = $request->get('type_cd');

        if ($type_cd) {
            $where = $where->where('type_cd', $type_cd);
        }

        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

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

        $entrys = $where->paginate(25);

        return view('admin.calculation.index', compact('search_fields', 'entrys', 'tre', 'trs', 's', 'sf', 'type_cd'));
    }
}
