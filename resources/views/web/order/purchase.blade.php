@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>

<div id='sub_wrap'>


	<div class='join_wrap'>

		<ul class='join_step type2'>
			<li class='on link'>
				<strong>01</strong>
				<span>기본정보 입력</span>
			</li>
			<li class='on link'>
				<strong>02</strong>
				<span>입고정보 선택</span>
			</li>
			<li class='on'>
				<strong>03</strong>
				<span>결제하기</span>
			</li>
			<li>
				<strong>04</strong>
				<span>주문완료</span>
			</li>
		</ul>

		<div class='br30'></div>
		<div class='br20'></div>

		{!! Form::open(['route' => ["order.complete"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>결제 예정 내역</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>주문자</span>
					<span>휴대폰 번호</span>
					<span>차량정보</span>
				</div>
				<div class='order_info_desc'>
					<span>홍길동</span>
					<span>010-1234-5678</span>
					<span>폭스바겐 뉴 파사트 2.0 TDI</span>
				</div>
			</div>
		</div>

		<div class='order_calc_wrap'><ul>
			<li class='calc1'>수입차 가격<span><strong>200,000</strong>원</span></li>
			<li class='calc2'>프로모션 할인<span><strong>200,000</strong>원</span></li>
			<li>최종 결제 금액<span><strong>0</strong>원</span></li>
		</ul></div>

		<div class='br30'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>결제 수단 선택</strong>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method' checked>
					<span class='lbl'> 신용/체크카드</span>
				</label>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method'>
					<span class='lbl'> 실시간 계좌이체</span>
				</label>
			</div>

			<div class='br10'></div>

		</div>

		<div class='line_break'></div>

		<div class='br10'></div>

		<div class='ipt_line wid45'>
			<button class='btns btns_blue wid45' style='display:inline-block;'>이전</button>&nbsp;&nbsp; <button type="submit" class='btns btns_green wid45' style='display:inline-block;'>결제하기</button>
		</div>
		{!! Form::close() !!}

	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
