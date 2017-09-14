<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class InquireController extends PostController {

        protected $board_id = 3;
        protected $board_namespace = "inquire";
        protected $config;
        protected $view_path = 'web.community.inquire.';

        public function __construct()
        {
                $this->middleware('auth');

                parent::__construct();
        }

        public function index(){
                $user = Auth::user();

                $where = Post::whereBoardId($this->board_id)
                ->orderBy('id', 'desc');

                $entrys = $where->where('user_id', $user->id)->paginate($this->num_of_page);

                $board_namespace = $this->board_namespace;

                $start_num = \App\Helpers\Helper::getStartNum($entrys);
                return view($this->view_path . 'index', compact('entrys', 'board_namespace', 'start_num', 'user'));

        }

        public function create() {
                $user = Auth::user();
                $board_namespace = $this->board_namespace;

                return view($this->view_path . 'create', compact('board_namespace', 'user'));
        }

        public function show($id){
                $user = Auth::user();
                $data = Post::findOrFail($id);
                $data->increment('hit');
                $board_namespace = $this->board_namespace;

                if($user->id != $data->user_id)
                {
                        return redirect()->back()->with('error', '잘못된 접근입니다.');
                }

                // 파일 다운로드 관련
                $files = File::where('group', 'post')->where('group_id', $id)->get();
                return view($this->view_path . 'show', compact('data', 'board_namespace', 'files', 'user'));
        }

        public function store(Request $request){

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

        public function edit($id) {
                $user = Auth::user();
                $data = Post::findOrFail($id);
                $board_namespace = $this->board_namespace;

                if($user->id != $data->user_id)
                {
                        return redirect()->back()->with('error', '잘못된 접근입니다.');
                }

                // 파일 다운로드 관련
                $files = File::where('group', 'post')->where('group_id', $id)->get();
                return view($this->view_path . 'edit', compact('data', 'board_namespace', 'files', 'user'));
        }

        public function update(Request $request, $id) {

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

                if($user->id != $data->user_id)
                {
                        return redirect()->back()->with('error', '잘못된 접근입니다.');
                }


                if($data->is_answered == 1)
                {
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

        public function destroy($id) {

                $data = Post::findOrFail($id);

                $user = Auth::user();

                if($user->id != $data->user_id)
                {
                        return redirect()->back()->with('error', '잘못된 접근입니다.');
                }

                if($data->is_answered == 1)
                {
                        return redirect()->back()->with('error', '답변된 문의는 삭제할 수 없습니다.');
                }

                $data->delete();

                return redirect()
                ->route('inquire.index')
                ->with('success', '삭제되었습니다.');


        }


}
