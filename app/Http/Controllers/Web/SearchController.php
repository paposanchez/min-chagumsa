<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $orders = [];
        if($request->get('q')) {
                $qs = explode($request->get('q'), "-");
                $where = Order::select()->where("car_number", $qs[0]);
                if(isset($qs[1])) {
                        $where->where("datekey", $qs[1]);
                }
                $orders = $where->get();
        }

        return view('web.search.index', compact('orders'));
    }

}
