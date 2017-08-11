<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// use Illuminate\Support\Facades\Mail;
use App\Notifications\ConfirmEmail;
use App\Repositories\ActivationRepository;

use Illuminate\Support\Facades\DB;


class RegisterController extends Controller {

    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
    }


    // 회원가입동의
    public function agreement() {
        return view('web.auth.agreement');
    }
    

    // 회원가입폼 setter
    public function showRegistrationForm() {
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

    public function registered() {

        $activator = new ActivationRepository();
        $token = $activator->createToken($user);

        $user->notify(new ConfirmEmail($token));

        return redirect('login')->with('ok', trans('web/verify.message'));
    }


    protected function create(array $user_data) {

        $input = $user_data;

        // 비밀번호 생성
        $input['password'] = bcrypt($input['password']);

        // 이메일 비활성
        $input['status_cd'] = 2;

        $user = User::create($input);

        // 사용자 역활 추가
        $user->attachRole(2);

        // if ($request->file('avatar')) {
        //     Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

        //     $user->avatar = 1;
        //     $user->save();
        // }


    }


    protected function redirectPath()
    {
        return redirect('web.completed');
    }

    // 인증확인
    public function verify(Request $request, $confirmation_code) {

        $activator = new ActivationRepository();
        $return = $activator->getActivationByToken($confirmation_code);

        if($return) {
            return view('web.verify.success', compact());
        }else{
            return redirect('resend')->with('error', trans('web/verify.resend'));
        }

    }


    // 회원가입 인증메일 재발송폼
    public function resend(Request $request) {
        return view('web.auth.resend');
    }

    // 회원가입 인증메일 재발송처리
    public function resent(Request $request) {

        $validator = Validator::make($data, [
           'email' => 'required|email|max:255|unique:users',
        ]);

        $activator = new ActivationRepository();
        $token = $activator->regenerateToken($request->get('email'));

        $user->notify(new ConfirmEmail($token));

        return redirect('resend')->with('success', trans('web/verify.message'));
    }



}
