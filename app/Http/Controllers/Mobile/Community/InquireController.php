<?php

namespace App\Http\Controllers\Mobile\Community;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InquireController extends PostController
{

    protected $board_id = 3;
    protected $board_namespace = "inquire";
    protected $config;
    protected $view_path = 'mobile.community.inquire.';


    /**
     * 로그인 정보 validate
     * InquireController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    /**
     * 1:1문의 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $where = Post::whereBoardId($this->board_id)->where('user_id', $user_id)
            ->orderBy('id', 'desc');

        $entrys = $where->paginate($this->num_of_page);

        $board_namespace = $this->board_namespace;

        return view('mobile.community.inquire.index', compact('entrys', 'board_namespace'));
    }

    /**
     * 1:1 문의하기 새글작성 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user();
        $board_namespace = $this->board_namespace;

        return view($this->view_path . 'create', compact('board_namespace', 'user'));
    }

    /**
     * 1:1문의 상세보기
     * @param Int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = Auth::user();

        $parent = parent::show($id);
        $data = $parent->data;
        $data->increment('hit');
        $board_namespace = $parent->board_namespace;

        $prev_row = Post::whereBoardId($this->board_id)->where("id", "<", $data->id)->orderBy("id", "DESC")->first();
        if ($prev_row) {
            $prev = $prev_row->id;
        } else {
            $prev = null;
        }

        $next_row = Post::whereBoardId($this->board_id)->where("id", ">", $data->id)->orderBy("id", "ASC")->first();
        if ($next_row) {
            $next = $next_row->id;
        } else {
            $next = null;
        }


        // 파일 다운로드 관련
        $files = File::where('group', 'post')->where('group_id', $id)->get();
        if (!$files) {
            $files = [];
        }
        return view($this->view_path . 'show', compact('data', 'board_namespace', 'prev', 'next', 'files', 'user'));
    }

    /**
     * 1:1문의 저장 메소드
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'password' => 'min:4'
        ]);

        if ($validate->fails()) {
            return redirect()->route('inquire.index')->with('error', '문의가 정상적으로 처리되지 않았습니다.');
        }

        Post::create([
            'board_id' => $this->board_id,
            'user_id' => $user->id,
            'name' => $user->name,
            'is_shown' => 7, // 비공개
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
            'ip' => $request->ip()
        ]);

        return redirect()->route('inquire.index')->with('success', '1:1문의가 등록되었습니다.');
    }

//    todo 현재는 안쓰는 메소드
//    public function chkPassword(Request $request)
//    {
//
//        $this->validate($request, [
//            'id' => 'required|posts,id',
//            'email' => 'email',
//            'passwd' => 'min:4'
//        ],
//            [],
//            [
//                'id' => '문의사항 번호가 잘못되었습니다.',
//                'email' => '작성자이외에 해당 문의사항을 열람할 수 없습니다.',
//                'password' => '비밀번호를 확인해 주세요.'
//            ]
//        );
//
//        $where = Post::where('id', $request->get('id'))->where('email', $request->email)
//            ->where('password', $request->get('password'))->first();
//        if ($where) {
//            $result = ['status' => 'ok', 'message' => ''];
//        } else {
//            $result = ['status' => 'ok', 'message' => ''];
//        }
//
//        return response()->json($result);
//    }


}
