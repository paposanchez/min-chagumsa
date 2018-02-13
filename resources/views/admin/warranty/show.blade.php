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

                            {!! Form::open(['method' => 'POST','route' => ['order.user-update', 'id' => $warranty->order->id], 'class'=>'form-horizontal', 'id'=>'userForm', 'enctype'=>"multipart/form-data"]) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">주문번호</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $warranty->chakey }}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">회원</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $warranty->order->orderer->name }}</p>
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자명</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="name"
                                               value="{{ $warranty->order->orderer_name }}">
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
                                               value="{{ $warranty->order->orderer_mobile }}">
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
                                               value="{{ $warranty->order->car_number }}">
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
                                        <p class="form-control-static">{{ $warranty->carNumber ? $warranty->carNumber->cars_id : '-' }}</p>
                                    </div>

                                </div>

                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량 모델명</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $warranty->order->getCarFullName() }}
                                            @if($warranty->status_cd == 126 || $warranty->status_cd < 115 )
                                                <a class='pull-right text-sm text-danger' href="#" data-toggle="modal"
                                                   data-target="#carModal" id="ch_car">변경</a>
                                            @endif
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
                            <h2>예약정보
                                <!-- <small>설명</small> -->
                            </h2>
                        </div>

                        <div class="card-body card-padding">
                            <form class="form-horizontal">
                                <fieldset>

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
                                    @component('components.time_line', [
                                        'order_item' => $warranty->orderItem
                                        ])
                                    @endcomponent
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {!! Form::open(['route' => ["order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
    <input type="hidden" name="order_id" id="cancel-order_id">
    {!! Form::close() !!}


@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(document).on('click', '#cancel-clock', function () {
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


        $(document).on('click', '#confirm_reservation', function () {
            if (confirm('예약을 확정하시겠습니까?')) {
                $('#confirm-form').submit();
            }
        });

        $(document).on('click', '#bcs_submit', function(){
            if(confirm("정비소를 변경하시겠습니까? \n정비소 변경시 예약상태가 '신청' 상태로 변경됩니다.")){
                $('#garageForm').submit();
            }
        });

    </script>
@endpush
