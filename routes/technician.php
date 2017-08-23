<?php
use Illuminate\Http\Request;
// After login
Route::group(['middleware' => ['auth', 'role:technician']], function () {

    //주문
    Route::resource('order', 'TechOrderController', ['as' => 'technician']);
    //보험이력파일처리
    Route::post('order/insurance-file', 'TechOrderController@insuranceFile')->name('order/insurance-file');
    Route::get('order/insurance-file-view/{id}', 'TechOrderController@insuranceFileView')->name('order/insurance-file-view');
    //용도변경, 차고지 이력 추가
    Route::post('order/history', 'TechOrderController@history')->name('order/history');

    //인증서 데이터 갱신
    Route::patch('order/update/{id}', 'TechOrderController@update')->name('order/update');

    //진단데이터
    Route::get('order/diagnoses/{id}', 'TechOrderController@diagnoses')->name('technician.diagnoses');
    //진단 선택값 변경
    Route::post('order/update-code', 'TechOrderController@updateCode')->name('order/update-code');




    Route::resource('notice', 'NoticeController', ['as' => 'technician']);
    Route::get('user/edit', 'UserController@edit')->name('technician.user.edit');
    Route::post('user/update', 'UserController@update')->name('technician.user.update');
    Route::post('user/pass-update', 'UserController@passUpdate')->name('technician.user.pass-update');
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