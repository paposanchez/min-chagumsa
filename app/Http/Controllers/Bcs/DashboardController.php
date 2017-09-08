<?php

namespace App\Http\Controllers\Bcs;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {
        $lated_post = Post::where('board_id', 4)->orderBy('created_at', 'desc')->where('is_shown', 6)->take(5)->get();
        $lated_order = Order::where('garage_id', Auth::user()->id)->where('status_cd', 107)->orderBy('created_at', 'desc')->take(5)->get();


        $eng_cd = 5; //role 코드가 5


        $lated_engineer = User::orderBy('created_at', 'DESC')->select('users.*')->join('user_extras', function($extra_qry){
            $extra_qry->on('users.id', 'user_extras.users_id');
        })->join('role_user', function($role_user_qry){
            $role_user_qry->on('user_extras.users_id', 'role_user.user_id');
        })->join('roles', function($role_qry){
            $role_qry->on('role_user.role_id', 'roles.id');
        })->where('role_user.role_id', $eng_cd)->where('user_extras.garage_id', Auth::user()->id)->take(5)->get();


        return view('bcs.dashboard.index', compact('post','lated_post', 'lated_order', 'lated_engineer'));
    }
}
