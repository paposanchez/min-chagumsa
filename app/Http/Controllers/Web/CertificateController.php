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

    public function __invoke(Request $request, $certificate, $page = 'summary') {

        switch ($page) {
            case 'performance':
                return view('web.certificate.performance');
            case 'history':
                return view('web.certificate.history');
            case 'price':
                return view('web.certificate.price');
            default:
                return view('web.certificate.summary');
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

}
