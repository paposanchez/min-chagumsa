<?php

namespace App\Http\Controllers\Technician;

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

use Illuminate\Support\Facades\Validator;
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
    public function edit()
    {
        //
        $user = User::findorFail(Auth()->user()->id);

        // engineer의 정비소 출력
        $user_extras = UserExtra::where('users_id', $user->id)->first();
        if(!$user_extras){
            $user_extras = new UserExtra();
        }



        return view('technician.user.edit', compact('user', 'user_extras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = Auth::user();
        if(!$user){
            return redirect()->back()->with('error', '사용자 정보를 찾지 못하였습니다.');
        }

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required'
        ]);
        if ($validate->fails())
        {
            return redirect()->back()->with('error', "회원정보 수정을 할수 없습니다.");
        }

        if($request->get('mobile')){
            $user->mobile = $request->get('mobile');
        }
        if($request->get('name')){
            $user->name = $request->get('name');
        }

        try{
            $user->save();


            $event = 'success';
            $message = '회원정보 갱신이 완료되었습니다.';
        }catch (\Exception $e){
            $event = 'error';
            $message = '회원정보 갱신이 실패하였습니다.';
        }
        $user->save();
//        throw new \Exception($b);
        return redirect()->back()->with($event, $message);
    }

    public function passUpdate(Request $request){

        $user = Auth::user();
        if(!$user){
            return redirect()->back()->with('error', '사용자 정보를 찾지 못하였습니다.');
        }

        $validate = Validator::make($request->all(), [
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);
        if ($validate->fails())
        {
            return redirect()->back()->with('error', "비밀번호 수정을 할수 없습니다.");
        }

        if($request->get('password') != $request->get("password_confirmation")){
            return redirect()->back()->with('error', "입력된 확인 비밀번호가 틀립니다.");
        }

        $user->password = bcrypt($request->get('password'));
        try{
            $user->save();
            $event = 'success';
            $message = '비밀번호가 갱신 되었습니다.';
        }catch (\Exception $e){
            $event = 'error';
            $message = '비밀번호 갱신을 실패하였습니다.';
        }

        return redirect()->back()->with($event, $message);
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


}
