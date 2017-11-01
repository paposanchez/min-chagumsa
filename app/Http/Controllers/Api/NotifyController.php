<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDevice;
use Exception;
use Illuminate\Http\Request;

class NotifyController extends Controller {

    /**
     * @SWG\Post(
     *     path="/notify/register",
     *     tags={"Notify"},
     *     summary="유저 디바이스 등록",
     *     description="사용자의 디바이스를 등록한다.",
     *     operationId="register",
     *     @SWG\Parameter(name="user_id",in="query",description="엔지니어 번호",required=true,type="integer",format="int"),
     *     @SWG\Parameter(name="device_id",in="query",description="디바이스 번호",required=true,type="integer",format="int"),
     *     produces={"application/json"},
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="integer")
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function register(Request $request){
        try{
            $user_device = UserDevice::where('users_id', $request->get('users_id'))->first();
            if(!$user_device){
                $user_device = new UserDevice();
            }
            $user_device->users_id = $request->get('users_id');
            $user_device->device_id = $request->get('device_id');
            $user_device->save();

            return response()->json('success');
        }catch (Exception $e){
            return response()->json('fail');
        }

    }

    public function send(){

    }

    public function badge(){

    }
}
