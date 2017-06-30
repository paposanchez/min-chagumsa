<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\Car;
use App\Models\DiagnosisDetails;
use App\Models\DiagnosisDetail;
use App\Models\DiagnosisDetailItem;
use App\Models\DiagnosisFile;
use App\Models\Item;
use App\Repositories\DiagnosisRepository;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Code;
use DB;
use Carbon\Carbon;


// use App\Exceptions\ApiHandler AS ApiException;
use Exception;
use Illuminate\Http\Request;
use App\Traits\Uploader;
use Validator;

class DiagnosisController extends ApiController {

    use Uploader;

    /**
     * @SWG\Get(
     *     path="/diagnosis",
     *     tags={"Diagnosis"},
     *     summary="개별주문 진단내역 조회",
     *     description="개별주문 진단내역 조회",
     *     operationId="show",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Diagnosis"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function show(Request $request) {

        try{
            $order_id = $request->get('order_id');
            $item = Order::find($order_id)->item;

            $layout = '[{"id":"","name_cd":2000,"name":"자동차등록정보","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2001,"name":"자동차 등록정보","details_id":"","description":"차량의 등록증 사진을 업로드하세요.","entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"자동차등록증 사진을 추가하세요.","created_at":"","updated_at":"","files":[{"id":"","diagnosis_detail_items_id":"","original":"","source":null,"path":null,"mime":null,"created_at":"","updated_at":""}]}],"children":[]},{"id":"","name_cd":2002,"name":"주행거리","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"주행거리계 사진을 추가하세요.","created_at":"","updated_at":"","files":[{"id":"","diagnosis_detail_items_id":"","original":"","source":null,"path":null,"mime":null,"created_at":"","updated_at":""}]}],"children":[]},{"id":"","name_cd":2003,"name":"차대번호","details_id":1,"description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"차대번호 사진을 추가하세요.","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1010,"options":[{"id":1122,"group":"attachment_state_cd","name":"good","display":"양호"},{"id":1123,"group":"attachment_state_cd","name":"different","display":"상이"},{"id":1124,"group":"attachment_state_cd","name":"corrosion","display":"부식"},{"id":1125,"group":"attachment_state_cd","name":"modulation","display":"변조(변타)"},{"id":1126,"group":"attachment_state_cd","name":"damage","display":"훼손(오손)"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2004,"name":"색상","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1011,"options":[{"id":1127,"group":"color_cd","name":"white","display":"흰색"},{"id":1128,"group":"color_cd","name":"black","display":"검정"},{"id":1129,"group":"color_cd","name":"gray","display":"회색"},{"id":1130,"group":"color_cd","name":"red","display":"적색"},{"id":1131,"group":"color_cd","name":"blue","display":"파랑색"},{"id":1132,"group":"color_cd","name":"etc","display":"기타"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2005,"name":"추가옵션","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1012,"options":[{"id":1133,"group":"repair_state_cd","name":"good","display":"양호"},{"id":1134,"group":"repair_state_cd","name":"repair","display":"수리필요"},{"id":1135,"group":"repair_state_cd","name":"none","display":"없음"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2006,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2007,"name":"주요외판","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2008,"name":"주요외판사진","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"전방사진을 추가하세요.","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"후방사진을 추가하세요.","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"좌측사진을 추가하세요.","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":7,"use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"우측사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2009,"name":"주요외판상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1013,"options":[{"id":1136,"group":"history_state_cd","name":"good","display":"전체 양호"},{"id":1137,"group":"history_state_cd","name":"history","display":"상태 이력 있음"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[{"id":"","name_cd":2010,"name":"좌측","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1014,"options":[{"id":1138,"group":"exterior_position_left_cd","name":"front_fender_left","display":"프론트펜더 좌"},{"id":1139,"group":"exterior_position_left_cd","name":"front_door_left","display":"프론트도어 좌"},{"id":1140,"group":"exterior_position_left_cd","name":"rear_door_left","display":"리어도어 좌"},{"id":1141,"group":"exterior_position_left_cd","name":"side_seats_left","display":"사이드시트 좌"},{"id":1142,"group":"exterior_position_left_cd","name":"quarter_panel_left","display":"쿼터패널 좌"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2011,"name":"중앙","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1015,"options":[{"id":1143,"group":"exterior_position_center_cd","name":"hood","display":"후드"},{"id":1144,"group":"exterior_position_center_cd","name":"roof_panel","display":"루프패널"},{"id":1145,"group":"exterior_position_center_cd","name":"trunk_lead","display":"트렁크리드"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2012,"name":"우측","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1016,"options":[{"id":1146,"group":"exterior_position_right_cd","name":"front_fender_right","display":"프론트펜더 우"},{"id":1147,"group":"exterior_position_right_cd","name":"front_door_right","display":"프론트도어 우"},{"id":1148,"group":"exterior_position_right_cd","name":"rear_door_right","display":"리어도어 우"},{"id":1149,"group":"exterior_position_right_cd","name":"side_seats_right","display":"사이트시트 우"},{"id":1150,"group":"exterior_position_right_cd","name":"quarter_panel_right","display":"쿼터패널 우"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2013,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2014,"name":"주요 내판 및 골격상태","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2015,"name":"차량하단","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"차량의 하단 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2016,"name":"엔진룸","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2017,"name":"주요 내판 및 골격 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1013,"options":[{"id":1136,"group":"history_state_cd","name":"good","display":"전체 양호"},{"id":1137,"group":"history_state_cd","name":"history","display":"상태 이력 있음"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[{"id":"","name_cd":2018,"name":"좌측","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1017,"options":[{"id":1151,"group":"interior_position_left_cd","name":"filler_a-left","display":"A필러 좌"},{"id":1152,"group":"interior_position_left_cd","name":"filler_b-left","display":"B필러 좌"},{"id":1153,"group":"interior_position_left_cd","name":"filler_c-left","display":"C필러 좌"}],"selected":null,"required_image_options":null,"description":null,"created_at":"2017-06-23 12:45:48","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2019,"name":"중앙","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1018,"options":[{"id":1154,"group":"interior_position_center_cd","name":"front_panel","display":"프론트패널"},{"id":1155,"group":"interior_position_center_cd","name":"hill_house_front/left","display":"힐하우스 전-좌"},{"id":1156,"group":"interior_position_center_cd","name":"hill_house_front/right","display":"힐하우스 전-우"},{"id":1157,"group":"interior_position_center_cd","name":"hill_house_rear/left","display":"힐하우스 후-좌"},{"id":1158,"group":"interior_position_center_cd","name":"hill_house_rear/right","display":"힐하우스 후-우"},{"id":1159,"group":"interior_position_center_cd","name":"cross_member_front","display":"크로스 멤버 전"},{"id":1160,"group":"interior_position_center_cd","name":"cross_member_back","display":"크로스 멤버 후"},{"id":1161,"group":"interior_position_center_cd","name":"side_member_front/left","display":"사이드멤버 전-좌"},{"id":1162,"group":"interior_position_center_cd","name":"side_member_front/right","display":"사이드멤버 전-우"},{"id":1163,"group":"interior_position_center_cd","name":"side_member_rear/left","display":"사이드멤버 후-좌"},{"id":1164,"group":"interior_position_center_cd","name":"side_member_rear/right","display":"사이드멤버 후-우"},{"id":1165,"group":"interior_position_center_cd","name":"dash_panel","display":"대쉬패널"},{"id":1166,"group":"interior_position_center_cd","name":"floor","display":"code.interior_position_center_cd.floor"},{"id":1167,"group":"interior_position_center_cd","name":"trunk_floor","display":"트렁크플로어"},{"id":1168,"group":"interior_position_center_cd","name":"rear_panel","display":"리어패널"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2020,"name":"우측","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1019,"options":[{"id":1169,"group":"interior_position_right_cd","name":"filler_a-right","display":"A필러 우"},{"id":1170,"group":"interior_position_right_cd","name":"filler_b-right","display":"B필러 우"},{"id":1171,"group":"interior_position_right_cd","name":"filler_c-right","display":"C필러 우"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2021,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2022,"name":"차량 내외부 점검","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2023,"name":"사고수리 및 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1021,"options":[{"id":1177,"group":"accident_repair_state_cd","name":"none","display":"수리이력없음"},{"id":1178,"group":"accident_repair_state_cd","name":"simple","display":"단순수리"},{"id":1179,"group":"accident_repair_state_cd","name":"basic","display":"기본자체판금"},{"id":1180,"group":"accident_repair_state_cd","name":"core","display":"차체교환∙골격수리"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2024,"name":"침수흔적 점검","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2025,"name":"실내악취","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1022,"options":[{"id":1181,"group":"stink_state_cd","name":"none","display":"없음"},{"id":1182,"group":"stink_state_cd","name":"yes","display":"있음"},{"id":1183,"group":"stink_state_cd","name":"suspicion","display":"의심"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실내 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2026,"name":"앞좌석 실내바닥","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1023,"options":[{"id":1184,"group":"water_state_cd","name":"no","display":"수분∙오염 없음"},{"id":1185,"group":"water_state_cd","name":"yes","display":"수분∙오염 있음"},{"id":1186,"group":"water_state_cd","name":"suspicion","display":"의심"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"앞좌석을 해체하여 실내바닥사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2027,"name":"트렁크 실내바닥","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1023,"options":[{"id":1184,"group":"water_state_cd","name":"no","display":"수분∙오염 없음"},{"id":1185,"group":"water_state_cd","name":"yes","display":"수분∙오염 있음"},{"id":1186,"group":"water_state_cd","name":"suspicion","display":"의심"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"트렁크를 해체하여 실내바닥사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2028,"name":"엔진룸(휴즈박스)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1024,"options":[{"id":1187,"group":"dirt_state_cd","name":"no","display":"흙먼지 이물질 없음"},{"id":1188,"group":"dirt_state_cd","name":"yes","display":"흙먼지 이물질 있음"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진룸을 열어 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2029,"name":"차량 외판 점검","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2030,"name":"외판(도장)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1025,"options":[{"id":1189,"group":"scratch_state_cd","name":"good","display":"양호"},{"id":1190,"group":"scratch_state_cd","name":"scratch","display":"긁힘∙부식"},{"id":1191,"group":"scratch_state_cd","name":"corrosion","display":"부식"},{"id":1192,"group":"scratch_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"외판(도장) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2031,"name":"등화","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1030,"options":[{"id":1204,"group":"crack_state_cd","name":"good","display":"양호"},{"id":1205,"group":"crack_state_cd","name":"scratch","display":"긁힘∙상처"},{"id":1206,"group":"crack_state_cd","name":"crack","display":"깨짐∙균열"},{"id":1207,"group":"crack_state_cd","name":"maintenance","display":"교환∙정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"등화 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2032,"name":"범퍼","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1030,"options":[{"id":1204,"group":"crack_state_cd","name":"good","display":"양호"},{"id":1205,"group":"crack_state_cd","name":"scratch","display":"긁힘∙상처"},{"id":1206,"group":"crack_state_cd","name":"crack","display":"깨짐∙균열"},{"id":1207,"group":"crack_state_cd","name":"maintenance","display":"교환∙정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":41,"diagnosis_detail_id":29,"use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"범퍼 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2033,"name":"유리(후사경포함)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1030,"options":[{"id":1204,"group":"crack_state_cd","name":"good","display":"양호"},{"id":1205,"group":"crack_state_cd","name":"scratch","display":"긁힘∙상처"},{"id":1206,"group":"crack_state_cd","name":"crack","display":"깨짐∙균열"},{"id":1207,"group":"crack_state_cd","name":"maintenance","display":"교환∙정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"유리(후사경 포함) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2034,"name":"차량실내점검","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2035,"name":"계기패널","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1031,"options":[{"id":1208,"group":"interior_state_cd","name":"good","display":"양호"},{"id":1209,"group":"interior_state_cd","name":"pollution","display":"긁힘∙오염"},{"id":1210,"group":"interior_state_cd","name":"wide_scratch","display":"넓은 긁힘∙오염"},{"id":1211,"group":"interior_state_cd","name":"crack","display":"깨짐∙균열"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"계기패널 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2036,"name":"콘솔박스","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1031,"options":[{"id":1208,"group":"interior_state_cd","name":"good","display":"양호"},{"id":1209,"group":"interior_state_cd","name":"pollution","display":"긁힘∙오염"},{"id":1210,"group":"interior_state_cd","name":"wide_scratch","display":"넓은 긁힘∙오염"},{"id":1211,"group":"interior_state_cd","name":"crack","display":"깨짐∙균열"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"콘솔박스 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2037,"name":"내장∙트림","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1031,"options":[{"id":1208,"group":"interior_state_cd","name":"good","display":"양호"},{"id":1209,"group":"interior_state_cd","name":"pollution","display":"긁힘∙오염"},{"id":1210,"group":"interior_state_cd","name":"wide_scratch","display":"넓은 긁힘∙오염"},{"id":1211,"group":"interior_state_cd","name":"crack","display":"깨짐∙균열"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"내장&트림 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2038,"name":"시트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1032,"options":[{"id":1212,"group":"leather_state_cd","name":"good","display":"양호"},{"id":1213,"group":"leather_state_cd","name":"scratch","display":"긁힘∙오염"},{"id":1214,"group":"leather_state_cd","name":"wide_scratch","display":"넗은 긁힘∙오염"},{"id":1215,"group":"leather_state_cd","name":"damaged","display":"찢어짐∙균열"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"시트 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2039,"name":"메트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1032,"options":[{"id":1212,"group":"leather_state_cd","name":"good","display":"양호"},{"id":1213,"group":"leather_state_cd","name":"scratch","display":"긁힘∙오염"},{"id":1214,"group":"leather_state_cd","name":"wide_scratch","display":"넗은 긁힘∙오염"},{"id":1215,"group":"leather_state_cd","name":"damaged","display":"찢어짐∙균열"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"매트 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2040,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"차량 내외부 점검에 대한 종합의견을 음성코멘트로 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2041,"name":"전장∙장착품 작동상태점검","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2042,"name":"도어락 작동상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":38,"use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"도어록 진단기결과 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2043,"name":"유리기어 작동상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":39,"use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"유리기어 진단기결과 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2044,"name":"리모콘 작동상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"리모콘참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2045,"name":"와이퍼 작동상태","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2046,"name":"와이퍼 조향장치","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"와이퍼 조향장치 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2047,"name":"와이퍼 오일","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"와이퍼 오일상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2048,"name":"사이드미러 작동상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"사이드미러 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2049,"name":"선루프(순정)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"선루프 상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2050,"name":"네비게이션&AV시스템(순정)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"네비게이션 상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2051,"name":"전동시트&열선&통풍(순정)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2052,"name":"후방카메라(순정)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"후방카메라 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2053,"name":"기타 추가장착품","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"추가장착품 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2054,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"각 전장품 및 작참품에 대한 점검상태를 음성코멘트로 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2055,"name":"소모품 상태점검","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2056,"name":"엔진오일 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1029,"options":[{"id":1201,"group":"pollution_state_cd","name":"good","display":"양호"},{"id":1202,"group":"pollution_state_cd","name":"pollution","display":"오염"},{"id":1203,"group":"pollution_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진오일 사진을 추가하세요.","created_at":"","updated_at":"2017-06-23 15:02:03","files":[]}],"children":[]},{"id":"","name_cd":2057,"name":"냉각수 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1029,"options":[{"id":1201,"group":"pollution_state_cd","name":"good","display":"양호"},{"id":1202,"group":"pollution_state_cd","name":"pollution","display":"오염"},{"id":1203,"group":"pollution_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"냉각수 상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2058,"name":"브레이크패드 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1028,"options":[{"id":1198,"group":"replacement_state_cd","name":"good","display":"양호"},{"id":1199,"group":"replacement_state_cd","name":"normal","display":"보통"},{"id":1200,"group":"replacement_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"브레이크 패드 사진을 추가하세요","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2059,"name":"배터리 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1028,"options":[{"id":1198,"group":"replacement_state_cd","name":"good","display":"양호"},{"id":1199,"group":"replacement_state_cd","name":"normal","display":"보통"},{"id":1200,"group":"replacement_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"배터리 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2060,"name":"타이밍벨트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1028,"options":[{"id":1198,"group":"replacement_state_cd","name":"good","display":"양호"},{"id":1199,"group":"replacement_state_cd","name":"normal","display":"보통"},{"id":1200,"group":"replacement_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"타이밍벨트 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2061,"name":"팬벨트 및 텐셔너","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1028,"options":[{"id":1198,"group":"replacement_state_cd","name":"good","display":"양호"},{"id":1199,"group":"replacement_state_cd","name":"normal","display":"보통"},{"id":1200,"group":"replacement_state_cd","name":"maintenance","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"팬벨트 및 텐서너 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2062,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"소모품 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2063,"name":"고장진단(진단기)","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2064,"name":"엔진","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1033,"options":[{"id":1216,"group":"working_state_cd","name":"good","display":"양호"},{"id":1217,"group":"working_state_cd","name":"trouble","display":"고장"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진 상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2065,"name":"변속기","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1033,"options":[{"id":1216,"group":"working_state_cd","name":"good","display":"양호"},{"id":1217,"group":"working_state_cd","name":"trouble","display":"고장"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"변속기 상태 사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2066,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"고장 진단 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2067,"name":"원동기","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2068,"name":"작동상태(공회전)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"작동상태 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2069,"name":"오일누유","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2070,"name":"실린더헤드가스켓","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실린더헤드가스켓 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2071,"name":"로커암커버가스켓","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"로커암커버가스켓 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2072,"name":"엔진오일팬가스켓","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔지오일팬가스켓 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2073,"name":"엔진오일쿨러가스켓","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진오일쿨러가스켓 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2074,"name":"실린더 블럭","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실린더 블럭 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2075,"name":"냉각수 누수","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2076,"name":"냉각수 실린더 블럭","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1035,"options":[{"id":1222,"group":"leakwater_state_cd","name":"none","display":"없음"},{"id":1223,"group":"leakwater_state_cd","name":"micro_leak","display":"미세누수"},{"id":1224,"group":"leakwater_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실린더 블럭 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2077,"name":"실린더 헤드/가스켓","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1036,"options":[{"id":1225,"group":"leakwater_leak_state_cd","name":"none","display":"없음"},{"id":1226,"group":"leakwater_leak_state_cd","name":"micro_leak","display":"미세누수"},{"id":1227,"group":"leakwater_leak_state_cd","name":"leak","display":"누수"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실린더헤드/가스켓 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2078,"name":"워터펌프","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1037,"options":[{"id":1228,"group":"leakwater_noise_state_cd","name":"none","display":"없음"},{"id":1229,"group":"leakwater_noise_state_cd","name":"micro_leak","display":"미세누수"},{"id":1230,"group":"leakwater_noise_state_cd","name":"leak","display":"누수"},{"id":1231,"group":"leakwater_noise_state_cd","name":"noise","display":"소음"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"워터펌프 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2079,"name":"냉각쿨러(라디에이터)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1036,"options":[{"id":1225,"group":"leakwater_leak_state_cd","name":"none","display":"없음"},{"id":1226,"group":"leakwater_leak_state_cd","name":"micro_leak","display":"미세누수"},{"id":1227,"group":"leakwater_leak_state_cd","name":"leak","display":"누수"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"냉각쿨러(라디에이터) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2080,"name":"냉각호스 및 히터호스","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1035,"options":[{"id":1222,"group":"leakwater_state_cd","name":"none","display":"없음"},{"id":1223,"group":"leakwater_state_cd","name":"micro_leak","display":"미세누수"},{"id":1224,"group":"leakwater_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"냉각호스 및 히터호스 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2081,"name":"냉각수량 및 오염","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1038,"options":[{"id":1232,"group":"water_amount_cd","name":"optimum","display":"적정"},{"id":1233,"group":"water_amount_cd","name":"lack","display":"부족"},{"id":1234,"group":"water_amount_cd","name":"pollution","display":"오염"},{"id":1235,"group":"water_amount_cd","name":"replace","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"냉각수량 및 오염 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2082,"name":"오일유량 및 오염","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1038,"options":[{"id":1232,"group":"water_amount_cd","name":"optimum","display":"적정"},{"id":1233,"group":"water_amount_cd","name":"lack","display":"부족"},{"id":1234,"group":"water_amount_cd","name":"pollution","display":"오염"},{"id":1235,"group":"water_amount_cd","name":"replace","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"오일유량 및 오염 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2083,"name":"엔진마운트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1039,"options":[{"id":1236,"group":"vibration_state_cd","name":"good","display":"양호"},{"id":1237,"group":"vibration_state_cd","name":"micro_damaged","display":"미세손상"},{"id":1238,"group":"vibration_state_cd","name":"engine_vibe","display":"엔진진동"},{"id":1239,"group":"vibration_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진마운트 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2084,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"엔진 등 원동기 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2085,"name":"변속기","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2086,"name":"자동변속기(A/T)","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2087,"name":"오일누유","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"오일누유 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2088,"name":"오일유량 및 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1040,"options":[{"id":1240,"group":"oil_amount_state","name":"optimum","display":"적정"},{"id":1241,"group":"oil_amount_state","name":"lack","display":"부족"},{"id":1242,"group":"oil_amount_state","name":"excess","display":"과다"},{"id":1243,"group":"oil_amount_state","name":"pollution","display":"오염"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"오일유량 및 상태 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2089,"name":"작동상태(시운전)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1041,"options":[{"id":1244,"group":"shock_state_cd","name":"good","display":"양호"},{"id":1245,"group":"shock_state_cd","name":"noise","display":"소음"},{"id":1246,"group":"shock_state_cd","name":"shock","display":"충격"},{"id":1247,"group":"shock_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"작동상태(시운전) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2090,"name":"변속기마운트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1042,"options":[{"id":1248,"group":"transmission_state","name":"good","display":"양호"},{"id":1249,"group":"transmission_state","name":"micro_damaged","display":"미세손상"},{"id":1250,"group":"transmission_state","name":"noise","display":"소음"},{"id":1251,"group":"transmission_state","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"변속기마운트 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2091,"name":"수동변속기(M/T)","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2092,"name":"오일누유","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1034,"options":[{"id":1218,"group":"leackoil_state_cd","name":"none","display":"없음"},{"id":1219,"group":"leackoil_state_cd","name":"micro_leak","display":"미세누유"},{"id":1220,"group":"leackoil_state_cd","name":"leak","display":"누유"},{"id":1221,"group":"leackoil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"오일누유 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2093,"name":"오일유량 및 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1040,"options":[{"id":1240,"group":"oil_amount_state","name":"optimum","display":"적정"},{"id":1241,"group":"oil_amount_state","name":"lack","display":"부족"},{"id":1242,"group":"oil_amount_state","name":"excess","display":"과다"},{"id":1243,"group":"oil_amount_state","name":"pollution","display":"오염"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"오일유량 및 상태 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2094,"name":"기어변속장치","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1043,"options":[{"id":1252,"group":"gear_transmission_state_cd","name":"good","display":"양호"},{"id":1253,"group":"gear_transmission_state_cd","name":"omission","display":"물림∙빠짐 이상"},{"id":1254,"group":"gear_transmission_state_cd","name":"noise","display":"소음"},{"id":1255,"group":"gear_transmission_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"기어변속장치 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2095,"name":"작동상태(시운전)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"작동상태(시운전) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2096,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"변속기 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2097,"name":"동력전달","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2098,"name":"등속조인트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"등속조인트 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2099,"name":"추진축 및 베어링","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"추진측 및 베어링 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2100,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"동력전달장치 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2101,"name":"조향장치","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2102,"name":"휠얼라인먼트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"휠얼라인먼트  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2103,"name":"작동상태","details_id":"","description":null,"entrys":[],"children":[{"id":"","name_cd":2104,"name":"스티어링기어","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1045,"options":[{"id":1260,"group":"steering_state_cd","name":"good","display":"양호"},{"id":1261,"group":"steering_state_cd","name":"noise","display":"소음"},{"id":1262,"group":"steering_state_cd","name":"gap","display":"유격"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"스티어링 기어  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2105,"name":"MDPS 모듈","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1045,"options":[{"id":1260,"group":"steering_state_cd","name":"good","display":"양호"},{"id":1261,"group":"steering_state_cd","name":"noise","display":"소음"},{"id":1262,"group":"steering_state_cd","name":"gap","display":"유격"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"MDPS 모듈  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2106,"name":"스디어링 펌프","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1046,"options":[{"id":1263,"group":"pump_state_cd","name":"good","display":"양호"},{"id":1264,"group":"pump_state_cd","name":"noise","display":"소음"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"스티어링 펌프  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2107,"name":"로워암","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"로워암  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2108,"name":"스테이빌라이저링크","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"스테이빌라이저링크  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2109,"name":"스트럿트 암","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"스트럿트 암  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2110,"name":"어퍼암","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1044,"options":[{"id":1256,"group":"gear_state_cd","name":"good","display":"양호"},{"id":1257,"group":"gear_state_cd","name":"noise","display":"소음"},{"id":1258,"group":"gear_state_cd","name":"gap","display":"유격"},{"id":1259,"group":"gear_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"어퍼암  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2111,"name":"속업쇼바(에어쇼바)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1047,"options":[{"id":1265,"group":"shoba_state_cd","name":"good","display":"양호"},{"id":1266,"group":"shoba_state_cd","name":"noise","display":"소음"},{"id":1267,"group":"shoba_state_cd","name":"air_leak","display":"에어누출"},{"id":1268,"group":"shoba_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"속업쇼바(에어쇼바)  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2112,"name":"타이로드엔드/볼죠인트","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":"","created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"타이로드엔드/볼죠인트  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2113,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"조향장치 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2114,"name":"제동장치","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2115,"name":"브레이크 오일유량 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1038,"options":[{"id":1232,"group":"water_amount_cd","name":"optimum","display":"적정"},{"id":1233,"group":"water_amount_cd","name":"lack","display":"부족"},{"id":1234,"group":"water_amount_cd","name":"pollution","display":"오염"},{"id":1235,"group":"water_amount_cd","name":"replace","display":"교환요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"브레이크 오일 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2116,"name":"EPB 모듈","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"EPB 모듈 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2117,"name":"SBC 모듈","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1048,"options":[{"id":1269,"group":"sbc_state_cd","name":"good","display":"양호"},{"id":1270,"group":"sbc_state_cd","name":"warning","display":"경고등"},{"id":1271,"group":"sbc_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"SBC 모듈 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2118,"name":"브레이크 디스크","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"브레이크 디스크  참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2119,"name":"브레이크 오일누유","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1049,"options":[{"id":1272,"group":"break_oil_state_cd","name":"none","display":"없음"},{"id":1273,"group":"break_oil_state_cd","name":"leak","display":"누유"},{"id":1274,"group":"break_oil_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"브레이크 오일누유 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2120,"name":"배력장치 상태","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"2017-06-23 16:16:09","updated_at":"2017-06-23 16:18:49","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"배력장치 상태 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2121,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"제동장치 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2122,"name":"전기장치","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2123,"name":"발전기 출력","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"발전기 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2124,"name":"시동모터","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"시동모터 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2125,"name":"실내송풍 모터","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"실내송풍 모터 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2126,"name":"다리에이터 팬 모터","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"라디에이터 팬 모터 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2127,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"전기장치 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2128,"name":"휠&타이어","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2129,"name":"휠 손상","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"휠 손상 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2130,"name":"타이어 편마모","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"타이어 편마모 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2131,"name":"타이어 접지면 깊이","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":118,"use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"타이어 접지면 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2132,"name":"타이어 제조일(DOT)","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]},{"id":"","diagnosis_detail_id":"","use_image":1,"use_voice":0,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"타이어 제조일(DOT) 참고사진을 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2133,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"휠&타이어 상태에 대한 음성코멘트를 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2134,"name":"주행테스트","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2135,"name":"엔진","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1050,"options":[{"id":1275,"group":"engine_state_cd","name":"good","display":"양호"},{"id":1276,"group":"engine_state_cd","name":"noise","display":"소음"},{"id":1277,"group":"engine_state_cd","name":"engine_relief","display":"부조"},{"id":1278,"group":"engine_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2136,"name":"변속기","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1041,"options":[{"id":1244,"group":"shock_state_cd","name":"good","display":"양호"},{"id":1245,"group":"shock_state_cd","name":"noise","display":"소음"},{"id":1246,"group":"shock_state_cd","name":"shock","display":"충격"},{"id":1247,"group":"shock_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2137,"name":"브레이크","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1026,"options":[{"id":1193,"group":"noise_state_cd","name":"good","display":"양호"},{"id":1194,"group":"noise_state_cd","name":"noise","display":"소음"},{"id":1195,"group":"noise_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"2017-06-23 16:30:20","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2138,"name":"조향장치","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2139,"name":"동력전달장치","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":0,"options_cd":1027,"options":[{"id":1196,"group":"operation_state_cd","name":"good","display":"양호"},{"id":1197,"group":"operation_state_cd","name":"maintenance","display":"정비요"}],"selected":null,"required_image_options":null,"description":null,"created_at":"","updated_at":"","files":[]}],"children":[]},{"id":"","name_cd":2140,"name":"점검의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"주행 시 핸들 떨림, 브레이크 감도 등에 대한 의견을 음성모멘트로 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]},{"id":"","name_cd":2141,"name":"성능점검 종합의견","orders_id":"","completed":0,"entrys":[{"id":"","name_cd":2142,"name":"성능점검 종합의견","details_id":"","description":null,"entrys":[{"id":"","diagnosis_detail_id":"","use_image":0,"use_voice":1,"options_cd":null,"options":null,"selected":null,"required_image_options":null,"description":"성능점검 종합의견을 음성코멘트로 추가하세요.","created_at":"","updated_at":"","files":[]}],"children":[]}]}]';
            $item->layout = $layout;
            $item->save();
            return response()->json(true);


//            $validator = Validator::make($request->all(), [
//                'user_id' => 'required|exists:orders,engineer_id',
//                'order_id' => 'required|exists:orders,id'
//            ]);
//
//            if ($validator->fails()) {
//                $errors = $validator->errors()->all();
//                throw new Exception($errors[0]);
//            }
//
//            $diagnosis = new DiagnosisRepository();
//            $return = $diagnosis->prepare($order_id)->get();
//
//            return response()->json($return);

        }catch (Exception $e){
            return abort(404, trans('order.not-found'));
        }


    }
    
    /**
     * @SWG\Post(
     *     path="/diagnosis",
     *     tags={"Diagnosis"},
     *     summary="개별주문에 대한 저장", 
     *     description="개별주문에 진단 저장",
     *     operationId="update",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function update(Request $request) {

        $order_id = $request->get('order_id');
        $encrypt_json = $request->get('diagnosis');
        
        $diagnosis = new DiagnosisRepository();
        $return = $diagnosis->prepare($order_id)->save($encrypt_json);

        return response()->json($return);
    }


     /**
     * @SWG\Post(
     *     path="/diagnosis/upload",
     *     tags={"Diagnosis"},
     *     summary="진단데이터의 파일업로드 핸들러", 
     *     description="진단데이터의 이미지, 음성파일을 스토리지로 업로드한다",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문번호",required=true,type="integer"),
     *     @SWG\Parameter(
     *         description="업로드파일",
     *         in="formData",
     *         name="upfile",
     *         required=true,
     *         type="file"
     *     ),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Code"))
     *     ),
     *     @SWG\Response(response=404, description="no result"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/ErrorModel")
     *     )
     * )
     */
    public function upload(Request $request) {

        $order_id = $request->get('order_id');

        $return = [
            'status' => '',
            'msg' => ''
        ];

        try {
            $uploader_name = 'upfile';
            $uploader_group = 'diagnosis';
            $uploader_group_id = $order_id;

            $validator = Validator::make($request->all(), [
                        $uploader_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            if ($validator->fails()) {
                $errors = $validator->errors()->all();
               throw new Exception($errors[0]);
            }

            $uploader = new Receiver($request);
            $response = $uploader->receive($uploader_name, function ($file, $path_prefix, $path, $file_new_name) {
                // 파일이동
                $file->move($path_prefix . $path, $file_new_name);

                try {
                    $file_size = $file->getClientSize();
                } catch (RuntimeException $ex) {
                    $file_size = 0;
                }

                return [
                    'original' => $file->getClientOriginalName(),
                    'source' => $file_new_name,
                    'path' => $path,
                    'size' => $file_size,
                    'extension' => $file->getClientOriginalExtension(),
                    'mime' => $file->getClientMimeType(),
                    //@TODO 실제파일이 아닌 파일
                    'hash' => md5($file)
                ];
            });

            // 업로드 성공시
            if ($response['result']) {

                // Save the record to the db
                $data = File::create([
                            'original' => $response['result']['original'],
                            'source' => $response['result']['source'],
                            'path' => $response['result']['path'],
                            'size' => $response['result']['size'],
                            'extension' => $response['result']['extension'],
                            'mime' => $response['result']['mime'],
                            'hash' => $response['result']['hash'],
                            'download' => 0,
                            'group' => ($uploader_group ? $uploader_group : NULL),
                            'group_id' => ($uploader_group_id ? $uploader_group_id : NULL)
                ]);
                $data->save();

                $return = [
                    'status' => 'success',
                    'msg' => trans('file.upload_success'),
                    'data' => $data->toArray()
                ];
            }

            return response()->json($return);
        } catch (Exception $ex) {

            $return = [
                'status' => 'error',
                'msg' => $ex->getMessage(),
            ];

            return response()->json($return);
        }
    }


    /**
     * @SWG\Get(
     *     path="/diagnosis/item",
     *     tags={"Diagnosis"},
     *     summary="주문의 상품정보조회",
     *     description="주문번호에 대한 상품 진단레이아웃 조회",
     *     operationId="getItem",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *     }
     * )
     */
    public function getItem(Request $request) {
//        $diagnosis = new DiagnosisRepository();
//        $return = $diagnosis->get($order_id);
//
//        return response()->json($return->item);
        try{
            $order_id = $request->get('order_id');

            $item = Order::findOrFail($order_id)->item;

//             return response()->json([
//                                 'id' => $item->id,
//                 'name' => $item->name,
//                 'price' => $item->price,
// //                'layout' => $item->layout, 
//                 'layout' => json_encode(str_replace(["\r\n","\r","\n", "\""], ["", "", "", "'"] ,stripcslashes($item->layout))),
//                 'created_at' => $item->created_at
// ]);


            return response()->json(json_decode($item->layout,true));

        }catch (Exception $e) {
            return abort(404, trans('item.not-found'));
        }

    }

    /**
     * @SWG\Post(
     *     path="/diagnosis/grant",
     *     tags={"Diagnosis"},
     *     summary="주문의 엔지니어 설정",
     *     description="특정주문의 진단이 시직되면 헤당 엔지니어에게 사용자 설정을 한다.",
     *     operationId="setDiagnosisEngineer",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="formData",description="주문 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="user_id",in="formData",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *     }
     * )
     */
    public function setDiagnosisEngineer(Request $request) {

        try {
            $order_id = $request->get('order_id');
            $user_id = $request->get('user_id');

            $validator = Validator::make($request->all(), [
               'user_id' => 'required|unique:users'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
               throw new Exception($errors[0]);
            }


            $diagnosis = new DiagnosisRepository();
            $return = $diagnosis->get($order_id);

            $return->engineer_id = $user_id;
            $return->status = 106;
            $return->save();

            return response()->json(true);
            
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('diagnosis.not-found'));
        }
    }
    




    /**
     * @SWG\Get(
     *     path="/diagnosis/reservation",
     *     tags={"Diagnosis"},
     *     summary="입고예약 목록",
     *     description="정비소에 입고되어진 주문 목록, 오늘부터 미래의 주문 출력",
     *     operationId="getDiagnosisReservation",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="string",format="varchar"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Orders"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function getDiagnosisReservation(Request $request) {
        try {

            $date = $request->get('date');
            $user_id = $request->get('user_id');


            $validator = Validator::make($request->all(), [
               'user_id' => 'required|exists:users,id',
               'date' => 'required|date_format:Y-m-d'
            ]);


            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(array(
                    'date' => $date,
                    'count' =>0,
                    'orders' => []
                ));
            }

            $user = User::findOrFail($user_id);

            $reservations = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
            ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
            ->whereNotNull("reservations.updated_at")
            ->where('orders.garage_id', $user->user_extra->garage_id)
            ->whereIn('orders.status_cd', [104,105])
            ->select('reservations.*')
            ->get(); //입고대기, 입고

            $returns = [];


            $diagnosis = new DiagnosisRepository();

            foreach($reservations as $reservation) {
                $returns[] = $diagnosis->prepare($reservation->orders_id)->order();
            }

            return response()->json(array(
                'date' => $date,
                'count' =>count($returns),
                'orders' => $returns
            ));
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('diagnosis.not-found'));
        }
    }


    /**
     * @SWG\Get(
     *     path="/diagnosis/working",
     *     tags={"Diagnosis"},
     *     summary="진단중 목록",
     *     description="엔지니어 개인의 진단중 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnosisWorking",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function getDiagnosisWorking(Request $request) {
        try {
            
            $user_id = $request->get('user_id');
           
            $validator = Validator::make($request->all(), [
               'user_id' => 'required|exists:users,id'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                throw new Exception($errors[0]);
            }

            $user = User::findOrFail($user_id);

            $orders = Order::where('orders.garage_id', $user->user_extra->garage_id)
                    ->where('status_cd', [106])
                    ->where('diagnose_at', null)
                    ->get();

            $returns = [];

            $diagnosis = new DiagnosisRepository();

            foreach($orders as $order) {
                $returns[] = $diagnosis->prepare($order->id)->order();
            }

            return response()->json($returns);
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('garage_id.not-found'));
        }
    }

    /**
     * @SWG\Get(
     *     path="/diagnosis/complete",
     *     tags={"Diagnosis"},
     *     summary="진단완료 목록",
     *     description="진단이 완료된 주문 목록, 오늘부터 과거의 주문 출력",
     *     operationId="getDiagnosisComplete",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Parameter(name="date",in="query",description="날짜",required=true,type="integer",format="int64"),
     *     @SWG\Parameter(name="s",in="query",description="검색어",required=false,type="string",format="text"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Post"))
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
    public function getDiagnosisComplete(Request $request) {
        try {

            $date = $request->get('date');
            $user_id = $request->get('user_id');
            $s = $request->get('s');

            $validator = Validator::make($request->all(), [
               'user_id' => 'required|exists:users,id',
               'date' => 'required|date_format:Y-m-d',
               's' => 'min:1'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(array(
                    'date' => $date,
                    'count' =>0,
                    'orders' => []
                ));
            }

            $user = User::findOrFail($user_id);

            $where = Reservation::leftJoin('orders', 'reservations.orders_id', '=', 'orders.id')
            ->where(DB::raw("DATE_FORMAT(reservations.reservation_at, '%Y-%m-%d')"), $date)
            ->whereNotNull("reservations.updated_at")
            ->where('orders.garage_id', $user->user_extra->garage_id)
            ->where('orders.status_cd', ">=", 107)
            ->select('reservations.*');

            if($s) {
                $where->where('orders.car_number', $s);
            }

            $reservations = $where->get(); //진단완료이후


            $returns = [];

            $diagnosis = new DiagnosisRepository();

            foreach($reservations as $reservation) {
                $returns[] = $diagnosis->prepare($reservation->orders_id)->order();
            }
            
            return response()->json(array(
                'date' => $date,
                'count' =>count($returns),
                'orders' => $returns
            ));
            // 앱에서는 간단하게 
        } catch (Exception $e) {
            return abort(404, trans('diagnosis.not-found'));
        }
    }


    /**
     * @SWG\Get(
     *     path="/diagnosis/count",
     *     tags={"Diagnosis"},
     *     summary="오늘과 내일의 입고예약 갯수",
     *     description="특정정비소의 오늘과 내일의 입고예약 갯수",
     *     operationId="getReservationCount",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="user_id",in="query",description="사용자 번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="object")
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *     }
     * )
     */
    public function getReservationCount(Request $request) {
        // $order_num = Order::find($order_id)->item_id;
        // $layout = Item::find($order_num)->layout;
        // return Order::findOrFail($order_id)->item->layout;
        $user = User::where("id", $request->get('user_id'))->first();

        $today = Reservation::where("garage_id", $user->user_extra->garage_id)->whereNotNull('updated_at')->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::today()->format('Y-m-d'))->count();
        $tomorrow = Reservation::where("garage_id", $user->user_extra->garage_id)->whereNotNull('updated_at')->where(DB::raw("DATE_FORMAT(reservation_at, '%Y-%m-%d')"), Carbon::tomorrow()->format('Y-m-d'))->count();

        $today = rand(0,99);
        $tomorrow = rand(0,99);
        
        return response()->json([
            'today' => [
                "left" => ($today >= 10 ? $today/10 : '0'),
                "right" => ($today >= 10 ? $today%10 : $today)
            ],
            'tomorrow' => [
                "left" => ($tomorrow >= 10 ? $tomorrow/10 : '0'),
                "right" => ($tomorrow >= 10 ? $tomorrow%10 : $tomorrow)
            ]
        ]);
    }

    /**
     * @SWG\Get(
     *     path="/diagnosis/make",
     *     tags={"Diagnosis"},
     *     summary="진단데이터 생성",
     *     description="주문번호를 이용한 진단데이터 생성",
     *     operationId="saveDiagnosisDate",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="order_id",in="query",description="주문번호",required=true,type="integer",format="int32"),
     *     @SWG\Response(response=200,description="success",
     *          @SWG\Schema(type="object")
     *     ),
     *     @SWG\Response(response=401, description="unauthorized"),
     *     @SWG\Response(response=404, description="not found"),
     *     @SWG\Response(response=500, description="internal server error"),
     *     @SWG\Response(response="default",description="error",
     *          @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     security={
     *     }
     * )
     */
    public function saveDiagnosisDate(Request $request){
        try {
            $order_id = $request->get('order_id');
            $order = Order::findOrFail($order_id);
            $item_layout = $order->item->layout;

            $diagnosis = new DiagnosisRepository();
            $diagnosis->save($order_id, $item_layout);

            return response()->json(true);
        } catch (Exception $e){
            return abort(404, trans('diagnosis.not-making'));
        }
    }


}
