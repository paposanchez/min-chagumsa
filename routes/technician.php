<?php
// After login
Route::group(['middleware' => ['auth', 'role:technician']], function () {

    //대쉬보드
    Route::get('dashboard', 'DashboardController');

    //진단데이터
    Route::get('certificate/diagnosis/{id}', 'DiagnosesController@diagnoses');
    //인증서 관련
    Route::post('certificate/{id?}/assign', 'CertificateController@assign');
    Route::post('certificate/issue', 'CertificateController@issue');
    Route::get('certificate/{order_id}/edit', 'CertificateController@edit');
    Route::resource('certificate', 'CertificateController', ['only' => ['index', 'update']]);
    Route::get('certificate/{order_id}/{page?}/{flush?}', 'CertificateController@show');

    //주문 관련
    Route::resource('order', 'OrderController');
    // Route::resource('notice', 'NoticeController', ['only' => ['index', 'show']], ['as' => 'technician']);
    Route::get('user/edit', 'UserController@edit')->name('technician.user.edit');
    Route::post('user/update', 'UserController@update')->name('technician.user.update');

    // Avatar
    Route::get('thumbnail/{id?}', '\App\Http\Controllers\Admin\ImageController@thumbnail')->name("thumbnail");
    Route::get('avatar/{user_id?}', '\App\Http\Controllers\Admin\ImageController@avatar')->name("avatar");

    // 파일
    Route::post('file/thumbnail', '\App\Http\Controllers\FileController@thumbnail')->name("file/thumbnail");
    Route::post('file/upload', '\App\Http\Controllers\FileController@upload')->name("file/upload");
    Route::post('file/image', '\App\Http\Controllers\FileController@image')->name("file/image");
    Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file/download");
    Route::delete('file/delete/{id}', '\App\Http\Controllers\FileController@delete')->name("file/delete");
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
    return view('technician.auth.login');
});
