<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendSms;
use App\Models\Car;
use App\Models\Certificate;
use App\Models\Notification;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\User;
use App\Repositories\CertificateRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    /**
     * @param Request $request
     * 인증서 인덱스 페이지
     * 진단완료, 검토중, 인증서 발급 목록 노출
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');
        if (!$sort) {
            $where = Certificate::select()->orderBy('created_at', 'desc');
        } else {
            $where = Certificate::select();
        }

        // 정렬옵션
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
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre)
                    ->orWhere(function ($qry) use ($trs, $tre) {
                        $qry->where("updated_at", ">=", $trs)
                            ->where("updated_at", "<=", $tre);
                    });
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs)
                    ->orWhere(function ($qry) use ($trs) {
                        $qry->where("updated_at", ">=", $trs);
                    });
            });
        }

        $search_fields = [
            "id" => "seq 번호",
            "chakey" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "email" => '이메일',
            "tech_name" => "기술사명"
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'id':
                    $where->where($sf, $s);
                    break;
                case 'car_number':
                    $where->leftJoin('car_numbers', 'certificates.car_numbers_id', '=', 'car_numbers.id')
                        ->where('car_numbers.car_number', 'like', '%' . $s . '%')
                        ->select('certificates.*');
                    break;
                case 'chakey':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'orderer_name':
                    $where->leftJoin('order_items', 'certificates.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_name', 'like', '%' . $s . '%')
                        ->select('certificates.*');

                    break;
                case 'orderer_mobile':
                    $where->leftJoin('order_items', 'certificates.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_mobile', 'like', '%' . $s . '%')
                        ->select('certificates.*');
                    break;
                case 'tech_name':
                    $where->leftJoin('users', 'certificates.technist_id', '=', 'users.id')
                        ->where('users.name', 'like', '%' . $s . '%')
                        ->select('certificates.*');
                    break;
            }
        }

        $entrys = $where->paginate(25);

        return view('admin.certificate.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'status_cd', 'sort_orderby', 'sort'));
    }


    /**
     * @param Request $reqeust
     * @param Int $order_id
     * 인증서 발급페이지
     * 인증서를 임시저장하거나 발급하는 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $reqeust, $id)
    {

        try {
            $certificate = Certificate::findOrFail($id);

            if ($certificate->status_cd == Code::getIdByGroupAndName('report_state', 'order')) {
                $certificate->status_cd = Code::getIdByGroupAndName('report_state', 'review');
                $certificate->technist_id = Auth::user()->id;
                $certificate->start_at = Carbon::now();
                $certificate->save();
            }

            $car = $certificate->CarNumber->car;
            $grades = Code::getSelectList('grade_state_cd');
            $operation_state_cd = Code::getSelectList('operation_state_cd');
            $certificate_states = Code::getSelectList('certificate_state_cd');
            $standard_states = Code::getSelectList('standard_cd');

            return view('admin.certificate.edit', compact('certificate', 'grades', 'car', 'standard_states', 'operation_state_cd', 'certificate_states'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '처리중 오류가 발생하였습니다.');
        }
    }

    /**
     * @param Request $request
     * @param Int $id
     * 인증서 데이터 갱신
     * section==basic : 주문 및 차량정보. 해당 데이터에 대한 처리는 무조건 update만 존재한다. 대상 테이블: order, car, certificates
     * section==history : 이력정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * section==price: 가격정보. 기존 인증서 내용이 없다면 insert, 있다면 수정이다. 향후 해당 처리에 대한 정책검토 필요함. 대상 테이블: certificates
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $certificate = Certificate::findOrFail($id);
            $complete_state = Code::getIdByGroupAndName('report_state', 'complete');

            if ($certificate->status_cd == $complete_state) {
                return redirect()->back()->with('error', '발급완료된 인증서입니다.');
            }

            $certificate_data = [
                "vin_yn_cd" => $request->get("certificates_vin_yn_cd"),
                "history_owner" => $request->get('certificates_history_owner'),
                "history_insurance" => $request->get("certificates_history_insurance"),
                "history_purpose" => $request->get("certificates_history_purpose"),
                "history_garage" => $request->get("certificates_history_garage"),
                "price" => $request->get("pst"),
                "new_car_price" => $request->get("certificates_new_car_price"),
                "basic_registraion" => $request->get("certificates_basic_registraion"),
                "basic_registraion_depreciation" => $request->get("basic_registraion_depreciation"),
                "basic_etc" => $request->get("certificates_basic_etc"),
                "usage_mileage_cd" => $request->get("certificates_usage_mileage_cd"),
                "usage_mileage_depreciation" => $request->get("certificates_usage_mileage_depreciation"),
                "usage_history_cd" => $request->get("certificates_usage_history_cd"),
                "usage_history_depreciation" => $request->get("certificates_usage_history_depreciation"),
                "performance_exterior_cd" => $request->get("performance_exterior_cd"),          //차량외부점검
                "performance_interior_cd" => $request->get('performance_interior_cd'),          //차량내부점검
                "performance_plugin_cd" => $request->get('performance_plugin_cd'),              //전장장착품작동상태
                "performance_broken_cd" => $request->get("performance_broken_cd"),              //고잔진단
                "performance_engine_cd" => $request->get('performance_engine_cd'),              //원동기
                "performance_transmission_cd" => $request->get('performance_transmission_cd'),  //변속기
                "performance_power_cd" => $request->get('performance_power_cd'),                //동력전달
                "performance_steering_cd" => $request->get('performance_steering_cd'),          //조향장치 및 현가장치
                "performance_braking_cd" => $request->get('performance_braking_cd'),            //제동장치
                "performance_electronic_cd" => $request->get('performance_electronic_cd'),      //전기장치
                "performance_tire_cd" => $request->get('performance_tire_cd'),                  //휠&타이어
                "performance_driving_cd" => $request->get('performance_driving_cd'),            //주행테스트
                "exterior_comment" => $request->get('exterior_comment'),
                "interior_comment" => $request->get('interior_comment'),
                "plugin_comment" => $request->get('plugin_comment'),
                "broken_comment" => $request->get('broken_comment'),
                "engine_comment" => $request->get('engine_comment'),
                "transmission_comment" => $request->get('transmission_comment'),
                "power_comment" => $request->get('power_comment'),
                "steering_comment" => $request->get('steering_comment'),
                "braking_comment" => $request->get('braking_comment'),
                "electronic_comment" => $request->get('electronic_comment'),
                "tire_comment" => $request->get('tire_comment'),
                "driving_comment" => $request->get('driving_comment'),
                "performance_depreciation" => $request->get("performance_depreciation"), // 차량성능상태 감가금액
                "history_depreciation" => $request->get('history_depreciation'), // 사용이력 감가금액 ( 현재 없음 )
                "basic_depreciation" => $request->get("basic_depreciation"), // 기본가격 감가금액 ( 현재없음 )
                "special_flooded_cd" => $request->get("certificates_special_flooded_cd"),
                "special_fire_cd" => $request->get("certificates_special_fire_cd"),
                "special_fulllose_cd" => $request->get("certificates_special_fulllose_cd"),
                "special_remodel_cd" => $request->get("certificates_special_remodel_cd"),
                "special_etc_cd" => $request->get("certificates_special_etc_cd"),
                "special_depreciation" => $request->get("special_depreciation"),
                "valuation" => $request->get("certificates_valuation"),
                "opinion" => $request->get("certificates_opinion"),
                "grade" => $request->get('grade_state_cd'),
                "usage_flood_cd" => $request->get('certificates_usage_flood_cd'),
                "flood_comment" => $request->get('flood_comment'),
                "history_comment" => $request->get('history_comment'),
                // todo 대표사진 가져오는거...
//                "pictures" => $request->get('selecte_picture_id') ? $request->get('selecte_picture_id') : $order_where->getExteriorPicture()[0]->files[0]->id
            ];

            DB::beginTransaction();

            $certificate->update($certificate_data);

            DB::commit();

            return redirect()->back()->with('success', '정상적으로 인증서가 저장되었습니다.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', '인증서 정보가 갱신이 실패하였습니다.<br>' . $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * 인증서 발행 메소드
     * 현재 검토중 상태인 주문을 인증서발급완료 상태로 변경
     * 인증서를 수정 할 수 없으며, 다른 사용자가 이 인증서에 접근 할 수 있다.
     * 고객에게 인증서가 발급되었다는 메일, 문자를 전송한다.
     * @return \Illuminate\Http\JsonResponse
     */
    public function issue(Request $request)
    {
        try {
            $obj = $request->get('params');

            $params = [];
            parse_str($obj, $params);

            $validate = Validator::make($params, [
                'certificates_new_car_price' => 'required',
                'pst' => 'required',
                'basic_depreciation' => 'required',
                'certificates_basic_registraion' => 'required',
                'basic_registraion_depreciation' => 'required',
                'certificates_basic_etc' => 'required',
                'history_depreciation' => 'required',
                'certificates_usage_mileage_cd' => 'required',
                'certificates_usage_mileage_depreciation' => 'required',
                'certificates_usage_history_cd' => 'required',
                'certificates_usage_history_depreciation' => 'required',
                'certificates_usage_flood_cd' => 'required',
                'performance_depreciation' => 'required',
                'performance_exterior_cd' => 'required',
                'performance_interior_cd' => 'required',
                'performance_plugin_cd' => 'required',
                'performance_broken_cd' => 'required',
                'performance_engine_cd' => 'required',
                'performance_transmission_cd' => 'required',
                'performance_power_cd' => 'required',
                'performance_steering_cd' => 'required',
                'performance_braking_cd' => 'required',
                'performance_electronic_cd' => 'required',
                'performance_tire_cd' => 'required',
                'performance_driving_cd' => 'required',
                'special_depreciation' => 'required',
                'certificates_valuation' => 'required',
                'grade_state_cd' => 'required',
                'certificates_opinion' => 'required'
            ], [], [
                'certificates_new_car_price' => '산차출고가격',
                'pst' => '기준가격(P)',
                'basic_depreciation' => '기본평가(A)',
                'certificates_basic_registraion' => '등록일보정 옵션',
                'basic_registraion_depreciation' => '등록일보정 감가금액',
                'certificates_basic_etc' => '색상등 기타 감가금액',
                'history_depreciation' => '주요이력평가(B)',
                'certificates_usage_mileage_cd' => '주행거리 옵션',
                'certificates_usage_mileage_depreciation' => '주행거리 감가금액',
                'certificates_usage_history_cd' => '사고/수리이력 옵션',
                'certificates_usage_history_depreciation' => '사고/수리이력 감가금액',
                'certificates_usage_flood_cd' => '침수점검',
                'performance_depreciation' => '종합진단결과(C) 감가금액',
                'performance_exterior_cd' => '차량외부점검',
                'performance_interior_cd' => '차량내부점검',
                'performance_plugin_cd' => '전장장착품작동상태',
                'performance_broken_cd' => '고장진단',
                'performance_engine_cd' => '원동기',
                'performance_transmission_cd' => '변속기',
                'performance_power_cd' => '동력전달',
                'performance_steering_cd' => '조향장치 및 현가장치',
                'performance_braking_cd' => '제동장치',
                'performance_electronic_cd' => '전기장치',
                'performance_tire_cd' => '휠&타이어',
                'performance_driving_cd' => '주행테스',
                'special_depreciation' => '특별요인(S)',
                'certificates_valuation' => '평가금액',
                'grade_state_cd' => '등급평가',
                'certificates_opinion' => '종합의견'
            ]);

            if ($validate->fails()) {
                return response()->json($validate->errors());
            }

            DB::beginTransaction();
            $certificate = Certificate::findOrFail($params['certificate_id']);
            $certificate->status_cd = Code::getIdByGroupAndName('report_state', 'complete');
            $certificate->completed_at = Carbon::now();
            $certificate->expired_at = $certificate->getExpireDate();
            $certificate->save();

            DB::commit();
            return response()->json('success');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }
}
