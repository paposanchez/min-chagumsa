<?php
Route::group(['middleware' => ['auth', 'role:garage']], function () {
        //주문
        Route::resource('order', 'OrderController', ['as' => 'bcs']);
        Route::post('order/confirmation/{order_id}', 'OrderController@confirmation');
        Route::post('order/reservation_change', 'OrderController@reservationChange');
        Route::resource('calculation', 'CalculationController', ['as' => 'bcs']);
        Route::resource('notice', 'NoticeController', ['as' => 'bcs']);
        //정보수정
        //    Route::get('bcs-info', 'BcsController@bscInfo')->name('bcs-info');
        //    Route::post('bcs-edit', 'BcsController@bcsEdit')->name('bcs-edit');
        Route::resource('info', 'BcsController', ['as' => 'bcs']);
        Route::resource('user', 'UserController', ['as' => 'bcs']);
        Route::get('dashboard', 'DashboardController@__invoke')->name('bcs.dashboard.index');

        // Avatar
        Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
        Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");

        Route::resource('diagnosis', 'DiagnosesController', ['as' => 'bcs']);
});

Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file/download");
Route::post('file/thumbnail', '\App\Http\Controllers\FileController@thumbnail')->name("file/thumbnail");
Route::post('file/upload', '\App\Http\Controllers\FileController@upload')->name("file/upload");
Route::post('file/image', '\App\Http\Controllers\FileController@image')->name("file/image");
Route::delete('file/delete/{id}', '\App\Http\Controllers\FileController@delete')->name("file/delete");

Route::any('logout', 'Auth\LoginController@logout');
Route::group(['middleware' => ['guest.admin']], function () {
        Route::get('login', function () {
                return redirect('/');
        });
        // 로그인 처리
        Route::post('login', 'Auth\LoginController@login');
});


Route::any('/', function () {
        return view('bcs.auth.login');
});
