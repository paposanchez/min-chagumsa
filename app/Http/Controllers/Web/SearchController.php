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
        $search_con = $request->q;
        $where = Order::select();
        $empty = 0;

        $validate = Validator::make($request->all(), [
            'q' => 'required|min:7|max:18'
        ]);
        if ($validate->fails())
        {
            return redirect('/')->with('error', '인증서명 혹은 차량번호를 정확히 입력해주세요.');
        }



        if(str_contains($request->get('q'), "-")){
            $order_number = explode("-",$search_con);
            $where->where("datekey", $order_number[0])->where("car_number", $order_number[1]);
        }else{
            $where->where("car_number", $search_con);
        }


        if(count($where->get()) != 0){
            $result = $where->get();
        }else{
            $empty = 1;
        }







//        if($search_con && strlen($search_con)>9){
//            dd('ddd');
//            $order_number = explode("-",$search_con);
//            $where->where("datekey", $order_number[0])->where("car_number", $order_number[1]);
//        }elseif($search_con && strlen($search_con)<=9){
//            $where->where("car_number", $search_con);
//        }
//
//            if($where){
//                $result = $where->get();
//            }
//            else{
//            $empty = 1;
//        }

//        $result = $where->get();

        return view('web.search.index', compact('result', 'empty'));
    }

}

