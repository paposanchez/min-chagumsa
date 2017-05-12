<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;

class OrderController extends Controller {

    public function index() {
        return view('web.mypage.order.index');
    }

    public function show() {
        return view('web.mypage.order.show');
    }

}
