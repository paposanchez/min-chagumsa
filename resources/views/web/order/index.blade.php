@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>

<div id='sub_wrap'>


	<div class='join_wrap'>

		<ul class='join_step type2'>
			<li class='on'>
				<strong>01</strong>
				<span>기본정보 입력</span>
			</li>
			<li>
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

		{!! Form::open(['route' => ["order.reservation"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>주문자 정보</strong>
			</div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid25' placeholder='주문자 이름'>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid25' placeholder='휴대폰 번호'>&nbsp;&nbsp; <button class='btns btns_skyblue wid15' style='position:relative;top:2px;'>인증번호 전송</button>
			</div>
			<div class='br10'></div>
			<div class='ipt_guide2'>
				※ 휴대폰 번호 인증 시 주문 관리를 위한 용도로만 사용되며, 이외 목적으로 사용되지 않습니다.
			</div>
		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>차량 정보</strong>
			</div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid25' placeholder='차량번호'>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<div class='psk_select wid25'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>제조사</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>포르쉐</a></li>
						<li><a>페라리</a></li>
						<li><a>아우디</a></li>
						<li><a>벤츠</a></li>
						<li><a>폭스바겐</a></li>
						<li><a>기아</a></li>
						<li><a>현대</a></li>
					</ul>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>모델</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
					</ul>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type='hidden' class='psk_select_val' value=''>
					<button class='btns btns2'><span>세부모델</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
						<li><a>모델1</a></li>
					</ul>
				</div>
			</div>


		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>차량 옵션</strong>
			</div>
			<div class='ipt_guide2'>
				추후 가격 산정에 영향을 미치므로 아래 항목 중 장착되어 있는 옵션을 정확히 체크해 주세요. 
			</div>

			<div class='br10'></div>

			<ul class='order_option_wrap'>
				<li><strong>외관</strong>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 제논 헤드램프(HID)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 전동접이 사이드미러</span></label></div>
					<div class='option_box'>
						<label><input type='checkbox' class='psk type2'><span class='lbl'> 선루프</span></label>
						<div class='option_box2'>
							<label><input type='radio' class='psk type2' checked disabled><span class='lbl'> 순정</span></label>	
							<label><input type='radio' class='psk type2' disabled><span class='lbl'> 비순정</span></label>	
						</div>
					</div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 파노라마 선루프</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 루프랙</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 알루미늄휠</span></label></div>
				</li>
				<li><strong>내장</strong>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 스티러일 휠 리모컨</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 파워 스티어링</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> ECM</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 가죽 시트</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 전동 시트(운전석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 전동 시트(동승석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 열선 시트(앞좌석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 열선 시트(뒷자석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 메모리 시트</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 통풍 시트(앞좌석)</span></label></div>
				</li>
				<li><strong>안전</strong>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 에어백(운전석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 에어백(동승석)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 에어백(사이트)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 커튼 에어백</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 후방 감지센서</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 후방 카메라</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> ABS</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> TCS(미끄럼 방지)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 차체 자세 제어 장치</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> ECS(전자제어 서스펜션)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> TPMS(타이어 공기압감지)</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 파워 도어록</span></label></div>
				</li>
				<li><strong>편의</strong>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 자동 에어컨</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 무선도어 잠금장치</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 스마트 키</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 파워 트렁크</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 파워 윈도우</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 크루즈 컨트롤</span></label></div>
					<div class='option_box'>
						<label><input type='checkbox' class='psk type2'><span class='lbl'> 네비게이션</span></label>
						<div class='option_box2'>
							<label><input type='radio' class='psk type2' checked disabled><span class='lbl'> 순정</span></label>	
							<label><input type='radio' class='psk type2' disabled><span class='lbl'> 비순정</span></label>	
						</div>
					</div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 핸즈프리</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 하이패스</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 버튼시동키</span></label></div>
				</li>
				<li><strong>멀티미디어</strong>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> CD 플레이어</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> CD 체인저</span></label></div>
					<div class='option_box'>
						<label><input type='checkbox' class='psk type2'><span class='lbl'> AV 시스템</span></label>
						<div class='option_box2'>
							<label><input type='radio' class='psk type2' checked disabled><span class='lbl'> 순정</span></label>	
							<label><input type='radio' class='psk type2' disabled><span class='lbl'> 비순정</span></label>	
						</div>
					</div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> 뒷자석 TV</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> AUX단자</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> USB단자</span></label></div>
					<div class='option_box'><label><input type='checkbox' class='psk type2'><span class='lbl'> iPod단자</span></label></div>
				</li>
			</ul>

		</div>

		<div class='ipt_line wid20'>
			<button type="submit" class='btns btns_green' style='display:inline-block;'>다음</button>
		</div>

		{!! Form::close() !!}

	</div>


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
