<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @param null $token
     * 비밀번호 변경 페이지
     * 토근을 생성하여 가져간다
     * @return $this
     */
    public function showResetForm(Request $request, $token = null) {
        return view('web.auth.passwords.reset-form')->with(['token' => $token]);
    }

    /**
     * @param Request $request
     * 비밀번호 변경 처리
     * 비밀번호를 변경하고 home으로 이동한다
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request){
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('/')->with('success', '비밀번호가 정상적으로 변경되었습니다. 로그인 이후 이용해주세요.');
    }

}
