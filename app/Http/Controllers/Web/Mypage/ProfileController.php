<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
//use GuzzleHttp\Psr7\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mockery\Exception;


class ProfileController extends Controller
{

    public function index()
    {
        $profile = User::where("email", Auth::user()->email)->first();
        return view('web.mypage.profile.index', compact('profile'));
    }

    /**
     * 비밀번호 갱신
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if ($request->get('old_password') === $request->get('password')) {
            return redirect()->back()->with("error", "새 비밀번호가 현재 비밀번호와 동일합니다.");
        }

        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect("/mypage/profile")->with("success", "비밀번호가 변경되었습니다.");
    }

    public function leaveForm()
    {
        $profile = Auth::user();
        //@TODO 현재 주문완료상태 입고대기등의 진행중인 주문이 잇는 경우 탈퇴불가
        $order = Order::whereIn('status_cd', [105,106,107])->get();
        if($order){
            return redirect("/mypage/profile")->with('error', '진행중인 주문이 있어 탈퇴가 불가능합니다. 관리자에게 문의하세요.');
        }

        return view('web.mypage.profile.leave', compact('profile'));
    }

    public function leave(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect('logout');
    }

}
