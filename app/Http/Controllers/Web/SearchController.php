<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SearchController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search_con = $request->q;
        $where = Order::select();

        $order_number = explode("-",$search_con);

        if($search_con && strlen($search_con)>9){
            $where->where("datekey", $order_number[0])->where("car_number", $order_number[1]);
        }elseif($search_con && strlen($search_con)<=9){
            $where->where("car_number", $search_con);
        }else{
            $empty = 1;
        }

        $result = $where->get();

        return view('web.search.index', compact('result', 'empty'));
    }

}

