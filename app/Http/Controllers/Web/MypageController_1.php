<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MypageController1 extends Controller {

    public function index() {
        return view('web.mypage.index');
    }

}
