<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDevice;
use Exception;
use Illuminate\Http\Request;

class DeviceController extends Controller {

        public function index(Request $request){
                try{

                        $requestData = $request->validate([
                                'user_id'       => 'required|exists:users,id',
                                'device_id'     => 'required',
                                'platform'      => 'required'
                        ]);

                        // 조회를 요청한 사용자의 정보조회
                        $user = User::withRole('engineer')->findOrFail($requestData['user_id']);

                        // user_id와 device_id 복합 PK
                        $user_device = UserDevice::firstOrNew([
                                'users_id'  => $user->id,
                                'device_id' => $requestData['device_id'],
                                'platform'  => $requestData['platform']
                        ]);

                        return response()->json([
                                "status" => 'success',
                                "data"  => $user_device->toArray()
                        ]);
                }catch (Exception $e){
                        return response()->json([
                                "status" => 'fail'
                        ]);
                }
        }

}
