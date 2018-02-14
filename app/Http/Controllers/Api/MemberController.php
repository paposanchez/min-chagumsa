<?php
/**
* Created by PhpStorm.
* User: minseok
* Date: 2018. 1. 7.
* Time: PM 7:22
*/

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Code;
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

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $bcs = User::withRole('garage')->findOrFail($requestData['user_id']);

                        // 사용자가 권한이 잇는 경우에만 결과 리턴
                        $entrys = User::leftJoin('user_extras', function ($extra_qry) {
                                $extra_qry->on('users.id', '=', 'user_extras.users_id');
                        })
                        ->select()
                        ->withRole('engineer')
                        ->where('user_extras.garage_id', $bcs->id)
                        ->where('users.id', '!=', $bcs->id)
                        ->orderBy('users.name', 'ASC')
                        ->get();

                        return response()->json([
                                "status"        => 'success',
                                "data"          => [
                                        "total"         => count($entrys),
                                        "entrys"        => $entrys
                                ]
                        ]);

                } catch (\Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }


        // 엔지니어 신규생성
        public function store(Request $request)
        {

                try{

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'email'         => 'required|min:2',
                                'name'          => 'required|min:2',
                                'mobile'        => 'min:4|numeric',
                                'avatar'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $bcs = User::withRole('garage')->findOrFail($requestData['user_id']);

                        // 트랜젝션 시작
                        DB::beginTransaction();

                        // validate에서 처리
                        // $mobile = preg_replace("/^[0-9]*/s", "", $requestData['mobile']);
                        $user           = new User;
                        $user->name     = $requestData['name'];
                        $user->email    = $requestData['email'];
                        $user->mobile   = $requestData['mobile'];
                        $user->password = bcrypt(substr($requestData['mobile'], -4));
                        $user->status_cd = Code::getIdByGroupAndName('user_status','active');
                        $user->save();

                        // 사용자 역활 추가, role_user 테이블
                        $user->attachRole(5);

                        // 엔지니어 extra 데이터 생성
                        $user->user_extra()->create([
                                'garage_id' => $bcs->id
                        ]);

                        // if ($request->file('avatar')) {
                        //         Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                        //         $user->avatar = 1;
                        //         $user->save();
                        // }

                        DB::commit();

                        return response()->json([
                                "status" => 'success'
                        ]);

                }catch(\Exception $e){
                        DB::rollback();
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }


        public function update(Request $request)
        {

                try{

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'eng_id'        => 'required|exists:users,id',
                                'email'         => 'required|min:2',
                                'name'          => 'required|min:2',
                                'mobile'        => 'min:4|numeric',
                                'avatar'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100',
                                'password'      => 'nullable|min:6|confirmed',
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $bcs = User::withRole('garage')->findOrFail($requestData['user_id']);

                        // 트랜젝션 시작
                        DB::beginTransaction();

                        $user = User::findOrFail($requestData['eng_id']);
                        $user->name     = $requestData['name'];
                        $user->email    = $requestData['email'];
                        $user->mobile   = $requestData['mobile'];
                        // 비밀번호 변경
                        if (!empty($requestData['password'])) {
                                $user->password = bcrypt($requestData['password']);
                        }
                        $user->save();

                        // if ($request->file('avatar')) {
                        //         Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                        //         $user->avatar = 1;
                        //         $user->save();
                        // }

                        DB::commit();

                        return response()->json([
                                "status" => 'success'
                        ]);

                }catch(\Exception $e){
                        DB::rollback();
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }


        // 엔지니어 삭제
        public function destroy(Request $request)
        {
                try{

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'eng_id'        => 'required|exists:users,id',
                        ]);


                        // 조회를 요청한 사용자의 정보조회
                        $bcs = User::withRole('garage')->findOrFail($requestData['user_id']);

                        User::destroy($requestData['eng_id']);

                        return response()->json([
                                "status" => 'success'
                        ]);

                }catch(\Exception $e){
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }

}
