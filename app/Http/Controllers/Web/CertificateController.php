<?php

namespace App\Http\Controllers\Web;

use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Code;
use App\Models\Order;
use App\Models\OrderFeature;
use Illuminate\Support\Facades\Auth;
use Response;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{


    public function __invoke(Request $request, $order_id, $page = 'summary')
    {

        $order = Order::find($order_id);

        if (isset($order->certificates) !== true) {
            $order->certificates = new Certificate();
        }

        switch ($page) {
            case 'performance':
                return view('web.certificate.performance', compact('order', 'page'));
            case 'history':
                return view('web.certificate.history', compact('order', 'page'));
            case 'price':
                //특별요인
                $specials = [];
                if($order->certificates->special_flooded_cd){
                    $specials[] = '침수차량';
                }
                if($order->certificates->special_fire_cd){
                    $specials[] = '화재차량';
                }
                if($order->certificates->special_fulllose_cd){
                    $specials[] = '전손차량';
                }
                if($order->certificates->special_remodel_cd){
                    $specials[] = '불법개조';
                }
                if($order->certificates->special_etc_cd){
                    $specials[] = '기타요인';
                }
                $specials = implode(", ", $specials);

                //장착품
                $features = [];
                $my_features = OrderFeature::where('orders_id', $order->id)->get();

                if($my_features){
                    foreach ($my_features as $my_feature){
                        $features[] = $my_feature->feature->display();
                    }
                }
                $features = implode(", ", $features);

                return view('web.certificate.price', compact('order', 'page', 'specials', 'features'));
            default:
                return view('web.certificate.summary', compact('order', 'page'));
        }
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', '로그인이 필요한 서비스입니다.');
        }

        $orders = Order::where('orderer_id', $user->id)
            ->where('status_cd', 109)
            ->join('certificates', function ($join) {
                $join->on('orders.id', '=', 'certificates.orders_id');
            })->paginate(10);


        $select_open_cd = Code::getCodesByGroup("open_cd");

        return view('web.certificate.index', compact('orders', 'select_open_cd'));
    }

    public function changeOpenCd(Request $request)
    {
        $select_open_cd = Code::getCodesByGroup("open_cd")->toArray();

        if (!array_key_exists($request->get('open_cd'), $select_open_cd)) {
            return "잘못된 접근입니다.";
        }
        $order = Order::where('id', $request->get('order_id'))->first();
        $order->open_cd = $request->get('open_cd');
        $order->save();
        return "인증서 공개여부가 변경되었습니다.";
    }
}
