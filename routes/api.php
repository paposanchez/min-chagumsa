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

Route::get('/', function (Request $request) {
    return response()->json([
                "SERVICE" => config('app.domain'),
                "VERSION" => 'v1.0.1',
    ]);
});




// Route::group(['middleware' => ['auth:api']], function () {

  // 진단앱에서 이용하는 API
//  Route::group(['prefix' => 'garage'], function () {
//
//      // 특정대리점의 전체 주문목록 : 입고예약
//      // 특정 엔지니어의 진단중 목록 : 진단중
//      // 특정 엔지니어의 진단완료 목록 : 진단완료
//
//      // 대리점번호 : 해당 대리점의 회원아이디
//      // page : 페이지번호
//      // date : 한번에 가져올 날짜수
//      // 오늘부터 미래로
//      Route::get('/diagnosises/{대리점번호}/{page?}/{date?}/', "DiagnosisController@getDiagnosises")->name('diagnosises');
//      // 오늘부터 과거로
//      Route::get('/diagnosises-complete/{대리점번호}/{page?}/{date?}/', "DiagnosisController@getCompletedDiagnosises")->name('diagnosises.complete');
//      //개별주문조회
//      Route::get('/diagnosis/{주문번호}', "DiagnosisController@getDiagnosis")->name('diagnosis');
//      //개별주문저장
//      Route::post('/diagnosis/', "DiagnosisController@setDiagnosis")->name('diagnosis.update');
//      //개별파일업로드
//      Route::post('/upload/{주문번호}', "DiagnosisController@setUpload")->name('diagnosis.upload');
//      //주문 엔지니어에 할당
//      Route::post('/grant/{주문번호}/{엔지니어번호}', "DiagnosisController@setDiagnosisEngineer")->name('diagnosis.grant');;
//
//      Route::resource('/notice', "NoticeController", ['only' => ['index', 'show']]);
//
//      // 진단앱에서는 사용하지 않음
//      // Route::resource('/faq', "FaqController", ['only' => ['index', 'show']]);
//
//      // 기본 코드데이터 / bootstrap시 로딩
//      //@TODO  스태틱파일로의 전환여부는 추후 판단
////      Route::get('/codes/', "CodeController")->name('code');
//
//      Route::post('/login', "UserController@login");
//      Route::post('/logout', "UserController@logout");
//      Route::post('/password/{엔지니어번호}', "UserController@changePassword")->name('password');
//      Route::post('/profile/{엔지니어번호}', "UserController@getProfile")->name('profile');
//
//
//      // //완료주문에 대하여 진단그룹조회
//      // Route::get('/diagnosis-details/{주문번호}', "DiagnosisController@getDiagnosisDetails");
//      // //완료주문에 대하여 진단그룹내 세부진단항목 조회
//      // Route::get('/diagnosis-detail/{주문번호}/{진단그룹번호}', "DiagnosisController@getDiagnosisDetail");
//      // 진단시 사용되는 코드데이터
//      // Route::get('/codes-diagnosis/', "CodeController@getDiagnosisCode");
//
//    Route::group(['middleware' => ['web']], function () {
//    });
//
//
//  });


// });
