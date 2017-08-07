<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    protected $board_id;
    protected $board_namespace;
    protected $config;
    protected $view_path;
    protected $num_of_page = 10;

    function __construct() {
        $this->config = Board::whereId($this->board_id)->first();
    }

    public function index() {
        $where = Post::whereBoardId($this->board_id)
                ->orderBy('id', 'desc');

        $entrys = $where->where('is_shown', 6)->paginate($this->num_of_page);

        $board_namespace = $this->board_namespace;

        return view($this->view_path . 'index', compact('entrys', 'board_namespace'));
    }

    public function show($id) {
        $data = Post::findOrFail($id);
        $data->increment('hit');

        $board_namespace = $this->board_namespace;

        return view($this->view_path . 'show', compact('data', 'board_namespace'));
    }

    public function create() {
        $board_namespace = $this->board_namespace;
        return view($this->view_path . 'create', compact('board_namespace'));
    }

    public function edit($id) {
        $board_namespace = $this->board_namespace;
        return view($this->view_path . 'create', compact('board_namespace'));
    }

//    public function store() {
//        dd('ddd');
//    }

}
