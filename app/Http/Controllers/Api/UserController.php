<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\Code;
// use App\Models\UserSequence;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController
{

    /**
     * @SWG\Post(
     *     path="/login",
     *     tags={"User"},
     *     summary="로그인",
     *     description="로그인",
     *     operationId="login",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="email",in="formData",description="엔지니어 email",required=true,type="string",format="email"),
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
    public function login(Request $request)
    {
        try {
            // 엔지니어 email
            $email = $request->get("email");
            // 엔지니어 패스워드
            $password = $request->get("password");

            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $user = Auth::user();


                // 엔지니어롤
                if (!$user->hasRole("engineer")) {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 활성여부
                if ($user->status->name != 'active') {
                    return abort(401, trans('auth.status.unauthorized'));
                }

                // 아바타가 업로드되어 있다면
                $url = 'http://www.chagumsa.com/avatar';
                if ($user->avatar == 1) {
                    $url .= '/' . $user->id;
                }

                // 정비소 정보
                $garage = $user->user_extra->garage;

                $users = [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email,
                    "mobile" => $user->mobile,
                    "avatar" => $url,
                    "status" => $user->status->display(),
                    "garage" => [
                        "seq" => $garage->id,
                        "name" => $garage->name,
                        "phone" => $garage->user_extra->phone,
                        //                        "profile_image" => $garage_src,
                        "address" => "(" . $garage->user_extra->zipcode . ")" . $garage->user_extra->address
                    ]
                ];

                return response()->json([
                    "status" => 'success',
                    "response" => $users
                ]);
            }

            return response()->json([
                "status" => 'fail'
            ]);

        } catch (Exception $ex) {
            return response()->json([
                "status" => 'fail'
            ]);

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
    public function logout(Request $request)
    {
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
    public function show(Request $request)
    {
        try {
            $user_id = $request->get('user_id');

            $user = User::findOrFail($user_id);

            if ($user->hasRole("engineer")) {

                $garage = $user->user_extra->garage;
                $entry = array(
                    "id" => $user->id,
                    "name" => $user->name,
                    "mobile" => $user->mobile,
                    'garage' => [
                        "id" => $garage->id,
                        "name" => $garage->name,
                        "phone" => $garage->user_extra->phone,
                        "address" => "(" . $garage->user_extra->zipcode . ")" . $garage->user_extra->address
                    ]);

                return response()->json([
                    "status" => 'success',
                    "response" => $entry
                ]);
            }

            return response()->json([
                "status" => 'fail'
            ]);
            // 앱에서는 간단하게
        } catch (Exception $e) {
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }

    public function update(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'password' => 'nullable|min:6|confirmed',
                'name' => 'required|min:2',
                'mobile' => 'min:2',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 'fail'
                ]);
            }

            $input = $request->all();
            // 비밀번호 변경
            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input = array_except($input, array('password'));
            }

            $user = User::findOrFail($request->get('user_id'));
            $user->update($input);

            // 아바타 변경
            if ($request->file('avatar')) {
                \Intervention\Image\Facades\Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

                $user->avatar = 1;
                $user->save();
            }

            return response()->json([
                "status" => 'success'
            ]);
        }catch (\Exception $e){
            return response()->json([
                "status" => 'fail'
            ]);
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
    public function changePassword(Request $request)
    {
        try {
            $user_id = $request->get('user_id');
            $password = $request->get('password');
            $password_new = $request->get('password_new');
            if (Auth::attempt(['id' => $user_id, 'password' => $password])) {
                $user = User::find($user_id);

                if ($user->status->name != 'active') {
                    return response()->json('false');
                }

                // 앱에서 로그인 정보 갱신
                $user->update([
                    'password' => bcrypt($password_new),
                    'updated_at' => Carbon::now()
                ]);
                return response()->json([
                    "status" => 'success'
                ]);
            }

            return response()->json([
                "status" => 'fail'
            ]);

        } catch (Exception $e) {
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }

}
