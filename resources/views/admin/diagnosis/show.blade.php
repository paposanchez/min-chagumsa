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

                            {!! Form::open(['method' => 'POST','route' => ['order.user-update', 'id' => $diagnosis->order->id], 'class'=>'form-horizontal', 'id'=>'userForm', 'enctype'=>"multipart/form-data"]) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">주문번호</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $diagnosis->chakey }}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label col-md-3">회원</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $diagnosis->order->orderer->name }}</p>
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">주문자명</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="name"
                                               value="{{ $diagnosis->order->orderer_name }}">
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
                                               value="{{ $diagnosis->order->orderer_mobile }}">
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
                                               value="{{ $diagnosis->carNumber->car_number }}">
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
                                        <p class="form-control-static">{{ $diagnosis->carNumber->cars_id }}</p>
                                    </div>

                                </div>

                                <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">차량 모델명</label>
                                    <div class="col-md-6">
                                        <p class="form-control-static">{{ $diagnosis->carNumber->car->getFullName() }}
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
                            <h2>예약정보
                                <!-- <small>설명</small> -->
                            </h2>
                        </div>

                        <div class="card-body card-padding">
                            <form class="form-horizontal">
                                <fieldset>

                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">정비소</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $diagnosis->garage->name }}
                                                <a class='pull-right text-sm text-danger' href="#" data-toggle="modal"
                                                   data-target="#garageModal" id="ch_garage">변경</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">진단 상태</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $diagnosis->status->display() }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">예약 날자</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $diagnosis->reservation_at ? $diagnosis->reservation_at->format('Y-m-d H:m') : '-' }}
                                                <a class='pull-right text-sm text-danger' href="#" data-toggle="modal"
                                                   data-target="#reservationModal" id="ch_reservation">예약변경</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-md-3">확정일자</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">{{ $diagnosis->confirm_at ? $diagnosis->confirm_at->format('Y-m-d H:m') : '-' }}
                                                <a class='pull-right text-sm text-danger' href="#"
                                                   id="confirm_reservation">예약확정</a>
                                            </p>
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
                                    @component('components.time_line', [
                                        'order_item' => $diagnosis->orderItem
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
                        {!! Form::open(['method' => 'POST','route' => ['order.car-update', 'id' => $diagnosis->order->id], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
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
                                    {!! Form::select('models_id', $models, $diagnosis->CarNumber->car->models->id, ['class'=>'form-control car-model', 'autocomplete'=>"off", 'data-url'=>"/order/get-details", 'data-target'=>"details"]) !!}

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
                                        <option value="{{ $diagnosis->carNumber->car->detail->id }}">{{ $diagnosis->carNumber->car->detail->name }}</option>
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
                                        <option value="{{ $diagnosis->carNumber->car->grade->id }}">{{ $diagnosis->carNumber->car->grade->name }}</option>
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

    <!-- reservation Modal -->
    <div id="reservationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-bluegray m-b-20">
                        <h2>예약 정보 변경
                            <small>변경하실 날짜를 선택해주세요.</small>
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
                        {!! Form::open(['method' => 'POST','route' => ['diagnosis.change-reservation', 'id' => $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'reservationForm', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                            <label for="" class=" fg-label">예약 날짜</label>
                            <div class="select">
                                <div class="dtp-container">
                                    <input type='text' class="form-control date-picker"
                                           id="reservation_at" name="reservation_at"
                                           placeholder="Click here..."
                                           value="{{ $diagnosis->reservation_at ? $diagnosis->reservation_at->format('Y-m-d') : '' }}">
                                </div>
                            </div>
                            @if ($errors->has('reservation_at'))
                                <span class="text-danger">
                                        {{ $errors->first('reservation_at') }}
                                    </span>
                            @endif
                        </div>

                        <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                            <label for="" class=" fg-label">예약 시간</label>
                            <div class="select">
                                {!! Form::select('sel_hour', $sel_hours, $diagnosis->reservation_at ? $diagnosis->reservation_at->format('H') : '', ['class'=>'form-control', 'autocomplete'=>"off"]) !!}
                            </div>
                            @if ($errors->has('sel_hour'))
                                <span class="text-danger">
                                        {{ $errors->first('sel_hour') }}
                                    </span>
                            @endif
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

    <div id="garageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-bluegray m-b-20">
                        <h2>정비소 변경
                            <small>변경하실 정비소를 선택해주세요.</small>
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
                        {!! Form::open(['method' => 'POST','route' => ['diagnosis.change-garage', 'id' => $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'garageForm', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                            <label for="" class=" fg-label">시/도</label>
                            <div class="select">
                                {!! Form::select('areas', $garages, $diagnosis->garage->user_extra->area, ['class'=>'form-control garage','id' =>'areas', 'autocomplete'=>"off", 'data-url'=>'/order/get-section', 'data-target'=>'sections']) !!}
                            </div>
                            @if ($errors->has('area'))
                                <span class="text-danger">
                                        {{ $errors->first('area') }}
                                    </span>
                            @endif
                        </div>

                        <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                            <label for="" class=" fg-label">구/군</label>
                            <div class="select">
                                <select class="form-control garage" id="sections" name="sections" autocomplete="off" data-url="/order/get-address" data-target="garages">
                                    <option value="{{ $diagnosis->garage->user_extra->section }}">{{ $diagnosis->garage->user_extra->section }}</option>
                                </select>
                            </div>
                            @if ($errors->has('details_id'))
                                <span class="text-danger">
                                        {{ $errors->first('details_id') }}
                                    </span>
                            @endif
                        </div>

                        <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                            <label for="" class=" fg-label">정비소</label>
                            <div class="select">
                                <select class="form-control" id="garages" name="garages" autocomplete="off">
                                    <option value="{{ $diagnosis->garage->name }}">{{ $diagnosis->garage->name }}</option>
                                </select>
                            </div>
                            @if ($errors->has('details_id'))
                                <span class="text-danger">
                                        {{ $errors->first('details_id') }}
                                    </span>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="bcs_submit">변경</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ["order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
    <input type="hidden" name="order_id" id="cancel-order_id">
    {!! Form::close() !!}

    {!! Form::open(['route' => ["diagnosis.confirm-reservation"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'confirm-form']) !!}
    <input type="hidden" name="diagnosis_id" id="diagnosis_id" value="{{ $diagnosis->id }}">
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
