<?php

namespace App\Http\Controllers\Technician\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm() {
        return view('admin.auth.login');
    }

    protected function authenticated(Request $request, User $user) {

        if ($user->status_cd == 'U') {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/')->with('error', trans('auth.status.unactive'));
        }

        if ($user->status_cd == 'W') {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/')->with('error', trans('auth.status.unactive'));
        }

        if ($user->status_cd == 'X') {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/')->with('error', trans('auth.status.leaved'));
        }
    }

}
