<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;

class DashboardController extends Controller {

    /**
     * 대쉬보드 인덱스 페이지
     * 최근 1:!문의, 최근 주문 항목, 전체 주문 항목, 인증서 발행 항목 노출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke() {
        // $lated_inquire = Post::where('board_id', '3')->orderBy('created_at', 'desc')->take(5)->get();   //최근 1:1 문의
        // $lated_diagnosis = Order::where('status_cd', ">",  101)->orderBy('created_at', 'desc')->take(15)->get();    //최근 진단 항목
        // $total_diagnosis = Order::where('status_cd', ">",  101)->count();   //전체 진단 갯수
        // $certificates = Order::where('status_cd', 109)->orderBy('updated_at', 'desc')->take(10)->get();    //최근 인증서 항목

        return view('admin.dashboard.index');
    }

}
