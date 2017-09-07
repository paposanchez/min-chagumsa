<?php
//@TODO  스태틱파일로의 전환여부는 추후 판단
Route::get('codes', "CodeController");

// Route::post('user', "UserController@show");
Route::post('login', "UserController@login");
Route::any('logout', "UserController@logout");
Route::post('password', "UserController@changePassword");

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
