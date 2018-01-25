<?php
/**
 * Created by PhpStorm.
 * User: minseok
 * Date: 2018. 1. 7.
 * Time: PM 7:22
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/member",
     *     tags={"Member"},
     *     summary="전체 엔지니어목록",
     *     description="엔지니어 전체목록",
     *     operationId="index",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function index(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 'fail'
                ]);
            }

            $user_id = $request->get('user_id');

            $bcs = User::findOrFail($user_id);

            if ($bcs->hasRole("garage")) {
                $users = User::select('users.*')->join('user_extras', function ($extra_qry) {
                    $extra_qry->on('users.id', 'user_extras.users_id');
                })->join('role_user', function ($role_user_qry) {
                    $role_user_qry->on('user_extras.users_id', 'role_user.user_id');
                })->join('roles', function ($role_qry) {
                    $role_qry->on('role_user.role_id', 'roles.id');
                })->where('role_user.role_id', 5)->where('user_extras.garage_id', $user_id)->orderBy('created_at', 'DESC');

                $entrys = $users->paginate(25);

                return response()->json([
                    "status" => 'success',
                    "response" => $entrys
                ]);
            }
            return response()->json([
                "status" => 'fail',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }


    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'email' => 'required|min:2',
                'password' => 'required|min:6|confirmed',
                'name' => 'required|min:2',
                'mobile' => 'min:2',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 'fail'
                ]);
            }


            $user_id = $request->get('user_id');
            $bcs = User::findOrFail($user_id);
            if($bcs->hasRole("garage")){
                DB::beginTransaction();
                $user = new User();
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                if (strpos($request->get('mobile'), '-') !== false) {
                    $pass = str_replace('-', '', $request->get('mobile'));
                    $pass = substr($pass, 3);
                    $user->password = bcrypt($pass);
                } else {
                    $pass = substr($request->get('mobile'), 3);
                    $user->password = bcrypt($pass);
                }
                $user->mobile = $request->get('mobile');
                $user->status_cd = 1;
                $user->save();


                // 사용자 역활 추가, role_user 테이블
                $user->attachRole(5);


                // user_extra 데이터 저장
                $user_extra = UserExtra::where('users_id', $user->id)->first();
                if (!$user_extra) {
                    $user_extra = new UserExtra();
                }
                $user_extra->users_id = $user->id;
                $user_extra->phone = $request->get('mobile');
                $user_extra->zipcode = $bcs->user_extra->zipcode;
                $user_extra->address = $bcs->user_extra->address;
                $user_extra->address_extra = $bcs->user_extra->name;
                $user_extra->garage_id = $bcs->id;
                $user_extra->save();

                if ($request->file('avatar')) {
                    Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                    $user->avatar = 1;
                    $user->save();
                }
                DB::commit();
                return response()->json([
                    "status" => 'success'
                ]);
            }else{
                return response()->json([
                    "status" => 'fail'
                ]);
            }
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }

    // todo 회원 수정해야함
    public function edit(Request $request)
    {
        try {

            $bcs = User::findOrFail($request->get('user_id'));
            if($bcs->hasRole("garage")){
                $user_id = $request->get('user_id');
                $user = User::findorFail($user_id);

                return $user;
                //            return response()->json([
//                "id" => $user->id,
//                "name" => $user->name,
//                "email" => $user->email,
//                "mobile" => $user->mobile
//            ]);
            }else{
                return response()->json('fail');
            }




        } catch (\Exception $e) {
            return response()->json('fail');
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'eng_id' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->get('user_id'),
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

            $bcs = User::findOrFail($request->get('user_id'));
            if($bcs->hasRole("garage")){
                DB::beginTransaction();
                $input = $request->all();
                // 비밀번호 변경
                if (!empty($input['password'])) {
                    $input['password'] = bcrypt($input['password']);
                } else {
                    $input = array_except($input, array('password'));
                }

                $user = User::findOrFail($request->get('eng_id'));
                $user->update($input);

                // 아바타 변경
                if ($request->file('avatar')) {
                    Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

                    $user->avatar = 1;
                    $user->save();
                }
                DB::commit();
                return response()->json([
                    "status" => 'success'
                ]);
            }else{
                return response()->json([
                    "status" => 'fail'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }


    public function destroy(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'eng_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 'fail'
                ]);
            }

            $bcs = User::findOrFail($request->get('user_id'));
            if($bcs->hasRole("garage")){
                $user_id = $request->get('eng_id');
                $user = User::findOrFail($user_id);
                // todo soft delete 처리
                $user->softDeletes();
//                DB::table('role_user')->where('user_id', $user_id)->delete();


                return response()->json([
                    "status" => 'success'
                ]);
            }else{
                return response()->json([
                    "status" => 'fail'
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                "status" => 'fail'
            ]);
        }
    }

}