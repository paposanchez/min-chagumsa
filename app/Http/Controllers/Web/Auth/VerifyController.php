<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class VerifyController extends Controller {

    public function __construct() {
        $this->middleware('guest');
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
                    'name' => 'required|max:100',
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

    public function index(Request $request, $email, $token) {

        if ($result) {
            return view('web.auth.verify.success');
        } else {
            return view('web.auth.verify.fail');
        }
    }

    public function emailCheck(Request $request){
        $where = User::where('email', $request->get('email'))->first();
        if($where){
            $result = false;
        }else{
            $result = true;
        }
        return \response()->json($result);
    }
}
