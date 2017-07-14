<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller {

    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke() {

        $layout = '[{"name_cd":2000,"entrys":[{"name_cd":2001,"description":"차량의 등록증 사진을 업로드하세요.","entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"자동차등록증 사진을 추가하세요."}],"children":[]},{"name_cd":2002,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"주행거리계 사진을 추가하세요."}],"children":[]},{"name_cd":2003,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1010,"selected":null,"except_options":[1122],"description":"차대번호 사진을 추가하세요."}],"children":[]},{"name_cd":2004,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1011,"selected":null,"except_options":null,"description":null}],"children":[]},{"name_cd":2005,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1012,"selected":null,"except_options":[1133],"description":null}],"children":[]},{"name_cd":2006,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":null}],"children":[]}]},{"name_cd":2007,"entrys":[{"name_cd":2008,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"전방사진을 추가하세요."},{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"후방사진을 추가하세요."},{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"좌측사진을 추가하세요."},{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"우측사진을 추가하세요."}],"children":[]},{"name_cd":2009,"description":null,"entrys":[],"children":[{"name_cd":2010,"description":null,"entrys":[{"name_cd":1138,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1139,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1140,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1141,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1142,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]},{"name_cd":2011,"description":null,"entrys":[{"name_cd":1143,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1144,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1145,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]},{"name_cd":2012,"description":null,"entrys":[{"name_cd":1146,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1147,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1148,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1149,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1150,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]}]},{"name_cd":2013,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2014,"entrys":[{"name_cd":2015,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"차량의 하단 사진을 추가하세요."}],"children":[]},{"name_cd":2016,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"엔진 사진을 추가하세요."}],"children":[]},{"name_cd":2017,"description":null,"entrys":[],"children":[{"name_cd":2018,"description":null,"entrys":[{"name_cd":1151,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1152,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1153,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]},{"name_cd":2019,"description":null,"entrys":[{"name_cd":1154,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1155,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1156,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1157,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1158,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1159,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1160,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1161,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1162,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1163,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1164,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1165,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1166,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1167,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1168,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]},{"name_cd":2020,"description":null,"entrys":[{"name_cd":1169,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1170,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."},{"name_cd":1171,"use_image":1,"use_voice":0,"options_cd":1020,"selected":null,"except_options":[2143],"description":"참고사진을 추가하세요."}]}]},{"name_cd":2021,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2022,"entrys":[{"name_cd":2023,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1021,"selected":null,"except_options":[1177],"description":"참고사진을 추가하세요."}],"children":[]},{"name_cd":2024,"description":null,"entrys":[],"children":[{"name_cd":2025,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1022,"selected":null,"except_options":[1181],"description":"실내 사진을 추가하세요."}]},{"name_cd":2026,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1023,"selected":null,"except_options":[1184],"description":"앞좌석을 해체하여 실내바닥사진을 추가하세요."}]},{"name_cd":2027,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1023,"selected":null,"except_options":[1184],"description":"트렁크를 해체하여 실내바닥사진을 추가하세요."}]},{"name_cd":2028,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1024,"selected":null,"except_options":[1187],"description":"엔진룸을 열어 사진을 추가하세요."}]}]},{"name_cd":2029,"description":null,"entrys":[],"children":[{"name_cd":2030,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1025,"selected":null,"except_options":[1189],"description":"외판(도장) 참고사진을 추가하세요."}]},{"name_cd":2031,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1030,"selected":null,"except_options":[1204],"description":"등화 참고사진을 추가하세요."}]},{"name_cd":2032,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1030,"selected":null,"except_options":[1204],"description":"범퍼 참고사진을 추가하세요."}]},{"name_cd":2033,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1030,"selected":null,"except_options":[1204],"description":"유리(후사경 포함) 참고사진을 추가하세요."}]}]},{"name_cd":2034,"description":null,"entrys":[],"children":[{"name_cd":2035,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1031,"selected":null,"except_options":[1208],"description":"계기패널 참고사진을 추가하세요."}]},{"name_cd":2036,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1031,"selected":null,"except_options":[1208],"description":"콘솔박스 참고사진을 추가하세요."}]},{"name_cd":2037,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1031,"selected":null,"except_options":[1208],"description":"내장&트림 참고사진을 추가하세요."}]},{"name_cd":2038,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1032,"selected":null,"except_options":[1212],"description":"시트 참고사진을 추가하세요."}]},{"name_cd":2039,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1032,"selected":null,"except_options":[1212],"description":"매트 참고사진을 추가하세요."}]}]},{"name_cd":2040,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"차량 내외부 점검에 대한 종합의견을 음성코멘트로 추가하세요."}],"children":[]}]},{"name_cd":2041,"entrys":[{"name_cd":2042,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"도어록 진단기결과 사진을 추가하세요."}],"children":[]},{"name_cd":2043,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"유리기어 진단기결과 사진을 추가하세요."}],"children":[]},{"name_cd":2044,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"리모콘참고사진을 추가하세요."}],"children":[]},{"name_cd":2045,"description":null,"entrys":[],"children":[{"name_cd":2046,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"와이퍼 조향장치 사진을 추가하세요."}]},{"name_cd":2047,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"와이퍼 오일상태 사진을 추가하세요."}]}]},{"name_cd":2048,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"사이드미러 사진을 추가하세요."}],"children":[]},{"name_cd":2049,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"선루프 상태 사진을 추가하세요."}],"children":[]},{"name_cd":2050,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"네비게이션 상태 사진을 추가하세요."}],"children":[]},{"name_cd":2051,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"참고사진을 추가하세요."}],"children":[]},{"name_cd":2052,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"후방카메라 사진을 추가하세요."}],"children":[]},{"name_cd":2053,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"추가장착품 사진을 추가하세요."}],"children":[]},{"name_cd":2054,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"각 전장품 및 작참품에 대한 점검상태를 음성코멘트로 추가하세요."}],"children":[]}]},{"name_cd":2055,"entrys":[{"name_cd":2056,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1029,"selected":null,"except_options":[1201],"description":"엔진오일 사진을 추가하세요."}],"children":[]},{"name_cd":2057,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1029,"selected":null,"except_options":[1201],"description":"냉각수 상태 사진을 추가하세요."}],"children":[]},{"name_cd":2058,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1028,"selected":null,"except_options":[1198],"description":"브레이크 패드 사진을 추가하세요"}],"children":[]},{"name_cd":2059,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1028,"selected":null,"except_options":[1198],"description":"배터리 사진을 추가하세요."}],"children":[]},{"name_cd":2060,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1028,"selected":null,"except_options":[1198],"description":"타이밍벨트 사진을 추가하세요."}],"children":[]},{"name_cd":2061,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1028,"selected":null,"except_options":[1198],"description":"팬벨트 및 텐서너 사진을 추가하세요."}],"children":[]},{"name_cd":2062,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"소모품 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2063,"entrys":[{"name_cd":2064,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1033,"selected":null,"except_options":[1216],"description":null}],"children":[]},{"name_cd":2065,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1033,"selected":null,"except_options":[1216],"description":"변속기 상태 사진을 추가하세요."}],"children":[]},{"name_cd":2066,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":[1193],"description":"고장 진단 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2067,"entrys":[{"name_cd":2068,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"작동상태 참고사진을 추가하세요."}],"children":[]},{"name_cd":2069,"description":null,"entrys":[],"children":[{"name_cd":2070,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"실린더헤드가스켓 참고사진을 추가하세요."}]},{"name_cd":2071,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"로커암커버가스켓 참고사진을 추가하세요."}]},{"name_cd":2072,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"엔지오일팬가스켓 참고사진을 추가하세요."}]},{"name_cd":2073,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"엔진오일쿨러가스켓 참고사진을 추가하세요."}]},{"name_cd":2074,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"실린더 블럭 참고사진을 추가하세요."}]}]},{"name_cd":2075,"description":null,"entrys":[],"children":[{"name_cd":2076,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1035,"selected":null,"except_options":[1222],"description":"실린더 블럭 참고사진을 추가하세요."}]},{"name_cd":2077,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1036,"selected":null,"except_options":[1225],"description":"실린더헤드/가스켓 참고사진을 추가하세요."}]},{"name_cd":2078,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1037,"selected":null,"except_options":[1228],"description":"워터펌프 참고사진을 추가하세요."}]},{"name_cd":2079,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1036,"selected":null,"except_options":[1225],"description":"냉각쿨러(라디에이터) 참고사진을 추가하세요."}]},{"name_cd":2080,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1035,"selected":null,"except_options":[1222],"description":"냉각호스 및 히터호스 참고사진을 추가하세요."}]},{"name_cd":2081,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1038,"selected":null,"except_options":[1232],"description":"냉각수량 및 오염 참고사진을 추가하세요."}]}]},{"name_cd":2082,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1038,"selected":null,"except_options":[1232],"description":"오일유량 및 오염 참고사진을 추가하세요."}],"children":[]},{"name_cd":2083,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1039,"selected":null,"except_options":[1236],"description":"엔진마운트 참고사진을 추가하세요."}],"children":[]},{"name_cd":2084,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"엔진 등 원동기 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2085,"entrys":[{"name_cd":2086,"description":null,"entrys":[],"children":[{"name_cd":2087,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"오일누유 참고사진을 추가하세요."}]},{"name_cd":2088,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1040,"selected":null,"except_options":[1240],"description":"오일유량 및 상태 참고사진을 추가하세요."}]},{"name_cd":2089,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1041,"selected":null,"except_options":[1244],"description":"작동상태(시운전) 참고사진을 추가하세요."}]},{"name_cd":2090,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1042,"selected":null,"except_options":[1042],"description":"변속기마운트 참고사진을 추가하세요."}]}]},{"name_cd":2091,"description":null,"entrys":[],"children":[{"name_cd":2092,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1034,"selected":null,"except_options":[1218],"description":"오일누유 참고사진을 추가하세요."}]},{"name_cd":2093,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1040,"selected":null,"except_options":[1240],"description":"오일유량 및 상태 참고사진을 추가하세요."}]},{"name_cd":2094,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1043,"selected":null,"except_options":[1252],"description":"기어변속장치 참고사진을 추가하세요."}]},{"name_cd":2095,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"작동상태(시운전) 참고사진을 추가하세요."}]}]},{"name_cd":2096,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"변속기 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2097,"entrys":[{"name_cd":2098,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"등속조인트 참고사진을 추가하세요."}],"children":[]},{"name_cd":2099,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"추진측 및 베어링 참고사진을 추가하세요."}],"children":[]},{"name_cd":2100,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"동력전달장치 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2101,"entrys":[{"name_cd":2102,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":null,"selected":null,"except_options":null,"description":"휠얼라인먼트  참고사진을 추가하세요."}],"children":[]},{"name_cd":2103,"description":null,"entrys":[],"children":[{"name_cd":2104,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1045,"selected":null,"except_options":[1260],"description":"스티어링 기어  참고사진을 추가하세요."}]},{"name_cd":2105,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1045,"selected":null,"except_options":[1260],"description":"MDPS 모듈  참고사진을 추가하세요."}]},{"name_cd":2106,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1046,"selected":null,"except_options":[1263],"description":"스티어링 펌프  참고사진을 추가하세요."}]},{"name_cd":2107,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"로워암  참고사진을 추가하세요."}]},{"name_cd":2108,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"스테이빌라이저링크  참고사진을 추가하세요."}]},{"name_cd":2109,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"스트럿트 암  참고사진을 추가하세요."}]},{"name_cd":2110,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1044,"selected":null,"except_options":[1256],"description":"어퍼암  참고사진을 추가하세요."}]},{"name_cd":2111,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1047,"selected":null,"except_options":[1265],"description":"속업쇼바(에어쇼바)  참고사진을 추가하세요."}]},{"name_cd":2112,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"타이로드엔드/볼죠인트  참고사진을 추가하세요."}]}]},{"name_cd":2113,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"조향장치 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2114,"entrys":[{"name_cd":2115,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1038,"selected":null,"except_options":[1232],"description":"브레이크 오일 참고사진을 추가하세요."}],"children":[]},{"name_cd":2116,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"EPB 모듈 참고사진을 추가하세요."}],"children":[]},{"name_cd":2117,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1048,"selected":null,"except_options":[1269],"description":"SBC 모듈 참고사진을 추가하세요."}],"children":[]},{"name_cd":2118,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"브레이크 디스크  참고사진을 추가하세요."}],"children":[]},{"name_cd":2119,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1049,"selected":null,"except_options":[1272],"description":"브레이크 오일누유 참고사진을 추가하세요."}],"children":[]},{"name_cd":2120,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"배력장치 상태 참고사진을 추가하세요."}],"children":[]},{"name_cd":2121,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"제동장치 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2122,"entrys":[{"name_cd":2123,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"발전기 참고사진을 추가하세요."}],"children":[]},{"name_cd":2124,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"시동모터 참고사진을 추가하세요."}],"children":[]},{"name_cd":2125,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"실내송풍 모터 참고사진을 추가하세요."}],"children":[]},{"name_cd":2126,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"라디에이터 팬 모터 참고사진을 추가하세요."}],"children":[]},{"name_cd":2127,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"전기장치 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2128,"entrys":[{"name_cd":2129,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"휠 손상 참고사진을 추가하세요."}],"children":[]},{"name_cd":2130,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":"타이어 편마모 참고사진을 추가하세요."}],"children":[]},{"name_cd":2131,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"타이어 접지면 참고사진을 추가하세요."}],"children":[]},{"name_cd":2132,"description":null,"entrys":[{"name_cd":"","use_image":1,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":"타이어 제조일(DOT) 참고사진을 추가하세요."}],"children":[]},{"name_cd":2133,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"휠&타이어 상태에 대한 음성코멘트를 추가하세요."}],"children":[]}]},{"name_cd":2134,"entrys":[{"name_cd":2135,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1050,"selected":null,"except_options":[1275],"description":null}],"children":[]},{"name_cd":2136,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1041,"selected":null,"except_options":[1244],"description":null}],"children":[]},{"name_cd":2137,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1026,"selected":null,"except_options":[1193],"description":null}],"children":[]},{"name_cd":2138,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":null}],"children":[]},{"name_cd":2139,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":0,"options_cd":1027,"selected":null,"except_options":[1196],"description":null}],"children":[]},{"name_cd":2140,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"주행 시 핸들 떨림, 브레이크 감도 등에 대한 의견을 음성모멘트로 추가하세요."}],"children":[]}]},{"name_cd":2141,"entrys":[{"name_cd":2142,"description":null,"entrys":[{"name_cd":"","use_image":0,"use_voice":1,"options_cd":null,"selected":null,"except_options":null,"description":"성능점검 종합의견을 음성코멘트로 추가하세요."}],"children":[]}]}]';


        $items = Item::find(1)->first();
        $items->layout = $layout;
        $items->save();

        return view('web.welcome');
    }

}
