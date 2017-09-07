<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Models\ActivityLog;
use App\Http\Controllers\Controller;

class HistoryController extends Controller {

    public function index() {

        $where = ActivityLog::orderBy('id');
        $entrys = $where->paginate(20);
        return view('mobile.mypage.history.index', compact('entrys'));
    }

}
