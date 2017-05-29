<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    	$string = '{
"id": 1,
"table": {},
"status": 104,
"entrys": [
{
"group": {},
"name": "자동차 등록정보",
"save_table": {},
"total": 4,
"completed": 0,
"has_child": true,
"entrys": [
{
"key": 1077,
"name": "정보사진",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {},
"picture": [
{
"첫번쨰": "",
"placeholder": "자동차등록증 사진을 추가하세요"
},
{
"첫번쨰": "",
"placeholder": "주행거리계 사진을 추가하세요"
}
],
"selected": ""
}
]
}
]
}';


	$json =  json_encode($string);


	var_dump(json_decode($json, true));




//        $handler = new \App\Models\UserSequence();
//        $garage_id = $handler->setNewGarageSeq(1);
//        $garage_id = $handler->setNewGarageSeq(3);
//        $garage_id = $handler->setNewGarageSeq(6);
//        $handler->setNewEngineerSeq(2, 1);
//        $handler->setNewEngineerSeq(4, 1);
//        $handler->setNewEngineerSeq(5, 1);

        // return view('admin.dashboard.index');
    }

}
