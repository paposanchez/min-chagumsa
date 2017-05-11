@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='select' href=''>주문목록</a></li>
		<li><a class='' href=''>회원정보 수정</a></li>
	</ul>

	<div class='br30'></div>

	<div class='order_info_box'>
		<div class='order_info_title'>
			<strong>주문일</strong>
			<span>2017년 2월 21일</span>
			<a href=''>주문상세보기 ></a>
		</div>
		<div class='order_info_cont'>
			<div class='order_info_desc'>
				<span>주문일</span>
				<span>주문번호</span>
				<span>주문자</span>
				<span>휴대폰 번호</span>
				<span>차량정보</span>
			</div>
			<div class='order_info_desc'>
				<span>2017년 2월 21일</span>
				<span>170221-21너3455</span>
				<span>홍길동</span>
				<span>010-1234-5678</span>
  				<span>폭스바겐 뉴 파사트 2.0 TDI</span>
			</div>
			<div class='order_info_btn'>
				주문완료
				<button class='btns btns2'>취소신청</button>
			</div>
		</div>
	</div>


	<div class='order_detail_box'>
		<div class='order_detail_title'>
			주문자 정보
		</div>
		<div class='od_line'>
			<label>주문자</label>
			<span>홍길동</span>
		</div>
		<div class='od_line'>
			<label style='position:relative;top:11px;'>휴대폰 번호</label>
			<span>
				<input type='text' class='ipt wid20' value='01012345678'> <button class='btns btn_dis'>인증번호 전송</button>
			</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			차량 정보 <button class='btns btns2'>변경</button>
		</div>
		<div class='od_line'>
			<label>차량번호</label>
			<span>12가2345</span>
		</div>
		<div class='od_line'>
			<label>제조사</label>
			<span>폭스바겐</span>
		</div>
		<div class='od_line'>
			<label>모델</label>
			<span>더 뉴 파사트</span>
		</div>
		<div class='od_line'>
			<label>세무보델</label>
			<span>2.0 TDI</span>
		</div>
		<div class='od_line'>
			<label>옵션</label>
			<span>전동접이 사이드미러,  선루프(순정),  가죽 시트,  전동 시트(운전석),  열선 시트(앞좌석),  에어백(운전석),  ABS 후방 감지센서,  스마트 키,  핸즈프리,  AV 시스템</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			입고 정보 <button class='btns btns2'>변경</button>
		</div>
		<div class='od_line'>
			<label>입고희망일</label>
			<span>2016년 2월 24일 오후 1시</span>
		</div>
		<div class='od_line'>
			<label>입고대리점</label>
			<span>한스모터스<br>전화번호:02-451-0788<br>주소: 서울특별시 강남구 개포로 644</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			결제 정보
		</div>
		<div class='od_line'>
			<label>결제수단</label>
			<span>[신용카드] 신한카드 일시불</span>
		</div>
		<div class='od_line'>
			<label>결제금액</label>
			<span class='wid20'>
				<div class='od_line'>
					<label>수입차 가격</label>
					<span>200,000원</span>
				</div>
				<div class='od_line'>
					<label>프로모션 할인</label>
					<span>0원</span>
				</div>
				<div class='od_line'>
					<label>총 결제금액</label>
					<span><strong>200,000</strong>원</span>
				</div>
			</span>
		</div>
	</div>

	<div class='br30'></div>

	<div class='ipt_line wid25'>
		<button class='btns btns_green history-back' style='display:inline-block;'>주문목록 돌아가기</button>
	</div>


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
