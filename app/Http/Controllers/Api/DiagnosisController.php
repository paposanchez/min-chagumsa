<?php

namespace App\Http\Controllers\Api;

use App\Events\SendSms;
use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use DB;
use Carbon\Carbon;
use \App\Mixapply\Uploader\Receiver;

use App\Models\S3Tran;


// use App\Exceptions\ApiHandler AS ApiException;
use Exception;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Validator;

use Illuminate\Support\Facades\Mail;

class DiagnosisController extends ApiController
{

    use Uploader;

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
            $order_id = $request->get('order_id');

            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:orders,engineer_id',
                'order_id' => 'required|exists:orders,id'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                throw new Exception($errors[0]);
            }

            $diagnosis = new DiagnosisRepository();
            $return = $diagnosis->prepare($order_id)->get();

            return response()->json($return);

        } catch (Exception $e) {
            return response()->json('fail');
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
        //        진단데이터 저장
        try {
            $diagnoses = $request->get('diagnoses');
            $order_id = $request->get('order_id');
            $engineer = $request->get('user_id');

            $order = Order::where('id', $order_id)->first();
            if (!$order || $order->engineer_id != $engineer) {
                throw new Exception("접근권한이 없습니다.");
            }

            //@TODO 업로드파일을 다 지워야된다
            $diagnoses_files = Diagnosis::where('orders_id', $request->get('order_id'))->get();
            if (count($diagnoses_files)) {
                $diagnoses_ids = [];
                foreach ($diagnoses_files as $diagnosis) {
                    $diagnoses_ids[] = $diagnosis->id;
                }
                DiagnosisFile::whereIn('diagnoses_id', $diagnoses_ids)->delete();
            }


            $diagnosis = new DiagnosisRepository();
            $diagnosis->prepare($order_id)->update($diagnoses);

            return response()->json('success');

        } catch (Exception $ex) {
            return response()->json('fail');
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

                $return = 'success';
            } else {
                $return = 'fail';
            }

            return response()->json($return);
        } catch (Exception $ex) {
            return response()->json('fail');
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
public
function getItem(Request $request)
{
    try {
        $order_id = $request->get('order_id');

        $item = Order::findOrFail($order_id)->item;

        return response()->json(json_decode($item->layout, true));

    } catch (Exception $e) {
        return abort(404, trans('item.not-found'));
    }

}

/**
 * @SWG\Post(
 *     path="/diagnosis/grant",
 *     tags={"Diagnosis"},
 *     summary="주문의 엔지니어 설정",
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
public
function setDiagnosisEngineer(Request $request)
{

    try {
        $order_id = $request->get('order_id');
        $user_id = $request->get('user_id');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            throw new Exception($errors[0]);
        }


        $order = Order::findOrFail($order_id);
        $order->engineer_id = $user_id;
        $order->status_cd = 106;
        $order->diagnose_at = Carbon::now();
        $order->save();

        return response()->json(true);

        // 앱에서는 간단하게
    } catch (Exception $e) {
        return response()->json(false);
    }
}


/**
 * @SWG\Get(
 *     path="/diagnosis/reservation",
 *     tags={"Diagnosis"},
 *     summary="입고예약 목록",
 *     description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
 *     operationId="getDiagnosisReservation",
 *     produces={"application/json"},
 *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
 *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="string",format="varchar"),
 *     @SWG\Response(response=200,description="success",
 *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Orders"))
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
public
function getDiagnosisReservation(Request $request)
{
    try {
        $date = $request->get('date');
        $user_id = $request->get('user_id');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(array(
                'date' => $date,
                'count' => 0,
                'orders' => []
            ));
        }

        $user = User::findOrFail($user_id);

        $reservations = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
            ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
            ->whereNotNull("reservations.updated_at")
            ->where('orders.garage_id', $user->user_extra->garage_id)
            ->whereIn('orders.status_cd', [104, 105])
            ->select('reservations.*')
            ->orderBy("reservations.reservation_at", "ASC")
            ->get(); //입고대기, 입고

        $returns = [];


        $diagnosis = new DiagnosisRepository();

        foreach ($reservations as $reservation) {
            $returns[] = $diagnosis->prepare($reservation->orders_id)->getOrder();
        }
        return response()->json(array(
            'date' => $date,
            'count' => count($returns),
            'orders' => $returns
        ));
        // 앱에서는 간단하게
    } catch (Exception $e) {
        return abort(404, trans('diagnosis.not-found'));
    }
}


/**
 * @SWG\Get(
 *     path="/diagnosis/working",
 *     tags={"Diagnosis"},
 *     summary="진단중 목록",
 *     description="엔지니어 개인의 진단중 주문 목록, 오늘부터 과거의 주문 출력",
 *     operationId="getDiagnosisWorking",
 *     produces={"application/json"},
 *     @SWG\Parameter(name="garage_id",in="query",description="정비소 번호",required=true,type="integer",format="int32"),
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
public
function getDiagnosisWorking(Request $request)
{
    try {

        $user_id = $request->get('user_id');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json([]);
        }

        $user = User::findOrFail($user_id);

        // 내 대리점의 전체 진단중 목록
        $orders = Order::where('garage_id', $user->user_extra->garage_id)
            ->where('status_cd', 106)
            ->get();


        $returns = [];
        $diagnosis = new DiagnosisRepository();
        foreach ($orders as $order) {
            $returns[] = $diagnosis->prepare($order->id)->getOrder();
        }

        return response()->json($returns);

        // 앱에서는 간단하게

    } catch (Exception $e) {
        return abort(404, trans('garage_id.not-found'));
    }
}

/**
 * @SWG\Get(
 *     path="/diagnosis/completed",
 *     tags={"Diagnosis"},
 *     summary="진단완료 목록",
 *     description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
 *     operationId="getDiagnosisComplete",
 *     produces={"application/json"},
 *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
 *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="integer",format="int64"),
 *     @SWG\Parameter(name="s",in="query",description="검색어",required=false,type="string",format="text"),
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
public
function getDiagnosisCompleted(Request $request)
{
    //    public function getDiagnosisComplete(Request $request) {
    try {

        $date = $request->get('date');
        $user_id = $request->get('user_id');
        $s = $request->get('s');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date_format:Y-m-d',
            's' => 'min:1'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(array(
                'date' => $date,
                'count' => 0,
                'orders' => []
            ));
        }

        $user = User::findOrFail($user_id);

        $where = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
            ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
            ->whereNotNull("reservations.updated_at")
            ->where('orders.garage_id', $user->user_extra->garage_id)
            ->where('orders.status_cd', ">=", 107)
            ->select('reservations.*');


        if ($s) {
            $where->where('orders.car_number', $s);
        }

        $reservations = $where->get(); //진단완료이후


        $returns = [];

        $diagnosis = new DiagnosisRepository();

        foreach ($reservations as $reservation) {
            $returns[] = $diagnosis->prepare($reservation->orders_id)->getOrder();
        }


        return response()->json(array(
            'date' => $date,
            'count' => count($returns),
            'orders' => $returns
        ));
        // 앱에서는 간단하게
    } catch (Exception $e) {
        return abort(404, trans('diagnosis.not-found'));
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

public
function setDiagnosisComplete(Request $request)
{

    try {
        $order_id = $request->get('order_id');
        $user_id = $request->get('user_id');

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'order_id' => 'required|exists:orders,id'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            throw new Exception($errors[0]);
        }

        $order = Order::where('id', $order_id)->where('engineer_id', $user_id)->first();
        $order->status_cd = 107;
        $order->diagnosed_at = Carbon::now();
        $order->save();


        $order_number = $order->getOrderNumber();
        $garage_info = User::find($order->garage_id);
        $garage = $garage_info->name;
        $orderer_name = $order->orderer_name;

        try {
            //메일전송

            $mail_message = [
                'orderer_name' => $orderer_name, 'order_num' => $order_number, 'garage' => $garage
            ];
            Mail::send(new \App\Mail\Ordering($order->technician->email, "고객님[" . $order->getOrderNumber() . "]의 차량진단이 완료되었습니다.", $mail_message, 'message.email.fin-diagnosis-tech'));
        } catch (\Exception $e) {
        }
        try{
            // SMS전송
            $user_message = view('message.sms.fin-diagnosis-user', compact('order_number'));
            event(new SendSms($order->orderer_mobile, '', $user_message));
        }catch (\Exception $e){
        }


        return response()->json(true);

        // 앱에서는 간단하게
    } catch (Exception $e) {
        //            return abort(404, trans('diagnosis.not-found'));
        return response()->json(false);
    }
}


/**
 * @SWG\Get(
 *     path="/diagnosis/count",
 *     tags={"Diagnosis"},
 *     summary="오늘과 내일의 입고예약 갯수",
 *     description="특정정비소의 오늘과 내일의 입고예약 갯수",
 *     operationId="getReservationCount",
 *     produces={"application/json"},
 *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
 *     @SWG\Response(response=200,description="success",
 *          @SWG\Schema(type="object")
 *     ),
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
public
function getReservationCount(Request $request)
{
    $user = User::where("id", $request->get('user_id'))->first();

    $today = Reservation::where('reservations.garage_id', $user->user_extra->garage_id)->join('orders', function($join){
        $join->on('reservations.orders_id', '=', 'orders.id')
            ->where('orders.status_cd', 104)
            ->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::today()->format('Y-m-d'));
    })->count();
    $tomorrow = Reservation::where('reservations.garage_id', $user->user_extra->garage_id)->join('orders', function($join){
        $join->on('reservations.orders_id', '=', 'orders.id')
            ->where('orders.status_cd', 104)
            ->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::tomorrow()->format('Y-m-d'));
    })->count();

    return response()->json([
        'today' => [
            "left" => ($today >= 10 ? floor($today / 10) : '0'),
            "right" => ($today >= 10 ? $today % 10 : $today)
        ],
        'tomorrow' => [
            "left" => ($tomorrow >= 10 ? floor($tomorrow / 10) : '0'),
            "right" => ($tomorrow >= 10 ? $tomorrow % 10 : $tomorrow)
        ]
    ]);
}

public function getDiagnosisFileInfo(Request $request){


    $validator = Validator::make($request->all(), [
        'div' => 'required'
    ]);

    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        return response()->json(array(
            'message' => 'div parameter is required'
        ));
    }

    $log_where = S3Tran::orderBy('id', 'DESC')->where('div', $request->get('div'))->first();

    if($log_where){
        $info = DiagnosisFile::where('id', '>', $log_where->trans_id)
            ->where('mime', '<>', 'audio/mp3')->orderBy('id', 'ASC')->get();
    }else{
        $info = DiagnosisFile::where('mime', '<>', 'audio/mp3')->get();
    }

    $trans_info = [];

    foreach ($info as $key => $row){

        # /storage/app/diagnosis/2017/10/19/23/4654-3620d4bdef48c6861c161ab635a1d9ee-42QwY5r
        $path = "app/diagnosis" . $row->path . '/' . $row->source;

        $trans_info[$key] = [
            'div' => 'diagnosis',
            'img_num' => $row->id,
            'path' => $path
        ];
    }

    return response()->json($trans_info);
}

public function setTransDiagnosisFileInfo(Request $request){
    $validator = Validator::make($request->all(), [
        'trans_id' => 'required|int',
        'div' => 'required'
    ]);

    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        return response()->json(array(
            'message' => 'trans_id or div parameter is required'
        ));
    }

    $where = S3Tran::orderBy('trans_id', 'DESC')->where('div', $request->get('div'))->first();
    if($where){
        if($request->get('trans_id') > $where->trans_id){
            //이전 등록된 파일 정보보다 입력하려는 id가 크므로
            $model = new S3Tran();
            $error = '';
        }else{
            $error = '입력요청값이 작거나 같습니다.';
            $model = false;
        }
    }else{
        $model = new S3Tran();
        $error = '';
    }

    if($model !== false){
        $data = [
            'div' => $request->get('div'),
            'trans_id' => $request->get('trans_id')
        ];
        $model->insert($data);
        return response()->json(['status' => 'ok', 'error' => $error]);
    }else{
        return response()->json(['status' => 'skip', 'error' => $error]);
    }
}


}
