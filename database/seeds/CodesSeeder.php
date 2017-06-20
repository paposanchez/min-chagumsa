<?php

use Illuminate\Database\Seeder;

class CodesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('codes')->insert([
            ['id'=>1, 'group' => 'user_status', 'name' => 'active'],
            ['id'=>2, 'group' => 'user_status', 'name' => 'unactive'],
            ['id'=>3, 'group' => 'yn', 'name' => 'yes'],
            ['id'=>4, 'group' => 'yn', 'name' => 'no'],
            ['id'=>5, 'group' => 'post_shown_role', 'name' => 'secret'],
            ['id'=>6, 'group' => 'post_shown_role', 'name' => 'public'],
            ['id'=>7, 'group' => 'post_shown_role', 'name' => 'private'],
            ['id'=>8, 'group' => 'post_search_field', 'name' => 'subject'],
            ['id'=>9, 'group' => 'post_search_field', 'name' => 'content'],
            ['id'=>10, 'group' => 'post_search_field', 'name' => 'writer_name']
        ]);


        DB::table('codes')->insert([
            ['id'=>100, 'group' => 'order_status', 'name' => 'canceled'],     // 주문취소
            ['id'=>101, 'group' => 'order_status', 'name' => 'standby'],      // 주문신청
            ['id'=>102, 'group' => 'order_status', 'name' => 'ordered'],      // 주문완료
            ['id'=>103, 'group' => 'order_status', 'name' => 'request'],      // 예약확인
            ['id'=>104, 'group' => 'order_status', 'name' => 'reserved'],     // 입고대기
            ['id'=>105, 'group' => 'order_status', 'name' => 'arrived'],      // 입고
            ['id'=>106, 'group' => 'order_status', 'name' => 'diagnosing'],   // 진단중
            ['id'=>107, 'group' => 'order_status', 'name' => 'diagnosed'],    // 진단완료,발급요청
            ['id'=>108, 'group' => 'order_status', 'name' => 'certificating'],// 검토중
            ['id'=>109, 'group' => 'order_status', 'name' => 'certificated'], // 인증발급완료
        ]);


        // 진단코드의 시퀀스 변경
        DB::table('codes')->insert( ['id'=>1000, 'group' => 'car_option', 'name' => 'appearence']);
        DB::table('codes')->insert([
            ['group' => 'car_option', 'name' => 'multimedia'],
            ['group' => 'car_option', 'name' => 'built-in'],
            ['group' => 'car_option', 'name' => 'safety'],
            ['group' => 'car_option', 'name' => 'convenience'],
            ['group' => 'car_option_exterior', 'name' => 'HID'],
            ['group' => 'car_option_exterior', 'name' => 'powered_side_mirror'],
            ['group' => 'car_option_exterior', 'name' => 'sun_roof'],
            ['group' => 'car_option_exterior', 'name' => 'panorama_sun_roof'],
            ['group' => 'car_option_exterior', 'name' => 'roof_back'],
            ['group' => 'car_option_exterior', 'name' => 'aluminum_wheel'],
            ['group' => 'car_option_multimedia', 'name' => 'cd_player'],
            ['group' => 'car_option_multimedia', 'name' => 'cd_changer'],
            ['group' => 'car_option_multimedia', 'name' => 'av_system'],
            ['group' => 'car_option_multimedia', 'name' => 'rear_tv'],
            ['group' => 'car_option_multimedia', 'name' => 'aux_socket'],
            ['group' => 'car_option_multimedia', 'name' => 'usb_socket'],
            ['group' => 'car_option_multimedia', 'name' => 'ipod_socket'],
            ['group' => 'car_option_interior', 'name' => 'steering_wheel_remotecontroller'],
            ['group' => 'car_option_interior', 'name' => 'power_steering'],
            ['group' => 'car_option_interior', 'name' => 'ecm'],
            ['group' => 'car_option_interior', 'name' => 'leather_sheet'],
            ['group' => 'car_option_interior', 'name' => 'powered_seat_in_driver'],
            ['group' => 'car_option_interior', 'name' => 'powered_seat_in_passenger'],
            ['group' => 'car_option_interior', 'name' => 'hit_seat_in_front'],
            ['group' => 'car_option_interior', 'name' => 'git_seat_in_rear'],
            ['group' => 'car_option_interior', 'name' => 'memory_seat'],
            ['group' => 'car_option_interior', 'name' => 'ventilation_seat_in_front'],
            ['group' => 'car_option_safety', 'name' => 'airbag_in_driver'],
            ['group' => 'car_option_safety', 'name' => 'airbag_in_passenger'],
            ['group' => 'car_option_safety', 'name' => 'airbah_side'],
            ['group' => 'car_option_safety', 'name' => 'curtain_airbag'],
            ['group' => 'car_option_safety', 'name' => 'rear_sensor'],
            ['group' => 'car_option_safety', 'name' => 'rear_camera'],
            ['group' => 'car_option_safety', 'name' => 'abs'],
            ['group' => 'car_option_safety', 'name' => 'tcs'],
            ['group' => 'car_option_safety', 'name' => 'position_controller'],
            ['group' => 'car_option_safety', 'name' => 'ecs'],
            ['group' => 'car_option_safety', 'name' => 'tpms'],
            ['group' => 'car_option_safety', 'name' => 'power_doorlock'],
            ['group' => 'car_option_facilities', 'name' => 'auto_airconditioner'],
            ['group' => 'car_option_facilities', 'name' => 'remote_door_lock'],
            ['group' => 'car_option_facilities', 'name' => 'smart_key'],
            ['group' => 'car_option_facilities', 'name' => 'power_trunk'],
            ['group' => 'car_option_facilities', 'name' => 'power_window'],
            ['group' => 'car_option_facilities', 'name' => 'cruise_control'],
            ['group' => 'car_option_facilities', 'name' => 'navigation'],
            ['group' => 'car_option_facilities', 'name' => 'handsfree'],
            ['group' => 'car_option_facilities', 'name' => 'high_pass'],
            ['group' => 'car_option_facilities', 'name' => 'button_start'],
            ['group' => 'fuel_type', 'name' => 'gasoline'],
            ['group' => 'fuel_type', 'name' => 'e-85_gasoline'],
            ['group' => 'fuel_type', 'name' => 'gasoline_hybrid'],
            ['group' => 'fuel_type', 'name' => 'diesel'],
            ['group' => 'fuel_type', 'name' => 'electric'],
            ['group' => 'fuel_type', 'name' => 'compressed_natural_gas'],
            ['group' => 'fuel_type', 'name' => 'none'],
            ['group' => 'drivetrain', 'name' => '4x2/2_wheel'],
            ['group' => 'drivetrain', 'name' => '4x4/4_wheel'],
            ['group' => 'drivetrain', 'name' => 'awd'],
            ['group' => 'drivetrain', 'name' => 'fwd'],
            ['group' => 'drivetrain', 'name' => 'rwd'],
            ['group' => 'drivetrain', 'name' => 'none'],
            ['group' => 'transmission', 'name' => 'manual'],
            ['group' => 'transmission', 'name' => 'automatic'],
            ['group' => 'transmission', 'name' => 'automanual'],
            ['group' => 'transmission', 'name' => 'cvt'],
            ['group' => 'transmission', 'name' => 'other'],


            ['group' => 'car_picture_cd', 'name' => 'front'],
            ['group' => 'car_picture_cd', 'name' => 'rear'],
            ['group' => 'car_picture_cd', 'name' => 'left'],
            ['group' => 'car_picture_cd', 'name' => 'right'],

            ['group' => 'attachment_status_cd', 'name' => 'good'],
            ['group' => 'attachment_status_cd', 'name' => 'different'],
            ['group' => 'attachment_status_cd', 'name' => 'corrosion'],
            ['group' => 'attachment_status_cd', 'name' => 'modulation'],
            ['group' => 'attachment_status_cd', 'name' => 'damage'],

            ['group' => 'diagnosis_info_color_cd','name' =>  'white'],
            ['group' => 'diagnosis_info_color_cd', 'name' => 'black'],
            ['group' => 'diagnosis_info_color_cd','name' =>  'gray'],
            ['group' => 'diagnosis_info_color_cd', 'name' => 'red'],
            ['group' => 'diagnosis_info_color_cd','name' =>  'blue'],
            ['group' => 'diagnosis_info_color_cd','name' =>  'etc'],



            ['group' => 'repair_status_cd', 'name' => 'good'],
            ['group' => 'repair_status_cd', 'name' => 'repair'],
            ['group' => 'repair_status_cd', 'name' => 'none'],
            ['group' => 'history_status_cd', 'name' => 'good'],
            ['group' => 'history_status_cd', 'name' => 'history'],
            ['group' => 'exterior_position_cd', 'name' => 'good'],
            ['group' => 'exterior_position_cd', 'name' => 'history'],
            ['group' => 'exterior_position_cd', 'name' => 'hood'],
            ['group' => 'exterior_position_cd', 'name' => 'front_fender_left'],
            ['group' => 'exterior_position_cd', 'name' => 'front_fender_right'],
            ['group' => 'exterior_position_cd', 'name' => 'front_door_left'],
            ['group' => 'exterior_position_cd', 'name' => 'front_door_right'],
            ['group' => 'exterior_position_cd', 'name' => 'rear_door_left'],
            ['group' => 'exterior_position_cd', 'name' => 'rear_door_right'],
            ['group' => 'exterior_position_cd', 'name' => 'side_seats_left'],
            ['group' => 'exterior_position_cd', 'name' => 'side_seats_right'],
            ['group' => 'exterior_position_cd', 'name' => 'quarter_panel_left'],
            ['group' => 'exterior_position_cd', 'name' => 'quarter_panel_right'],
            ['group' => 'exterior_position_cd', 'name' => 'roof_panel'],
            ['group' => 'exterior_position_cd', 'name' => 'trunk_lead'],
            ['group' => 'interior_position_cd', 'name' => 'front_panel'],
            ['group' => 'interior_position_cd', 'name' => 'hill_house_front/left'],
            ['group' => 'interior_position_cd', 'name' => 'hill_house_front/right'],
            ['group' => 'interior_position_cd', 'name' => 'hill_house_rear/left'],
            ['group' => 'interior_position_cd', 'name' => 'hill_house_rear/right'],
            ['group' => 'interior_position_cd', 'name' => 'cross_memeber_front'],
            ['group' => 'interior_position_cd', 'name' => 'cross_memeber_back'],
            ['group' => 'interior_position_cd', 'name' => 'side_member_front/left'],
            ['group' => 'interior_position_cd', 'name' => 'side_member_front/right'],
            ['group' => 'interior_position_cd', 'name' => 'side_member_rear/left'],
            ['group' => 'interior_position_cd', 'name' => 'side_member_rear/right'],
            ['group' => 'interior_position_cd', 'name' => 'filler_a-left'],
            ['group' => 'interior_position_cd', 'name' => 'filler_a-right'],
            ['group' => 'interior_position_cd', 'name' => 'filler_b-left'],
            ['group' => 'interior_position_cd', 'name' => 'filler_b-right'],
            ['group' => 'interior_position_cd', 'name' => 'filler_c-left'],
            ['group' => 'interior_position_cd', 'name' => 'filler_c-right'],
            ['group' => 'interior_position_cd', 'name' => 'dash_panel'],
            ['group' => 'interior_position_cd', 'name' => 'trunk_floor'],
            ['group' => 'interior_position_cd', 'name' => 'rear_panel'],
            ['group' => 'diagnosis_part_status_cd', 'name' => 'replacement'],
            ['group' => 'diagnosis_part_status_cd', 'name' => 'welding'],
            ['group' => 'diagnosis_part_status_cd', 'name' => 'need_repair'],
            ['group' => 'diagnosis_part_status_cd', 'name' => 'scratch'],
            ['group' => 'diagnosis_part_status_cd', 'name' => 'corrosion'],
            ['group' => 'immersion_repair_status_cd', 'name' => 'none'],
            ['group' => 'immersion_repair_status_cd', 'name' => 'simple'],
            ['group' => 'immersion_repair_status_cd', 'name' => 'core'],
            ['group' => 'stink_status_cd','name' =>  'none'],
            ['group' => 'stink_status_cd', 'name' => 'yes'],
            ['group' => 'stink_status_cd','name' =>  'suspicion'],
            ['group' => 'water_status_cd','name' =>  'no'],
            ['group' => 'water_status_cd','name' =>  'yes'],
            ['group' => 'water_status_cd', 'name' => 'suspicion'],
            ['group' => 'dirt_status_cd', 'name' => 'no'],
            ['group' => 'dirt_status_cd', 'name' => 'yes'],
            ['group' => 'scratch_status_cd', 'name' => 'good'],
            ['group' => 'scratch_status_cd', 'name' => 'scratch'],
            ['group' => 'scratch_status_cd', 'name' => 'corrosion'],
            ['group' => 'scratch_status_cd', 'name' => 'maintenance'],
            ['group' => 'grade_cd', 'name' => 'top'],
            ['group' => 'grade_cd', 'name' => 'middle'],
            ['group' => 'grade_cd', 'name' => 'bottom'],
            ['group' => 'noise_status_cd', 'name' => 'good'],
            ['group' => 'noise_status_cd', 'name' => 'noise'],
            ['group' => 'noise_status_cd', 'name' => 'maintenance'],
            ['group' => 'operation_status_cd','name' =>  'good'],
            ['group' => 'operation_status_cd','name' =>  'maintenance'],
            ['group' => 'leakage_status_cd', 'name' => 'good'],
            ['group' => 'leakage_status_cd', 'name' => 'fineleak'],
            ['group' => 'leakage_status_cd', 'name' => 'leak'],
            ['group' => 'replacement_status_cd', 'name' => 'good'],
            ['group' => 'replacement_status_cd', 'name' => 'normal'],
            ['group' => 'replacement_status_cd', 'name' => 'maintenance'],
            ['group' => 'pollution_status_cd','name' =>  'good'],
            ['group' => 'pollution_status_cd','name' =>  'pollution'],
<<<<<<< HEAD
            ['group' => 'pollution_status_cd', 'name' => 'maintenance']




            ['group' => 'diagnosis', 'name' => 'diagnosis_info'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_info'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_mileage'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_vinnumber'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_color'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_option'],
                  ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_opinion'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_exterior'],
                  ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_picture'],
                  ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_status'],
                  ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_interior'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_car_bottom'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_engine_room'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_status'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_check'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_status'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_immersion'],
                        실내악취
                        앞좌석 실내바닥
                        트렁크 실내바닥
                        엔진룸(휴즈박스)
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_exterior'],
                        외판(도장)
                        등화
                        범퍼
                        유리(후사경포함)
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_interior'],
                        계기패널
                        콘솔박스
                        내장∙트림
                        시트
                        매트
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_plugin'],
                  도어록 작동상태
                  유리기어 작동상태
                  리모콘 작동상태
                  와이퍼 작동상태
                  와이퍼 작동상태
                  사이드미러 작동상태
                  선루프(순정)
                  네비게이션∙AV시스템(순정)
                  전동시트∙열선∙통풍순정)
                  후방카메라(순정)
                  기타 추가장착품
                  작동상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_expendables'],
            엔진오일 상태
            냉각수 상태
            브레이크패드 상태
            배터리 상태
            타이밍벨트
            팬벨트 및 텐서너
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_troubleshoot'],
            엔진
            변속기
            고장진단상태의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_powermover'],
            작동상태(공회전)
            오일누유
                  실린더헤드가스켓
                  로커암커버카스켓
                  엔진오일팬카스켓
                  엔진오일쿨러카스켓
                  실린더 블럭
            냉각수누수
                  실린더 블럭
                  실린더 헤드/가스켓
                  워터펌프
                  냉각쿨러(라디에이터)
                  냉각호스 및 히터호스
                  냉각수량 및 오염
            오일유량 및 오염
            엔진마운트
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_transmission'],
            자동변속기(A/T)
                  오일누유
                  오일유량 및 상태
                  작동상태(시운전)
                  변속기마운트
            수동변속기(M/T)
                  오일누유
                  오일유량 및 상태
                  기어변속장치
                  작동상태(시운전)
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_power_transmission'],
            등속조인트
            추진축 및 베어링
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_steering'],
            휠얼라인먼트
            작동상태
                  스티어링 기어
                  MDPS 모듈
                  스티어링 펌프
                  로워암
                  스테이빌라이저링크
                  스트럿트 암
                  어퍼암
                  속업쇼바(에어쇼바)
                  타이로드엔드/볼죠인트
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_braking'],
            브레이크 오일 유량상태
            EPB 모듈
            SBC 모듈
            브레이크 디스크
            브레이크 오일누유
            배력장치 상태
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_electronices'],
            발전기 출력
            시동모터
            실내송풍 모터
            라디에이터 팬 모터
            상태 의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_wheeltire'],
            휠(wheel) 손상
            타이어 편마모
            타이어 접지면 깊이
            타이어 제조일(DOT)
            상태 의견            
            ['group' => 'diagnosis', 'name' => 'diagnosis_driving'],
            엔진
            변속기
            브레이크
            조향장치
            동력전달장치
            상태의견
            ['group' => 'diagnosis', 'name' => 'diagnosis_review'],



            //======================================================================================

                  
                        ['group' => 'diagnosis_exterior_picture', 'name' => 'diagnosis_exterior_picture_cd'],
                        ['group' => 'diagnosis_exterior_status', 'name' => 'history_status_cd'],
                        ['group' => 'diagnosis_exterior_status', 'name' => 'diagnosis_exterior_position'],
                        ['group' => 'diagnosis_exterior_status', 'name' => 'diagnosis_part_status_cd'],

                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_car_bottom'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_engine_room'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_status'],
                  ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_opinion'],
                        ['group' => 'diagnosis_interior_status', 'name' => 'history_status_cd'],
                        ['group' => 'diagnosis_interior_status', 'name' => 'diagnosis_interior_position'],
                        ['group' => 'diagnosis_interior_status', 'name' => 'diagnosis_part_status_cd'],
                  
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_status'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_immersion'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_exterior'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_opinion'],
                  ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_interior'],
                        // ['group' => 'diagnosis_check_status', 'name' => 'repair_status_cd'],
                        ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_stink'],
                        ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_front_floor'],
                        ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_trunk_floor'],
                        ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_engine_room'],
                        // ['group' => 'diagnosis_check_immersion_stink', 'stink_status_cd'],
                        // ['group' => 'diagnosis_check_immersion_front_floor', 'name' => 'water_status_cd'],
                        // ['group' => 'diagnosis_check_immersion_trunk_floor', 'name' => 'water_status_cd'],
                        // ['group' => 'diagnosis_check_immersion_engine_room', 'name' => 'dirt_status_cd'],
                        // ['group' => 'diagnosis_check_exterior', 'name' => 'scratch_status_cd'],
                        // ['group' => 'diagnosis_check_interior', 'name' => 'grade_cd'],

                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_engine'],
                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_transmission'],
                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_break'],
                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_alignment'],
                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_steering'],
                  ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_opinion'],
                        // ['group' => 'diagnosis_driving_engine', 'name' => 'noise_status_cd'],
                        // ['group' => 'diagnosis_driving_transmission', 'name' => 'noise_status_cd'],
                        // ['group' => 'diagnosis_driving_break', 'name' => 'operation_status_cd'],
                        // ['group' => 'diagnosis_driving_alignment', 'name' => 'operation_status_cd'],
                        // ['group' => 'diagnosis_driving_steering', 'name' => 'operation_status_cd'],
                        
                  ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_egine'],
                  ['group' => 'diagnosis_operation', 'name' => 'diagnosis_operation_transmission'],
                  ['group' => 'diagnosis_operation', 'name' => 'diagnosis_operation_break'],
                  ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_steering'],
                  ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_leakage'],
                  ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_leakage'],
                  ['group' => 'diagnosis_operation', 'name' => 'diagnosis_operation_opinion'],
                        // ['group' => 'diagnosis_operation_egine', 'name' => 'noise_status_cd'],
                        // ['group' => 'diagnosis_operation_transmission', 'name' => 'noise_status_cd'],
                        // ['group' => 'diagnosis_operation_break', 'name' => 'operation_status_cd'],
                        // ['group' => 'diagnosis_operation_steering', 'name' => 'operation_status_cd'],
                        // ['group' => 'diagnosis_operation_leakage', 'name' => 'leakage_status_cd'],

                  ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_tire'],
                  ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_oil'],
                  ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_water'],
                  ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_break'],
                  ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_battery'],

                        // ['group' => 'diagnosis_expendables_tire', 'name' => 'replacement_status_cd'],
                        // ['group' => 'diagnosis_expendables_oil', 'name' => 'pollution_status_cd'],
                        // ['group' => 'diagnosis_expendables_water', 'name' => 'pollution_status_cd'],
                        // ['group' => 'diagnosis_expendables_break', 'name' => 'replacement_status_cd'],
                        // ['group' => 'diagnosis_expendables_battery', 'name' => 'replacement_status_cd'],

                  ['group' => 'diagnosis_review', 'name' => 'diagnosis_review_opinion'],
                  












=======
            ['group' => 'pollution_status_cd', 'name' => 'maintenance'],

            //주행거리 및 평가항목 코드 추가함
            ['grpup' => 'standard_cd', 'name' => 'excess'], // 초과
            ['grpup' => 'standard_cd', 'name' => 'standard'],// 평균
            ['grpup' => 'standard_cd', 'name' => 'shortfall'], // 미달
            //사고코드추가
            ['group' => 'accident_cd', 'name' => 'none'], //무사고
            ['group' => 'accident_cd', 'name' => 'simpe_swap'], //단순교환
            ['group' => 'accident_cd', 'name' => 'middle_damage'], //중손상
            ['group' => 'accident_cd', 'name' => 'big_damage'], //대손상
>>>>>>> 699c9c6a61f9ab362f2434a58cac9d4cb03bd79c
        ]);
        

        
    }

}
