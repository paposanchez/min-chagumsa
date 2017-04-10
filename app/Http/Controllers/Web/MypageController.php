<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MypageController extends Controller {

    public function index() {
        return view('web.mypage.index');
    }

}
