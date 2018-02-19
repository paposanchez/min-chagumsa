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
    }


    public function create(Request $request){
        $car_sort_list = Code::getSelectList('car_sort');
        $type_list = Code::getSelectList('report_type');

        return view('admin.item.create', compact('car_sort_list', 'type_list'));
    }

    public function store(Request $request){
        try{
            $requestData = $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'commission' => 'required',
                'cost' => 'required',
                'wage' => 'required',
                'guarantee' => 'required',
                'alliance_ratio' => 'required',
                'certi_ratio' => 'required',
                'self_ratio' => 'required',
                'status_cd' => 'boolean',
                'car_sort_cd' => 'required',
                'type_cd' => 'required'
            ], [],
                [
                    'name' => '상품명',
                    'price' => '가격',
                    'commission' => 'PG 수수료',
                    'cost' => '카히스토리 고정비용',
                    'wage' => '공임비용',
                    'guarantee' => 'BNP 보증료',
                    'alliance_ratio' => '얼라이언스 Com',
                    'certi_ratio' => '기술사 Com',
                    'self_ratio' => '수익',
                    'car_sort_cd' => '차량 분류',
                    'type_cd' => '상품 분류'
                ]);


            $item = new Item();
            $item->create($requestData);

            return redirect()->route('item.index')->with('success', '저장되었습니다.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', '오류가 발생햇습니다.');
        }
    }

    public function edit(Request $request, $id){
        $item = Item::findOrFail($id);
        $car_sort_list = Code::getSelectList('car_sort');
        $type_list = Code::getSelectList('report_type');

        return view('admin.item.edit', compact('item', 'car_sort_list', 'type_list'));
    }

    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'commission' => 'required',
                'cost' => 'required',
                'wage' => 'required',
                'guarantee' => 'required',
                'alliance_ratio' => 'required',
                'certi_ratio' => 'required',
                'self_ratio' => 'required',
                'status_cd' => 'boolean'
            ], [],
                [
                    'name' => '상품명',
                    'price' => '가격',
                    'commission' => 'PG 수수료',
                    'cost' => '카히스토리 고정비용',
                    'wage' => '정비소 공임비용',
                    'guarantee' => 'BNP 보증료',
                    'alliance_ratio' => '얼라이언스 Com',
                    'certi_ratio' => '기술사 Com',
                    'self_ratio' => '수익',
                    'status_cd' => '사용여부',
                ]);
            $item = Item::findOrFail($request->get('item_id'));
            $item->update([
                'name' => $request->get('name'),
                'car_sort_cd' => $request->get('car_sort_cd'),
                'type_cd' => $request->get('type_cd'),
                'price' => $request->get('price'),
                'commission' => $request->get('commission'),
                'cost' => $request->get('cost'),
                'wage' => $request->get('wage'),
                'guarantee' => $request->get('guarantee'),
                'alliance_ratio' => $request->get('alliance_ratio'),
                'certi_ratio' => $request->get('certi_ratio'),
                'self_ratio' => $request->get('self_ratio'),
                'status_cd' => $request->get('status_cd') ? $request->get('status_cd') : 2
            ]);

            return redirect()->back()->with('success', '저장되었습니다.');
        }catch(\Exception $e){
            return redirect()->back()->with('error', '오류가 발생햇습니다.');
        }
    }

    public function destroy(Request $request, $id){
        try{
            $item = Item::findOrFail($id);
            $item->delete();

            return redirect()->route('item.index')->with('success', '정상적으로 삭제되었습니다.');
        }catch(\Exception $e){
            return redirect()->back()->with('erorr', '오류가 발생했습니다.');
        }


    }
}
