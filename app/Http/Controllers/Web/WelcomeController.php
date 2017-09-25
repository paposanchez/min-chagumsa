<?php

namespace App\Http\Controllers\Web;

use App\Events\SendSms;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

use DB;

class WelcomeController extends Controller
{

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('web.welcome');
    }

}
