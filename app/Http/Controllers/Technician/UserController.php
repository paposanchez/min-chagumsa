<?php

namespace App\Http\Controllers\Technician;

use App\Models\User;
use App\Models\UserExtra;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
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
     * @param Request $request
     * 기술사 정보 수정
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|same:password',
        ]);
        if ($validate->fails())
        {
            return redirect()->back()->with('error', "회원정보 수정을 할수 없습니다.");
        }

        $input = $request->all();

        try{
            // 비밀번호 변경
            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input = array_except($input, array('password'));
            }

            $user = Auth::user();
            $user->update($input);

            $event = 'success';
            $message = '회원정보 갱신이 완료되었습니다.';
        }catch (\Exception $e){
            $event = 'error';
            $message = '회원정보 갱신이 실패하였습니다.';
        }



        // 아바타 변경
        if ($request->file('avatar')) {
            Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');

            $user->avatar = 1;
            $user->save();
        }

        return redirect()
            ->route('technician.user.edit')
            ->with($event, $message);


    }
}
