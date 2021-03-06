<?php

namespace App\Http\Controllers\Mobile\Community;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Input;

class FaqController extends PostController {

    protected $board_id = 2;
    protected $board_namespace = "faq";
    protected $config;
    protected $view_path = 'mobile.community.faq.';

    public function index(){
        $category_id = Input::get('category_id');
        if(!$category_id){
            $category_id = 13;
        }

        $where = Post::whereBoardId($this->board_id)->orderBy('id', 'DESC');
        if(in_array($category_id, range(13, 20))){
            $where = $where->where('category_id', $category_id)->where('is_shown', 6);
        }

        $entrys = $where->paginate($this->num_of_page);

        $start_num = \App\Helpers\Helper::getStartNum($entrys);



        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num', 'category_id'));
    }

    public function getNextRows(){


        $entrys = parent::index()->entrys;
        return $entrys;
    }
}
