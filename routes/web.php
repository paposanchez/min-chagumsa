<?php
// Information
Route::get('information/index', function () {
    return view('web.information.index');
})->name('information.index');
Route::get('information/diagnosis', function () {
    return view('web.information.diagnosis');
})->name('information.diagnosis');
Route::get('information/certificate', function () {
    return view('web.information.certificate');
})->name('information.certificate');
Route::get('information/warranty', function () {
    return view('web.information.warranty');
})->name('information.warranty');
Route::get('information/guide', function () {
    return view('web.information.guide');
})->name('information.guide');

// 커뮤니티
Route::get('community', function () {
    return redirect('community/notice');
})->name('community');
Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {
    Route::resource('notice', 'NoticeController');
    Route::resource('faq', 'FaqController');
    Route::resource('contact', 'ContactController');

});

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


// 마이페이지
Route::group(['middleware' => ['auth']], function () {

    // 주문
    Route::resource('cart', 'CartController');

    // 결제

    Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage', 'as' => 'mypage.'], function () {

        Route::resource('profile', 'ProfileController');
        // Route::resource('order', 'OrderController');
        Route::resource('history', 'HistoryController');
        Route::resource('inquire', 'InquireController');

        Route::get('confirm', 'MyOrderController@confirm')->name('myorder.confirm');
        Route::post('confirm-check', 'MyOrderController@confirmCheck')->name('myorder.confirm-check');
        Route::resource('myorder', 'MyOrderController');

    });
});

/////////////////////////////////////////////////////////////
//결제결과 수신
Route::match(['GET', 'POST'], 'payment/pay-result', 'PaymentController@payCallback')->name('payment.pay-result');
Route::match(['GET', 'POST'], 'order/pay-callback', 'OrderController@payResult')->name('payment.pay-callback');
Route::match(['GET', 'POST'], 'order/payment-result', 'OrderController@paymentResult')->name("order.payment-result");

// 회원가입폼
// Route::get('agreement', 'Auth\RegisterController@agreement')->name('register.agreement');
// 회원가입완료
Route::get('register/registered', 'Auth\RegisterController@registered')->name('registered');
// 회원가입시 이메일 인증 재발송폼
Route::get('resend', 'Auth\RegisterController@resend')->name('register.resend');
// 회원가입시 이메일 인증 재발송 처리
Route::post('resent', 'Auth\RegisterController@resent')->name('register.resent');
// 회원가입시 이메일 인증 처리
Route::get('verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

// 회원정보 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Auth::routes();

Route::any('logout', 'Auth\LoginController@logout');
Route::any('/', 'WelcomeController');


// Route::post('register', 'Auth\RegisterController@postRegister');
// Route::get('certificate', 'CertificateController@index');
// Route::get('search{q?}', 'SearchController@index')->name('search.index');
// Authentication
// Route::get('logout', 'Auth\LoginController@logout');
// Route::get('chagumsa-info', function () {
//         return view('web.information.info');
// })->name('information.index');
// Route::get('information/price', 'InformationController@price');
// Route::get('/information/find-garage', 'InformationController@findGarage');


//email 관련
// Route::post('/send-email', 'WelcomeController@sendEmail');

