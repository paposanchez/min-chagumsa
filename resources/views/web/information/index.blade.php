@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>차검사 소개<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>차검사 소개</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='select' href='{{ route("information.index") }}'>서비스 소개</a></li>
		<li><a class='' href='{{ route("information.certificate") }}'>차검사인증서란?</a></li>
		<li><a class='' href='{{ route("information.guide") }}'>특징 및 절차</a></li>
		<li><a class='' href='{{ route("information.price") }}'>신청절차 및 수수료</a></li>
	</ul>

	<div class='br30'></div>
	<div class='br20'></div>

	<div class='cont_title'>
		정확한 품질, 공정한 가격, 투명한 정보 공개로 신뢰할 수 있는 중고차거래가 가능해집니다.
		<strong>이제 중고차 사고 팔 때 <span>차검사인증서</span>를 요청하세요.</strong>
	</div>

	<div class='br30'></div>

	<div class='intro1_top_wrap'>
		<div class='' style='width:293px;'>{{ Html::image(Helper::theme_web( '/img/intro/intro1_1.png')) }}</div>
		<div class='para_type1' style='width:617px;padding-left:30px;'>
			‘레몬마켓, 역선택, 정보의 비대칭, 허위, 미끼, ..’ 중고차 시장을 설명하는 단어들입니다. 소비자는 중고차를 사는 일 파는 일은 어려움을 넘어 두렵기까지 합니다.<br>
			중고차 시장에서 판매자는 자신에게 불리한 정보는 가급적 숨기거나 은폐하려는 경향을 가지게 됩니다. 이는 중고차의 품질과 가격에 대한 성능 및 가격에 대한 모호성때문에 소비자의 불신이 높아지고, 여러가지 오해와 갈등이 끊이질 않게 되는 원인입니다.<br><br>
			이러한 중고차 거래 시 소비자의 피해를 줄이기 위해 정부는 자동차관리법을 일부 개정하여, 자동차가격 조사 산정제도를 시행하게 되었습니다. 이는 <span class='fcol_lightGreen'>“중고차를 구매하는 소비자가 계약 체결 전 판매자에게 해당 중고차 가격을 조사 산정해 줄것을 요청하면 판매자가 의무적으로 그 조사 산정내역을 서면으로 고지해 주어야 하는 제도”</span>로 기계분야 자동차기술사 등 자격자가 자동차가격산정 내역서를 발급할 수 있습니다.<br>
			중고차는 차마다 차의 운행이력에 따라 품질이 다르고, 그에 따라 가격이 다 다릅니다. 따라서 중고차는 가치를 공정하고 객관적으로 산정하는 영역은 매우 전문적인 영역으로, 차량에 대한 정확한 품질을 평가하고, 이에 근거한 가치산정이 이루어져야 합니다.
		</div>
	</div>

</div>

<div class='br10'></div>

<div id='sub_wrap' class='type2'>

	<div class='br30'></div>

	<div class='cont_title'>
		중고차의 정확한 성능진단과 가치 산정을
		<strong><span>법적 자격자가</span> 객관적 입장에서 제시합니다.</strong>
	</div>

	<div class='br10'></div>

	<ul class='intro1_btm_wrap'>
		<li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_2.png')) }}</li>
		<li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_3.png')) }}</li>
		<li>{{ Html::image(Helper::theme_web( '/img/intro/intro1_4.png')) }}</li>
	</ul>

	<div class='br10'></div>

	<div class='para_type1 alg_c'>
		이를 위해 차검사서비스는 자동차의 정확한 성능진단을 위해 글로벌 차량진단수리 전문기업인 보쉬카서비스(BOSCH Car Service)의<br>
		130여개 검사항목을 첨단장비와 전문정비사를 통해 진단하고,  중고차 감정평가 및 성능평가에 대한 국내 최고의 권위를 가진<br>
		차량기술법인 “H&T”의 기술사를 통해 차량가치를 산정하여 인증서를 발급하고, 이를 공인합니다.
	</div>

</div>


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
