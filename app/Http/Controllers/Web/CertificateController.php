<?php

namespace App\Http\Controllers\Web;

use App\Models\Certificate;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Response;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller {

    // public function __invoke(Request $request, $certificate, $page = 'summary') {
    public function __invoke(Request $request, $order_id, $page = 'summary') {
        $order = Order::find($order_id)->first();

        if(isset($order->certificates) !== true){
            $order->certificates = new Certificate();
//            dd(isset($order->certificates), $order->certificates->history_garage);
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



//        $orders = Order::where('orderer_id', $user_id)->get();


        $certificates = Certificate::select()->join('orders', function($join){
            $user_id = Auth::user()->id;
            $join->on('certificates.orders_id', '=', 'orders.id')->where('orderer_id', $user_id);
        })->get();
//        dd($certificates[0]->order->car->getFuelType());

        return view('web.certificate.index', compact('certificates'));
    }

    public function performance(){
        return view('web.certificate.performance');
    }
}
