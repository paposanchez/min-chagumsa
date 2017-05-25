<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\ApiController;
use App\Models\Post;

class NoticeController extends ApiController {

    protected $board_id = 1;

    /**
     * @SWG\Get(
     *     path="/notice",
     *     tags={"Board"},
     *     description="공지사항 목록",
     *     operationId="index",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="page",in="query",description="페이지번호",required=false,default=1,type="integer",format="int"),
     *     @SWG\Parameter(name="limit",in="query",description="게시물수",required=false,default=10,type="integer",format="int"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": "123123123123"}
     *     }
     * )
     */
    public function index(Request $request) {
        $where = Post::orderBy('id', 'desc')->where('board_id', $this->board_id);
        $entrys = $where->paginate($request->get('limit'));
        return response()->json($entrys);
    }

    /**
     * @SWG\Get(
     *     path="/notice/{post_id}",
     *     tags={"Board"},
     *     description="공지사항 상세내용",
     *     operationId="show",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="post_id",in="path",description="게시물 번호",required=true,type="integer",format="int"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="object",@SWG\Items(ref="#/definitions/Post"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": "1e212e12e123"}
     *     }
     * )
     */
    public function show($post_id) {
        $post = Post::whereId($post_id)->first();
        if (!$post) {
            return abort(404, trans('common.no-result'));
        }
        return response()->json($post);
    }

}
