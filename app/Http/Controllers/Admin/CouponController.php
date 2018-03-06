<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Coupon;
use Maatwebsite\Excel\Facades\Excel;

class CouponController extends Controller
{

    /**
     * @param Request $request
     * 쿠폰 인덱스 페이지
     * 현재 발행된 쿠폰 리스트를 출력한다.
     * 새로운 쿠폰을 발행 할 수 있다.
     * 최소 글자 수는 10글자
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');

        if ($sort_orderby) {
            $where = Coupon::select();
        } else {
            $where = Coupon::orderBy('id', 'DESC');
        }

        $status_cd = $request->get('status_cd');
        if($status_cd){
            $where->where('status_cd', $status_cd);
        }

        $sf = $request->get('sf');
        $s = $request->get('s');
        $search_fields = ["coupon_number" => "쿠폰번호", "coupon_kind" => "쿠폰종류"];


        // 정렬옵션
        if ($sort) {
            if ($sort == 'is_used') {
                $where->orderBy('is_use', $sort_orderby);
            }elseif ($sort == 'status'){
                $where->orderBy('status_cd', $sort_orderby);
            } else {
                $where->orderBy($sort, $sort_orderby);
            }
        }


        //사용상태
        $is_use = $request->get('is_used');
        if ($is_use) {
            $where->where('is_use', $is_use);
        }

        if ($sf) {
            $where->where($sf, 'like', '%' . $s . '%');
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

        $coupon_status = Code::getSelectList('coupon_state');

        $entrys = $where->paginate(10);

        return view('admin.coupon.index', compact('entrys', 'search_fields', 's', 'sf', 'tre', 'trs', 'is_use', 'sort', 'sort_orderby', 'coupon_status', 'status_cd'));
    }


    /**
     * 쿠폰 생성 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * @param Request $request
     * 쿠폰 생성 메소드
     * 새로운 쿠폰을 생성 한다.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'codes' => 'required',
            'coupon_kind' => 'required',
            'amount' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', "필수파라미터가 입력되지 않았습니다.");
        }

        try {
            DB::beginTransaction();

            for ($i = 1; $i <= $request->get('publish_num'); $i++) {
                Coupon::create([
                    'coupon_kind' => $request->get('coupon_kind'),
                    'coupon_number' => $this->get_coupon_number($request->get('codes')),
                    'amount' => $request->get('amount'),
                ]);
            }

            DB::commit();
            return redirect()->route('coupon.index')->with('success', '쿠폰발행이 완료 되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '데이터부하로 쿠폰발행을 실패하였습니다.<br>Exception: ' . $e->getMessage());
        }
    }

    /**
     * 재귀형식 쿠폰발생 method
     * @param $c_len int 쿠폰자리수
     * @return bool|string
     */
    protected function get_coupon_number($codes)
    {
        $seed = [];

        $seed[] = $codes;                         // 시간포함 8자리

        for ($i=0; $i<2; $i++){
            $seed[] = str_random(4);
        }
        $seed[] = str_random(5);    // 숫자 6자리

        return implode("-", $seed);     // 하이픈 포한 총 20자리
    }

    public function getDetail(Request $request)
    {
        try {
            $id = $request->get('id');
            $coupon = Coupon::findOrFail($id);

            return response()->json(
                [
                    'status_cd' => $coupon->status_cd,
                    'id' => $coupon->id,
                    'is_use' => $coupon->is_use,
                    'coupon_kind' => $coupon->coupon_kind,
                    'amount' => $coupon->amount,
                    'coupon_number' => $coupon->coupon_number
                ]
            );
        } catch (\Exception $e) {
            return response()->json('fail');
        }
    }

    public function update(Request $request)
    {
        try {
            $this->validate($request, [
                'coupon_kind' => 'required',
                'amount' => 'required',
                'status_cd' => 'required'
            ], [],
                [
                    'coupon_kind' => '쿠폰종류',
                    'amount' => '할인금액',
                    'status_cd' => '상태'
                ]);
            DB::beginTransaction();
            $coupon = Coupon::findOrFail($request->get('coupon_id'));
            $coupon->coupon_kind = $request->get('coupon_kind');
            $coupon->amount = $request->get('amount');
            $coupon->status_cd = $request->get('status_cd');
            $coupon->save();
            DB::commit();
            return redirect()->back()->with('success', '정상적으로 저장되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '처리중 오류가 발생하였습니다.');
        }
    }

    public function excelDownload(Request $request){
        try{
            $where = Coupon::select('coupon_kind', 'coupon_number', 'amount');

            $sf = $request->get('ex_sf');
            $s = $request->get('ex_s');
            $status_cd = $request->get('ex_status_cd');

            if($request->get('sf')){
                $where->where($sf, 'like', '%' . $s . '%');
            }

            if($status_cd){
                $where->where('status_cd', $status_cd);
            }

            $where = $where->get();

            Excel::create('coupons', function($excel) use($where) {
                $excel->sheet('Sheet 1', function($sheet) use($where) {
                    $sheet->fromArray($where);
                });
            })->export('xls');
        }catch (\Exception $e){
            return redirect()->back()->with('error', '처리중 오류가 발생하였습니다.');
        }

    }









//    /**
//     * @param Request $request
//     * 쿠폰삭제 메소드
//     * 추후를 위하여 구현
//     * admin사이트에는 구현 안 할 예정
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function destory(Request $request)
//    {
//
//        $validate = Validator::make($request->all(), [
//            'id[]' => 'require|array'
//        ]);
//        if ($validate->fails()) {
//            return redirect()->back()->with('error', '삭제할 데이터가 없습니다.');
//        }
//
//        try {
//            Coupon::whereIn($request->get('id0[]'))->destory();
//            return redirect()->route('coupon.index')->with('success', '선택된 쿠폰이 삭제 되었습니다.');
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', '쿠폰삭제를 실패하였습니다.<br>Exception: ' . $e->getMessage());
//        }
//    }


//    /**
//     * @param Request $request
//     * 쿠폰사용자에 대한 정보 가져오
//     * @return array
//     */
//    public function getUserInfo(Request $request){
//        $validate = Validator::make($request->all(), [
//            'id' => 'required|int'
//        ]);
//
//        if($validate->fails()){
//            return ['status'=>'fail', 'mag' => '필수파라미터가 누락되었습니다.'];
//        }else{
//            $user = User::find($request->get('id'));
//
//            if($user){
//                return [
//                    'email' => $user->email, 'name' => $user->name,
//                    'mobile' => $user->mobile, 'created_at' => $user->created_at->format('Y-m-d'),
//                    'msg' => "정상수신 되었습니다", 'status' => 'ok'
//
//                ];
//            }else{
//                return[
//                    'status' => 'fail', 'msg' => '사용자정보가 없습니다.'
//                ];
//            }
//        }
//    }

}
