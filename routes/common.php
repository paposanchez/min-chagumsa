<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File AS FileHandler;
use Intervention\Image\ImageManagerStatic AS Image;


use App\Helpers\Helper;
use App\Repositories\CertificateRepository;
use App\Models\File;
use App\Models\DiagnosesFile;

// 인증서
Route::group([
        'domain' => 'cert.' . config('app.domain'),
], function ($router) {

        Route::any('/{order_id}', function ($order_id) {

        });
});

// 파일 업로드 다운로드
Route::group([
        'domain' => 'file.' . config('app.domain'),
], function ($router) {
        // multifile upload
        Route::post('upload', '\App\Http\Controllers\FileController@upload')->name("file.upload");
        // image upload
        Route::post('image', '\App\Http\Controllers\FileController@image')->name("file.image");

        // file delete
        Route::delete('/{id}', '\App\Http\Controllers\FileController@delete')->name("file.delete");

        // file download
        Route::any('/{file_id}', function ($file_id) {

        });

});




// 이미지 , cdn 도메인이랑 연결로 없앰
// Route::group([
//         'middleware' => 'web',
//         'domain' => 'image.' . config('app.domain'),
// ], function ($router) {
//
//         Route::get('/avatar/{user_id?}', function($user_id){
//                 $image = public_path('assets/img/avatar.png');
//                 if ($user_id) {
//                         $avatar = storage_path('app/users/' . $user_id . '/avatar.png');
//                         if (FileHandler::exists($avatar)) {
//                                 $image = $avatar;
//                         }
//                 }
//
//                 return response()->file($image);
//         });
//
//         Route::get('/image/{id?}', function($id){
//                 $image = public_path('assets/img/noimage.png');
//                 if ($id) {
//
//                         $file = File::findOrFail($id);
//
//                         if ($file) {
//                                 $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
//                                 if (in_array($file->mime, $allowedMimeTypes)) {
//                                         // 실제파일 위치
//                                         $image = storage_path('app/upload' . $file->path) . '/' . $file->source;
//                                 } else {
//                                         return $this->makeImageWithText($file->extension);
//                                 }
//                         }
//                 }
//
//                 return response()->file($image);
//         });
// });
