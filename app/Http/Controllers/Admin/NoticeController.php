<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * @param Request $request
     * BCS게시판 인덱스 페이지
     * 게시글중 공개된 게시글만 표시
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bcs_board_id = 4;
        $search_fields = Code::getSelectList('post_search_field');

        $where = Post::orderBy('id', 'desc')->where('board_id', $bcs_board_id)->where('is_shown', 6);

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre)
                    ->orWhere(function ($qry) use ($trs, $tre) {
                        $qry->where("updated_at", ">=", $trs)
                            ->where("updated_at", "<=", $tre);
                    });
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs)
                    ->orWhere(function ($qry) use ($trs) {
                        $qry->where("updated_at", ">=", $trs);
                    });
            });
        }

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if($sf && $s){
            if($sf == 8){
                $where = $where->where('subject', 'like', '%'.$s.'%');
            }
            elseif($sf == 9){
                $where = $where->where('content', 'like', '%'.$s.'%');
            }
            else{
                $where = $where->where('name', 'like', '%'.$s.'%');
            }
        }

        $entrys = $where->paginate(10);

        $start_num = \App\Helpers\Helper::getStartNum($entrys);


        return view('technician.notice.index', compact('entrys', 'start_num', 'request', 'search_fields', 's', 'sf', 'trs', 'tre'));
    }

    /**
     * @param  Int  $id
     * 해당 개시글에 대한 상세보기
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('technician.notice.show', compact('post'));
    }
}
