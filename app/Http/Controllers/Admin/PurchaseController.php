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
        $entrys = Purchase::orderBy('id', 'DESC')->paginate(25);

        return view('admin.purchase.index', compact('entrys'));
    }

    public function update(Request $request){
        try{
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
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', '처리중 오류가 발생하였습니다.');
        }
    }

    public function getDetail(Request $request){
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
