<?php

namespace App\Http\Controllers\Bcs;

use App\Models\GarageInfo;
use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use App\Models\UserExtra;
use App\Models\UserSequence;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Bcs
 * todo BCS 엔지니어관리 구성 처리해야함
 */

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $where = User::orderBy('id', 'DESC');
        $eng_cd = 5; //role 코드가 5


        $where = User::select('users.*')->join('user_extras', function($extra_qry){
            $extra_qry->on('users.id', 'user_extras.users_id');
        })->join('role_user', function($role_user_qry){
            $role_user_qry->on('user_extras.users_id', 'role_user.user_id');
        })->join('roles', function($role_qry){
            $role_qry->on('role_user.role_id', 'roles.id');
        })->where('role_user.role_id', $eng_cd)->where('user_extras.garage_id', Auth::user()->id);


        $search_fields = [ "name" => "이름", "mobile" => "전화번호" ];

        //  이름 & 전화번호 검색
        $s = $request->get('s');
        $sf = $request->get('sf');


        if($s){
            $where = $where->where('users.'.$sf, $s);
        }


        $entrys = $where->paginate(25);
        return view('bcs.user.index', compact('entrys','search_fields'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bcs.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'name' => 'required|min:2',
            'mobile' => 'min:2',

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
        $garage_id = Auth::user()->id;

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        // 사용자 역활 추가, role_user 테이블
        $user->attachRole(5);


        // user_extra 데이터 저장
        $user_extra = UserExtra::where('users_id', $user->id)->first();
        $garage_info = GarageInfo::where('garage_id', $garage_id)->first();
        if(!$user_extra){
            $user_extra = new UserExtra();
        }
        $user_extra->users_id = $user->id;
        $user_extra->phone = $request->get('mobile');
        $user_extra->zipcode = $garage_info->zipcode;
        $user_extra->address = $garage_info->address;
        $user_extra->address_extra = $garage_info->name;
        $user_extra->garage_id = $garage_id;
        $user_extra->save();

        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
            $user->avatar = 1;
            $user->save();
        }

        return redirect()
            ->route('bcs.user.index')
            ->with('success', trans('bcs/user.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User::findorFail($id);

//        $status_cd_list = Code::whereGroup('user_status')->get();

//        $roles = Role::getArrayByName();

//        $aliances = User::select()->join('role_user', function($join){
//            $join->on('users.id', '=', 'role_user.user_id')->where('role_id', 3);
//        })->orderBy('name')->pluck('name', 'id');

        $garage = GarageInfo::where('garage_id', $user->user_extra->garage_id)->first();

//        $userRole = $user->roles->pluck('id', 'name')->toArray();

//        // engineer의 정비소 출력
//        $user_extras = UserExtra::where('users_id', $user->id)->first();
//        if(!$user_extras){
//            $user_extras = new UserExtra();
//        }
//
//        // garage의 정보 및 network 정보
//        $garage_info = GarageInfo::where('garage_id', $user->id)->first();
//        if(!$garage_info){
//            $garage_info = new GarageInfo();
//        }


        return view('bcs.user.edit', compact('user', 'garage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'name' => 'required|min:2',
            'mobile' => 'min:2',

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


        // 아바타 변경
        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            $user->avatar = 1;
            $user->save();
        }

        return redirect()
            ->route('bcs.user.index', $user->id)
            ->with('success', trans('bcs/user.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id != 1) {

            DB::table('role_user')->where('user_id', $id)->delete();
            $user->delete();

            return redirect()
                ->route('user.index')
                ->with('success', trans('bcs/user.destroyed'));
        } else {
            return redirect()
                ->route('user.index')
                ->with('success', trans('bcs/user.can_not_destroyed'));
        }
    }

}
