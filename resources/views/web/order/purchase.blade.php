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

		{!! Form::open(['route' => ["order.complete"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'purchase-form']) !!}
		<input name="datekey" value="{{ $order->datekey }}" type="hidden">
		<input name="cars_id" value="{{ $order->cars_id }}" type="hidden">
		<input name="moid" id="moid" type="hidden" value="{{ $order->datekey }}-{{ $order->car_number }}">{{-- 주문번호 --}}
		<input name="goodsName" id="goodsName" type="hidden" value="{{ $order->datekey }}-{{ $order->car_number }}">{{-- 상품명 --}}
		<input name="buyerName" id="buyerName" type="hidden" value="{{ $order->orderer_name }}">{{-- 구매자명 --}}
		<input name="buyerTel" id="buyerTel" type="hidden" value="{!! str_replace("-", "", $order->orderer_mobile) !!}">{{-- 구매자연락처 --}}
		<input name="buyerEmail" id="buyerEmail" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">{{-- 구매자메일주소 --}}
		<input name="userIp" id="userIp" type="hidden" value="{{ $_SERVER['REMOTE_ADDR'] }}">{{--  --}}


		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>기본정보 내역</strong>
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
			</div>
		</div>

		<div class='br30'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고정보 내역</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>입고희망일</span>
					<span>입고대리점 명</span>
					<span>입고대리점 주소</span>
				</div>

				<div class='order_info_desc'>
					<span>{{ $request->reservaton_date }}  {{ $request->sel_time }}시</span>
					<span>임시 정비소명</span>
					<span>{{ $garage_info->name }} {{ $garage_info->address }}</span>
				</div>
			</div>
		</div>

		<div class='line_break'></div>

		<div class='item_info_box' id="item_info_box">
			<div class='order_info_title'>
				<strong>인증서 종류 선택</strong>
			</div>

			<div class='ipt_line'>
				<label hidden>
					<input type='radio' class='psk' id="item_choice" name='item_choice' value="111" >
					<span class='lbl'> dddd</span>
				</label>
				<div class="ipt_guide2 span_warning"> ※ 차량등록증에 등록된 배기량에 따라 정확히 선택해 주세요.<br> &nbsp;&nbsp;&nbsp;&nbsp;배기량 선택이 잘못된 경우, 차량 입고 시 재주문 처리가 될 수 있습니다.</div>
				<div class="br10"></div>
				@foreach($items as $item)
				<label>
					<input type='radio' class='psk' id="item_choice" name='item_choice' value="{{ $item->id }}">
					<span class='lbl'> {{ $item->name }}<span style="color: #a3cd16;"> ({!! $item->car_sort == 'N'? '국산차': '수입차' !!})</span></span>
				</label>&nbsp;&nbsp;&nbsp;&nbsp;
				@endforeach



			</div>

		</div>

		<div class='br10'></div>

		<div class='order_calc_wrap'>
			<ul>
				<li class='calc1'>
					인증서 신청 가격
					<span>
						<strong id="item_price"></strong>
						원
					</span>
				</li>
				<li class='calc2'>프로모션 할인
					<span>
						<strong id="promotion_price"></strong>
						원
					</span>
				</li>
				<li>최종 결제 금액<span>
						<strong id="total_price"></strong>
						원
					</span>
				</li>
			</ul>
		</div>

		<div class='br30'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>결제 수단 선택</strong>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method' value="11" checked>
					<span class='lbl'> 신용/체크카드</span>
				</label>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method' value="12">
					<span class='lbl'> 실시간 계좌이체</span>
				</label>
			</div>

			<div class='br10'></div>

		</div>

		<div class='line_break'></div>

		<div class='br10'></div>

		<div class='ipt_line wid45'>
			<button class='btns btns_blue wid45' style='display:inline-block;'>이전</button>&nbsp;&nbsp; <button type="button" class='btns btns_green wid45' style='display:inline-block;' id="payment-process">결제하기</button>
		</div>
		{!! Form::close() !!}

	</div>


</div>
@endsection


@push( 'header-script' )
<script type="text/javascript">
	$(function (){
		$('#item_info_box').change(function (){
		    var sel_item = $(":input:radio[name=item_choice]:checked").val();
			$.ajax({
				type : 'get',
				dataType : 'json',
				url : '/order/sel_item/',
				data : {
				    'sel_item' : sel_item
				},
				success: function (data){
					$('#item_price').html(data.price);
					$('#promotion_price').html(0);
					$('#total_price').html(data.price - 0);
				}
			})

		});
		$("#payment-process").on("click", function(){
			$('.lock_page_div').show();
		});
	});
</script>
@endpush

@push( 'footer-script' )
@endpush
