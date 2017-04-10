<?php

//########## Sample Pages
Route::get('json/line', 'JsonController@line');
Route::get('json/line2', 'JsonController@line2');
Route::get('json/d3', 'JsonController@d3');
Route::get('service/{page?}/{sub?}/', function ($page = 'index', $sub = 'index') {
    if (in_array($page, ['chart', 'form'])) {
        return view('web.service.' . $page . '.' . $sub);
    } else {
        return view('web.service.' . $page);
    }
});
//##########
// 커뮤니티
Route::get('community', 'CommunityController@index')->name("community");
Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {
    Route::resource('notice', 'NoticeController');
    Route::resource('faq', 'FaqController');
    Route::resource('free', 'FreeController');
});

// 파일
Route::post('file/upload', 'FileController@upload')->name("file/upload");
Route::get('file/download/{id?}', 'FileController@download')->name("file/download");
Route::delete('file/delete/{id}', 'FileController@delete')->name("file/delete");

// Avatar
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");

// After login
Route::group(['middleware' => ['auth']], function () {

    Route::get('mypage', 'MypageController@index')->name("mypage");
    Route::group(['namespace' => 'Mypage', 'prefix' => 'mypage'], function () {
        Route::resource('profile', 'ProfileController');
        Route::resource('history', 'HistoryController');
    });
});

// Authentication
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/', 'WelcomeController');
