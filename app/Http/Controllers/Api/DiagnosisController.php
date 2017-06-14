<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Car;
use App\Models\Diagnosis;
use App\Models\DiagnosisDetails;
use App\Models\Item;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Code;
use DB;
use Carbon\Carbon;


// use App\Exceptions\ApiHandler AS ApiException;
use Exception;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Validator;

class DiagnosisController extends ApiController {

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
    public function show(Request $request) {

        $order_id = $request->get('order_id');

        $diagnosis = new DiagnosisRepository();
        $return = $diagnosis->get($order_id);

        return response()->json($return);
    }
    
    /**
     * @SWG\Post(
     *     path="/diagnosis",
     *     tags={"Diagnosis"},
     *     summary="개별주문에 대한 저장", 
     *     description="개별주문에 진단 저장",
     *     operationId="update",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
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
    public function update(Request $request) {

        $order_id = $request->get('order_id');
        $encrypt_json = $request->get('diagnosis');
        
        $diagnosis = new DiagnosisRepository();
        $return = $diagnosis->set($order_id, $encrypt_json);

        return response()->json($return);
    }


     /**
     * @SWG\Post(
     *     path="/diagnosis/upload",
     *     tags={"Diagnosis"},
     *     summary="진단데이터의 파일업로드 핸들러", 
     *     description="진단데이터의 이미지, 음성파일을 스토리지로 업로드한다",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문번호",required=true,type="integer"),
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
    public function upload(Request $request) {

        $order_id = $request->get('order_id');

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
               throw new Exception($errors[0]);
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
    public function getItem(Request $request) {
//        $diagnosis = new DiagnosisRepository();
//        $return = $diagnosis->get($order_id);
//
//        return response()->json($return->item);
        try{
            $order_id = $request->get('order_id');

            $item = Order::findOrFail($order_id)->item;

//             return response()->json([
//                                 'id' => $item->id,
//                 'name' => $item->name,
//                 'price' => $item->price,
// //                'layout' => $item->layout, 
//                 'layout' => json_encode(str_replace(["\r\n","\r","\n", "\""], ["", "", "", "'"] ,stripcslashes($item->layout))),
//                 'created_at' => $item->created_at
// ]);


            return response()->json(json_decode($item->layout));

        }catch (Exception $e) {
            return abort(404, trans('item.not-found'));
        }

    }

    /**
     * @SWG\Get(
     *     path="/diagnosis/grant",
     *     tags={"Diagnosis"},
     *     summary="주문의 엔지니어 설정",
     *     description="특정주문의 진단이 시직되면 헤당 엔지니어에게 사용자 설정을 한다.",
     *     operationId="getReservationCount",
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
    public function setDiagnosisEngineer(Request $request) {

        try {
            $order_id = $request->get('order_id');
            $user_id = $request->get('user_id');

            $validator = Validator::make($request->all(), [
               'user_id' => 'required|unique:users'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
               throw new Exception($errors[0]);
            }


            $diagnosis = new DiagnosisRepository();
            $return = $diagnosis->get($order_id);
            
            $return->engineer_id = $user_id;
            $return->status = 106;
            $return->save();
            
            return response()->json(true);
            
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('diagnosis.not-found'));
        }
    }
    




    /**
     * @SWG\Get(
     *     path="/diagnosis/reservation",
     *     tags={"Diagnosis"},
     *     summary="입고예약 목록",
     *     description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
     *     operationId="getDiagnosesReservation",
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
    public function getDiagnosesReservation(Request $request) {
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
                        'count' =>0,
                        'orders' => []
                    ));
                }

                $user = User::findOrFail($user_id);


                $orders = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                ->whereNotNull("reservations.updated_at")
                ->where('orders.garage_id', $user->user_extra->garage_id)
                ->whereIn('orders.status_cd', [104,105])
                ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                ->get(); //입고대기, 입고


                $returns = [];

                foreach($orders as $order) {
                    $returns[] = array(
                        'id' => $order->id,
                        'order_num' => $order->datekey . '-' . $order->car_number,
                        'car_number' => $order->car_number,
                        'orderer_name' => $order->orderer_name,
                        'orderer_mobile' => $order->orderer_mobile,
                        'status' => Code::findOrFail($order->status_cd)->display(),
                        // //차명
                        'car_name' => Car::findOrFail($order->car_id)->detail->name,
                        'diagnose_at' => $order->diagnose_at, // 진단시작일
                        'diagnosed_at' => $order->diagnosed_at, // 진단완료일
                    );
                }
                return response()->json(array(
                    'date' => $date,
                    'count' =>count($returns),
                    'orders' => $returns
                ));
                // 앱에서는 간단하게 
            } catch (Exception $e) {
                return abort(404, trans('diagnosis.not-found'));
            }
    }


    /**
     * @SWG\Get(
     *     path="/diagnoses/working",
     *     tags={"Diagnosis"},
     *     summary="진단중 목록",
     *     description="엔지니어 개인의 진단중 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnosesWorking",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="integer",format="int64"),
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
    public function getDiagnosesWorking(Request $request) {
        try {

                $date = $request->get('date');
                $user_id = $request->get('user_id');

                $validator = Validator::make($request->all(), [
                   'user_id' => 'required|unique:users',
                   'date' => 'required|date_format:Y-m-d'
                ]);
                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                   throw new Exception($errors[0]);
                }

                $user = User::findOrFail("id", $user_id);


                // DB::table('orders')
                $orders = Order::leftJoin('reservations', 'orders.id', '=', 'reservations.orders_id')
                ->where('orders.garage_id', $user->garage_id)
                ->whereIn('orders.status_cd', [106])
                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                ->get(); //입고대기, 입고


                $returns = [];
                foreach($orders as $order) {
                    $returns[] = array(
                        'id' => $order->id,
                        'order_num' => $order->getOrderNumber(),
                        'datekey' => $order->datekey,
                        'car_number' => $order->car_number,
                        'orderer_name' => $order->orderer_name,
                        'orderer_mobile' => $order->orderer_mobile,
                        'status' => $order->status->display(),

                        //차명


                        'created_at' => $order->created_at, // 주문일
                        'purchased_at' => $order->purchase->updated_at, // 주문완료일
                        'reservation_date' => $order->getFinalReservationDate($order->id), // 예약일
                        'diagnose_at' => $order->diagnose_at, // 진단시작일
                        'diagnosed_at' => $order->diagnosed_at, // 진단완료일
                    );
                }
                
                return response()->json(array(
                    'date' => $date,
                    'count' =>count($returns),
                    'orders' => $returns
                ));
                
                // 앱에서는 간단하게 
            } catch (Exception $e) {
                return abort(404, trans('diagnosis.not-found'));
            }
    }

    /**
     * @SWG\Get(
     *     path="/diagnoses/complete",
     *     tags={"Diagnosis"},
     *     summary="진단완료 목록",
     *     description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnosesComplete",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="integer",format="int64"),
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
    public function getDiagnosesComplete(Request $request) {
           try {

                $date = $request->get('date');
                $user_id = $request->get('user_id');

                $validator = Validator::make($request->all(), [
                   'user_id' => 'required|unique:users',
                   'date' => 'required|date_format:Y-m-d'
                ]);
                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                   throw new Exception($errors[0]);
                }

                $user = User::findOrFail("id", $user_id);


                // DB::table('orders')
                $orders = Order::leftJoin('reservations', 'orders.id', '=', 'reservations.orders_id')
                ->where('orders.garage_id', $user->garage_id)
                ->whereIn('orders.status_cd', ">=", 107)
                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                ->get();


                $returns = [];
                foreach($orders as $order) {
                    $returns[] = array(
                        'id' => $order->id,
                        'order_num' => $order->getOrderNumber(),
                        'datekey' => $order->datekey,
                        'car_number' => $order->car_number,
                        'orderer_name' => $order->orderer_name,
                        'orderer_mobile' => $order->orderer_mobile,
                        'status' => $order->status->display(),

                        //차명


                        'created_at' => $order->created_at, // 주문일
                        'purchased_at' => $order->purchase->updated_at, // 주문완료일
                        'reservation_date' => $order->getFinalReservationDate($order->id), // 예약일
                        'diagnose_at' => $order->diagnose_at, // 진단시작일
                        'diagnosed_at' => $order->diagnosed_at, // 진단완료일
                    );
                }
                
                return response()->json(array(
                    'date' => $date,
                    'count' =>count($returns),
                    'orders' => $returns
                ));
                
                // 앱에서는 간단하게 
            } catch (Exception $e) {
                return abort(404, trans('diagnosis.not-found'));
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
    public function getReservationCount(Request $request) {
        // $order_num = Order::find($order_id)->item_id;
        // $layout = Item::find($order_num)->layout;
        // return Order::findOrFail($order_id)->item->layout;
        $user = User::where("id", $request->get('user_id'))->first();

        $today = Reservation::where("garage_id", $user->user_extra->garage_id)->whereNotNull('updated_at')->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::today()->format('Y-m-d'))->count();
        $tomorrow = Reservation::where("garage_id", $user->user_extra->garage_id)->whereNotNull('updated_at')->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::tomorrow()->format('Y-m-d'))->count();

        $today = rand(0,99);
        $tomorrow = rand(0,99);
        
        return response()->json([
            'today' => [
                "left" => ($today >= 10 ? $today/10 : '0'),
                "right" => ($today >= 10 ? $today%10 : $today)
            ],
            'tomorrow' => [
                "left" => ($tomorrow >= 10 ? $tomorrow/10 : '0'),
                "right" => ($tomorrow >= 10 ? $tomorrow%10 : $tomorrow)
            ]
        ]);
    }


}
