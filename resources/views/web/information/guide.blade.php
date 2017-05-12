@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>카검사 소개<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>카검사 소개</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='' href='{{ route("information.index") }}'>서비스 소개</a></li>
		<li><a class='' href='{{ route("information.certificate") }}'>카검사인증서란?</a></li>
		<li><a class='select' href='{{ route("information.guide") }}'>특징 및 절차</a></li>
	</ul>

	<div class='br20'></div>
	<div class='br20'></div>

	<div class='intro3_title'>카검사에서 제공하는 중고차인증 서비스</div>

	<div class='br20'></div>

	<div class='intro3_tab_wrap'>
		<ul>
			<li id='intro3_tab1' class='intro3_tab tab_on'><a>
				<span>성능 인증 서비스</span>
				자동차관리법상에 중고차 가격산정의 주체로 인정된<br>자동차기술사가 산정하여 공인하는 서비스를 제공합니다
			</a></li>
			<li id='intro3_tab2' class='intro3_tab '><a>
				<span>가격 인증 서비스</span>
				자동차관리법상에 중고차 가격산정의 주체로 인정된<br>자동차기술사가 산정하여 공인하는 서비스를 제공합니다
			</a></li>
		</ul>
		
		<div class='intro3_tab_cont intro3_tab1' style='display:block;'>
			<p>
				가격조사산정은 실제 침수여부, 사고상태, 엔진 등 주요부품상태, 옵션 상태에 대한 전문가의 정확한 진단이 필수적이며, 이를 글로벌 자동차진단기업인 BOSCH 카서비스가 정밀하게 진단합니다. 가격산정조사서 발급 수수료는 수입차와 국산차 기준이 다르며, 이에 대한 수수료는 다음과 같습니다.
			</p>
		</div>

		<div class='intro3_tab_cont intro3_tab2'>
			<p>
				가격조사산정은 실제 침수여부, 사고상태, 엔진 등 주요부품상태, 옵션 상태에 대한 전문가의 정확한 진단이 필수적이며, 이를 글로벌 자동차진단기업인 BOSCH 카서비스가 정밀하게 진단합니다. 가격산정조사서 발급 수수료는 수입차와 국산차 기준이 다르며, 이에 대한 수수료는 다음과 같습니다.
			</p>
			<div class='br10'></div>
			<div class='intro3_price_box'>
				<strong>국산차</strong>
				범용 진단장비 활용
				<a>100,000원<span>(VAT 별도)</span></a>
			</div>
			<div class='br10'></div>
			<div class='intro3_price_box'>
				<strong>수입차</strong>
				수입차 전문진단 장비 활용, 국내 수입된 모든 수입차 진단 가능
				<a>200,000원<span>(VAT 별도)</span></a>
			</div>
		</div>

	</div>

	<div class='br30'></div>
	<div class='br30'></div>

	<div class='intro3_title'>서비스 신청절차</div>
	
	<div class='intro3_step_box'>
		<div>
			<strong>STEP01</strong>차량정보 입력
		</div>
		<p>
			<span>간단한 차량정보를 입력합니다.</span>
			- 자동차제조사, 모델, 트림 정보 입력<br>
			- 자동차등록번호 입력<br>
			- 차량옵션 입력 <br>
			&nbsp;&nbsp;※ 차량가격산정에 영향을 주므로 기본옵션 외 차량소유자가 설치한 옵션을 정확히 입력해 주세요
		</p>
	</div>

	<div class='intro3_step_box'>
		<div>
			<strong>STEP02</strong>차량검사 장소 및<br>시간 선택
		</div>
		<p>
			<span>전국 400개 BOSCH 카정비소에서 정밀한 진단이 가능합니다. </span>
			- 가까운 BOSCH 카서비스 선택<br>
			- 진단 일정 예약<br>
			&nbsp;&nbsp;※ 원하는 시간을 선택하시면 진단담당자의 전화 확인 후 예약일정이 확정됩니다
		</p>
	</div>

	<div class='intro3_step_box'>
		<div>
			<strong>STEP03</strong>결제하기
		</div>
		<p>
			<span class='br30'>결제를 진행합니다.</span>
		</p>
		<button class='btns btns2'>정비소 찾아보기</button>
	</div>

	<div class='intro3_step_box'>
		<div>
			<strong>STEP04</strong>차량 입고
		</div>
		<p>
			<span>예약이 확정된 시간에 신청 차량과 자동차등록증을 가지고 방문하시기 바랍니다.</span>
			- 차량 내외부 점검, 사고유무 점검, 침수여부 점검, 추가 장착 옵션 점검 및 엔진 등 주요장치 진단<br>
			- 1시간 소요 예정
		</p>
	</div>

	<div class='intro3_step_box'>
		<div>
			<strong>STEP05</strong>인증서 발급 및<br>공인
		</div>
		<p>
			<span>자동차 가치평가 분야에 전문적인 자동차기술사가 인증서를 발급합니다. </span>
			- 차량모델, 세부트림 및 히스토리, 차량 성능 기반 평가<br>
			- 1개월 / 2000km 까지 보증<br>
			- 중고차 판매 사이트 및 SNS에 공유 가능한 인증서 링크 제공
		</p>
	</div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script>
$(document).ready(function(){

	$('.intro3_tab').mousedown(function(){
		$('.tab_on').removeClass('tab_on');
		$('.intro3_tab_cont').hide();
		$(this).addClass('tab_on');
		$('.'+$(this).attr('id')).show();
	});

});
</script>
@endpush
