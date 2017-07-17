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
				<input type='text' class='ipt wid25' name="orderer_name" placeholder='주문자 이름' value="{{ $user->name }}">
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid25' name="orderer_mobile" placeholder='휴대폰 번호' value="{{ $user->mobile }}">&nbsp;&nbsp; <button class='btns btns_skyblue wid15' style='position:relative;top:4px;'>인증번호 전송</button>
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
				<input id="car_full_name" name="car_full_name" value="" hidden>
			</div>

			<div class='ipt_line'>
				<input type='text' class='ipt wid25' name="car_number" placeholder='차량번호'>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<div class='psk_select wid25'>
					{{--{!! Form::select('sel_brand', $brands, [], ['class'=>'form-control btns btns2', 'id'=>'brands']) !!}--}}
					<input type="text" id="brand_id" name="brands_id" value="" hidden/>
					<select class="form-control btns btns2" id="brands">
						<option>선택하세요.</option>
						@foreach($brands as $brand)
							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
						@endforeach
					</select>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type="text" id="models_id" name="models_id" value="" hidden/>
					<select class="form-control btns btns2" id="models">
						<option selected>선택하세요.</option>
					</select>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type="text" id="detail_id" name="details_id" value="" hidden/>
					<select class="form-control btns btns2" id="details">
						<option selected>선택하세요.</option>
					</select>
				</div>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<div class='psk_select wid25'>
					<input type="text" id="grade_id" name="grades_id" value="" hidden/>
					<select class="form-control btns btns2" id="grades">
						<option selected>선택하세요.</option>
					</select>
{{--					{!! Form::select('sel_detail', $details, [], ['class'=>'form-control btns btns2']) !!}--}}
				</div>
			</div>

		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>침수 여부 선택</strong>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='flooding' value="1" >
					<span class='lbl'> 있음</span>
				</label>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='flooding' value="0">
					<span class='lbl'> 없음</span>
				</label>
			</div>

			<div class='br10'></div>

		</div>

		<div class='line_break'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>사고 여부 선택</strong>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='accident' value="1" >
					<span class='lbl'> 있음</span>
				</label>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='accident' value="0">
					<span class='lbl'> 없음</span>
				</label>
			</div>

			<div class='br10'></div>

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
					@foreach($exterior_option as $exterior)
						<div class='option_box'>
							<label>
								<input type='checkbox' class='psk type2' value="{{ $exterior->id }}" name="options_ck[]">
								<span class='lbl' name="exterior_ck"> {{ $exterior->display() }}</span>
							</label>
						</div>
					@endforeach
				</li>
				<li><strong>내장</strong>
					@foreach($interior_option as $interior)
						<div class='option_box'>
							<label>
								<input type='checkbox' class='psk type2' value="{{ $interior->id }}" name="options_ck[]">
								<span class='lbl' name="exterior_ck"> {{ $interior->display() }}</span>
							</label>
						</div>
					@endforeach
				</li>
				<li><strong>안전</strong>
					@foreach($safety_option as $safety)
						<div class='option_box'>
							<label>
								<input type='checkbox' class='psk type2' value="{{ $safety->id }}" name="options_ck[]">
								<span class='lbl' name="exterior_ck"> {{ $safety->display() }}</span>
							</label>
						</div>
					@endforeach
				</li>
				<li><strong>편의</strong>
					@foreach($facilities_option as $facilites)
						<div class='option_box'>
							<label>
								<input type='checkbox' class='psk type2' value="{{ $facilites->id }}" name="options_ck[]">
								<span class='lbl' name="exterior_ck"> {{ $facilites->display() }}</span>
							</label>
						</div>
					@endforeach
				</li>
				<li><strong>멀티미디어</strong>
					@foreach($multimedia_option as $multimedia)
						<div class='option_box'>
							<label>
								<input type='checkbox' class='psk type2' value="{{ $multimedia->id }}" name="options_ck[]">
								<span class='lbl' name="exterior_ck"> {{ $multimedia->display() }}</span>
							</label>
						</div>
					@endforeach
				</li>
			</ul>

		</div>

		<div class='ipt_line wid20'>
			<button type="submit" class='btns btns_green' style='display:inline-block;margin-top: 20px;margin-bottom: 20px;'>다음</button>
		</div>

		{!! Form::close() !!}

	</div>


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
                        $('#models').append($('<option/>', {
                            text : '선택하세요.'
                        }));
					}
					else{
                        $('#models').append($('<option/>', {
                            text : '선택하세요.'
                        }));
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
            $('#models_id').val(model);
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
