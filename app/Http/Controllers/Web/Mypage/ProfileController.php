<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
//use GuzzleHttp\Psr7\Request;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mockery\Exception;


class ProfileController extends Controller {

    public function index() {
        
//        $profile = Auth::user()->findOrFail(Auth::id());
        $profile = User::where("email", Auth::user()->email)->first();
        
        return view('web.mypage.profile.index', compact('profile'));
    }

    /**
     * 비밀번호 갱신
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){

        $where = User::findOrFail($request->id);
        if($where->email == $request->get('email')){
            $pwd_crypt = bcrypt($request->get('old_password'));
            if(Auth::attempt(array('email' => $request->get('email'), 'password' => $request->get('old_password')))){
                //update
                $where->password = bcrypt($request->password);
                $where->save();

                return redirect('/');
//                return redirect()
//                    ->route('mypage.profile.index');
            }else{
                throw new Exception('invalid password');
            }
        }else{
            throw new Exception('invalid email');
        }

    }

    public function chkPwd(Request $request){

        $where = User::where('email', $request->get('email'))->first();

        if($where){
            $pwd_crypt = bcrypt($request->get('old_password'));

            if(Auth::attempt(array('email' => $request->get('email'), 'password' => $request->get('old_password')))){
                $result = true;
            }else{
                $result = false;
            }

        }else{
//            throw new Exception("잘못된 접근입니다.");
            $result = false;
        }


        return \response()->json($result);
    }


    public function leaveForm(){
        $profile = Auth::user();
        return view('web.mypage.profile.leave', compact('profile'));
    }

    public function leave(Request $request) {

        $user = Auth::user();
//        $date = Carbon::now();
//        $user -> deleted_at = $date;

//        $user -> save();
            $user->delete();
//        return redirect('/')->with('success', '회원탈퇴처리가 정상적으로 이루어졌습니다.');
        return redirect()->route('logout')->with('success', '회원탈퇴처리가 정상적으로 이루어졌습니다.');
    }

}
