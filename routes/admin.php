<?php

Route::group(['middleware' => ['auth']], function () {

        // 대시보드
        Route::get('dashboard', 'DashboardController')->name("dashboard");

        Route::group(['middleware' => ['role:admin', 'role:manager']], function () {
                // 주문관리
                Route::resource('order', 'OrderController');
        });

        Route::group(['middleware' => ['role:admin', 'role:bcs']], function () {

                // 진단관리
                Route::resource('diagnosis', 'DiagnosesController');

                // 회원관리
                Route::resource('user', 'UserController', ['except' => ['show']]);
                // Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");

        });

        Route::group(['middleware' => ['role:admin', 'role:bcs']], function () {

                // 인증관리
                Route::resource('certificate', 'CertificateController');

        });

        Route::group(['middleware' => ['role:admin','role:tech','role:alliance', 'role:bcs']], function () {

                // 정산관리
                Route::resource('calculation', 'CalculationController');
        });

        Route::group(['middleware' => ['role:admin']], function () {

                // 보증관리
                Route::resource('warranty', 'WarrantyController');

                // 결제관리
                Route::resource('purchase', 'PurchaseController');

                // 게시물관리
                Route::group(['prefix' => 'post'], function () {
                        // 게시물
                        Route::resource('posting', 'PostingController');

                        // 코멘트
                        Route::resource('comment', 'CommentController');
                });

                // 알림관리
                Route::resource('notify', 'NotifyController');

                // 쿠폰
                Route::resource('coupon', 'CouponController', ['only' => ['index', 'store', 'create', 'destroy']]);

                // 환경설정
                Route::group(['prefix' => 'config'], function () {
                        // 기본코드테이블
                        Route::resource('code', 'CodeController');
                        // 사용자로그
                        Route::resource('active', 'ActiveController');
                        //권한
                        Route::resource('permission', 'PermissionController');
                        // 역활
                        Route::resource('role', 'RoleController');
                        // 게시판설정
                        Route::resource('board', 'BoardController');
                        // 아이템 관리
                        Route::resource('item', 'ItemController');
                });
        });


        // 프로파일
        Route::resource('profile', 'ProfileController', ['except' =>['destory']]);

});


// 회원정보 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reqeust');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::group(['middleware' => ['guest.admin']], function () {
        Route::get('login', function () {
                return redirect('/');
        })->name('admin.login');
        // 로그인 처리
        Route::post('login', 'Auth\LoginController@login');
});



Route::any('/', function () {
        return view('admin.auth.login');
});
