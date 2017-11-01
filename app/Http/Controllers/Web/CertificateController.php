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
     * 마이 인증서 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', '로그인이 필요한 서비스입니다.');
        }

        $orders = Order::where('orderer_id', $user->id)
            ->where('status_cd', 109)
            ->paginate(10);

        $select_open_cd = Code::getCodesByGroup("open_cd");

        return view('web.certificate.index', compact('orders', 'select_open_cd'));
    }

    /**
     * @param Request $request
     * 인증서 공개여부 변경 메소드
     * @return string
     */
    public function changeOpenCd(Request $request)
    {
        $select_open_cd = Code::getCodesByGroup("open_cd")->toArray();

        if (!array_key_exists($request->get('open_cd'), $select_open_cd)) {
            return "잘못된 접근입니다.";
        }
        $order = Order::where('id', $request->get('order_id'))->first();
        $order->open_cd = $request->get('open_cd');
        $order->save();
        return "인증서 공개여부가 변경되었습니다.";
    }

    /**
     * 인증서 샘플 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sample()
    {
        return view('web.certificate.sample');
    }
}
