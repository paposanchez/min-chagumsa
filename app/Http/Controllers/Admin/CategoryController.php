<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index() {

        $where = Category::orderBy('group');
        $entrys = $where->paginate(25);

        return view('admin.config.index', compact('entrys'));
    }

}
