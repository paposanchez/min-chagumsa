<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller {

    public function index() {

        $where = Code::orderBy('group', 'ASC')->orderBy('name', 'ASC');
        $entrys = $where->paginate(20);

        return view('admin.code.index', compact('entrys'));
    }

}
