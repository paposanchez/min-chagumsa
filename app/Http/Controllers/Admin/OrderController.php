<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Certificate;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{

    public function index(Request $request){

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name'=>'주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];

        $where = Order::orderBy('orders.id', 'DESC');

        //주문상태
        $status_cd = $request->get('status_cd');
        if($status_cd){
            $where = $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if($trs && $tre){
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function($qry) use($trs, $tre){
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre);
            })->orWhere(function($qry) use($trs, $tre){
                $qry->where("updated_at", ">=", $trs)
                    ->where("updated_at", "<=", $tre);
            });
        }elseif ($trs && !$tre){
            //시작일만 있을때
            $where = $where->where(function($qry) use($trs){
                $qry->where("created_at", ">=", $trs);
            })->orWhere(function($qry) use($trs){
                $qry->where("updated_at", ">=", $trs);
            });
        }

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if($sf && $s){
            if($sf != "order_num"){
                if(in_array($sf, ["car_number", "orderer_name", "orderer_mobile"])){
                    $where = $where->where($sf, 'like', '%'.$s.'%');
                }
            }else{
                $order_split = explode("-", $s);
                if(count($order_split) == 2){
                    $datekey = $order_split[0];
                    $car_number = $order_split[1];

                    $where = $where->where("datekey", $datekey)->where("car_number", $car_number);
                }
            }
        }


        $entrys = $where->paginate(25);


        return view('admin.order.index', compact('search_fields', 'entrys'));
    }

    public function show($id){
        $order = Order::findOrFail($id);

        $car = $order->car;



        return view('admin.order.detail', compact('order'));
    }

    public function edit($id){
        $order = Order::findOrFail($id);
        $select_color = Helper::getCodeSelectArray(Code::getCodesByGroup('diagnosis_info_color_cd'), 'diagnosis_info_color_cd', '외부색상을 선택해 주세요.');

        $select_vin_yn = Helper::getCodeSelectArray(Code::getCodesByGroup('yn'), 'yn', '차대번호 동일성을 확인해 주세요.');
        $select_transmission = Helper::getCodeSelectArray(Code::getCodesByGroup("transmission"),'transmission', '변속기 타입을 선택해 주세요.');
        $select_fueltype = Helper::getCodeSelectArray(Code::getCodesByGroup('fuel_type'), 'fuel_type', '사용연료 타입을 선택해 주세요.');

        if($order->certificates) {
            $vin_yn_cd = $order->certificates->vin_yn_cd;
        }else{
            $vin_yn_cd = '';
        }


        return view('admin.order.edit', compact('order', 'select_color', 'select_vin_yn', 'select_transmission', 'select_fueltype', 'vin_yn_cd'));
    }

    public function store(Request $request){
        $order_status = $request->get("order_status");
        $id = $request->get('id');

        if($order_status){
            //주문상태 변경
            /**
             * todo: 주문취소의 경우 pg 결제와 연동 필요함.
             */
            if(in_array($order_status, [100, 104, 108])){
                $row = Order::findOrFail($id);
                if($row){
                    $row->status_cd = $order_status;
                    $row->save();
                    return Redirect::back();
                }
            }
        }

    }

    /**
     * 인증서 데이터 갱신
     * @param Request $request
     */
    public function update(Request $request){
        dd($request->all());
    }

    /**
     * 보험사고 이력 이미지 등록
     * @param Request $request
     * @return array
     */
    public function insuranceFile(Request $request){

        $result = [
            'success' => '',
            'msg' => '',
            'id' => '',
            'name' => '',
            'preview' => '',
            'size' => 0,
            'mime' => '',
            'type' => ''
        ];

        $id = $request->get('');
        if($id){

            try{
                $uploader_name = "insurance_file";
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
                    $certificate_row = Certificate::find('id', $id);
                    if($certificate_row){
                        $certificate_row->history_insurance = $certificate_row->history_insurance +1;
                        if($certificate_row->history_insurance_file){
//                            $certificate_row->history_insurance_file = $certificate_row->history_insurance_file . ";". $response["result"]["path"];
                            $file_list = json_decode($certificate_row->history_insurance_file);
                            $file_list[] = ["path" => $response["result"]["path"]];
                        }else{
                            $file_list = [
                                ["path" => $response["result"]["path"]]
                            ];
                        }
                        $certificate_row->history_insurance_file = json_encode($file_list);

                        $certificate_row->save();

                        $result["success"] = true;
                        $result["msg"] = "Done";
                    }else{
                        //보험사고이력 이미지 등록 실패
                        $result["success"] = false;
                        $result["msg"] = "등록 실패";
                    }

                }else{
                    $result['success'] = false;
                    $result['msg'] = "upload fail";
                }

            }catch (\Exception $e){
                $result['success'] = false;
                $result['msg'] = "upload fail: ".$e->getMessage();
            }

        }else{
            $result['success'] = false;
            $result['msg'] = 'id not found';
        }
        return $result;
    }

    /**
     * 보험사고 이력 이미지 삭제
     * @param Request $request
     * @return array
     */
    public function insuranceFileDelete(Request $request){
        $id = $request->get('id');
        $file_index = $request->get("index");
        $where = Certificate::findOrFail($id);
        if($where){
            $file_list = json_decode($where->history_insurance_file);
            unset($file_list[$file_index]);
            $where->history_insurance_file = json_encode($file_list);
            $where->save();

            $result = [
                'success' => true, 'msg' => 'Done'
            ];
        }else{
            $result = [
                'success' => false, 'msg' => 'fail'
            ];
        }
        return $result;
    }

    /**
     * 용도변경이력, 차고지이력 등록 갱신
     * @param Request $request
     * @return array
     */
    public function history(Request $request){
        $method = $request->get('method');
        $id = $request->get('id');
        $data = $request->get('data');

        $result = [
            'success' => false, 'msg' => ''
        ];

        if($method && $id && $data){
            $where = Certificate::findOrFail($id);
            if($where){
                $history = $where->$method;
                $history_ex = explode(";", $history);
                if(count($history_ex) > 0){
                    $where->$method = $where->$method . ';' . $data;
                }else{
                    $where->$method = $data;
                }
                $where->save();

                $result["success"] = true;
                $result["msg"] = "Done";
            }else{
                $result["success"] = false;
                $result["msg"] = "해당 인증서가 없습니다.";
            }
        }else{
            //비정상 값 입력
            $result["success"] = false;
            $result["msg"] = "필수 파라미터 입력 오류입니다.";
        }
        return $result;
    }

}
