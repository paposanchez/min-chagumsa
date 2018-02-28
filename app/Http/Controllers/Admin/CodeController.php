<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller
{

    /**
     * 코드 테이블의 코드 리스트 출력 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $where = Code::orderBy('group', 'ASC')->orderBy('name', 'ASC');

        //검색조건
        $search_fields = [
            "id" => "코드번호",
            "name" => "이름",
            'group' => '그룹'
        ];

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {

            $where->where($sf, 'like', '%' . $s . '%');

        }


        $entrys = $where->paginate(20);

        return view('admin.code.index', compact('entrys', 'search_fields', 'sf', 's'));
    }

}
