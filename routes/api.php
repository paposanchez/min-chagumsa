<?php
//@TODO  스태틱파일로의 전환여부는 추후 판단
Route::get('codes', "CodeController");

// 로그인
Route::any('login', "UserController@login");
Route::any('logout', "UserController@logout");
Route::post('password', "UserController@changePassword");

// 엔지니어관리
// Route::resource('member', 'MemberController',['except' => ['show']]);
Route::get('member', 'MemberController@index');
Route::post('member/create', 'MemberController@create');
Route::post('member/update', 'MemberController@update');
Route::post('member/deactive', 'MemberController@deactive');

// 공지사항 목록
Route::get('notice', "NoticeController@index");
// 공지사항 상세보기
Route::get('notice/show', "NoticeController@show");
// 공지사항 최신글수
Route::get('notice/news', "NoticeController@news");

// 디바이스 등록
Route::get('device', "DeviceController@index");

// 전체진단 리스트
Route::get('diagnosis/get-issue-count', 'DiagnosisController@getIssueTotalCount');
// 전체진단 리스트
Route::get('diagnosis/get-diagnosis', 'DiagnosisController@getDiagnosis');
// 이슈 진단리스트
Route::get('diagnosis/get-issue', 'DiagnosisController@getIssue');
// 검색
Route::get('diagnosis/search', 'DiagnosisController@search');
// 예약변경
Route::post('diagnosis/change-reservation', 'DiagnosisController@changeReservation');
// 예약확정
Route::post('diagnosis/confirm-reservation', 'DiagnosisController@confirmReservation');


//조회
Route::get('diagnosis', "DiagnosisController@show");
//저장
Route::post('diagnosis/update', "DiagnosisController@update");
//진단시작
Route::post('diagnosis/start', "DiagnosisController@setDiagnosisStart");
//진단완료 상태 변경
Route::post('diagnosis/complete', "DiagnosisController@setDiagnosisComplete");
//개별파일업로드
Route::post('diagnosis/upload', "DiagnosisController@upload");


//
// // 주문상품
// Route::get('diagnosis/item', "DiagnosisController@getItem");
//
// //주문 엔지니어에 할당
// Route::post('diagnosis/grant', "DiagnosisController@setDiagnosisEngineer");
// Route::any('diagnosis/get-file-info', 'DiagnosisController@getDiagnosesFileInfo');
// Route::any('diagnosis/set-file-info', 'DiagnosisController@setTransDiagnosesFileInfo');

// 디바이스 아이디 업데이트
Route::post('notify/register', "NotifyController@register");
Route::get('notify/send', "NotifyController@send");
Route::get('notify/bedge', "NotifyController@bedge");


Route::any( '/', function( ){

        // $diagnosis = \App\Models\Diagnosis::find(1);
        // event(new \App\Events\Diagnosis\OnDiagnosisCompleted($diagnosis));

        // $e = new \App\Events\Diagnosis\OnDiagnosisCompleted($diagnosis);
        // event($e);

        // dd($diagnosis);
        // dd(new \App\Events\Diagnosis\OnDiagnosisCompleted($diagnosis));
        return response()->json([
                "SERVICE"       => "CHAGUMSA API SERVICE",
                "HOST"          => config('zlara.api.domain'),
                "VERSION"       => config('zlara.api.version'),
        ]);
});
