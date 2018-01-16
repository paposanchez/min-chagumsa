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
            "order_num" => "주문번호",
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
                case 'car_number':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'order_num':
                    list($car_number, $datekey) = explode("-", $s);

                    if ($car_number && $datekey) {
                        $order_date = Carbon::createFromFormat('ymd', $datekey);
                        $where
                            ->where('car_number', $car_number)
                            ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                            ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                            ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'));
                    }
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warrantys = Warranty::get();
        return view('admin.warranty.create', compact('warrantys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|unique:warrantys,name',
            'display_name' => 'required',
            'role' => 'required',
        ], [], [
            'name' => trans('admin/warranty.name'),
            'display_name' => trans('admin/warranty.display_name'),
            'description' => trans('admin/warranty.description'),
            'role' => trans('admin/warranty.role'),
        ]);

        $warranty = new Warranty();
        $warranty->name = $request->input('name');
        $warranty->display_name = $request->input('display_name');
        $warranty->description = $request->input('description');
        $warranty->save();

        if ($request->input('role')) {
            foreach ($request->input('role') as $value) {
                $warranty->attachWarranty($value);
            }
        }

        return redirect()->route('warranty.edit', [$warranty->id])
            ->with('success', trans("admin/warranty.created"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $warranty = Warranty::find($id);
        $warrantys = Warranty::get();

        $roleWarrantys = DB::table("warranty_role")
            ->where("warranty_role.role_id", $id)
            ->pluck('warranty_role.warranty_id', 'warranty_role.warranty_id');

        return view('admin.warranty.edit', compact('warranty', 'warrantys', 'roleWarrantys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //            'name' => 'required|min:3|unique:warrantys,name',
            'display_name' => 'required',
            'role' => 'required',
        ], [], [
            //            'name' => trans('admin/warranty.name'),
            'display_name' => trans('admin/warranty.display_name'),
            'description' => trans('admin/warranty.description'),
            'role' => trans('admin/warranty.role')
        ]);

        $warranty = Warranty::find($id);
        $warranty->display_name = $request->input('display_name');
        $warranty->description = $request->input('description');
        $warranty->save();


        if ($request->input('role')) {
            DB::table("warranty_role")->where("warranty_role.role_id", $id)
                ->delete();

            foreach ($request->input('warranty') as $key => $value) {
                $warranty->attachWarranty($value);
            }
        }

        return redirect()->back()
            ->with('success', 'Role updated successfully');
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

}
