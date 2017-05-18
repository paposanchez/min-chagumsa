<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 3:47
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Certificate;
use phpDocumentor\Reflection\Types\Null_;

class MyReportController extends Controller
{
    /**
     * @SWG\Get(path="/myreport/{page}/{user_id}",
     *   tags={"MyReport"},
     *   summary= "My 인증서",
     *   description="신청내역을 출력",
     *   operationId="getReports",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page",
     *     required=true,
     *     type="integer"
     *   ),
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
    public function getReports($page = 1, $user_id = null){
        $report = Certificate::where($user_id)->first();
    }

    /**
     * @SWG\Get(path="/myreport/view/{order_id}",
     *   tags={"MyReport"},
     *   summary= "인증서 상세보기",
     *   description="인증서의 상세냐역을 출력한다",
     *   operationId="getReports",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function reportDetail($order_id){
        $report = Certificate::where('order_id', $order_id)->toArray();
    }

}