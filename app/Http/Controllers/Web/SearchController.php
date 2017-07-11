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

        if ($search_con) {
            $where->where("car_number", $search_con);
        }elseif (!$search_con){
            $empty = 1;
        }

        $result = $where->get();

        return view('web.search.index', compact('result', 'empty'));
    }

}
