<?php

namespace App\Http\Controllers\Web;

use App\Models\Code;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * 인증서 샘플 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sample()
    {
        return view('web.certificate.sample');
    }
}
