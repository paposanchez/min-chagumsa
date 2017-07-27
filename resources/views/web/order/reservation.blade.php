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

			{!! Form::open(['route' => ["order.order-store"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'reservation-form']) !!}


			<input type="hidden" value="{{ $request->orderer_name }}" name="orderer_name">
			<input type="hidden" value="{{ $request->orderer_mobile }}" name="orderer_mobile">
			<input type="hidden" value="{{ $request->car_number }}" name="car_number">
			<input type="hidden" value="{{ $request->brands_id }}" name="brands_id">
			<input type="hidden" value="{{ $request->models_id }}" name="models_id">
			<input type="hidden" value="{{ $request->details_id }}" name="details_id">
			<input type="hidden" value="{{ $request->grades_id }}" name="grades_id">
            <input type="hidden" value="{{ $request->flooding }}" name="flooding">
            <input type="hidden" value="{{ $request->accident }}" name="accident">
			<input type="hidden"  name="garage_id" id="garage_id" autocomplete="off">
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
					<input type='text' id="garage_info" class='ipt wid40 dis' readonly placeholder='지역을 검색하여 원하는 대리점을 선택하세요' autocomplete="off">
				</div>

				<div class='br10'></div>

				<div class='ipt_line'>
					<div class='psk_select wid20'>
						{{--{!! Form::select('sel_area', $garage_areas, [], ['class'=>'btns btns2', 'id'=>'sel_area']) !!}--}}
						<input type="text" id="sel_area" name="sel_area" value="" hidden/>
						<select class="form-control btns btns2" id="areas" autocomplete="off">
							<option value="0" selected>시/도를 선택하세요.</option>

							@foreach($garages as $key => $garage)
								<option value="{{ $garage->id }}">{{ $garage->area }}</option>
							@endforeach
						</select>
					</div>&nbsp;&nbsp;
					<div class='psk_select wid20'>
						<input type='hidden' class='psk_select_val' value=''>
						{{--{!! Form::select('sel_section', $garage_sections, [], ['class'=>'btns btns2', 'id'=>'sel_section']) !!}--}}
						<input type="text" id="sel_section" name="sel_section" value="" hidden/>
						<select class="form-control btns btns2" id="sections">
							<option value="" selected>구/군을 선택하세요.</option>
						</select>
					</div>
					&nbsp;&nbsp;<button class='btns btns_skyblue wid10' type="button" style='position:relative;' id="search">검색</button>
				</div>

			</div>

			<div class='br30'></div>

			<div class='order_address_wrap' id="garage_list">
				{{--<strong>검색된 정비소가 없습니다.</strong>--}}

			</div>

			<div class='br30'></div>


			<div class='br30'></div>

			<div class='ipt_line wid33'>
				<button class='btns btns_blue wid33' style='display:inline-block;'>이전</button>&nbsp;&nbsp; <button type="submit" class='btns btns_green wid33' style='display:inline-block;'>다음</button>
			</div>

			{!! Form::close() !!}

		</div>


	</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function(){
        $('#areas').change(function () {
            var garage_area = $('#areas option:selected').text();
            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/get_section/',
                data : {
                    '_token': '{{ csrf_token() }}',
                    'garage_area' : garage_area
                },
                success : function (data) {
                    $('#sel_section').text('구/군을 선택하세요.');
                    $('#sel_area').val(garage_area);
                    $.each(data, function (key, value) {
                        $('#sections').append($('<option/>', {
                            value: value.id,
                            text : value.section
                        }));
                    });
                },
                error : function () {
                    alert('error');
                }
            })
        });

        $('#sections').change(function () {
            var garage_section = $('#sections option:selected').text();
            $('#sel_section').val(garage_section);
        });

        // 정비소 관련 리스트
        $('#search').click(function (){
            var sel_area = $('#areas option:selected').text();
            var sel_section = $('#sections option:selected').text();
            var html = '';

            if(sel_area != '시/도를 선택하세요.' && sel_section != '구/군을 선택하세요.'){
                $.ajax({
                    type : 'get',
                    dataType : 'json',
                    url : '/order/get_address/',
                    data : {
                        'sel_area' : sel_area,
                        'sel_section' : sel_section,
                        '_token': '{{ csrf_token() }}'
                    },
                    success : function (data){
                        html += "<ul>";
                        $.each(data, function (key, value) {
                            html += "<li>";
                            html += "<strong>"+value.name+"</strong>";
                            html += "<p>전화번호 : "+value.tel;
                            html += "<br>주소 : " + value.address	+"</p>";
                            html += "<span><button class='btns btns2 select-garage' type='button' data-garage_id='"+
                                value.id +"' data-garage_info='"+ value.name+"("+ value.address +")" +"'>선택</button></span>";
                            html += "</li>";
                        });
                        html += "</ul>";
                        $('#garage_list').html(html);
                    },
                    error : function (data) {
                        alert('error');
                    }
                })
            }
            else if (sel_area != '시/도를 선택하세요.' && sel_section == '구/군을 선택하세요.'){
                $.ajax({
                    type : 'get',
                    dataType : 'json',
                    url : '/order/get_address/',
                    data : {
                        'sel_area' : sel_area,
                        '_token': '{{ csrf_token() }}'
                    },
                    success : function (data){
                        html += "<ul>";
                        $.each(data, function (key, value) {
                            html += "<li>";
                            html += "<strong>"+value.name+"</strong>";
                            html += "<p>전화번호 : "+value.tel;
                            html += "<br>주소 : " + value.address	+"</p>";
                            html += "<span><button class='btns btns2 select-garage' type='button' data-garage_id='"+
                                value.id +"' data-garage_info='"+ value.name+"("+ value.address +")" +"'>선택</button></span>";
                            html += "</li>";
                        });
                        html += "</ul>";
                        $('#garage_list').html(html);
                    },
                    error : function (data) {
                        alert('error');
                    }
                })
            }
            else{
                alert("입고대리점을 검색해 주세요.");
                $("garage_list").attr("tabindex", -1).focus();
            }
        });


        //대리점 선택
        $("#garage_list").delegate(".select-garage", "click", function(){
            $("#garage_id").val($(this).data("garage_id"));
            $("#garage_info").val($(this).data("garage_info"));
        });

        $("#reservation-form").submit(function(){

            if($("input[name='reservaton_date']").val() == ''){
                alert('입고희망일을 선택해 주세요.');
                $("input[name='reservaton_date']").focus();
                return false;
			}

			if($("#garage_id").val() == ''){
                alert('입고 대리점을 선택해 주세요.');
                $("garage_list").attr("tabindex", -1).focus();
                return false;
			}
//            alert($("#reservation-form").attr("action"));
			return true;
		});


    });
</script>
@endpush
