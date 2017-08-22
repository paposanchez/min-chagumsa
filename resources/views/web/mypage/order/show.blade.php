@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='select' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
		<li><a class='' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
	</ul>

	<div class='br30'></div>

	<div class='order_info_box'>


		<div class='order_info_title clearfix '>

			<span class="text-lg text-light" >{{ $order->getOrderNumber() }}</span>

			<small class="pull-right text-muted text-light" data-toggle="tooltip" title="주문일자" >{{ $order->created_at->format('Y년 m월 d일 H:i') }}</small>
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
			<div class='order_info_btn text-center'>
				{{ $order->status->display() }}
				@if( $order->status_cd != 107 && $order->status_cd != 100 )
					{{--<a href="{{ route('mypage.order.cancel', ['order_id'=>$order->id]) }}" class='btns btns2' id="cancel" style="display: block; font-size: 15px;margin-top: 5px;">취소신청</a>--}}
					<button type="button" class="btns btns2 cancel-click" id="cancel" data-cancel_order_id="{{ $order->id }}" style="display: block; font-size: 15px;margin-top: 5px;">결제취소</button>
				@endif

			</div>
		</div>
	</div>


	<div class='order_detail_box'>
		<div class='order_detail_title'>
			주문자 정보
		</div>
		<div class='od_line'>
			<label>주문자</label>
			<span>{{ $order->orderer_name }}</span>
		</div>
		<div class='od_line'>
			<label>휴대폰 번호</label>
			<span>{{ $order->orderer_mobile }}</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			차량 정보
			@if( $order->status_cd != 107 && $order->status_cd != 100 )
				<a class='btns btns2' href="{{ route('mypage.order.edit_car', ['order_id' => $order->id]) }}">변경</a>
			@endif

		</div>
		<div class='od_line'>
			<label>차량번호</label>
			<span>{{ $order->car_number }}</span>
		</div>
		<div class='od_line'>
			<label>제조사</label>
			<span>{{ $order->orderCar->brand->name }}</span>
		</div>
		<div class='od_line'>
			<label>모델</label>
			<span>{{ $order->orderCar->models->name }}</span>
		</div>
		<div class='od_line'>
			<label>세무보델</label>
			<span>{{ $order->orderCar->detail->name }}</span>
		</div>
		<div class='od_line'>
			<label>등급</label>
			<span>{{ $order->orderCar->grade->name }}</span>
		</div>
		<div class='od_line'>
			<label>옵션</label>
			@if($features)
				<span>{{ $features }}</span>
			@else
				<span>선택된 옵션이 없습니다.</span>
			@endif
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			입고 정보
			@if( $order->status_cd != 107 && $order->status_cd != 100 )
				<a class='btns btns2' href="{{ route('mypage.order.edit_garage', ['order_id' => $order->id]) }}">변경</a>
			@endif
		</div>
		<div class='od_line'>
			<label>입고희망일</label>
			{{-- todo 예약테이블에 저장 후 출력--}}
			@if($order->reservation)
				<span>{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y년 m월 d일') }}</span>
			@else
				<span>예약이 완료되지 않앗습니다.</span>
			@endif
		</div>
		<div class='od_line'>
			<label>입고대리점</label>
			{{-- todo 정비소 데이터 저장 후 출력 --}}
			<span>{{ $my_garage->name }}<br>전화번호: {{ $my_garage->tel }}<br>주소: {{ $my_garage->address }}</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			결제 정보
		</div>
		<div class='od_line'>
			<label>결제수단</label>
			{{-- todo purchase 데이터 저장 후 출력--}}
			{{--<span>[신용카드] 신한카드 일시불</span>--}}
			<span>[{{ \App\Helpers\Helper::getCodeName($order->purchase->type) }}] {{ $order->purchase->refund_bank }} </span>
		</div>
		<div class='od_line'>
			<label>결제금액</label>
			<span class='wid20'>
				<div class='od_line'>
					<label>인증서 가격</label>
					<span>{{ $order->item->price }} 원</span>
				</div>
				<div class='od_line'>
					<label>프로모션 할인</label>
					<span>0 원</span>
				</div>
				<div class='od_line'>
					<label>총 결제금액</label>
					<span><strong>{{ $order->item->price }}</strong> 원</span>
				</div>
			</span>
		</div>
	</div>

	<div class='br30'></div>

	<div class='ipt_line wid25'>
		<button class='btns btns_green history-back' style='display:inline-block;' type="button" id="mypage">주문목록 돌아가기</button>
	</div>

</div>


{!! Form::open(['route' => ["mypage.order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
<input type="hidden" name="order_id" id="cancel-order_id">
{!! Form::close() !!}


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
	$(function (){
        $('#mypage').click(function (){
            location.href = '{{ route('mypage.order.index') }}';
        });

        $(".cancel-click").on("click", function(){
            if(confirm("해당 주문에 대한 결제를 취소하시겠습니까?")){
                var order_id = $(this).data("cancel_order_id");
                if(order_id){
                    $("#cancel-order_id").val(order_id);
                    $("#cancel-form").submit();
                }else{
                    alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                }

            }
        });
	})
</script>
@endpush
