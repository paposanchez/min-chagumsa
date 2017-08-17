<?php
use Illuminate\Http\Request;
// After login
//Route::group(['middleware' => ['auth', 'role:garage']], function () {

    //주문
    Route::resource('order', 'OrderController');
    Route::resource('calculation', 'CalculationController');
    Route::resource('notice', 'NoticeController');
    //정보수정
    Route::get('user/bcs-info', 'UserController@bscInfo')->name('user.bcs-info');
    Route::post('user/bcs-store', 'UserController@bscStore')->name('user.bcs-store');
    Route::resource('user', 'UserController');
    Route::get('dashboard', 'DashboardController@__invoke')->name('dashboard.index');
//});