<?php

namespace App\Http\Controllers\Admin;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;

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
        dd('update');
    }

    public function getDetail(Request $request){
        $id = $request->get('id');
        $purhcase = Purchase::findOrFail($id);

        return response()->json(
            [
                'status_cd' => $purhcase->status_cd,
                'id' => $purhcase->id,
                'type' => $purhcase->tyoe,
                'amount' => $purhcase->amount,
                'refund_name' => $purhcase->refund_name,
                'refund_account' => $purhcase->refund_account,
                'refund_bank' => $purhcase->refund_bank
            ]
        );
    }

}
