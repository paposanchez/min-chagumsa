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
			<input type="text" id="brand_id" name="brands_id" value="{{ $order->car->brand->id }}" hidden/>
			<select class="ipt wid20" id="brands" style="height: 40px;">
                <option value="{{ $order->car->brand->id }}" selected>{{ $order->car->brand->name }}</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
			</select>
		</div>
		<div class='br10'></div>
		<div class='od_line'>
			<label>모델</label>
			<input type="text" id="model_id" name="models_id" value="{{ $order->car->models->id }}" hidden/>
			<select class="ipt wid20" id="models" style="height: 40px;">
                <option value="{{ $order->car->models->id }}" selected>{{ $order->car->models->name }}</option>
			</select>
		</div>
		<div class='br10'></div>
		<div class='od_line'>
			<label>세무보델</label>
			<input type="text" id="detail_id" name="details_id" value="{{ $order->car->detail->id }}" hidden/>
			<select class="ipt wid20" id="details" style="height: 40px;">
                <option value="{{ $order->car->detail->id }}" selected>{{ $order->car->detail->name }}</option>
			</select>
			{{--{{ $order->car->detail->name }}--}}
		</div>
		<div class='br10'></div>
		<div class='od_line'>
			<label>등급</label>
			<input type="text" id="grade_id" name="grades_id" value="{{ $order->car->grade->id }}" hidden/>
			<select class="ipt wid20" id="grades" style="height: 40px;">
                <option value="{{ $order->car->grade->id }}" selected>{{ $order->car->grade->name }}</option>
			</select>
			{{--{{ $order->car->grade->name }}--}}
		</div>
		<div class='br10'></div>
		<div class='od_line'>
			<label>옵션</label>
			{{--todo car_features에 데이터 입력 후 출력--}}
			<span></span>
		</div>
	</div>

	{{--<div class='order_detail_box'>--}}
		{{--<div class='order_detail_title'>--}}
			{{--입고 정보 <a class='btns btns2' href="{{ route('mypage.order.edit_garage', ['order_id' => $order->id]) }}">변경</a>--}}
		{{--</div>--}}
		{{--<div class='od_line'>--}}
			{{--<label>입고희망일</label>--}}
			{{-- todo 예약테이블에 저장 후 출력--}}
			{{--<span></span>--}}
		{{--</div>--}}
		{{--<div class='od_line'>--}}
			{{--<label>입고대리점</label>--}}
			{{-- todo 정비소 데이터 저장 후 출력 --}}
			{{--<span>한스모터스<br>전화번호:02-451-0788<br>주소: 서울특별시 강남구 개포로 644</span>--}}
		{{--</div>--}}
	{{--</div>--}}

	{{--<div class='order_detail_box'>--}}
		{{--<div class='order_detail_title'>--}}
			{{--결제 정보--}}
		{{--</div>--}}
		{{--<div class='od_line'>--}}
			{{--<label>결제수단</label>--}}
			{{-- todo purchase 데이터 저장 후 출력--}}
			{{--<span>[신용카드] 신한카드 일시불</span>--}}
		{{--</div>--}}
		{{--<div class='od_line'>--}}
			{{--<label>결제금액</label>--}}
			{{--<span class='wid20'>--}}
				{{--<div class='od_line'>--}}
					{{--<label>인증서 가격</label>--}}
					{{--<span>{{ $item->price }} 원</span>--}}
				{{--</div>--}}
				{{--<div class='od_line'>--}}
					{{--<label>프로모션 할인</label>--}}
					{{--<span>0 원</span>--}}
				{{--</div>--}}
				{{--<div class='od_line'>--}}
					{{--<label>총 결제금액</label>--}}
					{{--<span><strong>{{ $item->price }}</strong> 원</span>--}}
				{{--</div>--}}
			{{--</span>--}}
		{{--</div>--}}
	{{--</div>--}}


	<div class='br30'></div>

    {{--{{ URL::previous() }}--}}
    <div class='ipt_line wid45'>
        <a class='btns btns_blue wid33'  href="{{ route('mypage.order.show', ['id'=>$order->id]) }}">이전</a>
        <button type="submit" class='btns btns_green wid33' style='display:inline-block;'>변경 사항 저장</button>
    </div>
    {!! Form::close() !!}

</div>

@endsection


@push( 'header-script' )
<script type="text/javascript">
    $(function (){
        // brands 선택 시
        $('#brands').change(function(){
            var brand = $('#brands option:selected').val();
            $('#brand_id').val(brand);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_models/',
                data : {
                    'brand' : brand
                },
                success: function(data){
                    $('#models').html('');
                    if($('#brands option:selected').text()=='선택하세요.'){
                        $('#models').append($('<option/>', { text : '선택하세요.' }));
                    }
                    else{
                        $('#models').append($('<option/>', { text : '선택하세요.' }));
                        $('#details').html($('<option/>', { text : '선택하세요.' }));
                        $('#grades').html($('<option/>', { text : '선택하세요.' }));
                        $.each(data, function (key, value) {
                            $('#models').append($('<option/>', {
                                value: value.id,
                                text : value.name
                            }));
                        });
                    }
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        // models 선택 시
        $('#models').change(function(){

            var model = $('#models option:selected').val();
            $('#model_id').val(model);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_details/',
                data : {
                    'model' : model
                },
                success: function(data){
                    $('#details').html('');
                    if($('#details option:selected').text()=='선택하세요.'){
                        $('#details').append($('<option/>', {
                            text : '선택하세요.'
                        }));
                    }
                    else{
                        $('#details').append($('<option/>', {
                            text : '선택하세요.'
                        }));
                        $.each(data, function (key, value) {
                            $('#details').append($('<option/>', {
                                value: value.id,
                                text : value.name
                            }));
                        });
                    }
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        // detail 선택 시
        $('#details').change(function(){
            var detail = $('#details option:selected').val();
            $('#detail_id').val(detail);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_grades/',
                data : {
                    'detail' : detail
                },
                success: function(data){
                    $('#grades').html('');
                    if($('#grades option:selected').text()=='선택하세요.'){
                        $('#grades').append($('<option/>', {
                            text : '선택하세요.'
                        }));
                    }
                    else{
                        $('#grades').append($('<option/>', {
                            text : '선택하세요.'
                        }));
                        $.each(data, function (key, value) {
                            $('#grades').append($('<option/>', {
                                value: value.id,
                                text : value.name
                            }));
                        });
                    }
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        $('#grades').change(function(){
            var grade = $('#grades option:selected').val();
            $('#grade_id').val(grade);
            $('#car_full_name').val(
                $('#brands option:selected').text()+" "+
                $('#models option:selected').text()+" "+
                $('#details option:selected').text()+" "+
                $('#grades option:selected').text()+" "
            );
        });

    });
</script>
@endpush

@push( 'footer-script' )
@endpush
