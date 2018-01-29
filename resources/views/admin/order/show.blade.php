@extends( 'admin.layouts.default' )

@section( 'content' )

    <section id="content">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h2>주문정보
                                <!-- <small>설명</small> -->
                            </h2>
                        </div>

                        <div class="card-body card-padding">

                            {!! Form::open(['method' => 'POST','route' => ['order.user-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'userForm', 'enctype'=>"multipart/form-data"]) !!}
                            <fieldset>

                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">주문번호</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $order->chakey }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">주문seq</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $order->id }}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">회원</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static"><a
                                                    href="/user/{{ $order->orderer_id }}/edit">{{ $order->orderer->name }}</a>
                                        </p>
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자명</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="name"
                                               value="{{ $order->orderer_name }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                                                {{ $errors->first('name') }}
                                                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자연락처</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="mobile"
                                               value="{{ $order->orderer_mobile }}">
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">
                                                                                {{ $errors->first('mobile') }}
                                                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('car_number') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량번호</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="car_number"
                                               value="{{ $order->carNumber->car_number }}">
                                        @if ($errors->has('car_number'))
                                            <span class="text-danger">
                                                                                {{ $errors->first('car_number') }}
                                                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('vin_number') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차대번호</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $order->carNumber->cars_id }}</p>
                                    </div>

                                </div>

                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량 모델명</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $order->carNumber->car->getFullName() }}
                                            <a class='pull-right text-sm text-danger' href="#" data-toggle="modal"
                                               data-target="#carModal" id="ch_car">변경</a>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button class="btn btn-primary"
                                                data-loading-text="{{ trans('common.button.loading') }}"
                                                id="">주문정보 변경
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2>결제정보
                                <!-- <small>설명</small> -->
                            </h2>
                        </div>

                        <div class="card-body card-padding">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">결제번호</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $order->purchase_id }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">결제방법</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $order->purchase->payment_type->display() }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">결제금액</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $order->purchase->amount }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">결제일자</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $order->purchase->created_at }}</p>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>타임라인
                                <!-- <small>설명</small> -->
                            </h2>
                        </div>

                        <div class="card-body card-padding">


                            <div class="pmo-contact">
                                <ul>
                                    <li class="ng-binding"><i class="zmdi zmdi-phone"></i> 00971123456789</li>
                                    <li class="ng-binding"><i class="zmdi zmdi-email"></i> malinda.h@gmail.com</li>
                                    <li class="ng-binding"><i class="zmdi zmdi-facebook-box"></i> malinda.hollaway
                                    </li>
                                    <li class="ng-binding"><i class="zmdi zmdi-twitter"></i> @malinda
                                        (twitter.com/malinda)
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-pin"></i>
                                        <address class="m-b-0 ng-binding">
                                            44-46 Morningside Road <br>
                                            Edinburgh <br>
                                            Scotland
                                        </address>
                                    </li>
                                </ul>
                            </div>

                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="card-header">
                                        <h2>
                                            <small>주문</small>
                                        </h2>
                                    </div>
                                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">주문신청</label>
                                        <div class="col-md-6">
                                            <span class="help-block">{{ $order->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">주문완료</label>
                                        <div class="col-md-6">
                                            <span class="help-block">{{ $order->status_cd == 112 ? $order->updated_at : '-' }}</span>
                                        </div>
                                    </div>
                                    @foreach($order_items as $order_item)
                                        @component('components.time_line', [
                                            'order_item' => $order_item
                                            ])
                                        @endcomponent
                                    @endforeach
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <h4>주문상품</h4>
                </div>

                @unless($order->orderItem)

                    <div class="no-result">
                        검색결과가 없습니다.
                    </div>

                @endunless

                @foreach($order->orderItem as $order_item)
                    <div class="col-sm-4">
                        @component('components.order_item', [
                        'order_item' => $order_item
                        ])
                        @endcomponent
                    </div>
                @endforeach

            </div>


            <div class="row">
                <div class="col-md-12">
                    <h4>연결상품</h4>
                </div>


                @foreach($order->orderGroup as $group_order)
                    @foreach($group_order->orderItem as $order_item)
                        <div class="col-sm-3">
                            @component('components.order_item', [
                            'order_item' => $order_item
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                @endforeach

            </div>


        </div><!-- container -->
    </section>


    <!-- Car Modal -->
    <div id="carModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-bluegray m-b-20">
                        <h2>차량 모델 변경
                            <small>변경하실 차량 모델을 선택하세요.</small>
                        </h2>
                        <ul class="actions actions-alt">
                            <li class="dropdown">
                                <a href="">
                                    <i class="zmdi zmdi-close" data-dismiss="modal"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-padding">
                        {!! Form::open(['method' => 'POST','route' => ['order.car-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="modal-body">
                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">차량 브랜드</label>
                                <div class="select">
                                    <select class="form-control car-model" id="brands"
                                            name="brands_id"
                                            autocomplete="off" data-url="/order/get-models"
                                            data-target="models" disabled>
                                        <option value="{{ $my_brand->id }}">{{ $my_brand->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">차량 모델</label>
                                <div class="select">
                                    {!! Form::select('models_id', $models, $order->CarNumber->car->models->id, ['class'=>'form-control car-model', 'autocomplete'=>"off", 'data-url'=>"/order/get-details", 'data-target'=>"details"]) !!}

                                </div>
                                @if ($errors->has('models_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('models_id') }}
                                    </span>
                                @endif
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">차량 디테일</label>
                                <div class="select">
                                    <select class="form-control car-model" id="details"
                                            name="details_id"
                                            autocomplete="off" data-url="/order/get-grades"
                                            data-target="grades">
                                        <option value="{{ $order->carNumber->car->detail->id }}">{{ $order->carNumber->car->detail->name }}</option>
                                    </select>
                                </div>
                                @if ($errors->has('details_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('details_id') }}
                                    </span>
                                @endif
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">차량 세부모델</label>
                                <div class="select">
                                    <select class="form-control" id="grades" name="grades_id"
                                            autocomplete="off">
                                        <option value="{{ $order->carNumber->car->grade->id }}">{{ $order->carNumber->car->grade->name }}</option>
                                    </select>
                                </div>
                                @if ($errors->has('grades_id'))
                                    <span class="text-danger">
                                        {{ $errors->first('grades_id') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="">변경</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push( 'footer-script' )
    <script type="text/javascript">

        $("#cancel-click").on("click", function () {
            if (confirm("해당 주문에 대한 결제를 취소하시겠습니까?")) {
                var order_id = $(this).data("cancel_order_id");
                if (order_id) {
                    $("#cancel-order_id").val(order_id);
                    $("#cancel-form").submit();
                } else {
                    alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                }

            }
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
                    $(this).data('target').empty('<option value="">선택하세요.</option>').trigger('change');
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }
            });
        });
    </script>
@endpush
