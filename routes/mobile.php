<?php

// 마이페이지
Route::group(['middleware' => ['auth']], function () {
//    Route::get('mypage', 'MypageController@index')->name("mobile.mypage");

    Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage', 'as' => 'mobile.mypage.'], function () {
        Route::post('profile/chk-pwd', ['as' => 'movile.profile.chk-pwd', 'uses' => 'ProfileController@chkPwd']);
        Route::resource('profile', 'ProfileController');
        Route::resource('history', 'HistoryController');

        Route::any('order/next', 'OrderController@nextOrder')->name('next');

        Route::resource('order', 'OrderController');
        Route::get('/order/edit_car/{order_id}', 'OrderController@editCar')->name('order.edit_car');
        Route::get('/order/edit_garage/{order_id}', 'OrderController@editGarage')->name('order.edit_garage');
        Route::post('/order/cancel', 'OrderController@cancel')->name('order.cancel');

        Route::get('/order/change-car/{order_id}', 'OrderController@changeCar')->name('order.change-car');
        Route::post('/order/change-car/{order_id}', 'OrderController@updateCar')->name('order.change-car');
        Route::get('/order/change-reservation/{order_id}', 'OrderController@changeReservation')->name('order.change-reservation');
        Route::post('/order/change-reservation/{order_id}', 'OrderController@updateReservation')->name('order.change-reservation');

        Route::get('/leave', 'ProfileController@leaveForm')->name('leave');
        Route::post('/leave', 'ProfileController@leave')->name('profile.leave');
    });

    //SMS관련
    Route::post('/order/send-sms', 'OrderController@sendSms')->name('mobile.order.send-sms');
    Route::post('/order/is-sms', 'OrderController@isSms')->name('mobile.order.is-sms');
    Route::post('/order/delete-sms', 'OrderController@deleteSms')->name('mobile.order.delete-sms');

    // 주문하기

//    Route::resource('order', 'OrderController');
//    Route::post('order/order-store', 'OrderController@orderStore')->name("order.order-store");
//    Route::post('order/purchase', 'OrderController@purchase')->name("order.purchase")
    Route::match(['get', 'post'],'order/complete', 'OrderController@complete')->name("mobile.order.complete");
    Route::post('order/reservation', 'OrderController@reservation')->name("mobile.order.reservation");
    Route::get('order/verificate/{mobile}', 'OrderController@verificate')->name("mobile.order.verificate");
    Route::get('order/factory/{page?}', 'OrderController@factory')->name("mobile.order.factory");
    Route::post('order/payment-process', 'OrderController@paymentProcess')->name("mobile.order.payment-process");


    Route::get('/order/get-models', 'OrderController@getModels')->name("mobile.order.get_models");
    Route::get('/order/get-details', 'OrderController@getDetails')->name("mobile.order.get_details");
    Route::get('/order/get-grades', 'OrderController@getGrades')->name("mobile.order.get_grades");
    Route::get('/order/sel-item', 'OrderController@selItem')->name("mobile.order.sel_item");
    Route::get('/order/get-section', 'OrderController@getSection')->name("mobile.order.get_section");
    Route::get('/order/get-address', 'OrderController@getAddress')->name("mobile.order.get_address");
    Route::get('/order/get-full-address', 'OrderController@getFullAddress')->name("order.get_full_address");

    Route::get('certificate/change-open-cd', 'CertificateController@changeOpenCd')->name('mobile.certificate.change-open-cd');
    Route::any('certificate/next', 'CertificateController@getNextCertificate')->name('mobile.certificate.next');

    //쿠폰인증
    Route::post('/order/coupon-verify', 'OrderController@couponVerify')->name("mobile.order.coupon-verify");
    //쿠폰 주문 등록
    Route::post('/order/coupon-process', 'OrderController@couponProcess')->name("mobile.order.coupon-process");
//    Route::resource('/certificate', 'CertificateController',['only' => ['index']]);


//    Route::get('certificate/performance/{id}', 'CertificateController@performance')->name("certificate.performance");

});

