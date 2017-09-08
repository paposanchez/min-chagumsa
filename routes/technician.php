<?php
// After login
Route::group(['middleware' => ['auth', 'role:technician']], function () {


    Route::get('dashboard', 'DashboardController');

    //주문
    Route::post('order/issue', 'TechOrderController@issue')->name('order.issue');
    Route::resource('order', 'TechOrderController', ['as' => 'technician']);

    //보험이력파일처리
    Route::post('order/insurance-file', 'TechOrderController@insuranceFile')->name('order/insurance-file');

    //용도변경, 차고지 이력 추가
    Route::post('order/history', 'TechOrderController@history')->name('order/history');

    //인증서 데이터 갱신
    Route::patch('order/update/{id}', 'TechOrderController@update')->name('order/update');

    //진단데이터
    Route::get('order/diagnoses/{id}', 'TechOrderController@diagnoses')->name('technician.diagnoses');
    //진단 선택값 변경
    Route::post('order/update-code', 'TechOrderController@updateCode')->name('order.update-code');

    Route::resource('notice', 'NoticeController', ['as' => 'technician']);
    Route::get('user/edit', 'UserController@edit')->name('technician.user.edit');
    Route::post('user/update', 'UserController@update')->name('technician.user.update');
    Route::post('user/pass-update', 'UserController@passUpdate')->name('technician.user.pass-update');

    // Avatar
    Route::get('thumbnail/{id?}', '\App\Http\Controllers\Admin\ImageController@thumbnail')->name("thumbnail");
    Route::get('avatar/{user_id?}', '\App\Http\Controllers\Admin\ImageController@avatar')->name("avatar");
});

Route::get('order/insurance-file-view/{id}', 'TechOrderController@insuranceFileView')->name('order/insurance-file-view');

Route::any('logout', 'Auth\LoginController@logout');
Route::group(['middleware' => ['guest.admin']], function () {
    Route::get('login', function () {
        return redirect('/');
    });
    // 로그인 처리
    Route::post('login', 'Auth\LoginController@login');
});
Route::any('/', function () {
    return view('technician.auth.login');
});
