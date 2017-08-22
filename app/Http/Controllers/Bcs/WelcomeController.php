<?php

namespace App\Http\Controllers\Bcs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {
        return view('bcs.auth.login');
    }

}
