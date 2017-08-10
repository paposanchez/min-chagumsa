<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\Post;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Mail;
use App\Notifications\ConfirmEmail;

class RegisterController extends Controller {

    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        return view('web.auth.agreement');
    }
    
      public function join(Request $request) {

        if($request->get('term_use')=='on' && $request->get('term_info') == 'on'){
            return view('web.auth.join');
        }else{
            return \redirect()->route('register.index');
        }


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
     * @return \HttpResponse
     */
    public function register(Request $request)
    {
        $user = $this->validator($request->all())->validate();
//
//        event(new Registered($user = $this->create($request->all())));
        $user_info = User::where("email", $request->email)->first();

        if($user_info){
            return redirect()->back()->with('error', '이미 등록된 사용자입니다. ');
        }else{
            $user_info = new User();
            $user_info->email = $request->email;
            $user_info->name = $request->name;
            $user_info->password = bcrypt($request->password);

            //todo email confirm이 없다면 값을 변경함.
            $user_info->status_cd = 2; // 1 - active
            $user_info->save();

            $role_user = new RoleUser();
            $role_user->user_id = $user_info->id;
            $role_user->role_id = 2;
            $role_user->save();



//            //todo email confirm 보내야 함.
//            $to = $request->email;
//            $subject = '메일군을 이용한 시스템 메일 발송입니다';
//            $data = [
//                'title' => '여기는 타이틀이 들어가는 곳입니다.',
//                'body' => '본문글에 대한 방송이 필요해요.\n푸하하\n동해물과 백두산이 마르고 닳도록',
//                'user' => '사용자 정보입니다'
//                ];
//
//            $send = Mail::send('admin.dashboard.email', $data, function($message) use($to, $subject) {
//                $message->to($to)->subject($subject);
//            });


        }
        Auth::login($user_info, false);



        //todo registerd 페이지를 찾아 연동해야 함.
        return $this->registered($request, $user_info);
//            ?: redirect($this->redirectPath());
    }


    public function registered(Request $request, $user) {
        $confirmation_code = str_random(30);

        $user->notify(new ConfirmEmail($confirmation_code));

//        return redirect('/')->with('ok', trans('web/verify.message'));
        //verification email


        // 인증메일 관련 부분 향후에
        $confirmation_code = str_random(30);

        $confirm_user = Post::find($user->id);
        if($confirm_user){
            $confirm_user->verification_code = $confirmation_code;
            $confirm_user->save();

            Mail::send('email.verify', $confirmation_code, function($message) use ($user) {
                $message->to($user->email)
                    ->subject("[차검사 ]회원 인증 메일입니다");
            });

        }else{
            //
        }


        return view('web.auth.registered', compact("user"));
    }


    /**
     * Handle a confirmation request
     *
     * @param UserRepository $userRepository
     * @param  string  $confirmation_code
     * @return \Illuminate\Http\Response
     */
    public function confirm(UserRepository $userRepository, $confirmation_code) {
        $userRepository->confirm($confirmation_code);
        //return redirect('/')->with('ok', trans('web/verify.success'));
    }

    /**
     * Handle a resend request
     *
     * @param  UserRepository $userRepository
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
