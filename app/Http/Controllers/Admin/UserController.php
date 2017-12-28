<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use App\Models\UserExtra;
use DB;
use Hash;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{

        /**
        * @param Request $request
        * 회원 관리 인덱스 페이지
        * 전체 회원을 관리하는 페이지
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
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

                $entrys = $where->paginate(24);
                return view('admin.user.index', compact('entrys', 'search_fields', 'sf', 's', 'role_cd'));
        }

        /**
        * 회원 생성 페이지
        * 각자의 역할을 가진 회원을 생성 할 수 있다.
        * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
        */
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

        /**
        * @param Request $request
        * 회원 생성 메소드
        * @return \Illuminate\Http\RedirectResponse
        */
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

                        $input['users_id'] = $user->id;
                        if (in_array(4, $request->get('roles')) || in_array(5, $request->get('roles'))) {

                                if (in_array(4, $request->get('roles'))) {
                                        if ($request->get('with_eng')) {
                                                $user->attachRole($request->get('with_eng'));
                                        }

                                        // user_extra 데이터 저장 / BCS 저장
                                        $user_extra = UserExtra::where('users_id', $user->id)->first();
                                        if (!$user_extra) {
                                                $user_extra = new UserExtra();
                                        }
                                        $user_extra->users_id = $user->id;
                                        $user_extra->phone = $request->get('garage_tel');
                                        $user_extra->zipcode = $request->get('garage_zipcode');
                                        $user_extra->area = $request->get('garage_area');
                                        $user_extra->section = $request->get('garage_section');
                                        $user_extra->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_address');
                                        $user_extra->address_extra = $request->get('garage_address');
                                        $user_extra->aliance_id = $request->get('aliance_id');
                                        $user_extra->registration_number = $request->get('registration_number');
                                        $user_extra->fax = $request->get('fax');
                                        $user_extra->bcs_bank = $request->get('bank');
                                        $user_extra->bcs_account = $request->get('account');
                                        $user_extra->bcs_account_name = $request->get('owner');
                                        $user_extra->ceo_name = $request->get('name');
                                        $user_extra->ceo_mobile = $request->get('mobile');
                                        $user_extra->save();
                                } else {
                                        // user_extra 데이터 저장
                                        $user_extra = UserExtra::where('users_id', $user->id)->first();
                                        $garage_info = GarageInfo::where('name', $request->get('garage'))->first();
                                        if (!$user_extra) {
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

                        if ($request->file('avatar')) {
                                Image::make($request->file('avatar'))->save($user->getFilesDirectory() . '/avatar.png');
                                $user->avatar = 1;
                                $user->save();
                        }

                        return redirect()
                        ->route('user.index')
                        ->with('success', trans('admin/user.created'));
                }

                /**
                * @param Int $id
                * 회원 수정 페이지
                * 회원의 seq번호를 이용하여 회원정보 노출
                * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
                */
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

                /**
                * @param Request $request
                * @param Int $id
                * 회원 정보 수정 메소드
                * 회원의 seq번호를 이용하여 회원정보 수정
                * @return \Illuminate\Http\RedirectResponse
                */
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

                                // 역할 갱신
                                if ($user->id != 1) {
                                        DB::table('role_user')->where('user_id', $id)->delete();
                                        foreach ($input['roles'] as $key => $value) {
                                                $user->attachRole($value);
                                        }
                                }

                                if (in_array(4, $request->get('roles')) || in_array(5, $request->get('roles'))) {
                                        if (in_array(4, $request->get('roles'))) {

                                                if ($request->get('with_eng')) {
                                                        $eng_role = RoleUser::where('user_id', $id)->where('role_id', 5)->delete();
                                                        $user->attachRole($request->get('with_eng'));
                                                }

                                                // user_extra 데이터 저장 / BCS 저장
                                                $user_extra = UserExtra::where('users_id', $user->id)->first();
                                                if (!$user_extra) {
                                                        $user_extra = new UserExtra();
                                                }
                                                $user_extra->users_id = $user->id;
                                                $user_extra->phone = $request->get('garage_tel');
                                                $user_extra->zipcode = $request->get('garage_zipcode');
                                                $user_extra->area = $request->get('garage_area');
                                                $user_extra->section = $request->get('garage_section');
                                                $user_extra->address_extra = $request->get('garage_address');
                                                $user_extra->address = $request->get('garage_area')." ".$request->get('garage_section')." ".$request->get('garage_address'); // 정비소 나머지 주소
                                                $user_extra->aliance_id = $request->get('aliance_id');
                                                $user_extra->registration_number = $request->get('registration_number');
                                                $user_extra->fax = $request->get('fax');
                                                $user_extra->bcs_bank = $request->get('bank');
                                                $user_extra->bcs_account = $request->get('account');
                                                $user_extra->bcs_account_name = $request->get('owner');
                                                $user_extra->ceo_name = $request->get('garage_name');
                                                $user_extra->ceo_mobile = $request->get('mobile');
                                                $user_extra->save();

                                        }else{

                                                $my_extra = UserExtra::where('users_id', $user->id)->first();

                                                if($my_extra->garage->name != $request->get('garage')){
                                                        // user_extra 데이터 저장
                                                        $user_extra = UserExtra::where('users_id', $user->id)->first();
                                                        $garage_info = UserExtra::where('users_id', $request->get('garage'))->first();
                                                        if(!$user_extra){
                                                                $user_extra = new UserExtra();
                                                        }
                                                        $user_extra->users_id = $user->id;
                                                        $user_extra->phone = $request->get('mobile');
                                                        $user_extra->zipcode = $garage_info->tel;
                                                        $user_extra->address = $garage_info->address;
                                                        $user_extra->address_extra = $garage_info->address_extra;
                                                        $user_extra->garage_id = $garage_info->users_id;
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

                        /**
                        * @param Request $request
                        * @param Int $id
                        * 회원 삭제 메소드
                        * 회원의 seq를 이용하여 회원의 정보를 삭제
                        * 계정삭제에 대한 정책이 없으므로 현재 비활성으로 대체 중
                        * @return \Illuminate\Http\RedirectResponse
                        */
                        public function destroy(Request $request, $id)
                        {
                                //todo 계정삭제에 대한 정책이 필요하므로 일단은 삭제코드를 그대로 둔다.
                                $user = User::findOrFail($id);

                                // 회원일때
                                $order = Order::where('orderer_id', $user->id)->whereIn('status_cd', [105,106,107])->get();

                                if(count($order) > 0){
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

                        /**
                        * @param Request $request
                        * 정비소 리스트 호출 메소드
                        * 엔지니어 선택시 설정 가능한 BCS 리스트 호출 메소드
                        * @return string
                        */
                        public function searchGarage(Request $request)
                        {
                                $garages = User::where('name', 'like', '%' . $request->get('garage_name') . '%')
                                ->join('role_user', function($join){
                                        $join->on('users.id', '=', 'role_user.user_id')
                                        ->where('role_user.role_id', 4);
                                })->get();
                                if ($garages) {
                                        $json = $garages;
                                } else {
                                        $json = [];
                                }
                                return \GuzzleHttp\json_encode($json);
                        }

                }
