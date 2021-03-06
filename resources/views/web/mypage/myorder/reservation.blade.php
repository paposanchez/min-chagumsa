@extends( 'web.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>
        <h2>마이페이지
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i
                        class="fa fa-angle-right"></i> <span>주문목록</span></div>
        </h2>
    </div>

    <div id='sub_wrap' class="join_wrap order-container">

        <div class='order_info_box'>


            <div class='order_info_title clearfix '>

                <span class="text-lg text-light">{{ $order->getOrderNumber() }}</span>

                <small class="pull-right text-muted text-light" data-toggle="tooltip"
                       title="주문일자">{{ $order->created_at->format('Y년 m월 d일 H:i') }}</small>
            </div>

            <div class='order_info_cont'>
                <div class='order_info_desc'>
                    <span>주문자정보</span>
                    <span>차량정보</span>
                    <span>주문정보</span>
                </div>

                <div class='order_info_desc'>
                                        <span>{{ $order->orderer_name }}
                                            <small class="text-muted">{{ $order->orderer_mobile }}</small></span>
                    <span>{{ $order->getCarFullName() }}</span>
                    <span>{{ $order->item->name }}
                        <small class="text-muted">({{ number_format($order->item->price) }}원)</small></span>
                </div>

                <div class='order_info_btn text-center'>
                    {{ $order->status->display() }}
                </div>
            </div>
        </div>

        <br/>
        <br/>

        {!! Form::open(['method' => 'POST','class'=>'form-horizontal', 'id'=>'frmOrder', 'enctype'=>"multipart/form-data"]) !!}


        <div class="form-group">
            <label for="" class="">입고대리점</label>

            <div class="block">

                <div class="row no-margin-bottom">

                    <div class="col-xs-4">
                        <h6 class="text-left">시/도</h6>
                        <select class="form-control" size="5" id="areas" name="areas" autocomplete="off"
                                style="padding:15px !important;">
                            @foreach($areas as $key => $val)
                                <option value="{{ $key }}"
                                        @if($order->garage->user_extra->area == $val)
                                        selected
                                        @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-4">
                        <h6 class="text-left">구/군</h6>
                        <select class="form-control" size="5" id="sections" name="sections"
                                style="padding:15px !important;">
                            @foreach($sections as $key => $val)

                                <option value="{{ $key }}"
                                        @if($order->garage->user_extra->section == $val)
                                        selected
                                        @endif>{{ $val}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-4" id="garage_box">
                        <h6 class="text-left">대리점</h6>
                        <select class="form-control" size="5" id="garages" name="garage_id"
                                style="padding:15px !important;">
                            @foreach($garages as $key => $val)
                                <option value="{{ $key }}"
                                        @if($order->garage_id == $key)
                                        selected
                                        @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                @if ($errors->has('garage_id'))
                    <span class="text-danger">
                        {{ $errors->first('garage_id') }}
                    </span>
                @endif

            </div>

        </div>


        <div class="form-group">

            <label for="" style="display:block;">입고희망일</label>

            <div class="block">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="calendar-opener" style="cursor:pointer;"><i
                                        class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker2" data-format="YYYY-MM-DD"
                                   placeholder="{{ trans('web/order.reservation_date') }}" name='reservation_date'
                                   id="reservation_date" value='{{ $order->reservation->reservation_at }}'
                                   style="margin-right: 5px;">

                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="input-group-lg">
                            {!! Form::select('sel_time', $search_fields, $order->reservation->reservation_at->format("H"), ['class'=>'form-control ', 'id'=>'sel_time']) !!}
                        </div>

                    </div>
                </div>

                <small class='help-block'>{{ trans('web/order.reservation_info') }}</small>
                @if ($errors->has('reservation_date'))
                    <span class="text-danger">
                        {{ $errors->first('reservation_date') }}
                    </span>
                @endif
            </div>
        </div>


        <p class="form-control-static text-center">
            <a href="/mypage/order/{{ $order->id }}" class='btn btn-default btn-lg wid25'>돌아가기</a>
            <button type="submit" class='btn btn-primary btn-lg wid25'>저장</button>
        </p>

        {!! Form::close() !!}

    </div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            // 정비소 관련 리스트
            $('#areas').change(function () {
                var garage_area = $('#areas option:selected').text();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-section/',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'garage_area': garage_area
                    },
                    success: function (data) {
                        //select box 초기화
                        $('#sections').html("");
                        $('#garages').html('<option disabled="true">대리점을 선택하세요.</option>');

                        $('#sel_area').val(garage_area);
                        $.each(data, function (key, value) {
                            $('#sections').append($('<option/>', {
                                value: value,
                                text: value
                            }));
                        });
                    },
                    error: function () {
                        alert('error');
                    }
                })
            });

            $('#sections').change(function () {
                var garage_area = $('#areas option:selected').text();
                var garage_section = $('#sections option:selected').text();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-address/',
                    data: {
                        'sel_area': garage_area,
                        'sel_section': garage_section
                    },
                    success: function (data) {
                        $('#garages').html("");

                        $.each(data, function (key, value) {
                            $('#garages').append($('<option/>', {
                                value: key,
                                text: value
                            }));
                        });
                    },
                    error: function (data) {
                        alert('error');
                    }
                });
            });


            $("#reservation-form").submit(function () {

                if ($("input[name='reservaton_date']").val() == '') {
                    alert('입고희망일을 선택해 주세요.');
                    $("input[name='reservaton_date']").focus();
                    return false;
                }

                if ($("#garage_id").val() == '') {
                    alert('입고 대리점을 선택해 주세요.');
                    $("garage_list").attr("tabindex", -1).focus();
                    return false;
                }
                return true;
            });


            //########## Pikaday
            $('.datepicker2').each(function (index, element) {
                var opt = {
                    field: element,
                    format: 'YYYY-MM-DD',
                    minDate: moment().add(1, 'days').toDate(),
                    disableDayFn: function (date) {
                        return date.getDay() === 0;
                    },
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

            //달력이미지 클릭
            $('#calendar-opener').click(function () {
                $("#reservation_date").click();
            });

            $('#prev').click(function () {
                location.href = "{{ URL::previous() }}";
            });

        });
    </script>
@endpush
