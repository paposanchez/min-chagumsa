{{-- car_basic_info --}}

<h4 id="dia-top">기본정보</h4>

<div class="form-group {{ $errors->has('vin_number') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">차대번호</label>
    <div class="col-md-8">
        <input type="text" class="form-control" placeholder="차대번호를 입력해주세요."
               name="vin_number" id="vinNumber" required
               value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->cars_id : old('vin_number')}}">
        @if ($errors->has('vin_number'))
            <span class="help-block">
                        {{ $errors->first('vin_number') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('mileage') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">주행거리</label>
    <div class="col-md-8">
        <input type="text" class="form-control" placeholder="주행거리를 입력해주세요."
               name="mileage" id="mileageInput" required
               value="{{ $diagnosis->carNumber ? $diagnosis->mileage : old('mileage') }}">
        @if ($errors->has('mileage'))
            <span class="help-block">
                        {{ $errors->first('mileage') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('certificates_vin_yn_cd') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">차대번호 동일성확인</label>
    <div class="col-md-8">
        {!! Form::select('certificates_vin_yn_cd', $select_vin_yn, $diagnosis->carNumber ? $diagnosis->carNumber->car->certificates_vin_yn_cd : '', ['class' =>'form-control']) !!}

        @if ($errors->has('certificates_vin_yn_cd'))
            <span class="help-block">
                        {{ $errors->first('certificates_vin_yn_cd') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('cars_registration_date') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">최초등록일</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="text" class="form-control date-picker"
                   data-format="YYYY-MM-DD"
                   name="cars_registration_date"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->registration_date : old('cars_registration_date') }}"
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
           class="control-label col-md-4">연식(형식)</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="text" class="form-control" name="cars_year"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->year : old('cars_year') }}" required>
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
           class="control-label col-md-4">차종</label>
    <div class="col-md-8">
        {!! Form::select('kind_cd', $kinds, $diagnosis->carNumber ? $diagnosis->carNumber->car->kind_ce : '', ['class'=>'form-control']) !!}

        @if ($errors->has('kind_cd'))
            <span class="help-block">
                        {{ $errors->first('kind_cd') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('cars_displacement') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">배기량</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="text" class="form-control" name="cars_displacement"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->displacement : old('cars_displacement') }}" required>
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
           class="control-label col-md-4">외부색상</label>
    <div class="col-md-8">
        {!! Form::select('cars_exterior_color', $select_color, $diagnosis->carNumber ? $diagnosis->carNumber->car->car_exterior_color : '', ['class'=>'form-control etc_sel', 'id'=>'cars_exterior_color', 'data-target' => '#etc_color', 'required']) !!}

        @if ($errors->has('cars_exterior_color'))
            <span class="help-block">
                        {{ $errors->first('cars_exterior_color') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('car_exterior_color_etc') ? 'has-error' : '' }} hidden" id="etc_color">
    <label for="inputSubject"
           class="control-label col-md-4">외부 기타 색상</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="car_exterior_color_etc"
               value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->car_exterior_color_etc : old('car_exterior_color_etc') }}">
        @if ($errors->has('car_exterior_color_etc'))
            <span class="help-block">
                        {{ $errors->first('car_exterior_color_etc') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('cars_transmission_cd') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">변속기</label>
    <div class="col-md-8">
        {!! Form::select('cars_transmission_cd', $select_transmission, $diagnosis->carNumber ? $diagnosis->carNumber->car->cars_transmission_cd : '', ['class'=>'form-control', 'required']) !!}

        @if ($errors->has('cars_transmission_cd'))
            <span class="help-block">
                        {{ $errors->first('cars_transmission_cd') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('cars_fueltype_cd') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">사용연료</label>
    <div class="col-md-8">

        {!! Form::select('cars_fueltype_cd', $select_fueltype, $diagnosis->carNumber ? $diagnosis->carNumber->car->cars_fueltype_cd : '', ['class' => 'form-control etc_sel', 'id' => 'cars_fueltype_cd', 'data-target' => '#etc_fueltype', 'required']) !!}

        @if ($errors->has('cars_fueltype_cd'))
            <span class="help-block">
                        {{ $errors->first('cars_fueltype_cd') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('car_fueltype_etc') ? 'has-error' : '' }} hidden" id="etc_fueltype">
    <label for="inputSubject"
           class="control-label col-md-4">기타 연료</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="car_fueltype_etc"
               value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->car_fueltype_etc : old('car_fueltype_etc') }}">
        @if ($errors->has('car_fueltype_etc'))
            <span class="help-block">
                        {{ $errors->first('car_fueltype_etc') }}
                </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('passenger') ? 'has-error' : '' }}">
    <label for="inputSubject"
           class="control-label col-md-4">승차인원</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="text" class="form-control" name="passenger"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->passenger : old('passenger') }}" placeholder="" required>
            <span class="input-group-addon">명</span>
        </div>
        @if ($errors->has('passenger'))
            <span class="help-block">
                        {{ $errors->first('passenger') }}
                </span>
        @endif
    </div>
