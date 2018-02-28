<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_orderby = $request->get('sort_orderby');
        $sort = $request->get('sort');
        if (!$sort) {
            $where = Purchase::orderBy('created_at', 'DESC');
        } else {
            $where = Purchase::select();
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
            "purchase_id" => "결제번호",
        ];

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf){
                case 'chakey':
                    $where->leftJoin('orders', 'purchases.id', '=', 'orders.purchase_id')
                        ->where('orders.chakey', 'like', '%'.$s.'%')
                        ->select('purchases.*');
                    break;
                case 'purchase_id':
                    $where->where('id', $s);
                    break;
            }
        }


        $entrys = $where->paginate(10);
        return view('admin.purchase.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'sort_orderby', 'sort', 'status_cd'));
    }

    public function update(Request $request)
    {
        try {
            $this->validate($request, [
                'amount' => 'required',
                'refund_name' => 'required',
                'refund_account' => 'required',
                'refund_bank' => 'required'
            ], [],
                [
                    'amount' => '결제금액',
                    'refund_name' => '예금주',
                    'refund_account' => '계좌번호',
                    'refund_bank' => '예금 은행'
                ]);


            DB::beginTransaction();
            $purchase = Purchase::findOrFail($request->get('purchase_id'));
            $purchase->amount = $request->get('amount');
            $purchase->refund_name = $request->get('refund_name');
            $purchase->refund_account = $request->get('refund_account');
            $purchase->refund_bank = $request->get('refund_bank');
            $purchase->save();
            DB::commit();
            return redirect()->back()->with('success', '정상적으로 저장되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '처리중 오류가 발생하였습니다.');
        }
    }

    public function getDetail(Request $request)
    {
        $id = $request->get('id');
        $purhcase = Purchase::findOrFail($id);

        return response()->json(
            [
                'status_cd' => [
                    'code' => $purhcase->status_cd,
                    'display' => $purhcase->status->display()
                ],
                'id' => $purhcase->id,
                'type' => $purhcase->payment_type->display(),
                'amount' => $purhcase->amount,
                'refund_name' => $purhcase->refund_name,
                'refund_account' => $purhcase->refund_account,
                'refund_bank' => $purhcase->refund_bank
            ]
        );
    }

}
