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
    public function index(Request $request)
    {
        $user = Auth::user();

        $sort = $request->get('sort');
        $where = Diagnosis::whereIn('status_cd', [Code::getIdByGroupAndName('report_state', 'review_complete'), Code::getIdByGroupAndName('report_state', 'complete')]);
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
                        ->where('car_numbers.car_number', 'like', '%' . $s . '%')
                        ->select('diagnosis.*');
                    break;
                case 'order_num':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'orderer_name':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_name', 'like', '%' . $s . '%')
                        ->select('diagnosis.*');
                    break;
                case 'orderer_mobile':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_mobile', 'like', '%' . $s . '%')
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

    public function edit(Request $request, $id)
    {
        $diagnosis = Diagnosis::findOrFail($id);

        if ($diagnosis->status_cd != 126) {
            return redirect()->back()->with('error', '잘못된 접근입니다.');
        }

        $order = $diagnosis->order;
        $vin_number_picture = Diagnoses::where('diagnosis_id', $diagnosis->id)->where('group', 2001)->first();
        $mileage_picture = Diagnoses::where('diagnosis_id', $diagnosis->id)->where('group', 2002)->first();

        $select_vin_yn = Code::getSelectList('yn');
        $kinds = Code::getSelectList('kind_cd');
        $select_color = Code::getSelectList('color_cd');
        $select_transmission = Code::getSelectList("transmission");
        $select_fueltype = Code::getSelectList('fuel_type');

        return view('admin.review.edit', compact('diagnosis', 'order', 'vin_number_picture', 'mileage_picture', 'kinds', 'select_color', 'select_transmission', 'select_fueltype', 'select_vin_yn'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vin_number' => 'required',
            'mileage' => 'required',
            'certificates_vin_yn_cd' => 'required',
            'cars_registration_date' => 'required',
            'cars_year' => 'required',
            'kind_cd' => 'required',
            'cars_displacement' => 'required',
            'cars_exterior_color' => 'required',
//            'car_exterior_color_etc' => 'required',
            'cars_transmission_cd' => 'required',
            'cars_fueltype_cd' => 'required',
//            'car_fueltype_etc' => 'required',
            'passenger' => 'required',
        ], [],
            [
                'vin_number' => '차대번호',
                'mileage' => '주행거리',
                'certificates_vin_yn_cd' => '차대번호 동일성확인',
                'cars_registration_date' => '최초등록일',
                'cars_year' => '연식',
                'kind_cd' => '차종',
                'cars_displacement' => '배기량',
                'cars_exterior_color' => '외부색상',
//                'car_exterior_color_etc' => '외부색상 기타',
                'cars_transmission_cd' => '변속기',
                'cars_fueltype_cd' => '사용연료',
//                'car_fueltype_etc' => '연료타입기타',
                'passenger' => '승차인원'
            ]);

        try {

            DB::beginTransaction();
            $diagnosis = Diagnosis::findOrFail($id);
            $order = $diagnosis->order;

            $car = Car::create([
                'id' => $request->get('vin_number'),
                'brands_id' => $order->models_id,
                'models_id' => $order->models_id,
                'details_id' => $order->details_id,
                'grades_id' => $order->grades_id,
                'certificates_vin_yn_cd' => $request->get('certificates_vin_yn_cd'),
                'cars_registration_date' => $request->get('cars_registration_date'),
                'cars_year' => $request->get('cars_year'),
                'kind_cd' => $request->get('kind_cd'),
                'cars_displacement' => $request->get('cars_displacement'),
                'cars_exterior_color' => $request->get('cars_exterior_color'),
                'car_exterior_color_etc' => $request->get('car_exterior_color_etc') ? $request->get('car_exterior_color_etc') : '',
                'cars_transmission_cd' => $request->get('cars_transmission_cd'),
                'cars_fueltype_cd' => $request->get('cars_fueltype_cd'),
                'car_fueltype_etc' => $request->get('car_fueltype_etc') ? $request->get('car_fueltype_etc') : '',
                'passenger' => $request->get('passenger')
            ]);
            $car_number = CarNumber::create([
                'cars_id' => $car->id,
                'vin_number' => $request->get('vin_number'),
                'car_number' => $order->car_number
            ]);

            $diagnosis->car_numbers_id = $car_number->id;
            $diagnosis->status_cd = Code::getIdByGroupAndName('report_state', 'complete');
            $diagnosis->mileage = $request->get('mileage');
            $diagnosis->issued_at = Carbon::now();
            $diagnosis->expired_at = Carbon::now()->addDays($diagnosis->expire_period);
            $diagnosis->save();

            DB::commit();
            return redirect()->route('review.index')->with('success', '진단이 발급되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }

}