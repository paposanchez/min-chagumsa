<?php
/**
 * Created by PhpStorm.
 * User: minseok
 * Date: 2018. 2. 7.
 * Time: AM 11:44
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Mail\Order;
use App\Models\Car;
use App\Models\CarNumber;
use App\Models\Code;
use App\Models\Diagnoses;
use App\Models\Diagnosis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();

        $sort = $request->get('sort');
        $where = Diagnosis::whereIn('status_cd', [Code::getId('report_state', 'review_complete'), Code::getId('report_state', 'complete')]);
        if (!$sort) {
            $where->orderBy('created_at', 'DESC');
        }

        // 정렬옵션
        $sort_orderby = $request->get('sort_orderby');
        if ($sort) {
            if ($sort == 'status') {
                $where->orderBy('status_cd', $sort_orderby);
            } else {
                $where->orderBy($sort, $sort_orderby);
            }
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

        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre, $df) {
                $qry->where($df, ">=", $trs)
                    ->where($df, "<=", $tre);
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs, $df) {
                $qry->where($df, ">=", $trs)
                    ->orWhere(function ($qry) use ($trs, $df) {
                        $qry->where($df, ">=", $trs);
                    });
            });
        }

        $search_fields = [
            "chakey" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "engineer_name" => "엔지니어명",
            "bcs_name" => "BCS명",
            "email" => '이메일'
        ];

        $search_fields2 = [
            "created_at" => "신청일자",
            "start_at" => "진단시작일자",
            "completed_at" => "진단완료일자"
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'car_number':
                    $where->leftJoin('car_numbers', 'diagnosis.car_numbers_id', '=', 'car_numbers.id')
                        ->where('car_numbers.car_number', 'like', '%'.$s.'%')
                        ->select('diagnosis.*');
                    break;
                case 'order_num':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'orderer_name':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_name', 'like', '%'.$s.'%')
                        ->select('diagnosis.*');
                    break;
                case 'orderer_mobile':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_mobile', 'like', '%'.$s.'%')
                        ->select('diagnosis.*');
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
                case 'email':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
            }
        }

        $entrys = $where->paginate(25);

        return view('admin.review.index', compact('search_fields', 'search_fields2', 'sf', 's', 'trs', 'tre', 'entrys', 'status_cd', 'df', 'sort', 'sort_orderby', 'user'));
    }

    public function edit(Request $request, $id){
        $diagnosis = Diagnosis::findOrFail($id);

        if($diagnosis->status_cd != 126){
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }

        $order = $diagnosis->order;
        $vin_number_picture = Diagnoses::where('diagnosis_id', $diagnosis->id)->where('group', 2001)->first();
        $mileage_picture = Diagnoses::where('diagnosis_id', $diagnosis->id)->where('group', 2002)->first();

        return view('admin.review.edit', compact('diagnosis', 'order', 'vin_number_picture', 'mileage_picture'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'vin_number' => 'required',
            'mileage' => 'required'
        ], [],
            [
                'vin_number' => '차대번호',
                'mileage' => '주행거리'
            ]);

        try{

            DB::beginTransaction();
            $diagnosis = Diagnosis::findOrFail($id);
            $order = $diagnosis->order;

            $car = Car::create([
                'id' => $request->get('vin_number'),
                'brands_id' => $order->models_id,
                'models_id' => $order->models_id,
                'details_id' => $order->details_id,
                'grades_id' => $order->grades_id
            ]);
            $car_number = CarNumber::create([
                'cars_id' => $car->id,
                'vin_number' => $request->get('vin_number'),
                'car_number' => $order->car_number
            ]);

            $diagnosis->car_numbers_id = $car_number->id;
            $diagnosis->status_cd = Code::getId('report_state', 'complete');
            $diagnosis->mileage = $request->get('mileage');
            $diagnosis->issued_at = Carbon::now();
            $diagnosis->expired_at = Carbon::now()->addDays($diagnosis->expire_period);
            $diagnosis->save();

            DB::commit();
            return redirect()->route('review.index')->with('success', '진단이 발급되었습니다.');
        }catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }

}