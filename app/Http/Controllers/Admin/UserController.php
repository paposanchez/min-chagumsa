<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use DB;
use Hash;
use Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {
        $where = User::orderBy('id', 'DESC');
        $entrys = $where->paginate(25);
        return view('admin.user.index', compact('entrys'));
    }

    public function create() {
        $roles = Role::getArrayByName();
        $status_cd_list = Code::whereGroup('user_status')->get();

        return view('admin.user.create', compact('roles', 'status_cd_list'));
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

        // 사용자 역활 추가
        foreach ($input['roles'] as $key => $value) {
            $user->attachRole($value);
        }

        //todo 현재 user_extras에 데이터를 저장하는 것이 없기 떄문에, 만약 roles이 엔지니어(5)라면 정비소의 아이디를 가지고 user_extra에 같이 저장한다.



        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            $user->avatar = 1;
            $user->save();
        }

        return redirect()
                        ->route('user.edit', $user->id)
                        ->with('success', trans('admin/user.created'));
    }

    public function edit($id) {
        $user = User::findorFail($id);

        $status_cd_list = Code::whereGroup('user_status')->get();
        $roles = Role::getArrayByName();


        $row = User::select()->join('role_user', function($join){
            $join->on('users.id', '=', 'role_user.user_id')->where('role_id', 4);
        });
//        ->where('users.name', 'like', '%테스터%');

        $garages = [];
        foreach ($row->get() as $garage) {
//            $garages[] = $garage->name;
            $garages[] = array(
                'id'    => $garage->id,
                'name'  => $garage->name
            );
        }

        $userRole = $user->roles->pluck('id', 'name')->toArray();

        return view('admin.user.edit', compact('user', 'roles', 'userRole', 'status_cd_list', 'garages'));
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|dimensions:max_width=500,min_width=100,max_height=500,min_height=100'], [], [
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


        // 아바타 변경
        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            $user->avatar = 1;
            $user->save();
        }

        return redirect()
                        ->route('user.edit', $user->id)
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

}
