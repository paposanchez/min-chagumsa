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
			<li class='on'>
				<strong>02</strong>
				<span>입고정보 선택</span>
			</li>
			<li>
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

        {{--<form action="{{ route("order.purchase") }}">--}}
		{!! Form::open(['route' => ["order.purchase"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고 희망일</strong>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid20 in_date' placeholder='입고 희망일을 선택하세요' value='' style='position:relative;top:-19px;'>&nbsp;&nbsp;

				<div class='psk_select wid15'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>시간</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>09시</a></li>
						<li><a>10시</a></li>
						<li><a>11시</a></li>
						<li><a>12시</a></li>
						<li><a>13시</a></li>
						<li><a>14시</a></li>
						<li><a>15시</a></li>
						<li><a>16시</a></li>
						<li><a>17시</a></li>
						<li><a>18시</a></li>
						<li><a>19시</a></li>
						<li><a>20시</a></li>
						<li><a>21시</a></li>
					</ul>
				</div>
			</div>
			<div class='br10'></div>
			<div class='ipt_guide2'>
				※ 희망일을 선택하시면 입력하신 휴대폰 번호로 해당 대리점에서 가능여부를 유선상으로 안내 후 확정해 드립니다.
			</div>
		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고대리점</strong>
			</div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid40 dis' readonly placeholder='지역을 검색하여 원하는 대리점을 선택하세요'>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<div class='psk_select wid20'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>지역 선택</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>서울특별시</a></li>
						<li><a>인천광역시</a></li>
					</ul>
				</div>&nbsp;&nbsp;
				<div class='psk_select wid20'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>군/구 선택</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>서울특별시</a></li>
						<li><a>인천광역시</a></li>
					</ul>
				</div>
				&nbsp;&nbsp;<button class='btns btns_skyblue wid10' style='position:relative;top:-17px;'>검색</button>
			</div>
		</div>

		<div class='br30'></div>

		<div class='order_address_wrap'>
			<ul>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
				<li>
					<strong>한스모터스</strong>
					<p>전화번호 : 02-451-0788<br>주소 : 서울특별시 강남구 개포로 644</p>
					<button class='btns btns2'>선택</button>
				</li>
			</ul>
		</div>

		<div class='br30'></div>

		<div class='ipt_line wid33'>
			<button class='btns btns_blue wid33' style='display:inline-block;'>이전</button>&nbsp;&nbsp; <button type="submit" class='btns btns_green wid33' style='display:inline-block;'>다음</button>
		</div>

		{!! Form::close() !!}

	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
