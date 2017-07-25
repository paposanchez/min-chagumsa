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
//        $certificate = Certificate::find($order_id)->first();

        switch ($page) {
            case 'performance':
                return view('web.certificate.performance', compact('order'));
            case 'history':
                return view('web.certificate.history', compact('order'));
            case 'price':
                return view('web.certificate.price', compact('order'));
            default:
                return view('web.certificate.summary', compact('order'));
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
