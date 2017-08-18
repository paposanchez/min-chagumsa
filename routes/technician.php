<?php
use Illuminate\Http\Request;
// After login
Route::group(['middleware' => ['auth', 'role:technician']], function () {

    //주문
    Route::resource('order', 'OrderController');
    Route::resource('notice', 'NoticeController');
    //정보수정
    Route::get('user/bcs-info', 'UserController@bscInfo')->name('technician.user.bcs-info');
    Route::post('user/bcs-store', 'UserController@bscStore')->name('technician.user.bcs-store');
    Route::resource('user', 'UserController');
    Route::get('dashboard', 'DashboardController@__invoke')->name('technician.dashboard.index');
});

// After login in administrator's
Route::group(['middleware' => ['guest.admin']], function () {
    Route::get('login', function () {
        return redirect('/');
    });
    // 로그인 처리
    Route::post('login', 'Auth\LoginController@login');

    // 회원정보 분실
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    // Email confirmation
    //Route::get('resend', 'Auth\RegisterController@resend');
    //Route::get('confirm/{token}', 'Auth\RegisterController@confirm');
    // Notifications
    //Route::get('notifications/{user}', 'NotificationController@index');
    //Route::put('notifications/{notification}', 'NotificationController@update');

    // 로그인 페이지
    Route::get('/', 'WelcomeController');

//    Route::get('order/', 'OrderController@index');
});


Route::get('logout', 'Auth\LoginController@logout')->name("technician.logout");
Route::post('logout', 'Auth\LoginController@logout')->name("technician.logout");