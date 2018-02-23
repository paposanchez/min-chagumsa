<?php

Route::group(['middleware' => ['auth']], function () {


    // 대시보드
    //    Route::get('dashboard', 'DashboardController')->name("dashboard");
    //
    //    Route::group(['middleware' => ['role:admin']], function () {
    //        // 주문관리
    //        Route::post('order/history', 'OrderController@history')->name('order.history');
    //        Route::get('order/get-section', 'OrderController@getSection')->name('order.get-section');
    //        Route::get('order/get-address', 'OrderController@getAddress')->name('order.get-address');
    //        Route::get('order/get-engineer', 'OrderController@getEngineer')->name('order.get-engineer');
    //        Route::get('order/get_full_address', 'OrderController@getFullAddress')->name("order.get_full_address");
    //        Route::get('order/get-details', 'OrderController@getDetails')->name('order.get-models');
    //        Route::get('order/get-grades', 'OrderController@getGrades')->name('order.get-grades');
    //        Route::post('order/user-update', 'OrderController@userUpdate')->name('order.user-update');
    //        Route::post('order/car-update', 'OrderController@carUpdate')->name('order.car-update');
    //        Route::post('order/cancel', 'OrderController@orderCancel')->name('order.cancel');
    //        Route::get('order/order-number-check', 'OrderController@orderNumberCheck')->name('order.order-number-check');
    //        Route::get('order/get-car-type', 'OrderController@getCarType')->name('order.get-car-type');
    //        Route::get('order/get-models', 'OrderController@getModels')->name('order.get-models');
    //        Route::get('order/get-details', 'OrderController@getDetails')->name('order.get-details');
    //        Route::get('order/get-grades', 'OrderController@getGrades')->name('order.get-grades');
    //        Route::get('order/get-items', 'OrderController@getItems')->name('order.get-items');
    //        Route::get('order/get-etc-items', 'OrderController@getEtcItems')->name('order.get-etc-items');
    //        Route::resource('order', 'OrderController');
    //
    //        // 정산관리
    //        Route::resource('calculation', 'CalculationController');
    //
    //        // 진단관리
    //        Route::post('diagnosis/delete-file/{id}', 'DiagnosisController@fileDelete')->name('diagnosis.delete-file');
    //        Route::post('diagnosis/upload-file', 'DiagnosisController@fileUpload')->name('upload-file');
    //        Route::post('diagnosis/update-comment', 'DiagnosisController@updateComment')->name('diagnosis.update-comment');
    //        Route::post('diagnosis/update-code', 'DiagnosisController@updateCode')->name('diagnosis.update-code');
    //        Route::post('diagnosis/complete', 'DiagnosisController@complete')->name('diagnosis.complete');
    //        Route::post('diagnosis/change-reservation', 'DiagnosisController@changeReservation')->name('diagnosis.change-reservation');
    //        Route::post('diagnosis/confirm-reservation', 'DiagnosisController@confirmReservation')->name('diagnosis.confirm-reservation');
    //        Route::post('diagnosis/change-garage', 'DiagnosisController@changeGarage')->name('diagnosis.change-garage');
    //        Route::resource('diagnosis', 'DiagnosisController');
    //
    //        // 파일
    //        Route::post('file/thumbnail', '\App\Http\Controllers\FileController@thumbnail')->name("file/thumbnail");
    //        Route::post('file/upload', '\App\Http\Controllers\FileController@upload')->name("file/upload");
    //        Route::post('file/image', '\App\Http\Controllers\FileController@image')->name("file/image");
    //        Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file/download");
    //        Route::delete('file/delete/{id}', '\App\Http\Controllers\FileController@delete')->name("file/delete");
    //
    //        // Avatar
    //        Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
    //        Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");
    //
    //        //인증서 데이터 갱신
    //        Route::patch('order/update/{id}', 'OrderController@update')->name('order/update');
    //
    //        //보험이력파일처리
    //        Route::post('order/insurance-file', 'OrderController@insuranceFile')->name('order/insurance-file');
    //        Route::get('order/insurance-file-view/{id}', 'OrderController@insuranceFileView')->name('order/insurance-file-view');
    //
    //        // 인증서 관리
    //        Route::get('certificate/{id?}/assign', 'CertificateController@assign');
    //        Route::any('certificate/issue', 'CertificateController@issue');
    //        Route::get('certificate/{id}/edit', 'CertificateController@edit');
    //        Route::get('certificate/{id}/{page?}/{flush?}', 'CertificateController@show');
    //        Route::resource('certificate', 'CertificateController', ['only' => ['index', 'update']]);
    //
    //        // 보증관리
    //        Route::resource('warranty', 'WarrantyController');
    //
    //        // 정산관리
    // //        Route::resource('calculation', 'CalculationController');
    //
    //        // 게시물
    //        Route::resource('posting', 'PostingController');
    //
    //        // 코멘트
    //        Route::resource('comment', 'CommentController');
    //
    //        // 회원관리
    //        Route::resource('user', 'UserController', ['except' => ['show']]);
    //        Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");
    //
    //
    //        // 결제관리
    //        Route::resource('purchase', 'PurchaseController');
    //
    //        // 게시물관리
    //        Route::group(['prefix' => 'post'], function () {
    //            // 게시물
    //            Route::resource('posting', 'PostingController');
    //
    //            // 코멘트
    //            Route::resource('comment', 'CommentController');
    //        });


    // 대시보드
    Route::get('dashboard', 'DashboardController')->name("dashboard");

    Route::get('dashboard/get-order-chart', 'DashboardController@getOrderChart')->name('dashboard.get-order-chart');
    Route::get('dashboard/get-diagnosis-chart', 'DashboardController@getDiagnisisChart')->name('dashboard.get-diagnosis-chart');
    Route::get('dashboard/get-certificate-chart', 'DashboardController@getCertificateChart')->name('dashboard.get-certificate-chart');
    Route::get('dashboard/get-warranty-chart', 'DashboardController@getWarrantyChart')->name('dashboard.get-warranty-chart');
    Route::get('dashboard/get-diagnosis-chart', 'DashboardController@getDiagnisisChart');
    Route::get('get-inquire-count', 'DashboardController@getInquireCount')->name('get-inquire-count');


    Route::group(['middleware' => ['role:admin']], function () {
        // 주문관리
        Route::post('order/history', 'OrderController@history')->name('order.history');
        Route::get('order/get-section', 'OrderController@getSection')->name('order.get-section');
        Route::get('order/get-address', 'OrderController@getAddress')->name('order.get-address');
        Route::get('order/get-engineer', 'OrderController@getEngineer')->name('order.get-engineer');
        Route::get('order/get_full_address', 'OrderController@getFullAddress')->name("order.get_full_address");
        Route::get('order/get-details', 'OrderController@getDetails')->name('order.get-models');
        Route::get('order/get-grades', 'OrderController@getGrades')->name('order.get-grades');
        Route::post('order/user-update', 'OrderController@userUpdate')->name('order.user-update');
        Route::post('order/car-update', 'OrderController@carUpdate')->name('order.car-update');
        Route::post('order/cancel', 'OrderController@orderCancel')->name('order.cancel');
        Route::get('order/order-number-check', 'OrderController@orderNumberCheck')->name('order.order-number-check');
        Route::get('order/get-car-type', 'OrderController@getCarType')->name('order.get-car-type');
        Route::get('order/get-models', 'OrderController@getModels')->name('order.get-models');
        Route::get('order/get-details', 'OrderController@getDetails')->name('order.get-details');
        Route::get('order/get-grades', 'OrderController@getGrades')->name('order.get-grades');
        Route::get('order/get-items', 'OrderController@getItems')->name('order.get-items');
        Route::get('order/get-etc-items', 'OrderController@getEtcItems')->name('order.get-etc-items');
        Route::resource('order', 'OrderController');


        // 진단관리
        Route::post('diagnosis/delete-file/{id}', 'DiagnosisController@fileDelete')->name('diagnosis.delete-file');
        Route::post('diagnosis/upload-file', 'DiagnosisController@fileUpload')->name('upload-file');
        Route::post('diagnosis/update-comment', 'DiagnosisController@updateComment')->name('diagnosis.update-comment');
        Route::post('diagnosis/update-code', 'DiagnosisController@updateCode')->name('diagnosis.update-code');
//                Route::post('diagnosis/complete', 'DiagnosisController@complete')->name('diagnosis.complete');
        Route::post('diagnosis/change-reservation', 'DiagnosisController@changeReservation')->name('diagnosis.change-reservation');
        Route::post('diagnosis/confirm-reservation', 'DiagnosisController@confirmReservation')->name('diagnosis.confirm-reservation');
        Route::post('diagnosis/change-garage', 'DiagnosisController@changeGarage')->name('diagnosis.change-garage');

        Route::post('diagnosis/review-complete', 'DiagnosisController@reviewComplete')->name('diagnosis.review-complete');
        Route::post('diagnosis/issue', 'DiagnosisController@issue')->name('diagnosis.issue');

        Route::resource('diagnosis', 'DiagnosisController');

        // 파일
        Route::post('file/thumbnail', '\App\Http\Controllers\FileController@thumbnail')->name("file.thumbnail");
        Route::post('file/upload', '\App\Http\Controllers\FileController@upload')->name("file.upload");
        Route::post('file/image', '\App\Http\Controllers\FileController@image')->name("file.image");
        Route::get('file/download/{id}', '\App\Http\Controllers\FileController@download')->name("file.download");
        Route::delete('file/delete/{id}', '\App\Http\Controllers\FileController@delete')->name("file.delete");

        // Avatar
        Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
        Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");

        //인증서 데이터 갱신
        Route::patch('order/update/{id}', 'OrderController@update')->name('order/update');

        //보험이력파일처리
        Route::post('order/insurance-file', 'OrderController@insuranceFile')->name('order.insurance-file');
        Route::get('order/insurance-file-view/{id}', 'OrderController@insuranceFileView')->name('order.insurance-file-view');

        // 인증서 관리
        Route::post('certificate/{id?}/assign', 'CertificateController@assign');
        Route::any('certificate/issue', 'CertificateController@issue')->name('certificate.issue');
        Route::resource('certificate', 'CertificateController');

        // 보증관리
        Route::resource('warranty', 'WarrantyController');

        // 정산관리
        // Route::resource('calculation', 'CalculationController');
        Route::get('calculation/index', 'CalculationController@index')->name('calculation.index');
        Route::get('calculation/bcs', 'CalculationController@bcs')->name('calculation.bcs');
        Route::get('calculation/alliance', 'CalculationController@alliance')->name('calculation.alliance');
        Route::get('calculation/tech', 'CalculationController@tech')->name('calculation.tech');
        Route::get('calculation/insurer', 'CalculationController@insurer')->name('calculation.insurer');

        // Route::get('calculation/complete', 'CalculationController@complete')->name('calculation.complete');


        // 진담검토관리
        Route::resource('review', 'ReviewController');

        // 게시물
        Route::resource('posting', 'PostingController');

        // 코멘트
        Route::resource('comment', 'CommentController');

        // 회원관리
        Route::resource('user', 'UserController', ['except' => ['show']]);
        Route::get('user/search_garage', 'UserController@searchGarage')->name("user.search_garage");


        // 결제관리

        Route::get('purchase/get-detail', 'PurchaseController@getDetail')->name('purchase.get-detail');
        Route::resource('purchase', 'PurchaseController');

        // 게시물관리
        Route::group(['prefix' => 'post'], function () {
            // 게시물
            Route::resource('posting', 'PostingController');

            // 코멘트
            Route::resource('comment', 'CommentController');
        });

        // 알림관리
        Route::resource('notify', 'NotifyController');

        // 쿠폰
        Route::resource('coupon', 'CouponController', ['only' => ['index', 'store', 'create', 'destroy']]);

        // 환경설정
        Route::group(['prefix' => 'config'], function () {
            // 기본코드테이블
            Route::resource('code', 'CodeController');
            // 사용자로그
            Route::resource('active', 'ActiveController');
            //권한
            Route::resource('permission', 'PermissionController');
            // 역활
            Route::resource('role', 'RoleController');
            // 게시판설정
            Route::resource('board', 'BoardController');
            // 아이템 관리
            Route::resource('item', 'ItemController');
        });
        // 프로파일
        Route::resource('profile', 'ProfileController', ['except' => ['destory']]);


    });


    //    Route::group(['middleware' => ['role:manage']], function () {
    //        // 주문관리
    //        Route::post('order/history', 'OrderController@history')->name('order.history');
    //        Route::post('order/reservation_change', 'OrderController@reservationChange');
    //        Route::post('order/confirmation/{order_id}', 'OrderController@confirmation');
    //        Route::get('order/get-section', 'OrderController@getSection');
    //        Route::get('order/get-address', 'OrderController@getAddress');
    //        Route::get('order/get-engineer', 'OrderController@getEngineer');
    //        Route::get('order/get_full_address', 'OrderController@getFullAddress')->name("order.get_full_address");
    //        Route::get('order/get-details', 'OrderController@getDetails')->name('order.get-models');
    //        Route::get('order/get-grades', 'OrderController@getGrades');
    //        Route::post('order/user-update', 'OrderController@userUpdate')->name('order.user-update');
    //        Route::post('order/car-update', 'OrderController@carUpdate')->name('order.car-update');
    //        Route::post('order/bcs-update', 'OrderController@bcsUpdate')->name('order.bcs-update');
    //        Route::post('order/tech-update', 'OrderController@techUpdate')->name('order.tech-update');
    //        Route::post('order/cancel', 'OrderController@orderCancel')->name('order.cancel');
    //        Route::post('order/diagnosing', 'OrderController@diagnosing');
    //        Route::get('order/order-number-check', 'OrderController@orderNumberCheck');
    //        Route::resource('order', 'OrderController');
    //    });


    //    Route::group(['middleware' => ['role:manage']], function () {
    //
    //    });

    //    Route::group(['middleware' => ['role:admin', 'role:tech', 'role:alliance', 'role:bcs']], function () {
    //        // 정산관리
    //        Route::resource('calculation', 'CalculationController');
    //    });
});


// 회원정보 분실
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::group(['middleware' => ['guest.admin']], function () {
    Route::get('login', function () {
        return redirect('/');
    })->name('admin.login');
    // 로그인 처리
    Route::post('login', 'Auth\LoginController@login');
});


// Route::any('/', function () {
//     return view('admin.auth.login');
// });

Route::any('/', 'WelcomeController');

// Route::get('dashboard/get-json', function (\Illuminate\Http\Request $request) {
//         $ordersListCount = \App\Models\Order::select([
//                 \Illuminate\Support\Facades\DB::raw('COUNT(DISTINCT id) as count'),
//                 \Illuminate\Support\Facades\DB::raw('DATE(`created_at`) as date')
//                 ])->groupBy('date')->take($request->get('count'))->orderBy('date', 'DESC')->pluck('count')->toArray();
//
//                 $json_array = json_encode(array_reverse($ordersListCount));
//
//                 return $json_array;
//
//         });
