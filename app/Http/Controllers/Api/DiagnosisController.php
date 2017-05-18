<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 18.
 * Time: PM 8:07
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\DiagnosisDetails;
use App\Models\Order;

class DiagnosisController extends Controller
{

    /**
     * @SWG\Get(path="/diagnosis/{engineer_id}",
     *   tags={"Diagnosis"},
     *   summary="진단목록",
     *   description="진단하기를 눌러 진단을 시행한 주문 출력",
     *   operationId="diagnosisList",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="engineer_id",
     *     description="Engineer Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function diagnosisList($engineer_id){
        return $order_list = Order::where('engineer_id', $engineer_id)->json();
    }

    /**
     * @SWG\Get(path="/start-diagnosis/{order_id}",
     *   tags={"Diagnosis"},
     *   summary="진단할 목록 선택",
     *   description="진단하기 선택 후 진단할 항목 출력",
     *   operationId="diagnosisItem",
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
    public function diagnosisItem($order_id){
        return $diagnosis_item = Diagnosis::where($order_id)->json();
    }

//    public function diagnosisGroup($detail_id){
//        return $detail_items = DiagnosisDetails::where('id', $detail_id)->json();
//    }


    /**
     * @SWG\Get(path="/diagnosis-detail/{detail_id}",
     *   tags={"Diagnosis"},
     *   summary="진단 상세목록",
     *   description="진단 상세목록을 출력",
     *   operationId="diagnosisDetail",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="detail_id",
     *     description="Detail Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function diagnosisDetail($detail_id){
        return $detail_items = DiagnosisDetails::where('id', $detail_id)->json();
    }

    /**
     * @SWG\Put(path="/setDiagnosis/{order_id}",
     *   tags={"Diagnosis"},
     *   summary="진단 저장",
     *   description="진단 항목들의 값을 저장한다",
     *   operationId="setDiagnosis",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="diagnosisdetail",
     *     description="DiagnosisDetail Context",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/DiagnosisDetail")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function setDiagnosis(){

    }

//    public function setDiagnosisGroup(){
//
//    }

//    public function setDiagnosisDetail(){
//
//    }

    /**
     * @SWG\Get(path="/complete-diagnosis/{order_id}",
     *   tags={"Diagnosis"},
     *   summary="진단완료 목록",
     *   description="진단이 완료된 주문 목록",
     *   operationId="completeDiagnosisList",
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
    public function completeDiagnosisList($order_id){
//        return $complete_order = Order::where('id', $order_id)->where('status_cd', default)->json();
    }




}