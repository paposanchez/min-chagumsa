@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>예약변경</div>

    <div class='br30'></div>

    <div id='sub_wrap'>

        <div class='join_wrap'>

            {!! Form::open(['method' => 'POST','class'=>'form-horizontal', 'id'=>'frmOrder', 'enctype'=>"multipart/form-data"]) !!}
            <input type="hidden" name="garage_id" id="garages" value="{{ $order->garage_id }}">

            <div class='order_info_box2'>
                <div class='order_info_title2'>
                    <strong>주문번호</strong>
                </div>
                <div class='order_info_cont2'>
                    <div class='order_info_desc2'>
                        <span>주문자 정보</span>
                        <span>차량정보</span>
                        <span>주문정보</span>
                    </div>
                    <div class='order_info_desc2'>
                        <span>{{ $order->orderer_name }} <small class="text-muted">{{ $order->orderer_mobile }}</small></span>
                        <span>{{ $order->getCarFullName()? $order->getCarFullName(): '&nbsp;' }}</span>
                        <span>{{ $order->item_id ? $order->item->name : '쿠폰구매' }}<small class="text-muted">{{ $order->item_id ? "(".number_format($order->item->price)."원)": '' }}</small></span>
                    </div>
                </div>
            </div>

            <div class='br30'></div>

            <div class='join_term_wrap'>
                <label>입고대리점</label>
                <div class='ipt_mob_cert'>
                    <div><input type='text' class='ipt bcs-select' id="garage-summary" value="{{ (isset($chk_garage->address))? $chk_garage->address: '' }} {{ $my_garage->name }}" readonly></div>
                    <button class='btns btns_skyblue bcs-select' type="button">입고대리점 선택</button>
                </div>
                <div class='ipt_guide2' style='color:#bbb;'>
                    ※ 차량을 입고하고자하는 대리점을 설정해 주세요.
                </div>


            </div>

            <div class='br30'></div>

            <div class='join_term_wrap'>
                <label>입고희망일</label>
                <div class='ipt_dual_input br10'>
                    {{--<div style='width:70%;'>--}}
                    {{--<input type='date' class='ipt'>--}}
                    {{--</div>--}}
                    <div class="input-group input-group-lg" style='width:70%;'>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control datepicker2" data-format="YYYY-MM-DD"
                               placeholder="{{ trans('web/order.reservation_date') }}" name='reservation_date'
                               id="reservation_date" value='{{ $order->reservation->reservation_at }}' style="margin-right: 5px;">

                    </div>
                    <div style='width:30%;'>
                        {!! Form::select('sel_time', $search_fields, $order->reservation->reservation_at->format("H"), ['class'=>'form-control ', 'id'=>'sel_time']) !!}
                    </div>
                </div>
                <div class='ipt_guide2' style='color:#bbb;'>
                    ※ 희망일을 선택하시면 입력하신 휴대폰 번호로 해당 대리점에서 가능여부를 유선상으로 안내 후 확정해 드립니다.
                </div>
            </div>

            <div class='br30'></div>

            <div class='ipt_line'>
                {{--<button class="btns btns_skyblue" type="button" style="display: none; width:30%;">이전</button> <button class='btns btns_green' style='display:inline-block;' id="step-btn" data-step="1" type="button">다음</button>--}}

                <div class="row">
                    <div class="col-md-6">
                        <button class="btns btns_green" style="display:inline-block;" id="step-btn" type="submit">예약변경</button>
                    </div>
                </div>

            </div>

            {!! Form::close() !!}

        </div>

        {{-- 입고대리점 선택 모달 --}}

        <div class="modal fade pannel_brand_title" id="modal-bcs" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class='pannel_title' style="cursor: pointer;">입고대리점 선택<a class="close" data-dismiss="modal" style="margin-top: 15px; margin-right: 15px;color:#fff;">×</a></div>
                    </div>

                    <div class="modal-body">

                        <div class="panel-group" id="accordion-bcs">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-toggle="collapse" data-target="#collapse1-bcs">
                                        시도 선택 <span id="selected_area" class="selected_item"></span>
                                    </h4>
                                </div>
                                <div id="collapse1-bcs" class="panel-collapse collapse in">

                                    <div class="panel-body">
                                        <ul id="area-list" class="item_nav">
                                            @foreach($garage_list as $key => $garage)
                                                <li class="area_chk" data-value="{{ $garage->area }}" data-name="{{ $garage->area }}">{{ $garage->area }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-toggle="collapse" data-target="#collapse2-bcs">
                                        지역 선택 <span id="selected_section" class="selected_item"></span>
                                    </h4>
                                </div>
                                <div id="collapse2-bcs" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul id="section-list" class="item_nav"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-toggle="collapse" data-target="#collapse3-bcs">
                                        대리점 선택 <span id="selected_bcs" class="selected_item"></span>
                                    </h4>
                                </div>
                                <div id="collapse3-bcs" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul id="bcs-list" class="item_nav"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer"><p class="text-center"><button class="btns btn-primary" data-dismiss="modal">닫기</button></p></div>
                </div>
            </div>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
//시도선택 모달
        $(".bcs-select").on("click", function () {
            $("#modal-bcs").modal();
        })
        //시도 선택
        $(".area_chk").on("click", function(){

            //지역,대리점 선택 초기화
            delete_section();

            var garage_area = $(this).data("value");

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get_section/',
                data: {
                    'garage_area': garage_area
                },
                success: function (data) {

                    $.each(data, function (key, value) {

                        $("#section-list").append($("<li/>", {
                            "data-value": value,
                            text: value,
                            "data-area": garage_area,
                            class: 'section_chk'
                        }));
                    });
                },
                error: function () {
                    alert('error');
                },
                beforeSend: function () {



                    $("#bcs-l1").show();

                    $("#selected_area").html("<li class='glyphicon glyphicon-ok'></li> " + garage_area);


                },
                complete: function () {
                    $("#collapse1-bcs").collapse('hide');
                    $("#collapse3-bcs").collapse('hide');

                    $("#bcs-l1").hide(200);

                    $("#collapse2-bcs").collapse('show');
                }
            });
        });

        //지역 선택
        $("#section-list").delegate("li", "click", function(){

            //대리점 초기화
            delete_garage();

            var garage_section = $(this).data("value");
            var garage_area = $(this).data("area");

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get_address/',
                data: {
                    'sel_area': garage_area,
                    'sel_section': garage_section
                },
                success: function (data) {

                    $.each(data, function (key, value) {
                        $('#bcs-list').append($('<li/>', {
                            "data-value": key,
                            text: value
                        }))
                    });
                },
                error: function (data) {
                    alert('error');
                },
                beforeSend: function(){
                    $("#sectins").val(garage_section);
                    $("#selected_section").html("<li class='glyphicon glyphicon-ok'></li> " + garage_section);
                },
                complete: function(){
                    $("#collapse1-bcs").collapse('hide');
                    $("#collapse2-bcs").collapse('hide');
                    $("#collapse3-bcs").collapse('show');
                }
            });

        });

        //대리점 선택
        $("#bcs-list").delegate("li", "click", function(){
            var garage_id = $(this).data("value");
            var garage_name = $(this).text();
            $("#garages").val(garage_id);

            $("#bcs-list").css({'background': '#fff'});
            $(this).css({'background': '#efefef'});


            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/get_full_address',
                data : {
                    'garage_id' : garage_id
                },
                success : function (data){
                    if(data == 'error'){
                        alert('해당 대리점 주소를 수신하는데 실패하였습니다.');
                    }else{
                        $("#garage-summary").val( data + ' ' + garage_name );
                    }

                },
                error : function (data){
                    alert(data);
                },
                complete: function(){
                    $("#modal-bcs").modal("hide");
                }
            });

        });

        //########## Pikaday
        $('.datepicker2').each(function (index, element) {
            var opt = {
                field: element,
                format: 'YYYY-MM-DD',
                minDate: moment().add(1, 'days').toDate(),
                disableWeekends: true,
                i18n: {
                    previousMonth: '이전달',
                    nextMonth: '다음달',
                    months: '1월.2월.3월.4월.5월.6월.7월.8월.9월.10월.11월.12월.'.split('.'),
                    weekdays: '월요일.화요일.수요일.목요일.금요일.토요일.일요일'.split('.'),
                    weekdaysShort: '일.월.화.수.목.금.토.'.split('.')
                },
            };

            if ($(this).data('format')) {
                opt.format = $(this).data('format');
            }

            new Pikaday(opt);
        });

        $("#frmOrder").validate({
            debug: true,
            rules: {
                garage_id: { required: true},
                reservation_date: { required: true},
                sel_time: { required: true}
            },
            messages: {
                garage_id: "입고대리점을 선택해주세요.",
                reservation_date: "입고희망일을 설정해 주세요.",
                sel_time: "입고희망일 시간을 설정해 주세요."
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });

    /**
     * 지역 이하 모두 초기화
     */
    var delete_section = function(){
        $("#sections").val('');
        delete_garage();

        $("#section-list li").remove();
    };

    /**
     * 대리점 정보 모두 초기화
     */
    var delete_garage = function(){
        $("#garages").val('');
        $("#bcs-list li").remove();
    };
</script>

@endpush
