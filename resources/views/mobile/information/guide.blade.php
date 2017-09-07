@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>서비스 소개</div>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='intro3_title'>차검사에서 제공하는 중고차인증 서비스</div>

        <div class='br20'></div>

        <div class='intro3_tab_wrap'>
            <ul>
                <li id='intro3_tab1' class='intro3_tab tab_on'><a>
                        <span>성능 인증 서비스</span>

                    </a></li>
                <li id='intro3_tab2' class='intro3_tab '><a>
                        <span>가격 인증 서비스</span>

                    </a></li>
            </ul>

            <div class='intro3_tab_cont intro3_tab1' style='display:block;'>

                <div class='para_type1'>
                    <strong>정확한 품질확인을 위한 정밀한 진단</strong>
                    전국 500개 보쉬카서비스 네트워크에서 첨단장비 및 숙련된 정비사를 통한 진단 및 평가를 진행합니다.<br><br>
                    {{ Html::image(\App\Helpers\Helper::theme_mobile("/img/intro/intro3_1.jpg")) }}
                </div><div class='br30'></div>
                <div class='para_type1'>
                    <strong>130여가지의 점검항목을 통한 통합적인 진단</strong>
                    중고차의 품질을 평가하기 위해 보쉬의 최첨단 진단장비를 활용하고, 각 점검부위에 대한 사진, 1급 정비사의 의견 등을 통한 차량의 통합적인 품질상태 점검 및 리포팅을 진행하여, 소비자에게 정확한 품질상태를 제공합니다.
                </div><div class='br30'></div>

                <div class='board_wrap'>
                    <table>
                        <colgroup>
                            <col style='width:120px;'>
                            <col style='width:300px;'>
                            <col style='width:100px;'>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>진단항목</th>
                            <th>상세</th>
                            <th>항목수</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>주요내/외판</th>
                            <th>차체 및 주요골격에 상태 교환수리, 판금, 부식 등 점검</th>
                            <th>18</th>
                        </tr>
                        <tr>
                            <th>엔진(원동기)</th>
                            <th>엔진장공상태, 오일, 냉각수, 엔진 마운트 부분 상태 점검</th>
                            <th>13</th>
                        </tr>
                        <tr>
                            <th>사고유무</th>
                            <th>보험사고이력조회가 아닌 실제적인 차축프레임 진단을 통한 사고이력 진단</th>
                            <th>4</th>
                        </tr>
                        <tr>
                            <th>변속기</th>
                            <th>오일누유, 유량상태, 변속기 마운트 등 상태 점검</th>
                            <th>8</th>
                        </tr>
                        <tr>
                            <th>침수흔적</th>
                            <th>엔진룸, 실내(앞바닥), 트렁크(바닥) 분해를 통한 확실한 침수흔적 점검</th>
                            <th>3</th>
                        </tr>
                        <tr>
                            <th>동력전달</th>
                            <th>등록조인트, 추진축 및 베어링 상태 진단</th>
                            <th>8</th>
                        </tr>
                        <tr>
                            <th>차량외판</th>
                            <th>차량외판, 범퍼, 등화관련 긁힘, 부식, 깨짐균열에 대한 점검</th>
                            <th>4</th>
                        </tr>
                        <tr>
                            <th>조향장치</th>
                            <th>휠 얼라인먼트, 스티어링 기어 등 부품작동상태 진단</th>
                            <th>10</th>
                        </tr>
                        <tr>
                            <th>차량실내</th>
                            <th>계기패널, 콘솔박스, 내장트림, 시트 등에 대한 긁힘, 오염 등 상태점검</th>
                            <th>5</th>
                        </tr>
                        <tr>
                            <th>제동장치</th>
                            <th>브레이크 오일유량, 디스크, 배력장치 등 제동장치 상태 진단</th>
                            <th>7</th>
                        </tr>
                        <tr>
                            <th>소모품상태</th>
                            <th>엔진오일, 브레이크패드, 배터리, 타이밍벨트 등 소모품 상태 점검</th>
                            <th>9</th>
                        </tr>
                        <tr>
                            <th>전기장치</th>
                            <th>발전기, 시동모터, 실내송품모터, 라이에티터 팬 모터 등 상태 점검</th>
                            <th>10</th>
                        </tr>
                        <tr>
                            <th>전장품/유리기어</th>
                            <th>도어록, 와이퍼, 사이드미러, 전동시트 등 전장품 및 장착품 작동상태 점검</th>
                            <th>9</th>
                        </tr>
                        <tr>
                            <th>휠&amp;타이어</th>
                            <th>휠손상, 타이어편마모, 타이어접지면 등 상태 점검</th>
                            <th>10</th>
                        </tr>
                        <tr>
                            <th>전문진단기</th>
                            <th>BOSCH 정밀 진단기를 통한 에러 상태 진단</th>
                            <th>10</th>
                        </tr>
                        <tr>
                            <th>주행테스트</th>
                            <th>80km 이상 주행 테스트를 통한 엔진, 변속기, 브레이크, 조향 등 운전점검</th>
                            <th>5</th>
                        </tr>
                        </tbody>
                    </table>
                </div><div class='br30'></div>

                <div class='para_type1'>
                    <strong>품질등급 인증</strong>
                    중고차의 정밀한 진단을 통해 진단 중고차에 대한 등급을 인증하고, 이를 보장(3개월, 5000km 내)합니다.
                </div><div class='br30'></div>

                <div class='board_wrap'>
                    <table>
                        <colgroup>
                            <col style='width:150px;'>
                            <col style='width:550px;'>
                            <col style='width:400px;'>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>등급구분</th>
                            <th>평가 기준</th>
                            <th>비 고</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><strong>AAA</strong></th>
                            <td>
                                - 사고·수리이력 전혀 없음<br>
                                - 차량성능상태 및 외판, 실내 관리상태 양호<br>
                                - 평가가격이 평균시세를 초과하는 차량
                            </td>
                            <td>
                                - 사고·수리이력 없음<br>
                                - 표준주행거리 이내<br>
                                - 추가옵션 등 가액
                            </td>
                        </tr>
                        <tr>
                            <th><strong>AA</strong></th>
                            <td>
                                - 사고·수리이력 평가등급 AA 차량<br>
                                - 차량성능상태 및 외판, 실내 관리상태 양호<br>
                                - 평가가격이 평균시세 범위의 차량
                            </td>
                            <td>
                                - 경미한 범퍼수리이력 <br>
                                - 표준주행거리 <br>
                                - 차량상태 양호
                            </td>
                        </tr>
                        <tr>
                            <th><strong>A</strong></th>
                            <td>
                                - 사고·수리이력 평가등급 AB 차량<br>
                                - 차량성능상태 양호, 외판 및 실내상태 보통<br>
                                - 감가율 10% 이내 적용차량
                            </td>
                            <td>
                                - 단순외판 수리이력<br>
                                - 외판 및 실내상태 보통
                            </td>
                        </tr>
                        <tr>
                            <th><strong>B</strong></th>
                            <td>
                                - 사고·수리이력 평가등급 AC 차량<br>
                                - 차량성능상태 및 품질상태 보통<br>
                                - 감가율 20% 이내 적용 차량
                            </td>
                            <td>
                                - 외판, 내판 등 중손상 이력<br>
                                - 차량상태 보통<br>
                                - 경미한 수리·정비필요
                            </td>
                        </tr>
                        <tr>
                            <th><strong>C</strong></th>
                            <td>
                                - 사고·수리이력 평가등급 AD 차량<br>
                                - 감가율 30% 이상 적용 차량
                            </td>
                            <td>
                                - 주요 골격부 등 대손상 이력<br>
                                - 침수, 전손차량 등<br>
                                - 기계적 수리·정비필요
                            </td>
                        </tr>
                        <tr>
                            <th><strong>D</strong></th>
                            <td>
                                - 평가 불가
                            </td>
                            <td>
                                - 평가 불가
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><div class='br30'></div>

                <div class='board_wrap'>
                    <table>
                        <colgroup>
                            <col style='width:25%;'>
                            <col style='width:25%;'>
                            <col style='width:25%;'>
                            <col style='width:25%;'>
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan='4'>손상 및 수리 범위에 의한 사고/수리 이력 평가 등급의 구분</th>
                        </tr>
                        <tr>
                            <th>AA</th>
                            <th>AB<br>(소손상, 단순외판교환)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                사고·수리이력 없음<br>
                                단순 범퍼 교환 수리
                            </th>
                            <th>
                                후드 (hood)<br>
                                프론트펜더 (front fender)<br>
                                프론트도어 (front door)<br>
                                리어도어 (rear door)<br>
                                트렁크리드 (trunk lid)<br>
                                백도어 (back door)
                            </th>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th>AC<br>(중손상/주요패널수리)</th>
                            <th>AD<br>(대손상/주요부재수리)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                프론트패널 (front panel)<br>
                                백패널 (리어패널)(back panel)<br>
                                리어펜더 (rear fender)<br>
                                인사이드패널 (inside panel)<br>
                                트렁크바닥패널 (trunk floor)<br>
                                사이드스텝패널 (side step panel)
                            </th>
                            <th>
                                휠하우스 (wheel apron)<br>
                                사이드멤버 (side member)<br>
                                필러(A,B,C) (pillar)<br>
                                카울,대쉬패널 (cowl & dash)<br>
                                지붕 (roof)<br>
                                실내바닥 (floor)<br>
                                프레임 (frame)
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div><div class='br30'></div>

            </div>

            <div class='intro3_tab_cont intro3_tab2'>
                <div class='para_type1'>
                    <strong>중고차 가치산정 자격</strong>
                    자동차관리법 제 58조 제1항, 제4호 및 같은 법 시행규칙 120조 제5항, 기술사법 제3조의 직무에 따라 법적 자격을 가진 자동차기술사가 중고차의 가격을 조사, 산정합니다.
                </div><div class='br30'></div>
                <div class='para_type1'>
                    <strong>중고차 가치산정 보고서</strong>
                    중고차를 구입할때 품질만큼 중요한 것은 바로 가격입니다. 하지만 중고차의 가격을 결정하는 주체에 따라 천차만별이 될 수 있고, 판매자이자 구매자인 소비자들은 가격에 대한 불안과 불만을 가지고 있는 것이 사실입니다.<br>차검사인증서의 중고차 가치산정보고서는 법적 자격자인 자동차기술사가 제3자적 관점에서 제시하여 공인 보고서를 발급합니다. 이를 중고차 거래에 참조할 수 있습니다.
                </div><div class='br30'></div>
                <div class='para_type1'>
                    <strong>중고차 가치산정 방법</strong>
                    중고차 가격 산정 절차와 방법을 객관적이고 공정한 절차에 의거 산정내역을 제시합니다. 가치산정을 위해 차검사인증서 신청 시 추가장착품에 대해 정확히 기재해야 좀더 높은 가치를 산정받을  수 있으며, 차량성능 상태에 대한 사전 보쉬카서비스에서 정확하게 검사받아야 합니다.
                    <br><br>
                    {{ Html::image(\App\Helpers\Helper::theme_mobile("/img/intro/intro3_2.png")) }}
                </div>
            </div>

        </div>

    </div>

    <div class='br30'></div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $('.intro3_tab').mousedown(function(){
            $('.tab_on').removeClass('tab_on');
            $('.intro3_tab_cont').hide();
            $(this).addClass('tab_on');
            $('.'+$(this).attr('id')).show();
        });
    });
</script>

@endpush
