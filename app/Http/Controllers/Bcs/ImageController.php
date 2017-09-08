<?php

namespace App\Http\Controllers\Bcs;

use App\Helpers\Helper;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic AS Image;
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
                } else {
                    return $this->makeImageWithText($file->extension);
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

    public function makeImageWithText($text) {
        // create Image from file
        $img = Image::canvas(100, 100, '#FFFFFF');

// use callback to define details
        $img->text(strtoupper($text), 50, 50, function($font) {
            $font->file(public_path("assets/fonts/lato-light.ttf"));
            $font->size(20);
            $font->color('#000');
            $font->align('center');
            $font->valign('middle');
//            $font->angle(45);
        });

        // create a new empty image resource
//        $img = Image::canvas(800, 600, '#ff0000');
// send HTTP header and output image data
        return $img->response();
    }

}
