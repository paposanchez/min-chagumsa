<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Coupon;

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
    public function index(Request $request){
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');

        if($sort_orderby){
            $where = Coupon::select();
        }else{
            $where = Coupon::orderBy('id', 'DESC');
        }



        $sf = $request->get('sf');
        $s = $request->get('s');
        $search_fields = ["coupon_number" => "쿠폰번호", "coupon_kind" => "쿠폰종류"];


        // 정렬옵션
        if($sort){
            if($sort == 'status'){
                $where->orderBy('status_cd', $sort_orderby);
            }else{
                $where->orderBy($sort, $sort_orderby);
            }
        }


        //사용상태
        $is_use = $request->get('is_use');
        if ($is_use) {
            $where->where('is_use', $is_use);
        }

        if($sf){
            $where->where($sf, 'like',  '%' .$s . '%');
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

        $entrys = $where->paginate(25);

        return view('admin.coupon.index', compact('entrys', 'search_fields', 's', 'sf', 'tre', 'trs', 'is_use' , 'sort', 'sort_orderby'));
    }


    /**
     * 쿠폰 생성 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.coupon.create');
    }

    /**
     * @param Request $request
     * 쿠폰 생성 메소드
     * 새로운 쿠폰을 생성 한다.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'publish_num' => 'required|int',
            'coupon_kind' => 'required'
        ]);

        if ($validate->fails())
        {
            return redirect()->back()->with('error', "필수파라미터가 입력되지 않았습니다.");
        }

        $c_len = $request->get('publish_length', 10);

        $success_cnt = 0; //중복개수
        $insert_array = []; // 쿠폰데이터

        for($i=0;$i<$request->get('publish_num');$i++){
            $coupon_number = $this->get_coupon_number($c_len);

            $data = [
                'coupon_number' => $coupon_number, 'coupon_kind' => $request->get('coupon_kind')
            ];

            $insert_array[] = $data;
        }

        $model = new Coupon();
        DB::beginTransaction();
        try{
            $model->insert($insert_array);
            DB::commit();

            return redirect()->route('coupon.index')->with('success', '쿠폰발행이 완료 되었습니다.');
        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', '데이터부하로 쿠폰발행을 실패하였습니다.<br>Exception: '. $e->getMessage());
        }
    }

    /**
     * 재귀형식 쿠폰발생 method
     * @param $c_len int 쿠폰자리수
     * @return bool|string
     */
    protected function get_coupon_number($c_len){
        $coupon_number = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $c_len);
        $where = Coupon::where('coupon_number', $coupon_number)->first();
        if($where){
            $this->get_coupon_number($c_len);
        }else{
            return $coupon_number;
        }
    }

    /**
     * @param Request $request
     * 쿠폰사용자에 대한 정보 가져오
     * @return array
     */
    public function getUserInfo(Request $request){
        $validate = Validator::make($request->all(), [
            'id' => 'required|int'
        ]);

        if($validate->fails()){
            return ['status'=>'fail', 'mag' => '필수파라미터가 누락되었습니다.'];
        }else{
            $user = User::find($request->get('id'));

            if($user){
                return [
                    'email' => $user->email, 'name' => $user->name,
                    'mobile' => $user->mobile, 'created_at' => $user->created_at->format('Y-m-d'),
                    'msg' => "정상수신 되었습니다", 'status' => 'ok'

                ];
            }else{
                return[
                    'status' => 'fail', 'msg' => '사용자정보가 없습니다.'
                ];
            }
        }
    }

    /**
     * @param Request $request
     * 쿠폰삭제 메소드
     * 추후를 위하여 구현
     * admin사이트에는 구현 안 할 예정
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destory(Request $request){

        $validate = Validator::make($request->all(), [
            'id[]' => 'require|array'
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error', '삭제할 데이터가 없습니다.');
        }

        try{
            Coupon::whereIn($request->get('id0[]'))->destory();
            return redirect()->route('coupon.index')->with('success', '선택된 쿠폰이 삭제 되었습니다.');
        }catch (\Exception $e){
            return redirect()->back()->with('error', '쿠폰삭제를 실패하였습니다.<br>Exception: '. $e->getMessage());
        }
    }

}
