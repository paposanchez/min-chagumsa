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

		<input type="hidden" value="{{ $request->orderer_name }}" name="orderer_name">
		<input type="hidden" value="{{ $request->orderer_mobile }}" name="orderer_mobile">
		<input type="hidden" value="{{ $request->car_number }}" name="car_number">
		<input type="hidden" value="{{ $request->brands_id }}" name="brands_id">
		<input type="hidden" value="{{ $request->models_id }}" name="models_id">
		<input type="hidden" value="{{ $request->details_id }}" name="details_id">
		<input type="hidden" value="{{ $request->grades_id }}" name="grades_id">
		@if($request->options_ck)
			@foreach($request->options_ck as $option_ck)
				<input type="hidden" value="{{ $option_ck }}" name="options_ck[]">
			@endforeach
		@endif



		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>기본정보 내역</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>주문자</span>
					<span>휴대폰 번호</span>
					<span>차량정보</span>
					{{--<span>차량옵션</span>--}}
				</div>

				<div class='order_info_desc'>
					<span>{{ $request->orderer_name }}</span>
					<span>{{ $request->orderer_mobile }}</span>
					<span>{{ $request->car_full_name }}</span>
					{{--<span>3</span>--}}
				</div>
			</div>
		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고 희망일</strong>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<input type="text" class="ipt wid20 in_date datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('web/order.reservation_date') }}" name='reservaton_date' value='' style="margin-right: 5px;">
				<div class='psk_select wid15'>
					{!! Form::select('sel_time', $search_fields, [], ['class'=>'btns btns2', 'id'=>'sel_time']) !!}
				</div>
			</div>

			<div class='br10'></div>

			<div class='ipt_guide2'>
				{{ trans('web/order.reservation_info') }}
			</div>
		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고대리점</strong>
			</div>
			<div class='ipt_line'>
				<input type="text" class='ipt wid20' id="sample6_postcode" name="zipcode" placeholder="우편번호">
				&nbsp;&nbsp;<input type="button" class='btns btns_skyblue wid20' onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<div class='psk_select wid40'>
					<input type="text" class='ipt' id="sample6_address" name="address" placeholder="주소">
				</div>&nbsp;&nbsp;
				<div class='psk_select wid20'>
					<input type="text" class='ipt' id="sample6_address2" name="address_detail" placeholder="상세주소">
				</div>
			</div>
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
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script type="text/javascript">
    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('sample6_address').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('sample6_address2').focus();
            }
        }).open();
    }
</script>
@endpush

@push( 'footer-script' )
@endpush
