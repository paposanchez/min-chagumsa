<?php
// Avatar
Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");


// 공통
// Route::get('thumbnail/{id?}', 'ImageController@thumbnail')->name("thumbnail");
// Route::get('avatar/{user_id?}', 'ImageController@avatar')->name("avatar");
