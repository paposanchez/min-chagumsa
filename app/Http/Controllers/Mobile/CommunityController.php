<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;

class CommunityController extends Controller {

    public function index() {
        return view('mobile.community.index');
    }

}
