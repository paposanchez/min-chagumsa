@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>진단검토 수정
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="/review" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    <h3>
                        <span class="text-lg">
                                <span class="text-danger text-lighter">{{ $diagnosis->status->display() }}</span>
                                <span class="text-lighter">| </span>
                            {{ $diagnosis->chakey }}
                        </span>

                        <button id="issue" class="btn btn-primary pull-right" data-toggle="tooltip" title="진단 발급하기"
                                data-id="{{ $diagnosis->id }}" style="margin-left:10px;">진단 발급하기
                        </button>

                    </h3>

                    <div class="row">
                        <div class="col-xs-6">

                            <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>주문정보</h4>
                                <ul class="list-group">

                                    <li class="list-group-item no-border"><span>주문자명</span> <em
                                                class="pull-right">{{ $diagnosis->order->orderer_name }}</em></li>
                                    <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                                class="pull-right">{{ $diagnosis->order->orderer_mobile }}</em></li>
                                    <li class="list-group-item no-border"><span>상품명</span> <em
                                                class="pull-right">{{ $diagnosis->orderItem->item->name }}</em></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="block bg-white" style="margin-bottom:10px;">
                                <h4>차량정보</h4>
                                <ul class="list-group">
                                    <li class="list-group-item no-border"><span>차량명</span> <em
                                                class="pull-right">{{ $order->getCarFullName()  }}</em></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white">
                        <hr>
                        <div class="row">
                            {!! Form::model($diagnosis, ['method' => 'PATCH','route' => ['review.update', $diagnosis->id], 'class'=>'form-horizontal', 'id'=>'frm', 'enctype'=>"multipart/form-data"]) !!}
                            <div class="col-md-6">
                                <div class="block">
                                    <h4 id="dia-top">기본정보</h4>

                                    <div class="form-group {{ $errors->has('certificates_vin_yn_cd') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">차대번호 동일성확인</label>
                                        <div class="col-md-9">
                                            {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [], ['class' =>'form-control']) !!}

                                            @if ($errors->has('certificates_vin_yn_cd'))
                                                <span class="help-block">
                                                        {{ $errors->first('certificates_vin_yn_cd') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('cars_registration_date') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">최초등록일</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker"
                                                       data-format="YYYY-MM-DD"
                                                       name="cars_registration_date"
                                                       value=""
                                                       required="required">
                                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                            </div>

                                            @if ($errors->has('cars_registration_date'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_registration_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('cars_year') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">연식(형식)</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cars_year"
                                                       value="" required>
                                                <span class="input-group-addon">년</span>
                                            </div>

                                            @if ($errors->has('cars_year'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_year') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('kind_cd') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">차종</label>
                                        <div class="col-md-9">
                                            {!! Form::select('kind_cd', $kinds, [], ['class'=>'form-control']) !!}

                                            @if ($errors->has('kind_cd'))
                                                <span class="help-block">
                                                        {{ $errors->first('kind_cd') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('cars_displacement') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">배기량</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cars_displacement"
                                                       value="" required>
                                                <span class="input-group-addon">cc</span>
                                            </div>

                                            @if ($errors->has('cars_displacement'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_displacement') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('cars_exterior_color') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">외부색상</label>
                                        <div class="col-md-9">
                                            {!! Form::select('cars_exterior_color', $select_color, [], ['class'=>'form-control', 'id'=>'cars_exterior_color', 'required']) !!}

                                            @if ($errors->has('cars_exterior_color'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_exterior_color') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{--<div class="form-group {{ $errors->has('car_exterior_color_etc') ? 'has-error' : '' }}">--}}
                                        {{--<label for="inputSubject"--}}
                                               {{--class="control-label col-md-2">외부 기타 색상</label>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<input type="text" class="form-control" name="car_exterior_color_etc"--}}
                                                       {{--value="">--}}
                                            {{--@if ($errors->has('car_exterior_color_etc'))--}}
                                                {{--<span class="help-block">--}}
                                                        {{--{{ $errors->first('car_exterior_color_etc') }}--}}
                                                {{--</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group {{ $errors->has('cars_transmission_cd') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">변속기</label>
                                        <div class="col-md-9">
                                            {!! Form::select('cars_transmission_cd', $select_transmission, [], ['class'=>'form-control', 'required']) !!}

                                            @if ($errors->has('cars_transmission_cd'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_transmission_cd') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('cars_fueltype_cd') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">사용연료</label>
                                        <div class="col-md-9">

                                            {!! Form::select('cars_fueltype_cd', $select_fueltype, [], ['class' => 'form-control', 'id' => 'cars_fueltype_cd', 'required']) !!}

                                            @if ($errors->has('cars_fueltype_cd'))
                                                <span class="help-block">
                                                        {{ $errors->first('cars_fueltype_cd') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{--<div class="form-group {{ $errors->has('car_fueltype_etc') ? 'has-error' : '' }}">--}}
                                        {{--<label for="inputSubject"--}}
                                               {{--class="control-label col-md-2">기타 연료</label>--}}
                                        {{--<div class="col-md-9">--}}
                                            {{--<input type="text" class="form-control" name="car_fueltype_etc"--}}
                                                       {{--value="">--}}
                                            {{--@if ($errors->has('car_fueltype_etc'))--}}
                                                {{--<span class="help-block">--}}
                                                        {{--{{ $errors->first('car_fueltype_etc') }}--}}
                                                {{--</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                    <div class="form-group {{ $errors->has('passenger') ? 'has-error' : '' }}">
                                        <label for="inputSubject"
                                               class="control-label col-md-2">승차인원</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="passenger"
                                                       value="" placeholder="" required>
                                                <span class="input-group-addon">명</span>
                                            </div>
                                            @if ($errors->has('passenger'))
                                                <span class="help-block">
                                                        {{ $errors->first('passenger') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="block">
                                    <h4 id="dia-top">&nbsp;</h4>
                                    <fieldset>
                                        {{--<div class="form-group ">--}}
                                        {{--<label for="inputSubject"--}}
                                        {{--class="control-label col-md-2">자동차 등록증</label>--}}
                                        {{--<div class="col-md-9">--}}
                                        {{--<img--}}
                                        {{--name="picture"--}}
                                        {{--src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $vin_number_picture->file->id }}"--}}
                                        {{--class="img-responsive picture"--}}
                                        {{--style="width:300px;height:200px;display:inline-block;" data-id="{{ $vin_number_picture->file->id }}">--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="form-group ">
                                            <label for="inputSubject"
                                                   class="control-label col-md-2">자동차 등록증</label>
                                            <div class="col-md-9">
                                                <img
                                                        name="picture"
                                                        src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/1119"
                                                        class="img-responsive picture"
                                                        style="width:300px;height:200px;display:inline-block;"
                                                        data-id="1119">
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('vin_number') ? 'has-error' : '' }}">
                                            <label for="inputSubject"
                                                   class="control-label col-md-2">차대번호</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="차대번호를 입력해주세요."
                                                       name="vin_number" id="vinNumber" required
                                                       value="{{ old('vin_number') }}">
                                                @if ($errors->has('vin_number'))
                                                    <span class="help-block">
                                                        {{ $errors->first('vin_number') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{--<div class="form-group ">--}}
                                        {{--<label for="inputSubject"--}}
                                        {{--class="control-label col-md-2">자동차 계기</label>--}}
                                        {{--<div class="col-md-9">--}}
                                        {{--<img--}}
                                        {{--name="picture"--}}
                                        {{--src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $mileage_picture->file->id }}"--}}
                                        {{--class="img-responsive picture"--}}
                                        {{--style="width:300px;height:200px;display:inline-block;" data-id="{{ $mileage_picture->file->id }}">--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="form-group ">
                                            <label for="inputSubject"
                                                   class="control-label col-md-2">자동차 계기판</label>
                                            <div class="col-md-9">
                                                <img
                                                        name="picture"
                                                        src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/1120"
                                                        class="img-responsive picture"
                                                        style="width:300px;height:200px;display:inline-block;"
                                                        data-id="1120">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('mileage') ? 'has-error' : '' }}">
                                            <label for="inputSubject"
                                                   class="control-label col-md-2">주행거리</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="주행거리를 입력해주세요."
                                                       name="mileage" id="mileageInput" required
                                                       value="{{ old('mileage') }}">
                                                @if ($errors->has('mileage'))
                                                    <span class="help-block">
                                                        {{ $errors->first('mileage') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </fieldset>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>
@endsection


@push( 'footer-script' )
    <script type="text/javascript">
        $(document).on('click', '#issue', function () {
            if (confirm('빌급 후에는 수정 할 수 없습니다.\n진단 발급을 진행하시겠습니까?')) {
                $('#frm').submit();
            }
        });

        $(document).on('click', '.picture', function () {
            window.open('http://image.chagumsa.com/diagnosis/1120.png');
        });
    </script>
@endpush
