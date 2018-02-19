<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CertificateRepository;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use File AS FileHandler;
use App\Models\DiagnosesFile;
use Intervention\Image\ImageManagerStatic AS Image;
use App\Repositories\CertiRedisRepository;

Route::get('/thumbnail/{id?}', function ($id) {


    $image = public_path('assets/img/noimage.png');
    if ($id) {

        $file = DiagnosesFile::findOrFail($id);

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


Route::any('/{fullkey}/{flush?}', function ($fullkey, $flush = '') {

    $pattern = '/^([0-9],8)-([0-9],4)-([0-9A-Z],6)-([D|W|C],1)';

    if (preg_match($pattern, $fullkey) === true) {
        $chakeys = explode($pattern, '-');
        $chakey = $chakeys[0] . '-' . $chakeys[1] . '-' . $chakeys[2];
        $chakey_type = $chakeys[3];

        // $dia = Diagnosis::getInstance();
        // $dia::publish();

        switch ($chakey_type) {
            case 'D':
                return \App\Models\Diagnosis::publish();
                break;

            case 'W':
                return \App\Models\Warranty::publish();
                break;

            case 'C':
                return \App\Models\Certificate::publish();
                break;

            default:
                abort(404, '정보를 찾을 수 없습니다.');
                break;
        }

    }


})->name('cert');

Route::any( '/', function( ){
    return response()->json([
        "SERVICE"       => "CHAGUMSA CERT SERVICE"
    ]);
});



// Route::any('/{order_id}/{page?}/{flush?}', function ($order_id, $page = 'summary', $flush = '') {
//         //    try{
//         //    list($car_number, $datekey) = explode("-", $order_id);
//         //    $order_date = \Carbon\Carbon::createFromFormat('ymd', $datekey);
//         //
//         //    $order = \App\Models\Order::where('car_number', $car_number)
//         //        ->whereYear('created_at', '=', \Carbon\Carbon::parse($order_date)->format('Y'))
//         //        ->whereMonth('created_at', '=', \Carbon\Carbon::parse($order_date)->format('n'))
//         //        ->whereDay('created_at', '=', \Carbon\Carbon::parse($order_date)->format('j'))->first();
//
//         //    if(Auth::user() || $order->status_cd == 1326){
//         if (!in_array($page, ['performance', 'price', 'history', 'summary', 'mobile-summary', 'mobile-price'])) {
//                 throw new Exception('인증서가 존재하지 않습니다.');
//         }
//
//         $expireat = env('CACHE_EXPIRE_AT');
//
//         $expire = env('CACHE_EXPIRE');
//         if ($expire) {
//                 $expire = intval($expire);
//
//         } else {
//                 $expire = false;
//         }
//
//         $hash = md5($order_id) . '-' . $page; //고유키값을 구성함
//
//         $handler = new CertiRedisRepository($hash, $expire);
//
//
//         if ($expireat) {
//                 // 일자별 캐시 만료(expireat)가 설정되었음
//                 // 초단위 기간만료보다 일자 단위가 우선이어야 한다.
//                 // 기간 만료 없을시(forever)에도 expireat을 선언하지 말아야 함.
//                 $handler->setExpireTime($expireat);
//         }
//
//         $handler->prepare($order_id);
//         $cache = $handler->getCacheHtml($page);
//
//         return $cache;
//         //    }else{
//         //        abort(404, '인증서를 찾을 수 없습니다.');
//         //    }
//
// })->name('cert');
