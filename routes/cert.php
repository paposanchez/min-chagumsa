<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CertificateRepository;
use Illuminate\Support\Facades\Storage;


use App\Helpers\Helper;
use File AS FileHandler;
use App\Models\DiagnosisFile;
use Intervention\Image\ImageManagerStatic AS Image;
use App\Repositories\CertiRedisRepository;

Route::get('/thumbnail/{id?}', function ($id) {


    $image = public_path('assets/img/noimage.png');
    if ($id) {

        $file = DiagnosisFile::findOrFail($id);

        if ($file) {
            $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
            if (in_array($file->mime, $allowedMimeTypes)) {
                // 실제파일 위치
                $image = storage_path('app/diagnosis' . $file->path) . '/' . $file->source;
            } else {
                return $this->makeImageWithText($file->extension);
            }
        }
    }

    return response()->file($image);

});
Route::any('/{order_id}/{page?}/{flush?}', function ($order_id, $page = 'summary', $flush = '') {

    list($car_number, $order_date) = explode('-',$order_id);

    $order_date = Carbon::createFromFormat('ymd', $order_date);

    $order =  Order::whereIn("status_cd",[108, 109])
        ->where('car_number', $car_number)
        ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
        ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
        ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))
        ->orderBy('id', 'DESC')
        ->first();

    if($order->status_cd == 1326 || Auth::user()){
        if (!in_array($page, ['performance', 'price', 'history', 'summary'])) {
            throw new Exception('인증서가 존재하지 않습니다.');
        }

        $expireat = env('CACHE_EXPIRE_AT');

        $expire = env('CACHE_EXPIRE');
        if ($expire) {
            $expire = intval($expire);

        } else {
            $expire = false;
        }

        $hash = md5($order_id) . '-' . $page; //고유키값을 구성함

        $handler = new CertiRedisRepository($hash, $expire);


        if ($expireat) {
            // 일자별 캐시 만료(expireat)가 설정되었음
            // 초단위 기간만료보다 일자 단위가 우선이어야 한다.
            // 기간 만료 없을시(forever)에도 expireat을 선언하지 말아야 함.
            $handler->setExpireTime($expireat);
        }

        $handler->prepare($order_id);
        $cache = $handler->getCacheHtml($page);

        return $cache;
    }else{
        abort(404, '인증서를 찾을 수 없습니다.');
    }

})->name('cert');
