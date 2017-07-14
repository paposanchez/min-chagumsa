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
			<li class='on link'>
				<strong>03</strong>
				<span>결제하기</span>
			</li>
			<li class='on'>
				<strong>04</strong>
				<span>주문완료</span>
			</li>
		</ul>

		<div class='br30'></div>
		<div class='br20'></div>

		<h3>결제가 성공적으로 완료되었습니다. 감사합니다!</h3>
		<h4>
			<strong>주문일</strong> {{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}
			<strong>주문번호</strong> {{ $order->datekey }}-{{ $order->car_number }}
		</h4>

		<div class='br20'></div>

		<div class='order_notice'>
				2~3일 내로 입력하신 휴대폰 번호로 입고일 확정 안내를 드립니다.<br>
				입고일이 확정되면 확정된 입고일에 대리점으로 차량을 입고해 주세요.<br><br>
				<strong>주의! 입고 시 반드시 자동차등록증을 지참해 주시기 바랍니다. </strong>
		</div>

		<div class='br20'></div>
		<div class='br20'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>주문상세</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>주문자</span>
					<span>휴대폰 번호</span>
					<span>차량정보</span>
				</div>
				<div class='order_info_desc'>
					<span>{{ $order->orderer_name }}</span>
					<span>{{ $order->orderer_mobile }}</span>
					<span>{{ $order->getCarFullName() }}</span>
				</div>
				<div class='order_info_btn'>
					{{ $order->status->display() }}

				</div>
			</div>
		</div>

		<div class='br20'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고정보</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>입고희망일</span>
					<span>입고대리점</span>
					<span>&nbsp;</span>
					<span>&nbsp;</span>
				</div>
				<div class='order_info_desc'>
					<span>{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y-m-d H') }}시</span>

					<span>한스모터스<br>전화번호:02-45-0788<br>주소 : 서울특별시 강남구 개포로 644</span>
				</div>
			</div>
		</div>

		<div class='br20'></div>

		<div class='ipt_line wid45'>
			<button class='btns btns_blue wid45' style='display:inline-block;'><a href="{{ route('mypage.order.index') }}">주문상세 보기</a></button>&nbsp;&nbsp;
			<a href="/" class='btns btns_green wid45' style='display:inline-block;'>홈으로 이동</a>
		</div>

	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
