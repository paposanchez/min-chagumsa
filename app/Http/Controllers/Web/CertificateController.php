<?php

namespace App\Http\Controllers\Web;

use Response;
use File AS FileHandler;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller {

    public function __invoke(Request $request, $certificate, $page = 'summary') {

        switch ($page) {
            case 'performance':
                return view('web.certificate.performance');
            case 'history':
                return view('web.certificate.history');
            case 'price':
                return view('web.certificate.price');
            default:
                return view('web.certificate.summary');
        }
    }

}
