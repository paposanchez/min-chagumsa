<?php

namespace App\Http\Controllers\Bcs;

use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Models\File;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $yn_list = Code::getSelectList('yn');
        $shown_role_list = Code::getSelectList('post_shown_role');
        $search_fields = Code::getSelectList('post_search_field');

        $where = Post::orderBy('id', 'desc')->where('board_id',4);


        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if($trs && $tre){
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function($qry) use($trs, $tre){
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre);
            })->orWhere(function($qry) use($trs, $tre){
                $qry->where("updated_at", ">=", $trs)
                    ->where("updated_at", "<=", $tre);
            });
        }elseif ($trs && !$tre){
            //시작일만 있을때
            $where = $where->where(function($qry) use($trs){
                $qry->where("created_at", ">=", $trs);
            })->orWhere(function($qry) use($trs){
                $qry->where("updated_at", ">=", $trs);
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


        return view('bcs.notice.index', compact('entrys', 'board_list', 'shown_role_list', 'yn_list', 'request', 'search_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

//        $yn_list = Code::getCodesByGroup('yn');
        $yn_list = Code::getSelectList('yn');

        $shown_role_list = Code::getSelectList('post_shown_role');

        $categorys = Code::where('group', 'category_id')->get();

        return view('bcs.notice.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
