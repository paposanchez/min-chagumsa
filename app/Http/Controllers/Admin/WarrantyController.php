<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Warranty;
use DB;

class WarrantyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = Warranty::orderBy('id', 'DESC');

        // 정렬옵션
        $sort = $request->get('sort');
        $sort_orderby = $request->get('sort_orderby');
        if($sort){
            if($sort == 'status'){
                $where->orderBy('status_cd', $sort_orderby);
            }else{
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
        //검색조건
        $search_fields = [
            "id" => "seq 번호",
            "chakey" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "email" => '이메일'
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
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'chakey':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'orderer_name':
                    $where->where('orderer_name', 'like', '%' . $s . '%');
                    break;
                case 'orderer_mobile':
                    $where->where('orderer_mobile', 'like', '%' . $s . '%');
                    break;
            }
        }
        $entrys = $where->paginate(25);
        return view('admin.warranty.index', compact('search_fields', 'sf', 's', 'trs', 'tre', 'entrys', 'engineers', 'status_cd', 'sort', 'sort_orderby'));
    }

    public function show(Request $request, $id){
        return view('admin.warranty.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('role.index')
            ->with('success', 'Role deleted successfully');
    }

    public function edit(Request $request, $id){
        return view('admin.warranty.edit');
    }

}
