<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Models\File;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index(Request $request, $page = 1) {

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $yn_list = Code::getSelectList('yn');
        $shown_role_list = Code::getSelectList('post_shown_role');
        $search_fields = Code::getSelectList('post_search_field');

        $where = Post::orderBy('id', 'desc');

        if ($request->query('board_id')) {
            $where->where('board_id', $request->query('board_id'));
        }

        if ($request->query('trs')) {
            $where->where('created_at', '>=', $request->query('trs') . ' 00:00:00');
        }

        if ($request->query('tre')) {
            $where->where('created_at', '<', $request->query('tre') . ' 00:00:00');
        }

        if ($request->query('sf') && $request->query('s')) {

            if ($request->query('sf') == 'subject') {
                $where->where('subject', $request->query('s'));
            }
            if ($request->query('sf') == 'content') {
                $where->where('content', $request->query('s'));
            }
            if ($request->query('sf') == 'writer_name') {
                $where->where('name', $request->query('s'))
                        ->orWhere('email', $request->query('s'));
            }
        }


        $entrys = $where->paginate(10);


        return view('admin.post.index', compact('entrys', 'board_list', 'shown_role_list', 'yn_list', 'request', 'search_fields'));
    }

    public function create() {

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

        $yn_list = Code::getSelectList('yn');
        $shown_role_list = Code::getSelectList('post_shown_role');

        $categorys = Code::where('group', 'category_id')->get();


        return view('admin.post.create', compact('board_list', 'shown_role_list', 'yn_list', 'categorys'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'content' => 'required|min:1',
            'board_id' => 'required|exists:boards,id',
            'user_id' => 'exists:users,id',
//            'category_id' => 'exists:categorys,id',
            'is_shown' => [
                'required',
                Rule::in(Code::getCodeFieldArray('post_shown_role')->toArray()),
            ],
            'is_answered' => [
                'required',
                Rule::in(Code::getCodeFieldArray('yn')->toArray()),
            ],
            'thumbnail' => 'exists:files,id',
            'name' => 'min:1',
            'email' => 'email',
            'password' => 'min:4',
                ], [], [
            'board_id' => trans('admin/post.board_id'),
            'user_id' => trans('admin/post.user_id'),
//            'category_id' => trans('admin/post.category'),
            'is_shown' => trans('admin/post.is_shown'),
            'is_answered' => trans('admin/post.is_answered'),
            'thumbnail' => trans('admin/post.thumbnail'),
            'name' => trans('admin/post.name'),
            'email' => trans('admin/post.email'),
            'password' => trans('admin/post.password'),
            'subject' => trans('admin/post.subject'),
            'content' => trans('admin/post.content')
        ]);

        $post = new Post();
        $post -> subject = $request->get('subject');
        $post -> content = $request->get('content');
        $post -> board_id = $request->get('board_id');
        $post -> user_id = $request->get('user_id');
        $post -> password = $request->get('password');
        if($request->get('board_id') == 2){
            $post -> category_id = $request->get('category_id');
        }
        $post -> is_shown = $request->get('is_shown');
        $post -> is_answered = $request->get('is_answerd');
        $post -> name = $request->get('name');
        $post -> is_shown = $request->get('is_shown');
        $post -> ip = $request->ip();
        $post -> created_at = Carbon::now();
        $post -> updated_at = Carbon::now();
        $post -> save();


        $upfiles = $request->get("upfile");
        if (count($upfiles) > 0) {
//            File::query();
        }


        return redirect()
//                        ->route('post.edit', $post->id)
                        ->route('post.index')
                        ->with('success', trans('admin/post.created'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

//        $yn_list = Code::getCodesByGroup('yn');
        $yn_list = Code::getSelectList('yn');
        
        $shown_role_list = Code::getSelectList('post_shown_role');

        $categorys = Code::where('group', 'category_id')->get();

        return view('admin.post.edit', compact('post', 'board_list', 'shown_role_list', 'yn_list', 'categorys'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'subject' => 'required|min:1',
            'content' => 'required|min:1',
            'board_id' => 'required|exists:boards,id',
            'user_id' => 'exists:users,id',
            'category' => 'exists:categorys,id',
            'is_shown' => [
                'required',
                Rule::in(Code::getCodeFieldArray('post_shown_role')->toArray()),
            ],
            'is_answered' => [
                'required',
                Rule::in(Code::getCodeFieldArray('yn')->toArray()),
            ],
            'thumbnail' => 'exists:files,id',
            'name' => 'min:1',
            'email' => 'email',
            'password' => 'min:4',
                ], [], [
            'board_id' => trans('admin/post.board_id'),
            'user_id' => trans('admin/post.user_id'),
            'category' => trans('admin/post.category'),
            'is_shown' => trans('admin/post.is_shown'),
            'is_answered' => trans('admin/post.is_answered'),
            'thumbnail' => trans('admin/post.thumbnail'),
            'name' => trans('admin/post.name'),
            'email' => trans('admin/post.email'),
            'password' => trans('admin/post.password'),
            'subject' => trans('admin/post.subject'),
            'content' => trans('admin/post.content')
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $input['ip'] = $request->ip();

        $post = Post::findOrFail($id);
//        $post->update($input);
        $post -> subject = $request->get('subject');
        $post -> content = $request->get('content');
        $post -> board_id = $request->get('board_id');
        $post -> user_id = $request->get('user_id');
        $post -> password = $request->get('password');
        if($request->get('board_id') == 2){
            $post -> category_id = $request->get('category_id');
        }
        $post -> is_shown = $request->get('is_shown');
        $post -> is_answered = $request->get('is_answerd');
        $post -> name = $request->get('name');
        $post -> is_shown = $request->get('is_shown');
        $post -> ip = $request->ip();
        $post -> updated_at = Carbon::now();
        $post -> save();

        return redirect()
//                        ->route('post.edit', $post->id)
                        ->route('post.index')
                        ->with('success', trans('admin/post.updated'));
    }

    public function destory($id) {
        $data = Post::findOrFail($id);
        $data->destory();
    }

}
