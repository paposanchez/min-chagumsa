<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use DB;

class WelcomeController extends Controller {

        /**
        * Display the home page.
        *
        * @return \Illuminate\Http\Response
        */
        public function __invoke() {

                return view('web.welcome');
        }

}
