<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class LeaveController extends Controller
{

        /**
        * 회원 탈퇴 페이지
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
        */
        public function index()
        {
                $profile = Auth::user();
                $order = Order::where('orderer_id', Auth::user()->id)->whereIn('status_cd', [105, 106, 107, 108, 109])->get();
                if ($order) {
                        return redirect("/mypage/profile")->with('error', '진행중인 주문이 있어 탈퇴가 불가능합니다. 관리자에게 문의하세요.');
                }

                return view('web.mypage.profile.leave', compact('profile'));
        }

        /**
        * @param Request $request
        * 회원 탈퇴 메소드
        * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
        */
        public function store(Request $request)
        {
                $user = Auth::user();
                $user->delete();

                return redirect('logout');
        }

}
