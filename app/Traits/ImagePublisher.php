<?php

/*
*
* @Project        zlara
* @Copyright      leechanrin
* @Created        2017-03-23 오전 11:36:54
* @Filename       Uploader.php
* @Description
*
*/

namespace App\Traits;

use App\Helpers\Helper;
use File AS FileHandler;
use App\Models\File;
use Intervention\Image\ImageManagerStatic AS Image;
use Illuminate\Http\Request;

/**
* Description of Uploader
*
* @author leechanrin
*/
trait ImagePublisher {

        /**
        * 이미지파일의 경우 썸네일을 출력
        * @param Request $request
        * @param type $id
        * @return type
        */
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

        /**
        * 사용자 아바타를 출력
        * @param Request $request
        * @param type $user_id
        * @return type
        */
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

        /**
        * 입력된 텍스트를 기반으로하는 썸네일 이미지를 출력
        * @param type $text
        * @return type
        */
        public function makeImageWithText($text, $options = []) {

                $width = ($options['width'] && $options['width'] > 500 || $options['width'] < 50) ? $options['width'] : 100;
                $height = ($options['height'] && $options['height'] > 500 || $options['height'] < 50) ? $options['height'] : 100;
                $color = $options['color'] ? $options['color'] : "#000";
                $fontsize = $options['fontsize'] ? $options['fontsize'] : 20;
                $background = $options['background'] ? $options['background'] : "#ededed";

                $img = Image::canvas($width, $height, $background);

                $img->text(strtoupper($text), $width / 2, $height / 2, function($font) {
                        $font->file(public_path("assets/fonts/lato-light.ttf"));
                        $font->size($fontsize);
                        $font->color($color);
                        $font->align('center');
                        $font->valign('middle');
                        //            $font->angle(45);
                });
                return $img->response();
        }

}
