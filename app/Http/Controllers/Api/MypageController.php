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
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function changeCarInfo($order_id){

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
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function changeStockInfo($order_id){

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


}