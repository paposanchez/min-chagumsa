<?php

use Illuminate\Http\Request;

// After login
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    // 대시보드
    Route::get('dashboard', 'DashboardController@__invoke')->name('dashboard.index');

    // 사용자
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");

    // 게시물 
    Route::resource('post', 'PostController');
    Route::resource('bcs-post', 'BcsPostController');


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

Route::get('logout', 'Auth\LoginController@logout')->name("admin.logout");
Route::post('logout', 'Auth\LoginController@logout')->name("admin.logout");

//Route::get('mail', function() {
//    $to = 'antshin72@gmail.com';
//    $subject = '메일군을 이용한 시스템 메일 발송입니다';
//    $data = [
//        'title' => '여기는 타이틀이 들어가는 곳입니다.',
//        'body'  => '본문글에 대한 방송이 필요해요.\n푸하하\n동해물과 백두산이 마르고 닳도록',
//        'user'  => '사용자 정보입니다'
//    ];
//
//    $send = Mail::send('admin.dashboard.email', $data, function($message) use($to, $subject) {
//        $message->to($to)->subject($subject);
//    });
//
//    dd($send);
//});

//Route::get('sms', function(){
//    //$tr_senddate, $tr_phone, $tr_callback, $tr_msg, $tr_sendstat=0, $tr_msgtype=1
//    $senddate = Carbon\Carbon::now()->toDateTimeString();
//    $tr_phone = "01030255305";
//    $tr_callback = "18336889";
//    $tr_msg = "SMS 발송 테스트3[".$senddate."]";
//    $tr_sendstat = 0;
//    $tr_msgtype = 0;
//
//    $sms_model = new \App\Models\ScTran();
//    $send = $sms_model->send($tr_phone, $tr_callback, $tr_msg, $tr_sendstat, $tr_msgtype);
//    dd($send);
//});