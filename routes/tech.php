<?php

Route::group(['middleware' => ['auth', 'role:admin']], function () {

        // 대시보드
        Route::get('dashboard', 'DashboardController')->name("dashboard");

        
        // 프로파일
        Route::resource('profile', 'ProfileController');

        // 로그아웃
        Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');

});

Route::group(['middleware' => ['guest.admin']], function () {
        Route::get('login', function () {
                return redirect('/');
        });
        // 로그인 처리
        Route::post('login', 'Auth\LoginController@login');
});

Route::any('/', function () {
        return view('admin.auth.login');
});
