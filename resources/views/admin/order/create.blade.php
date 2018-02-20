@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">

        <div class="container">

            <div class="card">

                <div class="card-header ch-alt">
                    <h2>신규 주문 생성
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                </div>


                <div class="card-body card-padding">
                    {!! Form::open(['route' => ["order.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'frm']) !!}
                    <input type="hidden" name="diag_param" id="diag_param" value="{{ old('diag_param') }}">
                    <input type="hidden" name="price" id="price" value="">
                    <input type="hidden" name="items" id="items" value="">
                    <input class="show_item" type="hidden" name="order_number_confirm" id="order_number_confirm"
                           value="" data-url="/order/get-items">
                    <input class="show_item" type="hidden" name="select_car" id="select_car" value=""
                           data-url="/order/get-etc-items">

                    @if($user->hasRole('manage'))
                    <div class="form-group {{ $errors->has('orderer_name') ? 'has-error' : '' }}">

                        <label for="" class="control-label col-md-3">주문자 성명</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="주문자의 이름을 입력하세요."
                                   name="orderer_name"
                                   id="orderer_name" value="{{ old('orderer_name') }}">
                            @if ($errors->has('orderer_name'))
                                <span class="text-danger">
                                                        {{ $errors->first('orderer_id') }}
                                                </span>
                            @endif
                        </div>
                    </div>

                    @elseif($user->hasRole('admin'))
                    <div class="form-group {{ $errors->has('orderer_name') ? 'has-error' : '' }}">

                        <label for="" class="control-label col-md-3">회원선택</label>
                        <div class="col-md-3">
                            @if($user->can('order.user.show'))
                                <div class="select">
                                    {!! Form::select('orderer_name', $users, [], ['class'=>'form-control chosen', 'id'=>'orderer_name']) !!}
                                </div>
                            @else
                                <input type="text" class="form-control" placeholder="ex) 홍길동"
                                       name="orderer_name"
                                       id="orderer_name" value="{{ old('orderer_name') }}">
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{ $errors->has('orderer_email') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">주문자 이메일</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="이메일을 입력하세요."
                                   name="orderer_email"
                                   id="orderer_email" value="">
                            @if ($errors->has('orderer_email'))
                                <span class="text-danger">
                                        {{ $errors->first('orderer_email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('orderer_mobile') ? 'has-error' : '' }}">
                        <label for="" class="control-label col-md-3">주문자 휴대폰번호</label>
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


                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">

                        <label for="" class="control-label col-md-3">주문정보</label>
                        <div class="col-md-6">


                            <div class="fw-container" id="orderWizard">

                                <ul class="tab-nav text-center fw-nav">
                                    <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">진단미포함</a>
                                    </li>
                                    <li><a href="#tab2" data-toggle="tab">진단 포함</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane fade active in" id="tab1">

                                        <div class="col-xs-10">
                                            <div class="form-group fg-line">
                                                <label class="fg-label">주문번호</label>
                                                <input type="text" class="form-control fg-input"
                                                       placeholder="ex) 18010101-123456-1234"
                                                       name="order_number"
                                                       id="order_number" value="{{ old('order_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <button class="btn btn-primary"
                                                    data-loading-text="{{ trans('common.button.loading') }}"
                                                    id="confirm_order" type="button">주문번호 확인
                                            </button>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="tab2">

                                        <div class="m-b-25 fg-line {{ $errors->has('') ? 'has-error' : '' }}">
                                            <label for="" class="fg-label">차량번호</label>

                                            <input type="text" class="form-control" placeholder="ex) 12가1234"
                                                   name="car_number"
                                                   id="car_number" value="{{ old('car_number') }}">

                                            @if ($errors->has('car_number'))
                                                <span class="text-danger">
                                                                                        {{ $errors->first('car_number') }}
                                                                                </span>
                                            @endif

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }} ">
                                                    <label for="" class=" fg-label">차량 브랜드</label>
                                                    <div class="select">
                                                        <select class="form-control car-model" id="brands"
                                                                name="brands_id"
                                                                autocomplete="off" data-url="/order/get-models"
                                                                data-target="models">
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
                                            </div>
                                            <div class="col-sm-3 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }} ">
                                                    <label for="" class=" fg-label">차량 모델</label>
                                                    <div class="select">
                                                        <select class="form-control car-model" id="models"
                                                                name="models_id"
                                                                autocomplete="off" data-url="/order/get-details"
                                                                data-target="details">
                                                            <option value="">선택하세요.</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('grades'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('grades') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }} ">
                                                    <label for="" class=" fg-label">차량 디테일</label>
                                                    <div class="select">
                                                        <select class="form-control car-model" id="details"
                                                                name="details_id"
                                                                autocomplete="off" data-url="/order/get-grades"
                                                                data-target="grades">
                                                            <option value="">선택하세요.</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('grades'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('grades') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }} ">
                                                    <label for="" class=" fg-label">차량 세부모델</label>
                                                    <div class="select">
                                                        <select class="form-control" id="grades" name="grades_id"
                                                                autocomplete="off">
                                                            <option value="">선택하세요.</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('grades'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('grades') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }}">
                                                    <label for="" class=" fg-label">시/도</label>
                                                    <div class="select">
                                                        <select class="form-control garage" id="areas" name="areas"
                                                                autocomplete="off" data-url="/order/get-section"
                                                                data-target="sections">
                                                            <option value="">선택하세요.</option>
                                                            @foreach($areas as $key => $area)
                                                                <option value="{{ $area->area }}">{{ $area->area }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('areas'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('areas') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }}">
                                                    <label for="" class=" fg-label">구/군</label>
                                                    <div class="select">
                                                        <select class="form-control garage" id="sections"
                                                                name="sections"
                                                                autocomplete="off" data-url="/order/get-address"
                                                                data-target="garages">
                                                            <option value="">선택하세요.</option>
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('sections'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('sections') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-25">
                                                <div class="fg-line {{ $errors->has('') ? 'has-error' : '' }}">
                                                    <label for="" class=" fg-label">입고대리점</label>

                                                    <div class="select">
                                                        <select class="form-control" id="garages" name="garages"
                                                                autocomplete="off">
                                                            <option value="">선택하세요.</option>
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('garages'))
                                                        <span class="text-danger">
                                                                                        {{ $errors->first('garages') }}
                                                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-8 m-b-25">
                                                <div class="fg-line">
                                                    <label for="" class=" fg-label">입고희망일</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="zmdi zmdi-calendar"></i></span>
                                                        <div class="dtp-container">
                                                            <input type='text' class="form-control date-picker"
                                                                   id="reservation_at" name="reservation_at"
                                                                   placeholder="Click here...">
                                                        </div>
                                                        @if ($errors->has('reservation_at'))
                                                            <span class="text-danger">
                                                                                        {{ $errors->first('reservation_at') }}
                                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 m-b-25">
                                                <label for="" class=" fg-label">입고희망시간</label>
                                                <div class="select">
                                                    {!! Form::select('sel_time', $sel_hours, [], ['class'=>'form-control ','id'=>'sel_time']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('items') ? 'has-error' : '' }} hidden" id="item-list-div">
                        <label for="" class="control-label col-md-3">주문상품</label>
                        <div class="col-md-9">
                            <div class="row" id="item_list">
                            </div>
                            @if ($errors->has('items'))
                                <span class="text-danger">
                                                                                        {{ $errors->first('items') }}
                                                                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">

                        <label for="" class="control-label col-md-3">결제방법</label>
                        <div class="col-md-9">
                            <p class="form-control-static">관리자 직권결제</p>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">

                        <label for="" class="control-label col-md-3">총 결제금액</label>
                        <div class="col-md-9">
                            <p class="form-control-static"><span id="orderCreateTotalPrice">0</span>원</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary"
                                data-loading-text="{{ trans('common.button.loading') }}">생 성
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
@endsection


@push( 'header-script' )
@endpush


@push( 'footer-script' )
    <script type="text/javascript">
        $(document).ready(function () {

            // 위자드
            $('#orderWizard').bootstrapWizard({
                tabClass: 'fw-nav',
                'nextSelector': '.next',
                'previousSelector': '.previous',
                onTabClick: function (tab, navigation, index) {
                    if (index == 0) {
                        $('#diag_param').val(1);
                    } else {
                        $('#diag_param').val('');
                    }
                    // return false;
                    $('#item_list').empty();
                    $('#item-list-div').addClass('hidden');
                },
                onNext: function (tab, navigation, index) {
                    // var $valid = $("#commentForm").valid();
                    // if(!$valid) {
                    //         $validator.focusInvalid();
                    //         return false;
                    // }
                }
            });


            $(document).on('click', ".orderCreateItem", function () {
                // $(this).toggleClass('selected');

                var total = 0;
                var items = '';

                $('.orderCreateItem:checked').each(function () {
                    total += parseInt($(this).data('price'));
                    items = items.concat(',', $(this).data('item-id'));
                });

                $('#orderCreateTotalPrice').text(total);
                $('#price').val(total);
                $('#items').val(items.substr(1));
            });

            // 주문번호 채크
            $(document).on('click', '#confirm_order', function () {
                var order_number = $('#order_number').val();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/order-number-check',
                    data: {
                        order_number: order_number
                    },
                    success: function (data) {
                        alert('확인되었습니다.');
                        $('#order_number_confirm').val(data).trigger("change");
                    },
                    error: function (data) {
                        alert('주문번호가 정확하지 않거나 발급완료 되지 않은 진단입니다. \n확인 후 다시 신청해주세요.');
                    }
                })
            });

            $(document).on('change', '#brands', function () {
                var brand = $('#brands option:selected').val();
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/order/get-car-type',
                    data: {
                        brand_id: brand
                    },
                    success: function (data) {
                        $('#select_car').val(data).trigger("change");
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                        alert('error');
                    }
                });
            });

            $(document).on('change', '.show_item', function () {
                var url = $(this).data('url');
                var type = $(this).val();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: url,
                    data: {
                        type: type
                    },
                    success: function (data) {
                        $('#orderCreateTotalPrice').text(0);
                        var html = '';
                        $('#item_list').empty();
                        $.each(data, function (key, value) {
                            html += '<input class="orderCreateItem" type="radio" name="'+value.display_name+'" value="'+value.id+'" data-price="'+value.price+'" data-item-id="'+value.id+'"> '+value.name+'';
                        });
                        $('#item-list-div').removeClass('hidden');
                        $('#item_list').append(html);
                    },
                    error: function (data) {
                        alert('error');
                    }
                });
            });

            // 차량모델 선택 시
            $(document).on('change', '.car-model', function () {
                var sel_id = $('option:selected', this).val();
                var url = $(this).data('url');
                var target = $(this).data('target');

                if ($(this).attr('id') == 'brands') {
                    $('#models').html('<option value="">선택하세요.</option>');
                    $('#details').html('<option value="">선택하세요.</option>');
                    $('#grades').html('<option value="">선택하세요.</option>');
                }

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: url,
                    data: {sel_id: sel_id},
                    success: function (data) {
                        $('#' + target).html('<option value="">선택하세요.</option>');
                        $.each(data, function (key, value) {
                            $('#' + target).append($('<option/>', {
                                value: value.id,
                                text: value.name
                            }));
                        });
                        // $(this).data('target').html('<option value="">선택하세요.</option>').trigger('change');
                        target.html('<option value="">선택하세요.</option>');
                        target.trigger('change');
                    },
                    error: function (data) {
                        alert('처리중 오류가 발생했습니다.');
                    }
                });
            });

            // 정비소 선택시
            $(document).on('change', '.garage', function () {
                var sel_text = $('option:selected', this).val();
                var url = $(this).data('url');
                var target = $(this).data('target');

                if ($(this).attr('id') == 'areas') {
                    $('#sections').html('<option value="">선택하세요.</option>');
                    $('#garages').html('<option value="">선택하세요.</option>');
                }

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: url,
                    data: {
                        sel_text: sel_text
                    },
                    success: function (data) {
                        $('#' + target).html('<option value="">선택하세요.</option>');
                        $.each(data, function (key, value) {
                            $('#' + target).append($('<option/>', {
                                value: value,
                                text: value
                            }));
                        });
                        $(this).data('target').empty('<option value="">선택하세요.</option>').trigger('change');
                    },
                    error: function (data) {
                        alert('처리중 오류가 발생했습니다.');
                        // alert(JSON.stringify(data));
                    }
                });
            });

        });
    </script>
@endpush
