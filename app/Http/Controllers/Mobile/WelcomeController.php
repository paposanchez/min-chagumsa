<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {


        return view('mobile.welcome');
    }

}
