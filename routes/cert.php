<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CertificateRepository;
use Illuminate\Support\Facades\Storage;


use App\Helpers\Helper;
use File AS FileHandler;
use App\Models\File;
use Intervention\Image\ImageManagerStatic AS Image;

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
Route::any('/{order_id}/{page?}/{flush?}', function ($order_id, $page = 'summary', $flush = '') {

        try
        {
                $handler = new CertificateRepository();
                $handler->prepare($order_id);

                try
                {

                        if(!in_array($page, ['performance', 'price', 'history', 'summary']))
                        {
                                throw new Exception('인증서가 존제하지 않습니다.');
                        }

                        // html 조회
                        $cached_html =  $handler->cached_file($page, true);


                        if (!Storage::disk('local')->exists($cached_html) || $flush == 'cacheclear')
                        {

                                // 강제로 클리어 한다
                                if($flush == 'cacheclear' )
                                {
                                        Storage::disk('local')->deleteDirectory($handler->cached_file($page));
                                }

                                throw new Exception('인증서 캐쉬를 생성합니다.');
                        }

                        return Storage::disk('local')->get($cached_html);

                }
                catch (Exception $e)
                {
                        // 캐쉬 재생성후 리다이렉트
                        $handler->cache($page);
                        return redirect('/'. $order_id.'/'. $page);

                }

        }
        catch (Exception $exception)
        {
                abort(404, '인증서를 찾을 수 없습니다.');

        }


})->name('cert');
