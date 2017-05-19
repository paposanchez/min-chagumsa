<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\DiagnosisDetails;
use App\Models\Order;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{

    /**
     * @SWG\Get(path="/diagnosises/{대리점번호}/{page?}/{date?}",
     *   tags={"Diagnosis"},
     *   summary="입고예약 목록",
     *   description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
     *   operationId="getDiagnosises",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="garage_id",
     *     description="Garage Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page Number",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="date",
     *     description="Date",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getDiagnosises($garage_id, $page = 1, $date = null){
        return $diagnosises = Order::where('engineer_id', $garage_id)->json();
    }

    /**
     * @SWG\Get(path="/diagnosises-complete/{대리점번호}/{page?}/{date?}/",
     *   tags={"Diagnosis"},
     *   summary="진단완료 목록",
     *   description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
     *   operationId="getCompletedDiagnosises",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="garage_id",
     *     description="Garage Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="page",
     *     description="Page Number",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     in="path",
     *     name="date",
     *     description="Date",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getCompletedDiagnosises($garage_id, $page = 1, $date = null){
        return $completedDiagnosises = Diagnosis::where($garage_id)->json();
    }


    /**
     * @SWG\Get(path="/diagnosis",
     *   tags={"Diagnosis"},
     *   summary="진단 내역",
     *   description="개별주문 주문 내역 출력",
     *   operationId="getDiagnosis",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="diagnosis",
     *     description="진단 정보",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/Diagnosis")
     *   ),
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function getDiagnosis($order_id){
        return $diagnosis = DiagnosisDetails::where('id', $order_id)->json();
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
    public function setDiagnosis(Request $request){

    }


    /**
     * @SWG\Put(path="/upload/{order_id}",
     *   tags={"Diagnosis"},
     *   summary="진단데이터 개별 저장",
     *   description="진단항목에 대한 개별 데이터 저장",
     *   operationId="setUpload",
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
    public function setUpload($order_id){
//        return $complete_order = Order::where('id', $order_id)->where('status_cd', default)->json();
    }





}