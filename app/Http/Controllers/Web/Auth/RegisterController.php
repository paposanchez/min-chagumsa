<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {

    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        return view('web.auth.agreement');
    }
    
      public function join() {
        return view('web.auth.join');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        $validator = Validator::make($data, [
                    'email' => 'required|email|max:255|unique:users',
                    'name' => 'max:100',
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6|same:password',
                    'mobile' => 'confirmed',
        ]);
        $validator->setAttributeNames([
            'email' => trans('web/register.email'),
            'name' => trans('web/register.name'),
            'password' => trans('web/register.password'),
            'password_confirmation' => trans('web/register.confirm-password'),
            'mobile' => trans('web/register.mobile'),
        ]);
        return $validator;
    }

    /**
     * 회원정보 저장
     * @param Request $request
     */
    public function register(Request $request)
    {
        dd($request->all());
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        dd($user);

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    public function registered(Request $request, $user) {

//        $user->notify(new ConfirmEmail());

//        return redirect('/')->with('ok', trans('web/verify.message'));
        
         return view('web.auth.register.registered');
    }

    /**
     * Handle a confirmation request
     *
     * @param  \App\Repositories\UserRepository $userRepository
     * @param  string  $confirmation_code
     * @return \Illuminate\Http\Response
     */
    public function confirm(UserRepository $userRepository, $confirmation_code) {
        $userRepository->confirm($confirmation_code);
        return redirect('/')->with('ok', trans('web/verify.success'));
    }

    /**
     * Handle a resend request
     *
     * @param  \App\Repositories\UserRepository $userRepository
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function resend(UserRepository $userRepository, Request $request) {
        if ($request->session()->has('id')) {
            $user = $userRepository->getById($request->session()->get('id'));
            $user->notify(new ConfirmEmail());
            return redirect('/')->with('ok', trans('web/verify.resend'));
        }
        return redirect('/');
    }

}
