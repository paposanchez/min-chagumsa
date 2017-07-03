<?php

use Illuminate\Database\Seeder;

class CodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('codes')->delete();
        
        \DB::table('codes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group' => 'user_status',
                'name' => 'active',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'group' => 'user_status',
                'name' => 'unactive',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'group' => 'yn',
                'name' => 'yes',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'group' => 'yn',
                'name' => 'no',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'group' => 'post_shown_role',
                'name' => 'secret',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'group' => 'post_shown_role',
                'name' => 'public',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'group' => 'post_shown_role',
                'name' => 'private',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'group' => 'post_search_field',
                'name' => 'subject',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'group' => 'post_search_field',
                'name' => 'content',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'group' => 'post_search_field',
                'name' => 'writer_name',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 100,
                'group' => 'order_status',
                'name' => 'canceled',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 101,
                'group' => 'order_status',
                'name' => 'standby',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 102,
                'group' => 'order_status',
                'name' => 'ordered',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 103,
                'group' => 'order_status',
                'name' => 'request',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 104,
                'group' => 'order_status',
                'name' => 'reserved',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 105,
                'group' => 'order_status',
                'name' => 'arrived',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 106,
                'group' => 'order_status',
                'name' => 'diagnosing',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 107,
                'group' => 'order_status',
                'name' => 'diagnosed',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 108,
                'group' => 'order_status',
                'name' => 'certificating',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 109,
                'group' => 'order_status',
                'name' => 'certificated',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1000,
                'group' => 'car_option',
                'name' => 'appearence',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1001,
                'group' => 'car_option',
                'name' => 'multimedia',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1002,
                'group' => 'car_option',
                'name' => 'built-in',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1003,
                'group' => 'car_option',
                'name' => 'safety',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1004,
                'group' => 'car_option',
                'name' => 'convenience',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1005,
                'group' => 'car_option_exterior',
                'name' => 'HID',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1006,
                'group' => 'car_option_exterior',
                'name' => 'powered_side_mirror',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1007,
                'group' => 'car_option_exterior',
                'name' => 'sun_roof',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1008,
                'group' => 'car_option_exterior',
                'name' => 'panorama_sun_roof',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1009,
                'group' => 'car_option_exterior',
                'name' => 'roof_back',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1010,
                'group' => 'car_option_exterior',
                'name' => 'aluminum_wheel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1011,
                'group' => 'car_option_multimedia',
                'name' => 'cd_player',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1012,
                'group' => 'car_option_multimedia',
                'name' => 'cd_changer',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1013,
                'group' => 'car_option_multimedia',
                'name' => 'av_system',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1014,
                'group' => 'car_option_multimedia',
                'name' => 'rear_tv',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1015,
                'group' => 'car_option_multimedia',
                'name' => 'aux_socket',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1016,
                'group' => 'car_option_multimedia',
                'name' => 'usb_socket',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1017,
                'group' => 'car_option_multimedia',
                'name' => 'ipod_socket',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 1018,
                'group' => 'car_option_interior',
                'name' => 'steering_wheel_remotecontroller',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 1019,
                'group' => 'car_option_interior',
                'name' => 'power_steering',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 1020,
                'group' => 'car_option_interior',
                'name' => 'ecm',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 1021,
                'group' => 'car_option_interior',
                'name' => 'leather_sheet',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 1022,
                'group' => 'car_option_interior',
                'name' => 'powered_seat_in_driver',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 1023,
                'group' => 'car_option_interior',
                'name' => 'powered_seat_in_passenger',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 1024,
                'group' => 'car_option_interior',
                'name' => 'hit_seat_in_front',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 1025,
                'group' => 'car_option_interior',
                'name' => 'git_seat_in_rear',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 1026,
                'group' => 'car_option_interior',
                'name' => 'memory_seat',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 1027,
                'group' => 'car_option_interior',
                'name' => 'ventilation_seat_in_front',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 1028,
                'group' => 'car_option_safety',
                'name' => 'airbag_in_driver',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 1029,
                'group' => 'car_option_safety',
                'name' => 'airbag_in_passenger',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 1030,
                'group' => 'car_option_safety',
                'name' => 'airbah_side',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 1031,
                'group' => 'car_option_safety',
                'name' => 'curtain_airbag',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 1032,
                'group' => 'car_option_safety',
                'name' => 'rear_sensor',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 1033,
                'group' => 'car_option_safety',
                'name' => 'rear_camera',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 1034,
                'group' => 'car_option_safety',
                'name' => 'abs',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 1035,
                'group' => 'car_option_safety',
                'name' => 'tcs',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 1036,
                'group' => 'car_option_safety',
                'name' => 'position_controller',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 1037,
                'group' => 'car_option_safety',
                'name' => 'ecs',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 1038,
                'group' => 'car_option_safety',
                'name' => 'tpms',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 1039,
                'group' => 'car_option_safety',
                'name' => 'power_doorlock',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 1040,
                'group' => 'car_option_facilities',
                'name' => 'auto_airconditioner',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 1041,
                'group' => 'car_option_facilities',
                'name' => 'remote_door_lock',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 1042,
                'group' => 'car_option_facilities',
                'name' => 'smart_key',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 1043,
                'group' => 'car_option_facilities',
                'name' => 'power_trunk',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 1044,
                'group' => 'car_option_facilities',
                'name' => 'power_window',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 1045,
                'group' => 'car_option_facilities',
                'name' => 'cruise_control',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 1046,
                'group' => 'car_option_facilities',
                'name' => 'navigation',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 1047,
                'group' => 'car_option_facilities',
                'name' => 'handsfree',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 1048,
                'group' => 'car_option_facilities',
                'name' => 'high_pass',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 1049,
                'group' => 'car_option_facilities',
                'name' => 'button_start',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 1050,
                'group' => 'fuel_type',
                'name' => 'gasoline',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 1051,
                'group' => 'fuel_type',
                'name' => 'e-85_gasoline',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 1052,
                'group' => 'fuel_type',
                'name' => 'gasoline_hybrid',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 1053,
                'group' => 'fuel_type',
                'name' => 'diesel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 1054,
                'group' => 'fuel_type',
                'name' => 'electric',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 1055,
                'group' => 'fuel_type',
                'name' => 'compressed_natural_gas',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 1056,
                'group' => 'fuel_type',
                'name' => 'none',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 1057,
                'group' => 'drivetrain',
                'name' => '4x2/2_wheel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 1058,
                'group' => 'drivetrain',
                'name' => '4x4/4_wheel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 1059,
                'group' => 'drivetrain',
                'name' => 'awd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 1060,
                'group' => 'drivetrain',
                'name' => 'fwd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 1061,
                'group' => 'drivetrain',
                'name' => 'rwd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 1062,
                'group' => 'drivetrain',
                'name' => 'none',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 1063,
                'group' => 'transmission',
                'name' => 'manual',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 1064,
                'group' => 'transmission',
                'name' => 'automatic',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 1065,
                'group' => 'transmission',
                'name' => 'automanual',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 1066,
                'group' => 'transmission',
                'name' => 'cvt',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 1067,
                'group' => 'transmission',
                'name' => 'other',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 1068,
                'group' => 'diagnosis',
                'name' => 'diagnosis_info',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 1069,
                'group' => 'diagnosis',
                'name' => 'diagnosis_exterior',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 1070,
                'group' => 'diagnosis',
                'name' => 'diagnosis_interior',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 1071,
                'group' => 'diagnosis',
                'name' => 'diagnosis_check',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 1072,
                'group' => 'diagnosis',
                'name' => 'diagnosis_driving',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 1073,
                'group' => 'diagnosis',
                'name' => 'diagnosis_operation',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 1074,
                'group' => 'diagnosis',
                'name' => 'diagnosis_expendables',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 1075,
                'group' => 'diagnosis',
                'name' => 'diagnosis_review',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 1076,
                'group' => 'diagnosis_info',
                'name' => 'diagnosis_info_info',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 1077,
                'group' => 'diagnosis_info',
                'name' => 'diagnosis_info_mileage',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 1078,
                'group' => 'diagnosis_info',
                'name' => 'attachment_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1079,
                'group' => 'diagnosis_info',
                'name' => 'diagnosis_info_color_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 1080,
                'group' => 'diagnosis_info',
                'name' => 'diagnosis_info_option',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 1081,
                'group' => 'diagnosis_info_option',
                'name' => 'repair_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 1082,
                'group' => 'diagnosis_exterior',
                'name' => 'diagnosis_exterior_picture',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 1083,
                'group' => 'diagnosis_exterior',
                'name' => 'diagnosis_exterior_status',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 1084,
                'group' => 'diagnosis_exterior_picture',
                'name' => 'diagnosis_exterior_picture_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 1085,
                'group' => 'diagnosis_exterior_status',
                'name' => 'history_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 1086,
                'group' => 'diagnosis_exterior_status',
                'name' => 'diagnosis_exterior_position',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 1087,
                'group' => 'diagnosis_exterior_status',
                'name' => 'diagnosis_part_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 1088,
                'group' => 'diagnosis_interior',
                'name' => 'diagnosis_interior_car_bottom',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 1089,
                'group' => 'diagnosis_interior',
                'name' => 'diagnosis_interior_engine_room',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 1090,
                'group' => 'diagnosis_interior',
                'name' => 'diagnosis_interior_status',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 1091,
                'group' => 'diagnosis_interior_status',
                'name' => 'history_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 1092,
                'group' => 'diagnosis_interior_status',
                'name' => 'diagnosis_interior_position',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 1093,
                'group' => 'diagnosis_interior_status',
                'name' => 'diagnosis_part_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 1094,
                'group' => 'diagnosis_check',
                'name' => 'diagnosis_check_status',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 1095,
                'group' => 'diagnosis_check',
                'name' => 'diagnosis_check_immersion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 1096,
                'group' => 'diagnosis_check',
                'name' => 'diagnosis_check_exterior',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 1097,
                'group' => 'diagnosis_check',
                'name' => 'diagnosis_check_interior',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 1098,
                'group' => 'diagnosis_check_status',
                'name' => 'repair_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 1099,
                'group' => 'diagnosis_check_immersion',
                'name' => 'diagnosis_check_immersion_stink',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 1100,
                'group' => 'diagnosis_check_immersion',
                'name' => 'diagnosis_check_immersion_front_floor',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 1101,
                'group' => 'diagnosis_check_immersion',
                'name' => 'diagnosis_check_immersion_trunk_floor',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 1102,
                'group' => 'diagnosis_check_immersion',
                'name' => 'diagnosis_check_immersion_engine_room',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 1103,
                'group' => 'diagnosis_check_immersion_stink',
                'name' => 'stink_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 1104,
                'group' => 'diagnosis_check_immersion_front_floor',
                'name' => 'water_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 1105,
                'group' => 'diagnosis_check_immersion_trunk_floor',
                'name' => 'water_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 1106,
                'group' => 'diagnosis_check_immersion_engine_room',
                'name' => 'dirt_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 1107,
                'group' => 'diagnosis_check_exterior',
                'name' => 'scratch_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 1108,
                'group' => 'diagnosis_check_interior',
                'name' => 'grade_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 1109,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_engine',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 1110,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_transmission',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 1111,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_break',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 1112,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_alignment',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 1113,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_steering',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 1114,
                'group' => 'diagnosis_driving',
                'name' => 'diagnosis_driving_opinion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 1115,
                'group' => 'diagnosis_driving_engine',
                'name' => 'noise_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 1116,
                'group' => 'diagnosis_driving_transmission',
                'name' => 'noise_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 1117,
                'group' => 'diagnosis_driving_break',
                'name' => 'operation_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 1118,
                'group' => 'diagnosis_driving_alignment',
                'name' => 'operation_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 1119,
                'group' => 'diagnosis_driving_steering',
                'name' => 'operation_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 1120,
                'group' => 'diagnosis_operation',
                'name' => 'diagnosis_operation_egine',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 1121,
                'group' => 'diagnosis_operation',
                'name' => 'diagnosis_operation_transmission',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 1122,
                'group' => 'diagnosis_operation',
                'name' => 'diagnosis_operation_break',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 1123,
                'group' => 'diagnosis_operation',
                'name' => 'diagnosis_operation_steering',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 1124,
                'group' => 'diagnosis_operation',
                'name' => 'diagnosis_operation_leakage',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 1125,
                'group' => 'diagnosis_operation_egine',
                'name' => 'noise_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 1126,
                'group' => 'diagnosis_operation_transmission',
                'name' => 'noise_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 1127,
                'group' => 'diagnosis_operation_break',
                'name' => 'operation_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 1128,
                'group' => 'diagnosis_operation_steering',
                'name' => 'operation_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 1129,
                'group' => 'diagnosis_operation_leakage',
                'name' => 'leakage_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 1130,
                'group' => 'diagnosis_expendables',
                'name' => 'diagnosis_expendables_tire',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 1131,
                'group' => 'diagnosis_expendables',
                'name' => 'diagnosis_expendables_oil',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 1132,
                'group' => 'diagnosis_expendables',
                'name' => 'diagnosis_expendables_water',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 1133,
                'group' => 'diagnosis_expendables',
                'name' => 'diagnosis_expendables_break',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 1134,
                'group' => 'diagnosis_expendables',
                'name' => 'diagnosis_expendables_battery',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 1135,
                'group' => 'diagnosis_expendables_tire',
                'name' => 'replacement_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 1136,
                'group' => 'diagnosis_expendables_oil',
                'name' => 'pollution_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 1137,
                'group' => 'diagnosis_expendables_water',
                'name' => 'pollution_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 1138,
                'group' => 'diagnosis_expendables_break',
                'name' => 'replacement_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 1139,
                'group' => 'diagnosis_expendables_battery',
                'name' => 'replacement_status_cd',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 1140,
                'group' => 'diagnosis_exterior_picture_cd',
                'name' => 'front',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 1141,
                'group' => 'diagnosis_exterior_picture_cd',
                'name' => 'rear',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 1142,
                'group' => 'diagnosis_exterior_picture_cd',
                'name' => 'left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 1143,
                'group' => 'diagnosis_exterior_picture_cd',
                'name' => 'right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 1144,
                'group' => 'attachment_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 1145,
                'group' => 'attachment_status_cd',
                'name' => 'different',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 1146,
                'group' => 'attachment_status_cd',
                'name' => 'corrosion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 1147,
                'group' => 'attachment_status_cd',
                'name' => 'modulation',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 1148,
                'group' => 'attachment_status_cd',
                'name' => 'damage',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 1149,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'white',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 1150,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'black',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 1151,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'gray',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 1152,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'red',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 1153,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'blue',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 1154,
                'group' => 'diagnosis_info_color_cd',
                'name' => 'etc',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 1155,
                'group' => 'repair_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 1156,
                'group' => 'repair_status_cd',
                'name' => 'repair',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 1157,
                'group' => 'repair_status_cd',
                'name' => 'none',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 1158,
                'group' => 'history_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 1159,
                'group' => 'history_status_cd',
                'name' => 'history',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 1160,
                'group' => 'exterior_position_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 1161,
                'group' => 'exterior_position_cd',
                'name' => 'history',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 1162,
                'group' => 'exterior_position_cd',
                'name' => 'hood',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 1163,
                'group' => 'exterior_position_cd',
                'name' => 'front_fender_left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 1164,
                'group' => 'exterior_position_cd',
                'name' => 'front_fender_right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 1165,
                'group' => 'exterior_position_cd',
                'name' => 'front_door_left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 1166,
                'group' => 'exterior_position_cd',
                'name' => 'front_door_right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 1167,
                'group' => 'exterior_position_cd',
                'name' => 'rear_door_left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 1168,
                'group' => 'exterior_position_cd',
                'name' => 'rear_door_right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 1169,
                'group' => 'exterior_position_cd',
                'name' => 'side_seats_left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 1170,
                'group' => 'exterior_position_cd',
                'name' => 'side_seats_right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 1171,
                'group' => 'exterior_position_cd',
                'name' => 'quarter_panel_left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 1172,
                'group' => 'exterior_position_cd',
                'name' => 'quarter_panel_right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 1173,
                'group' => 'exterior_position_cd',
                'name' => 'roof_panel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 1174,
                'group' => 'exterior_position_cd',
                'name' => 'trunk_lead',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 1175,
                'group' => 'interior_position_cd',
                'name' => 'front_panel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 1176,
                'group' => 'interior_position_cd',
                'name' => 'hill_house_front/left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 1177,
                'group' => 'interior_position_cd',
                'name' => 'hill_house_front/right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 1178,
                'group' => 'interior_position_cd',
                'name' => 'hill_house_rear/left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 1179,
                'group' => 'interior_position_cd',
                'name' => 'hill_house_rear/right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 1180,
                'group' => 'interior_position_cd',
                'name' => 'cross_memeber_front',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 1181,
                'group' => 'interior_position_cd',
                'name' => 'cross_memeber_back',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 1182,
                'group' => 'interior_position_cd',
                'name' => 'side_member_front/left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 1183,
                'group' => 'interior_position_cd',
                'name' => 'side_member_front/right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 1184,
                'group' => 'interior_position_cd',
                'name' => 'side_member_rear/left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 1185,
                'group' => 'interior_position_cd',
                'name' => 'side_member_rear/right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 1186,
                'group' => 'interior_position_cd',
                'name' => 'filler_a-left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 1187,
                'group' => 'interior_position_cd',
                'name' => 'filler_a-right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 1188,
                'group' => 'interior_position_cd',
                'name' => 'filler_b-left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 1189,
                'group' => 'interior_position_cd',
                'name' => 'filler_b-right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 1190,
                'group' => 'interior_position_cd',
                'name' => 'filler_c-left',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 1191,
                'group' => 'interior_position_cd',
                'name' => 'filler_c-right',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 1192,
                'group' => 'interior_position_cd',
                'name' => 'dash_panel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 1193,
                'group' => 'interior_position_cd',
                'name' => 'trunk_floor',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 1194,
                'group' => 'interior_position_cd',
                'name' => 'rear_panel',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 1195,
                'group' => 'diagnosis_part_status_cd',
                'name' => 'replacement',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 1196,
                'group' => 'diagnosis_part_status_cd',
                'name' => 'welding',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 1197,
                'group' => 'diagnosis_part_status_cd',
                'name' => 'need_repair',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 1198,
                'group' => 'diagnosis_part_status_cd',
                'name' => 'scratch',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 1199,
                'group' => 'diagnosis_part_status_cd',
                'name' => 'corrosion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 1200,
                'group' => 'immersion_repair_status_cd',
                'name' => 'none',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 1201,
                'group' => 'immersion_repair_status_cd',
                'name' => 'simple',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 1202,
                'group' => 'immersion_repair_status_cd',
                'name' => 'core',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 1203,
                'group' => 'stink_status_cd',
                'name' => 'none',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 1204,
                'group' => 'stink_status_cd',
                'name' => 'yes',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 1205,
                'group' => 'stink_status_cd',
                'name' => 'suspicion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 1206,
                'group' => 'water_status_cd',
                'name' => 'no',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 1207,
                'group' => 'water_status_cd',
                'name' => 'yes',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 1208,
                'group' => 'water_status_cd',
                'name' => 'suspicion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 1209,
                'group' => 'dirt_status_cd',
                'name' => 'no',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 1210,
                'group' => 'dirt_status_cd',
                'name' => 'yes',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 1211,
                'group' => 'scratch_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 1212,
                'group' => 'scratch_status_cd',
                'name' => 'scratch',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 1213,
                'group' => 'scratch_status_cd',
                'name' => 'corrosion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 1214,
                'group' => 'scratch_status_cd',
                'name' => 'maintenance',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 1215,
                'group' => 'grade_cd',
                'name' => 'top',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 1216,
                'group' => 'grade_cd',
                'name' => 'middle',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 1217,
                'group' => 'grade_cd',
                'name' => 'bottom',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 1218,
                'group' => 'noise_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 1219,
                'group' => 'noise_status_cd',
                'name' => 'noise',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 1220,
                'group' => 'noise_status_cd',
                'name' => 'maintenance',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 1221,
                'group' => 'operation_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 1222,
                'group' => 'operation_status_cd',
                'name' => 'maintenance',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 1223,
                'group' => 'leakage_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 1224,
                'group' => 'leakage_status_cd',
                'name' => 'fineleak',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 1225,
                'group' => 'leakage_status_cd',
                'name' => 'leak',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 1226,
                'group' => 'replacement_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 1227,
                'group' => 'replacement_status_cd',
                'name' => 'normal',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 1228,
                'group' => 'replacement_status_cd',
                'name' => 'maintenance',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 1229,
                'group' => 'pollution_status_cd',
                'name' => 'good',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 1230,
                'group' => 'pollution_status_cd',
                'name' => 'pollution',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 1231,
                'group' => 'pollution_status_cd',
                'name' => 'maintenance',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 1232,
                'group' => 'diagnosis_review',
                'name' => 'diagnosis_review_opinion',
                'created_at' => '2017-06-01 22:55:12',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}