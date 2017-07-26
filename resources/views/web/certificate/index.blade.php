@extends( 'web.layouts.default' )

@section( 'content' )
	<div id='sub_title_wrap'><h2>My 인증서<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>My 인증서</span></div></h2></div>

	<div id='cert_list_wrap'>

		<div class='cert_list_title'><span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>님이 발급받은 인증서입니다.</div>

		@foreach($certificates as $certificate)
		<div class='cert_list_box'>
			<div class='cert_box_head'>
				<div>{{ $certificate->order->getCarFullName() }}</div>
				<span><strong>보증기간</strong> 2017년 2월 13일까지</span>
			</div>
			<div class='cert_box_cont'>
				<div class='cert_box_cont_img'>
					<img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
				</div>
				<div class='cert_box_cont_info'>
					<ul>
						<li><label>연식</label><span>{{ $certificate->order->car->year }} 년식</span></li>
						<li><label>차대번호</label><span>{{ $certificate->order->car->vin_number }}</span></li>
						<li><label>차종구분</label><span>경차 4Door</span></li>
						<li><label>사용연료</label><span>{{ $certificate->order->car->fueltype_cd }}</span></li>
						<li><label>주행거리</label><span>{{ $certificate->order->mileage }}km</span></li>
						<li><label>인증서발급일</label><span>{{ Carbon\Carbon::parse($certificate->created_at)->format('Y-m-d') }}</span></li>

					</ul>
				</div>
				<div class='cert_box_cont_result'>
					<ul>
						<li><label>산정가격</label><span><strong>{{ $certificate->price }}</strong>만원</span></li>
						<li><label>차량 성능 등급</label><span><strong>{{ $certificate->grade }}</strong></span></li>
					</ul>
				</div>
			</div>
			<div class='cert_box_foot'>
				<div class='psk_select'>
					<input type='hidden' class='psk_select_val' value='인증서 비공개'>
					<button class='btns btns2'><span>인증서 비공개</span> <i class="fa fa-chevron-down"></i></button>
					{{--registration_file--}}

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
				<div class='cert_detail'><button class='btns btns_green' id="detail"><i class="fa fa-search" ></i> 상세보기</button></div>
			</div>
		</div>
		@endforeach
	</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
	$(function (){
		$('#detail').click(function(){
			// 임시로 주문번호 4로 입력
			window.open('/certificate/4/summary',"", "width=11 00, height=1400");
		})
	});
</script>
@endpush
