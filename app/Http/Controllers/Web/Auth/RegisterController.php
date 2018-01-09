<?php

namespace App\Http\Controllers\Web\Auth;

// use App\Models\UserExtra;
// use App\Models\RoleUser;
use App\Models\User;
use App\Notifications\ConfirmEmail;
use App\Repositories\ActivationRepository;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{

        use RegistersUsers;

        protected $redirectTo = '/';

        public function __construct()
        {
                $this->middleware('guest');
        }

        /**
        * 회원가입폼 setter
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
        protected function showRegistrationForm()
        {
                return view('web.auth.register');
        }

        /**
        * @param array $data
        * Get a validator for an incoming registration request.
        * @return mixed
        */
        protected function validator(array $data) {
                $validator = Validator::make($data, [
                        'email' => 'required|email|max:255|unique:users',
                        'name' => 'required|max:100',
                        'password' => 'required|min:6|confirmed',
                        'password_confirmation' => 'required|min:6|same:password',
                        'mobile' => 'confirmed',
                ]);
                $validator->setAttributeNames([
                        'email' => trans('register.email'),
                        'name' => trans('register.name'),
                        'password' => trans('register.password'),
                        'password_confirmation' => trans('register.confirm-password'),
                        'mobile' => trans('register.mobile'),
                ]);
                return $validator;
        }


        /**
        * Create a new user instance after a valid registration.
        *
        * @param  array  $data
        * @return \App\User
        */
        protected function create(array $data)
        {
                $user = User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),
                        'status_cd' => 2
                ]);

                // 사용자 추가데이터 생성
                $user->user_extra()->create([
                        'users_id'      => $user->id
                ]);

                // 일반회원 역활 추가
                $user->attachRole(2);

                // 아바타 업로드
                // if ($data->file('avatar')) {
                //         Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                //         $user->avatar = 1;
                //         $user->save();
                // }
                return $user;
        }

        /**
        * @param Request $request
        * 회원가입 처리 메소드
        * @return \Illuminate\Http\RedirectResponse
        */
        public function register(Request $request)
        {

                $this->validator($request->all())->validate();

                event(new Registered($user = $this->create($request->all())));

                // 아바타 업로드
                if ($request->file('avatar')) {
                        Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                        $user->avatar = 1;
                        $user->save();
                }

                $activator = new ActivationRepository();
                $token = $activator->createActivation($user);
                $user->notify(new ConfirmEmail($token));

                return $this->registered($request, $user);
        }



        // 회원가입 완료
        // protected function registered(Request $request, $user) {
        protected function registered(Request $request) {


                return view('web.auth.registered');
        }

        /**
        * @param Request $request
        * 회원가입 인증메일 재발송폼
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
        public function resend(Request $request)
        {
                return view('web.auth.resend');
        }

        /**
        * @param Request $request
        * 회원가입 인증메일 재발송처리
        * @return \Illuminate\Http\RedirectResponse
        */
        public function resent(Request $request)
        {

                $validator = Validator::make($request->all(), [
                        'email' => 'required|email|max:255|unique:users',
                ]);

                $user = User::where('email', $request->get('email'))->first();

                $activator = new ActivationRepository();
                $token = $activator->createActivation($user);
                $user->notify(new ConfirmEmail($token));

                return redirect('/')->with('success', trans('register.verify.resent_message'));
        }


        /**
        * @param Request $request
        * @param $confirmation_code
        * 인증 확인 처리
        * @return \Illuminate\Http\RedirectResponse
        */
        public function verify(Request $request, $confirmation_code)
        {
                $activator = new ActivationRepository();
                $return = $activator->getActivationByToken($confirmation_code);
                if ($return) {
                        return redirect('/')->with('success', trans('verification.success'));
                } else {
                        return redirect('resend')->with('error', trans('verification.resend'));
                }

        }















        /**
        * @param Request $request
        * 회원가입 완료 페이지
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
        // public function registered(Request $request)
        // {
        //         $user = User::where('id', $request->get('user_id'))->first();
        //         return view('web.auth.registered', compact('user'));
        // }



        /**
        * @param User $user
        * 회원가입 이메일 전송
        */
        // private function notify($user)
        // {
        //         $activator = new ActivationRepository();
        //         $token = $activator->createActivation($user);
        //         $user->notify(new ConfirmEmail($token));
        // }


}
