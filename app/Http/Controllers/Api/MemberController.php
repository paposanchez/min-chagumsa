<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 6:23
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    /**
     * @SWG\Get(path="/member/{user_id}/{page}",
     *   tags={"Member"},
     *   summary="회원관리 목록",
     *   description="회원관리 목록 출력",
     *   operationId="memberList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="user_id",
     *     description="User Id",
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
     *     name="num_member",
     *     description="Member number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function memberList($page = 1, $user_id = Null, $num_member = 10){
        return $user = User::all()->toArray();
    }

    /**
     * @SWG\Get(path="/member/{user_id}/edit",
     *   tags={"Member"},
     *   summary="상세보기 및 수정",
     *   description="회원의 정보 수정 가능",
     *   operationId="calculationDetail",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="user_id",
     *     description="User Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function calculationDetail($user_id = Null){
        return $user = User::where('id', $user_id)->toArray();
    }

    /**
     * @SWG\Put(path="/member/add-mem",
     *   tags={"Member"},
     *   summary="회원 추가",
     *   description="회원 정보 추가",
     *   operationId="addMember",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="User",
     *     description="사용자 정보",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/User")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function addMember(Request $request){

    }

    /**
     * @SWG\Post(path="/member/del-mem/{user_id}",
     *   tags={"Member"},
     *   summary="회원 삭제",
     *   description="회원의 정보 삭제",
     *   operationId="delMember",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="user_id",
     *     description="User Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function delMember($user_id){

    }
}