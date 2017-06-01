<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder{
    public function run() {
        DB::table('posts')->insert(['board_id' => '1', 'user_id' => '1', 'category_id' =>'1', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다.',
            'content'=>'내용입니다.', 'name'=> '나이름', 'email' =>'test@test.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '2', 'user_id' => '2', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다2.',
            'content'=>'내용입니다.2', 'name'=> '너이름', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);

        DB::table('posts')->insert(['board_id' => '3', 'user_id' => '3', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다3.',
            'content'=>'내용입니다.3', 'name'=> '마동석', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '4', 'user_id' => '4', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다4.',
            'content'=>'내용입니다.4', 'name'=> '김영철', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '5', 'user_id' => '5', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다5.',
            'content'=>'내용입니다.5', 'name'=> '허경환', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '6', 'user_id' => '6', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다6.',
            'content'=>'내용입니다.6', 'name'=> '조성모', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '7', 'user_id' => '7', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다7.',
            'content'=>'내용입니다.7', 'name'=> '조인성', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '8', 'user_id' => '8', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다8.',
            'content'=>'내용입니다.8', 'name'=> '강동건', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '9', 'user_id' => '9', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다9.',
            'content'=>'내용입니다.9', 'name'=> '김우빈', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '10', 'user_id' => '10', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다10.',
            'content'=>'내용입니다.10', 'name'=> '김현철', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '11', 'user_id' => '11', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다11.',
            'content'=>'내용입니다.11', 'name'=> '강민경', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '12', 'user_id' => '12', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다12.',
            'content'=>'내용입니다.12', 'name'=> '박보영', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '13', 'user_id' => '13', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다13.',
            'content'=>'내용입니다.13', 'name'=> '김민희', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
    }
}












