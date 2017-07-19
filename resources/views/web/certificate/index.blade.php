@extends( 'web.layouts.default' )

@section( 'content' )
	<div id='sub_title_wrap'><h2>My 인증서<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>My 인증서</span></div></h2></div>

	<div id='cert_list_wrap'>

		<div class='cert_list_title'><span>홍길동</span>님이 발급받은 인증서입니다.</div>

		<div class='cert_list_box'>
			<div class='cert_box_head'>
				<div>쉐보레(GM대우) 더 넥스트 스파크 LT</div>
				<span><strong>보증기간</strong> 2017년 2월 13일까지</span>
			</div>
			<div class='cert_box_cont'>
				<div class='cert_box_cont_img'>
					<img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
				</div>
				<div class='cert_box_cont_info'>
					<ul>
						<li><label>연식</label><span>2016</span></li>
						<li><label>차대번호</label><span>1HGCM567X5A034579</span></li>
						<li><label>차종구분</label><span>경차 4Door</span></li>
						<li><label>사용연료</label><span>Gasoline(휘발유/무연)</span></li>
						<li><label>주행거리</label><span>33,000km</span></li>
						<li><label>인증서발급일</label><span>2017.01.13</span></li>
					</ul>
				</div>
				<div class='cert_box_cont_result'>
					<ul>
						<li><label>산정가격</label><span><strong>2,000</strong>만원</span></li>
						<li><label>차량 성능 등급</label><span><strong>AA</strong></span></li>
					</ul>
				</div>
			</div>
			<div class='cert_box_foot'>
				<div class='psk_select'>
					<input type='hidden' class='psk_select_val' value='인증서 비공개'>
					<button class='btns btns2'><span>인증서 비공개</span> <i class="fa fa-chevron-down"></i></button>
					<ul>
						<li>
							<a>인증서 공개</a>
						</li>
						<li>
							<a>인증서 비공개</a>
						</li>
					</ul>
				</div>
				<div class='cert_msg'>다른 사람이 인증서를 볼 수 있도록 하려면 인증서 공개로 변경하세요</div>
				<div class='cert_detail'><button class='btns btns_green'><i class="fa fa-search" ></i> 상세보기</button></div>
			</div>
		</div>

		{{--<div class='cert_list_box expire'>--}}
			{{--<div class='cert_box_head'>--}}
				{{--<div>쉐보레(GM대우) 더 넥스트 스파크 LT</div>--}}
				{{--<span><strong>보증기간</strong> 2017년 2월 13일까지</span>--}}
			{{--</div>--}}
			{{--<div class='cert_box_cont'>--}}
				{{--<div class='cert_box_cont_img'>--}}
					{{--<img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>--}}
				{{--</div>--}}
				{{--<div class='cert_box_cont_info'>--}}
					{{--<ul>--}}
						{{--<li><label>연식</label><span>2016</span></li>--}}
						{{--<li><label>차대번호</label><span>1HGCM567X5A034579</span></li>--}}
						{{--<li><label>차종구분</label><span>경차 4Door</span></li>--}}
						{{--<li><label>사용연료</label><span>Gasoline(휘발유/무연)</span></li>--}}
						{{--<li><label>주행거리</label><span>33,000km</span></li>--}}
						{{--<li><label>인증서발급일</label><span>2017.01.13</span></li>--}}
					{{--</ul>--}}
				{{--</div>--}}
				{{--<div class='cert_box_cont_result'>--}}
					{{--<ul>--}}
						{{--<li><label>산정가격</label><span><strong>2,000</strong>만원</span></li>--}}
						{{--<li><label>차량 성능 등급</label><span><strong>AA</strong></span></li>--}}
					{{--</ul>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<div class='cert_box_foot'>--}}
				{{--<div class='psk_select'>--}}
					{{--<input type='hidden' class='psk_select_val' value='인증서 공개'>--}}
					{{--<button class='btns btns2'><span>인증서 공개</span> <i class="fa fa-chevron-down"></i></button>--}}
					{{--<ul>--}}
						{{--<li><a>인증서 공개</a></li>--}}
						{{--<li><a>인증서 비공개</a></li>--}}
					{{--</ul>--}}
				{{--</div>--}}
				{{--<div class='cert_copy'>--}}
					{{--<input type='text' readonly value='https://CARGUMSA.com/w5SXTFGb'>--}}
					{{--<button class='btns btns2'><strong>URL 복사</strong></button>--}}
				{{--</div>--}}
				{{--<div class='cert_detail'><button class='btns btns_green'><i class="fa fa-search" ></i> 상세보기</button></div>--}}
			{{--</div>--}}
		{{--</div>--}}


	</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
