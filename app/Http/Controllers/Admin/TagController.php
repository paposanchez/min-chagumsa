<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaggingTag;
use App\Http\Controllers\Controller;

class TagController extends Controller {

    public function index() {

        $where = TaggingTag::orderBy('group');
        $entrys = $where->paginate(25);

        return view('admin.tag.index', compact('entrys'));
    }

}
