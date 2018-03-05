<?php

namespace App\Http\Controllers\Web\Community;

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
    protected $view_path = 'web.community.faq.';

    /**
     * faq 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $category_id = Input::get('category_id');

        $where = Post::whereBoardId($this->board_id)->where('is_shown', 6)->orderBy('id', 'DESC');
        // if(in_array($category_id, range(13, 20))){
        //     $where = $where->where('category_id', $category_id)->where('is_shown', 6);
        // }

        $entrys = $where->paginate($this->num_of_page);

        $total_count = $entrys->total();
        $start_num = \App\Helpers\Helper::getStartNum($entrys);

        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'total_count', 'start_num', 'category_id'));
    }


}
