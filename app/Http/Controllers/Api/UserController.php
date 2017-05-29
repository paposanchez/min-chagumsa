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
use App\Http\Controllers\ApiController;
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
     *     @SWG\Parameter(name="garage_seq",in="body",description="대리점 seq",required=true,type="integer",format="int"),
     *     @SWG\Parameter(name="seq",in="body",description="엔지니어 seq",required=true,type="integer",format="int"),
     *     @SWG\Parameter(name="password",in="body",description="비밀번호",required=true,type="string",format="string"),
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
     *       {"api_key": "123123123123"}
     *     }
     * )
     */
    public function login(Request $request) {

        // 정비소 seq
        $garage_seq = $request->get("garage_seq");
        // 엔지니어 seq
        $seq = $request->get("seq");
        // 엔지니어 패스워드
        $password = $request->get("password");

        // Dummy data send
        $user = User::findOrFail(1);
        $return = [
            "name" => $user->name,
            "email" => $user->email,
            "mobile" => $user->mobile,
            "status" => $user->status,
            "garage" => [
                 "id" => 77777,
                 "name" => "일산정비소",
                 "address" => "경기도 일산 서구 장항동 웨스턴타워 1차",
                 "tel" => "02-123-2902"
            ]
        ];
        return response()->json($return);





        try {

            $user_seq = UserSequence::where("seq", $seq)->where("garage_seq", $garage_seq)->first();
            

            if (!$user_seq) {
                return abort(404, trans('auth.not-found'));
            }

            if (Auth::attempt(['id' => $user_seq->users_id, 'password' => $password])) {
                $user = Auth::user();

//                if (!$user->hasRole("engineer")) {
//                    return abort(401, trans('auth.status.unauthorized'));
//                }

                if ($user->status->name != 'active') {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 앱에서 로그인 정보 갱신
                $user_seq->update([
                    'logined_at' => Carbon::now()
                ]);

                $return = [
                    "name" => $user->name,
                    "email" => $user->email,
                    "mobile" => $user->mobile,
                    "status" => $user->status,
                    "garage" => $user->user_extra->garage,
                ];


                return response()->json($return);
            }

            return abort(404, trans('auth.not-found'));

            // 앱에서는 간단하게 
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
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     * )
     */
    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();
        $request->session()->regenerate();

        return;
    }

    /**
     * @SWG\POST(path="/password/{engineer_id}",
     *   tags={"User"},
     *   summary="비밀번호 변경",
     *   description="정비사의 비밀번호를 변경 가능",
     *   operationId="changePassword",
     *   produces={"application/json"},
     *   @SWG\Parameter(name="password",in="query",description="비밀번호",required=true,type="string",format="string"),
     *   @SWG\Parameter(name="password_new",in="query",description="비밀번호",required=true,type="string",format="string"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     * )
     */
    public function changePassword(Request $request, $engineer_id) {
        try {


            if (Auth::attempt(['id' => $engineer_id, 'password' => $request->get('password')])) {
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

        return response()->json();
    }

}
