<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController1 extends Controller {

    public function index() {

        $where = Config::orderBy('group');
        $entrys = $where->paginate(25);

        return view('admin.config.index', compact('entrys'));
    }

}
