<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
//use GuzzleHttp\Psr7\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mockery\Exception;
use Hash;


class ProfileController extends Controller
{

        public function index()
        {
                $profile = User::where("email", Auth::user()->email)->first();
                return view('web.mypage.profile.index', compact('profile'));
        }

        /**
        * 비밀번호 갱신
        * @param Request $request
        * @return \Illuminate\Http\RedirectResponse
        */
        public function store(Request $request)
        {

                // 사용자명 변경
                if($request->get('name'))
                {

                        $validator = $this->validate($request, [
                                'name' => 'required'
                        ], [
                                'name.required' => '사용하실 이름을 입력하세요.',
                        ]);

                        $user = User::findOrFail(Auth::id());
                        $user->name = $request->get('name');
                        $user->save();
                        return redirect("/mypage/profile")->with("success", "회원정보가 변경되었습니다.");
                }

                //  패스워드 변경
                //@TODO 이럴거면 현재 패스워드는 왜 받나
                if($request->get('password'))
                {

                        $this->validate($request, [
                                'old_password' => 'required',
                                'password' => 'required|same:password',
                                'password_confirmation' => 'required|same:password',
                        ], [
                                'old_password.required' => '현재 비밀번호를 입력하세요.',
                                'password.required' => '비밀번호를 입력하세요',
                        ]);

                        $user = User::findOrFail(Auth::id());

                        if (Hash::check($request->get('old_password'), $user->password)) {

                                $user->password = bcrypt($request->password);
                                $user->save();

                                return redirect("/mypage/profile")->with("success", "비밀번호가 변경되었습니다.");
                        }else{
                                return redirect("/mypage/profile")->with("error", "현재 비밀번호를 확인하세요.");
                        }

                }
        }

        public function leaveForm()
        {
                $profile = Auth::user();
                //@TODO 현재 주문완료상태 입고대기등의 진행중인 주문이 잇는 경우 탈퇴불가
                $order = Order::where('orderer_id', Auth::user()->id)->whereIn('status_cd', [105,106,107])->get();
                if($order){
                        return redirect("/mypage/profile")->with('error', '진행중인 주문이 있어 탈퇴가 불가능합니다. 관리자에게 문의하세요.');
                }

                return view('web.mypage.profile.leave', compact('profile'));
        }

        public function leave(Request $request)
        {
                $user = Auth::user();
                $user->delete();

                return redirect('logout');
        }

}
