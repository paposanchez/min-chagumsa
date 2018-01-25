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

                $validator = Validator::make($request->all(), [
                        'user_id' => 'required|exists:users,id',
                ]);

                if ($validator->fails()) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

                try {

                        // 조회를 요청한 사용자의 정보조회
                        $bcs = User::withRole('garage')->findOrFail($request->get('user_id'));

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

                        $result = [
                                "status"        => 'success',
                                "total"         => count($entrys),
                                "data"          => $entrys
                        ];

                        return response()->json($result);

                } catch (\Exception $e) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }


        // 엔지니어 신규생성
        public function store(Request $request)
        {

                $validator = Validator::make($request->all(), [
                        'user_id' => 'required',
                        'email' => 'required|min:2',
                        'name' => 'required|min:2',
                        'mobile' => 'min:4|numeric',
                        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'
                ]);

                if ($validator->fails()) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

                try{

                        // 트랜젝션 시작
                        DB::beginTransaction();

                        $bcs = User::withRole('garage')->findOrFail($request->get('user_id'));

                        $input = $request->get();

                        // validate에서 처리
                        // $mobile = preg_replace("/^[0-9]*/s", "", $input['mobile']);
                        $user           = new User;
                        $user->name     = $input['name'];
                        $user->email    = $input['email'];
                        $user->mobile   = $input['mobile'];
                        $user->password = bcrypt(substr($input['mobile'], -4));
                        $user->status_cd = Code::getId('user_status','active');
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


                $validator = Validator::make($request->all(), [
                        'user_id' => 'required',
                        'eng_id' => 'required',
                        'email' => 'required|min:2',
                        'name' => 'required|min:2',
                        'mobile' => 'min:4|numeric',
                        'password' => 'nullable|min:6|confirmed',
                        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'
                ]);

                if ($validator->fails()) {
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }

                try{

                        // 트랜젝션 시작
                        DB::beginTransaction();

                        $bcs = User::withRole('garage')->findOrFail($request->get('user_id'));

                        $input = $request->get();

                        $user = User::findOrFail($request->get('eng_id'));
                        $user->name     = $input['name'];
                        $user->email    = $input['email'];
                        $user->mobile   = $input['mobile'];
                        // 비밀번호 변경
                        if (!empty($input['password'])) {
                                $user->password = bcrypt($input['password']);
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
                        $validator = Validator::make($request->all(), [
                                'user_id' => 'required',
                                'eng_id' => 'required'
                        ]);

                        if ($validator->fails()) {
                                return response()->json([
                                        "status" => 'fail'
                                ]);
                        }

                        
                        $bcs = User::withRole('garage')->findOrFail($request->get('user_id'));

                        User::destroy($request->get('eng_id'));

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
