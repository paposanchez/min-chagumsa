<?php

namespace App\Http\Controllers\Api;

use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use DB;
use Carbon\Carbon;
use App\Mixapply\Uploader\Receiver;
use App\Models\S3Tran;
use Exception;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Validator;



class DiagnosisController extends ApiController
{

        use Uploader;

        private function modelDiagnosis($diagnosis)
        {
                return DiagnosisRepository::getInstance()->order($diagnosis);

        }


        public function getIssue(Request $request)
        {

                try {

                        $requestData = $request->validate([
                                'user_id' => 'required|exists:users,id',
                                'issue_cd' => 'required|in:117,118,119',
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);
                        $garage_id = $user->user_extra->garage_id;

                        // 토탈
                        $count = [
                                "total" => 0,
                                '117'   => Diagnosis::getExtraStatus(117, $garage_id, true),
                                '118'   => Diagnosis::getExtraStatus(118, $garage_id, true),
                                '119'   => Diagnosis::getExtraStatus(119, $garage_id, true),
                        ];
                        // total
                        $count['total'] = $count['117'] + $count['118'] + $count['119'];

                        // 현재상태 검색결과
                        $entrys = [];
                        $result = Diagnosis::getExtraStatus($request->get('issue_cd'), $garage_id);
                        foreach ($result as $diagnosis) {
                                $entrys[] = $this->modelDiagnosis($diagnosis);
                        }
                        return response()->json([
                                "status"=> 'success',
                                "count" => $count,
                                "data"  => [
                                        "total" => count($entrys),
                                        "entrys"=> $entrys
                                ]
                        ]);

                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

        }


        public function getIssueTotalCount(Request $request)
        {

                try {
                        $requestData = $request->validate([
                                'user_id' => 'required|exists:users,id'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);
                        $garage_id = $user->user_extra->garage_id;


                        // 토탈
                        $result = [
                                Diagnosis::getExtraStatus(117, $garage_id, true),
                                Diagnosis::getExtraStatus(118, $garage_id, true),
                                Diagnosis::getExtraStatus(119, $garage_id, true)
                        ];

                        return response()->json([
                                "status"=> 'success',
                                "data"  => array_sum($result)
                        ]);

                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

        }



        /**
        * @SWG\Get(
        *     path="/diagnosis/get-diagnosis",
        *     tags={"Diagnosis"},
        *     summary="전체 예약목록",
        *     description="예약 전체목록",
        *     operationId="getDiagnosisWorking",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="user_id",in="query",description="bcs 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="date",in="query",description="날짜",required=false,type="string",format="varchar"),
        *     @SWG\Parameter(name="status_cd",in="query",description="상태값",required=false,type="integer",format="int32"),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
        *     ),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */

        public function getDiagnosis(Request $request)
        {
                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'date'          => 'required|date_format:Y-n-d',
                                'status_cd'     => 'required|in:112,113,114,115,116',
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);
                        $garage_id      = $user->user_extra->garage_id;

                        $status =       [
                                '112'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 112)->count(),   // 신청
                                '113'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 113)->count(),   // 예약확정
                                '114'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 114)->count(),   // 검토중
                                '126'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 126)->count(),   // 검토완료
                                '115'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 115)->count(),   // 발급완료
                        ];     // 상태별 갯수

                        $result        = Diagnosis::select()->whereIn('diagnosis.status_cd', [112,113,114,115,126])->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', $requestData['status_cd'])->get();
                        $entrys = [];
                        foreach ($result as $diagnosis) {
                                $entrys[] = $this->modelDiagnosis($diagnosis);
                        }

                        return response()->json([
                                "status"        => 'success',
                                'count'         => $status,
                                "data"          => [
                                        "total"         => count($entrys),
                                        "entrys"        => $entrys
                                ]
                        ]);

                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }

        public function search(Request $request)
        {

                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'status_cd'     => 'nullable|in:112,113,114,115,116',
                                's'             => 'required|min:4'
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);
                        $garage_id = $user->user_extra->garage_id;
                        $status_cd = $requestData['status_cd'];
                        $s = $request->get('s');

                        $where = Diagnosis::select()->whereIn('diagnosis.status_cd', [112,113,114,115,126]);

                        //상태값 검색시
                        if ($status_cd) {
                                $where->where('diagnosis.status_cd', $status_cd);
                                // if ($status_cd == 115) {
                                //         $where->orderBy("reservation_at", "desc");
                                // }
                        }

                        //키워드 검색시
                        $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->leftJoin('car_numbers', 'diagnosis.car_numbers_id', '=', 'car_numbers.id')
                        ->where(function($query) use ($s){
                                $query->where('car_numbers.car_number', 'like', '%' . $s)
                                ->orWhere('orders.orderer_mobile', 'like', '%' . $s);
                        })->select('diagnosis.*');



                        $result = $where->get();
                        $entrys = [];

                        //@TODO 상태별 카운트는 검색쿼리가 like 인관계로 일단 뺀다
                        $status =       [
                                '112'     => 0,   // 신청
                                '113'     => 0,   // 예약확정
                                '114'     => 0,   // 검토중
                                '126'     => 0,   // 검토완료
                                '115'     => 0,   // 발급완료
                                // '112'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 112)->count(),   // 신청
                                // '113'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 113)->count(),   // 예약확정
                                // '114'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 114)->count(),   // 검토중
                                // '126'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 126)->count(),   // 검토완료
                                // '115'     => Diagnosis::select()->whereDate('reservation_at', '=', $requestData['date'])->where('diagnosis.status_cd', 115)->count(),   // 발급완료

                        ];     // 상태별 갯수
                        foreach ($result as $diagnosis) {
                                $status[$diagnosis->status_cd]  += 1;
                                $entrys[] = $this->modelDiagnosis($diagnosis);
                        }

                        return response()->json([
                                "status"        => 'success',
                                'count'        => $status,
                                "data"          => [
                                        "total"         => count($entrys),
                                        "entrys"        => $entrys
                                ]
                        ]);
                } catch (Exception $e) {
                        dd($e);
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }



        }












        /**
        * @SWG\Get(
        *     path="/diagnosis",
        *     tags={"Diagnosis"},
        *     summary="개별주문 진단내역 조회",
        *     description="개별주문 진단내역 조회",
        *     operationId="show",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Diagnosis"))
        *     ),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=404, description="not found"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */
        public function show(Request $request)
        {

                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'diagnosis_id'  => 'required|exists:diagnosis,id'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                        $return = DiagnosisRepository::getInstance()->load($requestData['diagnosis_id'])->get();

                        return response()->json([
                                "status" => 'success',
                                "data"  => $return
                        ]);
                } catch (Exception $e) {

                        dd($e);
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }

        /**
        * @SWG\Post(
        *     path="/diagnosis",
        *     tags={"Diagnosis"},
        *     summary="개별주문에 대한 저장",
        *     description="개별주문에 진단 저장",
        *     operationId="update",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="user_id",in="query",description="유저 seq",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="diagnoses",in="query",description="진단 데이터",required=true,type="string",format="text"),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=404, description="not found"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */
        public function update(Request $request)
        {

                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'diagnosis_id'  => 'required|exists:diagnosis,id',
                                'diagnoses'     => 'required'
                        ]);




                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                        // 해당 진단 조회
                        $diagnosis      = Diagnosis::where('engineer_id', $requestData['diagnosis_id'])->findOrFail($requestData['diagnosis_id']);


                        //@TODO 업로드파일을 다 지워야된다
                        //         $diagnoses_files = Diagnosis::where('orders_id', $request->get('order_id'))->get();
                        //         if (count($diagnoses_files)) {
                        //                 $diagnoses_ids = [];
                        //                 foreach ($diagnoses_files as $diagnosis) {
                        //                         $diagnoses_ids[] = $diagnosis->id;
                        //                 }
                        //                 DiagnosisFile::whereIn('diagnoses_id', $diagnoses_ids)->delete();
                        //         }

                        $diagnosisRepository = new DiagnosisRepository();
                        $diagnosisRepository->prepare($requestData['diagnosis_id'])->update($requestData['diagnoses']);

                        return response()->json([
                                "status" => 'success'
                        ]);
                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }


                // try {
                //         $diagnoses = $request->get('diagnoses');
                //         $order_id = $request->get('order_id');
                //         $engineer = $request->get('user_id');
                //
                //         $order = Order::where('id', $order_id)->first();
                //         if (!$order || $order->engineer_id != $engineer) {
                //                 return response()->json([
                //                         "status" => 'fail'
                //                 ]);
                //         }
                //
                //         //@TODO 업로드파일을 다 지워야된다
                //         $diagnoses_files = Diagnosis::where('orders_id', $request->get('order_id'))->get();
                //         if (count($diagnoses_files)) {
                //                 $diagnoses_ids = [];
                //                 foreach ($diagnoses_files as $diagnosis) {
                //                         $diagnoses_ids[] = $diagnosis->id;
                //                 }
                //                 DiagnosisFile::whereIn('diagnoses_id', $diagnoses_ids)->delete();
                //         }
                //
                //
                //         $diagnosis = new DiagnosisRepository();
                //         $diagnosis->prepare($order_id)->update($diagnoses);
                //
                //         return response()->json([
                //                 "status" => 'success'
                //         ]);
                //
                // } catch (Exception $ex) {
                //         return response()->json([
                //                 "status" => 'fail'
                //         ]);
                // }
        }


        /**
        * @SWG\Post(
        *     path="/diagnosis/upload",
        *     tags={"Diagnosis"},
        *     summary="진단데이터의 파일업로드 핸들러",
        *     description="진단데이터의 이미지, 음성파일을 스토리지로 업로드한다",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="user_id",in="query",description="유저 seq",required=true,type="integer"),
        *     @SWG\Parameter(name="order_id",in="query",description="주문 seq",required=true,type="integer"),
        *     @SWG\Parameter(name="diagnosis_id",in="query",description="진단데이터 seq",required=true,type="integer"),
        *     @SWG\Parameter(
        *         description="업로드파일",
        *         in="formData",
        *         name="upfile",
        *         required=true,
        *         type="file"
        *     ),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Code"))
        *     ),
        *     @SWG\Response(response=404, description="no result"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/ErrorModel")
        *     )
        * )
        */
        public function upload(Request $request)
        {
                try {
                        $order_id = $request->get('order_id');
                        $user_id = $request->get('user_id');
                        $diagnoses_id = $request->get('diagnosis_id');

                        if (!$diagnoses_id || !$order_id || !$user_id) {
                                throw new Exception('필수 파라미터가 없습니다.');
                        }

                        $engineer_check = Order::where('id', $order_id)->where('engineer_id', $request->get('user_id'))->count();
                        if ($engineer_check != 1) {
                                throw new Exception('접근권한이 없습니다.');
                        }

                        // validator
                        $uploader_name = 'upfile';

                        $diagnosis_upload_prifix = storage_path('app/diagnosis');

                        $uploader = new Receiver($request, $diagnosis_upload_prifix);
                        $response = $uploader->receive($uploader_name, function ($file, $path_prefix, $path, $file_new_name) {
                                // 파일이동
                                $file->move($path_prefix . $path, $file_new_name);

                                try {
                                        $file_size = $file->getClientSize();
                                } catch (RuntimeException $ex) {
                                        $file_size = 0;
                                }

                                return [
                                        'original' => $file->getClientOriginalName(),
                                        'source' => $file_new_name,
                                        'path' => $path,
                                        'size' => $file_size,
                                        'extension' => $file->getClientOriginalExtension(),
                                        'mime' => $file->getClientMimeType(),
                                        'hash' => md5($file)
                                ];
                        });

                        // 업로드 성공시
                        if ($response['result']) {

                                // Save the record to the db
                                $data = DiagnosisFile::create([
                                        'diagnoses_id' => $diagnoses_id,
                                        'original' => $response['result']['original'],
                                        'source' => $response['result']['source'],
                                        'path' => $response['result']['path'],
                                        'size' => $response['result']['size'],
                                        'mime' => $response['result']['mime'],
                                ]);

                                $data->save();

                                //todo mme를 호출해서 이미지변환을 요청함

                                return response()->json([
                                        "status" => 'success'
                                ]);
                        } else {
                                return response()->json([
                                        "status" => 'fail'
                                ]);
                        }

                } catch (Exception $ex) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }













        /**
        * @SWG\Get(
        *     path="/diagnosis/item",
        *     tags={"Diagnosis"},
        *     summary="주문의 상품정보조회",
        *     description="주문번호에 대한 상품 진단레이아웃 조회",
        *     operationId="getItem",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=404, description="not found"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *     }
        * )
        */
        // public function getItem(Request $request)
        // {
        //         try {
        //                 $order_id = $request->get('order_id');
        //
        //                 $item = Order::findOrFail($order_id)->item;
        //
        //                 return response()->json([
        //                         "status" => 'fail',
        //                         "data" => json_decode($item->layout, true)
        //                 ]);
        //         } catch (Exception $e) {
        //                 return response()->json([
        //                         "status" => 'fail'
        //                 ]);
        //         }
        //
        // }

        /**
        * @SWG\Post(
        *     path="/diagnosis/start",
        *     tags={"Diagnosis"},
        *     summary="진단시작",
        *     description="특정주문의 진단이 시직되면 헤당 엔지니어에게 사용자 설정을 한다.",
        *     operationId="setDiagnosisEngineer",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=404, description="not found"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *     }
        * )
        */
        public function setDiagnosisStart(Request $request)
        {

                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'diagnosis_id'  => 'required|exists:diagnosis,id'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                        // 해당 진단 조회
                        $diagnosis              = Diagnosis::where('status_cd', 113)->findOrFail($requestData['diagnosis_id']);
                        $diagnosis->engineer_id = $user->id;
                        $diagnosis->start_at    = Carbon::now();
                        // $diagnosis->status_cd   = 114;
                        $diagnosis->save();

                        return response()->json([
                                "status" => 'success'
                        ]);

                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);

                }
        }

        /**
        * @SWG\Post(
        *     path="/diagnosis/complete",
        *     tags={"Diagnosis"},
        *     summary="주문완료의 상태값 변경",
        *     description="특정주문의 진단이 완료되면 헤당 상태값을 설정한다.",
        *     operationId="setDiagnosisComplete",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=404, description="not found"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *     }
        * )
        */

        public function setDiagnosisComplete(Request $request)
        {


                try {

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'diagnosis_id'  => 'required|exists:diagnosis,id',
                                'diagnoses'     => 'required'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                        // 해당 진단 조회
                        $diagnosis                      = Diagnosis::where('status_cd', 114)->where('engineer_id', $user->id)->findOrFail($requestData['diagnosis_id']);
                        $diagnosis->completed_at        = Carbon::now();
                        $diagnosis->save();


                        // 진단완료
                        event(new OnCompleted($diagnosis));

                        return response()->json([
                                "status" => 'success'
                        ]);


                        // 앱에서는 간단하게
                } catch (Exception $e) {

                        return response()->json([
                                "status" => 'fail'
                        ]);

                }

        }



        /**
        * @SWG\Get(
        *     path="/diagnosis/change-reservation",
        *     tags={"Diagnosis"},
        *     summary="예약변경",
        *     description="예약 변경",
        *     operationId="changeReservation",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="user_id",in="query",description="정비소 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="diagnosis_id",in="query",description="진단 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="reservation_date",in="query",description="날짜",required=true,type="string",format="varchar"),
        *     @SWG\Parameter(name="sel_time",in="query",description="시간",required=true,type="string",format="varchar"),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
        *     ),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */
        public function changeReservation(Request $request)
        {
                try {


                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'diagnosis_id'  => 'required|exists:diagnosis,id',
                                'date'          => 'required',
                                'time'          => 'required'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);


                        //
                        // $validator = Validator::make($request->all(), [
                        //         'user_id' => 'required',
                        //         'diagnosis_id' => 'required',
                        //         'reservation_date' => 'required',
                        //         'sel_time' => 'required'
                        // ]);
                        //
                        // if ($validator->fails()) {
                        //         return response()->json([
                        //                 "status" => 'fail'
                        //         ]);
                        // }
                        // $user_id = $request->get('user_id');
                        // $bcs = User::findOrFail($user_id);


                        $diagnosis = Diagnosis::findOrFail($diagnosis_id);


                        $reservation_date = new DateTime($requestData['date'] . ' ' . $requestData['time'] . ':00:00');
                        $reservation_at = $reservation_date->format('Y-m-d H:i:s');



                        $reservation = new Reservation();
                        $reservation->diagnosis_id = $diagnosis_id;
                        $reservation->reservation_at = $diagnosis->reservation_at;
                        $reservation->garage_id = $user_id;
                        $reservation->save();

                        $diagnosis->reservation_at = $reservation_at;
                        $diagnosis->save();




                } catch (Exception $e) {
                        return response()->json('fail');
                }
        }

        /**
        * @SWG\Post(
        *     path="/diagnosis/confirm-reservation",
        *     tags={"Diagnosis"},
        *     summary="예약확정",
        *     description="예약 확정",
        *     operationId="confirmReservation",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="user_id",in="query",description="정비소 번호",required=true,type="integer",format="int32"),
        *     @SWG\Parameter(name="diagnosis_id",in="query",description="진단 번호",required=true,type="integer",format="int32"),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
        *     ),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */
        public function confirmReservation(Request $request)
        {
                try {
                        $validator = Validator::make($request->all(), [
                                'user_id' => 'required',
                                'diagnosis_id' => 'required'
                        ]);

                        if ($validator->fails()) {
                                return response()->json([
                                        "status" => 'fail'
                                ]);
                        }

                        $bcs = User::findOrFail($request->get('user_id'));
                        if ($bcs->hasRole('garage')) {
                                $diagnosis = Diagnosis::findOrFail($request->get('diagnosis_id'));
                                $diagnosis->status_cd = 113;
                                $diagnosis->confrim_at = Carbon::now();
                                $diagnosis->save();
                                //todo noty 해야댐
                                return response()->json([
                                        "status" => 'success'
                                ]);
                        } else {
                                return response()->json([
                                        "status" => 'fail'
                                ]);
                        }

                } catch (Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }


        }


        //    /**
        //     * @SWG\Get(
        //     *     path="/diagnosis/reservation",
        //     *     tags={"Diagnosis"},
        //     *     summary="입고예약 목록",
        //     *     description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
        //     *     operationId="getDiagnosisReservation",
        //     *     produces={"application/json"},
        //     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
        //     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="string",format="varchar"),
        //     *     @SWG\Response(response=200,description="success",
        //     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Orders"))
        //     *     ),
        //     *     @SWG\Response(response=401, description="unauthorized"),
        //     *     @SWG\Response(response=500, description="internal server error"),
        //     *     @SWG\Response(response="default",description="error",
        //     *          @SWG\Schema(ref="#/definitions/Error")
        //     *     ),
        //     *     security={
        //     *       {"api_key": {}}
        //     *     }
        //     * )
        //     */
        //    public
        //    function getDiagnosisReservation(Request $request)
        //    {
        //        try {
        //            $date = $request->get('date');
        //            $user_id = $request->get('user_id');
        //
        //            $validator = Validator::make($request->all(), [
        //                'user_id' => 'required|exists:users,id',
        //                'date' => 'required|date_format:Y-m-d'
        //            ]);
        //
        //            if ($validator->fails()) {
        //                $errors = $validator->errors()->all();
        //                return response()->json(array(
        //                    'date' => $date,
        //                    'count' => 0,
        //                    'orders' => []
        //                ));
        //            }
        //
        //            $user = User::findOrFail($user_id);
        //
        //            $reservations = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
        //                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
        //                ->whereNotNull("reservations.updated_at")
        //                ->where('orders.garage_id', $user->user_extra->garage_id)
        //                ->whereIn('orders.status_cd', [104, 105])
        //                ->select('reservations.*')
        //                ->orderBy("reservations.reservation_at", "ASC")
        //                ->get(); //입고대기, 입고
        //
        //            $returns = [];
        //
        //
        //            $diagnosis = new DiagnosisRepository();
        //
        //            foreach ($reservations as $reservation) {
        //                $returns[] = $diagnosis->prepare($reservation->orders_id)->getOrder();
        //            }
        //            return response()->json(array(
        //                'date' => $date,
        //                'count' => count($returns),
        //                'orders' => $returns
        //            ));
        //            // 앱에서는 간단하게
        //        } catch (Exception $e) {
        //            return response()->json('fail');
        //        }
        //    }

        //
        //    /**
        //     * @SWG\Get(
        //     *     path="/diagnosis/working",
        //     *     tags={"Diagnosis"},
        //     *     summary="진단중 목록",
        //     *     description="엔지니어 개인의 진단중 주문 목록, 오늘부터 과거의 주문 출력",
        //     *     operationId="getDiagnosisWorking",
        //     *     produces={"application/json"},
        //     *     @SWG\Parameter(name="garage_id",in="query",description="정비소 번호",required=true,type="integer",format="int32"),
        //     *     @SWG\Response(response=200,description="success",
        //     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
        //     *     ),
        //     *     @SWG\Response(response=401, description="unauthorized"),
        //     *     @SWG\Response(response=500, description="internal server error"),
        //     *     @SWG\Response(response="default",description="error",
        //     *          @SWG\Schema(ref="#/definitions/Error")
        //     *     ),
        //     *     security={
        //     *       {"api_key": {}}
        //     *     }
        //     * )
        //     */
        //    public
        //    function getDiagnosisWorking(Request $request)
        //    {
        //        try {
        //
        //            $user_id = $request->get('user_id');
        //
        //            $validator = Validator::make($request->all(), [
        //                'user_id' => 'required|exists:users,id'
        //            ]);
        //
        //            if ($validator->fails()) {
        //                $errors = $validator->errors()->all();
        //                return response()->json([]);
        //            }
        //
        //            $user = User::findOrFail($user_id);
        //
        //            // 내 대리점의 전체 진단중 목록
        //            $orders = Order::where('garage_id', $user->user_extra->garage_id)
        //                ->where('status_cd', 106)
        //                ->get();
        //
        //
        //            $returns = [];
        //            $diagnosis = new DiagnosisRepository();
        //            foreach ($orders as $order) {
        //                $returns[] = $diagnosis->prepare($order->id)->getOrder();
        //            }
        //
        //            return response()->json($returns);
        //
        //            // 앱에서는 간단하게
        //
        //        } catch (Exception $e) {
        //            return response()->json('fail');
        //        }
        //    }

        //    /**
        //     * @SWG\Get(
        //     *     path="/diagnosis/completed",
        //     *     tags={"Diagnosis"},
        //     *     summary="진단완료 목록",
        //     *     description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
        //     *     operationId="getDiagnosisComplete",
        //     *     produces={"application/json"},
        //     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
        //     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="integer",format="int64"),
        //     *     @SWG\Parameter(name="s",in="query",description="검색어",required=false,type="string",format="text"),
        //     *     @SWG\Response(response=200,description="success",
        //     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
        //     *     ),
        //     *     @SWG\Response(response=401, description="unauthorized"),
        //     *     @SWG\Response(response=500, description="internal server error"),
        //     *     @SWG\Response(response="default",description="error",
        //     *          @SWG\Schema(ref="#/definitions/Error")
        //     *     ),
        //     *     security={
        //     *       {"api_key": {}}
        //     *     }
        //     * )
        //     */
        //    public
        //    function getDiagnosisCompleted(Request $request)
        //    {
        //        //    public function getDiagnosisComplete(Request $request) {
        //        try {
        //
        //            $date = $request->get('date');
        //            $user_id = $request->get('user_id');
        //            $s = $request->get('s');
        //
        //            $validator = Validator::make($request->all(), [
        //                'user_id' => 'required|exists:users,id',
        //                'date' => 'required|date_format:Y-m-d',
        //                's' => 'min:1'
        //            ]);
        //
        //            if ($validator->fails()) {
        //                $errors = $validator->errors()->all();
        //                return response()->json(array(
        //                    'date' => $date,
        //                    'count' => 0,
        //                    'orders' => []
        //                ));
        //            }
        //
        //            $user = User::findOrFail($user_id);
        //
        //            $where = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
        //                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
        //                ->whereNotNull("reservations.updated_at")
        //                ->where('orders.garage_id', $user->user_extra->garage_id)
        //                ->where('orders.status_cd', ">=", 107)
        //                ->select('reservations.*');
        //
        //
        //            if ($s) {
        //                $where->where('orders.car_number', $s);
        //            }
        //
        //            $reservations = $where->get(); //진단완료이후
        //
        //
        //            $returns = [];
        //
        //            $diagnosis = new DiagnosisRepository();
        //
        //            foreach ($reservations as $reservation) {
        //                $returns[] = $diagnosis->prepare($reservation->orders_id)->getOrder();
        //            }
        //
        //
        //            return response()->json(array(
        //                'date' => $date,
        //                'count' => count($returns),
        //                'orders' => $returns
        //            ));
        //            // 앱에서는 간단하게
        //        } catch (Exception $e) {
        //            return response()->json('fail');
        //        }
        //    }



        //    /**
        //     * @SWG\Get(
        //     *     path="/diagnosis/count",
        //     *     tags={"Diagnosis"},
        //     *     summary="오늘과 내일의 입고예약 갯수",
        //     *     description="특정정비소의 오늘과 내일의 입고예약 갯수",
        //     *     operationId="getReservationCount",
        //     *     produces={"application/json"},
        //     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
        //     *     @SWG\Response(response=200,description="success",
        //     *          @SWG\Schema(type="object")
        //     *     ),
        //     *     @SWG\Response(response=401, description="unauthorized"),
        //     *     @SWG\Response(response=404, description="not found"),
        //     *     @SWG\Response(response=500, description="internal server error"),
        //     *     @SWG\Response(response="default",description="error",
        //     *          @SWG\Schema(ref="#/definitions/Error")
        //     *     ),
        //     *     security={
        //     *     }
        //     * )
        //     */
        //    public
        //    function getReservationCount(Request $request)
        //    {
        //        $user = User::where("id", $request->get('user_id'))->first();
        //
        //        $today = Reservation::where('reservations.garage_id', $user->user_extra->garage_id)->join('orders', function ($join) {
        //            $join->on('reservations.orders_id', '=', 'orders.id')
        //                ->where('orders.status_cd', 104)
        //                ->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::today()->format('Y-m-d'));
        //        })->count();
        //        $tomorrow = Reservation::where('reservations.garage_id', $user->user_extra->garage_id)->join('orders', function ($join) {
        //            $join->on('reservations.orders_id', '=', 'orders.id')
        //                ->where('orders.status_cd', 104)
        //                ->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::tomorrow()->format('Y-m-d'));
        //        })->count();
        //
        //        return response()->json([
        //            'today' => [
        //                "left" => ($today >= 10 ? floor($today / 10) : '0'),
        //                "right" => ($today >= 10 ? $today % 10 : $today)
        //            ],
        //            'tomorrow' => [
        //                "left" => ($tomorrow >= 10 ? floor($tomorrow / 10) : '0'),
        //                "right" => ($tomorrow >= 10 ? $tomorrow % 10 : $tomorrow)
        //            ]
        //        ]);
        //    }

        public function getDiagnosisFileInfo(Request $request)
        {
                $validator = Validator::make($request->all(), [
                        'div' => 'required'
                ]);

                if ($validator->fails()) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

                $log_where = S3Tran::orderBy('id', 'DESC')->where('div', $request->get('div'))->first();

                if ($log_where) {
                        $info = DiagnosisFile::where('id', '>', $log_where->trans_id)
                        ->where('mime', '<>', 'audio/mp3')->orderBy('id', 'ASC')->get();
                } else {
                        $info = DiagnosisFile::where('mime', '<>', 'audio/mp3')->get();
                }

                $trans_info = [];

                foreach ($info as $key => $row) {

                        # /storage/app/diagnosis/2017/10/19/23/4654-3620d4bdef48c6861c161ab635a1d9ee-42QwY5r
                        $path = "app/diagnosis" . $row->path . '/' . $row->source;

                        $trans_info[$key] = [
                                'div' => 'diagnosis',
                                'img_num' => $row->id,
                                'path' => $path
                        ];
                }

                return response()->json([
                        "status" => 'success',
                        "data" => $trans_info
                ]);
        }

        public function setTransDiagnosisFileInfo(Request $request)
        {
                $validator = Validator::make($request->all(), [
                        'trans_id' => 'required|int',
                        'div' => 'required'
                ]);

                if ($validator->fails()) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

                $where = S3Tran::orderBy('trans_id', 'DESC')->where('div', $request->get('div'))->first();
                if ($where) {
                        if ($request->get('trans_id') > $where->trans_id) {
                                //이전 등록된 파일 정보보다 입력하려는 id가 크므로
                                $model = new S3Tran();
                                $error = '';
                        } else {
                                $error = '입력요청값이 작거나 같습니다.';
                                $model = false;
                        }
                } else {
                        $model = new S3Tran();
                        $error = '';
                }

                if ($model !== false) {
                        $data = [
                                'div' => $request->get('div'),
                                'trans_id' => $request->get('trans_id')
                        ];
                        $model->insert($data);

                        return response()->json([
                                "status" => 'success'
                        ]);
                } else {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }





}
