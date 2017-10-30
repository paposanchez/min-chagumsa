<?php

namespace App\Http\Controllers\Admin;

use App\Mixapply\Uploader\Receiver;
use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use App\Repositories\DiagnosisRepository;
use DB;

class DiagnosesController extends Controller
{
    /**
     * @param Request $request
     * 진단중 상태 이상의 주문 리스트
     * 검색조건에 해당되는 주문을 출력한다.
     * 예약변경, 예약확정, 진단시작 기능 사용 가능
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where = Order::whereIn('orders.status_cd', [106, 107, 108, 109]);

        // 정렬옵션
        if ($request->get('sort') == 'order_num') {
            $where
                ->orderBy('car_number', 'ASC')
                ->orderBy('created_at', 'ASC');
        } else {
            $where->orderBy('id', 'DESC');
        }

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $df = $request->get('df');
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if($df){
            switch ($df){
                case 'order' :
                    if ($trs) {
                        $where->where(function ($qry) use ($trs, $tre) {
                            $qry->where("created_at", ">=", $trs);
                        });
                    }

                    if ($tre) {
                        $where->where(function ($qry) use ($tre) {
                            $qry->where("created_at", "<=", date('Y-m-d', strtotime($tre. "+1 days")));
                        });
                    }
                    break;
//                case 'reservation' :
//                    if ($trs) {
//                        $where = $where->join('reservations', 'reservations.orders_id', '=', 'orders.id')
//                            ->where(function ($qry) use ($trs, $tre) {
//                                $qry->where("reservations.reservation_at", ">=", $trs);
//                            });
//                    }
//
//                    if ($tre) {
//                        $where = $where->join('reservations', 'reservations.orders_id', '=', 'orders.id')
////                            ->where('reservations.reservation_at', '<=', date('Y-m-d', strtotime($tre. "+1 days")));
//                            ->where(function ($qry) use ($trs, $tre) {
//                                $qry->where("reservations.reservation_at", "<=", date('Y-m-d', strtotime($tre. "+1 days")));
//                            });
//                    }
//                    break;
//                case 'diagnosis' :
//                    break;
            }
        }

        $search_fields = [
            "order_id" => "주문아이디",
            "order_num" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "engineer_name" => "엔지니어명",
            "bcs_name" => "BCS명",
            "tech_name" => "기술사명"
        ];

        $date_fields = [
            "order" => "주문기간",
//            "reservation" => "예약기간",
//            "diagnosis" => "진단기간"
        ];

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'order_id':
                    $where->where('id', 'like', '%' . $s . '%');
                    break;
                case 'car_number':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'order_num':
                    list($car_number, $datekey) = explode("-", $s);

                    if ($car_number && $datekey) {
                        $order_date = Carbon::createFromFormat('ymd', $datekey);
                        $where
                            ->where('car_number', $car_number)
                            ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                            ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                            ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'));
                    }
                    break;
                case 'orderer_name':
                    $where->where('orderer_name', 'like', '%' . $s . '%');
                    break;
                case 'orderer_mobile':
                    $where->where('orderer_mobile', 'like', '%' . $s . '%');
                    break;
                case 'engineer_name':
                    $where->whereHas('engineer', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'bcs_name':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
                case 'tech_name':
                    $where->whereHas('technician', function ($query) use ($s) {
                        $query->where('name', 'like', $s . '%');
                    });
                    break;
            }
        }

        $entrys = $where->paginate(25);

        return view('admin.diagnosis.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'status_cd', 's', 'sf', 'trs', 'tre', 'date_fields', 'request', 'df'));
    }

    /**
     * @param Request $request
     * @param Int $id
     * 진단에 대한 정보 출력
     * 진단 데이터를 수정 가능하며 사진첨부가 가능
     * 진단완료 처리가 가능
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        //진단데이터를 레이아웃을 통해 생성
        $handler = new DiagnosisRepository();
        $diagnosis = $handler->prepare($id)->get(true);

        return view('admin.diagnosis.detail', compact('diagnosis', 'order'));
    }

    /**
     * @param Request $request
     * 진단 항목에 대한 선택값 업데이트
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function updateCode(Request $request)
    {
        $id = $request->get('id');
        $selected = $request->get('selected');
        $diagnosis = Diagnosis::where('id', $id)->first();
        $diagnosis->selected = $selected;
        $diagnosis->save();
        return $diagnosis;

    }

    /**
     * @param Request $request
     * 진단 항목에 대한 코멘트 업데이트
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateComment(Request $request)
    {
        try {
            $diagnosis_id = $request->get('diagnosis_id');
            $comment = $request->get('comment');

            $diagnosis = Diagnosis::findOrFail($diagnosis_id);
            $diagnosis->comment = $comment;
            $diagnosis->save();

            return response()->json();
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * 진단 항목에 대한 이미지 업로드
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileUpload(Request $request)
    {
        try {
            $diagnoses_id = $request->get('diagnosis_id');

            if (!$diagnoses_id) {
                throw new Exception('필수 파라미터가 없습니다.');
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
                    //@TODO 실제파일이 아닌 파일
                    'hash' => md5($file)
                ];
            });

            // 업로드 성공시
            if ($response['result']) {

                // Save the record to the db
                $data = DiagnosisFile::create([
                    //                    'diagnoses_id' => $diagnoses_id,
                    'diagnoses_id' => $diagnoses_id,
                    'original' => $response['result']['original'],
                    'source' => $response['result']['source'],
                    'path' => $response['result']['path'],
                    'size' => $response['result']['size'],
                    'mime' => $response['result']['mime'],
                ]);

                $data->save();


                // make thumbnail html
                $file = array(
                    'id' => $data->id,
                    'diagnoses_id' => $data->diagnoses_id,
                    'original' => $data->original,
                    'source' => $data->source,
                    'path' => $data->path,
                    'mime' => $data->mime,
                    'size' => $data->size,
                    'fullpath' => $data->getRealPath('app/diagnosis'),
                    'preview' => $data->getPreviewPath(),
                    'created_at' => $data->created_at->format("Y-m-d H:i:s"),
                    'updated_at' => ($data->updated_at ? $data->updated_at->format("Y-m-d H:i:s") : ''),
                );
                $html = view('partials.diagnosis-image')->with(compact('file'))->render();

                $return = [
                    'thumbnail' => $html,
                    'status' => 'success'
                ];
            } else {
                $return = [
                    'status' => 'fail'
                ];
            }

            return response()->json($return);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param Int $id
     * 진단 항목에 대한 이미지 삭제
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileDelete(Request $request, $id)
    {
        try {
            $file = DiagnosisFile::findOrFail($id);
            // 실제파일 삭제하지않음
            $file->delete();
            return response()->json('success');

        } catch (Exception $e) {

            return response()->json('error');
        }
    }

    /**
     * @param Request $request
     * 진단완료 처리
     * @return \Illuminate\Http\JsonResponse
     */
    public function complete(Request $request)
    {
        try {
            $order_id = $request->get('order_id');
            $order = Order::findOrFail($order_id);
            $order->status_cd = 107;
            $order->diagnosed_at = Carbon::now();
            $order->save();
            return response()->json('success');
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

}
