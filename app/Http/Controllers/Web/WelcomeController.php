<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Counsel;
use Illuminate\Http\Request;

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
