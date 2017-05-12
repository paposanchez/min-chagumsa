<?php

// 마이페이지
Route::group(['middleware' => ['auth']], function () {
    Route::get('mypage', 'MypageController@index')->name("mypage");
    Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage', 'as' => 'mypage.'], function () {
        Route::resource('profile', 'ProfileController');
        Route::resource('history', 'HistoryController');
        Route::resource('order', 'OrderController');
    });
});

    // 공통
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");

// 인증서 조회
Route::get('certificate/{id}/{page?}', 'CertificateController')->name("certificate");

// 주문하기
Route::get('order', 'OrderController@index')->name("order.index");
Route::get('order/reservation', 'OrderController@reservation')->name("order.reservation");
Route::get('order/purchase', 'OrderController@purchase')->name("order.purchase");
Route::get('order/complete', 'OrderController@complete')->name("order.complete");
Route::get('order/reservation', 'OrderController@reservation')->name("order.reservation");
Route::get('order/verificate/{mobile}', 'OrderController@verificate')->name("order.verificate");
Route::get('order/factory/{page?}', 'OrderController@factory')->name("order.factory");


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
Auth::routes();
// 회원가입폼
Route::get('register/join', 'Auth\RegisterController@join')->name('register.join');
// 회원가입완료
Route::get('register/registered', 'Auth\RegisterController@registered')->name('register.registered');
// 이메일 인증
Route::get('verify', 'Auth\VerifyController@__invoke');

Route::get('/', 'WelcomeController');
