<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder{
    public function run() {
        DB::table('posts')->insert(['board_id' => '1', 'user_id' => '1', 'category_id' =>'1', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다.',
            'content'=>'내용입니다.', 'name'=> '나이름', 'email' =>'test@test.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(['board_id' => '2', 'user_id' => '2', 'category_id' =>'2', 'is_answered' =>'0', 'is_shown'=>'1', 'subject'=>'제목입니다2.',
            'content'=>'내용입니다.2', 'name'=> '너이름', 'email' =>'test2@test2.com', 'password'=>'123', 'hit'=>'0', 'ip'=>'0.0.0.0']);
        DB::table('posts')->insert(["board_id" => 3, "user_id"=>3, "category_id"=>3, "is_answered"=>0, "is_shown"=>1, "subject"=>"차량점검관련 문의 드립니다",
            "content"=> "동해물과 \n백두산이", "name"=>"web_user", "email"=>"antshin@gmail.com", "password"=>1234, "hit"=>0, "ip"=>"192.168.0.1"]);
    }
}












