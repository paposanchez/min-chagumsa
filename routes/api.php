<?php

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

//Route::get('/', "DashboardController");
//Route::get('/', function (Request $request) {
//    return response()->json([
//                "SERVICE" => config('app.domain'),
//                "VERSION" => config('api.VERSION'),
//    ]);
//});
//
//Route::group(['middleware' => ['auth:api']], function () {


Route::get('/posts/{board_id}/{page?}/{num_post?}/', "PostController@getPosts");
Route::get('/post/{board_id}/{id}', "PostController@getPost");

Route::group(['middleware' => ['web']], function () {
    Route::post('/login', "UserController@login");
    Route::get('/user/{user_id?}', "UserController@user");
    Route::post('/logout', "UserController@logout");
});

//});

