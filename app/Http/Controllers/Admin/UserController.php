<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\RoleUser;
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

class UserController extends Controller
{

    public function index(Request $request)
    {
        $where = User::orderBy('id', 'DESC');

        $role_cd = $request->get('role_cd');

        $search_fields = [
            "name" => "이름", "email" => "이메일"
        ];

        if ($role_cd) {
            $where->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_user.role_id', '=', $role_cd);
        }

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if ($sf && $s) {
            $where->where($sf, 'like', '%' . $s . '%');
        }

        $entrys = $where->paginate(25);
        return view('admin.user.index', compact('entrys', 'search_fields', 'sf', 's', 'role_cd'));
    }

    public function create()
    {
        $roles = Role::getArrayByNameNotMember();
        $status_cd_list = Code::whereGroup('user_status')->get();

        $aliances = User::select()->join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')->where('role_id', 3);
        })->orderBy('name')->pluck('name', 'id');

        $garages = Role::find(4)->users;

        return view('admin.user.create', compact('roles', 'status_cd_list', 'garages', 'aliances'));
    }

    public function store(Request $request)
    {

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
        foreach ($input['roles'] as $key => $value) {
            $user->attachRole($value);
        }
        if ($request->get('with_eng')) {
            $user->attachRole(5);
        }

        $input['users_id'] = $user->id;
        $user->user_extra()->create($input);

        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
            $user->avatar = 1;
            $user->save();
        }

        return redirect()
            ->route('user.index')
            ->with('success', trans('admin/user.created'));
    }

    public function edit($id)
    {

        $user = User::findorFail($id);

        $status_cd_list = Code::whereGroup('user_status')->get();

        $roles = Role::getArrayByName();

        $aliances = Role::find(3)->users->pluck('name', 'id');

        $garages = Role::find(4)->users;

        $userRole = $user->roles->pluck('id', 'name')->toArray();

        return view('admin.user.edit', compact('user', 'roles', 'userRole', 'status_cd_list', 'garages', 'aliances'));
    }

    public function update(Request $request, $id)
    {
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'],
            [],
            [
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


        // 롤갱신
        if ($user->id != 1) {
            DB::table('role_user')->where('user_id', $id)->delete();
            foreach ($input['roles'] as $key => $value) {
                $user->attachRole($value);
            }
        }


        $user->user_extra->update($input);


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

    //todo 계정삭제에 대한 정책이 필요하므로 일단은 삭제코드를 그대로 둔다.
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // 회원일때
        $order = Order::where('orderer_id', $user->id)->whereIn('status_cd', [105,106,107])->get();
        if($order){
            return redirect()->back()->with('error', '진행중인 주문이 있어 탈퇴가 불가능합니다. 관리자에게 문의하세요.');
        }


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

    public function searchGarage(Request $request)
    {
        $garage = GarageInfo::where('name', 'like', '%' . $request->get('garage_name') . '%');

        if ($garage) {
            $json = $garage->get()->toArray();
        } else {
            $json = [];
        }

        return \GuzzleHttp\json_encode($json);
    }

}
