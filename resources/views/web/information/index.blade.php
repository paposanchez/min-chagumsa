@extends( 'web.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>
        <h2>차검사 소개
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>차검사 소개</span></div>
        </h2>
    </div>

    <div id='sub_wrap'>

        <ul class='menu_tab_wrap text-center'>
            <li><a class='select' href='{{ route("information.index") }}'>서비스 소개</a></li>
            <li><a class='' href='{{ route("information.certificate") }}'>차검사인증서란?</a></li>
            <li><a class='' href='{{ route("information.guide") }}'>특징 및 절차</a></li>
            <li><a class='' href='{{ route("information.price") }}'>신청절차 및 수수료</a></li>
        </ul>

        <div class='br30'></div>
        <div class='br20'></div>

        <div class='cont_title'>
            국내 최초 O2O 중고차 인증 서비스
            <strong>중고차 가격의 새로운 기준,<span> 차검사</span></strong>
        </div>

        <div class='br30'></div>

        <div class='intro1_top_wrap'>
            <div class='' style='width:293px;'>{{ Html::image(Helper::theme_web( '/img/intro/intro1_1.png')) }}</div>
            <div class='para_type1' style='width:617px;padding-left:30px;'>
                차검사 인증서는 손쉬운 중고차 거래를 위해 온라인으로 인증서를 신청하면 공인된 전문가가 차량의 상태를 진단하고 품질 등급 및 가격을 산정하는 서비스입니다.<br><br>

                차검사 인증서는 ‘진단-공인-보증‘ 세 가지 키워드로 설명할 수 있습니다. <span class='fcol_lightGreen'>글로벌 차량 정비 네트워크 보쉬카서비스의 최첨단 차량 진단 장비로 16개 영역, 130여 가지 항목을 정밀진단하고, 법적 산정 권한을 가진 차량기술법인H&T의 차량기술사가 자동차의 품질 등급 및 가격을 산정하고 공인합니다. ㈜짐브러스는 이렇게 산정된 내용을 인증서로 발급해 3개월, 5천km 내에서 보증합니다.</span><br><br>

                차검사 인증서는 중고차 매매의 이해당사자인 딜러, 판매자, 구매자 등과 전혀 상관없는 제3자가 중고차를 인증하는 서비스입니다. 중고차의 정확한 성능 및 상태 진단과 투명한 정보공개,
                공정한 가격산정으로 소비자를 보호하고 신뢰할 수 있는 중고차 거래 환경을 조성하기 위해 노력하겠습니다.
            </div>
        </div>

        <br/>
        <br/>
        <br/>
        <br/>

        <div class='cont_title'>
            <strong>엄격한 정밀 진단 ㅣ 투명한 정보 공개 ㅣ 공정한 가격산정</strong>

        </div>

        <div class='br10'></div>

        <ul class='intro1_btm_wrap'>
            <li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_2.png')) }}</li>
            <li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_3.png')) }}</li>
            <li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_4.png')) }}</li>
        </ul>

        <div class='br10'></div>
    </div>


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
