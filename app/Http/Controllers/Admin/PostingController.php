<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Post;
use App\Models\Code;
use App\Models\Board;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostingController extends Controller
{

    /**
     * @param Request $request
     * @param int $page
     * 게시글 관리 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $page = 1)
    {

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $where = Post::orderBy('id', 'desc');
        $user = Auth::user();
        $user_roles = $user->roles->pluck('id')->toArray();

        $search_fields = [
            'subject' => '제목', 'content' => '내용', 'name' => '작성자명'
        ];

        // 정렬옵션
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');
        if($sort){
            if($sort == 'status'){
                $where->orderBy('status_cd', $sort_orderby);
            }else{
                $where->orderBy($sort, $sort_orderby);
            }
        }

        //카테고리 검색
        $board_id = $request->get('board_id');
        if ($board_id) {
            $where = $where->where('board_id', $board_id);
        }

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

        if ($sf && $s) {
            $where = $where->where($sf, 'like', '%' . $s . '%');
        }

        $entrys = $where->paginate(10);
//        $entrys = Post::where('id', 72)->paginate(10);
        return view('admin.posting.index', compact('entrys', 'board_list', 'request', 'search_fields', 'board_id', 's', 'sf', 'trs', 'tre', 'user_roles', 'sort', 'sort_orderby'));
    }

    /**
     * 게시글 생성 페이지
     * 1:1문의, 공지사항, faq, bcs공지사항 생성 가능
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $yn_list = Helper::getCodeSelectArray(Code::getCodesByGroup('yn'), 'yn', '답변여부를 선택해주세요.');
        $shown_role_list = Helper::getCodeSelectArray(Code::getCodesByGroup('post_shown_role'), 'post_shown_role', '공개여부를 선택해주세요.');

        $categorys = Code::where('group', 'category_id')->get();
        $roles = Role::getArrayByName();

        return view('admin.posting.create', compact('board_list', 'shown_role_list', 'yn_list', 'categorys', 'roles'));
    }

    /**
     * @param Request $request
     * 게시글 생성 메소드
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'board_id' => 'required|exists:boards,id',
            'user_id' => 'exists:users,id',
            'is_shown' => [
                'required',
                Rule::in(Code::getCodeFieldArray('post_shown_role')->toArray()),
            ],
            'is_answered' => 'boolean',
            'thumbnail' => 'exists:files,id',
            'name' => 'min:1',
            'email' => 'email',
//            'password' => 'nullable|min:4',
            'roles' => 'required'
        ],
            [],
            [
                'board_id' => trans('admin/post.board_id'),
                'user_id' => trans('admin/post.user_id'),
                'is_shown' => trans('admin/post.is_shown'),
                'is_answered' => trans('admin/post.is_answered'),
                'thumbnail' => trans('admin/post.thumbnail'),
                'name' => trans('admin/post.name'),
                'email' => trans('admin/post.email'),
//                'password' => trans('admin/post.password'),
                'subject' => trans('admin/post.subject'),
                'content' => trans('admin/post.content')
            ]);

        $post = new Post();
        $post->subject = $request->get('subject');
        $post->board_id = $request->get('board_id');
        if ($request->get('board_id') == 4) {
            $post->content = $request->get('content2');
        } else {
            $post->content = $request->get('content');
        }

        $post->user_id = $request->get('user_id');
//        $post->password = $request->get('password');
        if ($request->get('board_id') == 2) {
            $post->category_id = $request->get('category_id');
        }
        $post->is_shown = $request->get('is_shown');
        $post->is_answered = $request->get('is_answered') ? $request->get('is_answered') : 0;
        $post->name = $request->get('name');
        $post->is_shown = $request->get('is_shown');
        $post->ip = $request->ip();
        $post->roles = \GuzzleHttp\json_encode($request->get('roles'));
        $post->save();

        return redirect()
            ->route('posting.index')
            ->with('success', trans('admin/post.created'));
    }

    /**
     * @param Int $id
     * 게시글 수정 페이지
     * 게시물의 seq를 이용해 해당 게시물의 정보를 호출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $board_list = Board::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $yn_list = Helper::getCodeSelectArray(Code::getCodesByGroup('yn'), 'yn', '답변여부를 선택해주세요.');
        $shown_role_list = Helper::getCodeSelectArray(Code::getCodesByGroup('post_shown_role'), 'post_shown_role', '공개여부를 선택해주세요.');
        $categorys = Code::where('group', 'category_id')->get();

        $roles = Role::getArrayByName();
        if($post->roles){
            $user_roles = \GuzzleHttp\json_decode($post->roles);
        }else{
            $user_roles = [];
        }


        return view('admin.posting.edit', compact('post', 'board_list', 'shown_role_list', 'yn_list', 'categorys', 'roles', 'user_roles'));
    }

    /**
     * @param Request $request
     * @param Int $id
     * 게시물의 seq를 이용해 해당 게시물의 정보를 수정
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required|min:1',
            'content' => 'required|min:1',
            'board_id' => 'required|exists:boards,id',
            'category' => 'exists:categorys,id',
            'is_shown' => [
                'required',
                Rule::in(Code::getCodeFieldArray('post_shown_role')->toArray()),
            ],
            'is_answered' => 'boolean',
            'thumbnail' => 'exists:files,id',
            'email' => 'email',
//            'password' => 'nullable|min:4',
            'roles' => 'required'
        ], [], [
            'board_id' => trans('admin/post.board_id'),
            'user_id' => trans('admin/post.user_id'),
            'category' => trans('admin/post.category'),
            'is_shown' => trans('admin/post.is_shown'),
            'is_answered' => trans('admin/post.is_answered'),
            'thumbnail' => trans('admin/post.thumbnail'),
            'name' => trans('admin/post.name'),
            'email' => trans('admin/post.email'),
//            'password' => trans('admin/post.password'),
            'subject' => trans('admin/post.subject'),
            'content' => trans('admin/post.content')
        ]);


        $input = $request->all();
//        if (!empty($input['password'])) {
//            $input['password'] = bcrypt($input['password']);
//        } else {
//            $input = array_except($input, array('password'));
//        }

        $post = Post::findOrFail($id);
        $post->subject = $request->get('subject');
        $post->content = $request->get('content');
        $post->board_id = $request->get('board_id');
        //todo 현재 비밀번호 기능은 비활성화
        // $post->password = $request->get('password');
        if ($request->get('board_id') == 2) {
            $post->category_id = $request->get('category_id');
        } else if ($request->get('board_id') == 3) {
            $post->answer = $request->get('answer');
        }
        $post->is_shown = $request->get('is_shown');
        $post->is_answered = $request->get('is_answered') ? $request->get('is_answered') : 0;
        $post->name = $request->get('name');
        $post->is_shown = $request->get('is_shown');
        $post->ip = $request->ip();
        $post->updated_at = Carbon::now();
        $post->roles = \GuzzleHttp\json_encode($request->get('roles'));
        $post->save();

        return redirect()
            ->back()
            ->with('success', trans('admin/post.updated'));
    }

    public function destroy(Request $request, $id)
    {
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect()->route('posting.index')->with('success', '게시물을 삭제하였습니다.');
    }

}
