<?php

Route::group(['as' => 'admin.', 'prefix' =>'admin'], function () {

// After login
//    Route::group(['middleware' => ['auth', 'role:admin']], function () {
//
//        // 대시보드
//        Route::resource('dashboard', 'DashboardController');
//
//        // 주문관리
////        Route::resource('order', 'OrderController');
////        Route::get('/order/view/{id?}', 'OrderController@view')->name("view");
//
//        // 정산관리
////        Route::resource('calculation', 'CalculationController');
//
//        // 사용자
//        Route::resource('user', 'UserController', ['except' => ['show']]);
//
//        // 게시물 
//        Route::resource('post', 'PostController');
//
//        // 코멘트
//        Route::resource('comment', 'CommentController');
//
//        // 환경설정 
//        Route::group(['prefix' => 'config'], function () {
//            // 기본코드테이블
//            Route::resource('code', 'CodeController');
//            // 역활
//            Route::resource('role', 'RoleController');
//            //권한
//            Route::resource('permission', 'PermissionController');
//            // 게시판설정
//            Route::resource('board', 'BoardController');
//            // tag
//            Route::resource('tag', 'TagController');
//            // 사용자로그
//            Route::resource('active', 'ActiveController');
//        });
//
//        // JSON : 회원목록
//        Route::get('json/users', function () {
//            return App\Models\User::paginate();
//        });
//        Route::get('json/tags', function () {
//            return App\Models\TaggingTag::paginate();
//        });
//
//        // 파일
//        Route::post('file/upload', 'FileController@upload')->name("file/upload");
//        Route::get('file/download/{id?}', 'FileController@download')->name("file/download");
//        Route::delete('file/delete/{id}', 'FileController@delete')->name("file/delete");
//
//        // Avatar
//        Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
//        Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");
//    });
//
//// After login in administrator's
//    Route::group(['middleware' => ['guest.admin']], function () {
//        Route::get('login', function () {
//            return redirect('/');
//        });
//        // 로그인 처리
//        Route::post('login', 'Auth\LoginController@login');
//
//        // 회원정보 분실
//        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//
//        // Email confirmation 
//        //Route::get('resend', 'Auth\RegisterController@resend');
//        //Route::get('confirm/{token}', 'Auth\RegisterController@confirm');
//        // Notifications
//        //Route::get('notifications/{user}', 'NotificationController@index');
//        //Route::put('notifications/{notification}', 'NotificationController@update');
//
//
//        Route::get('/', 'WelcomeController');
//    });
//
//    Route::get('logout', 'Auth\LoginController@logout')->name("logout");
//    Route::post('logout', 'Auth\LoginController@logout')->name("logout");
});
