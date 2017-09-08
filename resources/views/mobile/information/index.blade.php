@extends( 'mobile.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'>서비스 소개</div>

<div class='br20'></div>

<div class='cont_title'>
    정확한 품질, 공정한 가격, 투명한 정보 공개로<br>신뢰할 수 있는 중고차거래가 가능해집니다.
    {{--<strong>국내 최초 O2O 중고차 인증 서비스<br><span>차검사인증서</span>를 요청하세요.</strong>--}}
    <strong>국내 최초 O2O 중고차 인증 서비스<br><span>중고차 가격의 새로운 기준</span>, 차검사.</strong>
</div>

<div class='br30'></div>

<div class='intro1_top_wrap'>
    <div class='top_img'></div><div class='br20'></div>
    <div class='para_type1'>
        차검사 인증서는 손쉬운 중고차 거래를 위해 온라인으로 인증서를 신청하면 공인된 전문가가 차량의 상태를 진단하고<br> 품질 등급 및 가격을 산정하는 서비스입니다.<br>

        차검사 인증서는 ‘진단-공인-보증‘ 세 가지 키워드로 설명할 수 있습니다.<br> 글로벌 차량 정비 네트워크 보쉬카서비스의 최첨단 차량 진단 장비로 16개 영역, 130여 가지 항목을 정밀진단하고,<br> 법적 산정 권한을 가진 차량기술법인H&T의 차량기술사가 자동차의 품질 등급 및 가격을 산정하고 공인합니다.<br>
        ㈜짐브러스는 이렇게 산정된 내용을 인증서로 발급해 3개월, 5천km 내에서 보증합니다.<br>

        차검사 인증서는 중고차 매매의 이해당사자인 딜러, 판매자, 구매자 등과 전혀 상관없는 제3자가 중고차를 인증하는 서비스입니다.<br>
        중고차의 정확한 성능 및 상태 진단과 투명한 정보공개, 공정한 가격산정으로 소비자를 보호하고 신뢰할 수 있는 중고차 거래 환경을 조성하기 위해 노력하겠습니다.

    </div><div class='br20'></div>
</div>

<div style='background:#f4f4f4;'>

    <div class='br30'></div>

    <div class='cont_title'>
        중고차의 정확한 성능진단과 가치 산정을
        <strong><span>엄격한 정밀 진단</span> | 투명한 정보 공개 | 공정한 가격산정</strong>
    </div>

    <ul class='intro1_btm_wrap'>
        <li>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/intro/intro1_2.png")) }}</li>
        <li>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/intro/intro1_3.png")) }}</li>
        <li>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/intro/intro1_4.png")) }}</li>
    </ul>
    <div class='br20'></div>
    <div class='para_type1'>
        이를 위해 차검사서비스는 자동차의 정확한 성능진단을 위해 글로벌 차량진단수리 전문기업인 보쉬카서비스(BOSCH Car Service)의<br>
        130여개 검사항목을 첨단장비와 전문정비사를 통해 진단하고,  중고차 감정평가 및 성능평가에 대한 국내 최고의 권위를 가진<br>
        차량기술법인 “H&T”의 기술사를 통해 차량가치를 산정하여 인증서를 발급하고, 이를 공인합니다.
    </div>
    <div class='br20'></div>

</div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush
