@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.certificate')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                    {{ $order->getOrderNumber() }}
                </span>

            <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right"
               style="margin-left:10px;">주문보기</a>

            <a href="/certificate/diagnosis/{{ $order->id }}" target="_blank" class="btn btn-default pull-right"
               style="margin-left:10px;" data-toggle="tooltip" title="인증서 진단정보 보기">진단정보 보기</a>

            <button id="issue" class="btn btn-primary pull-right" data-toggle="tooltip" title="인증서 진단정보 보기"
                    data-id="{{ $order->id }}" style="margin-left:10px;">인증서 발급하기
            </button>

            <button id="certificate-submit" type="submit" class="btn btn-info pull-right" data-toggle="tooltip" title="인증서 저장하기" style="margin-left:10px;">인증서 저장하기
            </button>

            <a href="/certificate/{{ $order->id }}" target="_blank" class="btn btn-primary pull-right" data-toggle="tooltip" title="인증서 미리보기"><i class="fa fa-eye"></i></a>



        </h3>


        <div class="row">

            <div class="col-xs-6">


                <div class="block bg-white" style="margin-bottom:10px;">

                    <h4>주문정보</h4>
                    <ul class="list-group">

                        <li class="list-group-item no-border"><span>주문자명</span> <em
                                    class="pull-right">{{ $order->orderer_name }}</em></li>
                        <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                    class="pull-right">{{ $order->orderer_mobile }}</em></li>
                        <li class="list-group-item no-border"><span>상품명</span> <em
                                    class="pull-right">{{ $order->item->name }}</em></li>
                    </ul>

                </div>

            </div>

            <div class="col-xs-6">

                <div class="block bg-white" style="margin-bottom:10px;">

                    <h4>차량정보</h4>
                    <ul class="list-group">

                        <li class="list-group-item no-border"><span>차량명</span> <em
                                    class="pull-right">{{ $order->getCarFullName()  }}</em></li>
                        <li class="list-group-item no-border"><span>사고유무</span> <em
                                    class="pull-right">{{ $order->accident_state_cd == 1 ? '예' : '아니요' }}</em></li>
                        <li class="list-group-item no-border"><span>침수여부</span> <em
                                    class="pull-right">{{ $order->flooding_state_cd == 1 ? '예' : '아니요' }}</em></li>

                    </ul>
                </div>
            </div>

        </div>


        {!! Form::model($order, ['method' => 'PATCH','url' => ['certificate/update'], 'class'=>'form-horizontal', 'id'=>'frm', 'enctype'=>"multipart/form-data"]) !!}
        <input type="hidden" name="order_id" value="{{ $order->id }}"/>
        <div class="bg-white">

            <div class="row">
                <div class="col-md-4">

                    <div class="block">
                        <h4 id="dia-top">기본정보</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <small>자동차 등록번호</small>
                                <input type="text" class="form-control" name="orders_car_number"
                                       value="{{ $order->car_number }}" required>
                            </li>

                            <li class="list-group-item">
                                <small>차대번호</small>
                                <input type="text" class="form-control" name="cars_vin_number"
                                       placeholder="차대번호를 입력해 주세요."
                                       value="{{ $car->vin_number ? $car->vin_number : '' }}" required>
                            </li>

                            <li class="list-group-item">
                                <small>수입차 차대번호</small>
                                <input type="text" class="form-control" placeholder="수입차 차대번호를 입력해 주세요."
                                       name="car_imported_vin_number"
                                       value="{{ $car->imported_vin_number ? $car->imported_vin_number : '' }}">
                            </li>

                            <li class="list-group-item">
                                <small>차대번호 동일성확인</small>
                                {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [$order->certificates->vin_yn_cd], ['class' =>'form-control']) !!}

                            </li>


                            <li class="list-group-item">
                                <small>최초등록일</small>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                           name="cars_registration_date"
                                           value="{{ $car->registration_date ? $car->registration_date : '' }}"
                                           required="required">
                                    <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <small>연식(형식)</small>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cars_year"
                                           value="{{ $car->year ? $car->year : '' }}" required>
                                    <span class="input-group-addon">년</span>
                                </div>

                            </li>

                            <li class="list-group-item">
                                <small>차종</small>
                                {!! Form::select('kind_cd', $kinds, [$car->kind_cd ? $car->kind_cd : ''], ['class'=>'form-control']) !!}
                            </li>

                            <li class="list-group-item">
                                <small>주행거리</small>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="orders_mileage"
                                           value="{{ $order->mileage ? $order->mileage : '' }}" required>
                                    <span class="input-group-addon">km</span>
                                </div>

                            </li>

                            <li class="list-group-item">
                                <small>배기량</small>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cars_displacement"
                                           value="{{ $car->displacement ? $car->displacement : ''}}" required>
                                    <span class="input-group-addon">cc</span>
                                </div>

                            </li>

                            <li class="list-group-item">
                                <small>외부색상</small>
                                {!! Form::select('cars_exterior_color', $select_color, [$car->exterior_color_cd ? $car->exterior_color_cd : ''], ['class'=>'form-control', 'required']) !!}
                            </li>

                            {{--<li class="list-group-item">--}}
                                {{--<small>내부색상</small>--}}
                                {{--{!! Form::select('cars_interior_color', $select_color, [$car->interior_color_cd ? $car->interior_color_cd : ''], ['class'=>'form-control', 'required']) !!}--}}
                            {{--</li>--}}

                            <li class="list-group-item">
                                <small>연비</small>
                                <div class="input-group"><input type="text" class="form-control"
                                                                name="cars_fuel_consumption"
                                                                value="{{ $car->fuel_consumption ? $car->fuel_consumption : '' }}"
                                                                required><span class="input-group-addon">km</span></div>
                            </li>

                            <li class="list-group-item">
                                <small>엔진타입</small>
                                <input type="text" class="form-control" name="cars_engine_type"
                                       value="{{ $car->engine_type ? $car->engine_type : '' }}" required>
                            </li>

                            <li class="list-group-item">
                                <small>변속기</small>
                                {!! Form::select('cars_transmission_cd', $select_transmission, [$car->transmission_cd ? $car->transmission_cd : ''], ['class'=>'form-control', 'required']) !!}
                            </li>

                            <li class="list-group-item">
                                <small>사용연료</small>
                                {!! Form::select('cars_fueltype_cd', $select_fueltype, [$car->fueltype_cd ? $car->fueltype_cd : '' ], ['class' => 'form-control', 'required']) !!}
                            </li>

                            <li class="list-group-item">
                                <small>승차인원</small>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="passenger"
                                           value="{{ $car->passenger ? $car->passenger : '' }}" placeholder="" required>
                                    <span class="input-group-addon">명</span>
                                </div>

                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-8">
                    <h4 style="margin-top:36px !important;">인증서 발급내역</h4>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">신차출고가격</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                               title="" name="certificates_new_car_price" id="new_car_price"
                                               value="{{ $order->certificates->new_car_price }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">


                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">기준가격(P)</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="pst" id="pst" value="{{ $order->certificates->price }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">기본평가(A)</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="basic_depreciation" id="basic_depreciation" value="{{ $order->certificates->basic_depreciation }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body">


                            <div class="form-group">
                                <label class="control-label col-sm-2">등록일보정</label>
                                <div class="col-sm-7">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($standard_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->basic_registraion == $key ? 'active' : '' }}">
                                                {{ Form::radio('certificates_basic_registraion', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->basic_registraion)) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('certificates_basic_registraion'))
                                        <span class="text-danger">
                                            {{ $errors->first('certificates_basic_registraion') }}
                                        </span>
                                    @endif

                                </div>

                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder=""
                                               title="" name="basic_registraion_depreciation"
                                               id="basic_registraion_depreciation"
                                               value="{{ $order->certificates->basic_registraion_depreciation }}"
                                               required>
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">색상등 기타</label>
                                <div class="col-sm-3 col-sm-offset-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder=""
                                               title="" name="certificates_basic_etc" id="basic_etc"
                                               value="{{ $order->certificates->basic_etc }}" required>
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">사용이력(B)</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="history_depreciation" id="history_depreciation" value="{{ $order->certificates->history_depreciation }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">주행거리</label>
                                <div class="col-sm-7">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1282 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_mileage_cd', 1282, \App\Helpers\Helper::isCheckd(1282, $order->certificates->usage_mileage_cd)) }}
                                            초과
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1283 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_mileage_cd', 1283, \App\Helpers\Helper::isCheckd(1283, $order->certificates->usage_mileage_cd)) }}
                                            표준
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1284 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_mileage_cd', 1284, \App\Helpers\Helper::isCheckd(1284, $order->certificates->usage_mileage_cd)) }}
                                            미달
                                        </label>
                                    </div>
                                    @if ($errors->has('certificates_usage_mileage_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('certificates_usage_mileage_cd') }}
                                        </span>
                                    @endif

                                </div>

                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder=""
                                               title="" name="certificates_usage_mileage_depreciation"
                                               id="certificates_usage_mileage_depreciation"
                                               value="{{ $order->certificates->usage_mileage_depreciation }}" required>
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">사고/수리이력</label>
                                <div class="col-sm-7">
                                    <div class="btn-group btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->usage_history_cd == 1285 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_history_cd', 1285, \App\Helpers\Helper::isCheckd(1285, $order->certificates->usage_history_cd)) }}
                                            사고이력 없음
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->usage_history_cd == 1286 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_history_cd', 1286, \App\Helpers\Helper::isCheckd(1286, $order->certificates->usage_history_cd)) }}
                                            단순수리
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->usage_history_cd == 1287 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_history_cd', 1287, \App\Helpers\Helper::isCheckd(1287, $order->certificates->usage_history_cd)) }}
                                            기본차체판금
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->usage_history_cd == 1288 ? 'active' : '' }}">
                                            {{ Form::radio('certificates_usage_history_cd', 1288, \App\Helpers\Helper::isCheckd(1288, $order->certificates->usage_history_cd)) }}
                                            기본차체교환/골격수리
                                        </label>
                                    </div>
                                    @if ($errors->has('certificates_usage_history_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('certificates_usage_history_cd') }}
                                        </span>
                                    @endif

                                </div>

                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder=""
                                               title="" name="certificates_usage_history_depreciation"
                                               id="certificates_usage_history_depreciation"
                                               value="{{ $order->certificates->usage_history_depreciation }}" required>
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">종합진단결과(C)</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="performance_depreciation" id="performance_depreciation" value="{{ $order->certificates->performance_depreciation }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">주요외판</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_exterior_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_exterior_cd', $key, $order->certificates->performance_exterior_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_exterior_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_exterior_cd') }}
                                        </span>
                                    @endif
                                    <textarea name="exterior_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->exterior_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">침수흔적 점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_flooded_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_flooded_cd', $key, $order->certificates->performance_flooded_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_flooded_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_flooded_cd') }}
                                        </span>
                                    @endif
                                    <textarea name="flooded_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->flooded_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">소모품상태점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_consumption_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_consumption_cd', $key, $order->certificates->performance_consumption_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_consumption_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_consumption_cd') }}
                                        </span>
                                    @endif
                                    <textarea name="consumption_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->consumption_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">고장진단</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_broken_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_broken_cd', $key, $order->certificates->performance_broken_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_broken_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_broken_cd') }}
                                        </span>
                                    @endif
                                    <textarea name="broken_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->broken_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">동력전달</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_power_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_power_cd', $key, $order->certificates->performance_power_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_power_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_power_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="power_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->power_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">전기</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_electronic_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_electronic_cd', $key, $order->certificates->performance_electronic_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_electronic_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_electronic_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="electronic_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->electronic_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">주요내판</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_interior_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_interior_cd', $key, $order->certificates->performance_interior_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_interior_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_interior_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="interior_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->interior_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">차량외판점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_exteriortest_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_exteriortest_cd', $key, $order->certificates->performance_exteriortest_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_exteriortest_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_exteriortest_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="exteriortest_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->exteriortest_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">전장품유리기어/작동상태점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_plugin_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_plugin_cd', $key, $order->certificates->performance_plugin_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_plugin_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_plugin_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="plugin_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->plugin_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">엔진(원동기)</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_engine_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_engine_cd', $key, $order->certificates->performance_engine_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_engine_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_engine_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="engine_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->engine_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">조향장치</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_steering_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_steering_cd', $key, $order->certificates->performance_steering_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_steering_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_steering_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="steering_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->steering_comment : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">타이어</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_tire_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_tire_cd', $key, $order->certificates->performance_tire_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_tire_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_tire_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="tire_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->tire_comment : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">사고유무점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_accident_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_accident_cd', $key, $order->certificates->performance_accident_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_accident_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_accident_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="accident_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->accident_comment : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">차량실내점검</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_interiortest_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_interiortest_cd', $key, $order->certificates->performance_interiortest_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_interiortest_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_interiortest_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="interiortest_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->interiortest_comment : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">주행테스트</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_driving_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_driving_cd', $key, $order->certificates->performance_driving_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_driving_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_driving_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="driving_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->driving_comment : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">변속기</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_transmission_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_transmission_cd', $key, $order->certificates->performance_transmission_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_transmission_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_transmission_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="transmission_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->transmission_comment : '' }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">제동장치</label>
                                <div class="col-sm-10">
                                    <div class="btn-group" data-toggle="buttons">
                                        @foreach($certificate_states as $key=>$val )
                                            <label class="btn btn-default {{ $order->certificates->performance_braking_cd == $key ? 'active' : '' }}">
                                                {{ Form::radio('performance_braking_cd', $key, $order->certificates->performance_braking_cd == $key) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('performance_braking_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('performance_braking_cd') }}
                                        </span>
                                    @endif

                                    <textarea name="braking_comment" class="form-control" required="required"
                                              style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->braking_comment : '' }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">특별요인(S)</label>
                                <div class="col-sm-3 col-sm-offset-7 has-error">
                                    <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="special_depreciation" id="special_depreciation" value="{{ $order->certificates->special_depreciation }}">
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">요인</label>
                                <div class="col-sm-7">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->special_flooded_cd == 3 ? 'active' : '' }}">
                                            {{ Form::checkbox('certificates_special_flooded_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_flooded_cd)) }}
                                            침수차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->special_fire_cd == 3 ? 'active' : '' }}">
                                            {{ Form::checkbox('certificates_special_fire_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fire_cd)) }}
                                            화재차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->special_fulllose_cd == 3 ? 'active' : '' }}">
                                            {{ Form::checkbox('certificates_special_fulllose_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fulllose_cd)) }}
                                            전손차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->special_remodel_cd == 3 ? 'active' : '' }}">
                                            {{ Form::checkbox('certificates_special_remodel_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_remodel_cd)) }}
                                            불법개조
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->special_etc_cd == 3 ? 'active' : '' }}">
                                            {{ Form::checkbox('certificates_special_etc_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_etc_cd)) }}
                                            기타요인
                                        </label>
                                    </div>

                                </div>

                                <div class="col-sm-3">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-2">변경이력</label>
                                <div class="col-sm-10">

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">용도변경이력</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="certificates_history_purpose" class="form-control"
                                                   name="certificates_history_purpose" data-role="tagsinput"
                                                   value="{{ $order->certificates->history_purpose }}"
                                                   style="width:100%;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">차고지변경이력</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="certificates_history_garage"
                                                   name="certificates_history_garage" class="form-control"
                                                   data-role="tagsinput"
                                                   value="{{ $order->certificates->history_garage }}"
                                                   style="width:100%;">
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">보험사고이력</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       name="certificates_history_insurance"
                                                       id="certificates_history_insurance"
                                                       value="{{ $order->certificates->history_insurance }}" required>
                                                <span class="input-group-addon">건</span>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-3 col-md-9">
                                            <div class="plugin-attach" id="plugin-attachment">

                                                @if ($errors->has('attachment'))
                                                    <span class="help-block">
                                                {{ $errors->first('attachment') }}
                                            </span>
                                                @endif

                                            </div>


                                            @if ($errors->has('attachment'))
                                                <span class="help-block">
                                            {{ $errors->first('attachment') }}
                                        </span>
                                            @endif

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3">소유자변경이력</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       name="certificates_history_owner" id="certificates_history_owner"
                                                       value="{{ $order->certificates->history_owner }}" required>
                                                <span class="input-group-addon">건</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group no-margin">
                                        <label class="control-label col-sm-3">정비이력</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       name="certificates_history_maintance"
                                                       id="certificates_history_maintance"
                                                       value="{{ $order->certificates->history_maintance }}" required>
                                                <span class="input-group-addon">건</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="form-group no-margin">--}}
                                {{--<label for="" class="control-label col-md-offset-5 col-md-3">특별요인(S) 감가금액</label>--}}
                                {{--<div class="col-sm-4">--}}
                                {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" name="special_depreciation"--}}
                                {{--id="special_depreciation"--}}
                                {{--value="{{ $order->certificates->special_depreciation ? $order->certificates->special_depreciation : '' }}"--}}
                                {{--required>--}}
                                {{--<span class="input-group-addon">원</span>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                            </div>
                        </div>


                        <div class="panel-heading">
                            <div class="row">
                                <label for="" class="control-label col-sm-2">최종평가</label>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2">평가금액</label>
                                <div class="col-sm-3 col-sm-offset-7 text-right">
                                    <div class="input-group has-error">
                                        <input type="text" class="form-control cert-calculate-subtotal"
                                               placeholder="P ± A ± B ± S" title="" name="certificates_valuation"
                                               id="valuation" value="{{ $order->certificates->valuation }}" required>
                                        <span class="input-group-addon">만원</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">등급평가</label>
                                <div class="col-sm-5 col-sm-offset-5 text-right">
                                    <div class="btn-group btn-group-lg" role="group" data-toggle="buttons">
                                        @foreach($grades as $key=>$val )
                                            <label class="btn btn-outline btn-danger {{ $order->certificates->grade == $key ? 'active' : '' }}">
                                                {{ Form::radio('grade_state_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->grade)) }} {{ $val }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('grade_state_cd'))
                                        <span class="text-danger">
                                            {{ $errors->first('grade_state_cd') }}
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">종합의견</label>
                                <div class="col-sm-10  has-error">
                                    <textarea name="certificates_opinion" class="form-control" required="required"
                                              style="height: 100px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div><!-- container -->
@endsection

@push( 'header-script' )
{{ Html::style(Helper::assets('vendor/tagsinput/bootstrap-tagsinput.css')) }}
@endpush

@push( 'footer-script' )
{{ Html::script(Helper::assets( 'vendor/tagsinput/bootstrap-tagsinput.min.js' )) }}

<script type="text/template" id="qq-template">
@include("partials/files")
</script>
<link rel="stylesheet"
      href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
<script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>

<script type="text/javascript">
    var sum_certificate_price = function () {
        var Pst = parseInt($("#pst").val());
//        var A = parseInt($("#basic_registraion_depreciation").val())
//            + parseInt($("#basic_mounting_cd").val()) + parseInt($("#basic_etc").val());

        var A = parseInt($('#basic_depreciation').val());
//        var B = parseInt($("#usage_mileage_depreciation").val()) + parseInt($("#usage_history_depreciation").val());
        var B = parseInt($('#history_depreciation').val());
        var C = parseInt($("#performance_depreciation").val());
        var S = parseInt($("#special_depreciation").val());

        var V = Pst + (A + B + C + S);
        return V;
    };

    $(function () {

        $(document).on('click', '#certificate-submit', function () {
            if (confirm("인증서를 저장하시겠습니까?")) {
                $("#frm").submit();
            }
        });


        $("#frm").validate({
            messages: {
                orders_car_number: "자동차 등록번호를 입력해 주세요.",
                cars_vin_number: "차대번호를 입력해 주세요.",
                certificates_vin_yn_cd: "차대번호 동일성확인을 선택해 주세요.",
                cars_registration_date: "차량의 최초등록일을 입력해 주세요.",
                cars_year: "연식을 입력해 주세요.",
                orders_mileage: "주행거리를 km단위로 입력해 주세요. (정수값)",
                cars_displacement: "배기량을 입력해 주세요.",
                cars_engine_type: "엔진타입을 입력해 주세요.",
                cars_fuel_consumption: "연비를 선택해 주세요.",
                passenger: "승차인원을 입력해 주세요.",

                certificates_usage_history_depreciation: "사고/수리이력 감가금액을 입력해주세요.",
                certificates_basic_etc: "색상 등 기타 감가금액을 입력해주세요.",
                basic_registraion_depreciation : "등록일 보정 평가액을 선택해주세요.",
                certificates_usage_mileage_depreciation: "주행거리 감가금액을 입력해주세요.",
                exterior_comment: "주요외판 점검의견을 입력해주세요.",
                flooded_comment: "침수흔적 점검의견을 입력해주세요.",
                consumption_comment: "소모품상태 점검의견을 입력해주세요.",
                broken_comment: "고장진단 점검의견을 입력해주세요.",
                power_comment: "동력전달 점검의견을 입력해주세요.",
                electronic_comment: "전기 점검의견을 입력해주세요.",
                interior_comment: "주요내판 점검의견을 입력해주세요.",
                exteriortest_comment: "차량외판 점검의견을 입력해주세요.",
                plugin_comment: "전장품 유리기어/작동상태 점검의견을 입력해주세요.",
                engine_comment: "엔진(원동기) 점검의견을 입력해주세요.",
                steering_comment: "조향장치 점검의견을 입력해주세요.",
                tire_comment: "타이어 점검의견을 입력해주세요.",
                accident_comment: "사고유무 점검의견을 입력해주세요.",
                interiortest_comment: "차량실내 점검의견을 입력해주세요.",
                driving_comment: "주행테스트 점검의견을 입력해주세요.",
                transmission_comment: "변속기 점검의견을 입력해주세요.",
                braking_comment: "제동장치 점검의견을 입력해주세요.",
                certificates_history_owner: "소유자 변경이력을 입력해주세요.",
                certificates_history_garage: "차고지 변경이력을 입력해주세요.",
                certificates_history_maintance: "정비 변경이력을 입력해주세요.",
                certificates_history_purpose: "용도 변경이력을 입력해주세요.",
                certificates_opinion: "종합의견을 입력해 주세요.",
                grade_state_cd: "차량등급을 선택해주세요.",
                certificates_valuation: "평가금액을 입력하세요.",
                certificates_history_insurance: "보험사고이력을 입력해주세요.",

                history_depreciation: "사용이력 감가금액을 입력해주세요.",
                basic_depreciation: "기본평가 감가금액을 입력해주세요.",
                special_depreciation: "특별요인 감가금액을 입력해주세요.",
                performance_depreciation: "차량성능삼태 감가금액을 입력해주세요.",
            },
//        errorPlacement: function(error, element) {
//            var chk_name = element.attr("name");
//            $('input[name='+chk_name+'-error]').addClass('text-danger');
//        },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $("#valuation").on("click", function () {
            if (confirm("평가금액을 계산하시겠습니까?")) {
                var valuation = sum_certificate_price();

                if (!isNaN(valuation)) {
                    $("#valuation").val(valuation);
                } else {
                    $("#valuation").val('');
                    alert('평가금액 계산을 위해 금액을 정확히 입력해 주세요.')
                }
            } else {
                $("#valuation").focus();
            }

        });


        // 인증서 발급하기
        $("#issue").click(function () {
            var id = $(this).data('id');
            var c = confirm("인증서가 발급되면 수정이 불가능합니다. \n인증서를 발급하시겠습니까?");
            if (c == true) {
                $.ajax({
                    type: 'post',
                    url: '/certificate/issue',
                    data: {
                        'order_id': id
                    },
                    success: function (data) {
                        alert('인증서 발급이 완료되었습니다.');
                        location.href = "/certificate";
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                    }
                })
            }

        });

    });


    $(document).ready(function () {
        $('#plugin-attachment').fineUploader({
            debug: true,
//        template: 'qq-template',
            request: {
                inputName: "upfile",
                endpoint: '/file/upload',
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            deleteFile: {
                enabled: true,
                endpoint: '/file/delete',
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            thumbnails: {
                placeholders: {
                    waitingPath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/waiting-generic.png' ) }}",
                    notAvailablePath: "{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/not_available-generic.png' ) }}",
                }
            },
            validation: {
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'hwp'],
                itemLimit: 3,
                sizeLimit: 5120000, // 50 kB = 50 * 1024 bytes
                stopOnFirstInvalidFile: true
            },
            text: {
                uploadButton: 'Upload a file',
                cancelButton: 'Cancel',
                retryButton: 'Retry',
                failUpload: 'Upload failed',
                dragZone: 'Drop files here to upload',
                formatProgress: "{percent}% of {total_size}",
                waitingForResponse: "Processing..."
            },
            messages: {
                typeError: "{file} has an invalid extension. Valid extension(s): {extensions}.",
                sizeError: "{file} is too large, maximum file size is {sizeLimit}.",
                minSizeError: "{file} is too small, minimum file size is {minSizeLimit}.",
                emptyError: "{file} is empty, please select files again without it.",
                noFilesError: "No files to upload.",
                onLeave: "The files are being uploaded, if you leave now the upload will be cancelled."
            },
            callbacks: {
                onComplete: function (id, fileName, responseJSON) {
                    if (responseJSON.success == true) {
                        $.notify(responseJSON.msg, "success");

                        var $listItem = $(this).fineUploader('getItemByFileId', id);
                        $listItem.find('.plugin-attach-file-input').val(responseJSON.data.id);

                    } else {
                        $.notify(responseJSON.msg, "error");
                    }
                }


            }
        });

    });
</script>
@endpush
