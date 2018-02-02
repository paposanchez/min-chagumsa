@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>포스팅 수정
                        <!-- <small>새로운 주문을 생성한다..</small> -->
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="/posting" class="goback">
                                <i class="zmdi zmdi-view-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body card-padding">
                    <h3>
                        <span class="text-lg">
                                <span class="text-danger text-lighter">{{ $certificate->status->display() }}</span>
                                <span class="text-lighter">| </span>
                            {{ $certificate->chakey }}
                        </span>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                            <a href="/order/{{ $certificate->order->id }}" target="_blank"
                               class="btn btn-default pull-right"
                               style="margin-left:10px;">주문보기</a>
                        @endif
                        <a href="{{ url("diagnosis", [$certificate->diagnosis_id]) }}" target="_blank"
                           class="btn btn-default pull-right"
                           style="margin-left:10px;" data-toggle="tooltip" title="인증서 진단정보 보기">진단정보 보기</a>

                        <button id="issue" class="btn btn-primary pull-right" data-toggle="tooltip" title="인증서 진단정보 보기"
                                data-id="{{ $certificate->id }}" style="margin-left:10px;">인증서 발급하기
                        </button>

                        <button id="certificate-submit" class="btn btn-info pull-right" data-toggle="tooltip"
                                title="인증서 저장하기"
                                style="margin-left:10px;">인증서
                            저장하기
                        </button>
                    </h3>

                    <div class="row">
                        <div class="col-xs-6">

                            <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>주문정보</h4>
                                <ul class="list-group">

                                    <li class="list-group-item no-border"><span>주문자명</span> <em
                                                class="pull-right">{{ $certificate->order->orderer_name }}</em></li>
                                    <li class="list-group-item no-border"><span>주문자연락처</span> <em
                                                class="pull-right">{{ $certificate->order->orderer_mobile }}</em></li>
                                    <li class="list-group-item no-border"><span>상품명</span> <em
                                                class="pull-right">{{ $certificate->orderItem->item->name }}</em></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="block bg-white" style="margin-bottom:10px;">
                                <h4>차량정보</h4>
                                <ul class="list-group">
                                    <li class="list-group-item no-border"><span>차량명</span> <em
                                                class="pull-right">{{ $certificate->carNumber->car->getFullName()  }}</em></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    {!! Form::model($certificate, ['method' => 'PATCH','route' => ['certificate.update', $certificate->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="block">
                                    <h4 id="dia-top">기본정보</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <small>자동차 등록번호</small>
                                            <input type="text" class="form-control" name="orders_car_number"
                                                   value="{{ $certificate->carNumber->car_number }}" required>
                                        </li>

                                        <li class="list-group-item">
                                            <small>차대번호</small>
                                            <input type="text" class="form-control" name="cars_vin_number"
                                                   placeholder="차대번호를 입력해 주세요."
                                                   value="{{ $certificate->carNumber->car_id }}" required>
                                        </li>

                                        {{--<li class="list-group-item">--}}
                                            {{--<small>수입차 차대번호</small>--}}
                                            {{--<input type="text" class="form-control" placeholder="수입차 차대번호를 입력해 주세요."--}}
                                                   {{--name="car_imported_vin_number"--}}
                                                   {{--value="{{ $car->imported_vin_number ? $car->imported_vin_number : '' }}">--}}
                                        {{--</li>--}}

                                        <li class="list-group-item">
                                            <small>차대번호 동일성확인</small>
                                            {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [$certificate->vin_yn_cd], ['class' =>'form-control']) !!}

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
                                                       value="{{ $car->mileage }}" required>
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
                                            {!! Form::select('cars_exterior_color', $select_color, [$car->exterior_color_cd ? $car->exterior_color_cd : ''], ['class'=>'form-control', 'id'=>'cars_exterior_color', 'required']) !!}
                                        </li>

                                        <li class="list-group-item" id="exterior_color_etc" style="display: none;">
                                            <small>외부 기타 색상</small>
                                            <input type="text" class="form-control" name="car_exterior_color_etc"
                                                   value="{{ $car->exterior_color_etc ? $car->exterior_color_etc : '' }}">
                                        </li>

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
                                            {!! Form::select('cars_fueltype_cd', $select_fueltype, [$car->fueltype_cd ? $car->fueltype_cd : '' ], ['class' => 'form-control', 'id' => 'cars_fueltype_cd', 'required']) !!}
                                        </li>

                                        <li class="list-group-item" id="fueltype_etc" style="display: none;">
                                            <small>기타 연료</small>
                                            <input type="text" class="form-control" name="car_fueltype_etc"
                                                   value="{{ $car->fueltype_etc ? $car->fueltype_etc : '' }}">
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

                            {{-- 대표이미지 --}}
                            {{--<div class="col-md-8">--}}
                                {{--<h4 style="margin-top:36px !important; ">대표이미지 선택</h4>--}}
                                {{--<div style="border: #000000 solid 1px; margin-top: 10px; padding: 10px;">--}}
                                    {{--@foreach($order->getExteriorPicture() as $picture)--}}
                                        {{--@foreach($picture->files as $file)--}}
                                            {{--<img--}}
                                                    {{--name="picture"--}}
                                                    {{--src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $file->id }}"--}}
                                                    {{--class="img-responsive picture"--}}
                                                    {{--style="width:100px;height:100px;display:inline-block;--}}
                                                    {{--@if($order->certificates->pictures == $file->id)--}}
                                                            {{--opacity:0.2;--}}
                                                    {{--@endif--}}
                                                            {{--" data-id="{{$file->id}}">--}}
                                        {{--@endforeach--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                                {{--<input type="hidden" name="selecte_picture_id" id="selecte_picture_id" value="">--}}
                            {{--</div>--}}

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
                                                           value="{{ $certificate->new_car_price }}">
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
                                                    <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                                           title="" name="pst" id="pst" value="{{ $certificate->price }}">
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
                                                    <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                                           title="" name="basic_depreciation" id="basic_depreciation"
                                                           value="{{ $certificate->basic_depreciation }}">
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
                                                        <label class="btn btn-default {{ $certificate->basic_registraion == $key ? 'active' : '' }}">
                                                            {{ Form::radio('certificates_basic_registraion', $key, \App\Helpers\Helper::isCheckd($key, $certificate->basic_registraion)) }} {{ $val }}
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
                                                           value="{{ $certificate->basic_registraion_depreciation }}"
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
                                                           value="{{ $certificate->basic_etc }}">
                                                    <span class="input-group-addon">만원</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <div class="row">
                                            <label for="" class="control-label col-sm-2">주요이력평가(B)</label>
                                            <div class="col-sm-3 col-sm-offset-7 has-error">
                                                <div class="input-group">
                                                    <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                                           title="" name="history_depreciation" id="history_depreciation"
                                                           value="{{ $certificate->history_depreciation }}">
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
                                                    <label class="btn btn-default {{ $certificate->usage_mileage_cd == 1282 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_mileage_cd', 1282, \App\Helpers\Helper::isCheckd(1282, $certificate->usage_mileage_cd)) }}
                                                        초과
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_mileage_cd == 1283 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_mileage_cd', 1283, \App\Helpers\Helper::isCheckd(1283, $certificate->usage_mileage_cd)) }}
                                                        표준
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_mileage_cd == 1284 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_mileage_cd', 1284, \App\Helpers\Helper::isCheckd(1284, $certificate->usage_mileage_cd)) }}
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
                                                           value="{{ $certificate->usage_mileage_depreciation }}" required>
                                                    <span class="input-group-addon">만원</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px;">
                                            <label class="control-label col-sm-2">사고/수리이력</label>
                                            <div class="col-sm-7">
                                                <div class="btn-group btn-group" data-toggle="buttons">
                                                    <label class="btn btn-default {{ $certificate->usage_history_cd == 1285 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_history_cd', 1285, \App\Helpers\Helper::isCheckd(1285, $certificate->usage_history_cd)) }}
                                                        사고이력 없음
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_history_cd == 1286 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_history_cd', 1286, \App\Helpers\Helper::isCheckd(1286, $certificate->usage_history_cd)) }}
                                                        단순수리
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_history_cd == 1287 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_history_cd', 1287, \App\Helpers\Helper::isCheckd(1287, $certificate->usage_history_cd)) }}
                                                        기본차체판금
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_history_cd == 1288 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_history_cd', 1288, \App\Helpers\Helper::isCheckd(1288, $certificate->usage_history_cd)) }}
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
                                                           value="{{ $certificate->usage_history_depreciation }}" required>
                                                    <span class="input-group-addon">만원</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                    <textarea name="history_comment" class="form-control"
                                              style="height: 60px;">{{ $certificate->history_comment }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 5px;">
                                            <label class="control-label col-sm-2">침수점검</label>
                                            <div class="col-sm-7">
                                                <div class="btn-group btn-group" data-toggle="buttons">
                                                    <label class="btn btn-default {{ $certificate->usage_flood_cd == 1339 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_flood_cd', 1339, \App\Helpers\Helper::isCheckd(1339, $certificate->usage_flood_cd)) }}
                                                        없음
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_flood_cd == 1340 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_flood_cd', 1340, \App\Helpers\Helper::isCheckd(1340, $certificate->usage_flood_cd)) }}
                                                        침수의심
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->usage_flood_cd == 1341 ? 'active' : '' }}">
                                                        {{ Form::radio('certificates_usage_flood_cd', 1341, \App\Helpers\Helper::isCheckd(1341, $certificate->usage_flood_cd)) }}
                                                        침수
                                                    </label>
                                                </div>
                                                @if ($errors->has('certificates_usage_flood_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('certificates_usage_flood_cd') }}
                                        </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                    <textarea name="flood_comment" class="form-control"
                                              style="height: 60px;">{{ $certificate->flood_comment }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel-heading">
                                        <div class="row">
                                            <label for="" class="control-label col-sm-2">종합진단결과(C)</label>
                                            <div class="col-sm-3 col-sm-offset-7 has-error">
                                                <div class="input-group">
                                                    <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                                           title="" name="performance_depreciation" id="performance_depreciation"
                                                           value="{{ $certificate->performance_depreciation }}">
                                                    <span class="input-group-addon">만원</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">차량외부점검</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_exterior_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_exterior_cd', $key, $certificate->performance_exterior_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_exterior_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_exterior_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="exterior_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->exterior_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">차량내부점검</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_interior_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_interior_cd', $key, $certificate->performance_interior_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_interior_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_interior_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="interior_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->interior_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">전장장착품작동상태</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($operation_state_cd as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_plugin_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_plugin_cd', $key, $certificate->performance_plugin_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_plugin_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_plugin_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="plugin_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->plugin_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">고장진단</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_broken_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_broken_cd', $key, $certificate->performance_broken_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_broken_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_broken_cd') }}
                                        </span>
                                                @endif
                                                <textarea name="broken_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->broken_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">원동기</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_engine_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_engine_cd', $key, $certificate->performance_engine_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_engine_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_engine_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="engine_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->engine_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">변속기</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_transmission_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_transmission_cd', $key, $certificate->performance_transmission_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_transmission_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_transmission_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="transmission_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->transmission_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">동력전달</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_power_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_power_cd', $key, $certificate->performance_power_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_power_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_power_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="power_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->power_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">조향장치 및 현가장치</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_steering_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_steering_cd', $key, $certificate->performance_steering_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_steering_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_steering_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="steering_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->steering_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">제동장치</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_braking_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_braking_cd', $key, $certificate->performance_braking_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_braking_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_braking_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="braking_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->braking_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">전기장치</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_electronic_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_electronic_cd', $key, $certificate->performance_electronic_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_electronic_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_electronic_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="electronic_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->electronic_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">휠&타이어</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_tire_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_tire_cd', $key, $certificate->performance_tire_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_tire_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_tire_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="tire_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{ $certificate->tire_comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">주행테스트</label>
                                            <div class="col-sm-10">
                                                <div class="btn-group" data-toggle="buttons">
                                                    @foreach($certificate_states as $key=>$val )
                                                        <label class="btn btn-default {{ $certificate->performance_driving_cd == $key ? 'active' : '' }}">
                                                            {{ Form::radio('performance_driving_cd', $key, $certificate->performance_driving_cd == $key) }} {{ $val }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                                @if ($errors->has('performance_driving_cd'))
                                                    <span class="text-danger">
                                            {{ $errors->first('performance_driving_cd') }}
                                        </span>
                                                @endif

                                                <textarea name="driving_comment" class="form-control"
                                                          style="height: 60px; margin-top:5px;">{{$certificate->driving_comment }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <div class="row">
                                            <label for="" class="control-label col-sm-2">특별요인(S)</label>
                                            <div class="col-sm-3 col-sm-offset-7 has-error">
                                                <div class="input-group">
                                                    <input type="text" class="form-control cert-calculate-subtotal" placeholder=""
                                                           title="" name="special_depreciation" id="special_depreciation"
                                                           value="{{ $certificate->special_depreciation }}">
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
                                                    <label class="btn btn-default {{ $certificate->special_fire_cd == 3 ? 'active' : '' }}">
                                                        {{ Form::checkbox('certificates_special_fire_cd', 3, \App\Helpers\Helper::isCheckd(3, $certificate->special_fire_cd)) }}
                                                        화재차량
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->special_fulllose_cd == 3 ? 'active' : '' }}">
                                                        {{ Form::checkbox('certificates_special_fulllose_cd', 3, \App\Helpers\Helper::isCheckd(3, $certificate->special_fulllose_cd)) }}
                                                        전손차량
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->special_remodel_cd == 3 ? 'active' : '' }}">
                                                        {{ Form::checkbox('certificates_special_remodel_cd', 3, \App\Helpers\Helper::isCheckd(3, $certificate->special_remodel_cd)) }}
                                                        불법개조
                                                    </label>
                                                    <label class="btn btn-default {{ $certificate->special_etc_cd == 3 ? 'active' : '' }}">
                                                        {{ Form::checkbox('certificates_special_etc_cd', 3, \App\Helpers\Helper::isCheckd(3, $certificate->special_etc_cd)) }}
                                                        기타요인
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">용도변경이력</label>
                                            <div class="col-sm-5">
                                                <input type="text" id="certificates_history_purpose" class="form-control"
                                                       name="certificates_history_purpose" data-role="tagsinput"
                                                       value="{{ $certificate->history_purpose }}"
                                                       style="width:100%;">
                                            </div>

                                            <div class="col-sm-3">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">최종차고지</label>
                                            <div class="col-sm-5">
                                                <input type="text" id="certificates_history_garage"
                                                       name="certificates_history_garage" class="form-control"
                                                       data-role="tagsinput"
                                                       value="{{ $certificate->history_garage }}"
                                                       style="width:100%;">
                                            </div>

                                            <div class="col-sm-3">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">보험사고이력</label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           name="certificates_history_insurance"
                                                           id="certificates_history_insurance"
                                                           value="{{ $certificate->history_insurance }}" required>
                                                    <span class="input-group-addon">건</span>
                                                </div>
                                            </div>
                                            <div class="col-md-offset-2 col-md-5 col-md-offset-2" style="margin-top: 5px;">
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
                                            <label class="control-label col-sm-2">소유자변경이력</label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                           name="certificates_history_owner" id="certificates_history_owner"
                                                           value="{{ $certificate->history_owner }}" required>
                                                    <span class="input-group-addon">건</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">

                                            </div>
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
                                                           id="valuation" value="{{ $certificate->valuation }}" required>
                                                    <span class="input-group-addon">만원</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">등급평가</label>
                                            <div class="col-sm-5 col-sm-offset-5 text-right">
                                                <div class="btn-group btn-group-lg" role="group" data-toggle="buttons">
                                                    @foreach($grades as $key=>$val )
                                                        <label class="btn btn-outline btn-danger {{ $certificate->grade == $key ? 'active' : '' }}">
                                                            {{ Form::radio('grade_state_cd', $key, \App\Helpers\Helper::isCheckd($key, $certificate->grade)) }} {{ $val }}
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
                                    <textarea name="certificates_opinion" class="form-control"
                                              style="height: 100px;">{{ $certificate ? $certificate->opinion : '' }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
@endsection

@push( 'header-script' )
    {{ Html::style(Helper::assets('vendor/tagsinput/bootstrap-tagsinput.css'), array(),  env('APP_SECURE', 'true')) }}
@endpush

@push( 'footer-script' )
    {{ Html::script(Helper::assets( 'vendor/tagsinput/bootstrap-tagsinput.min.js'), array(),  env('APP_SECURE', 'true')) }}

    <script type="text/template" id="qq-template">
@include("partials/files")
    </script>
    <link rel="stylesheet"
          href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
    <script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
    <script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
    <script type="text/template"
            id="insurance-template">@include("partials/files", ['files'=> $certificate->insurance_files])</script>

    <script type="text/javascript">
        var sum_certificate_price = function () {
            var Pst = parseInt($("#pst").val());
            var A = parseInt($('#basic_depreciation').val());
            var B = parseInt($('#history_depreciation').val());
            var C = parseInt($("#performance_depreciation").val());
            var S = parseInt($("#special_depreciation").val());
            var V = Pst + (A + B + C + S);
            return V;
        };

        $(function () {

            $(document).on('click', '.picture', function () {
                $(this).parent().find('img').css('opacity', '1');
                $(this).css('opacity', '0.2');

                $('#selecte_picture_id').val($(this).data('id'));
            });


            $(document).on('click', '#certificate-submit', function () {
                if (confirm("인증서를 저장하시겠습니까?")) {
                    $("#frm-basic").submit();
                }
            });


            $("#frm-basic").validate({
                messages: {
                    orders_car_number: "자동차 등록번호를 입력해 주세요.",
                    cars_vin_number: "차대번호를 입력해 주세요.",
//                    certificates_vin_yn_cd: "차대번호 동일성확인을 선택해 주세요.",
//                    cars_registration_date: "차량의 최초등록일을 입력해 주세요.",
//                    cars_year: "연식을 입력해 주세요.",
//                    orders_mileage: "주행거리를 km단위로 입력해 주세요. (정수값)",
//                    cars_displacement: "배기량을 입력해 주세요.",
//                    cars_engine_type: "엔진타입을 입력해 주세요.",
//                    cars_fuel_consumption: "연비를 선택해 주세요.",
//                    passenger: "승차인원을 입력해 주세요."
                },
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
                var c = confirm("인증서가 발급되면 수정이 불가능합니다. \n인증서를 발급하시겠습니까?");
                var params = $("#frm-basic").serialize();

                if (c == true) {
                    $.ajax({
                        type: 'post',
                        url: '/certificate/issue',
                        data: {
                            'params': params
                        },
                        success: function (data) {
                            if (data == 'success') {
                                alert('인증서 발급이 완료되었습니다.');
                                location.href = "/certificate";
                            }
                            else {
                                $.each(data, function (key, value) {
                                    alert(value + '\n항목을 선택 후 저장해주세요.\n저장 후 인증서를 발급하셔야 정상적으로 발급됩니다.');
                                    $('input[name=' + key + ']').parent().css('color', 'red');
                                    $('input[name=' + key + ']').focus();
                                    return false;
                                });
                            }
                        },
                        error: function (data) {
                            alert('문제가 발생하였습니다. 관리자에게 문의하세요.');
                        }
                    })
                }
            });

            $('#cars_exterior_color').change(function () {
                if ($('#cars_exterior_color').val() == 1132) {
                    $('#exterior_color_etc').css('display', '')
                } else {
                    $('#exterior_color_etc').css('display', 'none')
                }
            });

            $('#cars_fueltype_cd').change(function () {
                if ($('#cars_fueltype_cd').val() == 1106) {
                    $('#fueltype_etc').css('display', '')
                } else {
                    $('#fueltype_etc').css('display', 'none')
                }
            });
        });


        $(document).ready(function () {
            $('#plugin-attachment').fineUploader({
                debug: true,
                template: 'insurance-template',
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
                    onSubmit: function (id, fileName) {
                        this.setParams({'upfile_group': "insurance", 'upfile_group_id': "{{ $certificate->id }}"});
                    },
                    onComplete: function (id, fileName, responseJSON) {
                        if (responseJSON.success == true) {
                            $.notify(responseJSON.msg, "success");
                        } else {
                            $.notify(responseJSON.msg, "error");
                        }
                    }
                }
            });


        });
    </script>
@endpush
