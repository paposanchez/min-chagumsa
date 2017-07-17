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
    protected $num_of_page = 15;

    function __construct() {
        $this->config = Board::whereId($this->board_id)->first();
    }

    public function index() {
        $where = Post::whereBoardId($this->board_id)
                ->orderBy('id', 'desc');
//        $entrys = $where->paginate($this->num_of_page);

        $entrys = $where->paginate(10);

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

    public function store() {
        
    }

}
