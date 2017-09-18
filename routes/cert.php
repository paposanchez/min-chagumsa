<?php

use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Code;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\OrderFeature;
use App\Models\File;

use File AS FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


Route::any('/{order_id}/{page?}', function ($order_id, $page = 'summary') {

        // html 조회
        $cached_html =  storage_path('cert/' . md5($order_id) . '.' . $page . '.html');

        try
        {


                dd(File::exists($cached_html));


                if (!File::exists($cached_html))
                {
                        throw new Exception('파일이 존제하지 않습니다.');
                }

                $contents = File::get($cached_html);




        }
        catch (Exception $exception)
        {

                generate_cache($order_id, $page);
                return redirect('/'. $order_id.'/'. $page);

        }



})->where('name', '[A-Za-z가-힣0-9]+')->name('cert');


function generate_cache($order_id, $page) {

        // $certificate = Certificate::findOrFail($order_id);
        $order = Order::findOrFail($order_id);

        $exterior_picture_ids = Diagnosis::where('orders_id', $order->id)->where('group', 2008)->get();

        switch ($page) {
                case 'performance':
                        $exterior_lefts = Diagnosis::where('orders_id', $order_id)->where('group', 2010)->get();
                        $exterior_centers = Diagnosis::where('orders_id', $order_id)->where('group', 2011)->get();
                        $exterior_rights = Diagnosis::where('orders_id', $order_id)->where('group', 2012)->get();
                        $interior_lefts = Diagnosis::where('orders_id', $order_id)->where('group', 2018)->get();
                        $interior_centers = Diagnosis::where('orders_id', $order_id)->where('group', 2019)->get();
                        $interior_rights = Diagnosis::where('orders_id', $order_id)->where('group', 2020)->get();
                        $html = view('web.certificate.performance', compact('order', 'page'))->render();
                        break;
                case 'history':
                        $html = view('web.certificate.history', compact('order', 'page', 'exterior_picture_ids'))->render();
                        break;
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
                        $my_features = OrderFeature::where('orders_id', $order_id)->get();

                        if($my_features){
                                foreach ($my_features as $my_feature){
                                        $features[] = $my_feature->feature->display();
                                }
                        }
                        $features = implode(", ", $features);

                        $html = view('web.certificate.price', compact('order', 'page', 'specials', 'features'))->render();
                        break;

                default:
                        $html = view('web.certificate.summary', compact('order', 'page', 'exterior_picture_ids'))->render();
                        break;
        }


        var_dump($html);

        File::put(storage_path('cert/' . md5($order_id)  . '.' . $page . '.html'), $html);
}
