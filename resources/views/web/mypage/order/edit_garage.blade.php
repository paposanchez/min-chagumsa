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

	<div class='order_detail_box_no_line'>
		<div class='order_detail_title'>
			입고 정보
		</div>

		<div class='od_line'>
			<label>입고희망일</label>
			<input type="text" class="ipt wid20 in_date datepicker" data-format="YYYY-MM-DD" placeholder="{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y-m-d') }}" name='reservation_date' value='{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y-m-d') }}' style="margin-right: 5px;">
			{!! Form::select('sel_time', $search_fields, [], ['class'=>'btns btns2 ipt wid20', 'id'=>'sel_time']) !!}
		</div>
		<div class="br10"></div>

		<div class='od_line'>
			<label style='position:relative;top:11px;'>입고대리점</label>
			<span>
				<input type="text" id="address" name="address" value="" hidden/>
				<input type='text' id="garage_info" class='ipt wid40 dis' readonly placeholder='지역을 검색하여 원하는 대리점을 선택하세요' value="{{ $my_garage->address }}" autocomplete="off">
			</span>
		</div>

		<div class='od_line'>
			{{--<label style='position:relative;top:11px;'>입고대리점</label>--}}
			<label></label>
			<span>
				<input type="text" id="sel_area" name="sel_area" value="" hidden/>
				<select class="ipt wid20" id="areas" autocomplete="off" style="margin-right: 5px;">
					<option value="0" selected>시/도를 선택하세요.</option>
					@foreach($garages as $key => $garage)
					<option value="{{ $garage->id }}">{{ $garage->area }}</option>
					@endforeach
				</select>

				<input type="text" id="sel_section" name="sel_section" value="" hidden/>
				<select class="ipt wid20" id="sections">
					<option value="" selected>구/군을 선택하세요.</option>
				</select>

				&nbsp;&nbsp;<button class='btns btns_skyblue wid10' type="button" style='position:relative; float: none; top: 1px;' id="search">검색</button>
			</span>
		</div>

		<div class='br30'></div>

		<div class='order_address_wrap' id="garage_list">
			<strong>검색된 정비소가 없습니다.</strong>

		</div>

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
                            $('#address').val(value.address);
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
                            $('#address').val(value.address);
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
