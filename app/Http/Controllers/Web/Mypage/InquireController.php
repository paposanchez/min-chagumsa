<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class InquireController extends PostController
{

    protected $board_id = 3;
    protected $board_namespace = "inquire";
    protected $config;
    protected $view_path = 'web.community.inquire.';

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

        $start_num = \App\Helpers\Helper::getStartNum($entrys);

        return view($this->view_path . 'index', compact('entrys','board_namespace', 'start_num'));
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
        $data = Post::findOrFail($id);
        $data->increment('hit');
        $board_namespace = $this->board_namespace;

        if ($user->id != $data->user_id) {
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }

        // 파일 다운로드 관련
        $files = File::where('group', 'post')->where('group_id', $id)->get();
        if (!$files) {
            $files = [];
        }
        return view($this->view_path . 'show', compact('data', 'board_namespace', 'files', 'user'));
    }

    /**
     * 1:1문의 저장 메소드
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'content' => 'required|min:1',
            'email' => 'email'
        ], [], [
            'email' => trans('admin/post.email'),
            'subject' => trans('admin/post.subject'),
            'content' => trans('admin/post.content')
        ]);

        $user = Auth::user();

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

    /**
     * @param Int $id
     * 1:1 문의 수정 페이지
     * 게시물 번호를 이용하여 기존의 게시물 정보를 노출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = Auth::user();
        $data = Post::findOrFail($id);
        $board_namespace = $this->board_namespace;

        if ($user->id != $data->user_id) {
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }

        // 파일 다운로드 관련
        $files = File::where('group', 'post')->where('group_id', $id)->get();
        return view($this->view_path . 'edit', compact('data', 'board_namespace', 'files', 'user'));
    }

    /**
     * @param Request $request
     * @param Int $id
     * 1:1문의 수정 메소드
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'subject' => 'required|min:1',
            'content' => 'required|min:1',
            'email' => 'email'
        ], [], [
            'email' => trans('admin/post.email'),
            'subject' => trans('admin/post.subject'),
            'content' => trans('admin/post.content')
        ]);

        $data = Post::findOrFail($id);
        $user = Auth::user();

        if ($user->id != $data->user_id) {
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }


        if ($data->is_answered) {
            return redirect()->back()->with('error', '답변된 문의는 수정할 수 없습니다.');
        }

        $data->subject = $request->get('subject');
        $data->content = $request->get('content');
        $data->email = $request->get('email');
        $data->ip = $request->ip();
        $data->updated_at = Carbon::now();
        $data->save();

        return redirect()
            ->route('inquire.show', [$data->id])
            ->with('success', '1:1문의가 수정되었습니다.');
    }

    /**
     * 1:1 문의 삭제
     * @param Int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);

        $user = Auth::user();

        if ($user->id != $data->user_id) {
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }

        if ($data->is_answered) {
            return redirect()->back()->with('error', '답변된 문의는 삭제할 수 없습니다.');
        }

        $data->delete();

        return redirect()
            ->route('inquire.index')
            ->with('success', '삭제되었습니다.');
    }


}
