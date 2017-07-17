<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use App\Models\UserSequence;
use Carbon\Carbon;
use DB;
use Hash;
use Image;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController {

    /**
     * @SWG\Post(
     *     path="/login",
     *     tags={"User"},
     *     summary="로그인",
     *     description="로그인",
     *     operationId="login",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="garage_seq",in="formData",description="대리점 seq",required=true,type="integer",format="int"),
     *     @SWG\Parameter(name="seq",in="formData",description="엔지니어 seq",required=true,type="integer",format="int"),
     *     @SWG\Parameter(name="password",in="formData",description="비밀번호",required=true,type="string",format="password"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/User"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *     }
     * )
     */
    public function login(Request $request) {

        try {

            // 정비소 seq
            $garage_seq = $request->get("garage_seq");
            // 엔지니어 seq
            $seq = $request->get("seq");
            // 엔지니어 패스워드
            $password = $request->get("password");

            //====== 1 : 사용자 조회
            $user_seq = UserSequence::where("seq", $seq)->where("garage_seq", $garage_seq)->first();

            if (!$user_seq) {
                return abort(404, trans('auth.not-found'));
            }

            //====== 2 : 사용자 인증 
            if (Auth::attempt(['id' => $user_seq->users_id, 'password' => $password])) {
                
                $user = Auth::user();

                // 엔지니어롤
                if (!$user->hasRole("engineer")) {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 활성여부
                if ($user->status->name != 'active') {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 로그인 정보 갱신
                $user_seq->update([
                    'logined_at' => Carbon::now()
                ]);


                $garage = $user->user_extra->garage;

                return response()->json([
                    "id"         => $user->id,
                    "name"      => $user->name,
                    "email"     => $user->email,
                    "mobile"    => $user->mobile,
                    "status"    => $user->status->display(),
                    "garage"    => [
                        "seq"       => $garage_seq,
                        "name"      => $garage->name,
                        "phone"     => $garage->user_extra->phone,
                        "address"   => "(".$garage->user_extra->zipcode.")".$garage->user_extra->address                   
                    ],
                ]);
            }

            return abort(404, trans('auth.not-found'));

        } catch (Exception $ex) {

            return abort(404, trans('auth.not-found'));

        }
    }

    /**
     * @SWG\GET(path="/logout",
     *   tags={"User"},
     *   summary="로그아웃",
     *   description="로그아웃",
     *   operationId="logout",
     *   produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="formData",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     * )
     */
    public function logout(Request $request) {
        
        // $this->guard()->logout();

        // $request->session()->flush();
        // $request->session()->regenerate();

        return response()->json(true);
    }



    /**
     * @SWG\POST(path="/user",
     *   tags={"User"},
     *   summary="회원정보조회",
     *   description="정비사회원정보 조회",
     *   operationId="show",
     *   produces={"application/json"},
     *   @SWG\Parameter(name="user_id",in="formData",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     * )
     */
    public function show(Request $request) {
        
        try {

            $user_id = $request->get('user_id');

            $user = User::findOrFail($user_id);

            if($user->hasRole("engineer")) {


                $garage = $user->user_extra->garage;

                return response()->json([

                    "id" => $user->id,
                    "name" => $user->name,
                    "mobile" => $user->mobile,
                    'garage' => [
                        "id" => $garage->id,
                        "name" => $garage->name,
                        "phone" => $garage->user_extra->phone,
                        "address" => "(".$garage->user_extra->zipcode.")".$garage->user_extra->address                   
                    ]
                ]);

            }


            return abort(404, trans('auth.not-found'));
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('auth.not-found'));
        }
    }


    /**
     * @SWG\POST(path="/password",
     *   tags={"User"},
     *   summary="비밀번호 변경",
     *   description="정비사의 비밀번호를 변경 가능",
     *   operationId="changePassword",
     *   produces={"application/json"},
     *   @SWG\Parameter(name="user_id",in="formData",description="사용자 번호",required=true,type="integer",format="int32"),
     *   @SWG\Parameter(name="password",in="formData",description="현재 비밀번호",required=true,type="string",format="password"),
     *   @SWG\Parameter(name="password_new",in="formData",description="새 비밀번호",required=true,type="string",format="password"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     * )
     */
    public function changePassword(Request $request) {
        
        try {

            if (Auth::attempt(['id' => $request->get('engineer_id'), 'password' => $request->get('password')])) {
                $user = Auth::user();

                if ($user->status->name != 'active') {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 앱에서 로그인 정보 갱신
                $user->update([
                    'password' => bcrypt($request->get('password_new')),
                    'updated_at' => Carbon::now()
                ]);

                return response()->json($user);
            }

            return abort(404, trans('auth.not-found'));
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('auth.not-found'));
        }
    }

}
