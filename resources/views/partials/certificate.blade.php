
{{--<div class="panel panel-default">--}}

        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">신차출고가격</label>--}}
                        {{--<div class="col-sm-3 col-sm-offset-7 has-error">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="certificates_new_car_price" id="new_car_price" value="{{ $order->certificates->new_car_price }}">--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}
{{--</div>--}}

{{--<div class="panel panel-primary">--}}


        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">기준가격(P)</label>--}}
                        {{--<div class="col-sm-3 col-sm-offset-7 has-error">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="pst" id="pst" value="{{ $order->certificates->price }}">--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">기본가격(A)</label>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}


                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">등록일보정</label>--}}
                        {{--<div class="col-sm-7">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($standard_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->basic_registraion == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('certificates_basic_registraion', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->basic_registraion)) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-3">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="basic_registraion_depreciation" id="basic_registraion_depreciation" value="{{ $order->certificates->basic_registraion_depreciation }}" required>--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">색상등 기타</label>--}}
                        {{--<div class="col-sm-3 col-sm-offset-7">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="certificates_basic_etc" id="basic_etc" value="{{ $order->certificates->basic_etc }}" required>--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group no-margin">--}}
                        {{--<label for="" class="control-label col-md-offset-5 col-md-3">기본가격(A) 감가금액</label>--}}
                        {{--<div class="col-sm-4">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control" name="basic_depreciation" id="basic_depreciation" value="{{ $order->certificates->history_depreciation ? $order->certificates->history_depreciation : '' }}" required>--}}
                                        {{--<span class="input-group-addon">원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">사용이력(B)</label>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">주행거리</label>--}}
                        {{--<div class="col-sm-7">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1282 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_mileage_cd', 1282, \App\Helpers\Helper::isCheckd(1282, $order->certificates->usage_mileage_cd), ['required']) }}--}}
                                                {{--초과--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1283 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_mileage_cd', 1283, \App\Helpers\Helper::isCheckd(1283, $order->certificates->usage_mileage_cd), ['required']) }}--}}
                                                {{--표준--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_mileage_cd == 1284 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_mileage_cd', 1284, \App\Helpers\Helper::isCheckd(1284, $order->certificates->usage_mileage_cd), ['required']) }}--}}
                                                {{--미달--}}
                                        {{--</label>--}}
                                {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-3">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="certificates_usage_mileage_depreciation" id="certificates_usage_mileage_depreciation" value="{{ $order->certificates->usage_mileage_depreciation }}" required>--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">사고/수리이력</label>--}}
                        {{--<div class="col-sm-7">--}}
                                {{--<div class="btn-group btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_history_cd == 1285 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_history_cd', 1285, \App\Helpers\Helper::isCheckd(1285, $order->certificates->usage_history_cd), ['required']) }} 사고이력 없음--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_history_cd == 1286 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_history_cd', 1286, \App\Helpers\Helper::isCheckd(1286, $order->certificates->usage_history_cd), ['required']) }} 단순수리--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_history_cd == 1287 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_history_cd', 1287, \App\Helpers\Helper::isCheckd(1287, $order->certificates->usage_history_cd), ['required']) }} 기본차체판금--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->usage_history_cd == 1288 ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('certificates_usage_history_cd', 1288, \App\Helpers\Helper::isCheckd(1288, $order->certificates->usage_history_cd), ['required']) }} 기본차체교환/골격수리--}}
                                        {{--</label>--}}
                                {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-3">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="certificates_usage_history_depreciation" id="certificates_usage_history_depreciation" value="{{ $order->certificates->usage_history_depreciation }}" required>--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group no-margin">--}}
                        {{--<label for="" class="control-label col-md-offset-5 col-md-3">사용이력(B) 감가금액</label>--}}
                        {{--<div class="col-sm-4">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control" name="history_depreciation" id="history_depreciation" value="{{ $order->certificates->history_depreciation ? $order->certificates->history_depreciation : '' }}" required>--}}
                                        {{--<span class="input-group-addon">원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">차량성능상태(C)</label>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">주요외판</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_exterior_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_exterior_cd', $key, $order->certificates->performance_exterior_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="exterior_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">침수흔적 점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_flooded_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_flooded_cd', $key, $order->certificates->performance_flooded_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="flooded_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">소모품상태점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_consumption_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_consumption_cd', $key, $order->certificates->performance_consumption_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="consumption_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">고장진단</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_broken_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_broken_cd', $key, $order->certificates->performance_broken_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="broken_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">동력전달</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_power_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_power_cd', $key, $order->certificates->performance_power_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="power_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">전기</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_electronic_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_electronic_cd', $key, $order->certificates->performance_electronic_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="electronic_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">주요내판</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_interior_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_interior_cd', $key, $order->certificates->performance_interior_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="interior_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">차량외판점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_exteriortest_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_exteriortest_cd', $key, $order->certificates->performance_exteriortest_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="exteriortest_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">전장품유리기어/작동상태점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_plugin_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_plugin_cd', $key, $order->certificates->performance_plugin_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="plugin_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">엔진(원동기)</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_engine_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_engine_cd', $key, $order->certificates->performance_engine_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="engine_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">조향장치</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_steering_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_steering_cd', $key, $order->certificates->performance_steering_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="steering_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">타이어</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_tire_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_tire_cd', $key, $order->certificates->performance_tire_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="tire_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">사고유무점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_accident_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_accident_cd', $key, $order->certificates->performance_accident_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="accident_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">차량실내점검</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_interiortest_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_interiortest_cd', $key, $order->certificates->performance_interiortest_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="interiortest_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">주행테스트</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_driving_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_driving_cd', $key, $order->certificates->performance_driving_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="driving_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">변속기</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_transmission_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_transmission_cd', $key, $order->certificates->performance_transmission_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="transmission_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">제동장치</label>--}}
                        {{--<div class="col-sm-10">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--@foreach($certificate_states as $key=>$val )--}}
                                                {{--<label class="btn btn-default {{ $order->certificates->performance_braking_cd == $key ? 'active' : '' }}">--}}
                                                        {{--{{ Form::radio('performance_braking_cd', $key, $order->certificates->performance_braking_cd == $key) }} {{ $val }}--}}
                                                {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}

                                {{--<textarea name="braking_comment" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group no-margin">--}}
                        {{--<label for="" class="control-label col-md-offset-5 col-md-3">차량성능상태(C) 감가금액</label>--}}
                        {{--<div class="col-sm-4">--}}
                                {{--<div class="input-group">--}}
                                        {{--<input type="text" class="form-control" name="certificates_performance_depreciation" id="certificates_performance_depreciation" value="{{ $order->certificates->performance_depreciation }}" required>--}}
                                        {{--<span class="input-group-addon">원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}


        {{--</div>--}}

        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">특별요인(S)</label>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">요인</label>--}}
                        {{--<div class="col-sm-7">--}}
                                {{--<div class="btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->special_flooded_cd == 3 ? 'active' : '' }}">--}}
                                                {{--{{ Form::checkbox('certificates_special_flooded_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_flooded_cd)) }}--}}
                                                {{--침수차량--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->special_fire_cd == 3 ? 'active' : '' }}">--}}
                                                {{--{{ Form::checkbox('certificates_special_fire_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fire_cd)) }}--}}
                                                {{--화재차량--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->special_fulllose_cd == 3 ? 'active' : '' }}">--}}
                                                {{--{{ Form::checkbox('certificates_special_fulllose_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_fulllose_cd)) }}--}}
                                                {{--전손차량--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->special_remodel_cd == 3 ? 'active' : '' }}">--}}
                                                {{--{{ Form::checkbox('certificates_special_remodel_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_remodel_cd)) }}--}}
                                                {{--불법개조--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-default {{ $order->certificates->special_etc_cd == 3 ? 'active' : '' }}">--}}
                                                {{--{{ Form::checkbox('certificates_special_etc_cd', 3, \App\Helpers\Helper::isCheckd(3, $order->certificates->special_etc_cd)) }}--}}
                                                {{--기타요인--}}
                                        {{--</label>--}}
                                {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-sm-3">--}}

                        {{--</div>--}}
                {{--</div>--}}



                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">변경이력</label>--}}
                        {{--<div class="col-sm-10">--}}

                                {{--<div class="form-group">--}}
                                        {{--<label class="control-label col-sm-3">용도변경이력</label>--}}
                                        {{--<div class="col-sm-9">--}}
                                                {{--<input type="text" id="certificates_history_purpose" class="form-control" name="certificates_history_purpose" data-role="tagsinput" value="{{ $order->certificates->history_purpose }}"  style="width:100%;" required="required">--}}
                                        {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                        {{--<label class="control-label col-sm-3">차고지변경이력</label>--}}
                                        {{--<div class="col-sm-9">--}}
                                                {{--<input type="text" id="certificates_history_garage" name="certificates_history_garage" class="form-control"  data-role="tagsinput" value="{{ $order->certificates->history_garage }}" style="width:100%;" required="required">--}}
                                        {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">--}}
                                    {{--<label for="" class="control-label col-md-3">보험사고이력</label>--}}
                                        {{--<div class="col-sm-4">--}}
                                                {{--<div class="input-group">--}}
                                                        {{--<input type="text" class="form-control" name="certificates_history_insurance" id="certificates_history_insurance" value="{{ $order->certificates->history_insurance }}" required>--}}
                                                        {{--<span class="input-group-addon">건</span>--}}
                                                {{--</div>--}}
                                        {{--</div>--}}
                                    {{--<div class="col-md-offset-3 col-md-9">--}}
                                        {{--<div class="plugin-attach" id="plugin-attachment">--}}

                                            {{--@if ($errors->has('attachment'))--}}
                                            {{--<span class="help-block">--}}
                                                {{--{{ $errors->first('attachment') }}--}}
                                            {{--</span>--}}
                                            {{--@endif--}}

                                        {{--</div>--}}


                                        {{--@if ($errors->has('attachment'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--{{ $errors->first('attachment') }}--}}
                                        {{--</span>--}}
                                        {{--@endif--}}

                                    {{--</div>--}}

                                {{--</div>--}}


                                {{--<div class="form-group">--}}
                                        {{--<label class="control-label col-sm-3">소유자변경이력</label>--}}
                                        {{--<div class="col-sm-4">--}}
                                                {{--<div class="input-group">--}}
                                                        {{--<input type="text" class="form-control" name="certificates_history_owner" id="certificates_history_owner" value="{{ $order->certificates->history_owner }}" required>--}}
                                                        {{--<span class="input-group-addon">건</span>--}}
                                                {{--</div>--}}
                                        {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                        {{--<label class="control-label col-sm-3">정비이력</label>--}}
                                        {{--<div class="col-sm-4">--}}
                                                {{--<div class="input-group">--}}
                                                        {{--<input type="text" class="form-control" name="certificates_history_maintance" id="certificates_history_maintance" value="{{ $order->certificates->history_maintance }}" required>--}}
                                                        {{--<span class="input-group-addon">건</span>--}}
                                                {{--</div>--}}
                                        {{--</div>--}}
                                {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group no-margin">--}}
                                {{--<label for="" class="control-label col-md-offset-5 col-md-3">특별요인(S) 감가금액</label>--}}
                                {{--<div class="col-sm-4">--}}
                                        {{--<div class="input-group">--}}
                                                {{--<input type="text" class="form-control" name="special_depreciation" id="special_depreciation" value="{{ $order->certificates->special_depreciation ? $order->certificates->special_depreciation : '' }}" required>--}}
                                                {{--<span class="input-group-addon">원</span>--}}
                                        {{--</div>--}}
                                {{--</div>--}}
                        {{--</div>--}}

                {{--</div>--}}
        {{--</div>--}}


        {{--<div class="panel-heading">--}}
                {{--<div class="row">--}}
                        {{--<label for="" class="control-label col-sm-2">최종평가</label>--}}
                {{--</div>--}}
        {{--</div>--}}

        {{--<div class="panel-body">--}}
                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">평가금액</label>--}}
                        {{--<div class="col-sm-3 col-sm-offset-7 text-right">--}}
                                {{--<div class="input-group has-error">--}}
                                        {{--<input type="text" class="form-control cert-calculate-subtotal" placeholder="P ± A ± B ± S" title="" name="certificates_valuation" id="certificates_valuation" value="{{ $order->certificates->valuation }}" required>--}}
                                        {{--<span class="input-group-addon">만원</span>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">등급평가</label>--}}
                        {{--<div class="col-sm-5 col-sm-offset-5 text-right">--}}
                                {{--<div class="btn-group btn-group-lg" role="group" data-toggle="buttons" >--}}
                                        {{--@foreach($grades as $key=>$val )--}}
                                        {{--<label class="btn btn-outline btn-danger {{ $order->certificates->grade == $key ? 'active' : '' }}">--}}
                                                {{--{{ Form::radio('grade_state_cd', $key, \App\Helpers\Helper::isCheckd($key, $order->certificates->grade)) }} {{ $val }}--}}
                                        {{--</label>--}}
                                        {{--@endforeach--}}
                                {{--</div>--}}
                        {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                        {{--<label class="control-label col-sm-2">종합의견</label>--}}
                        {{--<div class="col-sm-10  has-error">--}}
                                {{--<textarea name="certificates_opinion" class="form-control" required="required" style="height: 100px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>--}}
                        {{--</div>--}}
                {{--</div>--}}

        {{--</div>--}}
{{--</div>--}}
