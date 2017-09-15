<?php

namespace App\Http\Controllers\Admin;

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

        $lated_inquire = Post::where('board_id', '3')->orderBy('created_at', 'desc')->take(5)->get();
        // $lated_post = Post::where('board_id', '1')->orderBy('created_at', 'desc')->take(5)->get();
        $lated_diagnosis = Order::where('status_cd', ">",  101)->orderBy('created_at', 'desc')->take(15)->get();
        $total_diagnosis = Order::where('status_cd', ">",  101)->count();
        $certificates = Order::where('status_cd', 109)->take(10)->get();

        $return = view('admin.dashboard.index', compact('total_diagnosis', 'lated_inquire', 'certificates', 'lated_diagnosis'))->render();
    }

}
