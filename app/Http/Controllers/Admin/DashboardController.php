<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {
        $lated_inquire = Post::where('board_id', '3')->orderBy('created_at', 'desc')->take(5)->get();   //최근 1:1 문의
        $lated_diagnosis = Order::where('status_cd', ">",  101)->orderBy('created_at', 'desc')->take(15)->get();    //최근 진단 항목
        $total_diagnosis = Order::where('status_cd', ">",  101)->count();   //전체 진단 갯수
        $certificates = Order::where('status_cd', 109)->orderBy('updated_at', 'desc')->take(10)->get();    //최근 인증서 항목

        return view('admin.dashboard.index', compact('total_diagnosis', 'lated_inquire', 'certificates', 'lated_diagnosis'));
    }

}
