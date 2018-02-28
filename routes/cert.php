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

use App\Models\Code;
use App\Models\Certificate;
use App\Models\Diagnosis;
use App\Models\Warranty;

Route::any('/{fullkey}/{flush?}', function ($fullkey, $flush = '') {

        $pattern = '/^([0-9]{8})-([0-9A-Za-z]{6})-([0-9]{4})([D|W|C]{1})/';


        if (preg_match($pattern, $fullkey)) {
                $chakeys = explode('-', $fullkey);

                $chakey = $chakeys[0] . '-' . $chakeys[1] . '-' . substr($chakeys[2], 0, 4);
                $chakey_type = substr($chakeys[2], -1);

                // $pdf = \PDF::loadView('layouts.document', compact('data', 'document_type', 'page_title', 'report_type', 'operation_state_cd', 'certificate_states'));
                // return $pdf->stream($data->getDocumentKey() .'.'. str_random(6) .'.'. '.pdf');
                switch ($chakey_type) {
                        case 'D':

                        $data = Diagnosis::where('chakey', '=', $chakey)->first();
                        $report_type = 'D';
                        $document_type = 'diagnosis';
                        $page_title     = '차검사 진단서';
                        // 평가관련
                        $operation_state_cd = Code::getSelectList('operation_state_cd');
                        $certificate_states = Code::getSelectList('certificate_state_cd');
                        return view('layouts.document', compact('data', 'document_type', 'page_title', 'report_type', 'operation_state_cd', 'certificate_states'));



                        break;

                        case 'W':
                        $data = Warranty::whereChakey($chakey)->first();
                        $report_type = 'W';
                        $document_type = 'warranty';
                        $page_title     = '차검사 보증서';
                        // 평가관련
                        $operation_state_cd = Code::getSelectList('operation_state_cd');
                        $certificate_states = Code::getSelectList('certificate_state_cd');

                        return view('layouts.document', compact('data', 'document_type', 'page_title', 'report_type', 'operation_state_cd', 'certificate_states'));
                        break;

                        case 'C':

                        $data = Certificate::whereChakey($chakey)->first();
                        $report_type = 'C';
                        $document_type = 'certificate';
                        $page_title     = '차검사 평가서';
                        // 평가관련
                        $operation_state_cd = Code::getSelectList('operation_state_cd');
                        $certificate_states = Code::getSelectList('certificate_state_cd');
                        return view('layouts.document', compact('data', 'document_type', 'page_title', 'report_type', 'operation_state_cd', 'certificate_states'));


                        break;

                        default:
                        abort(404, '해당 문서를 찾을 수 없습니다.');
                        break;
                }

        }


})->name('cert');

Route::any( '/', function( ){
        return response()->json([
                "SERVICE"       => "CHAGUMSA CERTIFICATION"
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
