
<div class="panel panel-default">

        <div class="panel-heading">
                <div class="row">
                        <label for="" class="control-label col-sm-2">신차출고가격</label>
                        <div class="col-sm-3 col-sm-offset-7 has-error">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="cost" value="">
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
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="cost" value="">
                                        <span class="input-group-addon">만원</span>
                                </div>
                        </div>
                </div>
        </div>

        <div class="panel-heading">
                <div class="row">
                        <label for="" class="control-label col-sm-2">기본가격(A)</label>
                        <div class="col-sm-3 col-sm-offset-7 has-error">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" readonly="readonly" placeholder="" title="" name="cost" value="">
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
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 표준
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 미달
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 초과
                                        </label>
                                </div>
                        </div>

                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="box_cost" value="1">
                                        <span class="input-group-addon">만원</span>
                                </div>
                        </div>
                </div>

                <div class="form-group no-margin">
                        <label class="control-label col-sm-2">색상등 기타</label>
                        <div class="col-sm-3 col-sm-offset-7">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="box_cost" value="1">
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
                                        <input type="text" class="form-control cert-calculate-subtotal" readonly="readonly" placeholder="" title="" name="cost" value="">
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
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 표준
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 미달
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 초과
                                        </label>
                                </div>
                        </div>

                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="box_cost" value="1">
                                        <span class="input-group-addon">만원</span>
                                </div>
                        </div>
                </div>
                <div class="form-group no-margin">
                        <label class="control-label col-sm-2">사고/수리이력</label>
                        <div class="col-sm-7">
                                <div class="btn-group btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 사고이력 없음
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 단순수리
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 기본차체판금
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 기본차체교환/골격수리
                                        </label>
                                </div>
                        </div>

                        <div class="col-sm-3">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-cost" placeholder="" title="" name="box_cost" value="1">
                                        <span class="input-group-addon">만원</span>
                                </div>
                        </div>
                </div>
        </div>

        <div class="panel-heading">
                <div class="row">
                        <label for="" class="control-label col-sm-2">차량성능상태(C)</label>
                        <div class="col-sm-3 col-sm-offset-7 has-error">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="cost" value="">
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
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">침수흔적 점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">소모품상태점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">고장진단</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">동력전달</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">전기</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">주요내판</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">차량외판점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">전장품유리기어/작동상태점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">엔진(원동기)</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">조향장치</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">타이어</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">사고유무점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">차량실내점검</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">주행테스트</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">변속기</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

                <div class="form-group no-margin">
                        <label class="control-label col-sm-2">제동장치</label>
                        <div class="col-sm-10">
                                <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 양호
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 정비요망
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 교체
                                        </label>
                                </div>

                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 60px; margin-top:5px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>
        </div>

        <div class="panel-heading">
                <div class="row">
                        <label for="" class="control-label col-sm-2">특별요인(S)</label>
                        <div class="col-sm-3 col-sm-offset-7 has-error">
                                <div class="input-group">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="" title="" name="cost" value="">
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
                                        <label class="btn btn-default {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="checkbox" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> 침수차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="checkbox" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 화재차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="checkbox" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 전손차량
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="checkbox" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 불법개조
                                        </label>
                                        <label class="btn btn-default {{ $order->certificates->vat == 4 ? 'active' : '' }}">
                                                <input type="checkbox" name="certificates_vat" value="4" autocomplete="off" {{ $order->certificates->vat == 4 ? 'checked' : '' }}> 기타요인
                                        </label>
                                </div>

                        </div>

                        <div class="col-sm-3">

                        </div>
                </div>



                <div class="form-group no-margin">
                        <label class="control-label col-sm-2">변경이력</label>
                        <div class="col-sm-10">

                                <div class="form-group">
                                        <label class="control-label col-sm-3">용도변경이력</label>
                                        <div class="col-sm-9">
                                                <input type="text" id="" class="form-control" data-role="tagsinput" style="width:100%;" >
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-sm-3">차고지변경이력</label>
                                        <div class="col-sm-9">
                                                <input type="text" id="" class="form-control"  data-role="tagsinput" style="width:100%;" >
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                                    <label for="" class="control-label col-md-3">보험사고이력</label>

                                    <div class="col-md-9">


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
                                                        <input type="text" class="form-control" required>
                                                        <span class="input-group-addon">건</span>
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-sm-3">정비이력</label>
                                        <div class="col-sm-4">
                                                <div class="input-group">
                                                        <input type="text" class="form-control" required>
                                                        <span class="input-group-addon">건</span>
                                                </div>
                                        </div>
                                </div>
                        </div>

                </div>
        </div>


        <div class="panel-heading">
                <div class="row">
                        <label for="" class="control-label col-sm-2">최종평가</label>
                        <div class="col-sm-10 has-error text-right">

                        </div>
                </div>
        </div>

        <div class="panel-body">
                <div class="form-group">
                        <label class="control-label col-sm-2">평가금액</label>
                        <div class="col-sm-3 col-sm-offset-7 text-right">
                                <div class="input-group has-error">
                                        <input type="text" class="form-control cert-calculate-subtotal" placeholder="P ± A ± B ± S" title="" name="cost" value="">
                                        <span class="input-group-addon">만원</span>
                                </div>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">등급평가</label>
                        <div class="col-sm-5 col-sm-offset-5 text-right">
                                <div class="btn-group btn-group-lg" role="group" data-toggle="buttons">
                                        @foreach($grades as $entry)
                                        <label class="btn btn-outline btn-danger {{ $order->certificates->vat == 3 ? 'active' : '' }}">
                                                <input type="radio" name="certificates_vat" value="3" autocomplete="off" {{ $order->certificates->vat == 3 ? 'checked' : '' }}> {{ $entry->name }}
                                        </label>
                                        @endforeach
                                </div>
                        </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-sm-2">종합의견</label>
                        <div class="col-sm-10  has-error">
                                <textarea name="certificates_opinion" class="form-control" required="required" style="height: 100px;">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
                        </div>
                </div>

        </div>
</div>
