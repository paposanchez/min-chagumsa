<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

//        $handler = new \App\Models\UserSequence();
//        $garage_id = $handler->setNewGarageSeq(1);
//        $garage_id = $handler->setNewGarageSeq(3);
//        $garage_id = $handler->setNewGarageSeq(6);
//        $handler->setNewEngineerSeq(2, 1);
//        $handler->setNewEngineerSeq(4, 1);
//        $handler->setNewEngineerSeq(5, 1);



        return view('admin.dashboard.index');
    }

}
