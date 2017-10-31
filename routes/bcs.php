<?php
Route::group(['middleware' => ['auth', 'role:garage']], function () {

        Route::get('dashboard', 'DashboardController');

        //주문
        Route::post('order/user-update', 'OrderController@userUpdate')->name('bcs.order.user-update');
        Route::post('order/car-update', 'OrderController@carUpdate')->name('bcs.order.car-update');
        Route::post('order/cancel', 'OrderController@orderCancel')->name('bcs.order.cancel');
        Route::post('order/confirmation/{order_id}', 'OrderController@confirmation');
        Route::post('order/reservation_change', 'OrderController@reservationChange');
        Route::post('/order/diagnosing', 'OrderController@diagnosing');
        Route::post('order/bcs-update', 'OrderController@bcsUpdate')->name('order.bcs-update');
        Route::resource('order', 'OrderController', ['as' => 'bcs']);

        Route::resource('calculation', 'CalculationController', ['as' => 'bcs']);
        Route::resource('notice', 'NoticeController', ['as' => 'bcs']);
        //정보수정
        Route::resource('info', 'BcsController', ['as' => 'bcs']);
        Route::resource('user', 'UserController', ['as' => 'bcs']);

        // Avatar
        Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
        Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");


        Route::post('/diagnosis/delete-file/{id}', 'DiagnosesController@fileDelete');
        Route::post('/diagnosis/upload-file', 'DiagnosesController@fileUpload');
        Route::post('/diagnosis/update-comment', 'DiagnosesController@updateComment');
        Route::post('diagnosis/update-code', 'DiagnosesController@updateCode');
        Route::post('/diagnosis/complete', 'DiagnosesController@complete');
        Route::resource('diagnosis', 'DiagnosesController');
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
