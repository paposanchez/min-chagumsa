<?php

namespace App\Http\Controllers\Mobile;

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
                return view('mobile.certificate.performance', compact('order', 'page'));
            case 'history':
                return view('mobile.certificate.history', compact('order', 'page'));
            case 'price':
                return view('mobile.certificate.price', compact('order', 'page'));
            default:
                return view('mobile.certificate.summary', compact('order', 'page'));
        }
    }

    public function index(){
        $user = Auth::user();
        if(!$user){
            return redirect('/login')->with('error', '로그인이 필요한 서비스입니다.');
        }

        $orders = Order::where('orderer_id', $user->id)
                    ->where('status_cd', 107)
                    ->join('certificates', function($join){
                        $join->on('orders.id', '=', 'certificates.orders_id');
                    })
                    ->get();

//        $row = User::select()->join(‘role_user’, function($join){
//            $join->on(‘users.id’, ‘=‘, ‘role_user.user_id’)->where(‘role_id’, 4);
//        });




        $select_open_cd = Helper::getCodeSelectArray(Code::getCodesByGroup("open_cd"),'open_cd', '인증서 공개 여부를 선택해 주세요.');

        return view('mobile.certificate.index', compact('orders', 'select_open_cd'));
    }

    public function changeOpenCd(Request $request){
        $order = Order::where('id', $request->get('order_id'))->first();
        $order->open_cd = $request->get('open_cd');
        $order->save();
        return $request->get('order_id');
    }
}
