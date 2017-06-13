<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Diagnosis;
use App\Models\DiagnosisDetails;
use App\Models\Item;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
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




$json  = [
    "id" => 1,
    "table" => "items",
    "status" => 104,
    "entrys" => [
        [
            "group" => "diagnosis_info",
            "name" => "자동차 등록정보",
            "save_table" => "diagnosises",
            "total" => 4,
            "completed" => 0,
            "has_child" => true,
            "entrys" => [
                [
                    "key" => 1077,
                    "name" => "정보사진",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "자동차등록증 사진을 추가하세요" ],
                        [ "두번쨰" => "", "placeholder" => "주행거리계 사진을 추가하세요"]
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1078,
                    "name" => "차대번호",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [
                        "1144" => "양호",
                        "1145" => "상이",
                        "1146" => "부식",
                        "1147" => "훼손(오손)",
                        "1148" => "변타"
                    ],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "차대번호 사진을 추가하세요" ],
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1079,
                    "name" => "색상",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [
                        "1149" => "흰색",
                        "1150" => "검정",
                        "1151" => "회색",
                        "1152" => "적색",
                        "1153" => "청색",
                        "1154" => "기타"
                    ],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "차량색상 사진을 추가하세요" ],
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1080,
                    "name" => "추가 옵션",
                    "save_table" => "diagnosis_details",
                    "summery" => "전체 양호가 아닌 경우, 상태 이력 있음을 선택하여 상태 별 부위를 선택하세요. 여러가지 상태를 선택 할 수 있습니다.",
                    "code_title" => "제논 헤드램프 (HID)",
                    "code" => [
                        "1155" => "양호",
                        "1156" => "수리필요",
                        "1157" => "없음"
                    ],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "옵션 사진을 추가하세요" ],
                    ],
                    "selected" => ""
                ]
            ]
        ],

        [
            "group" => "diagnosis_exterior",
            "name" => "주요 외판",
            "save_table" => "diagnosis_exterior",
            "total" => 3,
            "completed" => 0,
            "has_child" => true,
            "entrys" => [
                [
                    "key" => 1084,
                    "name" => "외판사진",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "전방사진을 추가하세요" ],
                        [ "두번쨰" => "", "placeholder" => "후방사진을 추가하세요"],
                        [ "세번쨰" => "", "placeholder" => "좌측사진을 추가하세요"],
                        [ "네번쨰" => "", "placeholder" => "우측사진을 추가하세요"]
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1085,
                    "name" => "주요 외판 상태",
                    "save_table" => "diagnosis_details",
                    "summery" => "전체 양호가 아닌 경우, 상태이력 있음을 선택하여 상태별 부위를 선택하고 해당 부위에 대한 증빙사진을 추가하세요.",
                    "code_title" => "",
                    "code" => [
                        "1158" => "전체 양호",
                        "1159" => "상태이력 있음"
                    ],
                    "picture" => [],
                    "selected" => "",
                    "left_check" => [
                        [ "1163" => [] ],
                        [ "1165" => [] ],
                        [ "1167" => [] ],
                        [ "1169" => [] ],
                        [ "1171" => [] ]
                    ],
                    "center_check" => [
                        [ "1175" => [] ],
                        [ "1173" => [] ],
                        [ "1174" => [] ]
                    ],
                    "right_check" => [
                        [ "1164" => [] ],
                        [ "1166" => [] ],
                        [ "1168" => [] ],
                        [ "1170" => [] ],
                        [ "1172" => [] ]
                    ]
                ],
                [
                    "key" => 1075,
                    "name" => "점검의견",
                    "save_table" => "diagnosis_details",
                    "summery" => "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [],
                    "selected" => "",
                    "sound" => true
                ],
            ]
        ],
        [
            "group" => [],
            "name" => "주요 내판",
            "save_table" => "diagnosis_exterior",
            "total" => 3,
            "completed" => 0,
            "has_child" => true,
            "entrys" => [
                [
                    "key" => 1088,
                    "name" => "하단 사진",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "차량캐리어를 통해 하단 사진을 추가하세요" ]
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1089,
                    "name" => "주요 내판 상태",
                    "save_table" => "diagnosis_details",
                    "summery" => "전체 양호가 아닌 경우, 상태이력 있음을 선택하여 상태별 부위를 선택하고 해당 부위에 대한 증빙사진을 추가하세요.",
                    "code_title" => "",
                    "code" => [
                        "1158" => "전체 양호",
                        "1159" => "상태이력 있음"
                    ],
                    "picture" => [],
                    "selected" => "",
//                  "left_check" => [
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ]
//                  ],
//                  "center_check" => [
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ]
//                  ],
//                  "right_check" => [
//                      [ "" => [] ],
//                      [ "" => [] ],
//                      [ "" => [] ]
//                  ]
                ],
                [
                    "key" => 1075,
                    "name" => "점검의견",
                    "save_table" => "diagnosis_details",
                    "summery" => "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [],
                    "selected" => "",
                    "sound" => true
                ]
            ]
        ],
        [
            "group" => [],
            "name" => "사고유무 점검",
            "save_table" => "diagnosis_exterior",
            "total" => 2,
            "completed" => 0,
            "has_child" => true,
            "entrys" => [
                [
                    "key" => 1094,
                    "name" => "사고유무",
                    "save_table" => "diagnosis_details",
                    "summery" => "",
                    "code_title" => "",
                    "code" => [
                        "1200" => "수리 이력 없음",
                        "1201" => "단순외판 교환",
                        "1202" => "주요 골격 수리"
                    ],
                    "picture" => [
                        [ "첫번쨰" => "", "placeholder" => "증빙사진" ]
                    ],
                    "selected" => ""
                ],
                [
                    "key" => 1075,
                    "name" => "점검의견",
                    "save_table" => "diagnosis_details",
                    "summery" => "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
                    "code_title" => "",
                    "code" => [],
                    "picture" => [],
                    "selected" => "",
                    "sound" => true
                ]
            ]
        ]
    ]
];

    

    $item->layout = json_encode($json);
    $item->save();








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
                   throw new Exception($errors[0]);
                }

                $user = User::findOrFail($user_id);
                
                // DB::table('orders')

                // $orders = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
                // ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                // ->whereNotNull("reservations.updated_at")
                // ->where('orders.garage_id', $user->user_extra->garage_id)
                // ->whereIn('orders.status_cd', [104,105])
                // ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                // ->get(); //입고대기, 입고

                $orders = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
                ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                ->whereNotNull("reservations.updated_at")
                ->where('orders.garage_id', $user->user_extra->garage_id)
                ->whereIn('orders.status_cd', [104,105])
                ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                ->get(); //입고대기, 입고

                // dd($orders);

                

                // $orders = Order::leftJoin('reservations', 'orders.id', '=', 'reservations.orders_id')
                // ->where('orders.garage_id', $user->user_extra->garage_id)
                // ->whereIn('orders.status_cd', [104,105])
                // ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                // ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                // ->get(); //입고대기, 입고

                // @TODO 위 조인문으로 수정해야함
                // $orders = Order::where('garage_id', $user->user_extra->garage_id)
                // ->whereIn('status_cd', [104,105])
                // ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
                // ->select('orders.*', 'reservations.reservation_at', 'reservations.updated_at')
                // ->get(); //입고대기, 입고

                

                $returns = [];

                foreach($orders as $order) {
                    $returns[] = array(
                        'id' => $order->id,
                        'order_num' => $order->datekey . '-' . $order->car_number,
//                        'order_num' => $order->getOrderNumber(),
//                        'datekey' => $order->datekey,
                        'car_number' => $order->car_number,
                        'orderer_name' => $order->orderer_name,
                        'orderer_mobile' => $order->orderer_mobile,
                        // 'status' => $order->status->display(),
                        'status' => $order->status_cd,

                        // //차명
                        'car_name' => $order->car_id,

                        // 'created_at' => $order->created_at, // 주문일
                        // 'purchased_at' => $order->purchase->updated_at, // 주문완료일
                        // 'reservation_date' => $order->getFinalReservationDate($order->id), // 예약일
                        'diagnose_at' => $order->diagnose_at, // 진단시작일
                        'diagnosed_at' => $order->diagnosed_at, // 진단완료일
                    );
                }
                
                
                // dd($returns);
                
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

        return response()->json([
            'today' => str_pad($today, 2, '0'),
            'tomorrow' => str_pad($tomorrow, 2, '0')
        ]);
    }


}
