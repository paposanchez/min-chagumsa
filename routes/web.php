<?php

// 마이페이지
Route::group(['middleware' => ['auth']], function () {
    Route::get('mypage', 'MypageController@index')->name("mypage");
    Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage', 'as' => 'mypage.'], function () {
        Route::post('profile/chk-pwd', ['as' => 'profile.chk-pwd', 'uses' => 'ProfileController@chkPwd']);
        Route::resource('profile', 'ProfileController');
        Route::resource('history', 'HistoryController');
        Route::resource('order', 'OrderController');
        Route::get('/order/edit_car/{order_id}', 'OrderController@editCar')->name('order.edit_car');
        Route::get('/order/edit_garage/{order_id}', 'OrderController@editGarage')->name('order.edit_garage');
        Route::post('/order/cancel', 'OrderController@cancel')->name('order.cancel');


        Route::get('/leave', 'ProfileController@leaveForm');
        Route::post('/leave', 'ProfileController@leave')->name('profile.leave');
    });

    //SMS관련
    Route::post('/order/send-sms', 'OrderController@sendSms')->name('order.send-sms');
    Route::post('/order/is-sms', 'OrderController@isSms')->name('order.is-sms');
    Route::post('/order/delete-sms', 'OrderController@deleteSms')->name('order.delete-sms');

    // 주문하기
    Route::get('order', 'OrderController@index')->name("order.index");
//    Route::resource('order', 'OrderController');
//    Route::post('order/order-store', 'OrderController@orderStore')->name("order.order-store");
    Route::post('order/purchase', 'OrderController@purchase')->name("order.purchase");
    Route::post('order/complete', 'OrderController@complete')->name("order.complete");
    Route::post('order/reservation', 'OrderController@reservation')->name("order.reservation");
    Route::get('order/verificate/{mobile}', 'OrderController@verificate')->name("order.verificate");
    Route::get('order/factory/{page?}', 'OrderController@factory')->name("order.factory");
    Route::post('order/payment-popup', 'OrderController@paymentPopup')->name("order.payment-popup");


    Route::get('/order/get_models', 'OrderController@getModels')->name("order.get_models");
    Route::get('/order/get_details', 'OrderController@getDetails')->name("order.get_details");
    Route::get('/order/get_grades', 'OrderController@getGrades')->name("order.get_grades");
    Route::get('/order/sel_item', 'OrderController@selItem')->name("order.sel_item");
    Route::get('/order/get_section', 'OrderController@getSection')->name("order.get_section");
    Route::get('/order/get_address', 'OrderController@getAddress')->name("order.get_address");

    Route::get('certificate/change-open-cd', 'CertificateController@changeOpenCd')->name('certificate.change-open-cd');
//    Route::resource('/certificate', 'CertificateController',['only' => ['index']]);
    Route::get('/certificate', 'CertificateController@index')->name("certificate.index");
    // 인증서 조회

    Route::get('certificate/{id}/{page?}', 'CertificateController')->name("certificate");
//    Route::get('certificate/performance/{id}', 'CertificateController@performance')->name("certificate.performance");

});

// 공통
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");


//결제결과 수신
Route::match(['GET', 'POST'], 'payment/pay-result', 'PaymentController@payCallback')->name('payment.pay-result');
Route::match(['GET', 'POST'], 'order/pay-callback', 'OrderController@payResult')->name('payment.pay-callback');
Route::match(['GET', 'POST'], 'order/payment-result', 'OrderController@paymentResult')->name("order.payment-result");


// Information
Route::get('information/index', function () {
    return view('web.information.index');
})->name('information.index');
Route::get('information/certificate', function () {
    return view('web.information.certificate');
})->name('information.certificate');
Route::get('information/guide', function () {
    return view('web.information.guide');
})->name('information.guide');
//Route::get('information/price', function () {
//    return view('web.information.price');
//})->name('information.price');
Route::get('information/price', 'InformationController@price')->name('information.price');
//Route::get('information/find-garage', function () {
//    return view('web.information.find-garage');
//})->name('information.find-garage');
Route::get('/information/find-garage', 'InformationController@findGarage')->name('information.find-garage');



// Agreement
Route::get('agreement/usage', function () {
    return view('web.agreement.usage');
})->name('agreement.usage');
Route::get('agreement/term', function () {
    return view('web.agreement.term');
})->name('agreement.term');
Route::get('agreement/privacy', function () {
    return view('web.agreement.privacy');
})->name('agreement.privacy');

// 커뮤니티
//Route::get('community', 'CommunityController@index')->name("community.index");
Route::get('community', function () {
    return redirect('community/notice');
});
Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {
    Route::resource('notice', 'NoticeController');
    Route::resource('faq', 'FaqController');
    Route::resource('inquire', 'InquireController');
//    Route::resource('free', 'FreeController');
});

Route::get('search{q?}', 'SearchController@index')->name('search.index');


// Authentication
Route::get('logout', 'Auth\LoginController@logout');
// 회원가입폼
Route::get('agreement', 'Auth\RegisterController@agreement')->name('register.agreement');
// Route::post('register/join', 'Auth\RegisterController@join')->name('register.join');
// 회원가입완료
Route::get('register/registered', 'Auth\RegisterController@registered')->name('register.registered');
 // 이메일 인증
// Route::get('verify', 'Auth\VerifyController@emailCheck');

// 비밀번호 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset-form', 'Auth\ForgotPasswordController@resetForm')->name('password.reset-form');
Route::post('password/reset-password', 'Auth\ForgotPasswordController@reset')->name('password.reset-password');


// 회원가입시 이메일 인증 재발송폼
Route::get('resend', 'Auth\RegisterController@resend')->name('register.resend');
// 회원강비시 이메일 인증 재발송 처리
Route::post('resent', 'Auth\RegisterController@resent')->name('register.resent');
// 회원가입시 이메일 인증 처리
Route::get('verify/{token}', 'Auth\RegisterController@verify');
Auth::routes();

// Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister');
Route::any('/', 'WelcomeController');




//결제 prototype
//Route::get('pay-test/index', 'PayTestController@index');
//Route::post('pay-test/pay-result', 'PayTestController@payResult');
//Route::post('pay-test/callback', 'PayTestController@payCallback');

