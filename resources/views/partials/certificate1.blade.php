<?php
/**
 * Created by PhpStorm.
 * User: muti
 * Date: 2017. 6. 15.
 * Time: PM 5:51
 */
?>
{{--기본 정보--}}
<div class='col-md-12'>

    @if(preg_match("/technician/", Route::currentRouteName()))
        <div class="row">
            <div class="col-md-3"><h2>기본 정보</h2></div>
            <div class="col-md-9 text-right">
                <button type="button" class="btn btn-warning" id="diag-win">진단데이터 보기</button>
            </div>
        </div>
        {!! Form::model($order, ['method' => 'PATCH','route' => ['technician.order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
    @else
        <h2>기본 정보</h2>
        {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
    @endif
    <input type="hidden" name="brands_id" value="{{ $car ? $car->brands_id : '' }}">
    <input type="hidden" name="models_id" value="{{ $car ? $car->models_id : '' }}">
    <input type="hidden" name="details_id" value="{{ $car ? $car->details_id : '' }}">
    <input type="hidden" name="grades_id" value="{{ $car ? $car->grades_id : '' }}">
    <input type="hidden" name="section" value="basic">
    <table class="table table-bordered">
        <colgroup>
            <col style='width:120px;'>
            <col style='width:270px;'>
            <col style='width:120px;'>
            <col style='width:270px;'>
        </colgroup>
        <tbody>
        <tr>
            <th>자동차 등록번호</th>
            <td>
                <input type="text" class="form-control" name="orders_car_number" value="{{ $order->car_number }}"
                       required>
            </td>
            <th>주행거리(km)</th>
            <td>
                <input type="text" class="form-control" name="orders_mileage" value="{{ $order->mileage }}" required>
            </td>
        </tr>
        <tr>
            <th>차대번호</th>
            <td>
                <input type="text" class="form-control" name="cars_vin_number" placeholder="차대번호를 입력해 주세요."
                       value="{{ $car->vin_number ? $car->vin_number : '' }}" required>
            </td>
            <th>수입차 차대번호</th>
            <td>
                <input type="text" class="form-control" placeholder="수입차 차대번호를 입력해 주세요." name="car_imported_vin_number"
                       value="{{ $car->imported_vin_number ? $car->imported_vin_number : '' }}"
                       @if(!$car->imported_vin_number)
                       readonly
                        @endif
                >
            </td>
        </tr>
        <tr>
            <th>최초등록일</th>
            <td>
                <div class="input-group">
                    <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                    <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                           name="cars_registration_date"
                           value="{{ $car->registration_date ? $car->registration_date : '' }}" required>
                </div>
            </td>
            <th>사용월수</th>
            <td>
                {{--<input type="text" class="form-control" name="cars_history" value="{{ \App\Helpers\Helper::getMonthNum($car->registration_date ? $car->registration_date : '') }}" readonly>--}}
                @if($car->registration_date)
                    <input type="text" class="form-control" name="cars_history"
                           value="{{ \App\Helpers\Helper::getMonthNum($car->registration_date) }}" readonly>
                @else
                    <input type="text" class="form-control" name="cars_history" value="최초등록시 입력됩니다." readonly>
                @endif
            </td>
        </tr>

        <tr>
            <th>기준가격(Pst)</th>
            <td>
                <div class="input-group"><input type="text" class="form-control" name="pst" id="pst"
                                                value="{{ $order->certificates ? $order->certificates->price : '' }}"
                                                required><span class="input-group-addon">만원</span></div>
            </td>
            <th>차대번호 동일성확인</th>
            <td>
                {{--todo 차대번호 동일성 부분에 대한 필드는 code의 yes/no를 가지고 온다. 단, 해당 필드부분을 다시 확인해야 함. 또한, 사진도 있어야 한다.--}}
                {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, [$order->certificates->vin_yn_cd], ['class' =>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>소유자 이력</th>
            <td>
                <div class="input-group"><input type="text" class="form-control" name="certificates_history_owner"
                                                value="{{ $order->certificates ? $order->certificates->history_owner : '' }}"
                                                required><span class="input-group-addon">명</span></div>
            </td>
            <th>정비 이력</th>
            <td colspan="3">
                <div class="input-group"><input type="text" class="form-control" name="certificates_history_maintance"
                                                value="{{ $order->certificates ? $order->certificates->history_maintance : '' }}"
                                                required><span class="input-group-addon">번</span></div>
            </td>
        </tr>


        <tr>
            <th>차명</th>
            <td>
                <input type="text" class="form-control" name="detail_name"
                       value="{{ \App\Helpers\Helper::getCarModel($car) }}" readonly>
            </td>
            <th>세부모델</th>
            <td>
                <input type="text" class="form-control" name="model_name" value="{{ $car->detail->name }}" readonly>
            </td>
        </tr>

        <tr>
            <th>차종</th>
            <td>
                {{--<input type="text" class="form-control" name="kind_cd" value="" placeholder="ex) SUV, 중형, 소형...">--}}
                {!! Form::select('kind_cd', $kinds, [$car->kind_cd ? $car->kind_cd : ''], ['class'=>'form-control', 'required']) !!}
            </td>
            <th>승차인원</th>
            <td>
                <input type="text" class="form-control" name="passenger"
                       value="{{ $car->passenger ? $car->passenger : '' }}" placeholder="">
            </td>
        </tr>


        <tr>
            <th>외부색상</th>
            <td colspan="1">
                {!! Form::select('cars_exterior_color', $select_color, [$car->exterior_color_cd ? $car->exterior_color_cd : ''], ['class'=>'form-control', 'required']) !!}
            </td>
            <th>내부색상</th>
            <td>{!! Form::select('cars_interior_color', $select_color, [$car->interior_color_cd ? $car->interior_color_cd : ''], ['class'=>'form-control', 'required']) !!}</td>
        </tr>
        <tr>
            <th>연식 (형식)</th>
            <td>
                <input type="text" class="form-control" name="cars_year" value="{{ $car->year ? $car->year : '' }}"
                       required>
            </td>
            <th>변속기</th>
            <td>
                {!! Form::select('cars_transmission_cd', $select_transmission, [$car->transmission_cd ? $car->transmission_cd : ''], ['class'=>'form-control', 'required']) !!}
            </td>
        </tr>
        <tr>
            <th>엔진타입</th>
            <td>
                <input type="text" class="form-control" name="cars_engine_type"
                       value="{{ $car->engine_type ? $car->engine_type : '' }}">
            </td>
            <th>사용연료</th>
            <td>
                {!! Form::select('cars_fueltype_cd', $select_fueltype, [$car->fueltype_cd ? $car->fueltype_cd : '' ], ['class' => 'form-control', 'required']) !!}
            </td>
        </tr>
        <tr>
            <th>배기량 (cc)</th>
            <td>
                <input type="text" class="form-control" name="cars_displacement"
                       value="{{ $car->displacement ? $car->displacement : ''}}" required>
            </td>
            <th>연비</th>
            <td>
                <div class="input-group"><input type="text" class="form-control" name="cars_fuel_consumption"
                                                value="{{ $car->fuel_consumption ? $car->fuel_consumption : '' }}"
                                                required><span class="input-group-addon">km</span></div>
            </td>
        </tr>
        </tbody>
    </table>


    <div class="text-right">
        <button class="btn btn-primary text-right" type="submit"{{ ($order->status_cd == 109)? ' disabled': '' }}>저장
        </button>
    </div>
    {!! Form::close() !!}
</div>

@if($order->certificates->orders_id)
    {{--이력 정보--}}
    <div class='col-md-12'>
        <h2>이력 정보</h2>

        @if(preg_match("/technician/", Route::currentRouteName()))
            {!! Form::model($order, ['method' => 'PATCH','route' => ['technician.order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
        @else
            {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-history', 'enctype'=>"multipart/form-data"]) !!}
        @endif
        <input type="hidden" name="section" value="history">
        <input type="hidden" name="certificates_insurance_file" id="certificates_insurance_file">
        <table class="table table-bordered">
            <colgroup>
                <col style='width:175px;'>
                {{--<col style='width:200px;'>--}}
                {{--<col style='width:120px;'>--}}
                {{--<col style='width:270px;'>--}}
            </colgroup>
            <tbody>
            <tr>
                <th>보험사고 이력 건수</th>
                <td>
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_history_insurance" placeholder="보험이력건수를 입력해 주세요"
                                                    value="{{ $order->certificates->history_insurance }}" required><span
                                class="input-group-addon">건</span></div>
                </td>
                <th>보험사고 이력 파일</th>
                <td>
                    <button class="btn btn-info" type="button"
                            id="insurance-upload"{{ ($order->status_cd == 109)? ' disabled': '' }}>사고이력 이미지
                    </button>
                </td>
            </tr>
            <tr>
                <th>용도변경이력</th>
                <td colspan="3">
                    <ul id="history_purpose">
                        @if($order->certificates->history_purpose)
                            @foreach(json_decode($order->certificates->history_purpose, true) as $garage_row)
                                <li>{{ $garage_row }}</li>
                            @endforeach
                        @else
                            <li><strong class="text-danger">용도변경 이력이 없습니다.</strong></li>
                        @endif
                    </ul>

                    <div class="input-group">
                        <input type="text" name="certificates_history_purpose" class="form-control"
                               id="certificates_history_purpose" placeholder="용도변경 정보를 입력해주세요.">
                        <span class="input-group-btn">
                                                                                        <button class="btn btn-info"
                                                                                                type="button"
                                                                                                id="history_purpose_add"{{ ($order->status_cd == 109)? ' disabled': '' }}>용도변경 이력 추가</button>
                                                                                </span>
                    </div>


                </td>
            </tr>
            <tr>
                <th>차고지 이력</th>
                <td colspan="3">

                    <ul id="history_garage">
                        @if($order->certificates->history_garage)
                            @foreach(json_decode($order->certificates->history_garage, true) as $key => $garage_row)
                                <li>{{ $garage_row }}</li>
                            @endforeach
                        @else
                            <li><strong class="text-danger">차고지 이력이 없습니다.</strong></li>
                        @endif
                    </ul>


                    <div class="input-group">
                        <input type="text" name="certificates_history_garage" class="form-control"
                               id="certificates_history_garage" placeholder="차고지 주소 및 정보를 입력해주세요.">
                        <span class="input-group-btn">
                                                                                        <button class="btn btn-info"
                                                                                                type="button"
                                                                                                id="history_garage_add"{{ ($order->status_cd == 109)? ' disabled': '' }}>차고지 이력 추가</button>
                                                                                </span>
                    </div>

                </td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class='col-md-12'>
        <h2>가격 산정</h2>

        {!! Form::model($order, ['method' => 'PATCH','url' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-price', 'enctype'=>"multipart/form-data"]) !!}
        <input type="hidden" name="section" value="price">
        <table class="table table-bordered">
            <colgroup>
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <col width="25%">

            </colgroup>
            <tbody>
            <tr>
                <th>기준가격(Pst)</th>
                <td>
                    <div class="input-group"><input type="text" class="form-control" name="pst" id="pst"
                                                    value="{{ $order->certificates ? $order->certificates->price : '' }}"><span
                                class="input-group-addon">만원</span></div>
                </td>

                <th>
                    신차출고가격
                </th>
                <td>
                    <label for=""
                           class="radio-inline">{{ Form::radio('certificates_vat', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->vat), ['required']) }}
                        부가세 포함</label>
                    <label for=""
                           class="radio-inline">{{ Form::radio('certificates_vat', 4, \App\Helpers\Helper::isCheckd(4, $order->certificates->vat), ['required']) }}
                        부가세 제외</label>

                    <div class="input-group"><input type="text" name="certificates_new_car_price" id="new_car_price"
                                                    value="{{ $order->certificates ? $order->certificates->new_car_price : '' }}"
                                                    class="form-control" required="required"><span
                                class="input-group-addon">만원</span></div>
                </td>

            </tr>
            <tr>
                <td>
                    등록일 보정(+)
                </td>
                <td colspan="3">
                    {{ Form::radio('certificates_basic_registraion', 1283, \App\Helpers\Helper::isCheckd(1283, $order->certificates->basic_registraion), ['required']) }}
                    표준 &nbsp;&nbsp;&nbsp;
                    {{ Form::radio('certificates_basic_registraion', 1282, \App\Helpers\Helper::isCheckd(1282, $order->certificates->basic_registraion), ['required']) }}
                    초과 &nbsp;&nbsp;&nbsp;
                    {{ Form::radio('certificates_basic_registraion', 1284, \App\Helpers\Helper::isCheckd(1284, $order->certificates->basic_registraion), ['required']) }}
                    미달

                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_basic_registraion_depreciation"
                                                    id="basic_registraion_depreciation"
                                                    value="{{ $order->certificates ? $order->certificates->basic_registraion_depreciation : '' }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    장착품(추가옵션)
                </td>
                <td colspan="3">
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_basic_mounting_cd" id="basic_mounting_cd"
                                                    value="{{ $order->certificates ? $order->certificates->basic_mounting_cd : '' }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>
            <tr>
                <td>
                    색상 등 기타
                </td>
                <td colspan="3">
                    <div class="input-group"><input type="text" class="form-control" name="certificates_basic_etc"
                                                    id="basic_etc"
                                                    value="{{ $order->certificates ? $order->certificates->basic_etc : '' }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>

            <tr>
                <th rowspan="3">사용이력(B)</th>
                <td>
                    주행거리 (+)

                </td>
                <td>
                    {{ Form::radio('certificates_usage_mileage_cd', 1283, \App\Helpers\Helper::isCheckd(1283, $order->certificates->usage_mileage_cd), ['required']) }}
                    표준 &nbsp;&nbsp;&nbsp;
                    {{ Form::radio('certificates_usage_mileage_cd', 1282, \App\Helpers\Helper::isCheckd(1282, $order->certificates->usage_mileage_cd), ['required']) }}
                    초과 &nbsp;&nbsp;&nbsp;
                    {{ Form::radio('certificates_usage_mileage_cd', 1284, \App\Helpers\Helper::isCheckd(1284, $order->certificates->usage_mileage_cd), ['required']) }}
                    미달
                </td>
                <td>
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_usage_mileage_depreciation"
                                                    id="usage_mileage_depreciation"
                                                    value="{{ $order->certificates ? $order->certificates->usage_mileage_depreciation : 0 }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    사고/수리이력
                </td>
                <td colspan="2">
                    {{--todo 현재 usage_history_cd 필드가 int로 되어 있다. 이부분을 varchar로 변경하거나 각 옵션값을 필드로 가지고 있어야 한다--}}
                    사고이력 없음 {{ Form::radio('certificates_usage_history_cd', 1285, \App\Helpers\Helper::isCheckd(1285, $order->certificates->usage_history_cd), ['required']) }}
                    &nbsp;&nbsp;&nbsp;
                    단순수리 {{ Form::radio('certificates_usage_history_cd', 1286, \App\Helpers\Helper::isCheckd(1286, $order->certificates->usage_history_cd), ['required']) }}
                    &nbsp;&nbsp;&nbsp;
                    기본차체판금 {{ Form::radio('certificates_usage_history_cd', 1287, \App\Helpers\Helper::isCheckd(1287, $order->certificates->usage_history_cd), ['required']) }}
                    &nbsp;&nbsp;&nbsp;
                    기본차체교환/골격수리 {{ Form::radio('certificates_usage_history_cd', 1288, \App\Helpers\Helper::isCheckd(1288, $order->certificates->usage_history_cd), ['required']) }}
                </td>
            </tr>
            <tr>
                <td>감가금액</td>
                <td>
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_usage_history_depreciation"
                                                    id="usage_history_depreciation"
                                                    value="{{ $order->certificates ? $order->certificates->usage_history_depreciation : 0 }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>
            <th rowspan="18">차량 성능 상태(C)</th>
            {{-- 첫번쨰 줄 --}}
            <tr>
                <td>
                    주요외판
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_exterior_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_exterior_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="exterior_comment">{{ $order->certificates ? $order->certificates->exterior_comment : "" }}</textarea>
                </td>

            </tr>
            <tr>
                <td>
                    침수흔적 점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_flooded_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_flooded_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="flooded_comment">{{ $order->certificates ? $order->certificates->flooded_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    소모품상태점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_consumption_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_consumption_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="consumption_comment">{{ $order->certificates ? $order->certificates->consumption_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    고장진단
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_broken_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_broken_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="broken_comment">{{ $order->certificates ? $order->certificates->broken_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    동력전달
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_powor_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_powor_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="power_comment">{{ $order->certificates ? $order->certificates->power_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    전기
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_electronic_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_electronic_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="electronic_comment">{{ $order->certificates ? $order->certificates->electronic_comment : "" }}</textarea>
                </td>
            </tr>
            {{-- 2번째 줄 --}}
            <tr>
                <td>
                    주요내판
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_interior_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_interior_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="interior_comment">{{ $order->certificates ? $order->certificates->interior_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    차량외판점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_exteriortest_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_exteriortest_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="exteriortest_comment">{{ $order->certificates ? $order->certificates->exteriortest_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    전장품유리기어/작동상태점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_plugin_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_plugin_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="plugin_comment">{{ $order->certificates ? $order->certificates->plugin_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    엔진(원동기)
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_engine_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_engine_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="engine_comment">{{ $order->certificates ? $order->certificates->engine_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    조향장치
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_steering_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_steering_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="steering_comment">{{ $order->certificates ? $order->certificates->steering_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    타이어
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_tire_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_tire_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="tire_comment">{{ $order->certificates ? $order->certificates->tire_comment : "" }}</textarea>
                </td>
            </tr>
            {{-- 세번째 줄 --}}
            <tr>
                <td>
                    사고유무점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_accident_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_accident_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="accident_comment">{{ $order->certificates ? $order->certificates->accident_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    차량실내점검
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_interiortest_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_interiortest_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="interiortest_comment">{{ $order->certificates ? $order->certificates->interiortest_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    주행테스트
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_driving_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_driving_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="driving_comment">{{ $order->certificates ? $order->certificates->driving_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    변속기
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_transmission_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_transmission_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="transmission_comment">{{ $order->certificates ? $order->certificates->transmission_comment : "" }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    제동장치
                </td>
                <td colspan="2">
                    @foreach($certificate_states as $key=>$val )
                        {{ $val }} {{ Form::radio('performance_braking_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->performance_braking_cd), ['required']) }}
                    @endforeach
                    <textarea class="form-control" rows="2"
                              name="braking_comment">{{ $order->certificates ? $order->certificates->braking_comment : "" }}</textarea>
                </td>
            </tr>


            <tr>
                <td>감가금액</td>
                <td colspan="2">
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_performance_depreciation"
                                                    id="performance_depreciation"
                                                    value="{{ $order->certificates? $order->certificates->performance_depreciation : '' }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>

            <tr>
                <th rowspan="3">특별요인(S)</th>
                <td colspan="3">
                    {{ Form::checkbox('certificates_special_flooded_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_flooded_cd)) }}
                    침수차량&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('certificates_special_fire_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fire_cd)) }}
                    화재차량&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('certificates_special_fulllose_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fulllose_cd)) }}
                    전손차량&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('certificates_special_remodel_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_remodel_cd)) }}
                    불법개조&nbsp;&nbsp;&nbsp;
                    {{ Form::checkbox('certificates_special_etc_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_etc_cd)) }}
                    기타요인&nbsp;&nbsp;&nbsp;
                </td>

            </tr>
            <tr>
                <td>
                    변경이력
                </td>
                <td>
                    @if($order->certificates)
                        <ul>
                            @if($order->certificates->history_purpose)
                                @foreach(json_decode($order->certificates->history_purpose, true) as $garage_row)
                                    <li>{{ $garage_row }}</li>
                                @endforeach
                            @else
                                <li><strong class="text-danger">용도변경 이력이 없습니다.</strong></li>
                            @endif
                        </ul>
                    @else
                        <p><strong class="text-danger">용도변경 이력이 없습니다.</strong></p>
                    @endif

                </td>
            </tr>
            <tr>
                <td>감가금액</td>
                <td colspan="2">
                    <div class="input-group"><input type="text" class="form-control"
                                                    name="certificates_special_depreciation" id="special_depreciation"
                                                    value="{{ $order->certificates ? $order->certificates->special_depreciation : 0 }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>
            </tr>

            <tr>
                <th>평가금액</th>
                {{--<td>V=Pst+(A+B+C+S)</td>--}}
                <td>
                    <div class="input-group"><input type="text" class="form-control" name="certificates_valuation"
                                                    id="valuation"
                                                    value="{{ $order->certificates ? $order->certificates->valuation : '' }}"
                                                    required="required"><span class="input-group-addon">만원</span></div>
                </td>

                <th>
                    차량등급평가
                </th>
                <td>
                    <div class="input-group">
                        {!! Form::select('grade',$grades, [$order->certificates->grade ? $order->certificates->grade : ''], ['class'=>'form-control']) !!}
                        <span class="input-group-addon">등급</span>
                    </div>
                </td>
            </tr>

            <tr>
                <th>종합 의견</th>
                <td colspan="3">
                                                                                                                                                        <textarea
                                                                                                                                                                name="certificates_opinion"
                                                                                                                                                                class="form-control"
                                                                                                                                                                required="required"
                                                                                                                                                                style="height: 300px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="text-right">
            @if($order->status_cd != 109)
            <button class="btn btn-primary text-right"
            type="submit"{{ ($order->status_cd == 109)? ' disabled': '' }}>저장
            </button>
            @endif
            <button class="btn btn-primary text-right" type="button"
            {{ ($order->status_cd == 109)? ' disabled': '' }} id="issue" data-id="{{ $order->id }}">인증서 발급
            </button>

            <button class="btn btn-primary text-right"
                    type="submit" {{ ($order->status_cd == 109)? ' disabled': '' }}>저장
            </button>

            {{--@if($order->status_cd >= 107 && $order->status_cd <= 108)--}}
            {{--<a href="{{ route('technician.order.edit', $order->id) }}" class="btn btn-info"--}}
            {{--style="margin-left: 15px;">인증서 수정하기</a>--}}
            {{--@endif--}}
            @if($order->status_cd >= 108)
                <a href="#" class="btn btn-warning"
                   style="margin-left: 15px;" id="preview" data-id="{{ $order->id }}">인증서 미리보기</a>
            @endif
        </div>
        {!! Form::close() !!}
    </div>

    {{-- 사고이력 이미지 업로드 model --}}
    <div class="modal fade bs-example-modal-lg in purchase-modal" id="insurance-modal" tabindex="-1" role="dialog"
         aria-labelledby="insurance-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">보험 사고이력 이미지</h4>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="javascript:void(0);" class="thumbnail" id="insurance-win">
                                    <img src="{{ $order->certificates->history_insurance_file ? '/order/insurance-file-view/'.$order->id : '' }}"
                                         id="history_insurance_src">
                                </a>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>보험사고이력 파일 첨부</th>
                            <td>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="insurance_file">
                                    <span class="input-group-btn">
                                                                                                                                                                                        <button class="btn btn-info"
                                                                                                                                                                                                type="button"
                                                                                                                                                                                                id="insurance_file_upload">사고이력 이미지 업로드</button>
                                                                                                                                                                                </span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="purchase-modal-close">닫기
                    </button>
                </div>
            </div>
        </div>
    </div>

@else
    <div class="col-md-11 col-md-push-1">
        <p class="label label-danger fa-2x">인증서 기본내역에 대한 작성을 완료해 주세요.</p>
    </div>
@endif

@push( 'header-script' )
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}"/>
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}"/>
@endpush


@push( 'footer-script' )
<script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>

<script type="text/template" id="qq-template">@include("partials/files", [])</script>
<link rel="stylesheet"
      href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}"/>
<script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/post.js' ) }}"></script>

<script type="text/javascript">
    $(function () {
        //기본정보 수정
        $("#frm-basic").validate({
            messages: {
                orders_car_number: "자동차 등록번호를 입력해 주세요.",
                orders_mileage: "주행거리를 km단위로 입력해 주세요. (정수값)",
                cars_vin_number: "차대번호를 입력해 주세요.",
                certificates_vin_yn_cd: "차대번호 동일성확인을 선택해 주세요.",
                cars_registration_date: "차량의 최초등록일을 입력해 주세요.",
                cars_transmission_cd: "변속기 타입을 선택해주세요.",
                cars_exterior_color: "차량 외부 색상을 선택해 주세요.",
                cars_interior_color: "차량 내부 색상을 선택해 주세요.",
                cars_year: "연식을 입력해 주세요.",
                cars_displacement: "배기량을 입력해 주세요.",
                cars_fuel_consumption: "연비를 선택해 주세요.",
                cars_exterior_color_cd: "외부색상을 선택해 주세요.",
                cars_interior_color_cd: "내부색상을 선택해 주세요.",
                cars_fueltype_cd: "엔진타입을 입력해 주세요.",
                certificates_history_owner: "소유자 이력을 입력해 주세요.(기본 1)",
                certificates_history_maintance: "정비이력을 입력해 주세요.",
                pst: "기존가격을 입력해 주세요."
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        //보험 사고이력 업로드
        $("#insurance_file_upload").on("click", function (event) {
            event.preventDefault();

            var img_file = $("#insurance_file")[0].files[0];

            var insurance_formData = new FormData();
            insurance_formData.append("insurance_file", img_file);
            insurance_formData.append("id", "{{ $order->id }}");
            insurance_formData.append("_token", "{{ csrf_token() }}");
            console.log(insurance_formData);
            $.ajax({
                url: "/order/insurance-file",
                data: insurance_formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function (jdata) {
                    if (jdata.success == true) {
                        var img_url = jdata.img_path;
                        $("#history_insurance_src").attr("src", img_url);
                    } else {
                        alert(jdata.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('사고이력 이미지 업로드를 실패하였습니다.');
                }
            });
        });

        $("#insurance-win").on("click", function () {
            $("#insurance-modal").modal('toggle');
            window.open($("#history_insurance_src").attr("src"));
        });

        //이력정보 수정
        $("#frm-history").validate({
            messages: {
                certificates_history_insurance: "보험사고 이력건수를 입력해 주세요.",
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        //가격산정 수정
        $("#frm-price").validate({
            messages: {
                certificates_vat: "부가세 포함여부를 선택해 주세요.",
                certificates_new_car_price: "신차출고가격을 입력해 주세요.",
                certificates_basic_registraion: "등록일 보정을 선택해 주세요.",
                certificates_basic_registraion_depreciation: "등록일 보정 평가액을 선택해 주세요.",
                certificates_basic_mounting_cd: "장착품(추가옵션) 감가금액을 입력해 주세요.",
                certificates_basic_etc: "색상 등 기타 감가금액을 입력해 주세요.",
                certificates_usage_mileage_cd: "주행거리를 선택해 주세요.",
                certificates_usage_mileage_depreciation: "주행거리 감가금액을 입력해 주세요.",
                certificates_usage_history_cd: "사고/수리 이력을 선택해 주세요.",
                certificates_usage_history_depreciation: "사고/수리 감가금액을 입력해 주세요.",
                certificates_performance_tire_cd: "휠/타이어 상택를 선택해 주세요.",
                certificates_performance_exterior_cd: "외관(외장)을 선택해 주세요.",
                certificates_performance_interior_cd: "실내(내장)을 선택해 주세요.",
                certificates_performance_device_cd: "주요장치/성능을 선택해 주세요.",
                certificates_performance_depreciation: "차량성능 감가금액을 입력해 주세요.",
                certificates_special_flooded_cd: "특별요인을 선택해 주세요.",
                certificates_special_depreciation: "특별요일 감가금액을 입력해 주세요.",
                certificates_valuation: "평가금액을 정확히 입력해 주세요.",
                certificates_opinion: "종합의견을 입력해 주세요."

            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        //todo 사고이력 이미지 업로드 테스트. 업로드는 되나 thumbnail이 에러나고 데이터 갱신이 처리 안됨.
        $("#insurance-upload").on("click", function () {
            $("#insurance-modal").modal();
        });


        //변경이력 form 초기화
        $("#history-modal-close").on("hide.bs.modal", function () {
            $("#history-method").val('');
            $("#history-data").val('');
        });

        // 용도변경 이력 추가
        $("#history_purpose_add").on("click", function () {
            if ($("#certificates_history_purpose").val()) {
                history_data("history_purpose", $("#certificates_history_purpose").val());
            } else {
                alert('용도변경 이력 내용을 입력해 주세요.');
                $("#certificates_history_purpose").focus();
            }

        });

        // 차고지 이력 추가
        $("#history_garage_add").on("click", function () {
            if ($("#certificates_history_garage").val()) {
                history_data("history_garage", $("#certificates_history_garage").val());
            } else {
                alert("차고지 이력 정보를 입력해 주세요.");
                $("#certificates_history_garage").focus();
            }

        });

        $("#valuation").on("click", function () {
            if (confirm("평가금액을 계산하시겠습니까?")) {
                var valuation = sum_certificate_price();

                if (!isNaN(valuation)) {
                    $("#valuation").val(valuation);
                } else {
                    alert('평가금액 계산을 위해 금액을 정확히 입력해 주세요.')
                }
            } else {
                $("#valuation").focus();
            }

        });

        //금액부문 전체 선택
        //        $("input[type='text']").on("click", function () {
        //            $(this).select();
        //        });


        //진단데이터 윈도우
        $("#diag-win").on("click", function () {
            //todo 진단데이터 윈도우 띄움.
            var diagnoses_win = window.open("{{ url("order/diagnoses", ["id" => $order->id]) }}", "diagnoses", "location=no,resize=auto,width=998,height=1024,scrollbars = yes");
            diagnoses_win.focus();
        });

        $("#issue").click(function () {
            var id = $(this).data('id');
            var c = confirm("인증서가 발급되면 수정이 불가능합니다. \n인증서를 발급하시겠습니까?");
            if (c == true) {
                $.ajax({
                    'type': 'post',
                    'url': '/order/issue',
                    data: {
                        'order_id': id
                    },
                    success: function (data) {
                        alert('인증서 발급이 완료되었습니다.');
                        location.href = "{{ url('/order/'.$order->id ) }}";
                    },
                    error: function (data) {
                        alert(data);
                    }
                })
            }

        });


        $('#preview').click(function () {
            var order_id = $(this).data('id');
            window.open('/certificate/' + order_id + '/summary', "", "width=1400, height=1400");
        });

    });

    var history_data = function (method, input_data) {
        $.ajax({
            url: "/order/history",
            data: {
                "_token": "{{ csrf_token() }}", "id": "{{ $order->id }}", "method": method, "data": input_data
            },
            type: "POST",
            success: function (jdata) {
                var success = jdata.success;
                var msg = jdata.msg;
                var data = jdata.data;
                if (success == true) {
                    $("#" + method + " > li").remove(); // 기존 데이터 삭제
                    $.each(data, function (key, row) {
                        $("#" + method).after("<li>" + row + "</li>");
                    });

                    $("#certificates_" + method).val('');

                } else {
                    //갱신 실패
                    alert(msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('이력 정보 처리를 실패하였습니다.');
            }

        });
    };

    var sum_certificate_price = function () {
        var Pst = parseInt($("#pst").val());
        var A = parseInt($("#basic_registraion_depreciation").val())
            + parseInt($("#basic_mounting_cd").val()) + parseInt($("#basic_etc").val());
        var B = parseInt($("#usage_mileage_depreciation").val()) + parseInt($("#usage_history_depreciation").val());
        var C = parseInt($("#performance_depreciation").val());
        var S = parseInt($("#special_depreciation").val());

        var V = Pst + (A + B + C + S);
        return V;
    }
</script>
@endpush
