<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {

        return view('home');
    }

}
