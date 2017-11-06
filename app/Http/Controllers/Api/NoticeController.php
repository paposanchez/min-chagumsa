<?php

namespace App\Http\Controllers\Api;

use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use Carbon\Carbon;

class NoticeController extends ApiController {

    protected $board_id = 4;

    /**
     * @SWG\Get(
     *     path="/notice",
     *     tags={"Board"},
     *     summary="공지사항 목록",
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
        $where = Post::orderBy('id', 'desc')->where('is_shown', 6)->where('board_id', $this->board_id);
        $entrys = $where->select('id', 'subject', 'content', 'created_at')->paginate($request->get('limit'));
        return response()->json($entrys);
    }

    /**
     * @SWG\Get(
     *     path="/notice/show",
     *     tags={"Board"},
     *     summary="공지사항 상세내용",
     *     description="공지사항 상세내용",
     *     operationId="show",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="post_id",in="query",description="게시물 번호",required=true,type="integer",format="int"),
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
    public function show(Request $request) {
        $post = Post::whereId($request->get('post_id'))->select('id', 'subject', 'content', 'created_at')->first();
        if (!$post) {
            return response()->json('fail');
        }
        return response()->json($post);
    }

    /**
     * @SWG\Get(
     *     path="/notice/news",
     *     tags={"Board"},
     *     summary="공지사항 신규게시물 갯수",
     *     description="공지사항 신규게시물 갯수",
     *     operationId="news",
     *     produces={"application/json"},
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="integer")
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": "123123123123"}
     *     }
     * )
     */
    public function news(Request $request) {
        $return = Post::where('board_id', $this->board_id)->where('created_at', ">=", Carbon::yesterday())->count();
        return response()->json($return);
    }


}
