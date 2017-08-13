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
// use Illuminate\Foundation\Auth\RegistersUsers;

// use Illuminate\Support\Facades\Mail;
use App\Notifications\ConfirmEmail;
use App\Repositories\ActivationRepository;

use Illuminate\Support\Facades\DB;


class RegisterController extends Controller {

    // use RegistersUsers;

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
                    // 'mobile' => 'confirmed',
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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        try {

            // 회원 생성
            $input = $request->all();
            // 비밀번호 생성
            $input['password'] = bcrypt($input['password']);

            // 이메일 비활성
            $input['status_cd'] = 2;


            $user = User::create($input);
            // 사용자 역활 추가
            $user->attachRole(2);


            $this->notify($user);


            // if ($request->file('avatar')) {
            //     Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            //     $user->avatar = 1;
            //     $user->save();
            // }


//            return redirect('/')->with("success", "가입성공");
//            return redirect('/register/registered')->with("success", "가입성공");

            return redirect()->route('register.registered', ['user_id' => $user->id]);

        }catch(Exception $e) {
            return redirect('/')->with("error", "가입실패");
        }



    }

    private function notify( $user) {
        $activator = new ActivationRepository();
        $token = $activator->createActivation($user);

        $user->notify(new ConfirmEmail($token));
    }

    public function registered(Request $request){
        $user = User::where('id', $request->get('user_id'))->first();
//        $user = User::where('id', 2)->first();
        return view('web.auth.registered', compact('user'));
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
        $email = $request->get('email');
        return view('web.auth.resend', compact('email'));
    }

    // 회원가입 인증메일 재발송처리
    public function resent(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
        ]);
//        $validator = Validator::make($data, [
//           'email' => 'required|email|max:255|unique:users',
//        ]);
        $user = User::where('email', $request->get('email'))->first();

        $activator = new ActivationRepository();
        $token = $activator->createActivation($request->get('email'));

        $user->notify(new ConfirmEmail($token));

        return redirect('resend')->with('success', trans('web/verify.message'));
    }



}
