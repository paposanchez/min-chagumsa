<?php

namespace App\Http\Controllers\Web\Auth;

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
        return view('web.auth.passwords.reset');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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





    public function resetForm(Request $request){
//        $this->validate($request->all(), ['email'=> 'required|email'], [], ['email' => trans('passwords.email')]);

        $user = User::where('email', $request->get('email'))->first();

        if(!$user){
            return redirect()->back()->with('error', trans('verification.check_error_email'));
        }
//        return redirect()->route('password.reset', ['email' => $request->get('email')]);


        $email = $request->get('email');
        return view('web.auth.passwords.reset-form', compact('email'));
    }

//    public function reset(Request $request){
//        dd('dd');
//    }
}
