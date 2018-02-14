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
                                    <ul class="list-group">
                                        {{--<li class="list-group-item">--}}
                                            {{--<small>수입차 차대번호</small>--}}
                                            {{--<input type="text" class="form-control" placeholder="수입차 차대번호를 입력해 주세요."--}}
                                                   {{--name="car_imported_vin_number"--}}
                                                   {{--value="{{ $car->imported_vin_number ? $car->imported_vin_number : '' }}">--}}
                                        {{--</li>--}}

                                        <li class="list-group-item">
                                            <small>차대번호 동일성확인</small>
                                            {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [], ['class' =>'form-control']) !!}

                                        </li>

                                        <li class="list-group-item">
                                            <small>최초등록일</small>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker"
                                                       data-format="YYYY-MM-DD"
                                                       name="cars_registration_date"
                                                       value=""
                                                       required="required">
                                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                            </div>
                                        </li>


                                        <li class="list-group-item">
                                            <small>연식(형식)</small>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cars_year"
                                                       value="" required>
                                                <span class="input-group-addon">년</span>
                                            </div>

                                        </li>

                                        <li class="list-group-item">
                                            <small>차종</small>
                                            {!! Form::select('kind_cd', $kinds, [], ['class'=>'form-control']) !!}
                                        </li>

                                        {{--<li class="list-group-item">--}}
                                            {{--<small>주행거리</small>--}}
                                            {{--<div class="input-group">--}}
                                                {{--<p class="form-control-static"></p>--}}
                                                {{--<span class="input-group-addon">km</span>--}}
                                            {{--</div>--}}

                                        {{--</li>--}}

                                        <li class="list-group-item">
                                            <small>배기량</small>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cars_displacement"
                                                       value="" required>
                                                <span class="input-group-addon">cc</span>
                                            </div>

                                        </li>

                                        <li class="list-group-item">
                                            <small>외부색상</small>
                                            {!! Form::select('cars_exterior_color', $select_color, [], ['class'=>'form-control', 'id'=>'cars_exterior_color', 'required']) !!}
                                        </li>

                                        <li class="list-group-item" id="exterior_color_etc" style="display: none;">
                                            <small>외부 기타 색상</small>
                                            <input type="text" class="form-control" name="car_exterior_color_etc"
                                                   value="">
                                        </li>

                                        <li class="list-group-item">
                                            <small>변속기</small>
                                            {!! Form::select('cars_transmission_cd', $select_transmission, [], ['class'=>'form-control', 'required']) !!}
                                        </li>

                                        <li class="list-group-item">
                                            <small>사용연료</small>
                                            {!! Form::select('cars_fueltype_cd', $select_fueltype, [], ['class' => 'form-control', 'id' => 'cars_fueltype_cd', 'required']) !!}
                                        </li>

                                        <li class="list-group-item" id="fueltype_etc" style="display: none;">
                                            <small>기타 연료</small>
                                            <input type="text" class="form-control" name="car_fueltype_etc"
                                                   value="">
                                        </li>

                                        <li class="list-group-item">
                                            <small>승차인원</small>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="passenger"
                                                       value="" placeholder="" required>
                                                <span class="input-group-addon">명</span>
                                            </div>

                                        </li>
                                    </ul>
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
