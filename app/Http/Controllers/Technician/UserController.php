<?php

namespace App\Http\Controllers\Technician;

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

        $role_cd = $request->get('role_cd');

        if($role_cd){
            $where = $where->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_user.role_id', '=', $role_cd);
        }

        $entrys = $where->paginate(25);
        return view('technician.user.index', compact('entrys'));

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
        //

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


        return view('technician.user.edit', compact('user', 'roles', 'userRole', 'status_cd_list', 'garages', 'aliances', 'user_extras', 'garage_info'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * bcs 회원정보 수정
     * todo 회원수정 정보를 구성해야함
     * @param Request $request
     */
    public function bscInfo(Request $request){

        return view("bcs.user.bcs-info");
    }

    /**
     * BCS 회원정보 수정
     * @param Request $request
     */
    public function bcsStore(Request $request){

    }
}
