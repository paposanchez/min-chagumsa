<?php

namespace App\Http\Controllers\Web\Community;

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
    protected $view_path = 'web.community.faq.';

    public function index(){


        $faq_div = Input::get('faq_div');

        $where = Post::whereBoardId($this->board_id)->orderBy('id', 'DESC');
        if(in_array($faq_div, ['R', 'L', 'I', 'M', 'P', 'O', 'F'])){
            $where = $where->where('faq_div', $faq_div);
        }

        $entrys = $where->paginate($this->num_of_page);

        $start_num = \App\Helpers\Helper::getStartNum($entrys);

        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num', 'faq_div'));
    }


}
