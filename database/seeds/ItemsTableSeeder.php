<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '인증서 1',
                'price' => 100000,
            'layout' => '{"id":1,"table":"items","status":104,"entrys":[{"group":"diagnosis_info","name":"\\uc790\\ub3d9\\ucc28 \\ub4f1\\ub85d\\uc815\\ubcf4","save_table":"diagnosises","total":4,"completed":0,"has_child":true,"entrys":[{"key":1077,"name":"\\uc815\\ubcf4\\uc0ac\\uc9c4","save_table":"diagnosis_details","summery":"","code_title":"","code":[],"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\uc790\\ub3d9\\ucc28\\ub4f1\\ub85d\\uc99d \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"},{"\\ub450\\ubc88\\uca30":"","placeholder":"\\uc8fc\\ud589\\uac70\\ub9ac\\uacc4 \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""},{"key":1078,"name":"\\ucc28\\ub300\\ubc88\\ud638","save_table":"diagnosis_details","summery":"","code_title":"","code":{"1144":"\\uc591\\ud638","1145":"\\uc0c1\\uc774","1146":"\\ubd80\\uc2dd","1147":"\\ud6fc\\uc190(\\uc624\\uc190)","1148":"\\ubcc0\\ud0c0"},"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\ucc28\\ub300\\ubc88\\ud638 \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""},{"key":1079,"name":"\\uc0c9\\uc0c1","save_table":"diagnosis_details","summery":"","code_title":"","code":{"1149":"\\ud770\\uc0c9","1150":"\\uac80\\uc815","1151":"\\ud68c\\uc0c9","1152":"\\uc801\\uc0c9","1153":"\\uccad\\uc0c9","1154":"\\uae30\\ud0c0"},"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\ucc28\\ub7c9\\uc0c9\\uc0c1 \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""},{"key":1080,"name":"\\ucd94\\uac00 \\uc635\\uc158","save_table":"diagnosis_details","summery":"\\uc804\\uccb4 \\uc591\\ud638\\uac00 \\uc544\\ub2cc \\uacbd\\uc6b0, \\uc0c1\\ud0dc \\uc774\\ub825 \\uc788\\uc74c\\uc744 \\uc120\\ud0dd\\ud558\\uc5ec \\uc0c1\\ud0dc \\ubcc4 \\ubd80\\uc704\\ub97c \\uc120\\ud0dd\\ud558\\uc138\\uc694. \\uc5ec\\ub7ec\\uac00\\uc9c0 \\uc0c1\\ud0dc\\ub97c \\uc120\\ud0dd \\ud560 \\uc218 \\uc788\\uc2b5\\ub2c8\\ub2e4.","code_title":"\\uc81c\\ub17c \\ud5e4\\ub4dc\\ub7a8\\ud504 (HID)","code":{"1155":"\\uc591\\ud638","1156":"\\uc218\\ub9ac\\ud544\\uc694","1157":"\\uc5c6\\uc74c"},"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\uc635\\uc158 \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""}]},{"group":"diagnosis_exterior","name":"\\uc8fc\\uc694 \\uc678\\ud310","save_table":"diagnosis_exterior","total":3,"completed":0,"has_child":true,"entrys":[{"key":1084,"name":"\\uc678\\ud310\\uc0ac\\uc9c4","save_table":"diagnosis_details","summery":"","code_title":"","code":[],"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\uc804\\ubc29\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"},{"\\ub450\\ubc88\\uca30":"","placeholder":"\\ud6c4\\ubc29\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"},{"\\uc138\\ubc88\\uca30":"","placeholder":"\\uc88c\\uce21\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"},{"\\ub124\\ubc88\\uca30":"","placeholder":"\\uc6b0\\uce21\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""},{"key":1085,"name":"\\uc8fc\\uc694 \\uc678\\ud310 \\uc0c1\\ud0dc","save_table":"diagnosis_details","summery":"\\uc804\\uccb4 \\uc591\\ud638\\uac00 \\uc544\\ub2cc \\uacbd\\uc6b0, \\uc0c1\\ud0dc\\uc774\\ub825 \\uc788\\uc74c\\uc744 \\uc120\\ud0dd\\ud558\\uc5ec \\uc0c1\\ud0dc\\ubcc4 \\ubd80\\uc704\\ub97c \\uc120\\ud0dd\\ud558\\uace0 \\ud574\\ub2f9 \\ubd80\\uc704\\uc5d0 \\ub300\\ud55c \\uc99d\\ube59\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694.","code_title":"","code":{"1158":"\\uc804\\uccb4 \\uc591\\ud638","1159":"\\uc0c1\\ud0dc\\uc774\\ub825 \\uc788\\uc74c"},"picture":[],"selected":"","left_check":[{"1163":[]},{"1165":[]},{"1167":[]},{"1169":[]},{"1171":[]}],"center_check":[{"1175":[]},{"1173":[]},{"1174":[]}],"right_check":[{"1164":[]},{"1166":[]},{"1168":[]},{"1170":[]},{"1172":[]}]},{"key":1075,"name":"\\uc810\\uac80\\uc758\\uacac","save_table":"diagnosis_details","summery":"\\uc8fc\\uc694 \\uc678\\ud310\\uc5d0 \\ub300\\ud55c \\uc804\\ubc18\\uc801\\uc778 \\uc810\\uac80\\uc758\\uacac\\uc744 \\ub179\\uc74c\\ud558\\uc138\\uc694.","code_title":"","code":[],"picture":[],"selected":"","sound":true}]},{"group":[],"name":"\\uc8fc\\uc694 \\ub0b4\\ud310","save_table":"diagnosis_exterior","total":3,"completed":0,"has_child":true,"entrys":[{"key":1088,"name":"\\ud558\\ub2e8 \\uc0ac\\uc9c4","save_table":"diagnosis_details","summery":"","code_title":"","code":[],"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\ucc28\\ub7c9\\uce90\\ub9ac\\uc5b4\\ub97c \\ud1b5\\ud574 \\ud558\\ub2e8 \\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694"}],"selected":""},{"key":1089,"name":"\\uc8fc\\uc694 \\ub0b4\\ud310 \\uc0c1\\ud0dc","save_table":"diagnosis_details","summery":"\\uc804\\uccb4 \\uc591\\ud638\\uac00 \\uc544\\ub2cc \\uacbd\\uc6b0, \\uc0c1\\ud0dc\\uc774\\ub825 \\uc788\\uc74c\\uc744 \\uc120\\ud0dd\\ud558\\uc5ec \\uc0c1\\ud0dc\\ubcc4 \\ubd80\\uc704\\ub97c \\uc120\\ud0dd\\ud558\\uace0 \\ud574\\ub2f9 \\ubd80\\uc704\\uc5d0 \\ub300\\ud55c \\uc99d\\ube59\\uc0ac\\uc9c4\\uc744 \\ucd94\\uac00\\ud558\\uc138\\uc694.","code_title":"","code":{"1158":"\\uc804\\uccb4 \\uc591\\ud638","1159":"\\uc0c1\\ud0dc\\uc774\\ub825 \\uc788\\uc74c"},"picture":[],"selected":""},{"key":1075,"name":"\\uc810\\uac80\\uc758\\uacac","save_table":"diagnosis_details","summery":"\\uc8fc\\uc694 \\uc678\\ud310\\uc5d0 \\ub300\\ud55c \\uc804\\ubc18\\uc801\\uc778 \\uc810\\uac80\\uc758\\uacac\\uc744 \\ub179\\uc74c\\ud558\\uc138\\uc694.","code_title":"","code":[],"picture":[],"selected":"","sound":true}]},{"group":[],"name":"\\uc0ac\\uace0\\uc720\\ubb34 \\uc810\\uac80","save_table":"diagnosis_exterior","total":2,"completed":0,"has_child":true,"entrys":[{"key":1094,"name":"\\uc0ac\\uace0\\uc720\\ubb34","save_table":"diagnosis_details","summery":"","code_title":"","code":{"1200":"\\uc218\\ub9ac \\uc774\\ub825 \\uc5c6\\uc74c","1201":"\\ub2e8\\uc21c\\uc678\\ud310 \\uad50\\ud658","1202":"\\uc8fc\\uc694 \\uace8\\uaca9 \\uc218\\ub9ac"},"picture":[{"\\uccab\\ubc88\\uca30":"","placeholder":"\\uc99d\\ube59\\uc0ac\\uc9c4"}],"selected":""},{"key":1075,"name":"\\uc810\\uac80\\uc758\\uacac","save_table":"diagnosis_details","summery":"\\uc8fc\\uc694 \\uc678\\ud310\\uc5d0 \\ub300\\ud55c \\uc804\\ubc18\\uc801\\uc778 \\uc810\\uac80\\uc758\\uacac\\uc744 \\ub179\\uc74c\\ud558\\uc138\\uc694.","code_title":"","code":[],"picture":[],"selected":"","sound":true}]}]}',
                'created_id' => 1,
                'created_at' => '2017-06-09 16:00:07',
                'updated_at' => '2017-06-13 15:05:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '인증서 2',
                'price' => 200000,
                'layout' => '2',
                'created_id' => 2,
                'created_at' => '2017-06-09 16:00:07',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}