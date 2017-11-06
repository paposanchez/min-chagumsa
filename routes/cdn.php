<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File AS FileHandler;
use Intervention\Image\ImageManagerStatic AS Image;

use App\Helpers\Helper;
use App\Repositories\CertificateRepository;
use App\Models\File;
use App\Models\DiagnosisFile;



Route::get('/avatar/{user_id?}', function($user_id){
        $image = public_path('assets/img/avatar.png');
        if ($user_id) {


                $avatar = storage_path('app/users/' . $user_id . '/avatar.png');
                if (FileHandler::exists($avatar)) {
                    $image = $avatar;
                }
        }

        return response()->file($image);
});
Route::get('/image/{id?}', function($id){
        $image = public_path('assets/img/noimage.png');
        if ($id) {

                $file = File::findOrFail($id);

                if ($file) {
                        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
                        if (in_array($file->mime, $allowedMimeTypes)) {
                                // 실제파일 위치
                                $image = storage_path('app/upload' . $file->path) . '/' . $file->source;
                        } else {
                                return $this->makeImageWithText($file->extension);
                        }
                }
        }

        return response()->file($image);
});
Route::get('/thumbnail/{id?}', function($id){
        $image = public_path('assets/img/noimage.png');
        if ($id) {

                $file = File::findOrFail($id);

                if ($file) {
                        $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
                        if (in_array($file->mime, $allowedMimeTypes)) {
                                // 실제파일 위치
                                $image = storage_path('app/upload' . $file->path) . '/' . $file->source;
                        } else {
                                return $this->makeImageWithText($file->extension);
                        }
                }
        }

        return response()->file($image);
});





Route::get('/diagnosis/{id?}', function($id){
        $image = public_path('assets/img/noimage.png');
        if ($id) {

                $file = DiagnosisFile::findOrFail($id);

                if ($file) {
                        $binary = storage_path('app/diagnosis' . $file->path) . '/' . $file->source;
                }
        }

        return response()->file($binary);
});
