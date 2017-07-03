<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'BMW',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'GM',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'GMC',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '기아',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '기타 수입차',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '닛산',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '다이하쓰',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '닷지',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '도요타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '란치아',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '람보르기니',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '랜드로버',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '렉서스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '로버',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '로터스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '롤스로이스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '르노',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '르노삼성',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '링컨',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '마세라티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '마쯔다',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '맥라렌',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '머큐리',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '미니',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '미쓰비시',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '미쯔오카',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '벤츠',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '벤틀리',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '볼보',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '부가티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '북기은상',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => '뷰익',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => '비이스만',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => '사브',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => '새턴',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => '쉐보레',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => '쉐보레/대우',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => '스바루',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => '스즈키',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => '스카니아',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => '스파이커',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => '시트로엥',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => '쌍용',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => '아우디',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => '알파로메오',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => '애스턴마틴',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => '어울림모터스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => '어큐라',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => '오스틴',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => '오펠',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => '올즈모빌',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => '웨스트필드',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => '이스즈',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => '인피니티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => '재규어',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => '제네시스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => '지프',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => '캐딜락',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => '코닉세크',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => '크라이슬러',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => '테슬라',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => '파가니',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => '페라리',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => '포드',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => '포르쉐',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => '포톤',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => '폭스바겐',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => '폰티악',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => '푸조',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => '피스커',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => '피아트',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => '허머',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => '현대',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => '혼다',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => '홀덴',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}