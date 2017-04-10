<?php

namespace App\Http\Controllers\Web\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    public function index() {
        
        $profile = Auth::user()->findOrFail(Auth::id());
        
        return view('web.mypage.profile.index', compact('profile'));
    }

}
