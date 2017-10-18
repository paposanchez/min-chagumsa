<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = [];
        if ($request->get('q')) {
            if(strlen($request->get('q')) > 9){
                $qs = explode('-', $request->get('q'));

                $where = Order::where('car_number', $qs[0])->where('open_cd', 1326);
                $orders = $where->get();

                if (isset($qs[1]) && $orders[0]->created_at->format('ymd') == $qs[1]) {
                    return view('web.search.index', compact('orders'));
                }else{
                    $orders = [];
                    return view('web.search.index', compact('orders'));
                }
            }

            $where = Order::where("car_number", $request->get('q'))->where('open_cd', 1326);
            $orders = $where->get();
        }
        return view('web.search.index', compact('orders'));
    }

}
