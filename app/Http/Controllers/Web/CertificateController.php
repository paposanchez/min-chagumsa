<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Code;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Response;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller {


    public function __invoke(Request $request, $order_id, $page = 'summary') {
        $order = Order::find($order_id)->first();

        if(isset($order->certificates) !== true){
            $order->certificates = new Certificate();
        }

        switch ($page) {
            case 'performance':
                return view('web.certificate.performance', compact('order', 'page'));
            case 'history':
                return view('web.certificate.history', compact('order', 'page'));
            case 'price':
                return view('web.certificate.price', compact('order', 'page'));
            default:
                return view('web.certificate.summary', compact('order', 'page'));
        }
    }

    public function index(){
        $user_id = Auth::user()->id;
        $orders = Order::where('orderer_id', $user_id)
                    ->where('status_cd', 107)
                    ->join('certificates', function($join){
                        $join->on('orders.id', '=', 'certificates.orders_id');
                    })
                    ->get();
//        dd($orders);
//        $row = User::select()->join(‘role_user’, function($join){
//            $join->on(‘users.id’, ‘=‘, ‘role_user.user_id’)->where(‘role_id’, 4);
//        });




        $select_open_cd = Helper::getCodeSelectArray(Code::getCodesByGroup("open_cd"),'open_cd', '인증서 공개 여부를 선택해 주세요.');

        return view('web.certificate.index', compact('orders', 'select_open_cd'));
    }

    public function changeOpenCd(Request $request){
        $order = Order::where('id', $request->get('order_id'))->first();
        $order->open_cd = $request->get('open_cd');
        $order->save();
        return $request->get('order_id');
    }
}
