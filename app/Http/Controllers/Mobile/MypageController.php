<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;

class MypageController extends Controller {

    public function index() {
        return view('mobile.mypage.index');
    }

}
