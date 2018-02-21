<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\OrderItem;

class WelcomeController extends Controller {

        /**
        * 어드민 로그인 페이지
        * @return \Illuminate\Http\Response
        */
        public function __invoke() {

                // $diagnosis = DB::select('cargumsa.');
                //
                // $item = \App\Models\Item::findOrFail(2);
                //
                // // dd(json_decode($item->layout));
                //
                // $orders = DB::table('cargumsa.orders')->where('status_cd', 107)->get();
                //
                // // 레이아웃 적용
                // $layout = json_decode($item->layout, true);
                //
                //
                // $ls = [];
                // foreach($orders as $order)
                // {

                        //4,73,78,79,82,131,220,
                        // echo $order->id.',';
                        // $l = $layout;
                        // foreach($l as &$details)
                        // {
                        //
                        //         foreach($details['entrys'] as &$detail)
                        //         {
                        //
                        //
                        //
                        //                 if( isset($detail['diagnoses']) && !is_null($detail['diagnoses']))
                        //                 {
                        //                         $d = DB::table('cargumsa.diagnoses')->where('orders_id', $order->id)->where('group', $detail['name_cd'])->first();
                        //
                        //                         if($d)
                        //                         {
                        //                                 $detail['diagnoses'] = $d->id;
                        //                         }
                        //
                        //                 }
                        //
                        //
                        //                 if( isset($detail['entrys']) && count($detail['entrys']) > 0)
                        //                 {
                        //                         // if($detail['name_cd'] == 2008)
                        //                         // {
                        //                         //         var_dump($detail['name_cd']);
                        //                         //         var_dump($detail['entrys']);
                        //                         //         echo "<hr>";
                        //                         // }
                        //
                        //                         $ds = DB::table('cargumsa.diagnoses')->where('orders_id', $order->id)->where('group', $detail['name_cd'])->orderBy('id', 'ASC')->get();
                        //
                        //                         for($i =0 ;$i < count($ds); $i++)
                        //                         {
                        //                                 $detail['entrys'][$i]['diagnoses']      = $ds[$i]->id;
                        //                         }
                        //
                        //
                        //
                        //                         foreach($detail['entrys'] as &$det)
                        //                         {
                        //
                        //
                        //
                        //                                 if( isset($det['diagnoses']) && !is_null($det['diagnoses']))
                        //                                 {
                        //                                         $d = DB::table('cargumsa.diagnoses')->where('orders_id', $order->id)->where('group', $det['name_cd'])->first();
                        //
                        //                                         if($d)
                        //                                         {
                        //                                                 $det['diagnoses'] = $d->id;
                        //                                         }
                        //
                        //                                 }
                        //                         }
                        //
                        //
                        //                 }
                        //
                        //         }
                        //
                        // }
                        //
                        // // dd(json_encode($l));
                        //
                        // $ot = OrderItem::where('orders_id','=',$order->id)->where('type_cd', 121)->first();
                        //
                        // \App\Models\Diagnosis::where('order_items_id', '=', $ot->id)->update([
                        //         'layout' => json_encode($l)
                        // ]);

                // }

                return view('admin.auth.login');
        }

}
