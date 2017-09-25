<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Car;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use App\Repositories\DiagnosisRepository;
use Illuminate\Support\Facades\Cache;

use DB;

class DiagnosesController extends Controller
{

        public function index(Request $request){

                $where = Order::whereIn('orders.status_cd',  [106, 107, 108, 109]);

                // 정렬옵션
                if($request->get('sort') == 'order_num'){
                        $where
                        ->orderBy('car_number', 'ASC')
                        ->orderBy('created_at', 'ASC');
                }else{
                        $where->orderBy('id', 'DESC');
                }

                //주문상태
                $status_cd = $request->get('status_cd');
                if ($status_cd) {
                        $where->where('status_cd', $status_cd);
                }

                //기간 검색
                $trs = $request->get('trs');
                $tre = $request->get('tre');
                if ($trs) {
                        $where->where(function ($qry) use ($trs, $tre) {
                                $qry->where("created_at", ">=", $trs);
                        });
                }

                if ($tre) {
                        $where->where(function ($qry) use ($tre) {
                                $qry->where("created_at", "<=", $tre);
                        });
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


                //검색어 검색
                $sf = $request->get('sf'); //검색필드
                $s = $request->get('s'); //검색어
                if ($s)
                {
                        switch($sf)
                        {
                                case 'order_id':
                                $where->where('id', 'like',  '%' .$s . '%');
                                break;
                                case 'car_number':
                                $where->where($sf, 'like', '%' . $s . '%');
                                break;
                                case 'order_num':
                                list($car_number, $datekey) = explode("-", $s);

                                if($car_number && $datekey)
                                {
                                        $order_date = Carbon::createFromFormat('ymd', $datekey);
                                        $where
                                        ->where('car_number', $car_number)
                                        ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                                        ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                                        ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))
                                        ;
                                }
                                break;
                                case 'orderer_name':
                                $where->where('orderer_name', 'like', '%' . $s . '%');
                                break;
                                case 'orderer_mobile':
                                $where->where('orderer_mobile', 'like', '%' . $s . '%');
                                break;
                                case 'engineer_name':
                                $where->whereHas('engineer', function ($query) use ($s){
                                        $query
                                        ->where('name', 'like', '%' . $s.'%');
                                });
                                break;
                                case 'bcs_name':
                                $where->whereHas('garage', function ($query) use ($s){
                                        $query
                                        ->where('name', 'like', '%' . $s.'%');
                                });
                                break;
                                case 'tech_name':
                                $where->whereHas('technician', function ($query) use ($s){
                                        $query->where('name', 'like', $s.'%');
                                });
                                break;
                                case 'tech_name':
                                $where->whereHas('technician', function ($query) use ($s){
                                        $query->where('name', 'like', $s.'%');
                                });
                                break;
                        }
                }

                $entrys = $where->paginate(25);

                return view('admin.diagnosis.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys'));
        }

        public function show(Request $request, $id){
                $order = Order::findOrFail($id);

                $handler = new DiagnosisRepository();
                $diagnosis = $handler->prepare($id)->get();

                return view('admin.diagnosis.detail', compact('diagnosis', 'order'));
        }

        public function updateCode(Request $request){
                $id = $request->get('id');
                $selected = $request->get('selected');
                $diagnosis = Diagnosis::where('id', $id)->first();
                $diagnosis->selected = $selected;
                $diagnosis->save();
                return $diagnosis;

        }

        public function updateComment(Request $request){
                try{
                        $diagnosis_id = $request->get('diagnosis_id');
                        $comment = $request->get('comment');

                        $diagnosis = Diagnosis::findOrFail($diagnosis_id);
                        $diagnosis->comment = $comment;
                        $diagnosis->save();

                        return response()->json();
                }catch (\Exception $ex){
                        return response()->json($ex->getMessage());
                }
        }


        public function fileUpload(){

        }
        public function fileDelete(Request $request, $id){


                try{
                        $file = DiagnosisFile::findOrFail($id);
                        // 실제파일 삭제하지않음
                        // $file->delete();
                        return response()->json([
                                'status' => 'success'
                        ]);

                }catch(Exception $e){

                        return response()->json([
                                'status' => 'error'
                        ]);
                }



        }







        public function edit($id){

        }

        public function store(Request $request){

        }

        public function insuranceFile(Request $request){

        }

        public function insuranceFileView($id){

        }

        public function history(Request $request){

        }

        public function update(Request $request, $id){

        }


}