</div>

{{--------------------------------- 이력정보 -------------------------------------}}
<h4 id="dia-top">이력정보</h4>

<div class="form-group {{ $errors->has('history_change') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">용도이력변경</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="history_change"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->history_change : old('history_change') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>


        @if ($errors->has('history_change'))
            <span class="help-block">
                        {{ $errors->first('history_change') }}
                </span>
        @endif
    </div>
</div>

<h6 id="dia-top">차량번호/소유자변경</h6>

<div class="form-group {{ $errors->has('car_number_chagne') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">차량번호변경</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="car_number_change"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->car_number_change : old('car_number_change') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>


        @if ($errors->has('car_number_chagne'))
            <span class="help-block">
                        {{ $errors->first('car_number_chagne') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('owner_change') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">소유자변경</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="owner_change"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->owner_change : old('owner_change') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('owner_change'))
            <span class="help-block">
                        {{ $errors->first('owner_change') }}
                </span>
        @endif
    </div>
</div>

<h6 id="dia-top">특수사고이력</h6>

<div class="form-group {{ $errors->has('total_loss_count') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">전손</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="total_loss_count"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->total_loss_count : old('total_loss_count') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('total_loss_count'))
            <span class="help-block">
                        {{ $errors->first('total_loss_count') }}
                </span>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('theft_count') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">도난</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="theft_count"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->theft_count : old('theft_count') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('theft_count'))
            <span class="help-block">
                        {{ $errors->first('theft_count') }}
                </span>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('flood_count') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">침수</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="flood_count"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->flood_count : old('flood_count') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('flood_count'))
            <span class="help-block">
                        {{ $errors->first('flood_count') }}
                </span>
        @endif
    </div>
</div>

<h6 id="dia-top">특수사고이력</h6>

<div class="form-group {{ $errors->has('self_damage_count') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">내차피해</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="self_damage_count"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->self_damage_count : old('self_damage_count') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('self_damage_count'))
            <span class="help-block">
                        {{ $errors->first('self_damage_count') }}
                </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('damaged_count') ? 'has-error' : '' }}">
    <label for=""
           class="control-label col-md-4">타차가해</label>
    <div class="col-md-8">
        <div class="input-group">
            <input type="number" class="form-control" name="damaged_count"
                   value="{{ $diagnosis->carNumber ? $diagnosis->carNumber->car->damaged_count : old('damaged_count') }}" placeholder="" required>
            <span class="input-group-addon">회</span>
        </div>

        @if ($errors->has('damaged_count'))
            <span class="help-block">
                        {{ $errors->first('damaged_count') }}
                </span>
        @endif
    </div>
</div>

<h4 id="dia-top">종합의견</h4>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <div class="col-md-12">
            <textarea name="comment" class="form-control"
                      placeholder="음성파일 내용을 입력해주세요.">{{ $diagnosis->carNumber ? $diagnosis->opinion : old('comment') }}</textarea>

        @if ($errors->has('comment'))
            <span class="help-block">
                        {{ $errors->first('comment') }}
                </span>
        @endif
    </div>
</div>

