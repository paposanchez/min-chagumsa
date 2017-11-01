<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    /**
     * 기술사 로그인 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke() {
        return view('technician.auth.login');
    }

}
