<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Auth\RegistersUsers;

// use Illuminate\Support\Facades\Mail;
use App\Notifications\ConfirmEmail;
use App\Repositories\ActivationRepository;

use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{

    // use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * 회원가입 동의 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function agreement()
    {
        return view('web.auth.agreement');
    }


    /**
     * 회원가입폼 setter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('web.auth.join');
    }

    /**
     * @param array $data
     * Get a validator for an incoming registration request.
     * @return mixed
     */
    protected function validator(array $data)
    {

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
     * @param Request $request
     * 회원가입 처리 메소드
     * @return \Illuminate\Http\RedirectResponse
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
//                        $input['ip'] = Request::ip();

            // 사용자 생성
            $user = User::create($input);
            // 사용자 역활 추가
            $user->attachRole(2);

            $input['users_id'] = $user->id;
            $user_extra = $user->user_extra()->create($input);

            $this->notify($user);

            if ($request->file('avatar')) {
                Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                $user->avatar = 1;
                $user->save();
            }

            return redirect()->route('register.registered', ['user_id' => $user->id]);

        } catch (Exception $e) {
            return redirect('/login')->with("error", "회원가입을 진행할 수 없습니다. 다시 시도하세요.");
        }
    }

    /**
     * @param User $user
     * 회원가입 이메일 전송
     */
    private function notify($user)
    {
        $activator = new ActivationRepository();
        $token = $activator->createActivation($user);
        $user->notify(new ConfirmEmail($token));
    }

    /**
     * @param Request $request
     * 회원가입 완료 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registered(Request $request)
    {
        $user = User::where('id', $request->get('user_id'))->first();
        return view('web.auth.registered', compact('user'));
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
            //            return view('web.verify.success', compact());
            return redirect('/')->with('success', trans('verification.success'));
        } else {
            return redirect('resend')->with('error', trans('verification.resend'));
        }

    }


    /**
     * @param Request $request
     * 회원가입 인증메일 재발송폼
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resend(Request $request)
    {
        $email = $request->get('email');
        return view('web.auth.resend', compact('email'));
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

        return redirect('/')->with('success', trans('verification.message'));
    }


}
