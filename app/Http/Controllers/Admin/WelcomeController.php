<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Notifications\Order as OrderNotification;
use App\Notifications\Diagnosis as DiagnosisNotification;
use App\Notifications\Order as OrderNotification;
use Illuminate\Notifications\Notifiable;


use App\Models\ScTran;
use App\Models\MmsTran;
use App\Models\Order;
use App\Mail\Order as OrderMail;

use DB;
use Mail;



class WelcomeController extends Controller {

        use Notifiable;

        /**
        * 어드민 로그인 페이지
        * @return \Illuminate\Http\Response
        */
        public function __invoke() {


                try {

                        $o = Order::findOrFail(1);
                        $o->orderer_name = '차니:'.str_random(5);
                        $o->status_cd = array_random([100,101,102]);
                        $o->save();


                        echo $o->status_cd;
                        echo "<hr>";



                }catch(\Exception $e) {

                        dd($e);
                }
        }

}
