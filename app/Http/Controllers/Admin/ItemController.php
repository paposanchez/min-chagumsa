<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;



class ItemController extends Controller
{
    public function index(Request $request){
		// $search_fields = Code::getCodesByGroup('post_search_field');	    
	    $where = Item::orderBy('id', 'DESC');



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

        $s = $request->get('s');
        $sf = $request->get('sf');
        if($s){
            $where->where($sf, 'like', '%' . $s . '%');
        }

        $search_fields = [
            "name" => "상품명",
            "price" => "가격"
        ];


	    $entrys = $where->paginate(25);
	    
    	return view('admin.item.index', compact('entrys', 'trs', 'tre', 's', 'sf', 'search_fields'));
    	// return view('admin.item.index');
    }

    public function show(Request $request, $id){
        $item = Item::findOrFail($id);
        return view('admin.item.show', compact('item'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'commission' => 'required',
            'guarantee' => 'required',
            'wage' => 'required',
            'alliance_ratio' => 'required',
            'certi_ratio' => 'required',
            'self_ratio' => 'required',
        ], [],
        [
            'name' => '상품명',
            'price' => '가격',
            'commission' => 'PG 수수료',
            'guarantee' => '보증료',
            'wage' => '공임비용',
            'alliance_ratio' => '얼라이언스 Com',
            'certi_ratio' => '기술사 Com',
            'self_ratio' => '수익',
        ]);


    }
}
