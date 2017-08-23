<?php

namespace App\Http\Controllers\Bcs;

use App\Helpers\Helper;
use App\Mixapply\Uploader\Receiver;
use App\Models\Car;
use App\Models\Certificate;
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

class DiagnosesController extends Controller
{

    public function index(Request $request){
        $where = Order::orderBy('orders.id', 'DESC')->whereIn('orders.status_cd',  [106, 107, 108, 109])->where('garage_id', Auth::user()->id)
                            ;

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name'=>'주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');


        if($trs && $tre){
            //시작일, 종료일이 모두 있을때
            $where = $where->where(function($qry) use($trs, $tre){
                $qry->where("diagnose_at", ">=", $trs)
                    ->where("diagnose_at", "<=", $tre);
            })->orWhere(function($qry) use($trs, $tre){
                $qry->where("diagnosed_at", ">=", $trs)
                    ->where("diagnosed_at", "<=", $tre);
            });

        }elseif ($trs && !$tre){
            //시작일만 있을때
            $where = $where->where(function($qry) use($trs){
                $qry->where("diagnose_at", ">=", $trs);
            })->orWhere(function($qry) use($trs){
                $qry->where("diagnosed_at", ">=", $trs);
            });
        }else if(!$trs && $tre){
            $where = $where->where(function($qry) use($tre){
                $qry->where("diagnosed_at", "<=", $tre);
            })->orWhere(function($qry) use($tre){
                $qry->where("diagnosed_at", "<=", $tre);
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
                    $datekey = $order_split[1];
                    $car_number = $order_split[0];
                    $date_array = str_split($datekey, 2);

                    $date = Carbon::create('20'.''.$date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                    $next_day = Carbon::create('20'.''.$date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                    $where = $where->where('car_number', $car_number)
                        ->where('created_at', '>=', $date)
                        ->where('created_at', '<=', $next_day);
                }
                else{
                    if(strlen($s) > 6){
                        $where = $where->where('car_number', $s);
                    }else{
                        $date_array = str_split($s, 2);
                        $date = Carbon::create('20'.''.$date_array[0], $date_array[1], $date_array[2], '0', '0', '0');
                        $next_day = Carbon::create('20'.''.$date_array[0], $date_array[1], $date_array[2], '0', '0', '0')->addDay(1);

                        $where =$where->where('created_at', '>=', $date)->where('created_at', '<=', $next_day);
                    }

                }
            }
        }

        $entrys = $where->paginate(25);

        return view('bcs.diagnosis.index', compact('search_fields', 'entrys', 'search_fields'));
    }

    public function show($id){

        $order = Order::findOrFail($id);
        $diagnosis = new DiagnosisRepository();

        $entrys = $diagnosis->prepare($id)->get();



//        $entrys = response()->json($diagnosis->prepare($id)->get());
//        dd($entrys);
        return view('bcs.diagnosis.detail', compact('entrys', 'order'));
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
