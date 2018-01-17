<?php
//@TODO  스태틱파일로의 전환여부는 추후 판단
Route::get('codes', "CodeController");

// Route::post('user', "UserController@show");
Route::post('login', "UserController@login");
Route::any('logout', "UserController@logout");
Route::get('password', "UserController@changePassword");
//Route::post('user/update', "UserController@update");

// 공지사항 목록
Route::get('notice', "NoticeController@index");
// 공지사항 최신글수
Route::get('notice/news', "NoticeController@news");
// 공지사항 상세보기
Route::get('notice/show', "NoticeController@show");

//예약목록
Route::get('diagnosis/reservation', "DiagnosisController@getDiagnosisReservation");
//예약카운트
Route::get('diagnosis/count', "DiagnosisController@getReservationCount");
//진단중목록
Route::get('diagnosis/working', "DiagnosisController@getDiagnosisWorking");
//진단완료목록
Route::get('diagnosis/completed', "DiagnosisController@getDiagnosisCompleted");
//진단완료 상태 변경
Route::post('diagnosis/complete', "DiagnosisController@setDiagnosisComplete");
//개별주문조회
Route::get('diagnosis', "DiagnosisController@show")->where('order_id', '[0-9]+');
//개별주문저장
Route::post('diagnosis', "DiagnosisController@update");
//개별파일업로드
Route::post('diagnosis/upload', "DiagnosisController@upload");
// 주문상품
Route::get('diagnosis/item', "DiagnosisController@getItem");

//주문 엔지니어에 할당
Route::post('diagnosis/grant', "DiagnosisController@setDiagnosisEngineer");

Route::any( '/', function( ){
        return response()->json([
                "SERVICE" => config('zlara.api.domain'),
                "VERSION" => config('zlara.api.version'),
        ]);
});

Route::any('diagnosis/get-file-info', 'DiagnosisController@getDiagnosisFileInfo');
Route::any('diagnosis/set-file-info', 'DiagnosisController@setTransDiagnosisFileInfo');

// 디바이스 아이디 업데이트
Route::post('notify/register', "NotifyController@register");
Route::get('notify/send', "NotifyController@send");
Route::get('notify/bedge', "NotifyController@bedge");


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

// 엔지니어관리
Route::resource('member', 'MemberController');
Route::resource('user', "UserController");
