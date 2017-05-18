<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller{

    /**
     * @SWG\Put(path="/order",
     *   tags={"Order"},
     *   summary="인증서 - 기본정보 입력",
     *   description="인증 받고자 하는 차량의 정보 입력",
     *   operationId="order",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function order(Request $request){

    }

    /**
     * @SWG\Put(path="/order/reservation",
     *   tags={"Order"},
     *   summary="입고정보 선택",
     *   description="어느 정비소에 맡길 것인지를 채크",
     *   operationId="reservationEdit",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function reservationEdit(Request $request){

    }

    /**
     * @SWG\Put(path="/order/purchase/",
     *   tags={"Order"},
     *   summary="결제하기",
     *   description="신청정보를 확인하며, 결제 진행",
     *   operationId="getPosts",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function pushPurchase(Request $request){

    }

    /**
     * @SWG\Get(path="/order/complete/{order_id}",
     *   tags={"Order"},
     *   summary="주문 완료",
     *   description="주문 완료 후 결제정보",
     *   operationId="getPosts",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="board_id",
     *     description="Board Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getPurchace($order_id){
        $order = Order::whereOrderId($order_id)->first();
    }

    /**
     * @SWG\Get(path="/order/{order_id}/{page}",
     *   tags={"Order"},
     *   summary="주문관리 목록",
     *   description="주문관리 목록 출력",
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
     *     description="Post number of a request",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function orderList($page = 1, $order_id = Null, $num_order = 10){
        $orderList = \App\Models\Order::where('page', $page)->where('id', $order_id);
        $orderListRepository = $orderList->select('id', 'status_cd', 'orderere_name', 'orderer_mobile', 'created_at', 'agent_id', '정비사', '기술사');
        //페이지번호, 총 페이지 번호

        return $orderListRepository->toArray();
    }


    /**
     * @SWG\Get(path="/order/view/{order_id}",
     *   tags={"Order"},
     *   summary="상세보기",
     *   description="주문에 대한 상세목록 출력",
     *   operationId="orderDetail",
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
    public function orderDetail($order_id = Null){
        $orderView = \App\Models\Order::find($order_id);
        $orderDetailRepository = $orderView->select('id', '기본정보', '주요외판', '주요내판/골격', '사고수리/상태', '');
        return $orderDetailRepository->toArray();
    }

    /**
     * @SWG\Put(path="/order/{order_id}/edit",
     *   tags={"Order"},
     *   summary="주문관리 내용 수정",
     *   description="주문관리에 대한 내용 수정",
     *   operationId="orderEdit",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="order",
     *     description="Inquire Context",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Order")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function orderEdit($order_id, Request $request){

    }

    //mobile

    /**
     * @SWG\Get(path="/diagnosis-reservation/{order_id}",
     *   tags={"Order"},
     *   summary="입고예약",
     *   description="입고예약된 주문 목록 출력",
     *   operationId="diagnosisReservationList",
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
    public function diagnosisReservationList($order_id = null){
        //        return $complete_order = Order::where('id', $order_id)->where('status_cd', default)->json();
    }

};