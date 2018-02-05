<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

        /**
        * 어드민 로그인 페이지
        * @return \Illuminate\Http\Response
        */
        public function __invoke() {

                return view('admin.auth.login');
        }

}
