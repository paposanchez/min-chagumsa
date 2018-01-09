<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\PasswordBroker AS Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller {
        /*
        |--------------------------------------------------------------------------
        | Password Reset Controller
        |--------------------------------------------------------------------------
        |
        | This controller is responsible for handling password reset emails and
        | includes a trait which assists in sending these notifications from
        | your application to your users. Feel free to explore this trait.
        |
        */

        use SendsPasswordResetEmails;

        /**
        * Create a new controller instance.
        *
        * @return void
        */
        public function __construct() {
                $this->middleware('guest');
        }

        public function showLinkRequestForm() {
                return view('admin.auth.passwords.reset');
        }

        protected function sendResetLinkEmail(Request $request) {
                $this->validate($request, ['email' => 'required|email'], [], ['email' => trans('passwords.email')]);

                // We will send the password reset link to this user. Once we have attempted
                // to send the link, we will examine the response then see the message we
                // need to show to the user. Finally, we'll send out a proper response.
                $response = $this->broker()->sendResetLink(
                        $request->only('email')
                );

                return $response == Password::RESET_LINK_SENT ? $this->sendResetLinkResponse($response) : $this->sendResetLinkFailedResponse($request, $response);
        }

        /**
        * @param Request $request
        * 비밀번호 재설정 페이지
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
        */
        public function resetForm(Request $request){
                $user = User::where('email', $request->get('email'))->first();

                if(!$user){
                        return redirect()->back()->with('error', trans('verification.check_error_email'));
                }

                $email = $request->get('email');
                return view('admin.auth.passwords.reset-form', compact('email'));
        }

}
