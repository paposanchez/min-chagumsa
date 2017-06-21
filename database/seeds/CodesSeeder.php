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
            ['group' => 'diagnosis_status_group', 'name' => 'car_option'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_option_exterior'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_option_multimedia'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_option_interior'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_option_safety'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_option_facilities'],
            ['group' => 'diagnosis_status_group', 'name' => 'fuel_type'],
            ['group' => 'diagnosis_status_group', 'name' => 'drivetrain'],
            ['group' => 'diagnosis_status_group', 'name' => 'transmission'],
            ['group' => 'diagnosis_status_group', 'name' => 'car_picture_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'attachment_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'diagnosis_info_color_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'repair_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'history_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'exterior_position_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'interior_position_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'diagnosis_part_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'immersion_repair_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'stink_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'water_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'dirt_status_cd'],
            ['group' => 'diagnosis_status_group', 'name' => 'scratch_status_cd'],


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
            ['group' => 'interior_position_cd', 'name' => 'cross_member_front'],
            ['group' => 'interior_position_cd', 'name' => 'cross_member_back'],
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

            ['grpup' => 'standard_cd', 'name' => 'excess'], // 초과
            ['grpup' => 'standard_cd', 'name' => 'standard'],// 평균
            ['grpup' => 'standard_cd', 'name' => 'shortfall'], // 미달

            ['group' => 'accident_cd', 'name' => 'none'], //무사고
            ['group' => 'accident_cd', 'name' => 'simple_swap'], //단순교환
            ['group' => 'accident_cd', 'name' => 'middle_damage'], //중손상
            ['group' => 'accident_cd', 'name' => 'big_damage'], //대손상



            ////////////////////////


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
                    ['group' => 'diagnosis_powermover_cooling_water', 'name' => 'diagnosis_cooling_water_cooling_water_status'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_oil_polution'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_engine_mount'],
                ['group' => 'diagnosis_powermover', 'name' => 'diagnosis_powermover_opinion'],

            ['group' => 'diagnosis', 'name' => 'diagnosis_transmission'],
                ['group' => 'diagnosis_transmission', 'name' => 'diagnosis_transmission_auto_transmission'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_oil'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_oil_status'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_operation'],
                    ['group' => 'diagnosis_transmission_auto_transmission', 'name' => 'diagnosis_auto_transmission_mount'],
                ['group' => 'diagnosis_transmission', 'name' => 'diagnosis_transmission_transmission'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_oil'],
                    ['group' => 'diagnosis_transmission_transmission', 'name' => 'diagnosis_transmission_oil_status'],
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
                ['group' => 'diagnosis_braking', 'name' => 'diagnosis_braking_break_oil_status'],
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
