<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;

class NoticeController extends PostController {

    protected $board_id = 1;
    protected $board_namespace = "notice";
    protected $config;
    protected $view_path = 'web.community.notice.';

    public function index(){
        $entrys = parent::index()->entrys;

        $start_num = \App\Helpers\Helper::getStartNum($entrys);

//        $where = Post::orderBy('id', 'DESC')->where('board_id', 1);
//        $entrys = $where->paginate(25);

//        $entrys = $where->paginate($this->num_of_page);

        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num'));
    }

    public function show($id)
    {
//        return parent::show($id); // TODO: Change the autogenerated stub
        $parent = parent::show($id);
        $data = $parent->data;
        $board_namespace = $parent->board_namespace;

        $prev_row = Post::whereBoardId($this->board_id)->where("id", "<", $data->id)->orderBy("id", "DESC")->first();
        if($prev_row){
            $prev = $prev_row->id;
        }else{
            $prev=null;
        }

        $next_row = Post::whereBoardId($this->board_id)->where("id", ">", $data->id)->orderBy("id", "ASC")->first();
        if($next_row){
            $next = $next_row->id;
        }else{
            $next=null;
        }
        return view($this->view_path . 'show', compact('data', 'board_namespace', 'prev', 'next'));
    }

}
