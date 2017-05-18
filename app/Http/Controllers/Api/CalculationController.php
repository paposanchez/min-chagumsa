<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 6:11
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class CalculationController extends Controller
{
    /**
     * @SWG\Get(path="/calculation/{order_id}/{page}",
     *   tags={"Calculation"},
     *   summary="정산관리 목록",
     *   description="정산관리 목록 출력",
     *   operationId="calculationList",
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
    public function calculationList($page = 1, $order_id = Null, $num_order = 10){
        $calculationList = \App\Models\Order::where('page', $page)->where('id', $order_id);

        //페이지번호, 총 페이지 번호

        return $calculationList->toArray();
    }

    /**
     * @SWG\Get(path="/calculation/view/{order_id}",
     *   tags={"Calculation"},
     *   summary="상세보기",
     *   description="정산관리에 대한 상세목록 출력",
     *   operationId="calculationDetail",
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
    public function calculationDetail($order_id = Null){
        $calculationView = \App\Models\Order::find($order_id);

        return $calculationView->toArray();
    }


}