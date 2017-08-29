<?php

namespace App\Http\Controllers\Bcs;

use App\Http\Controllers\Controller;
use App\Models\GarageInfo;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BcsController extends Controller {

    /**
     * bcs 회원정보 수정
     * todo 회원수정 정보를 구성해야함
     * @param Request $request
     */
    public function index(Request $request){
        $user = Auth::user();

        $aliance_list = User::select()->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id', '=', 3)->pluck('name', 'id');

        $my_area = $user->garageInfo->area;
        $my_section = $user->garageInfo->section;


        return view("bcs.user.bcs-info", compact('user', 'my_area', 'my_section', 'aliance_list'));
    }

    /**
     * BCS 회원정보 수정
     * @param Request $request
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|same:password',
            'name' => 'required|min:2',
            'mobile' => 'min:2',
            'aliance' => 'required',
            'area' => 'required',
            'section' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'fax' => 'required',
            'registration_number' => 'required',

            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'], [], [
            'email' => trans('bcs/user.email'),
            'password' => trans('bcs/user.password'),
            'password_confirmation' => trans('bcs/user.password_confirmation'),
            'name' => trans('bcs/user.name'),
            'roles' => trans('bcs/user.roles'),
            'mobile' => trans('bcs/user.mobile'),
            'status_cd' => trans('bcs/user.status'),
            'avatar' => trans('bcs/user.avatar'),
        ]);

        $input = $request->all();

        // 비밀번호 변경
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::findOrFail($id);
        $user->update($input);

        $area = $request->get('area');
        $section = $request->get('section');
//        $address = $area." ".$section." ".$request->get('address');
        $address = $request->get('address');

        // garage_info 정보 업데이트
        $garage_info = GarageInfo::where('name', $user->name)->first();
        if($garage_info){
            $garage_info->area = $area;
            $garage_info->section = $section;
            $garage_info->address = $address;
            $garage_info->name = $request->get('name');
            $garage_info->save();
        }

        // user_extra 정보 업데이트
        $user_extra = UserExtra::where('users_id', $id)->first();
        if($user_extra){
            $user_extra->registration_number = $request->get('registration_number');
            $user_extra->phone = $request->get('tel');
            $user_extra->fax = $request->get('fax');
            $user_extra->aliance_id = $request->get('aliance');
            $user_extra->address_extra = $garage_info->name;
            $user_extra->address = $area." ".$section." ".$address;
            $user_extra->save();
        }

        // 아바타 변경
        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            $user->avatar = 1;
            $user->save();
        }

        return redirect()
            ->route('bcs.info.index')
            ->with('success', trans('bcs/user.updated'));
    }

}
