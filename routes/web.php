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
Route::get('information/price', 'InformationController@price')->name('information.price');
Route::get('/information/find-garage', 'InformationController@findGarage')->name('information.find-garage');
Route::get('chagumsa-info', function () {
        return view('web.information.info');
})->name('chagumsa-info');



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
        Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage', 'as' => 'mypage.'], function () {
                Route::post('profile/chk-pwd', ['as' => 'profile.chk-pwd', 'uses' => 'ProfileController@chkPwd']);
                Route::resource('profile', 'ProfileController');
                Route::resource('history', 'HistoryController');
                Route::resource('order', 'OrderController');
                Route::resource('certificate', 'CertificateController', ['only' => 'index']);

                Route::post('/order/cancel', 'OrderController@cancel')->name('order.cancel');

                Route::get('/order/change-car/{order_id}', 'OrderController@changeCar');
                Route::post('/order/change-car/{order_id}', 'OrderController@updateCar');
                Route::get('/order/change-reservation/{order_id}', 'OrderController@changeReservation');
                Route::post('/order/change-reservation/{order_id}', 'OrderController@updateReservation');


                Route::get('/leave', 'ProfileController@leaveForm');
                Route::post('/leave', 'ProfileController@leave')->name('profile.leave');

                Route::get('certificate/change-open-cd', 'CertificateController@changeOpenCd');
        });

        //SMS관련
        Route::post('/order/send-sms', 'OrderController@sendSms')->name('order.send-sms');
        Route::post('/order/is-sms', 'OrderController@isSms')->name('order.is-sms');
        Route::post('/order/delete-sms', 'OrderController@deleteSms')->name('order.delete-sms');



        // 주문하기
        Route::match(['get', 'post'], 'order/complete', 'OrderController@complete')->name("order.complete");
        Route::post('order/reservation', 'OrderController@reservation')->name("order.reservation");
        Route::get('order/verificate/{mobile}', 'OrderController@verificate')->name("order.verificate");
        Route::get('order/factory/{page?}', 'OrderController@factory')->name("order.factory");
        Route::post('order/payment-popup', 'OrderController@paymentPopup')->name("order.payment-popup");

        Route::get('/order/get-models', 'OrderController@getModels')->name("order.get_models");
        Route::get('/order/get-details', 'OrderController@getDetails')->name("order.get_details");
        Route::get('/order/get-grades', 'OrderController@getGrades')->name("order.get_grades");
        Route::get('/order/sel-item', 'OrderController@selItem')->name("order.sel_item");
        Route::get('/order/get-section', 'OrderController@getSection')->name("order.get_section");
        Route::get('/order/get-address', 'OrderController@getAddress')->name("order.get_address");
        Route::get('/order/get-full-address', 'OrderController@getFullAddress')->name("order.get_full_address");
        Route::get('/order/car-validation', 'OrderController@carValidation');


        //쿠폰인증
        Route::post('/order/coupon-verify', 'OrderController@couponVerify')->name("order.coupon-verify");
        //쿠폰 주문 등록
        Route::post('/order/coupon-process', 'OrderController@couponProcess')->name("order.coupon-process");



});

/////////////////////////////////////////////////////////////
Route::get('order', 'OrderController@index');
Route::get('certificate', 'CertificateController@index');


// 공통
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");
// Route::get('file/diagnosis-download/{id}', '\App\Http\Controllers\FileController@diagnosisDownload')->name("file.diagnosis-download");
Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file/download");


//결제결과 수신
Route::match(['GET', 'POST'], 'payment/pay-result', 'PaymentController@payCallback')->name('payment.pay-result');
Route::match(['GET', 'POST'], 'order/pay-callback', 'OrderController@payResult')->name('payment.pay-callback');
Route::match(['GET', 'POST'], 'order/payment-result', 'OrderController@paymentResult')->name("order.payment-result");



// 커뮤니티
Route::get('community', function () {
        return redirect('community/notice');
});
Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {
        Route::resource('notice', 'NoticeController');
        Route::resource('faq', 'FaqController');
        Route::resource('inquire', 'InquireController');
});

Route::get('search{q?}', 'SearchController@index')->name('search.index');

// Authentication
Route::get('logout', 'Auth\LoginController@logout');

// 회원가입폼
Route::get('agreement', 'Auth\RegisterController@agreement')->name('register.agreement');

// 회원가입완료
Route::get('register/registered', 'Auth\RegisterController@registered')->name('register.registered');

// 회원정보 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// 회원가입시 이메일 인증 재발송폼
Route::get('resend', 'Auth\RegisterController@resend')->name('register.resend');
// 회원강비시 이메일 인증 재발송 처리
Route::post('resent', 'Auth\RegisterController@resent')->name('register.resent');
// 회원가입시 이메일 인증 처리
Route::get('verify/{token}', 'Auth\RegisterController@verify')->name('verify');
Auth::routes();

Route::post('register', 'Auth\RegisterController@postRegister');

Route::any('/', 'WelcomeController');

Route::get('sample', 'CertificateController@sample')->name('certificate.sample');

//email 관련
Route::post('/send-email', 'WelcomeController@sendEmail');

//결제 prototype
//Route::get('pay-test/index', 'PayTestController@index');
//Route::post('pay-test/pay-result', 'PayTestController@payResult');
//Route::post('pay-test/callback', 'PayTestController@payCallback');
