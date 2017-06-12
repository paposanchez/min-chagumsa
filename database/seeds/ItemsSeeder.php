<?php

/**
 * Created by PhpStorm.
 * User: dev
 * Date: 2017. 5. 29.
 * Time: PM 6:01
 */
class ItemsSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('items')->insert([
            'name' => '인증서 1',
            'price' => '100000',
            'layout' => '{
"id": 1,
"table": "items",
"status": 104,
"entrys": [
{
"group": "diagnosis_info",
"name": "자동차 등록정보",
"save_table": "diagnosises",
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
{ "첫번쨰": "", "placeholder": "자동차등록증 사진을 추가하세요" },
{ "두번쨰": "", "placeholder": "주행거리계 사진을 추가하세요"}
],
"selected": ""
},
{
"key": 1078,
"name": "차대번호",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {
"1144" : "양호",
"1145" : "상이",
"1146" : "부식",
"1147" : "훼손(오손)",
"1148" : "변타"
},
"picture": [
{ "첫번쨰": "", "placeholder": "차대번호 사진을 추가하세요" },
],
"selected": ""
},
{
"key": 1079,
"name": "색상",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {
"1149" : "흰색",
"1150" : "검정",
"1151" : "회색",
"1152" : "적색",
"1153" : "청색",
"1154" : "기타"
},
"picture": [
{ "첫번쨰": "", "placeholder": "차량색상 사진을 추가하세요" },
],
"selected": ""
},
{
"key": 1080,
"name": "추가 옵션",
"save_table": "diagnosis_details",
"summery": "전체 양호가 아닌 경우, 상태 이력 있음을 선택하여 상태 별 부위를 선택하세요. 여러가지 상태를 선택 할 수 있습니다.",
"code_title": "제논 헤드램프 (HID)",
"code": {
"1155" : "양호",
"1156" : "수리필요",
"1157" : "없음"
},
"picture": [
{ "첫번쨰": "", "placeholder": "옵션 사진을 추가하세요" },
],
"selected": ""
}
]
},

{
"group": "diagnosis_exterior",
"name": "주요 외판",
"save_table": "diagnosis_exterior",
"total": 3,
"completed": 0,
"has_child": true,
"entrys": [
{
"key": 1084,
"name": "외판사진",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {},
"picture": [
{ "첫번쨰": "", "placeholder": "전방사진을 추가하세요" },
{ "두번쨰": "", "placeholder": "후방사진을 추가하세요"},
{ "세번쨰": "", "placeholder": "좌측사진을 추가하세요"},
{ "네번쨰": "", "placeholder": "우측사진을 추가하세요"}
],
"selected": ""
},
{
"key": 1085,
"name": "주요 외판 상태",
"save_table": "diagnosis_details",
"summery": "전체 양호가 아닌 경우, 상태이력 있음을 선택하여 상태별 부위를 선택하고 해당 부위에 대한 증빙사진을 추가하세요.",
"code_title": "",
"code": {
"1158" : "전체 양호",
"1159" : "상태이력 있음"
},
"picture": [],
"selected": "",
"left_check" : [
{ "1163" : [] },
{ "1165" : [] },
{ "1167" : [] },
{ "1169" : [] },
{ "1171" : [] }
],
"center_check" : [
{ "1175" : [] },
{ "1173" : [] },
{ "1174" : [] }
],
"right_check" : [
{ "1164" : [] },
{ "1166" : [] },
{ "1168" : [] },
{ "1170" : [] },
{ "1172" : [] }
]
},
{
"key": 1075,
"name": "점검의견",
"save_table": "diagnosis_details",
"summery": "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
"code_title": "",
"code": {},
"picture": [],
"selected": "",
"sound": true
},
]
},
{
"group": {},
"name": "주요 내판",
"save_table": "diagnosis_exterior",
"total": 3,
"completed": 0,
"has_child": true,
"entrys": [
{
"key": 1088,
"name": "하단 사진",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {},
"picture": [
{ "첫번쨰": "", "placeholder": "차량캐리어를 통해 하단 사진을 추가하세요" }
],
"selected": ""
},
{
"key": 1089,
"name": "주요 내판 상태",
"save_table": "diagnosis_details",
"summery": "전체 양호가 아닌 경우, 상태이력 있음을 선택하여 상태별 부위를 선택하고 해당 부위에 대한 증빙사진을 추가하세요.",
"code_title": "",
"code": {
"1158" : "전체 양호",
"1159" : "상태이력 있음"
},
"picture": [],
"selected": "",
"left_check" : [
{ "" : [] },
{ "" : [] },
{ "" : [] }
],
"center_check" : [
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] },
{ "" : [] }
],
"right_check" : [
{ "" : [] },
{ "" : [] },
{ "" : [] }
]
},
{
"key": 1075,
"name": "점검의견",
"save_table": "diagnosis_details",
"summery": "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
"code_title": "",
"code": {},
"picture": [],
"selected": "",
"sound": true
}
]
},
{
"group": {},
"name": "사고유무 점검",
"save_table": "diagnosis_exterior",
"total": 2,
"completed": 0,
"has_child": true,
"entrys": [
{
"key": 1094,
"name": "사고유무",
"save_table": "diagnosis_details",
"summery": "",
"code_title": "",
"code": {
"1200": "수리 이력 없음",
"1201": "단순외판 교환",
"1202": "주요 골격 수리"
},
"picture": [
{ "첫번쨰": "", "placeholder": "증빙사진" }
],
"selected": ""
},
{
"key": 1075,
"name": "점검의견",
"save_table": "diagnosis_details",
"summery": "주요 외판에 대한 전반적인 점검의견을 녹음하세요.",
"code_title": "",
"code": {},
"picture": [],
"selected": "",
"sound": true
}
]
}
]
}

',
            'created_id' => '1'
        ]);

        DB::table('items')->insert([
            'name' => '인증서 2',
            'price' => '200000',
            'layout' => '2',
            'created_id' => '2'
        ]);
    }
}