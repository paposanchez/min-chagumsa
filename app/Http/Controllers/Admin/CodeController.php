<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeController extends Controller {

        /**
        * 코드 테이블의 코드 리스트 출력 페이지
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
        public function index() {

                $where = Code::orderBy('group', 'ASC')->orderBy('name', 'ASC');
                $entrys = $where->paginate(20);

                return view('admin.code.index', compact('entrys'));
        }

}
