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
};