<?php

use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('boards')->delete();
        
        \DB::table('boards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '공지사항',
                'use_secret' => 0,
                'use_captcha' => 0,
                'use_comment' => 0,
                'use_opinion' => 0,
                'use_tag' => 0,
                'use_category' => 0,
                'use_upload' => 0,
                'use_thumbnail' => 0,
                'upload_max_filesize' => 0,
                'upload_max_limit' => 0,
                'status_cd' => 3,
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'FAQ',
                'use_secret' => 0,
                'use_captcha' => 0,
                'use_comment' => 0,
                'use_opinion' => 0,
                'use_tag' => 0,
                'use_category' => 0,
                'use_upload' => 0,
                'use_thumbnail' => 0,
                'upload_max_filesize' => 0,
                'upload_max_limit' => 0,
                'status_cd' => 3,
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '자유게시판',
                'use_secret' => 0,
                'use_captcha' => 0,
                'use_comment' => 0,
                'use_opinion' => 0,
                'use_tag' => 0,
                'use_category' => 0,
                'use_upload' => 0,
                'use_thumbnail' => 0,
                'upload_max_filesize' => 0,
                'upload_max_limit' => 0,
                'status_cd' => 3,
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}