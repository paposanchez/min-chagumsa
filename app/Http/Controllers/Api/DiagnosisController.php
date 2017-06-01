<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Diagnosis;
use App\Models\DiagnosisDetails;
use App\Models\Item;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\Uploader;

class DiagnosisController extends ApiController {

    use Uploader;

    /**
     * @SWG\Get(
     *     path="/diagnosis/{order_id}",
     *     tags={"Diagnosis"},
     *     summary="개별주문 진단내역 조회",
     *     description="개별주문 진단내역 조회",
     *     operationId="show",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="path",description="주문 번호",required=true,type="integer",format="int32"),
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
    public function show($order_id) {
        $diagnosis = new DiagnosisRepository();
        $return = $diagnosis->get($order_id);

        return response()->json($return);
    }

    /**
     * @SWG\Post(
     *     path="/diagnosis/{order_id}",
     *     tags={"Diagnosis"},
     *     summary="개별주문에 대한 저장", 
     *     description="개별주문에 진단 저장",
     *     operationId="update",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="path",description="주문 번호",required=true,type="integer",format="int32"),
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
    public function update(Request $request, $order_id) {

        $encrypt_json = $request->get('diagnosis');

        $diagnosis = new DiagnosisRepository();
        $return = $diagnosis->set($order_id, $encrypt_json);

        return response()->json($return);
    }

    /**
     * @SWG\Get(
     *     path="/diagnoses/{garage_id}",
     *     tags={"Diagnosis"},
     *     summary="입고예약 목록",
     *     description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
     *     operationId="getDiagnoses",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="garage_id",in="path",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="page",in="query",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=false,type="integer",format="int64"),
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
    public function getDiagnoses(Request $request, $garage_id) {

        $where = Diagnosis::orderBy('id', 'desc')->where('garage_id', $garage_id);
        $entrys = $where->paginate($limit);

        return response()->json($entrys);
    }

    /**
     * @SWG\Get(
     *     path="/diagnoses/working/{engineer_id}",
     *     tags={"Diagnosis"},
     *     summary="진단중 목록",
     *     description="엔지니어 개인의 진단중 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnoses",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="garage_id",in="path",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="page",in="query",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=false,type="integer",format="int64"),
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
    public function getWorkingDiagnoses(Request $request, $engineer_id) {
        $where = Diagnosis::orderBy('id', 'desc')->where('$engineer_id', $engineer_id);
        $entrys = $where->paginate($limit);

        return response()->json($entrys);
    }

    /**
     * @SWG\Get(
     *     path="/diagnoses/complete/{garage_id}",
     *     tags={"Diagnosis"},
     *     summary="진단완료 목록",
     *     description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnoses",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="garage_id",in="path",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="page",in="query",description="페이지번호",required=false,default=1,type="integer",format="int64"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=false,type="integer",format="int64"),
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
    public function getCompleteDiagnoses($garage_id, $page = 1, $date = null) {
        $where = Diagnosis::orderBy('id', 'desc')->where('garage_id', $garage_id);
        $entrys = $where->paginate($limit);

        return response()->json($entrys);
    }

    /**
     * @SWG\Post(
     *     path="/upload/{order_id}",
     *     tags={"Diagnosis"},
     *     description="진단데이터 이미지 저장",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="path",description="주문번호",required=true,type="integer"),
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
    public function upload(Request $request, $order_id) {

        $return = [
            'status' => '',
            'msg' => ''
        ];

        try {
            $uploader_name = 'upfile';
            $uploader_group = 'diagnosis';
            $uploader_group_id = $order_id;

            $validator = Validator::make($request->all(), [
                        $uploader_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                throw New Exception($errors[0]);
            }

            $uploader = new Receiver($request);
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
                    //@TODO 실제파일이 아닌 파일
                    'hash' => md5($file)
                ];
            });

            // 업로드 성공시
            if ($response['result']) {

                // Save the record to the db
                $data = File::create([
                            'original' => $response['result']['original'],
                            'source' => $response['result']['source'],
                            'path' => $response['result']['path'],
                            'size' => $response['result']['size'],
                            'extension' => $response['result']['extension'],
                            'mime' => $response['result']['mime'],
                            'hash' => $response['result']['hash'],
                            'download' => 0,
                            'group' => ($uploader_group ? $uploader_group : NULL),
                            'group_id' => ($uploader_group_id ? $uploader_group_id : NULL)
                ]);
                $data->save();

                $return = [
                    'status' => 'success',
                    'msg' => trans('file.upload_success'),
                    'data' => $data->toArray()
                ];
            }

            return response()->json($return);
        } catch (Exception $ex) {

            $return = [
                'status' => 'error',
                'msg' => $ex->getMessage(),
            ];

            return response()->json($return);
        }

//        $this->image(Request $request);
//        return $complete_order = Order::where('id', $order_id)->where('status_cd', default)->json();
    }


    /**
     * @SWG\Get(
     *     path="/get_layout/{order_id}",
     *     tags={"Diagnosis"},
     *     summary="진단 레이아웃",
     *     description="주문번호에 대한 진단 레이아웃 호출",
     *     operationId="getLayout",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="path",description="주문 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="object",@SWG\Items(ref="#/definitions/Item"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": "1e212e12e123"}
     *     }
     * )
     */
    public function getLayout($order_id) {
        $order_num = Order::find($order_id)->item_id;
        $layout = Item::find($order_num)->layout;
        return response()->json($layout);
    }

}
