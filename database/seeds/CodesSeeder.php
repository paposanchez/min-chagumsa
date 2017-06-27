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
            ['id'=>1, 'group' => 'user_state', 'name' => 'active'],
            ['id'=>2, 'group' => 'user_state', 'name' => 'unactive'],
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
            ['id'=>100, 'group' => 'order_state', 'name' => 'canceled'],     // 주문취소
            ['id'=>101, 'group' => 'order_state', 'name' => 'standby'],      // 주문신청
            ['id'=>102, 'group' => 'order_state', 'name' => 'ordered'],      // 주문완료
            ['id'=>103, 'group' => 'order_state', 'name' => 'request'],      // 예약확인
            ['id'=>104, 'group' => 'order_state', 'name' => 'reserved'],     // 입고대기
            ['id'=>105, 'group' => 'order_state', 'name' => 'arrived'],      // 입고
            ['id'=>106, 'group' => 'order_state', 'name' => 'diagnosing'],   // 진단중
            ['id'=>107, 'group' => 'order_state', 'name' => 'diagnosed'],    // 진단완료,발급요청
            ['id'=>108, 'group' => 'order_state', 'name' => 'certificating'],// 검토중
            ['id'=>109, 'group' => 'order_state', 'name' => 'certificated'], // 인증발급완료
        ]);


        // 진단코드의 시퀀스 변경
        DB::table('codes')->insert( ['id'=>1000, 'group' => 'diagnosis_state_group', 'name' => 'car_option']);
        DB::table('codes')->insert([
            ['group' => 'diagnosis_state_group', 'name' => 'car_option_exterior'],
            ['group' => 'diagnosis_state_group', 'name' => 'car_option_multimedia'],
            ['group' => 'diagnosis_state_group', 'name' => 'car_option_interior'],
            ['group' => 'diagnosis_state_group', 'name' => 'car_option_safety'],
            ['group' => 'diagnosis_state_group', 'name' => 'car_option_facilities'],
            ['group' => 'diagnosis_state_group', 'name' => 'fuel_type'],
            ['group' => 'diagnosis_state_group', 'name' => 'drivetrain'],
            ['group' => 'diagnosis_state_group', 'name' => 'transmission'],
            ['group' => 'diagnosis_state_group', 'name' => 'car_picture_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'attachment_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'color_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'repair_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'history_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'exterior_position_left_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'exterior_position_center_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'exterior_position_right_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'interior_position_left_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'interior_position_center_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'interior_position_right_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'part_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'accident_repair_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'stink_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'water_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'dirt_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'scratch_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'noise_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'operation_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'replacement_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'pollution_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'crack_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'interior_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'leather_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'working_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'leackoil_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'leakwater_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'leakwater_leak_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'leakwater_noise_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'water_amount_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'vibration_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'oil_amount_state'],
            ['group' => 'diagnosis_state_group', 'name' => 'shock_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'transmission_state'],
            ['group' => 'diagnosis_state_group', 'name' => 'gear_transmission_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'gear_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'steering_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'pump_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'shoba_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'sbc_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'break_oil_state_cd'],
            ['group' => 'diagnosis_state_group', 'name' => 'engine_state_cd'],


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
            ['group' => 'car_option_interior', 'name' => 'hit_seat_in_rear'],
            ['group' => 'car_option_interior', 'name' => 'memory_seat'],
            ['group' => 'car_option_interior', 'name' => 'ventilation_seat_in_front'],

            ['group' => 'car_option_safety', 'name' => 'airbag_in_driver'],
            ['group' => 'car_option_safety', 'name' => 'airbag_in_passenger'],
            ['group' => 'car_option_safety', 'name' => 'airbag_side'],
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

            /////////////////////////////////////////////////////////////

            ['group' => 'attachment_state_cd', 'name' => 'good'],
            ['group' => 'attachment_state_cd', 'name' => 'different'],
            ['group' => 'attachment_state_cd', 'name' => 'corrosion'],
            ['group' => 'attachment_state_cd', 'name' => 'modulation'],
            ['group' => 'attachment_state_cd', 'name' => 'damage'],

            ['group' => 'color_cd','name' =>  'white'],
            ['group' => 'color_cd', 'name' => 'black'],
            ['group' => 'color_cd','name' =>  'gray'],
            ['group' => 'color_cd', 'name' => 'red'],
            ['group' => 'color_cd','name' =>  'blue'],
            ['group' => 'color_cd','name' =>  'etc'],

            ['group' => 'repair_state_cd', 'name' => 'good'],
            ['group' => 'repair_state_cd', 'name' => 'repair'],
            ['group' => 'repair_state_cd', 'name' => 'none'],

            ['group' => 'history_state_cd', 'name' => 'good'],
            ['group' => 'history_state_cd', 'name' => 'history'],

            ['group' => 'exterior_position_left_cd', 'name' => 'front_fender_left'],
            ['group' => 'exterior_position_left_cd', 'name' => 'front_door_left'],
            ['group' => 'exterior_position_left_cd', 'name' => 'rear_door_left'],
            ['group' => 'exterior_position_left_cd', 'name' => 'side_seats_left'],
            ['group' => 'exterior_position_left_cd', 'name' => 'quarter_panel_left'],

            ['group' => 'exterior_position_center_cd', 'name' => 'hood'],
            ['group' => 'exterior_position_center_cd', 'name' => 'roof_panel'],
            ['group' => 'exterior_position_center_cd', 'name' => 'trunk_lead'],

            ['group' => 'exterior_position_right_cd', 'name' => 'front_fender_right'],
            ['group' => 'exterior_position_right_cd', 'name' => 'front_door_right'],
            ['group' => 'exterior_position_right_cd', 'name' => 'rear_door_right'],
            ['group' => 'exterior_position_right_cd', 'name' => 'side_seats_right'],
            ['group' => 'exterior_position_right_cd', 'name' => 'quarter_panel_right'],

            ['group' => 'interior_position_left_cd', 'name' => 'filler_a-left'],
            ['group' => 'interior_position_left_cd', 'name' => 'filler_b-left'],
            ['group' => 'interior_position_left_cd', 'name' => 'filler_c-left'],

            ['group' => 'interior_position_center_cd', 'name' => 'front_panel'],
            ['group' => 'interior_position_center_cd', 'name' => 'hill_house_front/left'],
            ['group' => 'interior_position_center_cd', 'name' => 'hill_house_front/right'],
            ['group' => 'interior_position_center_cd', 'name' => 'hill_house_rear/left'],
            ['group' => 'interior_position_center_cd', 'name' => 'hill_house_rear/right'],
            ['group' => 'interior_position_center_cd', 'name' => 'cross_member_front'],
            ['group' => 'interior_position_center_cd', 'name' => 'cross_member_back'],
            ['group' => 'interior_position_center_cd', 'name' => 'side_member_front/left'],
            ['group' => 'interior_position_center_cd', 'name' => 'side_member_front/right'],
            ['group' => 'interior_position_center_cd', 'name' => 'side_member_rear/left'],
            ['group' => 'interior_position_center_cd', 'name' => 'side_member_rear/right'],
            ['group' => 'interior_position_center_cd', 'name' => 'dash_panel'],
            ['group' => 'interior_position_center_cd', 'name' => 'floor'],
            ['group' => 'interior_position_center_cd', 'name' => 'trunk_floor'],
            ['group' => 'interior_position_center_cd', 'name' => 'rear_panel'],

            ['group' => 'interior_position_right_cd', 'name' => 'filler_a-right'],
            ['group' => 'interior_position_right_cd', 'name' => 'filler_b-right'],
            ['group' => 'interior_position_right_cd', 'name' => 'filler_c-right'],

            ['group' => 'part_state_cd', 'name' => 'replacement'],
            ['group' => 'part_state_cd', 'name' => 'welding'],
            ['group' => 'part_state_cd', 'name' => 'need_repair'],
            ['group' => 'part_state_cd', 'name' => 'scratch'],
            ['group' => 'part_state_cd', 'name' => 'corrosion'],

            ['group' => 'accident_repair_state_cd', 'name' => 'none'],
            ['group' => 'accident_repair_state_cd', 'name' => 'simple'],
            ['group' => 'accident_repair_state_cd', 'name' => 'basic'],
            ['group' => 'accident_repair_state_cd', 'name' => 'core'],

            ['group' => 'stink_state_cd','name' =>  'none'],
            ['group' => 'stink_state_cd', 'name' => 'yes'],
            ['group' => 'stink_state_cd','name' =>  'suspicion'],

            ['group' => 'water_state_cd','name' =>  'no'],
            ['group' => 'water_state_cd','name' =>  'yes'],
            ['group' => 'water_state_cd', 'name' => 'suspicion'],

            ['group' => 'dirt_state_cd', 'name' => 'no'],
            ['group' => 'dirt_state_cd', 'name' => 'yes'],

            ['group' => 'scratch_state_cd', 'name' => 'good'],
            ['group' => 'scratch_state_cd', 'name' => 'scratch'],
            ['group' => 'scratch_state_cd', 'name' => 'corrosion'],
            ['group' => 'scratch_state_cd', 'name' => 'maintenance'],

            ['group' => 'noise_state_cd', 'name' => 'good'],
            ['group' => 'noise_state_cd', 'name' => 'noise'],
            ['group' => 'noise_state_cd', 'name' => 'maintenance'],

            ['group' => 'operation_state_cd','name' =>  'good'],
            ['group' => 'operation_state_cd','name' =>  'maintenance'],

            ['group' => 'replacement_state_cd', 'name' => 'good'],
            ['group' => 'replacement_state_cd', 'name' => 'normal'],
            ['group' => 'replacement_state_cd', 'name' => 'maintenance'],

            ['group' => 'pollution_state_cd','name' =>  'good'],
            ['group' => 'pollution_state_cd','name' =>  'pollution'],
            ['group' => 'pollution_state_cd', 'name' => 'maintenance'],

            ['group' => 'crack_state_cd', 'name' => 'good'],
            ['group' => 'crack_state_cd', 'name' => 'scratch'],
            ['group' => 'crack_state_cd', 'name' => 'crack'],
            ['group' => 'crack_state_cd', 'name' => 'maintenance'],

            ['group' => 'interior_state_cd', 'name' => 'good'],
            ['group' => 'interior_state_cd', 'name' => 'pollution'],
            ['group' => 'interior_state_cd', 'name' => 'wide_scratch'],
            ['group' => 'interior_state_cd', 'name' => 'crack'],

            ['group' => 'leather_state_cd', 'name' => 'good'],
            ['group' => 'leather_state_cd', 'name' => 'scratch'],
            ['group' => 'leather_state_cd', 'name' => 'wide_scratch'],
            ['group' => 'leather_state_cd', 'name' => 'damaged'],

            ['group' => 'working_state_cd', 'name' => 'good'],
            ['group' => 'working_state_cd', 'name' => 'trouble'],

            ['group' => 'leackoil_state_cd', 'name' => 'none'],
            ['group' => 'leackoil_state_cd', 'name' => 'micro_leak'],
            ['group' => 'leackoil_state_cd', 'name' => 'leak'],
            ['group' => 'leackoil_state_cd', 'name' => 'maintenance'],

            ['group' => 'leakwater_state_cd', 'name' => 'none'],
            ['group' => 'leakwater_state_cd', 'name' => 'micro_leak'],
            ['group' => 'leakwater_state_cd', 'name' => 'maintenance'],

            ['group' => 'leakwater_leak_state_cd', 'name' => 'none'],
            ['group' => 'leakwater_leak_state_cd', 'name' => 'micro_leak'],
            ['group' => 'leakwater_leak_state_cd', 'name' => 'leak'],

            ['group' => 'leakwater_noise_state_cd', 'name' => 'none'],
            ['group' => 'leakwater_noise_state_cd', 'name' => 'micro_leak'],
            ['group' => 'leakwater_noise_state_cd', 'name' => 'leak'],
            ['group' => 'leakwater_noise_state_cd', 'name' => 'noise'],

            ['group' => 'water_amount_cd', 'name' => 'optimum'],
            ['group' => 'water_amount_cd', 'name' => 'lack'],
            ['group' => 'water_amount_cd', 'name' => 'pollution'],
            ['group' => 'water_amount_cd', 'name' => 'replace'],

            ['group' => 'vibration_state_cd', 'name' => 'good'],
            ['group' => 'vibration_state_cd', 'name' => 'micro_damaged'],
            ['group' => 'vibration_state_cd', 'name' => 'engine_vibe'],
            ['group' => 'vibration_state_cd', 'name' => 'maintenance'],

            ['group' => 'oil_amount_state', 'name' => 'optimum'],
            ['group' => 'oil_amount_state', 'name' => 'lack'],
            ['group' => 'oil_amount_state', 'name' => 'excess'],
            ['group' => 'oil_amount_state', 'name' => 'pollution'],

            ['group' => 'shock_state_cd', 'name' => 'good'],
            ['group' => 'shock_state_cd', 'name' => 'noise'],
            ['group' => 'shock_state_cd', 'name' => 'shock'],
            ['group' => 'shock_state_cd', 'name' => 'maintenance'],

            ['group' => 'transmission_state', 'name' => 'good'],
            ['group' => 'transmission_state', 'name' => 'micro_damaged'],
            ['group' => 'transmission_state', 'name' => 'noise'],
            ['group' => 'transmission_state', 'name' => 'maintenance'],

            ['group' => 'gear_transmission_state_cd', 'name' => 'good'],
            ['group' => 'gear_transmission_state_cd', 'name' => 'omission'],
            ['group' => 'gear_transmission_state_cd', 'name' => 'noise'],
            ['group' => 'gear_transmission_state_cd', 'name' => 'maintenance'],

            ['group' => 'gear_state_cd', 'name' => 'good'],
            ['group' => 'gear_state_cd', 'name' => 'noise'],
            ['group' => 'gear_state_cd', 'name' => 'gap'],
            ['group' => 'gear_state_cd', 'name' => 'maintenance'],

            ['group' => 'steering_state_cd', 'name' => 'good'],
            ['group' => 'steering_state_cd', 'name' => 'noise'],
            ['group' => 'steering_state_cd', 'name' => 'gap'],

            ['group' => 'pump_state_cd', 'name' => 'good'],
            ['group' => 'pump_state_cd', 'name' => 'noise'],

            ['group' => 'shoba_state_cd', 'name' => 'good'],
            ['group' => 'shoba_state_cd', 'name' => 'noise'],
            ['group' => 'shoba_state_cd', 'name' => 'air_leak'],
            ['group' => 'shoba_state_cd', 'name' => 'maintenance'],

            ['group' => 'sbc_state_cd', 'name' => 'good'],
            ['group' => 'sbc_state_cd', 'name' => 'warning'],
            ['group' => 'sbc_state_cd', 'name' => 'maintenance'],

            ['group' => 'break_oil_state_cd', 'name' => 'none'],
            ['group' => 'break_oil_state_cd', 'name' => 'leak'],
            ['group' => 'break_oil_state_cd', 'name' => 'maintenance'],

            ['group' => 'engine_state_cd', 'name' => 'good'],
            ['group' => 'engine_state_cd', 'name' => 'noise'],
            ['group' => 'engine_state_cd', 'name' => 'engine_relief'],
            ['group' => 'engine_state_cd', 'name' => 'maintenance'],

            ['group' => 'grade_cd', 'name' => 'top'],
            ['group' => 'grade_cd', 'name' => 'middle'],
            ['group' => 'grade_cd', 'name' => 'bottom'],

            ['grpup' => 'standard_cd', 'name' => 'excess'], // 초과
            ['grpup' => 'standard_cd', 'name' => 'standard'],// 평균
            ['grpup' => 'standard_cd', 'name' => 'shortfall'], // 미달

            ['group' => 'accident_cd', 'name' => 'none'], //무사고
            ['group' => 'accident_cd', 'name' => 'simple_swap'], //단순교환
            ['group' => 'accident_cd', 'name' => 'middle_damage'], //중손상
            ['group' => 'accident_cd', 'name' => 'big_damage'], //대손상

            ['group' => 'wear_state_cd', 'name' => 'good'],
            ['group' => 'wear_state_cd', 'name' => 'lack'],
            ['group' => 'wear_state_cd', 'name' => 'pollution'],
            ['group' => 'wear_state_cd', 'name' => 'maintenance'],


            ////////////////// 추가 진단 그룹코드
            ['group' => 'diagnosis_state_group', 'name' => 'wear_state_cd'],
        ]);



            ////////////////////////
        DB::table('codes')->insert( ['id'=>2000, 'group' => 'diagnosis', 'name' => 'diagnosis_info']);
        DB::table('codes')->insert([
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_info'],
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_mileage'],
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_vinnumber'],
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_color'],
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_option'],
                ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_opinion'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_exterior'],
                ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_picture'],
                ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_state'],
                    ['group' => 'diagnosis_exterior_state', 'name' => 'diagnosis_exterior_left'],
                    ['group' => 'diagnosis_exterior_state', 'name' => 'diagnosis_exterior_center'],
                    ['group' => 'diagnosis_exterior_state', 'name' => 'diagnosis_exterior_right'],
                ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_interior'],
                ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_car_bottom'],
                ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_engine_room'],
                ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_state'],
                    ['group' => 'diagnosis_interior_state', 'name' => 'diagnosis_interior_left'],
                    ['group' => 'diagnosis_interior_state', 'name' => 'diagnosis_interior_center'],
                    ['group' => 'diagnosis_interior_state', 'name' => 'diagnosis_interior_right'],
                ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_check'],
                ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_state'],
                ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_immersion'],
                    ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_immersion_stink'],
                    ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_immersion_front_floor'],
                    ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_immersion_trunk_floor'],
                    ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_immersion_engine_room'],
                ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_exterior'],
                    ['group' => 'diagnosis_check_exterior', 'name' => 'diagnosis_exterior_external_plate'],
                    ['group' => 'diagnosis_check_exterior', 'name' => 'diagnosis_exterior_lamp'],
                    ['group' => 'diagnosis_check_exterior', 'name' => 'diagnosis_exterior_bumper'],
                    ['group' => 'diagnosis_check_exterior', 'name' => 'diagnosis_exterior_mirror'],
                ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_interior'],
                    ['group' => 'diagnosis_check_interior', 'name' => 'diagnosis_interior_instrument_panel'],
                    ['group' => 'diagnosis_check_interior', 'name' => 'diagnosis_interior_console_box'],
                    ['group' => 'diagnosis_check_interior', 'name' => 'diagnosis_interior_Built_in_trim'],
                    ['group' => 'diagnosis_check_interior', 'name' => 'diagnosis_interior_sheet'],
                    ['group' => 'diagnosis_check_interior', 'name' => 'diagnosis_interior_mat'],
                ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_plugin'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_door_rock'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_glass_gear'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_remote'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_wiper'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_side_mirror'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_sun_roof'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_navigation'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_sheet'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_rear_camera'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_etc'],
                ['group' => 'diagnosis_plugin', 'name' => 'diagnosis_plugin_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_expendables'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_engine_oil'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_cooling_water'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_break_pad'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_battery'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_timing_belt'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_pan_belt'],
                ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_troubleshoot'],
                ['group' => 'diagnosis_troubleshoot', 'name' => 'diagnosis_troubleshoot_engin'],
                ['group' => 'diagnosis_troubleshoot', 'name' => 'diagnosis_troubleshoot_transmission'],
                ['group' => 'diagnosis_troubleshoot', 'name' => 'diagnosis_troubleshoot_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_powermover'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_operation'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_oil'],
                    ['group' => 'diagnosis_powermover_oil', 'name' => 'diagnosis_oil_cylinder_gasket'],
                    ['group' => 'diagnosis_powermover_oil', 'name' => 'diagnosis_oil_rocker_arm_gasket'],
                    ['group' => 'diagnosis_powermover_oil', 'name' => 'diagnosis_oil_engine_oil_pan_gasket'],
                    ['group' => 'diagnosis_powermover_oil', 'name' => 'diagnosis_oil_egine_oil_cooler_gasket'],
                    ['group' => 'diagnosis_powermover_oil', 'name' => 'diagnosis_oil_cylinder_block'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_cooling_water'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cylinder_block'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cylinder_head'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_water_pump'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cooler'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cooling_hose'],
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cooling_water_state'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_oil_polution'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_engine_mount'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_transmission'],
                ['group' => 'diagnosis_transmission', 'name' => 'diagnosis_transmission_auto_transmission'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_oil'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_oil_state'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_operation'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_mount'],
                ['group' => 'diagnosis_transmission', 'name' => 'diagnosis_transmission_transmission'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_oil'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_oil_state'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_function'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_operation'],
                ['group' => 'diagnosis_transmission', 'name' => 'diagnosis_transmission_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_power_transmission'],
                ['group' => 'diagnosis_power_transmission', 'name' => 'diagnosis_power_transmission_velocity_joint'],
                ['group' => 'diagnosis_power_transmission', 'name' => 'diagnosis_power_transmission_propeller_shaft'],
                ['group' => 'diagnosis_power_transmission', 'name' => 'diagnosis_power_transmission_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_steering'],
                ['group' => 'diagnosis_steering', 'name' => 'diagnosis_steering_alignment'],
                ['group' => 'diagnosis_steering', 'name' => 'diagnosis_steering_operation'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_steering_gear'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_mdps'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_steering_pump'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_lower_arm'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_staybiller_link'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_strut_arm'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_upper_arm'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_air_absorber'],
                    ['group' => 'diagnosis_steering_operation', 'name' => 'diagnosis_operation_tierodend'],
                ['group' => 'diagnosis_steering', 'name' => 'diagnosis_steering_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_braking'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_break_oil_state'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_ebp'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_sbc'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_break_disk'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_break_oil'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_booster'],
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_electronices'],
                ['group' => 'diagnosis_electronices', 'name' => 'diagnosis_electronices_generator'],
                ['group' => 'diagnosis_electronices', 'name' => 'diagnosis_electronices_start_motor'],
                ['group' => 'diagnosis_electronices', 'name' => 'diagnosis_electronices_ventilation_motor'],
                ['group' => 'diagnosis_electronices', 'name' => 'diagnosis_electronices_radiator_motor'],
                ['group' => 'diagnosis_electronices', 'name' => 'diagnosis_electronices_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_wheeltire'],
                ['group' => 'diagnosis_wheeltire', 'name' => 'diagnosis_wheeltire_damage'],
                ['group' => 'diagnosis_wheeltire', 'name' => 'diagnosis_wheeltire_onesided_wear'],
                ['group' => 'diagnosis_wheeltire', 'name' => 'diagnosis_wheeltire_sipe'],
                ['group' => 'diagnosis_wheeltire', 'name' => 'diagnosis_wheeltire_dot'],
                ['group' => 'diagnosis_wheeltire', 'name' => 'diagnosis_wheeltire_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_driving'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_engine'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_transmission'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_break'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_steering'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_power_transmission'],
                ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_review'],
                ['group' => 'diagnosis_review', 'name' => 'diagnosis_review_opinion']

        ]);
        

        
    }

}
