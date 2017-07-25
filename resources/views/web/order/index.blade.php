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
		<input type="hidden" name="sms_id" id="sms_id" autocomplete="off">
		<input type="hidden" name="sms_confirmed" id="sms_confirmed" autocomplete="off">

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>주문자 정보</strong>
			</div>
			<div class='ipt_line'>
				<input type='text' class='ipt wid25' name="orderer_name" placeholder='주문자 이름' value="{{ $user->name }}">
			</div>
			<div class='br10'></div>
			<div class='ipt_line'>
				<input type='text' id="orderer_mobile" class='ipt wid25' name="orderer_mobile" placeholder='휴대폰 번호' value="{{ $user->mobile }}" autocomplete="off">&nbsp;&nbsp; <button  class='btns btns_skyblue wid15' id="send-sms" style='position:relative;top:4px;' type="button">인증번호 전송</button>
			</div>
			<div class='br10'></div>

			<div id="sms-alarm">
				<div class='ipt_guide2'>
					※ 휴대폰 번호 인증 시 주문 관리를 위한 용도로만 사용되며, 이외 목적으로 사용되지 않습니다.<br>
				</div>
			</div>

			<div id="sms-confirm" style="display:none;">
				<div class='br10'></div>
				<div class='ipt_line'>
					<input type='text' class='ipt wid25' name="sms_num" id="sms_num" placeholder='인증번호 입력' autocomplete="off" >&nbsp;&nbsp;
					<button id="is-sms-confirmed" class='btns btns_skyblue wid15' style='position:relative;top:4px;' type="button">인증번호 확인</button>
					&nbsp;&nbsp;&nbsp;
					<button id="sms-refresh" class='btns btns_skyblue wid15' style='position:relative;top:4px;' type="button">취소</button>
				</div>
				<div class='br10'></div>
				<div class='ipt_guide2' id="sms-help">
					※ 인증번호는 <span id="time-clock"></span>초 이내에 입력하셔야 합니다.
					※ 전송된 인증코드를 입력해 주세요.
				</div>
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
					<select class="form-control btns btns2" id="brands" autocomplete="off">
						<option>브랜드를 선택하세요.</option>
						@foreach($brands as $brand)
							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
						@endforeach
					</select>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type="text" id="models_id" name="models_id" value="" hidden/>
					<select class="form-control btns btns2" id="models">
						<option selected>모델을 선택하세요.</option>
					</select>
				</div>&nbsp;&nbsp;

				<div class='psk_select wid25'>
					<input type="text" id="detail_id" name="details_id" value="" hidden/>
					<select class="form-control btns btns2" id="details">
						<option selected>세부 모델을 선택하세요.</option>
					</select>
				</div>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<div class='psk_select wid25'>
					<input type="text" id="grade_id" name="grades_id" value="" hidden/>
					<select class="form-control btns btns2" id="grades">
						<option selected>등급을 선택하세요.</option>
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
{{--{{ Html::style(Helper::assets( 'css/jquery.modal.min.css' )) }}--}}
@endpush

@push( 'footer-script' )
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
                            text : '모델을 선택하세요.'
                        }));
                    }
                    else{
                        $('#models').append($('<option/>', {
                            text : '모델을 선택하세요.'
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
                            text : '세부 모델을 선택하세요.'
                        }));
                    }
                    else{
                        $('#details').append($('<option/>', {
                            text : '세부 모델을 선택하세요.'
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
                            text : '등급을 선택하세요.'
                        }));
                    }
                    else{
                        $('#grades').append($('<option/>', {
                            text : '등급을 선택하세요.'
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

        //sms 전송

        $("#send-sms").on("click", function(){

            var mobile_num = $("#orderer_mobile").val();
            timeCountdown();

            if(mobile_num){
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/order/send-sms',
                    data: {
                        'mobile_num': mobile_num, "_token": "{{ csrf_token() }}"
                    },
                    success: function(jdata){
                        
                        if(jdata.result == 'OK'){
                            $("#sms-alarm").hide();
                            $("#sms-confirm").show();
                            $("#sms_num").focus();

                            $("#sms_id").val(jdata.id);

//                            $("#send-sms").attr('disabled', true);

                            //time 체크 시작
                            timeCountdown();
                        }else{
                            console.log(jdata);
                            alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");
                            $("#orderer_mobile").select();
                        }


                    },
                    error: function(qXHR, textStatus, errorThrown){
                        alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");

                        console.log(errorThrown);

                        $("#orderer_mobile").select();
                    }
                });
            }
        });

        //sms 인증 확인
        $("#is-sms-confirmed").on("click", function(){
            var sms_num = $("#sms_num").val();
            if(sms_num){
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/order/is-sms',
                    data: {'sms_num': sms_num, 'sms_id': $("#sms_id").val(), "_token": "{{ csrf_token() }}"},
                    success: function(jdata){
                        if(jdata.result == 'OK'){
                            $("#sms_confirmed").val(1);

                            alert('인증이 완료 되었습니다.\n차량정보를 입력헤 주세요.');
                        }else{
                            alert('인증번호가 잘못 입력되었습니다.\n인증번호를 다시 입력해 주세요.');
                        }
                    },
                    error: function(qXHR, textStatus, errorThrown){

                    }
                });
            }else{
                alert('전송된 인증번호를 입력해 주세요.');
            }
        });

        //sms 전송/확인 취소
        $("#sms-refresh").on("click", function(){
            $("#sms-alarm").show();
            $("#sms-confirm").hide();
            $("#sms_num").val('');
            $("#sms_id").val('');
        });
    });

    var timeCountdown = function(){
        var expired = 300;
        var countdown = setInterval(function(){

            var sms_id = $("#sms_id").val();
            var sms_confirmed = $("#sms_confirmed").val();

            if(expired == 0){


                if(!sms_confirmed && sms_id){
                    alert("인증코드 입력시간이 초과했습니다.\nSMS 인증을 다시 시도해 주세요." + expired);

                    smsTempDelete(sms_id);// 인증 번호관련 사항을 삭제함.
                    $("#sms_id").val('');
                    $("#sms_confirmed").val('');

                    $("#sms_num").val('');
                    $("#sms-confirm").hide();
                }
                clearInterval(countdown);
                return false;

            }else{
                if(!sms_confirmed){
                    $("#time-clock").text(expired);
                }

            }

            expired--;
        }, 1000);


    }


    var smsTempDelete = function(sms_id){
        if(sms_id){
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/order/delete-sms',
                data: {'sms_id': sms_id, '_token': "{{ csrf_token() }}"},
                success: function(jdata){

                }
            });
        }

    }





</script>
@endpush
