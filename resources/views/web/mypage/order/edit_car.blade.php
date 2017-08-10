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
			차량 정보
			{{--<a class='btns btns2' href="{{ route('mypage.order.edit_car', ['order_id' => $order->id]) }}">변경</a>--}}
		</div>
		<div class='od_line'>
			<label>차량번호</label>
			<input class="ipt wid20" name="car_number" value="{{ $order->car_number }}">
		</div>
        <div class='br10'></div>
        <div class='od_line'>
            <label>제조사</label>
            <input class="ipt wid33" name="car_name" value="{{ $order->getCarFullName() }}" disabled="true">
        </div>

	</div>

	<div class='br30'></div>


    <p class="form-control-static text-center">
        <button type="button" class='btn btn-default btn-lg wid25' id="prev">이전</button>
        <button type="submit" class='btn btn-primary btn-lg wid25' id="next">변경사항 저장</button>
    </p>
    {!! Form::close() !!}

</div>

@endsection


@push( 'header-script' )
<script type="text/javascript">
    $(function(){
        // 이전 버튼
        $('#prev').click(function (){
            location.href = "{{ URL::previous() }}";
            {{--location.href = "{{ route('mypage.order.show', ['id'=>$order->id]) }}";--}}
        });
    });



</script>
@endpush

@push( 'footer-script' )
@endpush
