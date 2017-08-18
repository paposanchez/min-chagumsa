@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>차검사 소개<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>차검사 소개</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap text-center'>
        <li><a class='' href='{{ route("information.index") }}'>서비스 소개</a></li>
        <li><a class='select' href='{{ route("information.certificate") }}'>차검사인증서란?</a></li>
        <li><a class='' href='{{ route("information.guide") }}'>특징 및 절차</a></li>
        <li><a class='' href='{{ route("information.price") }}'>신청절차 및 수수료</a></li>
    </ul>

    <div class='br30'></div>
    <div class='br30'></div>

    <div class='cont_title'>
        <strong>중고차 거래의 새로운 방법<span>차검사 인증서</span></strong>
    </div>
    <div class='br30'></div>
    <ul class='intro2_wrap'>
        <li>
            <div class='para_type1'>
                <strong>누구나 중고차를 구입할 때 공정한 가격을 원합니다.</strong>
                좋은 차를 발견하기 위해 중요한 요소는 차량에 대한 검증된 주요 성능과 옵션, 주행거리 및 모델 연도를 살펴보는 것이 좋습니다. 또한, 차량의 이력은 어떨까요? 차가 사고가 났습니까? 기름교환이나 기타 정기 유지보수를 자주 받지는 않았습니까? 모든 차량에는 역사가 있으며, 그 역사는 중고차의 가격에 영향을 줍니다.
            </div><div class='br30'></div>
            <div class='para_type1'>
                <strong>차검사인증서를 통해 자신감을 가지고 중고차를 거래하세요!</strong>
                차검사인증서는 현재와 같이 중고차 가격결정을 매매사업자가 주도적으로 결정하는 것이 아니라, 자동차관리법에 의거 법적권한을 가진 자동차기술사가 중고차가격산정조사를 통해 객관적 입장에서 공정하게 산출하여 공인합니다. 이를 통해 중고차 가치산정에 대한 객관성을 중고차 거래 시 보장받게 됩니다.
            </div><div class='br30'></div>
            <div class='para_type1'>
                <strong>중고차 거래를 원하시나요? 차검사인증서를 신청하세요!</strong>
                거래시 자동차의 정확한 성능과 공정한 가격을 원하면 차검사인증서를 요구하세요! 당신의 차량에 권장 거래가격을 얻는 방법에는 여러가지가 있지만, 차검사인증서는 차별회된 중고차 가치산정 서비스를 제공합니다.
            </div>
        </li>
        <li>

            <div class='board_wrap'>
                <table>
                    <colgroup>
                        <col style='width:300px;'>
                        <col style='width:75px;'>
                        <col style='width:75px;'>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th class='alg_c'>차검사</th>
                            <th class='alg_c'>타기관</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>차량연식, 제조사, 세무모델, 트림</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th><i class="fa fa-check fcol_lightGrey"></i></th>
                        </tr>
                        <tr>
                            <td>표준 & 옵션 기능</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th><i class="fa fa-check fcol_lightGrey"></i></th>
                        </tr>
                        <tr>
                            <td>차량 성능 상태(상세 진단)</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th><i class="fa fa-check fcol_lightGrey"></i></th>
                        </tr>
                        <tr>
                            <td>소유자 변경 이력</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        <tr>
                            <td>사고 이력 및 특별요인(침수, 화재, 불법개조 등)</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>사고/수리 이력 평가</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>차량 등록변경 이력</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>제조사 리콜이력</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>차량 사용이력(렌탈, 개인, 법인, 기타 등)</td>
                            <th><i class="fa fa-check fcol_lightGreen"></i></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </li>
    </ul>

    <div class='br30'></div>
    <div class='br30'></div>

    <div class='cont_title'>
        <strong>중고차 거래의 <span>새롭고 신뢰할만한</span> 방법을 제시합니다.</strong>
    </div>
    <div class='br30'></div>
    <ul class='intro2_wrap'>
        <li>
            <div class='intro2_btm_box'><strong class='fcol_lightGreen'>01</strong>차검사인증서는 차검사만의 고유한 차량성능진단과 연도, 제조사, 모델, 주행거리, 위치 및 조건을 고려하여 차량식별번호(차대번호) 별로 고유하게 발급됩니다.</div>
            <div class='br30'></div>
        </li>
        <li>
            <div class='intro2_btm_box'><strong class='fcol_lightGreen'>02</strong>차량별 성능진단보고서는 글로벌 차량진단정비 전문업체인 보쉬카서비스(BOSCH Car Service)의 진단전문 장비와 전문인력을 통해 평가되어 신뢰할 수 있는 보고서를 제공합니다.</div>
            <div class='br30'></div>
        </li>
        <li>
            <div class='intro2_btm_box'><strong class='fcol_lightGreen'>03</strong>차량가치(가격산정) 보고서는 각 차량의 사고횟수, 소유자 수 및 서비스 내역을 조사하고, 차량의 사용방법(개인용, 법인용, 임대용 또는 상업용)과 같은 요소도 정확한 가치를 산정하는데 도움이 됩니다.</div>
        </li>
        <li>
            <div class='intro2_btm_box'><strong class='fcol_lightGreen'>04</strong>차량가치산정평가서는 자동차관리법 제58조 1항 등 자동차 가격산정에 대한 법적 권한을 보유한 자동차기술관련 명인인 자동차기술사가 평가하고 가치평가보고서를 제공합니다.</div>
        </li>
    </ul>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
