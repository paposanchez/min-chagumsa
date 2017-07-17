<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('models')->delete();
        
        \DB::table('models')->insert(array (
            0 => 
            array (
                'id' => 1,
                'brands_id' => 58,
                'name' => '랭글러',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'brands_id' => 58,
                'name' => '레니게이드',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'brands_id' => 58,
                'name' => '체로키',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'brands_id' => 58,
                'name' => '리버티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'brands_id' => 58,
                'name' => '컴패스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'brands_id' => 58,
                'name' => '커맨더',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'brands_id' => 58,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'brands_id' => 58,
                'name' => '패트리어트',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'brands_id' => 74,
                'name' => '트럭',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'brands_id' => 74,
                'name' => '에어로',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'brands_id' => 74,
                'name' => '코러스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'brands_id' => 74,
                'name' => '프레스토',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'brands_id' => 74,
                'name' => '아반떼',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'brands_id' => 74,
                'name' => '아슬란',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'brands_id' => 74,
                'name' => '아이오닉',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'brands_id' => 74,
                'name' => '아토스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'brands_id' => 74,
                'name' => '싼타모',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'brands_id' => 74,
                'name' => '싼타페',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'brands_id' => 74,
                'name' => '쏘나타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'brands_id' => 74,
                'name' => '쏠라티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'brands_id' => 74,
                'name' => '티뷰론',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'brands_id' => 74,
                'name' => '포니',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'brands_id' => 74,
                'name' => '트라제XG',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'brands_id' => 74,
                'name' => '포터',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'brands_id' => 74,
                'name' => '투싼',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'brands_id' => 74,
                'name' => '에쿠스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'brands_id' => 74,
                'name' => '테라칸',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'brands_id' => 74,
                'name' => '투스카니',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'brands_id' => 74,
                'name' => 'i30',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'brands_id' => 74,
                'name' => 'i20',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'brands_id' => 74,
                'name' => '갤로퍼',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'brands_id' => 74,
                'name' => 'i40',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'brands_id' => 74,
                'name' => '그랜져',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'brands_id' => 74,
                'name' => '그라나다',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'brands_id' => 74,
                'name' => '다이너스티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'brands_id' => 74,
                'name' => '그레이스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'brands_id' => 74,
                'name' => '라비타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'brands_id' => 74,
                'name' => '트라고',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'brands_id' => 74,
                'name' => '캠핑카',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'brands_id' => 74,
                'name' => '마이티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'brands_id' => 74,
                'name' => '마르샤',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'brands_id' => 74,
                'name' => '리베로',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'brands_id' => 74,
                'name' => '맥스크루즈',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'brands_id' => 74,
                'name' => '클릭',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'brands_id' => 74,
                'name' => '베르나',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'brands_id' => 74,
                'name' => '베라크루즈',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'brands_id' => 74,
                'name' => '스쿠프',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'brands_id' => 74,
                'name' => '벨로스터',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'brands_id' => 74,
                'name' => '스텔라',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'brands_id' => 74,
                'name' => '스타렉스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'brands_id' => 74,
                'name' => '엑셀',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'brands_id' => 74,
                'name' => '엑센트',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'brands_id' => 74,
                'name' => '코티나',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'brands_id' => 74,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'brands_id' => 74,
                'name' => '카운티',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'brands_id' => 74,
                'name' => '제네시스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'brands_id' => 74,
                'name' => '유니버스',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'brands_id' => 74,
                'name' => '엘란트라',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'brands_id' => 70,
                'name' => 'RCZ',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'brands_id' => 70,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'brands_id' => 70,
                'name' => '806',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'brands_id' => 70,
                'name' => '807',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'brands_id' => 70,
                'name' => 'Expert Tepee',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'brands_id' => 70,
                'name' => 'Parter Tepee',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'brands_id' => 70,
                'name' => '1007',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'brands_id' => 70,
                'name' => '107',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'brands_id' => 70,
                'name' => '206',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'brands_id' => 70,
                'name' => '205',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'brands_id' => 70,
                'name' => '208',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'brands_id' => 70,
                'name' => '207',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'brands_id' => 70,
                'name' => '306',
                'created_at' => '2017-06-09 15:53:51',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'brands_id' => 70,
                'name' => '2008',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'brands_id' => 70,
                'name' => '308',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'brands_id' => 70,
                'name' => '307',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'brands_id' => 70,
                'name' => '405',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'brands_id' => 70,
                'name' => '3008',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'brands_id' => 70,
                'name' => '407',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'brands_id' => 70,
                'name' => '406',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'brands_id' => 70,
                'name' => '508',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'brands_id' => 70,
                'name' => '505',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'brands_id' => 70,
                'name' => '604',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'brands_id' => 70,
                'name' => '5008',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'brands_id' => 70,
                'name' => '607',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'brands_id' => 70,
                'name' => '605',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'brands_id' => 22,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'brands_id' => 22,
                'name' => 'MPV',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'brands_id' => 22,
            'name' => '3 (스피드 악셀라 )',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'brands_id' => 22,
            'name' => '2 (데미오)',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'brands_id' => 22,
            'name' => '6 (아텐자)',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'brands_id' => 22,
                'name' => '5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'brands_id' => 22,
                'name' => 'CX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'brands_id' => 22,
                'name' => 'AZ',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'brands_id' => 22,
                'name' => 'RX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'brands_id' => 22,
                'name' => 'MX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'brands_id' => 22,
                'name' => '트리뷰트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'brands_id' => 22,
                'name' => '유노스로드스터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'brands_id' => 62,
                'name' => '모델 S',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'brands_id' => 34,
                'name' => 'GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'brands_id' => 34,
                'name' => '로드스터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'brands_id' => 53,
                'name' => '슈퍼세븐',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'brands_id' => 36,
                'name' => '뷰',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'brands_id' => 36,
                'name' => '스카이',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'brands_id' => 36,
                'name' => '아스트라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'brands_id' => 36,
                'name' => '아웃룩',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'brands_id' => 36,
                'name' => '아우라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'brands_id' => 36,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'brands_id' => 59,
                'name' => '엘도라도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'brands_id' => 59,
                'name' => '드빌',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'brands_id' => 59,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'brands_id' => 59,
                'name' => '플리트우드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'brands_id' => 59,
                'name' => 'BLS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'brands_id' => 59,
                'name' => 'ATS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'brands_id' => 59,
                'name' => 'CTS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'brands_id' => 59,
                'name' => 'CT6',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'brands_id' => 59,
                'name' => 'STS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'brands_id' => 59,
                'name' => 'DTS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'brands_id' => 59,
                'name' => 'XLR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'brands_id' => 59,
                'name' => 'SRX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'brands_id' => 59,
                'name' => '에스컬레이드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'brands_id' => 59,
                'name' => 'XT5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'brands_id' => 49,
                'name' => 'RL',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'brands_id' => 49,
                'name' => 'CL',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'brands_id' => 49,
                'name' => 'TSX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'brands_id' => 49,
                'name' => 'TL',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'brands_id' => 49,
                'name' => 'MDX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'brands_id' => 49,
                'name' => 'ZDX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'brands_id' => 49,
                'name' => 'RSX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'brands_id' => 49,
                'name' => 'RDX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'brands_id' => 49,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'brands_id' => 49,
                'name' => 'INTEGRA',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'brands_id' => 41,
                'name' => 'R470',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'brands_id' => 41,
                'name' => '히노',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'brands_id' => 54,
                'name' => '로데오',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'brands_id' => 54,
                'name' => '뮤',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'brands_id' => 54,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'brands_id' => 54,
                'name' => '비크로스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'brands_id' => 60,
                'name' => 'CCX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'brands_id' => 60,
                'name' => 'CCR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'brands_id' => 60,
                'name' => 'CCXR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'brands_id' => 45,
                'name' => 'SQ',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'brands_id' => 45,
                'name' => 'Q7',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'brands_id' => 45,
                'name' => 'R8',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'brands_id' => 45,
                'name' => 'TT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'brands_id' => 45,
                'name' => 'RS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'brands_id' => 45,
                'name' => 'S',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'brands_id' => 45,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'brands_id' => 45,
                'name' => 'A3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'brands_id' => 45,
                'name' => 'A1',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'brands_id' => 45,
                'name' => 'A5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'brands_id' => 45,
                'name' => 'A4',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'brands_id' => 45,
                'name' => 'A7',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'brands_id' => 45,
                'name' => 'A6',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'brands_id' => 45,
                'name' => '올로드콰트로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'brands_id' => 45,
                'name' => 'A8',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'brands_id' => 45,
                'name' => 'Q5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'brands_id' => 45,
                'name' => 'Q3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'brands_id' => 16,
                'name' => '엑시지',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'brands_id' => 16,
                'name' => '에보라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'brands_id' => 16,
                'name' => '유로파',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'brands_id' => 16,
                'name' => '엘리스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'brands_id' => 16,
                'name' => '2-일레븐',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'brands_id' => 16,
                'name' => '에스프리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'brands_id' => 16,
                'name' => '340',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'brands_id' => 63,
                'name' => '존다',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'brands_id' => 63,
                'name' => '후에이라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'brands_id' => 46,
                'name' => '스파이더',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'brands_id' => 46,
                'name' => '브레라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'brands_id' => 46,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'brands_id' => 46,
                'name' => '줄리에타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'brands_id' => 46,
                'name' => '147',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'brands_id' => 46,
                'name' => '4C',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'brands_id' => 46,
                'name' => '156GTA',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'brands_id' => 46,
                'name' => '156',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'brands_id' => 46,
                'name' => '164',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'brands_id' => 46,
                'name' => '159',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'brands_id' => 46,
                'name' => 'GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'brands_id' => 46,
                'name' => '166',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'brands_id' => 46,
                'name' => '미토',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'brands_id' => 46,
                'name' => 'GTV',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'brands_id' => 5,
                'name' => '캠핑 트레일러',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'brands_id' => 5,
                'name' => '캠핑카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'brands_id' => 5,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'brands_id' => 5,
                'name' => '희소차량',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'brands_id' => 10,
                'name' => '노아',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'brands_id' => 10,
                'name' => '벤자',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'brands_id' => 10,
                'name' => '매트릭스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'brands_id' => 10,
                'name' => '사이언',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'brands_id' => 10,
                'name' => '복시',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'brands_id' => 10,
                'name' => '알테자',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'brands_id' => 10,
                'name' => '아발론',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'brands_id' => 10,
                'name' => '펀 카르고',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'brands_id' => 10,
                'name' => '크라운',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'brands_id' => 10,
                'name' => '입섬',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'brands_id' => 10,
                'name' => '윌',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'brands_id' => 10,
            'name' => '야리스(비츠)',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'brands_id' => 10,
                'name' => '알파드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'brands_id' => 10,
                'name' => '셀시오',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'brands_id' => 10,
                'name' => '소아라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'brands_id' => 10,
                'name' => '솔라라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'brands_id' => 10,
                'name' => '수프라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'brands_id' => 10,
                'name' => '세라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'brands_id' => 10,
                'name' => '세콰이어',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'brands_id' => 10,
                'name' => '센츄리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'brands_id' => 10,
                'name' => '셀리카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'brands_id' => 10,
                'name' => '스프린터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'brands_id' => 10,
                'name' => '아이고',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'brands_id' => 10,
                'name' => '해리어',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'brands_id' => 10,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'brands_id' => 10,
                'name' => '도요타 86',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'brands_id' => 10,
                'name' => '위시',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'brands_id' => 10,
                'name' => '프리우스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'brands_id' => 10,
                'name' => '코롤라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'brands_id' => 10,
                'name' => '라브4',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'brands_id' => 10,
                'name' => '캠리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'brands_id' => 10,
                'name' => '타코마 픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'brands_id' => 10,
                'name' => '시에나',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'brands_id' => 10,
                'name' => 'FJ크루져',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'brands_id' => 10,
                'name' => '툰드라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'brands_id' => 10,
                'name' => '하이럭스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'brands_id' => 10,
                'name' => '하이랜더',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'brands_id' => 10,
                'name' => 'IQ',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'brands_id' => 10,
                'name' => 'bB',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'brands_id' => 10,
                'name' => '4러너',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'brands_id' => 10,
                'name' => 'MR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'brands_id' => 10,
                'name' => '랜드크루저',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'brands_id' => 75,
                'name' => '크로스투어',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'brands_id' => 75,
                'name' => '프렐류드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'brands_id' => 75,
                'name' => '파일럿',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'brands_id' => 75,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'brands_id' => 75,
                'name' => 'CR-Z',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'brands_id' => 75,
                'name' => 'CR-V',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'brands_id' => 75,
                'name' => 'N-BOX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'brands_id' => 75,
                'name' => 'CRX 델솔',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'brands_id' => 75,
                'name' => 'NSX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'brands_id' => 75,
                'name' => 'N-ONE',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'brands_id' => 75,
                'name' => 'S2000',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'brands_id' => 75,
                'name' => 'S660',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'brands_id' => 75,
                'name' => '레전드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'brands_id' => 75,
                'name' => '댓츠',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'brands_id' => 75,
                'name' => '비트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'brands_id' => 75,
                'name' => '리지라인',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'brands_id' => 75,
                'name' => '어코드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'brands_id' => 75,
                'name' => '시빅',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'brands_id' => 75,
                'name' => '엘리먼트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'brands_id' => 75,
                'name' => '에딕스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'brands_id' => 75,
                'name' => '인사이트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'brands_id' => 75,
                'name' => '오딧세이',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'brands_id' => 75,
                'name' => '크로스로드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'brands_id' => 75,
                'name' => '인테그라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'brands_id' => 44,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'brands_id' => 44,
                'name' => '트럭',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'brands_id' => 44,
                'name' => '로디우스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'brands_id' => 44,
                'name' => '렉스턴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'brands_id' => 44,
                'name' => '액티언',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'brands_id' => 44,
                'name' => '무쏘',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'brands_id' => 44,
                'name' => '체어맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'brands_id' => 44,
                'name' => '이스타나',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'brands_id' => 44,
                'name' => '칼리스타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'brands_id' => 44,
                'name' => '카이런',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'brands_id' => 44,
                'name' => '티볼리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'brands_id' => 44,
                'name' => '코란도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'brands_id' => 37,
                'name' => '체비밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'brands_id' => 37,
                'name' => '임팔라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'brands_id' => 37,
                'name' => '콜로라도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'brands_id' => 37,
                'name' => '카마로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'brands_id' => 37,
                'name' => '캠핑카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'brands_id' => 37,
                'name' => '콜벳',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'brands_id' => 37,
                'name' => '트럭밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'brands_id' => 37,
                'name' => '타호',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'brands_id' => 37,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'brands_id' => 37,
                'name' => '픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'brands_id' => 37,
                'name' => 'HHR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'brands_id' => 37,
                'name' => 'C/K 1500',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'brands_id' => 37,
                'name' => 'SSR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'brands_id' => 37,
                'name' => 'S10 픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'brands_id' => 37,
                'name' => '서버밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'brands_id' => 37,
                'name' => '블레이저',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'brands_id' => 37,
                'name' => '아발란치',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'brands_id' => 37,
                'name' => '실버라도 픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'brands_id' => 37,
                'name' => '익스프레스밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'brands_id' => 37,
                'name' => '아스트로밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'brands_id' => 57,
                'name' => 'EQ900',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'brands_id' => 57,
                'name' => 'G80',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'brands_id' => 35,
                'name' => '9-5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'brands_id' => 35,
                'name' => '9-3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'brands_id' => 35,
                'name' => '900',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'brands_id' => 35,
                'name' => '터보-X',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'brands_id' => 35,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'brands_id' => 35,
                'name' => '9000',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'brands_id' => 17,
                'name' => '던',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'brands_id' => 17,
                'name' => '고스트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'brands_id' => 17,
                'name' => '레이스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'brands_id' => 17,
                'name' => '팬텀',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'brands_id' => 17,
            'name' => '실버 스피릿(스퍼)',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'brands_id' => 17,
                'name' => '실버 세라프',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'brands_id' => 17,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'brands_id' => 17,
                'name' => '코니쉬',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'brands_id' => 67,
                'name' => '사우바나',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'brands_id' => 67,
                'name' => '툰랜드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'brands_id' => 72,
                'name' => '600',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'brands_id' => 72,
                'name' => '500',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'brands_id' => 72,
                'name' => '쿠페',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'brands_id' => 72,
                'name' => '바르게타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'brands_id' => 72,
                'name' => '판다 4×4',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'brands_id' => 72,
                'name' => '크로마',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'brands_id' => 72,
                'name' => '프리몬트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'brands_id' => 72,
                'name' => '푼토',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'brands_id' => 72,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'brands_id' => 19,
                'name' => 'SM5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'brands_id' => 19,
                'name' => 'SM3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'brands_id' => 19,
                'name' => 'SM7',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'brands_id' => 19,
                'name' => 'SM6',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'brands_id' => 19,
                'name' => 'QM5',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'brands_id' => 19,
                'name' => 'QM3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'brands_id' => 19,
                'name' => '야무진',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'brands_id' => 19,
                'name' => 'QM6',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'brands_id' => 19,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'brands_id' => 19,
                'name' => '트럭',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'brands_id' => 1,
                'name' => 'M시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'brands_id' => 1,
                'name' => 'Z시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'brands_id' => 1,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'brands_id' => 1,
                'name' => 'i3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'brands_id' => 1,
                'name' => 'i8',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'brands_id' => 1,
                'name' => '2시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'brands_id' => 1,
                'name' => '1시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'brands_id' => 1,
                'name' => '4시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'brands_id' => 1,
                'name' => '3시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'brands_id' => 1,
                'name' => '6시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'brands_id' => 1,
                'name' => '5시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'brands_id' => 1,
                'name' => '8시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'brands_id' => 1,
                'name' => '7시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'brands_id' => 1,
                'name' => 'X시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'brands_id' => 1,
                'name' => 'GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'brands_id' => 31,
                'name' => '베이론',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'brands_id' => 31,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'brands_id' => 50,
                'name' => '미니',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'brands_id' => 50,
                'name' => 'FX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'brands_id' => 50,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'brands_id' => 65,
                'name' => '포커스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'brands_id' => 65,
                'name' => '프리스타일',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'brands_id' => 65,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'brands_id' => 65,
                'name' => 'F-시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'brands_id' => 65,
                'name' => 'E-시리즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'brands_id' => 65,
                'name' => 'S-MAX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'brands_id' => 65,
                'name' => 'GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'brands_id' => 65,
                'name' => '머스탱',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'brands_id' => 65,
                'name' => '레인져',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'brands_id' => 65,
                'name' => '브롱코',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'brands_id' => 65,
                'name' => '몬데오',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'brands_id' => 65,
                'name' => '이스케이프',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'brands_id' => 65,
                'name' => '윈드스타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'brands_id' => 65,
                'name' => '익스플로러',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'brands_id' => 65,
                'name' => '익스페디션',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'brands_id' => 65,
                'name' => '스포츠트랙',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'brands_id' => 65,
                'name' => '썬더버드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'brands_id' => 65,
                'name' => '쿠가',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'brands_id' => 65,
                'name' => '트랜짓',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'brands_id' => 65,
                'name' => '토러스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'brands_id' => 65,
                'name' => '퓨전',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'brands_id' => 65,
                'name' => '파이브 헌드레드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'brands_id' => 14,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'brands_id' => 14,
                'name' => 'RC',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'brands_id' => 14,
                'name' => 'ES',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'brands_id' => 14,
                'name' => 'IS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'brands_id' => 14,
                'name' => 'LS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'brands_id' => 14,
                'name' => 'GS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'brands_id' => 14,
                'name' => 'SC',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'brands_id' => 14,
                'name' => 'CT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'brands_id' => 14,
                'name' => 'GX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'brands_id' => 14,
                'name' => 'RX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'brands_id' => 14,
                'name' => 'NX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'brands_id' => 14,
                'name' => 'LX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'brands_id' => 25,
                'name' => '쿠페',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'brands_id' => 25,
                'name' => '쿠퍼',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'brands_id' => 25,
                'name' => '컨트리맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'brands_id' => 25,
                'name' => '클럽맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'brands_id' => 25,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'brands_id' => 25,
                'name' => '페이스맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'brands_id' => 11,
                'name' => '데드라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'brands_id' => 11,
                'name' => '델타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'brands_id' => 11,
                'name' => '라이브라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'brands_id' => 11,
                'name' => '카파',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'brands_id' => 11,
                'name' => '테마',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'brands_id' => 11,
                'name' => '테시스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'brands_id' => 11,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'brands_id' => 71,
                'name' => '라티고 CS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'brands_id' => 71,
                'name' => '트라몬토',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'brands_id' => 71,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'brands_id' => 76,
                'name' => 'UTE',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'brands_id' => 76,
                'name' => '모나로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'brands_id' => 76,
                'name' => '바리나',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'brands_id' => 76,
                'name' => '스테이츠맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'brands_id' => 76,
                'name' => '에피카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'brands_id' => 76,
                'name' => '카프라이스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'brands_id' => 76,
                'name' => '칼라이스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'brands_id' => 76,
                'name' => '캡티바',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'brands_id' => 76,
                'name' => '코모도어',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'brands_id' => 76,
                'name' => '콜로라도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'brands_id' => 76,
                'name' => '콤보',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'brands_id' => 76,
                'name' => '크루즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'brands_id' => 76,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'brands_id' => 9,
                'name' => '밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'brands_id' => 9,
                'name' => '램 밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'brands_id' => 9,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'brands_id' => 9,
                'name' => '차저',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'brands_id' => 9,
                'name' => '매그넘',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'brands_id' => 9,
                'name' => '바이퍼',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'brands_id' => 9,
                'name' => '챌린저',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'brands_id' => 9,
                'name' => '다코타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'brands_id' => 9,
                'name' => '캘리버',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'brands_id' => 9,
                'name' => '램 픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'brands_id' => 9,
                'name' => '듀란고',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'brands_id' => 9,
                'name' => '캐러밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'brands_id' => 9,
                'name' => '니트로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'brands_id' => 20,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'brands_id' => 20,
                'name' => 'MKS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'brands_id' => 20,
                'name' => 'MKC',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'brands_id' => 20,
                'name' => 'MKZ',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'brands_id' => 20,
                'name' => 'MKX',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'brands_id' => 20,
                'name' => 'LS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'brands_id' => 20,
                'name' => 'MKT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'brands_id' => 20,
                'name' => '에비에이터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'brands_id' => 20,
                'name' => '네비게이터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'brands_id' => 20,
                'name' => '타운카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'brands_id' => 20,
                'name' => '컨티넨탈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'brands_id' => 69,
                'name' => '그랜드엠',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'brands_id' => 69,
                'name' => '그랑프리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'brands_id' => 69,
                'name' => '트랜스앰',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'brands_id' => 69,
                'name' => '솔스티스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'brands_id' => 69,
                'name' => '파이어버드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'brands_id' => 69,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'brands_id' => 12,
                'name' => '디아블로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'brands_id' => 12,
                'name' => '가야르도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'brands_id' => 12,
                'name' => '무르시엘라고',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'brands_id' => 12,
                'name' => '레벤톤',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'brands_id' => 12,
                'name' => '우라칸',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'brands_id' => 12,
                'name' => '아벤타도르',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'brands_id' => 12,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'brands_id' => 8,
                'name' => '미라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'brands_id' => 8,
                'name' => '코펜',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 441,
                'brands_id' => 8,
                'name' => '분',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 442,
                'brands_id' => 8,
                'name' => '마테리아',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 443,
                'brands_id' => 8,
                'name' => '탄토',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 444,
                'brands_id' => 8,
                'name' => '캐스트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 445,
                'brands_id' => 8,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 446,
                'brands_id' => 8,
                'name' => '웨이크',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 447,
                'brands_id' => 3,
                'name' => '사바나밴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 448,
                'brands_id' => 3,
                'name' => '유콘',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 449,
                'brands_id' => 3,
                'name' => '사파리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 450,
                'brands_id' => 3,
                'name' => '벤츄라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 451,
                'brands_id' => 3,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 452,
                'brands_id' => 3,
                'name' => '픽업',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 453,
                'brands_id' => 33,
                'name' => '리갈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 454,
                'brands_id' => 33,
                'name' => '르사블',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 455,
                'brands_id' => 33,
                'name' => '센츄리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 456,
                'brands_id' => 33,
                'name' => '리비에라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 457,
                'brands_id' => 33,
                'name' => '엔클라브',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 458,
                'brands_id' => 33,
                'name' => '스카이락',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 459,
                'brands_id' => 33,
                'name' => '파크애비뉴',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 460,
                'brands_id' => 32,
                'name' => 'CK',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 461,
                'brands_id' => 51,
                'name' => '벡트라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 462,
                'brands_id' => 51,
                'name' => '스피드스터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 463,
                'brands_id' => 51,
                'name' => '아스트라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 464,
                'brands_id' => 51,
                'name' => '비타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 465,
                'brands_id' => 51,
                'name' => '카데트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 466,
                'brands_id' => 51,
                'name' => '오메가',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 467,
                'brands_id' => 51,
                'name' => '코르사',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 468,
                'brands_id' => 51,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 469,
                'brands_id' => 51,
                'name' => '티그라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 470,
                'brands_id' => 21,
                'name' => '그란카브리오',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 471,
                'brands_id' => 21,
                'name' => '그란투리스모',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 472,
                'brands_id' => 21,
                'name' => '르반떼',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 473,
                'brands_id' => 21,
                'name' => '기블리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 474,
                'brands_id' => 21,
                'name' => '3200 GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 475,
                'brands_id' => 21,
                'name' => '콰트로포르테',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 476,
                'brands_id' => 21,
                'name' => 'MC 12',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 477,
                'brands_id' => 21,
                'name' => '4200 GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 478,
                'brands_id' => 21,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 479,
                'brands_id' => 21,
                'name' => '바이터보',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 480,
                'brands_id' => 15,
                'name' => '미니',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 481,
                'brands_id' => 15,
                'name' => 'MGF',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 482,
                'brands_id' => 15,
                'name' => '75',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 483,
                'brands_id' => 15,
                'name' => '216',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 484,
                'brands_id' => 15,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 485,
                'brands_id' => 47,
                'name' => 'Vantage',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 486,
                'brands_id' => 47,
                'name' => 'DB',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 487,
                'brands_id' => 47,
                'name' => 'DBS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 488,
                'brands_id' => 47,
                'name' => '뱅퀴시',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 489,
                'brands_id' => 47,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 490,
                'brands_id' => 47,
                'name' => '라피드',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 491,
                'brands_id' => 66,
                'name' => '718',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 492,
                'brands_id' => 66,
                'name' => '356',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 493,
                'brands_id' => 66,
                'name' => '마칸',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 494,
                'brands_id' => 66,
                'name' => '911',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 495,
                'brands_id' => 66,
                'name' => '카이맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 496,
                'brands_id' => 66,
                'name' => '박스터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 497,
                'brands_id' => 66,
                'name' => '카레라GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 498,
                'brands_id' => 66,
                'name' => '카이엔',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 499,
                'brands_id' => 66,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 500,
                'brands_id' => 66,
                'name' => '파나메라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
        ));
        \DB::table('models')->insert(array (
            0 => 
            array (
                'id' => 501,
                'brands_id' => 64,
                'name' => 'F355',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'brands_id' => 64,
                'name' => '612',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'brands_id' => 64,
                'name' => 'F40',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'brands_id' => 64,
                'name' => 'F430',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'brands_id' => 64,
                'name' => '엔초',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'brands_id' => 64,
                'name' => '캘리포니아',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'brands_id' => 64,
                'name' => 'F12 베를리네타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'brands_id' => 64,
                'name' => 'FF',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'brands_id' => 64,
                'name' => '250 GTO',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'brands_id' => 64,
                'name' => 'GTC4 루쏘',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'brands_id' => 64,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'brands_id' => 64,
                'name' => '360',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'brands_id' => 64,
                'name' => '348',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'brands_id' => 64,
                'name' => '458',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'brands_id' => 64,
                'name' => '456',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'brands_id' => 64,
                'name' => '512TR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'brands_id' => 64,
                'name' => '488',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'brands_id' => 64,
                'name' => '550',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'brands_id' => 64,
                'name' => '512M',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'brands_id' => 64,
                'name' => '599',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'brands_id' => 64,
                'name' => '575M',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'brands_id' => 13,
                'name' => '디스커버리 스포츠',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'brands_id' => 13,
                'name' => '디스커버리4',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'brands_id' => 13,
                'name' => '디스커버리3',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'brands_id' => 13,
                'name' => '디스커버리2',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'brands_id' => 13,
                'name' => '디스커버리1',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'brands_id' => 13,
                'name' => '디펜더',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'brands_id' => 13,
                'name' => '뉴 레인지로버',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'brands_id' => 13,
                'name' => '레인지로버',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'brands_id' => 13,
                'name' => '뉴 레인지로버 스포츠',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'brands_id' => 13,
                'name' => '레인지로버 스포츠',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'brands_id' => 13,
                'name' => '레인지로버 이보크',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'brands_id' => 13,
            'name' => '프리랜더2 (06년~현제)',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'brands_id' => 13,
                'name' => '뉴프리랜더',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'brands_id' => 13,
                'name' => '프리랜더',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'brands_id' => 13,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'brands_id' => 48,
                'name' => '스피라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'brands_id' => 48,
                'name' => '벤가리',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'brands_id' => 30,
                'name' => 'S',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'brands_id' => 30,
                'name' => 'C',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'brands_id' => 30,
                'name' => 'XC',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'brands_id' => 30,
                'name' => 'V',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'brands_id' => 30,
                'name' => '940',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'brands_id' => 30,
                'name' => '850',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'brands_id' => 30,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'brands_id' => 38,
                'name' => '프린스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'brands_id' => 38,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'brands_id' => 38,
                'name' => '바네트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'brands_id' => 38,
                'name' => '베리타스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'brands_id' => 38,
                'name' => '브로엄',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'brands_id' => 38,
                'name' => '수퍼살롱',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'brands_id' => 38,
                'name' => '마티즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'brands_id' => 38,
                'name' => '매그너스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'brands_id' => 38,
                'name' => '맵시',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'brands_id' => 38,
                'name' => '맵시나',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'brands_id' => 38,
                'name' => '스테이츠맨',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'brands_id' => 38,
                'name' => '씨에로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'brands_id' => 38,
                'name' => '티코',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'brands_id' => 38,
                'name' => '프리마',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'brands_id' => 38,
                'name' => '볼트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'brands_id' => 38,
                'name' => '말리부',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 562,
                'brands_id' => 38,
                'name' => '아베오',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 563,
                'brands_id' => 38,
                'name' => '스파크',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 564,
                'brands_id' => 38,
                'name' => '임팔라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 565,
                'brands_id' => 38,
                'name' => '올란도',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 566,
                'brands_id' => 38,
                'name' => '크루즈',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 567,
                'brands_id' => 38,
                'name' => '캡티바',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 568,
                'brands_id' => 38,
                'name' => 'G2X',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 569,
                'brands_id' => 38,
                'name' => '트랙스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 570,
                'brands_id' => 38,
                'name' => '트럭',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 571,
                'brands_id' => 38,
                'name' => '토스카',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 572,
                'brands_id' => 38,
                'name' => '누비라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 573,
                'brands_id' => 38,
                'name' => '넥시아',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 574,
                'brands_id' => 38,
                'name' => '라노스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 575,
                'brands_id' => 38,
                'name' => '다마스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 576,
                'brands_id' => 38,
                'name' => '라세티',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 577,
                'brands_id' => 38,
                'name' => '라보',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 578,
                'brands_id' => 38,
                'name' => '레조',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 579,
                'brands_id' => 38,
                'name' => '레간자',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 580,
                'brands_id' => 38,
                'name' => '르망',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 581,
                'brands_id' => 38,
                'name' => '로얄살롱',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 582,
                'brands_id' => 38,
                'name' => '알페온',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 583,
                'brands_id' => 38,
                'name' => '아카디아',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 584,
                'brands_id' => 38,
                'name' => '칼로스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 585,
                'brands_id' => 38,
                'name' => '카고',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 586,
                'brands_id' => 38,
                'name' => '젠트라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 587,
                'brands_id' => 38,
                'name' => '임페리얼',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 588,
                'brands_id' => 38,
                'name' => '윈스톰',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 589,
                'brands_id' => 38,
                'name' => '에스페로',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 590,
                'brands_id' => 2,
                'name' => '트랙커',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 591,
                'brands_id' => 2,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 592,
                'brands_id' => 43,
                'name' => 'DS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 593,
                'brands_id' => 43,
                'name' => 'C',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 594,
                'brands_id' => 43,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 595,
                'brands_id' => 43,
                'name' => '2CV',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 596,
                'brands_id' => 28,
                'name' => 'CLK',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 597,
                'brands_id' => 28,
                'name' => 'SL',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 598,
                'brands_id' => 28,
                'name' => 'CL클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 599,
                'brands_id' => 28,
                'name' => 'SLC클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 600,
                'brands_id' => 28,
                'name' => '스프린터',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 601,
                'brands_id' => 28,
                'name' => '스마트',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 602,
                'brands_id' => 28,
                'name' => 'SLK',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 603,
                'brands_id' => 28,
                'name' => 'SLS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 604,
                'brands_id' => 28,
                'name' => 'SLR',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 605,
                'brands_id' => 28,
                'name' => 'B클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 606,
                'brands_id' => 28,
                'name' => 'A클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 607,
                'brands_id' => 28,
                'name' => 'E클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 608,
                'brands_id' => 28,
                'name' => 'C클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 609,
                'brands_id' => 28,
                'name' => 'CLS클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 610,
                'brands_id' => 28,
                'name' => 'CLA클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 611,
                'brands_id' => 28,
                'name' => '마이바흐',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 612,
                'brands_id' => 28,
                'name' => 'S클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 613,
                'brands_id' => 28,
                'name' => 'GLC클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 614,
                'brands_id' => 28,
                'name' => 'GLA클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 615,
                'brands_id' => 28,
                'name' => 'GLK클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 616,
                'brands_id' => 28,
                'name' => 'GLE클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 617,
                'brands_id' => 28,
                'name' => 'GL클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 618,
                'brands_id' => 28,
                'name' => 'GLS클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 619,
                'brands_id' => 28,
                'name' => 'M클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 620,
                'brands_id' => 28,
                'name' => 'G클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 621,
                'brands_id' => 28,
                'name' => 'R클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 622,
                'brands_id' => 28,
                'name' => 'AMG GT',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 623,
                'brands_id' => 28,
                'name' => '비아노',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 624,
                'brands_id' => 28,
                'name' => 'V클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 625,
                'brands_id' => 28,
                'name' => '190E 클래스',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 626,
                'brands_id' => 28,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 627,
                'brands_id' => 28,
                'name' => 'SEL',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 628,
                'brands_id' => 28,
                'name' => 'SEC',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 629,
                'brands_id' => 28,
                'name' => '300',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 630,
                'brands_id' => 28,
                'name' => '200',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 631,
                'brands_id' => 52,
                'name' => '88LSS',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 632,
                'brands_id' => 52,
                'name' => '실루엣',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 633,
                'brands_id' => 52,
                'name' => '오로라',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 634,
                'brands_id' => 52,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:52',
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 635,
                'brands_id' => 56,
                'name' => 'XJS',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 636,
                'brands_id' => 56,
                'name' => 'XK',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 637,
                'brands_id' => 56,
                'name' => '소버린',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 638,
                'brands_id' => 56,
                'name' => '다임러',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 639,
                'brands_id' => 56,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 640,
                'brands_id' => 56,
                'name' => 'F타입',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 641,
                'brands_id' => 56,
                'name' => 'F페이스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 642,
                'brands_id' => 56,
                'name' => 'X타입',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 643,
                'brands_id' => 56,
                'name' => 'S타입',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 644,
                'brands_id' => 56,
                'name' => 'XF',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 645,
                'brands_id' => 56,
                'name' => 'XE',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 646,
                'brands_id' => 56,
                'name' => 'XJ6',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 647,
                'brands_id' => 56,
                'name' => 'XJ',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 648,
                'brands_id' => 56,
                'name' => 'XJR',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 649,
                'brands_id' => 56,
                'name' => 'XJ8',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 650,
                'brands_id' => 24,
                'name' => '마리너',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 651,
                'brands_id' => 24,
                'name' => '그랜드마퀴스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 652,
                'brands_id' => 24,
                'name' => '몬테고',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 653,
                'brands_id' => 24,
                'name' => '마운티니어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 654,
                'brands_id' => 24,
                'name' => '밀란',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 655,
                'brands_id' => 24,
                'name' => '미스틱',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 656,
                'brands_id' => 24,
                'name' => '세이블',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 657,
                'brands_id' => 24,
                'name' => '빌리저',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 658,
                'brands_id' => 24,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 659,
                'brands_id' => 61,
                'name' => '퍼시피카',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 660,
                'brands_id' => 61,
                'name' => '크로스파이어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 661,
                'brands_id' => 61,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 662,
                'brands_id' => 61,
                'name' => '프라울러',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 663,
                'brands_id' => 61,
                'name' => '300C',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 664,
                'brands_id' => 61,
                'name' => '200',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 665,
                'brands_id' => 61,
                'name' => 'LHS',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 666,
                'brands_id' => 61,
                'name' => '300M',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 667,
                'brands_id' => 61,
                'name' => '보이저',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 668,
                'brands_id' => 61,
                'name' => 'PT크루저',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 669,
                'brands_id' => 61,
                'name' => '세브링',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 670,
                'brands_id' => 61,
                'name' => '비전',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 671,
                'brands_id' => 61,
                'name' => '캐러밴',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 672,
                'brands_id' => 61,
                'name' => '스트라투스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 673,
                'brands_id' => 4,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 674,
                'brands_id' => 4,
                'name' => '프레지오',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 675,
                'brands_id' => 4,
                'name' => '콩코드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 676,
                'brands_id' => 4,
                'name' => '트레이드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 677,
                'brands_id' => 4,
                'name' => '크레도스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 678,
                'brands_id' => 4,
                'name' => '프라이드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 679,
                'brands_id' => 4,
                'name' => '포텐샤',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 680,
                'brands_id' => 4,
                'name' => '스팅어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 681,
                'brands_id' => 4,
                'name' => '스펙트라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 682,
                'brands_id' => 4,
                'name' => '스포티지',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 683,
                'brands_id' => 4,
                'name' => '쎄라토',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 684,
                'brands_id' => 4,
                'name' => '세레스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 685,
                'brands_id' => 4,
                'name' => '세이블',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 686,
                'brands_id' => 4,
                'name' => '세피아',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 687,
                'brands_id' => 4,
                'name' => '슈마',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 688,
                'brands_id' => 4,
                'name' => '토픽',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 689,
                'brands_id' => 4,
                'name' => '트럭',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 690,
                'brands_id' => 4,
                'name' => '타우너',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 691,
                'brands_id' => 4,
                'name' => '타이탄',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 692,
                'brands_id' => 4,
                'name' => '쏘렌토',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 693,
                'brands_id' => 4,
                'name' => '쏘울',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 694,
                'brands_id' => 4,
                'name' => '코스모스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 695,
                'brands_id' => 4,
                'name' => '콤비',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 696,
                'brands_id' => 4,
                'name' => 'K5',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 697,
                'brands_id' => 4,
                'name' => 'K3',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 698,
                'brands_id' => 4,
                'name' => 'K9',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 699,
                'brands_id' => 4,
                'name' => 'K7',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 700,
                'brands_id' => 4,
                'name' => '그랜버드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 701,
                'brands_id' => 4,
                'name' => 'X-트렉',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 702,
                'brands_id' => 4,
                'name' => '라이노',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 703,
                'brands_id' => 4,
                'name' => '니로',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 704,
                'brands_id' => 4,
                'name' => '레토나',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 705,
                'brands_id' => 4,
                'name' => '레이',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 706,
                'brands_id' => 4,
                'name' => '포르테',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 707,
                'brands_id' => 4,
                'name' => '파맥스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 708,
                'brands_id' => 4,
                'name' => '캠핑카',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 709,
                'brands_id' => 4,
                'name' => '캐피탈',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 710,
                'brands_id' => 4,
                'name' => '록스타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 711,
                'brands_id' => 4,
                'name' => '로체',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 712,
                'brands_id' => 4,
                'name' => '모닝',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 713,
                'brands_id' => 4,
                'name' => '리오',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 714,
                'brands_id' => 4,
                'name' => '베스타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 715,
                'brands_id' => 4,
                'name' => '모하비',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 716,
                'brands_id' => 4,
                'name' => '봉고',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 717,
                'brands_id' => 4,
                'name' => '복사',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 718,
                'brands_id' => 4,
                'name' => '비스토',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 719,
                'brands_id' => 4,
                'name' => '브리사',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 720,
                'brands_id' => 4,
                'name' => '엔터프라이즈',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 721,
                'brands_id' => 4,
                'name' => '아벨라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 722,
                'brands_id' => 4,
                'name' => '카스타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 723,
                'brands_id' => 4,
                'name' => '카렌스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 724,
                'brands_id' => 4,
                'name' => '카니발',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 725,
                'brands_id' => 4,
                'name' => '옵티마',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 726,
                'brands_id' => 4,
                'name' => '오피러스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 727,
                'brands_id' => 4,
                'name' => '피아트 132',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 728,
                'brands_id' => 4,
                'name' => '엘란',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 729,
                'brands_id' => 4,
                'name' => '파크타운',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 730,
                'brands_id' => 23,
                'name' => '650S',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 731,
                'brands_id' => 23,
                'name' => '570S',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 732,
                'brands_id' => 23,
                'name' => 'MP4-12C',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 733,
                'brands_id' => 23,
                'name' => '675LT',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 734,
                'brands_id' => 73,
                'name' => 'H1',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 735,
                'brands_id' => 73,
                'name' => 'H2',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 736,
                'brands_id' => 73,
                'name' => 'H2 SUT',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 737,
                'brands_id' => 73,
                'name' => 'H3',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 738,
                'brands_id' => 73,
                'name' => 'H3T',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 739,
                'brands_id' => 26,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 740,
                'brands_id' => 26,
                'name' => 'GTO',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 741,
                'brands_id' => 26,
                'name' => '랜서에볼루션',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 742,
                'brands_id' => 26,
                'name' => '랜서',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 743,
                'brands_id' => 26,
                'name' => '몬테로',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 744,
                'brands_id' => 26,
                'name' => '아웃랜더',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 745,
                'brands_id' => 26,
                'name' => 'L200',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 746,
                'brands_id' => 26,
                'name' => '파제로',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 747,
                'brands_id' => 26,
                'name' => '이클립스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 748,
                'brands_id' => 26,
                'name' => 'RVR',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 749,
                'brands_id' => 26,
                'name' => 'FTO',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 750,
                'brands_id' => 26,
                'name' => '3000GT',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 751,
                'brands_id' => 27,
                'name' => '누에라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 752,
                'brands_id' => 27,
                'name' => '가류',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 753,
                'brands_id' => 27,
                'name' => '라세드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 754,
                'brands_id' => 27,
                'name' => '도오라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 755,
                'brands_id' => 27,
                'name' => '오로치',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 756,
                'brands_id' => 27,
                'name' => '뷰트',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 757,
                'brands_id' => 27,
                'name' => 'MC-1',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 758,
                'brands_id' => 27,
                'name' => '히미코',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 759,
                'brands_id' => 27,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 760,
                'brands_id' => 55,
                'name' => 'i',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 761,
                'brands_id' => 55,
                'name' => 'G',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 762,
                'brands_id' => 55,
                'name' => 'Q',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 763,
                'brands_id' => 55,
                'name' => 'M',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 764,
                'brands_id' => 55,
                'name' => 'FX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 765,
                'brands_id' => 55,
                'name' => 'EX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 766,
                'brands_id' => 55,
                'name' => 'QX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 767,
                'brands_id' => 55,
                'name' => 'JX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 768,
                'brands_id' => 55,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 769,
                'brands_id' => 68,
                'name' => '이오스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 770,
                'brands_id' => 68,
                'name' => '업',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 771,
                'brands_id' => 68,
                'name' => '리알타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 772,
                'brands_id' => 68,
                'name' => '아마록',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 773,
                'brands_id' => 68,
                'name' => '벤토',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 774,
                'brands_id' => 68,
                'name' => '라우탄',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 775,
                'brands_id' => 68,
                'name' => '보라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 776,
                'brands_id' => 68,
                'name' => '코라도',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 777,
                'brands_id' => 68,
                'name' => '카르만기어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 778,
                'brands_id' => 68,
                'name' => '마이크로버스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 779,
                'brands_id' => 68,
                'name' => '폴로',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 780,
                'brands_id' => 68,
                'name' => '골프',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 781,
                'brands_id' => 68,
                'name' => '비틀',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 782,
                'brands_id' => 68,
                'name' => '시로코',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 783,
                'brands_id' => 68,
                'name' => '파사트',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 784,
                'brands_id' => 68,
                'name' => '제타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 785,
                'brands_id' => 68,
                'name' => '페이톤',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 786,
                'brands_id' => 68,
                'name' => 'CC',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 787,
                'brands_id' => 68,
                'name' => '투아렉',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 788,
                'brands_id' => 68,
                'name' => '티구안',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 789,
                'brands_id' => 68,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 790,
                'brands_id' => 39,
                'name' => '아웃백',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 791,
                'brands_id' => 39,
                'name' => '레가시',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 792,
                'brands_id' => 39,
                'name' => '임프레자 WRX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 793,
                'brands_id' => 39,
                'name' => '임프레자',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 794,
                'brands_id' => 39,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 795,
                'brands_id' => 39,
                'name' => '포레스터',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 796,
                'brands_id' => 7,
                'name' => '타이탄',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 797,
                'brands_id' => 7,
                'name' => '파오',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 798,
                'brands_id' => 7,
                'name' => '패스파인더',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 799,
                'brands_id' => 7,
                'name' => '후가',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 800,
                'brands_id' => 7,
                'name' => '윙로드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 801,
                'brands_id' => 7,
                'name' => '캐시카이',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 802,
                'brands_id' => 7,
                'name' => '쥬크',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 803,
                'brands_id' => 7,
                'name' => '퀘스트',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 804,
                'brands_id' => 7,
                'name' => '휘가로',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 805,
                'brands_id' => 7,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 806,
                'brands_id' => 7,
                'name' => '큐브',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 807,
                'brands_id' => 7,
                'name' => '마치',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 808,
                'brands_id' => 7,
                'name' => '티아나',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 809,
                'brands_id' => 7,
                'name' => '알티마',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 810,
                'brands_id' => 7,
                'name' => '로그',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 811,
                'brands_id' => 7,
                'name' => '맥시마',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 812,
                'brands_id' => 7,
                'name' => '프론티어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 813,
                'brands_id' => 7,
                'name' => '무라노',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 814,
                'brands_id' => 7,
                'name' => 'Z',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 815,
                'brands_id' => 7,
                'name' => 'SX',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 816,
                'brands_id' => 7,
                'name' => '스카이라인',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 817,
                'brands_id' => 7,
                'name' => 'GTR',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 818,
                'brands_id' => 7,
            'name' => '버사(티이다)',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 819,
                'brands_id' => 7,
                'name' => 'NV밴',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 820,
                'brands_id' => 7,
                'name' => '시마',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 821,
                'brands_id' => 7,
                'name' => '스테이지아',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 822,
                'brands_id' => 7,
                'name' => '알마다',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 823,
                'brands_id' => 7,
                'name' => '실비아',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 824,
                'brands_id' => 7,
                'name' => '엘그란드',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 825,
                'brands_id' => 7,
                'name' => '엑스테라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 826,
                'brands_id' => 29,
                'name' => '벤테이가',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 827,
                'brands_id' => 29,
                'name' => '뮬산',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 828,
                'brands_id' => 29,
                'name' => '아르나지',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 829,
                'brands_id' => 29,
                'name' => '브룩랜즈',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 830,
                'brands_id' => 29,
                'name' => '컨티넨탈 GT',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 831,
                'brands_id' => 29,
                'name' => '아주어',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 832,
                'brands_id' => 29,
                'name' => '터보 R',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 833,
                'brands_id' => 29,
                'name' => '컨티넨탈 플라잉스퍼',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 834,
                'brands_id' => 29,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 835,
                'brands_id' => 18,
                'name' => '라구나',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 836,
                'brands_id' => 18,
                'name' => '메간',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 837,
                'brands_id' => 18,
                'name' => '세닉',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 838,
                'brands_id' => 18,
                'name' => '스포츠',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 839,
                'brands_id' => 18,
                'name' => '클리오',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 840,
                'brands_id' => 18,
                'name' => '트윙고',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 841,
                'brands_id' => 18,
                'name' => '에스빠스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 842,
                'brands_id' => 18,
                'name' => '벨사티스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 843,
                'brands_id' => 18,
                'name' => '모뒤스',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 844,
                'brands_id' => 18,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 845,
                'brands_id' => 42,
                'name' => 'C8',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 846,
                'brands_id' => 40,
                'name' => '허슬러',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 847,
                'brands_id' => 40,
                'name' => '케이',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 848,
                'brands_id' => 40,
                'name' => '기타',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 849,
                'brands_id' => 40,
                'name' => '사이드킥',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 850,
                'brands_id' => 40,
                'name' => '그랜드 비타라',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 851,
                'brands_id' => 40,
                'name' => '스위프트',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 852,
                'brands_id' => 40,
                'name' => '솔리오',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 853,
                'brands_id' => 40,
                'name' => '이퀘이터',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 854,
                'brands_id' => 40,
                'name' => '왜건 R',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 855,
                'brands_id' => 40,
                'name' => '알토라팡',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 856,
                'brands_id' => 40,
                'name' => '알토',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 857,
                'brands_id' => 40,
                'name' => '카푸치노',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 858,
                'brands_id' => 40,
                'name' => '짐니',
                'created_at' => '2017-06-09 15:53:53',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}