<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Code;



class ItemController extends Controller
{
    public function index(){
		// $search_fields = Code::getCodesByGroup('post_search_field');	    
	    $where = Item::orderBy('id', 'DESC');
	    $entrys = $where->paginate(25);
	    
    	return view('admin.item.index', compact('entrys'));
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
