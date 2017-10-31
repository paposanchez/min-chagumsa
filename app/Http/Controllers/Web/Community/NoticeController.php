<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\File;
use App\Models\Post;
use App\Http\Controllers\Web\PostController;

class NoticeController extends PostController {

    protected $board_id = 1;
    protected $board_namespace = "notice";
    protected $config;
    protected $view_path = 'web.community.notice.';

    /**
     * 공지사항 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $entrys = parent::index()->entrys;

        $start_num = \App\Helpers\Helper::getStartNum($entrys);

        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num'));
    }

    /**
     * @param Int $id
     * 공지사항 상세보기 페이지
     * 공지사항의 seq를 이용하여 기존 정보 노출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
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

        // 파일 다운로드 관련
        $files = File::where('group', 'post')->where('group_id', $id)->get();
        if(!$files){
            $files = [];
        }

        return view($this->view_path . 'show', compact('data', 'board_namespace', 'prev', 'next', 'files'));
    }

}
