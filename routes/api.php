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
Route::get('notice/{post_id}', "NoticeController@show")->name('notice.show');

//Route::group(['middleware' => ['auth:api']], function () {
//
//    //   진단앱에서 이용하는 API
//    Route::group(['prefix' => 'garage'], function () {

        // 특정대리점의 전체 주문목록 : 입고예약
        // 특정 엔지니어의 진단중 목록 : 진단중
        // 특정 엔지니어의 진단완료 목록 : 진단완료
        // 대리점번호 : 해당 대리점의 회원아이디
        // page : 페이지번호
        // date : 한번에 가져올 날짜수
        // 오늘부터 미래로
        //예약목록
        Route::get('/diagnoses/{garage_id}', "DiagnosisController@getDiagnoses")->name('diagnosises');
        //진단중목록
        Route::get('/diagnoses/working/{engineer_id}', "DiagnosisController@getWorkingDiagnoses")->name('diagnosises.working');
        //나의 진단중목록
//        Route::get('/diagnoses/myworking/{engineer_id}', "DiagnosisController@getWorkingDiagnoses")->name('diagnosises.working');
        //진단완료목록
        Route::get('/diagnoses/complete/{garage_id}', "DiagnosisController@getCompletedDiagnoses")->name('diagnosises.complete');

        //개별주문조회
        Route::get('/diagnosis/{order_id}', "DiagnosisController@show")->name('diagnosis');

        //개별주문저장
        Route::post('/diagnosis/{order_id}', "DiagnosisController@update")->name('diagnosis.update');

        //개별파일업로드
        Route::post('/upload/{order_id}', "DiagnosisController@upload")->name('diagnosis.upload');
        //주문 엔지니어에 할당
        Route::post('/grant/{order_id}/{engineer_id}/', "DiagnosisController@setDiagnosisEngineer")->name('diagnosis.grant');

        Route::post('/get_layout/{order_id}', "DiagnosisController@getLayout")->name('diagnosis.getLayout');


        Route::post('/login', "UserController@login");
        Route::post('/logout', "UserController@logout");
        Route::post('/password/{engineer_id}', "UserController@changePassword")->name('password');
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
