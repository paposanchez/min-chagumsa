<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Settlement;
use App\Models\Diagnosis;
use App\Models\Certificate;
use App\Models\Warranty;
use App\Models\OrderItem;
use App\Models\Order;


class CalculationController extends Controller
{

        public function index(Request $request)
        {

                $where = Settlement::orderBy('id', 'DESC');

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
                // if ($trs && $tre) {
                //         //시작일, 종료일이 모두 있을때
                //         $where->where(function ($qry) use ($trs, $tre) {
                //                 $qry->where("created_at", ">=", $trs)
                //                 ->where("created_at", "<=", $tre)
                //                 ->orWhere(function ($qry) use ($trs, $tre) {
                //                         $qry->where("updated_at", ">=", $trs)
                //                         ->where("updated_at", "<=", $tre);
                //                 });
                //         });
                // } elseif ($trs && !$tre) {
                //         //시작일만 있을때
                //         $where->where(function ($qry) use ($trs) {
                //                 $qry->where("created_at", ">=", $trs)
                //                 ->orWhere(function ($qry) use ($trs) {
                //                         $qry->where("updated_at", ">=", $trs);
                //                 });
                //         });
                // }

                $entrys = $where->paginate(25);

                return view('admin.calculation.index', compact('search_fields', 'entrys', 'tre', 'trs', 's', 'sf', 'type_cd'));
        }


        // public function index(Request $request)
        // {
        //
        //         $where = ::orderBy('orders_id', 'DESC')
        //                 ->join('orders', 'orders.id', 'orders_id')
        //                 ->join('settlement_features', 'settlement_features.id', 'order_items_id')
        //                 ->leftJoin('settlements', 'settlements.id', 'settlements_id')
        //                 ;
        //
        //         $search_fields = [
        //                 "chakey" => "주문번호",'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        //         ];
        //         $type_cd = $request->get('type_cd');
        //
        //         if ($type_cd) {
        //                 $where = $where->where('type_cd', $type_cd);
        //         }
        //
        //         $sf = $request->get('sf'); //검색필드
        //         $s = $request->get('s'); //검색어
        //
        //         //기간 검색
        //         $trs = $request->get('trs');
        //         $tre = $request->get('tre');
        //         // if ($trs && $tre) {
        //         //         //시작일, 종료일이 모두 있을때
        //         //         $where->where(function ($qry) use ($trs, $tre) {
        //         //                 $qry->where("created_at", ">=", $trs)
        //         //                 ->where("created_at", "<=", $tre)
        //         //                 ->orWhere(function ($qry) use ($trs, $tre) {
        //         //                         $qry->where("updated_at", ">=", $trs)
        //         //                         ->where("updated_at", "<=", $tre);
        //         //                 });
        //         //         });
        //         // } elseif ($trs && !$tre) {
        //         //         //시작일만 있을때
        //         //         $where->where(function ($qry) use ($trs) {
        //         //                 $qry->where("created_at", ">=", $trs)
        //         //                 ->orWhere(function ($qry) use ($trs) {
        //         //                         $qry->where("updated_at", ">=", $trs);
        //         //                 });
        //         //         });
        //         // }
        //
        //         $entrys = $where->paginate(25);
        //
        //         return view('admin.calculation.index', compact('search_fields', 'entrys', 'tre', 'trs', 's', 'sf', 'type_cd'));
        // }

        public function bcs(Request $request)
        {

                $where = Diagnosis::orderBy('diagnosis.id', 'DESC')
                        ->leftJoin('order_items', 'order_items.id', 'order_items_id')
                        // ->leftJoin('settlement_features', 'settlement_features.id', 'order_items.id')
                        ->where('diagnosis.status_cd', 115);

                $search_fields = [
                        "chakey" => "주문번호",'orderer_name' => '주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
                ];
                $type_cd = $request->get('type_cd');
                //
                // if ($type_cd) {
                //         $where = $where->where('type_cd', $type_cd);
                // }

                $sf = $request->get('sf'); //검색필드
                $s = $request->get('s'); //검색어

                //기간 검색
                $trs = $request->get('trs');
                $tre = $request->get('tre');
                // if ($trs && $tre) {
                //         //시작일, 종료일이 모두 있을때
                //         $where->where(function ($qry) use ($trs, $tre) {
                //                 $qry->where("created_at", ">=", $trs)
                //                 ->where("created_at", "<=", $tre)
                //                 ->orWhere(function ($qry) use ($trs, $tre) {
                //                         $qry->where("updated_at", ">=", $trs)
                //                         ->where("updated_at", "<=", $tre);
                //                 });
                //         });
                // } elseif ($trs && !$tre) {
                //         //시작일만 있을때
                //         $where->where(function ($qry) use ($trs) {
                //                 $qry->where("created_at", ">=", $trs)
                //                 ->orWhere(function ($qry) use ($trs) {
                //                         $qry->where("updated_at", ">=", $trs);
                //                 });
                //         });
                // }

                $entrys = $where->paginate(25);

                return view('admin.calculation.bcs', compact('search_fields', 'entrys', 'tre', 'trs', 's', 'sf', 'type_cd'));
        }


        public function ready(Request $request)
        {

                $where = SettlementFeatures::orderBy('created_at', 'ASC');

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
