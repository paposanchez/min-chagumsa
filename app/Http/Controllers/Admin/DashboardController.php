<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Post;
use App\Models\UrlShort;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * 대쉬보드 인덱스 페이지
     * 최근 1:!문의, 최근 주문 항목, 전체 주문 항목, 인증서 발행 항목 노출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $today = date('Y-m-d');
        $user = Auth::user();

        //주문관련
        $total_order = Order::whereNotIn('status_cd', [100])->get();
        $today_order = Order::where("created_at", ">=", $today)->get();
        $cancel_order = Order::where('status_cd', 100)->get();

        //진단관련
        $total_diagnosis = count(Diagnosis::whereNotIn('status_cd', [116])->get());
        $today_diagnosis = count(Diagnosis::where('created_at', ">=", $today)->get());
        $ready_diagnosis = count(Diagnosis::whereIn('status_cd', [112, 113])->get());
        $completed_diagnosis = count(Diagnosis::whereNotNull('completed_at')->get());

        //평가관련
        $total_certificate = count(Certificate::whereNotIn('status_cd', [116])->get());
        $today_certificate = count(Certificate::where('created_at', ">=", $today)->get());
        $ready_certificate = count(Certificate::whereIn('status_cd', [112])->get());
        $completed_certificate = count(Certificate::whereNotNull('completed_at')->get());

        //보증관련
        $total_warranty = count(Warranty::whereNotIn('status_cd', [116])->get());
        $today_warranty = count(Warranty::where('created_at', ">=", $today)->get());
        $ready_warranty = count(Warranty::whereIn('status_cd', [112])->get());
        $completed_warranty = count(Warranty::whereNotNull('completed_at')->get());

        //게시판관련
        if ($user->hasRole('admin')) {
            $posts = Post::where('board_id', 3)->orderBy('created_at', 'DESC')->take(5)->get();
        } else {
            $posts = Post::where('board_id', 1)->orderBy('created_at', 'DESC')->take(5)->get();
        }


        return view('admin.dashboard.index',
            compact('total_order', 'today_order', 'cancel_order', 'json_array', 'total_diagnosis', 'today_diagnosis', 'ready_diagnosis', 'completed_diagnosis', 'total_certificate', 'today_certificate', 'ready_certificate', 'completed_certificate', 'posts', 'user'));
    }

}