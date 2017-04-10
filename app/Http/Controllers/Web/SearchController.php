<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SearchController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('web.search.index');
    }

}
