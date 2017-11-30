<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Counsel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('web.welcome');
    }

    public function sendEmail(Request $request){
        try{
            $name = $request->get('name');
            $mobile = $request->get('mobile');
            $email = $request->get('email');
            $content = $request->get('content');

            $mail_message = [
                'name' => $name, 'mobile' => $mobile, 'email' => $email, 'content' => $content
            ];

            Mail::send(new \App\Mail\Ordering('cs@jimbros.co.kr', "[차검사 상담 신청] 신청자 : ".$name, $mail_message, 'message.email.counsel-user'));

            $counsels = new Counsel();
            $counsels->name = $name;
            $counsels->email = $email;
            $counsels->mobile = $mobile;
            $counsels->content = $content;
            $counsels->save();

            return response()->json('success');


        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }


    }
}
