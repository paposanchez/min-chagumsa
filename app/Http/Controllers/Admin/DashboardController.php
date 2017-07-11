<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {

//        $handler = new \App\Models\UserSequence();
//        $garage_id = $handler->setNewGarageSeq(1);
//        $garage_id = $handler->setNewGarageSeq(3);
//        $garage_id = $handler->setNewGarageSeq(6);
//        $handler->setNewEngineerSeq(2, 1);
//        $handler->setNewEngineerSeq(4, 1);
//        $handler->setNewEngineerSeq(5, 1);

        $qna = Post::where('category_id', '2')->orderBy('created_at', 'desc')->take(5)->get();
        $lated_post = Post::where('category_id', '1')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard.index', compact('post', 'qna', 'lated_post'));
    }

}
