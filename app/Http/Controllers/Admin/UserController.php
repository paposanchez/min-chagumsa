<?php

namespace App\Http\Controllers\Admin;

use App\Models\GarageInfo;
use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use App\Models\UserExtra;
use App\Models\UserSequence;
use DB;
use Hash;
use Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index(Request $request) {
        $where = User::orderBy('id', 'DESC');

        $role_cd = $request->get('role_cd');

        if($role_cd){
            $where = $where->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->where('role_user.role_id', '=', $role_cd);
        }

        $entrys = $where->paginate(25);
        return view('admin.user.index', compact('entrys'));
    }

    public function create() {
        $roles = Role::getArrayByNameNotMember();
        $status_cd_list = Code::whereGroup('user_status')->get();


        $aliances = User::select()->join('role_user', function($join){
            $join->on('users.id', '=', 'role_user.user_id')->where('role_id', 3);
        })->orderBy('name')->pluck('name', 'id');

        $garages = GarageInfo::select()->get();



        return view('admin.user.create', compact('roles', 'status_cd_list', 'garages', 'aliances'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'name' => 'required|min:2',
            'roles' => 'required',
            'mobile' => 'min:2',
            'status_cd' => [
                'required',
                Rule::in(Code::getCodeFieldArray('user_status')->toArray()),
            ],
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'], [], [
            'email' => trans('admin/user.email'),
            'password' => trans('admin/user.password'),
            'password_confirmation' => trans('admin/user.password_confirmation'),
            'name' => trans('admin/user.name'),
            'roles' => trans('admin/user.roles'),
            'mobile' => trans('admin/user.mobile'),
            'status_cd' => trans('admin/user.status'),
            'avatar' => trans('admin/user.avatar'),
        ]);

        $input = $request->all();


        // 비밀번호 생성
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
//        $user = User::find(14)->first();

        // 사용자 역활 추가, role_user 테이블
        foreach ($input['roles'] as $key => $value) {
            $user->attachRole($value);
        }


        //todo 현재 user_extras에 데이터를 저장하는 것이 없기 떄문에, 만약 roles이 엔지니어(5)라면 정비소의 아이디를 가지고 user_extra에 같이 저장한다.

        if($request->get('roles')[0] == 5 || $request->get('roles')[0] == 4){
            $rol = $request->get('roles')[0];
            if($rol == 4){
//                $this->validate($request, [
//                    'garage_name' => 'required|min:2',
//                    'garage_tel' => 'required',
//                    'garage_zipcode' => 'required',
//                    'garage_area' => 'required',
//                    'garage_section' => 'required',
//                    'garage_address' => 'required'
//                ]);


                // garage_info 데이터 저장
                $garage_info = GarageInfo::where('name', $request->get('garage_name'))->first();
                if(!$garage_info){
                    $garage_info = new GarageInfo();
                }
                $garage_info->garage_id = $user->id;
                $garage_info->name = $request->get('garage_name');
                $garage_info->tel = $request->get('garage_tel');
                $garage_info->zipcode = $request->get('garage_zipcode');
                $garage_info->area = $request->get('garage_area');
                $garage_info->section = $request->get('garage_section');
//                $garage_info->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_zipcode')." ".$request->get('garage_address');
                $garage_info->address = $request->get('garage_address');
                $garage_info->save();


                // user_extra 데이터 저장
                $user_extra = UserExtra::where('users_id', $user->id)->first();
                if(!$user_extra){
                    $user_extra = new UserExtra();
                }
                $user_extra->users_id = $user->id;
                $user_extra->phone = $request->get('garage_tel');
                $user_extra->zipcode = $request->get('garage_zipcode');
                $user_extra->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_address');
                $user_extra->address_extra = $request->get('garage_name');
                $user_extra->aliance_id = $request->get('aliance_id');
                $user_extra->registration_number = $request->get('registration_number');
                $user_extra->fax = $request->get('fax');
                $user_extra->bcs_bank = $request->get('bank');
                $user_extra->bcs_account = $request->get('account');
                $user_extra->bcs_account_name = $request->get('owner');
                $user_extra->save();


                // user_sequence 데이터 저장
//                $user_seq = UserSequence::where('users_id', $user->id)->first();
//                if(!$user_seq){
//                    $user_seq = new UserSequence();
//                }
//                $user_seq->users_id = $user->id;
//                $user_seq->seq = str_pad($user_seq, 5 , "0", STR_PAD_LEFT);
//                $user_seq->garage_seq = str_pad($garage_seq, 5 , "0", STR_PAD_LEFT);
//                $user_seq->save();
//                $user_seq->setNewGarageSeq($user->id);


            }else{
//                $this->validate($request, [
//                    'garage' => 'required'
//                ]);

                // user_extra 데이터 저장
                $user_extra = UserExtra::where('users_id', $user->id)->first();
                $garage_info = GarageInfo::where('name', $request->get('garage'))->first();
                if(!$user_extra){
                    $user_extra = new UserExtra();
                }
                $user_extra->users_id = $user->id;
                $user_extra->phone = $request->get('mobile');
                $user_extra->zipcode = $garage_info->tel;
                $user_extra->address = $garage_info->address;
                $user_extra->address_extra = $garage_info->name;
                $user_extra->garage_id = $garage_info->garage_id;
                $user_extra->save();


                // user_sequence 데이터 저장
//                $user_seq = UserSequence::where('users_id', $user->id)->first();
//                if(!$user_seq){
//                    $user_seq = new UserSequence();
//                }
//                $user_seq->users_id = $user->id;
//                $user_seq->save();
//                $user_seq->setNewEngineerSeq($user->id, $garage_info->garage_id);


            }
        }


        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
            $user->avatar = 1;
            $user->save();
        }

        return redirect()
                        ->route('user.index')
                        ->with('success', trans('admin/user.created'));
    }

    public function edit($id) {

        $user = User::findorFail($id);

        $status_cd_list = Code::whereGroup('user_status')->get();

        $roles = Role::getArrayByName();

        $aliances = User::select()->join('role_user', function($join){
            $join->on('users.id', '=', 'role_user.user_id')->where('role_id', 3);
        })->orderBy('name')->pluck('name', 'id');

        $garages = GarageInfo::select()->get();

        $userRole = $user->roles->pluck('id', 'name')->toArray();

        // engineer의 정비소 출력
        $user_extras = UserExtra::where('users_id', $user->id)->first();
        if(!$user_extras){
            $user_extras = new UserExtra();
        }

        // garage의 정보 및 network 정보
        $garage_info = GarageInfo::where('garage_id', $user->id)->first();
        if(!$garage_info){
            $garage_info = new GarageInfo();
        }


        return view('admin.user.edit', compact('user', 'roles', 'userRole', 'status_cd_list', 'garages', 'aliances', 'user_extras', 'garage_info'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|same:password',
            'name' => 'required|min:2',
            'roles' => 'required',
            'mobile' => 'nullable|min:2',
            'status_cd' => [
                'required',
                Rule::in(Code::getCodeFieldArray('user_status')->toArray()),
            ],
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'], [], [
            'email' => trans('admin/user.email'),
            'password' => trans('admin/user.new-password'),
            'password_confirmation' => trans('admin/user.new-password_confirmation'),
            'name' => trans('admin/user.name'),
            'roles' => trans('admin/user.roles'),
            'mobile' => trans('admin/user.mobile'),
            'garage' => trans('admin/user.garage'),
            'status_cd' => trans('admin/user.status'),
            'avatar' => trans('admin/user.avatar'),
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

        if ($user->id != 1) {
            // roles
            DB::table('role_user')->where('user_id', $id)->delete();
            foreach ($input['roles'] as $key => $value) {
                $user->attachRole($value);
            }
        }

        if($request->get('roles')[0] == 5 || $request->get('roles')[0] == 4){
            $rol = $request->get('roles')[0];
            if($rol == 4){
                $this->validate($request, [
                    'aliance_id' => 'required',
                    'garage_name' => 'required|min:2',
                    'garage_tel' => 'required',
                    'garage_zipcode' => 'required',
                    'garage_area' => 'required',
                    'garage_section' => 'required',
                    'garage_address' => 'required',
                ]);


                // garage_info 데이터 저장
                $garage_info = GarageInfo::where('name', $request->get('garage_name'))->first();
                if(!$garage_info){
                    $garage_info = new GarageInfo();
                }
                $garage_info->garage_id = $user->id;
                $garage_info->name = $request->get('garage_name');
                $garage_info->tel = $request->get('garage_tel');
                $garage_info->zipcode = $request->get('garage_zipcode');
                $garage_info->area = $request->get('garage_area');
                $garage_info->section = $request->get('garage_section');
//                $garage_info->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_zipcode')." ".$request->get('garage_address');
                $garage_info->address = $request->get('garage_address');
                $garage_info->save();


                // user_extra 데이터 저장
                $user_extra = UserExtra::where('users_id', $user->id)->first();
                if(!$user_extra){
                    $user_extra = new UserExtra();
                }
                $user_extra->users_id = $user->id;
                $user_extra->phone = $request->get('garage_tel');
                $user_extra->zipcode = $request->get('garage_zipcode');
                $user_extra->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_address');
                $user_extra->address_extra = $request->get('garage_name');
                $user_extra->aliance_id = $request->get('aliance_id');
                $user_extra->registration_number = $request->get('registration_number');
                $user_extra->fax = $request->get('fax');
                $user_extra->bcs_bank = $request->get('bank');
                $user_extra->bcs_account = $request->get('account');
                $user_extra->bcs_account_name = $request->get('owner');
                $user_extra->save();


            }else{
                $this->validate($request, [
                    'garage' => 'required',
                ]);


                $my_extra = UserExtra::where('users_id', $user->id)->first();

                if($my_extra->garage->garageInfo->name != $request->get('garage')){
                    // user_extra 데이터 저장
                    $user_extra = UserExtra::where('users_id', $user->id)->first();
                    $garage_info = GarageInfo::where('name', $request->get('garage'))->first();
                    if(!$user_extra){
                        $user_extra = new UserExtra();
                    }
                    $user_extra->users_id = $user->id;
                    $user_extra->phone = $request->get('mobile');
                    $user_extra->zipcode = $garage_info->tel;
                    $user_extra->address = $garage_info->address;
                    $user_extra->address_extra = $garage_info->name;
                    $user_extra->garage_id = $garage_info->garage_id;
                    $user_extra->save();
                }
            }
        }


        // 아바타 변경
        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
            $user->avatar = 1;
            $user->save();
        }

        return redirect()
                        ->route('user.edit', ['id' => $user->id])
                        ->with('success', trans('admin/user.updated'));
    }

    public function destroy(Request $request, $id) {
        $user = User::findOrFail($id);

        if ($user->id != 1) {

            DB::table('role_user')->where('user_id', $id)->delete();
            $user->delete();

            return redirect()
                            ->route('user.index')
                            ->with('success', trans('admin/user.destroyed'));
        } else {
            return redirect()
                            ->route('user.index')
                            ->with('success', trans('admin/user.can_not_destroyed'));
        }
    }

    public function searchGarage(Request $request){
        $garage = GarageInfo::where('name' , 'like', '%'.$request->get('garage_name').'%');

        if($garage){
            $json = $garage->get()->toArray();
        }else{
            $json = [];
        }

        return \GuzzleHttp\json_encode($json);
    }

}
