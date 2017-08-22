<?php

namespace App\Http\Controllers\Mobile\Auth;

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

    public function showResetForm(Request $request, $token = null) {
        return view('mobile.auth.passwords.reset-form')->with(['token' => $token]);
    }

    public function reset(Request $request){
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('/')->with('success', '비밀번호가 정상적으로 변경되었습니다. 로그인 이후 이용해주세요.');
    }

}
