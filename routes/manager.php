<?php

Route::group(['middleware' => ['auth']], function () {

        // 대시보드
        Route::get('dashboard', 'DashboardController')->name("dashboard");

        Route::group(['middleware' => ['role:admin', 'role:manager']], function () {
                // 주문관리
                Route::resource('order', 'OrderController');
        });

        Route::group(['middleware' => ['role:admin','role:tech','role:alliance', 'role:bcs']], function () {

                // 정산관리
                // Route::resource('calculation', 'CalculationController');
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