/////////////////////////////////////////////////////////////
Route::get('order', 'OrderController@index')->name("mobile.order.index");
Route::get('/certificate', 'CertificateController@index')->name("mobile.certificate.index");
// 인증서 조회
Route::get('certificate/{id}/{page?}', 'CertificateController')->name("mobile.certificate");




// 공통
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("mobile.thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("mobile.avatar");


//결제결과 수신
Route::match(['GET', 'POST'], 'payment/pay-result', 'PaymentController@payCallback')->name('mobile.payment.pay-result');
Route::match(['GET', 'POST'], 'order/pay-callback', 'OrderController@payResult')->name('mobile.payment.pay-callback');
Route::match(['GET', 'POST'], 'order/payment-result', 'OrderController@paymentResult')->name("mobile.order.payment-result");


// Information
Route::get('information/index', function () {
    return view('mobile.information.index');
})->name('mobile.information.index');

Route::get('information/certificate', function () {
    return view('mobile.information.certificate');
})->name('mobile.information.certificate');

Route::get('information/guide', function () {
    return view('mobile.information.guide');
})->name('mobile.information.guide');
//Route::get('information/price', function () {
//    return view('web.information.price');
//})->name('information.price');
Route::get('information/price', 'InformationController@price')->name('mobile.information.price');
//Route::get('information/find-garage', function () {
//    return view('web.information.find-garage');
//})->name('information.find-garage');
Route::get('/information/find-garage', 'InformationController@findGarage')->name('mobile.information.find-garage');

Route::get('chagumsa-info', function () {
    return view('mobile.information.info');
})->name('chagumsa-info');



// Agreement
Route::get('agreement/usage', function () {
    return view('mobile.agreement.usage');
})->name('mobile.agreement.usage');

Route::get('agreement/term', function () {
    return view('mobile.agreement.term');
})->name('mobile.agreement.term');

Route::get('agreement/privacy', function () {
    return view('mobile.agreement.privacy');
})->name('mobile.agreement.privacy');

// 커뮤니티
//Route::get('community', 'CommunityController@index')->name("community.index");
Route::get('community', function () {
    return redirect('community/notice');
});



Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {

    Route::any('notice/next', 'NoticeController@getNextRows')->name('mobile.notice.next');
    Route::any('faq/next', 'FaqController@getNextRows')->name('mobile.faq.next');

    Route::resource('notice', 'NoticeController', ['as' => 'mobile']);
    Route::resource('faq', 'FaqController', ['as' => 'mobile']);
    Route::resource('inquire', 'InquireController', ['as' => 'mobile']);
//    Route::resource('free', 'FreeController');
});

Route::get('search{q?}', 'SearchController@index')->name('mobile.search.index');


// Authentication
Route::get('logout', 'Auth\LoginController@logout');
// 회원가입폼
Route::get('agreement', 'Auth\RegisterController@agreement')->name('mobile.register.agreement');
// Route::post('register/join', 'Auth\RegisterController@join')->name('mobile.register.join');
// 회원가입완료
Route::get('register/registered', 'Auth\RegisterController@registered')->name('mobile.register.registered');
 // 이메일 인증
// Route::get('verify', 'Auth\VerifyController@emailCheck');

// 비밀번호 분실
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset-form', 'Auth\ForgotPasswordController@resetForm')->name('password.reset-form');
//Route::post('password/reset-password', 'Auth\ForgotPasswordController@reset')->name('password.reset-password');

// 회원정보 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// 회원가입시 이메일 인증 재발송폼
Route::get('resend', 'Auth\RegisterController@resend')->name('mobile.register.resend');
// 회원강비시 이메일 인증 재발송 처리
Route::post('resent', 'Auth\RegisterController@resent')->name('mobile.register.resent');
// 회원가입시 이메일 인증 처리
Route::get('verify/{token}', 'Auth\RegisterController@verify')->name('mobile.verify');
Auth::routes();

// Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('mobile.register');
Route::any('/', 'WelcomeController');



Route::get('sample', 'CertificateController@sample')->name('mobile.certificate.sample');

//결제 prototype
//Route::get('pay-test/index', 'PayTestController@index');
//Route::post('pay-test/pay-result', 'PayTestController@payResult');
//Route::post('pay-test/callback', 'PayTestController@payCallback');

