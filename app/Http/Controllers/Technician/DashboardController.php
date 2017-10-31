<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * 대쉬보드 페이지
     * 최근 5개의 게시물을 보여줌
     * 최근 진단완료, 최근 인증서 발급, 최근 공지사항
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke() {


        $req_order = Order::orderBy("id", "DESC")->where("status_cd", 107)->take(5)->get();
        $fin_order = Order::orderBy("id", "DESC")->where("status_cd", 109)->take(5)->get();
        $lated_post = Post::where('category_id', '1')->orderBy('created_at', 'desc')->take(5)->get();

        return view('technician.dashboard.index', compact('req_order', 'fin_order', 'lated_post'));
    }
}
