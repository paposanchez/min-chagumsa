<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller {
	
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
	public function __construct() {
			$this->middleware('guest', ['except' => 'logout']);
	}

	public function showLoginForm() {
			return view('web.auth.login');
	}

	protected function authenticated(Request $request, User $user) {

		// 비활성 회원
		if ($user->status_cd != 1) {
			
			$this->guard()->logout();
		    $request->session()->flush();
		    $request->session()->regenerate();
//		    return redirect('/login')->with('error', trans('auth.status.unactive'));
//            return redirect('/resend')->with('error', trans('auth.status.unactive'));

            return redirect()->route('register.resend', ['email' => $user->email]);
		}
	
	}

}
