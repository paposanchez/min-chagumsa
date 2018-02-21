<div class="col-md-4">
    <div class="block">
        <h4 id="dia-top">기본정보</h4>

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
                {!! Form::select('cars_exterior_color', $select_color, [], ['class'=>'form-control etc_sel', 'id'=>'cars_exterior_color', 'data-target' => '#etc_color', 'required']) !!}

                @if ($errors->has('cars_exterior_color'))
                <span class="help-block">
                                                        {{ $errors->first('cars_exterior_color') }}
                                                </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('car_exterior_color_etc') ? 'has-error' : '' }} hidden" id="etc_color">
            <label for="inputSubject"
                   class="control-label col-md-2">외부 기타 색상</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="car_exterior_color_etc"
                       value="">
                @if ($errors->has('car_exterior_color_etc'))
                <span class="help-block">
                                    {{ $errors->first('car_exterior_color_etc') }}
                                    </span>
                @endif
            </div>
        </div>

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

                {!! Form::select('cars_fueltype_cd', $select_fueltype, [], ['class' => 'form-control etc_sel', 'id' => 'cars_fueltype_cd', 'data-target' => '#etc_fueltype', 'required']) !!}

                @if ($errors->has('cars_fueltype_cd'))
                <span class="help-block">
                                                        {{ $errors->first('cars_fueltype_cd') }}
                                                </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('car_fueltype_etc') ? 'has-error' : '' }} hidden" id="etc_fueltype">
            <label for="inputSubject"
                   class="control-label col-md-2">기타 연료</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="car_fueltype_etc"
                       value="">
                @if ($errors->has('car_fueltype_etc'))
                <span class="help-block">
                                    {{ $errors->first('car_fueltype_etc') }}
                                    </span>
                @endif
            </div>
        </div>
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