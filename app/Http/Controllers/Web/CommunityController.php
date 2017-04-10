<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class CommunityController extends Controller {

    public function index() {
        return view('web.community.index');
    }

}
