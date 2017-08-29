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




                        $select_open_cd = Code::getCodesByGroup("open_cd");

                        return view('web.certificate.index', compact('orders', 'select_open_cd'));
                }

                public function changeOpenCd(Request $request){
                        $select_open_cd = Code::getCodesByGroup("open_cd")->toArray();

                        if(!array_key_exists($request->get('open_cd'), $select_open_cd)) {
                                return "잘못된 접근입니다.";
                        }
                        $order = Order::where('id', $request->get('order_id'))->first();
                        $order->open_cd = $request->get('open_cd');
                        $order->save();
                        return "인증서 공개여부가 변경되었습니다.";
                }
        }
