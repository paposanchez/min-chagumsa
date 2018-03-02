<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

        /**
        * 인증서 검색 인덱스 페이지
        * @param Request $request
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
        public function index(Request $request)
        {
                $orders = [];
                if ($request->get('s')) {

                        $qs = explode('-', $request->get('s'));

                        // $where = Order::where('car_number', $qs[0])->where('open_cd', 1326);
                        // $orders = $where->get();
                        //
                        // if (isset($qs[1]) && $orders[0]->created_at->format('ymd') == $qs[1]) {
                        //         return view('web.search.index', compact('orders'));
                        // }else{
                        //         $orders = [];
                        //         return view('web.search.index', compact('orders'));
                        // }
                        //
                        //
                        // $where = Order::where("car_number", $request->get('q'))->where('open_cd', 1326);
                        // $orders = $where->get();
                }
                return view('web.search.index', compact('orders'));
        }

}
