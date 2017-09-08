<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use App\Models\Role;
use App\Models\Code;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class BoardController extends Controller {

    public function index() {
        $where = Board::orderBy('id', 'DESC');
        $entrys = $where->paginate(20);

        return view('admin.board.index', compact('entrys'));
    }

    public function create() {
        $status_cd_list = Code::whereGroup('yn')->get();
        
        return view('admin.board.create', compact('status_cd_list'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:2',
            'use_secret' => 'boolean',
            'use_captcha' => 'boolean',
            'use_comment' => 'boolean',
            'use_opinion' => 'boolean',
            'use_tag' => 'boolean',
            'use_category' => 'boolean',
            'use_upload' => 'boolean',
            'use_thumbnail' => 'boolean',
            'upload_max_filesize' => 'numeric',
            'upload_max_limit' => 'numeric',
            'status_cd' => [
                'required',
                Rule::in(Code::getCodeFieldArray('yn')->toArray()),
            ]
                ], [], [
            'name' => trans('admin/board.name'),
            'use_secret' => trans('admin/board.use_secret'),
            'use_captcha' => trans('admin/board.use_captcha'),
            'use_comment' => trans('admin/board.use_comment'),
            'use_opinion' => trans('admin/board.use_opinion'),
            'use_tag' => trans('admin/board.use_tag'),
            'use_category' => trans('admin/board.use_category'),
            'use_point' => trans('admin/board.use_point'),
            'use_upload' => trans('admin/board.use_upload'),
            'use_thumbnail' => trans('admin/board.use_thumbnail'),
            'upload_max_filesize' => trans('admin/board.upload_max_filesize'),
            'upload_max_limit' => trans('admin/board.upload_max_limit'),
            'status_cd' => trans('admin/board.status_cd'),
        ]);

        $input = $request->all();

        if (!$request->get('upload_max_filesize')) {
            $input['upload_max_filesize'] = 0;
        }

        if (!$request->get('upload_max_limit')) {
            $input['upload_max_limit'] = 0;
        }

        $board = Board::create($input);

        return redirect()
                        ->route('board.edit', $board->id)
                        ->with('success', trans('admin/board.created'));
    }

    public function edit($id) {
        $board = Board::findorFail($id);
        $status_cd_list = Code::whereGroup('yn')->get();
        return view('admin.board.edit', compact('board', 'status_cd_list'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|min:2',
            'use_secret' => 'boolean',
            'use_captcha' => 'boolean',
            'use_comment' => 'boolean',
            'use_opinion' => 'boolean',
            'use_tag' => 'boolean',
            'use_category' => 'boolean',
            'use_upload' => 'boolean',
            'use_thumbnail' => 'boolean',
            'upload_max_filesize' => 'integer|between:0,2000',
            'upload_max_limit' => 'integer|between:0,5',
            'status_cd' => [
                'required',
                Rule::in(Code::getCodeFieldArray('yn')->toArray()),
            ]
                ], [], [
            'name' => trans('admin/board.name'),
            'use_secret' => trans('admin/board.use_secret'),
            'use_captcha' => trans('admin/board.use_captcha'),
            'use_comment' => trans('admin/board.use_comment'),
            'use_opinion' => trans('admin/board.use_opinion'),
            'use_tag' => trans('admin/board.use_tag'),
            'use_category' => trans('admin/board.use_category'),
            'use_point' => trans('admin/board.use_point'),
            'use_upload' => trans('admin/board.use_upload'),
            'use_thumbnail' => trans('admin/board.use_thumbnail'),
            'upload_max_filesize' => trans('admin/board.upload_max_filesize'),
            'upload_max_limit' => trans('admin/board.upload_max_limit'),
            'status_cd' => trans('admin/board.status_cd'),
        ]);

        $input = $request->all();

        if (!$request->get('upload_max_filesize')) {
            $input['upload_max_filesize'] = 0;
        }

        if (!$request->get('upload_max_limit')) {
            $input['upload_max_limit'] = 0;
        }

        $board = Board::find($id);
        $board->update([
            'use_secret' => $request->get('use_secret') ? $request->get('use_secret') : 0,
            'use_captcha' => $request->get('use_captcha') ? $request->get('use_captcha') : 0,
            'use_comment' => $request->get('use_comment') ? $request->get('use_comment') : 0,
            'use_opinion' => $request->get('use_opinion') ? $request->get('use_opinion') : 0,
            'use_tag' => $request->get('use_tag') ? $request->get('use_tag') : 0,
            'use_category' => $request->get('use_category') ? $request->get('use_category') : 0,
            'use_upload' => $request->get('use_upload') ? $request->get('use_upload') : 0,
            'use_thumbnail' => $request->get('use_thumbnail') ? $request->get('use_thumbnail') : 0
        ]);


        return redirect()
                        ->route('board.edit', $board->id)
                        ->with('success', trans('admin/board.updated'));
    }

    public function destroy(Request $request, $id) {
        $board = Board::findOrFail($id);
        $board->delete();

        return redirect()
                        ->route('board.index')
                        ->with('success', trans('admin/board.destroyed'));
    }

}
