<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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

    public function login(Request $request)
    {
        $is_auth = Auth::attempt(array('email' => $request->get('email'), 'password' => $request->get('password')));
        if($is_auth === true){
            $user = User::where('email', $request->get('email'))->first();
            $this->authenticated($request, $user); // 회원상태 확인

            //session save
            $user->updated_at = \Carbon\Carbon::now();

            Auth::login($user, true);

            return redirect('/');

        }else{
//            return redirect('/')->with('error', trans('auth.failed'));
            return redirect()->back()->with('error', trans('auth.failed'));
        }
    }

    protected function authenticated(Request $request, User $user) {


        if ($user->status_cd == 2) {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/')->with('error', trans('auth.status.unactive'));
        }

        /*
         * 1과 2로만 제어함
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
        */
    }

}
