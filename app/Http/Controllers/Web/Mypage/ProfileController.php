<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller {

    public function index() {
        
//        $profile = Auth::user()->findOrFail(Auth::id());
        $profile = new User();
        
        return view('web.mypage.profile.index', compact('profile'));
    }

}
