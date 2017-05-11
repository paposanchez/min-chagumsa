<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Class UserJson {
    
}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    
    
    
    
    
    return $request->user();
    
});





Route::get('login/{id?}', function($id = Null){
//    if($id){
//        $user = \App\Models\User::finde($id);
//    }else{
//        $user = \App\Models\User::all();
//    }
    //    return view('web.mypage.index')->with('user', $user);
    $user = \App\Models\User::all();
    $loginRepository = $user;

    return $user;
});

//추후 수정
//대시보드 화면
Route::get('/test', function(){
    $post = \App\Models\Post::all();
    $order = \App\Models\Order::all();
/*
//    $inquireRepository = $post->select('id', 'is_answerd','subject', 'created_at')->where('category_id', 1)->limit(5);
//    $noticeRepository = $post->select('id','category_id','subject', 'created_at')->limit(5);
//    $orderRepository = $order->select('id', 'orderer_name', 'created_at')->limit(5);
    //결제금액은 subquery 로 가져와야 된다
    return ['post'=>$post, 'order'=>$order];
*/

});

//추후 수정
//mypage 회원정보
Route::get('/mypage/{id?}', function($id = Null){
    return \App\Models\User::find($id);
});

//추후 수정
//정비소 위치 및 주소 선택
Route::get('mypage/address/{address?}', function($address = Null){
    //daum API 사용
});

//주문관리 목록
Route::get('/order/{page?}/{order?}', function($page = Null, $order= Null){
    $orderList = \App\Models\Order::where('page', $page)->where('id', $order);
    $orderListRepository = $orderList->select('id', 'status_cd', 'orderere_name', 'orderer_mobile', 'created_at', 'agent_id', '정비사', '기술사');
    //페이지번호, 총 페이지 번

    return $orderListRepository->toArray();
});

//주문 상세
Route::get('/order/view/{order?}', function($order = Null){
    $orderView = \App\Models\Order::find($order);
    $orderDetailRepository = $orderView->select('id', '기본정보', '주요외판', '주요내판/골격', '사고수리/상태', '');
    return $orderDetailRepository->toArray();
});

Route::get('/board/{page?}/{category?}', function($page = null, $category = null){
    $settingListRepository = \App\Models\Post::where('category_id', $category);
    return $settingListRepository->toArray();
});

Route::get('/board/view/{board_id?}', function($board_id = Null){
    $settingDetailRepository = \App\Models\Post::find($board_id);
    return $settingDetailRepository->toArray();
});

Route::get('/board/view/edit/{board_id?}', function($board_id = Null){
    $settingDetailRepository = \App\Models\Post::find($board_id);
    return $settingDetailRepository->toArray();
});

Route::get('/setting/{page?}/{name?}', function($page = Null, $name = Null){
    $settingNotiListRepository = \App\Models\Board::where('name',$name);
    return $settingNotiListRepository->toArray();
});

Route::get('/setting/edit/{id?}', function($id = Null){
    $settingNotiListRepository = \App\Models\Board::find($id);
    return $settingNotiListRepository->toArray();
});

Route::get('/setting/add', function(){
    $settingNotiListRepository = \App\Models\Board::all();
    return $settingNotiListRepository->toArray();
});