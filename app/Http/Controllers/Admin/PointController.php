<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointController extends Controller {

    public function index() {

        $where = Board::orderBy('board_id');
        $entrys = $where->paginate(20);

        return view('admin.board.index', compact('entrys'));
    }

    public function show(Request $request, $id) {
        
    }

    public function create() {
        
    }

}
