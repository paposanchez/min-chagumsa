<?php
use Illuminate\Http\Request;
// After login
//Route::group(['middleware' => ['auth', 'role:garage']], function () {

    //주문
    Route::resource('order', 'OrderController');
    Route::resource('calculation', 'CalculationController');
    Route::resource('notice', 'NoticeController');
    Route::resource('user', 'UserController');
    Route::resource('dashboard', 'DashboardController');
//});