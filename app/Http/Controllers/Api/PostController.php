<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller {

    /**
     * @SWG\Get(path="/posts/{board_id}/{page}/{num_post}",
     *   tags={"Post"},
     *   summary="Get all post in a board",
     *   description="This can only be done by the logged in user.",
     *   operationId="getPosts",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="board_id",
     *     description="Board Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page Number",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="num_post",
     *     description="Post number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getPosts($board_id, $page = 1, $num_post = 10) {
        return Post::whereBoardId($board_id)
                        ->orderBy('id', 'desc')
                        ->simplePaginate($num_post)->toArray();
    }

    /**
     * @SWG\Get(path="/post/{board_id}/{id}",
     *   tags={"Post"},
     *   summary="Get a post by id",
     *   description="",
     *   operationId="getPost",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="board_id",
     *     description="Board Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="id",
     *     description="Post Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getPost($board_id, $id) {
        $post = Post::whereBoardId($board_id)->whereId($id)->first();

        return response()->json([
                    "id" => $post->id,
                    "board_id" => $post->board_id,
                    "user_id" => $post->user_id,
                    "category_id" => $post->category_id,
                    "is_secret" => $post->is_secret,
                    "is_answered" => $post->is_answered,
                    "is_shown" => $post->is_shown,
                    "thumbnail" => $post->thumbnail,
                    "subject" => $post->subject,
                    "content" => $post->content,
                    "name" => $post->name,
                    "email" => $post->email,
                    "hit" => $post->hit,
                    "ip" => $post->ip,
                    "created_at" => $post->created_at,
                    "updated_at" => $post->updated_at,
                    "deleted_at" => $post->deleted_at,
                    "files" => $post->files(),
                    "comments" => $post->comments()
        ]);
    }

}
