<?php
Route::group(['middleware' => ['auth', 'role:manager']], function () {
        Route::get('dashboard', 'DashboardController');
});


Route::any('logout', 'Auth\LoginController@logout');
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
