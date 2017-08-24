<?php

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

//Route::get('/', function (Request $request) {
//    return response()->json([
//                "SERVICE" => config('app.domain'),
//                "VERSION" => 'v1.0.1',
//    ]);
//});
// 기본 코드데이터 / bootstrap시 로딩
//@TODO  스태틱파일로의 전환여부는 추후 판단
Route::get('codes', "CodeController")->name('code');
//Route::get('code/group/{group}', "CodeController@group")->name('code.group');

Route::get('notice', "NoticeController@index");
Route::get('notice/news', "NoticeController@news");
Route::get('notice/show', "NoticeController@show")->name('notice.show');
// Route::get('notice/{post_id}', "NoticeController@show")->where('post_id', '[0-9]+')->name('notice.show');

//Route::group(['middleware' => ['auth:api']], function () {
//
//    //   진단앱에서 이용하는 API
//    Route::group(['prefix' => 'garage'], function () {

        // 특정대리점의 전체 주문목록 : 입고예약
        // 특정 엔지니어의 진단중 목록 : 진단중
        // 특정 엔지니어의 진단완료 목록 : 진단완료
        // 대리점번호 : 해당 대리점의 회원아이디
        // date : 한번에 가져올 날짜수
        // 오늘부터 미래로
        //예약목록
        Route::get('diagnosis/reservation', "DiagnosisController@getDiagnosisReservation")->name('diagnosis.reservation');
        // 예약카운트 
        Route::get('diagnosis/count', "DiagnosisController@getReservationCount")->name('diagnosis.count');

        //진단중목록
        Route::get('diagnosis/working', "DiagnosisController@getDiagnosisWorking")->name('diagnosis.working');
        //진단완료목록
        Route::get('diagnosis/completed', "DiagnosisController@getDiagnosisCompleted")->name('diagnosis.completed');
        //진단완료 상태 변경
        Route::get('diagnosis/complete', "DiagnosisController@getDiagnosisComplete")->name('diagnosis.complete');

        //개별주문조회
        Route::get('diagnosis', "DiagnosisController@show")->where('order_id', '[0-9]+')->name('diagnosis');

        //개별주문저장
        Route::post('diagnosis', "DiagnosisController@update")->name('diagnosis.update');

        //개별파일업로드
        Route::post('diagnosis/upload', "DiagnosisController@upload")->name('diagnosis.upload');

        // 주문상품
        Route::get('diagnosis/item', "DiagnosisController@getItem")->name('diagnosis.item');

        //주문 엔지니어에 할당
        Route::get('diagnosis/grant', "DiagnosisController@setDiagnosisEngineer")->name('diagnosis.grant');


        Route::post('user', "UserController@show");
        Route::post('login', "UserController@login");
        Route::get('logout', "UserController@logout");
        Route::post('password', "UserController@changePassword")->name('password');
//        Route::post('/profile/{engineer_id}', "UserController@getProfile")->name('profile');


        // //완료주문에 대하여 진단그룹조회
        // Route::get('/diagnosis-details/{주문번호}', "DiagnosisController@getDiagnosisDetails");
        // //완료주문에 대하여 진단그룹내 세부진단항목 조회
        // Route::get('/diagnosis-detail/{주문번호}/{진단그룹번호}', "DiagnosisController@getDiagnosisDetail");
        // 진단시 사용되는 코드데이터
        // Route::get('/codes-diagnosis/', "CodeController@getDiagnosisCode");
//
//        Route::group(['middleware' => ['web']], function () {
//            
//        });
//    });
//});

Route::any('/', function () {
    return view('vendor.l5-swagger.index');
});
