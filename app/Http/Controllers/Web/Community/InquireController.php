<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquireController extends PostController {

    protected $board_id = 3;
    protected $board_namespace = "inquire";
    protected $config;
    protected $view_path = 'web.community.inquire.';

    public function index(){
        $where = Post::orderBy('id', 'DESC')->where('board_id', 3);
        $entrys = $where->paginate(25);
        $start_num = \App\Helpers\Helper::getStartNum($entrys);

//        return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num'));
        return view('web.community.inquire.index', compact('entrys', 'start_num'));
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

    public function chkPassword(Request $request){

        $this->validate($request, [
                'id' => 'required|posts,id',
                'email' => 'email',
                'passwd' => 'min:4'
            ],
            [],
            [
                'id' => '문의사항 번호가 잘못되었습니다.',
                'email' => '작성자이외에 해당 문의사항을 열람할 수 없습니다.',
                'password' => '비밀번호를 확인해 주세요.'
            ]
        );

        $where = Post::where('id', $request->get('id'))->where('email', $request->email)
            ->where('password', $request->get('password'))->first();
        if($where){
            $result = ['status'=> 'ok', 'message' => ''];
        }else{
            $result = ['status'=> 'ok', 'message' => ''];
        }

        return response()->json($result);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'subject' => 'required',
            'content' => 'required',
            'password' => 'min:4'
        ]);

        if ($validate->fails())
        {
            return redirect()->route('inquire.index')->with('error', '문의가 정상적으로 처리되지 않았습니다.');
        }

        Post::create([
            'board_id' => $this->board_id,
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
            'password' => bcrypt($request->get('password')),
            'ip' => '0.0.0.0',
            'is_answered' => 0
        ]);

        return redirect()->route('inquire.index')->with('success', '문의가 성공적으로 처리되었습니다.');
    }

}
