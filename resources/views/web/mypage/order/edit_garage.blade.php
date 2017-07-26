@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>
	{!! Form::model($order, ['method' => 'PATCH','route' => ['mypage.order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-user', 'enctype'=>"multipart/form-data"]) !!}
	<div class='order_detail_box'>
		<div class='order_detail_title'>
			주문자 정보
		</div>
		<div class='od_line'>
			<label>주문자</label>
			<span>{{ $order->orderer_name }}</span>
		</div>
		<div class='od_line'>
			<label style='position:relative;top:11px;'>휴대폰 번호</label>
			<span>
				<input type='text' class='ipt wid20' value='{{ $order->orderer_mobile }}' disabled>
			</span>
		</div>
	</div>

	<div class='order_detail_box'>
		<div class='order_detail_title'>
			입고 정보
		</div>
		<div class='od_line'>
			<label>입고희망일</label>
			<input type="text" class="ipt wid20 in_date datepicker" data-format="YYYY-MM-DD" placeholder="{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y-m-d') }}" name='reservation_date' value='{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y-m-d') }}' style="margin-right: 5px;">
			{!! Form::select('sel_time', $search_fields, [], ['class'=>'btns btns2 ipt wid20', 'id'=>'sel_time']) !!}
		</div>
		<div class='od_line'>
			<label>입고대리점</label>
			{{-- todo 정비소 데이터 저장 후 출력 --}}
			<span>한스모터스
				<br>전화번호:02-451-0788
				<br>주소: 서울특별시 강남구 개포로 644
			</span>
		</div>
		{{--<div class='od_line'>--}}
			{{--<label>제조사</label>--}}
			{{--<input class="ipt wid20" type="text" id="brand_id" name="brands_id" value="{{ $order->car->brand->id }}"/>--}}
		{{--</div>--}}
	</div>

	<div class='br30'></div>

	<div class='ipt_line wid45'>
		<a class='btns btns_blue wid33'  href="{{ route('mypage.order.show', ['id'=>$order->id]) }}">이전</a>
		<button type="submit" class='btns btns_green wid33' style='display:inline-block;'>변경 사항 저장</button>
	</div>
	{!! Form::close() !!}

</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
