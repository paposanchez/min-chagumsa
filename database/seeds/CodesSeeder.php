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


        // 옵션코드의 시퀀스 변경
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
            ['group' => 'diagnosis', 'name' => 'diagnosis_info'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_exterior'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_interior'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_check'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_driving'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_operation'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_expendables'],
            ['group' => 'diagnosis', 'name' => 'diagnosis_review'],
            ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_info'],
            ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_mileage'],
            ['group' => 'diagnosis_info', 'name' => 'attachment_status_cd'],
            ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_color_cd'],
            ['group' => 'diagnosis_info', 'name' => 'diagnosis_info_option'],
            ['group' => 'diagnosis_info_option', 'name' => 'repair_status_cd'],
            ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_picture'],
            ['group' => 'diagnosis_exterior', 'name' => 'diagnosis_exterior_status'],
            ['group' => 'diagnosis_exterior_picture', 'name' => 'diagnosis_exterior_picture_cd'],
            ['group' => 'diagnosis_exterior_status', 'name' => 'history_status_cd'],
            ['group' => 'diagnosis_exterior_status', 'name' => 'diagnosis_exterior_position'],
            ['group' => 'diagnosis_exterior_status', 'name' => 'diagnosis_part_status_cd'],
            ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_car_bottom'],
            ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_engine_room'],
            ['group' => 'diagnosis_interior', 'name' => 'diagnosis_interior_status'],
            ['group' => 'diagnosis_interior_status', 'name' => 'history_status_cd'],
            ['group' => 'diagnosis_interior_status', 'name' => 'diagnosis_interior_position'],
            ['group' => 'diagnosis_interior_status', 'name' => 'diagnosis_part_status_cd'],
            ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_status'],
            ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_immersion'],
            ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_exterior'],
            ['group' => 'diagnosis_check', 'name' => 'diagnosis_check_interior'],
            ['group' => 'diagnosis_check_status', 'name' => 'repair_status_cd'],
            ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_stink'],
            ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_front_floor'],
            ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_trunk_floor'],
            ['group' => 'diagnosis_check_immersion', 'name' => 'diagnosis_check_immersion_engine_room'],
            ['group' => 'diagnosis_check_immersion_stink', 'stink_status_cd'],
            ['group' => 'diagnosis_check_immersion_front_floor', 'name' => 'water_status_cd'],
            ['group' => 'diagnosis_check_immersion_trunk_floor', 'name' => 'water_status_cd'],
            ['group' => 'diagnosis_check_immersion_engine_room', 'name' => 'dirt_status_cd'],
            ['group' => 'diagnosis_check_exterior', 'name' => 'scratch_status_cd'],
            ['group' => 'diagnosis_check_interior', 'name' => 'grade_cd'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_engine'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_transmission'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_break'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_alignment'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_steering'],
            ['group' => 'diagnosis_driving', 'name' => 'diagnosis_driving_opinion'],
            ['group' => 'diagnosis_driving_engine', 'name' => 'noise_status_cd'],
            ['group' => 'diagnosis_driving_transmission', 'name' => 'noise_status_cd'],
            ['group' => 'diagnosis_driving_break', 'name' => 'operation_status_cd'],
            ['group' => 'diagnosis_driving_alignment', 'name' => 'operation_status_cd'],
            ['group' => 'diagnosis_driving_steering', 'name' => 'operation_status_cd'],
            ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_egine'],
            ['group' => 'diagnosis_operation', 'name' => 'diagnosis_operation_transmission'],
            ['group' => 'diagnosis_operation', 'name' => 'diagnosis_operation_break'],
            ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_steering'],
            ['group' => 'diagnosis_operation','name' =>  'diagnosis_operation_leakage'],
            ['group' => 'diagnosis_operation_egine', 'name' => 'noise_status_cd'],
            ['group' => 'diagnosis_operation_transmission', 'name' => 'noise_status_cd'],
            ['group' => 'diagnosis_operation_break', 'name' => 'operation_status_cd'],
            ['group' => 'diagnosis_operation_steering', 'name' => 'operation_status_cd'],
            ['group' => 'diagnosis_operation_leakage', 'name' => 'leakage_status_cd'],
            ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_tire'],
            ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_oil'],
            ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_water'],
            ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_break'],
            ['group' => 'diagnosis_expendables', 'name' => 'diagnosis_expendables_battery'],
            ['group' => 'diagnosis_expendables_tire', 'name' => 'replacement_status_cd'],
            ['group' => 'diagnosis_expendables_oil', 'name' => 'pollution_status_cd'],
            ['group' => 'diagnosis_expendables_water', 'name' => 'pollution_status_cd'],
            ['group' => 'diagnosis_expendables_break', 'name' => 'replacement_status_cd'],
            ['group' => 'diagnosis_expendables_battery', 'name' => 'replacement_status_cd'],
            ['group' => 'diagnosis_exterior_picture_cd', 'name' => 'front'],
            ['group' => 'diagnosis_exterior_picture_cd', 'name' => 'rear'],
            ['group' => 'diagnosis_exterior_picture_cd', 'name' => 'left'],
            ['group' => 'diagnosis_exterior_picture_cd', 'name' => 'right'],
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
            ['group' => 'pollution_status_cd', 'name' => 'maintenance'],

            //주행거리 및 평가항목 코드 추가함
            ['grpup' => 'standard_cd', 'name' => 'excess'], // 초과
            ['grpup' => 'standard_cd', 'name' => 'standard'],// 평균
            ['grpup' => 'standard_cd', 'name' => 'shortfall'], // 미달
        ]);
        

        
    }

}
