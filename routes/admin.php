<?php
// After login
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    // 대시보드
    Route::get('dashboard', 'DashboardController');

    // 사용자
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");

    // 게시물
    Route::resource('post', 'PostController');
//    Route::resource('bcs-post', 'BcsPostController');
    Route::get('test', 'TestController@index')->name("test.index");
    Route::get('/test/create-order', 'TestController@createOrder')->name("test.create-order");

    // 코멘트
    Route::resource('comment', 'CommentController');

    // 환경설정
    Route::group(['prefix' => 'config'], function () {
        // 기본코드테이블
        Route::resource('code', 'CodeController');
        // 역활
        Route::resource('role', 'RoleController');
        //권한
        Route::resource('permission', 'PermissionController');
        // 게시판설정
        Route::resource('board', 'BoardController');
        // tag
        Route::resource('tag', 'TagController');
        // 사용자로그
        Route::resource('active', 'ActiveController');
    });

    // JSON : 회원목록
    Route::get('json/users', function () {
        return App\Models\User::paginate();
    });
    Route::get('json/tags', function () {
        return App\Models\TaggingTag::paginate();
    });

    // 파일
    Route::post('file/thumbnail', '\App\Http\Controllers\FileController@thumbnail')->name("file/thumbnail");
    Route::post('file/upload', '\App\Http\Controllers\FileController@upload')->name("file/upload");
    Route::post('file/image', '\App\Http\Controllers\FileController@image')->name("file/image");
    Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file/download");
    Route::delete('file/delete/{id}', '\App\Http\Controllers\FileController@delete')->name("file/delete");


    // Avatar
    Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
    Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");

    //보험이력파일처리
    Route::post('order/insurance-file', 'OrderController@insuranceFile')->name('order/insurance-file');
    Route::get('order/insurance-file-view/{id}', 'OrderController@insuranceFileView')->name('order/insurance-file-view');
    //용도변경, 차고지 이력 추가
    Route::post('order/history', 'OrderController@history')->name('order/history');

    //인증서 데이터 갱신
    Route::patch('order/update/{id}', 'OrderController@update')->name('order/update');

    // 주문관리
    Route::post('order/reservation_change', 'OrderController@reservationChange');
    Route::post('order/confirmation/{order_id}', 'OrderController@confirmation');
    Route::resource('order', 'OrderController');

    // 진단관리
    Route::post('diagnosis/update-code', 'DiagnosesController@updateCode')->name('diagnosis/update-code');
    Route::resource('diagnosis', 'DiagnosesController');

    // 정산관리
    Route::resource('calculation', 'CalculationController');

    // 아이템 관리
    Route::resource('item', 'ItemController');

    //쿠폰
    Route::post('coupon/user-info', 'CouponController@getUserInfo')->name('coupon/user-info');
    Route::resource('coupon', 'CouponController', ['only' => ['index', 'store', 'create', 'destroy']]);


    Route::get('total-bcs', 'SmsController@totalBcs')->name('total-bcs');
    Route::post('send-sms', 'SmsController@sendSms')->name('send-sms');
    Route::resource('sms', 'SmsController',['only' => ['index']]);

});


Route::any('logout', 'Auth\LoginController@logout');
// After login in administrator's
Route::group(['middleware' => ['guest.admin']], function () {
    Route::get('login', function () {
        return redirect('/');
    });
    // 로그인 처리
    Route::post('login', 'Auth\LoginController@login');
});

Route::any( '(.*)', 'WelcomeController');
