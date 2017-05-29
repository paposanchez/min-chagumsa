<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;

//use Illuminate\Http\Request;

class WelcomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {
        $test = Item::where('id',1)->first();
//        dd(json_encode($test->layout));
//        dd(json_decode(json_encode($test->layout),true));
//        $va
//        $date = json_decode(json_encode(),true);
//        ->true 시리얼이즈




        $json1 = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

        var_dump(json_decode($json1));
        var_dump(json_decode($json1, true));

        $json = '{
    id : 1
    table : items
    status : 104    
    entrys : [
        {
            group : diagnosis_info,
            name : "자동차 등록정보",
            save_table : diagnosises,
            total : 4,
            completed : 0,
            has_child : true,
            entrys : [
                1076 : [
                    name : "정보사진",
                    save_table : diagnosis_details,
                    summery : "",
                    code_title : "",
                    code : {},
                    picture : [
                        {"첫번쨰" : "", placeholder : "자동차등록증 사진을 추가하세요"},
                        {"첫번쨰" : "", placeholder : "주행거리계 사진을 추가하세요"}
                    ],
                    selected : ""
                ],
                1078 : [
                    name : 차대번호,
                    save_table : diagnosis_details,
                    summery : "",
                    code_title : "",
                    code : {
                        1144 : "양호",
                        1145 : "상이",
                        1146 : "부식",
                        1147 : "훼손(오손)",
                        1148 : "변타"
                    },
                    picture : [
                        {"첫번쨰" : "", placeholder : "차대번호 사진을 추가하세요"}
                    ],
                    selected : ""
                ],
                1079 : [
                    name : "색상",
                    save_table : diagnosis_details,
                    summery : "",
                    code_title : "",
                    code : {
                        1149 : "흰색",
                        1150 : "검정",
                        1151 : "회색",
                        1152 : "적색",
                        1153 : "청색",
                        1154 : "기타"
                    },
                    picture : [
                        {"첫번쨰" : "", placeholder : "차량색상 사진을 추가하세요"}
                    ],
                    selected : ""
                ],
                1080 : [
                    name : "추가 옵션",
                    save_table : diagnosis_details,
                    summery : "전체 양호가 아닌 경우, 상태 이력 있음을 선택하여 상태별 부위를 선택하세요. 여러가지 상태를 선택할 수 있습니다."
                    code_title : "제논 헤드램프(HID)",
                    code : {
                        1155 : "양호",
                        1156 : "수리필요",
                        1157 : "없음"
                    },
                    picture : [
                        {"첫번쨰" : "", placeholder : "옵션 사진을 추가하세요"}
                    ],
                    selected : "",
                ]
            ],

            group : diagnosis_exterior,
            name : "주요 외판",
            total : 3,
            completed : 0,
            has_child : true,
            entrys : [
                1084 : [
                    name : "외판사진",
                    save_table : diagnosis_details,
                    summery : "",
                    code_title : "",
                    code : {},
                    picture : [
                        {"첫번쨰" : "", placeholder : "전방사진을 추가하세요"},
                        {"첫번쨰" : "", placeholder : "후방사진을 추가하세요"},
                        {"첫번쨰" : "", placeholder : "좌측사진을 추가하세요"},
                        {"첫번쨰" : "", placeholder : "우측사진을 추가하세요"}
                    ],
                    selected : "",
                    sound : false
                ],
                1085 : [
                    name : "주요 외판 상태",
                    save_table : diagnosis_details,
                    summery : "전체 양호가 아닌 경우, 상태이력 있음을 선택하여 상태별 부위를 선택하고 해당 부위에 대한 증빙사진을 추가하세요.",
                    code_title : "",
                    code : {
                        1158 : "전체 양호",
                        1159 : "상태이력 있음"
                    },
                    picture : [],
                    selected : "",
                    sound : false
                ],
                1075 : [
                    name : "점검의견",
                    save_table : diagnosis_details,
                    summery : "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
                    code_title : "",
                    code : {},
                    picture : [],
                    selected : "",
                    sound : true
                ],
            ]
        },
        
    ]
}

';
        $result = json_decode ($json);
        dd(json_decode(json_encode($json),true));
        $item = Item::where('id',1)->first();
//        dd(json_decode($item->layout,true));
        return response()->json(unserialize($item));

//        return view('web.welcome');
    }

}
