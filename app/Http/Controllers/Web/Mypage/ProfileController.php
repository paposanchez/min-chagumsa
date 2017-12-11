<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
    /**
     * 사용자정보 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        // 사용자명 변경
        if ($request->get('name')) {

            $validator = $this->validate($request, [
                'name' => 'required'
            ], [
                'name.required' => '사용하실 이름을 입력하세요.',
            ]);

            $user = User::findOrFail(Auth::id());
            $user->name = $request->get('name');
            $user->save();
            return redirect("/mypage/profile")->with('success', "회원정보가 변경되었습니다.");
        }

        //  패스워드 변경
        if ($request->get('password')) {

            $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|same:password',
                'password_confirmation' => 'required|same:password',
            ], [
                'old_password.required' => '현재 비밀번호를 입력하세요.',
                'password.required' => '비밀번호를 입력하세요',
            ]);

            $user = User::findOrFail(Auth::id());

            if (Hash::check($request->get('old_password'), $user->password)) {

                $user->password = bcrypt($request->password);
                $user->save();

                return redirect("/mypage/profile")->with("success", "비밀번호가 변경되었습니다.");
            } else {
                return redirect("/mypage/profile")->with("error", "현재 비밀번호를 확인하세요.");
            }

        }
    }

    /**
     * 회원 탈퇴 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function leaveForm()
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
    public function leave(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect('logout');
    }

}
