<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 로그인 화면 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.auth.login');
    }

    /**
     * @param Request $request
     * @param User $user
     * 로그인 인증 관련 메소드
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, User $user)
    {

        // 비활성 회원
        if ($user->status_cd != 1) {

            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();

            return redirect()->route('register.resend', ['email' => $user->email]);
        }

    }

}
