<?php

namespace App\Http\Controllers\Mobile;

use Response;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller {

    public function thumbnail(Request $request, $id = null) {
        $image = public_path('assets/img/noimage.png');

        if ($id) {

            $file = File::findOrFail($id);

            if ($file) {
                $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
                if (in_array($file->mime, $allowedMimeTypes)) {
                    // 실제파일 위치
                    $image = storage_path('app/upload' . $file->path) . '/' . $file->source;
                }
            }
        }

        return response()->file($image);
    }

    public function avatar(Request $request, $user_id = null) {
        $image = public_path('assets/img/avatar.png');


        if ($user_id) {
            $avatar = storage_path('app/users/' . $user_id . '/avatar.png');

            if (FileHandler::exists($avatar)) {
                $image = $avatar;
            }
        }
        return response()->file($image);
    }

}
