<?php

namespace App\Http\Controllers\Bcs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Settlement;
use App\Models\SettlementFeature;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //todo 해당 회원의 주문목록에서 진단완료 데이터를 출력한다
        //이때 정렬은 과거 데이터부터 보여주고 선택된 주문목록의 데이터를 정상 테이블에 입력하도록 한다
        /*
         * 정산된 리스트
         * select * from settlements a left join settlement_features b on (a.id == b.settlement_id) where a.user_id=1;
         * 미정산 리스트
         * select * from orders where garage_id=4 and not in (settlement_list) order by id desc
         */

        $search_fields = [
            "order_num" => "주문번호", "car_number" => "차량번호", 'orderer_name'=>'주문자성명', "orderer_mobile" => "주문자 핸드폰번호"
        ];

        $user = Auth::user();

        $settlement_where = Settlement::orderBy('id', 'DESC')->where('garage_id', $user->id);
//        $settle_

        $where = Order::orderBy('created_at', 'ASC')->where('garage_id', $user->id)
            ->whereIn('status_cd', [107, 108, 109]);


//        //주문상태
//        $status_cd = $request->get('status_cd');
//        if($status_cd){
//            $where = $where->where('status_cd', $status_cd);
//        }

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


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if($sf != "order_num"){
            if(in_array($sf, ["car_number", "orderer_name", "orderer_mobile"])){
                $where = $where->where($sf, 'like', '%'.$s.'%');
            }
        }

        $entrys = $where->paginate(25);

        return view('bcs.calculation.index', compact('search_fields', 'entrys', 'sf', 's', 'trs', 'tre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
