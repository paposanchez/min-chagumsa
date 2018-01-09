@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
    <section id="content">
        {{--<div class="container">--}}
        {{--<div class="block-header">--}}
        {{--<h2>신규주문 생성</h2>--}}

        {{--<ul class="actions">--}}
        {{--<li>--}}
        {{--<a href="">--}}
        {{--<i class="zmdi zmdi-trending-up"></i>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="">--}}
        {{--<i class="zmdi zmdi-check-all"></i>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--<li class="dropdown">--}}
        {{--<a href="" data-toggle="dropdown">--}}
        {{--<i class="zmdi zmdi-more-vert"></i>--}}
        {{--</a>--}}

        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
        {{--<li>--}}
        {{--<a href="">Refresh</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="">Manage Widgets</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="">Widgets Settings</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}

        {{--</div>--}}

        <div class="card">
            <div class="card-header">
                <h2>신규 주문 생성
                    <small>새로운 주문을 생성한다.</small>
                </h2>
            </div>

            <div class="card-body">
                {!! Form::open(['route' => ["order.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'frm']) !!}
                <fieldset>
                    <input type="hidden" name="diag_param" id="diag_param" value="{{ old('diag_param') }}">
                    <input type="hidden" name="certi_param" id="certi_param" value="">
                    <input type="hidden" name="ew_param" id="ew_param" value="">
                    <input type="hidden" name="order_number_confirm" id="order_number_confirm" value="">
                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">상품선택</label>
                        <div class="col-md-3">
                            <input type="checkbox" name="items[]" id="diagnosis" value="diagnosis"
                                   @if(is_array(old('items')) && in_array('diagnosis', old('items'))) checked @endif>진단
                            <input type="checkbox" name="items[]" id="certificate" value="certificate"
                                   @if(is_array(old('items')) && in_array('certificate', old('items'))) checked @endif>평가
                            <input type="checkbox" name="items[]" id="warranty" value="warranty"
                                   @if(is_array(old('items')) && in_array('warranty', old('items'))) checked @endif>보증
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">주문자 성명</label>
                        <div class="col-md-3">
                            @if($user->can('order.user.show'))
                                {!! Form::select('orderer_name', $users, null, ['class'=>'form-control', 'id'=>'orderer_name']) !!}
                            @else
                                <input type="text" class="form-control" placeholder="ex) 홍길동"
                                       name="orderer_name"
                                       id="orderer_name" value="{{ old('orderer_name') }}">
                            @endif
                            <div id="error_div"></div>
                        </div>
                        <label for="" class="control-label col-md-2">주문자 휴대폰번호</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="ex) 010-0000-0000"
                                   name="orderer_mobile"
                                   id="orderer_mobile" value="{{ $user->mobile }}">
                            {{--<span class="help-block">ex) 메뉴2 설명</span>--}}
                            @if ($errors->has('orderer_mobile'))
                                <span class="text-danger">
                                        {{ $errors->first('orderer_mobile') }}
                                    </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }} order_div">
                        <label for="" class="control-label col-md-3">주문번호</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="ex) 12가1234-180101"
                                   name="order_number"
                                   id="order_number" value="{{ old('order_number') }}">
                            @if ($errors->has('order_number'))
                                <span class="text-danger">
                                        {{ $errors->first('order_number') }}
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary"
                                    data-loading-text="{{ trans('common.button.loading') }}"
                                    id="confirm_order" type="button">주문번호 확인
                            </button>
                        </div>
                    </div>

                    <div id="diagnosis_form" style="display: none;">
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">차량번호</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="ex) 12가1234"
                                       name="car_number"
                                       id="car_number" value="{{ old('car_number') }}">
                                <span class="help-block">ex) 메뉴4 설명</span>
                                @if ($errors->has('car_number'))
                                    <span class="text-danger">
                                        {{ $errors->first('car_number') }}
                                    </span>
                                @endif
                            </div>
                            <label for="" class="control-label col-md-2">차대번호</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="ex) sdjdmncvbdjkdk8391mn"
                                       name="vin_number"
                                       id="vin_number" value="{{ old('') }}">
                                @if ($errors->has('vin_number'))
                                    <span class="text-danger">
                                        {{ $errors->first('vin_number') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">차량모델</label>
                            <div class="col-md-2">
                                <div class="select">
                                    <select class="form-control" id="brands" name="brands_id" autocomplete="off">
                                        <option value="">선택하세요.</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('grades'))
                                    <span class="text-danger">
                                        {{ $errors->first('grades') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2 select">
                                <select class="form-control" id="models" name="models_id" autocomplete="off">
                                    <option value="">선택하세요.</option>
                                </select>
                            </div>
                            <div class="col-md-2 select">
                                <select class="form-control" id="details" name="details_id" autocomplete="off">
                                    <option value="">선택하세요.</option>
                                </select>
                            </div>
                            <div class="col-md-2 select">
                                <select class="form-control" id="grades" name="grades_id" autocomplete="off">
                                    <option value="">선택하세요.</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">사고/침수여부</label>
                            <div class="col-md-3">
                                <input type="checkbox" name="accident" id="accident"
                                       @if(old('accident'))
                                       checked
                                        @endif
                                >사고여부
                                <input type="checkbox" name="flood" id="flood"
                                       @if(old('flood'))
                                       checked
                                        @endif
                                >침수여부
                                @if ($errors->has('orderer_name'))
                                    <span class="text-danger">
                                        {{ $errors->first('orderer_name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">입고대리점</label>
                            <div class="col-md-2">
                                <div class="select">
                                    <select class="form-control" id="areas" name="areas" autocomplete="off">
                                        <option value="">선택하세요.</option>
                                        @foreach($areas as $key => $area)
                                            <option value="{{ $area->area }}">{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('garages'))
                                    <span class="text-danger">
                                        {{ $errors->first('garages') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2 select">
                                <select class="form-control" id="sections" name="sections" autocomplete="off">
                                    <option value="">선택하세요.</option>
                                </select>
                            </div>
                            <div class="col-md-2 select">
                                <select class="form-control" id="garages" name="garages" autocomplete="off">
                                    <option value="">선택하세요.</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">입고희망일</label>
                            <div class="col-md-3">
                                <div class="input-group form-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="dtp-container">
                                        <input type='text' class="form-control date-picker"
                                               id="reservation_at" name="reservation_at"
                                               placeholder="Click here...">
                                    </div>
                                </div>
                                @if ($errors->has('reservation_at'))
                                    <span class="text-danger">
                                        {{ $errors->first('reservation_at') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-1 select">
                                {!! Form::select('sel_time', $sel_hours, [], ['class'=>'form-control ','id'=>'sel_time']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button class="btn btn-primary"
                                    data-loading-text="{{ trans('common.button.loading') }}"
                                    id="create_order" type="submit">주문 생성하기
                            </button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>

    </section>
@endsection


@push( 'header-script' )
@endpush


@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            if ($('#diagnosis').prop('checked')) {
                $('#diagnosis_form').css('display', '');
                $('.order_div').css('display', 'none');
            } else {
                $('#diagnosis_form').css('display', 'none');
                $('.order_div').css('display', '');
            }
        });

        $('.date-picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#diagnosis').change(function () {
            if ($(this).prop('checked')) {
                $('#diagnosis_form').css('display', '');
                $('.order_div').css('display', 'none');
                $('#diag_param').val('1');
            } else {
                $('#diagnosis_form').css('display', 'none');
                $('.order_div').css('display', '');
                $('#diag_param').val('');
            }
        });

        $('#certificate').change(function(){
            if ($(this).prop('checked')) {
                $('#certi_param').val('1');
            }else{
                $('#certi_param').val('');
            }
        });

        $('#warranty').change(function(){
            if ($(this).prop('checked')) {
                $('#ew_param').val('1');
            }else{
                $('#ew_param').val('');
            }
        });

        $('#confirm_order').click(function(){
            var order_number = $('#order_number').val();

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/order-number-check',
                data : {
                    order_number : order_number
                },
                success : function(data){
                    alert('확인되었습니다.');
                    $('#order_number_confirm').val(1);
                },
                error : function(data) {
                    alert('주문번호를 다시 확인해주세요.');
                }
            })
        });

        // brands 선택 시
        $('#brands').on('change', function () {
            var brand = $('#brands option:selected').val();
            // $('#brand_id').val(brand);
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get-models/',
                data: {'brand': brand},
                success: function (data) {
                    $('#models').empty();
                    $('#details').html('<option disabled="true">선택하세요.</option>');
                    $('#grades').html('<option disabled="true">선택하세요.</option>');
                    $('#models').append('<option >선택하세요.</option>');
                    $.each(data, function (key, value) {
                        $('#models').append($('<option/>', {
                            value: value.id,
                            text: value.name
                        }));
                    });
                },
                error: function (data) {
                    // alert('처리중 오류가 발생했습니다.');
                    alert(JSON.stringify(data));
                }
            });
        });

        // models 선택 시
        $('#models').on('change', function () {

            var model = $('#models option:selected').val();
            $('#models_id').val(model);
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get-details/',
                data: {'model': model},
                success: function (data) {
                    $('#details').empty();
                    $('#grades').html('<option disabled="true">선택하세요.</option>');
                    $('#details').append('<option >선택하세요.</option>');
                    $.each(data, function (key, value) {
                        $('#details').append($('<option/>', {
                            value: value.id,
                            text: value.name
                        }));
                    });

                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }
            });
        });

        // detail 선택 시
        $('#details').on('change', function () {
            var detail = $('#details option:selected').val();
            $('#detail_id').val(detail);
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get-grades/',
                data: {'detail': detail},
                success: function (data) {

                    $('#grades').empty();
                    $('#grades').append('<option >선택하세요.</option>');
                    $.each(data, function (key, value) {
                        $('#grades').append('<option data-item="' + value.items_id + '" value="' + value.id + '">' + value.name + '</option>');
                    });

                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }
            });
        });

        // grade 리스트
        $('#grades').on('change', function (e) {

            var pre_selected_item = $(e.target).find('option:selected').data('item');
            if (pre_selected_item) {

                $('.purchase-item-product').each(function () {

                    if ($(this).data('index') == pre_selected_item) {

                        $("#purchase-items-blind").show();
                        $(this).trigger('click');
                        return true;
                    }
                });
            }
        });

        // 시/도 리스트
        $('#areas').change(function () {
            var area = $('#areas option:selected').text();

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/order/get-section',
                data: {
                    'garage_area': area
                },
                success: function (data) {
                    //select box 초기화
                    $('#sections').html("");
                    $('#garages').html('<option disabled="true">선택하세요.</option>');
                    $('#sections').append('<option >선택하세요.</option>');
                    // $('#sel_area').val(garage_area);
                    $.each(data, function (key, value) {
                        $('#sections').append($('<option/>', {
                            value: value,
                            text: value
                        }));
                    });
                },
                error: function (data) {
                    alert(JSON.stringify(data));
                    // alert('error');
                }
            })

        });
        // 구/군 리스트
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
                    $('#garages').append('<option >선택하세요.</option>');
                    $.each(data, function (key, value) {
                        $('#garages').append($('<option/>', {
                            //                            value: value.id,
                            value: key,
                            text: value
                        }))
                    });
                },
                error: function (data) {
                    alert('error');
                }
            });
        });
    </script>
@endpush
