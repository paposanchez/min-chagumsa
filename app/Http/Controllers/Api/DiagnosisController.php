<?php

namespace App\Http\Controllers\Api;

use App\Models\Diagnosis;
use App\Models\Diagnoses;
use App\Models\DiagnosesFile;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use DB;
use Carbon\Carbon;
use App\Mixapply\Uploader\Receiver;
use App\Models\DocumentOrder;
use App\Traits\Uploader;
// use App\Models\S3Tran;
use Exception;
use Illuminate\Http\Request;
use Validator;

use Intervention\Image\ImageManagerStatic as Image;

class DiagnosisController extends ApiController
{

        use Uploader;

        private function modelDiagnosis($diagnosis)
        {
                return (new DocumentOrder($diagnosis,
                [
                        "reservation_at"        => [
                                "date"          => $diagnosis->reservation_at->format('Y-m-d'),
                                "time"          => $diagnosis->reservation_at->format('H:i'),
                                "fulldate"      => $diagnosis->reservation_at->format('Y-m-d H:i')
                        ],
                        "extra_status"  => $diagnosis->extraStatus()
                        ]))->toArray();
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
                                        'status_cd'     => 'required|in:112,113,114,115,116,126',
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
                                dd($e);
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
                                        'status_cd'     => 'nullable|in:112,113,114,115,116,126',
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

                                // 진단레이아웃 구성
                                // 진단정보가 예약확정요청
                                $repository = DiagnosisRepository::getInstance()
                                ->load($requestData['diagnosis_id'])
                                ->triggerReview($user->id);
                                $layout = $repository->layout();

                                return response()->json([
                                        "status" => 'success',
                                        "data"  => [
                                                'order' => $repository->getOrder()->toArray(),
                                                'layout' => $repository->layout()
                                        ]
                                ]);
                        } catch (Exception $e) {
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

                                foreach($requestData['diagnoses'] as $item)
                                {
                                        $diagnoses =  Diagnoses::where('diagnosis_id', '=', $requestData['diagnosis_id'])->find($item['id']);
                                        $diagnoses->selected = $item['selected'];
                                        $diagnoses->save();
                                }
                                //         //@TODO 업로드파일을 다 지워야된다
                                //         //         $diagnoses_files = Diagnosis::where('orders_id', $request->get('order_id'))->get();
                                //         //         if (count($diagnoses_files)) {
                                //         //                 $diagnoses_ids = [];
                                //         //                 foreach ($diagnoses_files as $diagnosis) {
                                //         //                         $diagnoses_ids[] = $diagnosis->id;
                                //         //                 }
                                //         //                 DiagnosesFile::whereIn('diagnoses_id', $diagnoses_ids)->delete();
                                //         //         }
                                //

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

                                $diagnosis = Diagnosis::whereIn("status_cd", [112,113])->findOrFail($requestData['diagnosis_id']);
                                $diagnosis->status_cd = 112;
                                $diagnosis->confirm_at = NULL;
                                $diagnosis->save();

                                return response()->json([
                                        "status" => 'success'
                                ]);


                                // $reservation_date = new DateTime($requestData['date'] . ' ' . $requestData['time'] . ':00:00');
                                // $reservation_at = $reservation_date->format('Y-m-d H:i:s');
                                //
                                // $reservation = new Reservation();
                                // $reservation->diagnosis_id = $diagnosis_id;
                                // $reservation->reservation_at = $diagnosis->reservation_at;
                                // $reservation->garage_id = $user_id;
                                // $reservation->save();
                                //
                                // $diagnosis->reservation_at = $reservation_at;
                                // $diagnosis->save();




                        } catch (Exception $e) {
                                return response()->json([
                                        "status" => 'fail'
                                ]);
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

                                $requestData = $request->validate([
                                        'user_id'       => 'required|exists:users,id',
                                        'diagnosis_id'  => 'required|exists:diagnosis,id',
                                ]);

                                // 조회를 요청한 사용자의 정보조회
                                $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                                $diagnosis = Diagnosis::whereIn("status_cd", [112,113])->findOrFail($requestData['diagnosis_id']);
                                $diagnosis->status_cd = 113;
                                $diagnosis->confirm_at = Carbon::now();
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



                                $requestData = $request->validate([
                                        'user_id'       => 'required|exists:users,id',
                                        'diagnoses_id'  => 'required|exists:diagnoses,id',
                                ]);


                                // 조회를 요청한 사용자의 정보조회
                                $user = User::withRole('engineer')->findOrFail($requestData['user_id']);




                                // validator
                                $uploader_name = 'upfile';
                                // 업로드 경로
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

                                        //============= 이미지 리사이즈 엔 워터마크
                                        $uploaded_file = $path_prefix . $path .'/'. $file_new_name;
                                        $watermark = Image::make(public_path('assets/img/logo.png'))->opacity(30);
                                        $thumbnail = Image::make($uploaded_file)
                                        ->resize(null, 300, function ($constraint) {
                                                $constraint->aspectRatio();
                                        })
                                        ->insert($watermark, 'bottom-right', 10, 10)
                                        ->encode('jpg', 80)
                                        ->save($uploaded_file . '.thumbnail.jpg');
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

                                return ;

                                // 업로드 성공시
                                if ($response['result']) {
                                        // Save the record to the db
                                        $data = DiagnosesFile::create([
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
                                }

                                return response()->json([
                                        "status" => 'fail'
                                ]);

                        } catch (Exception $e) {
                                dd($e);
                                return response()->json([
                                        "status" => 'fail',
                                        "message"       => $ex->getMessage()
                                ]);
                        }
                }



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
                // public function setDiagnosisStart(Request $request)
                // {
                //
                //         try {
                //
                //                 $requestData = $request->validate([
                //                         'user_id'       => 'required|exists:users,id',
                //                         'diagnosis_id'  => 'required|exists:diagnosis,id'
                //                 ]);
                //
                //                 // 조회를 요청한 사용자의 정보조회
                //                 $user = User::withRole('engineer')->findOrFail($requestData['user_id']);
                //
                //                 // 해당 진단 조회
                //                 $diagnosis              = Diagnosis::where('status_cd', 113)->findOrFail($requestData['diagnosis_id']);
                //                 $diagnosis->engineer_id = $user->id;
                //                 $diagnosis->start_at    = Carbon::now();
                //                 // $diagnosis->status_cd   = 114;
                //                 $diagnosis->save();
                //
                //                 return response()->json([
                //                         "status" => 'success'
                //                 ]);
                //
                //         } catch (Exception $e) {
                //                 return response()->json([
                //                         "status" => 'fail'
                //                 ]);
                //
                //         }
                // }










                // public function getDiagnosesFileInfo(Request $request)
                // {
                //         $validator = Validator::make($request->all(), [
                //                 'div' => 'required'
                //         ]);
                //
                //         if ($validator->fails()) {
                //                 return response()->json([
                //                         "status" => 'fail'
                //                 ]);
                //         }
                //
                //         $log_where = S3Tran::orderBy('id', 'DESC')->where('div', $request->get('div'))->first();
                //
                //         if ($log_where) {
                //                 $info = DiagnosesFile::where('id', '>', $log_where->trans_id)
                //                 ->where('mime', '<>', 'audio/mp3')->orderBy('id', 'ASC')->get();
                //         } else {
                //                 $info = DiagnosesFile::where('mime', '<>', 'audio/mp3')->get();
                //         }
                //
                //         $trans_info = [];
                //
                //         foreach ($info as $key => $row) {
                //
                //                 # /storage/app/diagnosis/2017/10/19/23/4654-3620d4bdef48c6861c161ab635a1d9ee-42QwY5r
                //                 $path = "app/diagnosis" . $row->path . '/' . $row->source;
                //
                //                 $trans_info[$key] = [
                //                         'div' => 'diagnosis',
                //                         'img_num' => $row->id,
                //                         'path' => $path
                //                 ];
                //         }
                //
                //         return response()->json([
                //                 "status" => 'success',
                //                 "data" => $trans_info
                //         ]);
                // }

                // public function setTransDiagnosesFileInfo(Request $request)
                // {
                //         $validator = Validator::make($request->all(), [
                //                 'trans_id' => 'required|int',
                //                 'div' => 'required'
                //         ]);
                //
                //         if ($validator->fails()) {
                //                 return response()->json([
                //                         "status" => 'fail'
                //                 ]);
                //         }
                //
                //         $where = S3Tran::orderBy('trans_id', 'DESC')->where('div', $request->get('div'))->first();
                //         if ($where) {
                //                 if ($request->get('trans_id') > $where->trans_id) {
                //                         //이전 등록된 파일 정보보다 입력하려는 id가 크므로
                //                         $model = new S3Tran();
                //                         $error = '';
                //                 } else {
                //                         $error = '입력요청값이 작거나 같습니다.';
                //                         $model = false;
                //                 }
                //         } else {
                //                 $model = new S3Tran();
                //                 $error = '';
                //         }
                //
                //         if ($model !== false) {
                //                 $data = [
                //                         'div' => $request->get('div'),
                //                         'trans_id' => $request->get('trans_id')
                //                 ];
                //                 $model->insert($data);
                //
                //                 return response()->json([
                //                         "status" => 'success'
                //                 ]);
                //         } else {
                //                 return response()->json([
                //                         "status" => 'fail'
                //                 ]);
                //         }
                // }

        }
