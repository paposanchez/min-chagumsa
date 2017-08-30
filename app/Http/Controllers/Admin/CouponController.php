<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Coupon;

class CouponController extends Controller
{

    public function index(Request $request){

        $where = Coupon::orderBy('id', 'DESC');
        $sf = $request->get('s');

        if($sf){
            $where = $where->where('coupon_number', 'like', $sf.'%')
            ->orWhere('coupon_kind', 'like', $sf.'%');
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

        $entrys = $where->paginate(25);


        return view('admin.coupon.index', compact('entrys'));
    }



    public function create(){
        return view('admin.coupon.create');
    }

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
