<?php

namespace App\Http\Controllers\Api;

use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Api\ApiController;
use App\Models\Post;
use Carbon\Carbon;

class NoticeController extends ApiController {

        protected $board_id = 1;

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
        public function index(Request $request)
        {

                try {

                        // $requestData = $request->validate([
                        //         'user_id'       => 'required|exists:users,id',
                        //         'date'          => 'required|date_format:Y-m-d',
                        //         'status_cd'     => 'required|in:112,113,114,115,116',
                        // ]);



                        $entrys =  Post::orderBy('id', 'desc')
                        ->where('is_shown', 6)
                        ->where('board_id', $this->board_id)
                        ->select('id', 'subject', 'content', 'created_at')
                        ->paginate(10);

                        return response()->json([
                                "status"        => 'success',
                                "data"          => [
                                        "total"         => $entrys->total(),
                                        "page"          => $entrys->currentPage(),
                                        "hasNext"       => $entrys->hasMorePages(),
                                        "entrys"        => $entrys->items()
                                ]
                        ]);

                }catch (Exception $e){
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
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
                try{

                        $requestData = $request->validate([
                                'post_id'       => 'required|exists:posts,id',
                        ]);

                        $post = Post::findOrFail($request->get('post_id'));

                        return response()->json([
                                "status" => 'success',
                                "data" => [
                                        'id'            => $post->id,
                                        'subject'       => $post->subject,
                                        'content'       => $post->content,
                                        'created_at'    => $post->created_at,
                                        'updated_at'    => $post->updated_at,
                                ]
                        ]);
                }catch (\Exception $e){
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
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

                try{
                        $count = Post::where('board_id', $this->board_id)->where('created_at', ">=", Carbon::yesterday())->count();

                        return response()->json([
                                "status" => 'success',
                                "total"  => $count
                        ]);
                }catch (Exception $e){
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

        }


}
