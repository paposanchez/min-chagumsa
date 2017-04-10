<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Models\File;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class CommentController extends Controller {

    public function index(Request $request, $page = 1) {

        $yn_list = Code::getCodesByGroup('yn');
        $shown_role_list = Code::getCodesByGroup('post_shown_role');

        $where = Comment::orderBy('id', 'desc');
        if ($request->query('board_id')) {

            $where->where('board_id', $request->query('board_id'));
        }

        $entrys = $where->paginate(25);


        return view('admin.comment.index', compact('entrys', 'board_list', 'shown_role_list', 'yn_list', 'request'));
    }

    public function create() {
        $yn_list = Code::getCodesByGroup('yn');
        $shown_role_list = Code::getCodesByGroup('post_shown_role');

        return view('admin.comment.create', compact('board_list', 'shown_role_list', 'yn_list'));
    }

    public function store(Request $request) {

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
            'board_id' => trans('admin/posts.board_id'),
            'user_id' => trans('admin/posts.user_id'),
            'category' => trans('admin/posts.category'),
            'is_shown' => trans('admin/posts.is_shown'),
            'is_answered' => trans('admin/posts.is_answered'),
            'thumbnail' => trans('admin/posts.thumbnail'),
            'name' => trans('admin/posts.name'),
            'email' => trans('admin/posts.email'),
            'password' => trans('admin/posts.password'),
            'subject' => trans('admin/posts.subject'),
            'content' => trans('admin/posts.content')
        ]);


        $input = $request->all();
        $input['ip'] = $request->ip();
        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();
        $post = Comment::create($input);

        $upfiles = $request->get("upfile");
        if (count($upfiles) > 0) {
//            File::query();
        }


        return redirect()
                        ->route('post.edit', $post->id)
                        ->with('success', trans('admin/posts.created'));
    }

    public function edit($id) {
        $post = Comment::findOrFail($id);

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

        $yn_list = Code::getCodesByGroup('yn');
        $shown_role_list = Code::getCodesByGroup('post_shown_role');

        return view('admin.comment.edit', compact('post', 'board_list', 'shown_role_list', 'yn_list'));
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
            'board_id' => trans('admin/posts.board_id'),
            'user_id' => trans('admin/posts.user_id'),
            'category' => trans('admin/posts.category'),
            'is_shown' => trans('admin/posts.is_shown'),
            'is_answered' => trans('admin/posts.is_answered'),
            'thumbnail' => trans('admin/posts.thumbnail'),
            'name' => trans('admin/posts.name'),
            'email' => trans('admin/posts.email'),
            'password' => trans('admin/posts.password'),
            'subject' => trans('admin/posts.subject'),
            'content' => trans('admin/posts.content')
        ]);


        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $input['ip'] = $request->ip();

        $post = Comment::findOrFail($id);
        $post->update($input);

        return redirect()
                        ->route('post.edit', $post->id)
                        ->with('success', trans('admin/posts.updated'));
    }

    public function delete($id) {
        $data = Comment::findOrFail($id);
    }

}
