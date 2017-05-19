<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 4:23
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    /**
     * @SWG\Get(path="/mypage/order/{page}/{order_id}/{num_post}",
     *   tags={"Mypage"},
     *   summary="MyPage-주문목록",
     *   description="나의 주문목록의 상태를 출력",
     *   operationId="orderList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="order_id",
     *     description="Order Id",
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
     *     name="num_order",
     *     description="order number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function orderList($page = 1, $order_id, $num_order = 10){
        return Order::where('id', $order_id)
                        ->orderBy('id', 'desc')
                        ->simplePaginate($num_order)->toArray();
    }


    /**
     * @SWG\Get(path="/mypage/order/view/{order_id}",
     *   tags={"Mypage"},
     *   summary="주문목록 상세",
     *   description="주문목록의 상세정보 출",
     *   operationId="orderList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="order_id",
     *     description="Order Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function orderDetail($order_id){
        return Order::where('id', $order_id)->first()->toArray();
    }


    /**
     * @SWG\Put(path="/mypage/order/ch-car-info/{order_id}",
     *   tags={"Mypage"},
     *   summary="차량 정보 변경",
     *   description="기본정보 입력 내용을 다시 설정",
     *   operationId="changeCarInfo",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="order_id",
     *     description="Order Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="order",
     *     description="기본정보 변경 값",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/DiagnosisDetail")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function changeCarInfo($order_id, Request $request){

    }

    /**
     * @SWG\Put(path="/mypage/order/ch-stock-info/{order_id}",
     *   tags={"Mypage"},
     *   summary="입고 정보 변경",
     *   description="입고하고자 하는 정비소를 변경",
     *   operationId="changeStockInfo",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="order_id",
     *     description="Order Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="order",
     *     description="입고정보 변경 값",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/DiagnosisDetail")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function changeStockInfo($order_id, Request $request){

    }

    /**
     * @SWG\Post(path="/mypage/order/cansel/{order_id}",
     *   tags={"Mypage"},
     *   summary="취소 신청",
     *   description="차량 인증서 신청을 취소",
     *   operationId="orderCansel",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="order_id",
     *     description="Order Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function orderCansel($order_id){

    }

    /**
     * @SWG\Put(path="/mypage/edit",
     *   tags={"Mypage"},
     *   summary="회원정보 수정",
     *   description="비밀번호를 변경",
     *   operationId="edit",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function edit(Request $request){

    }

    //mobile


    /**
     * @SWG\Get(path="/mypage-information/{user_id}",
     *   tags={"Mypage"},
     *   summary="모바일 마이페이지",
     *   description="정비사의 정보를 출력",
     *   operationId="mypageInfo",
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
    public function mypageInfo($user_id){
        return $user = User::where('id', $user_id)->first()->json();
    }

    /**
     * @SWG\Put(path="/mypage-change-password/{user_id}/{password}/{password2}",
     *   tags={"Mypage"},
     *   summary="모바일 패스워드 변경",
     *   description="정비사의 정보를 출력",
     *   operationId="changePassword",
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
     *     name="password",
     *     description="password",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="password2",
     *     description="Password2",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function changePassword($user_id, $password, $password2){
//        $user = User::where('id', $user_id);
    }


}