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
     * @param array $data
     * 벨리데이터
     * 필수 값이 들어왓는지 검사
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
     * @param $email
     * @param $token
     * 인덱스 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $email, $token) {

        if ($result) {
            return view('web.auth.verify.success');
        } else {
            return view('web.auth.verify.fail');
        }
    }

    /**
     * @param Request $request
     * 이메일 채크
     * @return \Illuminate\Http\JsonResponse
     */
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
