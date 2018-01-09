<?php

Route::group(['middleware' => ['auth', 'role:admin']], function () {

        // 대시보드
        Route::get('dashboard', 'DashboardController')->name("dashboard");

        // 진단관리
        Route::resource('diagnosis', 'DiagnosesController');

        // 정산관리
        Route::resource('calculation', 'CalculationController');

        // 회원관리
        Route::resource('user', 'UserController', ['except' => ['show']]);
        Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");

        // 프로파일
        Route::resource('profile', 'ProfileController', ['except' =>['destory']]);

        // 로그아웃
        Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');

});


Route::group(['prefix' => 'admin'], function () {

        Route::any('logout', 'Auth\LoginController@logout');
        Route::group(['middleware' => ['guest.admin']], function () {
                Route::get('login', function () {
                        return redirect('/');
                });
                // 로그인 처리
                Route::post('login', 'Auth\LoginController@login');
        });
});



Route::any('/', function () {
        return view('admin.auth.login');
});
