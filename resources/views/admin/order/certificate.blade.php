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
    <h2>기본 정보</h2>
    {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
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
                <input type="text" style="width: 80%;" name="order_car_number" value="{{ $order->car_number }}">
            </td>
            <th>주행거리(km)</th>
            <td>
                <input type="text" style="width: 80%;" name="order_mileage" value="{{ $order->mileage }}">
            </td>
        </tr>
        <tr>
            <th>차대번호</th>
            <td>
                {{--todo 차대번호 사진 첨부되어야 함--}}
                <input type="text" style="width: 80%;" name="car.vin_number" value="{{ $order->car->vin_number }}">
                @if($order->car->imported_vin_number)
                    <p><input type="text" style="width: 80%;" name="car_imported_vin_number" value="{{ $order->car->imported_vin_number }}"></p>
                @endif
            </td>
            <th>차대번호 동일성확인</th>
            <td>
                {{--todo 차대번호 동일성 부분에 대한 필드는 code의 yes/no를 가지고 온다. 단, 해당 필드부분을 다시 확인해야 함. 또한, 사진도 있어야 한다.--}}
                {!! Form::select('attachment_status', $select_attachment_status, [], ['class' =>'form-control']) !!}
            </td>
        </tr>
        <tr>
            <th>최초등록일</th>
            <td>
                <div class="input-group">
                    <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                    <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" style="width: 78%;" name="cars_registration_date" value="{{ $order->car->registration_date }}">
                </div>
            </td>
            <th>사용월수</th>
            <td>
                <input type="text" style="width: 80%;" name="car_history" value="{{ \App\Helpers\Helper::getMonthNum($order->car->registration_date) }}">
            </td>
        </tr>
        <tr>
            <th>차명</th>
            <td>
                <input type="text" style="width: 80%;" name="detail_name" value="{{ \App\Helpers\Helper::getCarModel($order->car) }}">
            </td>
            <th>세부모델</th>
            <td>
                <input type="text" style="width: 80%" name="model_name" value="{{ $order->car->detail->name }}">
            </td>
        </tr>
        <tr>
            <th>색상</th>
            <td>
                차량 외부: {!! Form::select('cars_exterior_color', $select_color, [], ['class'=>'form-control']) !!}
                차량 내부: {!! Form::select('cars_interior_color', $select_color, [], ['class'=>'form-control']) !!}
            </td>
            <th>차종</th>
            <td>
                {{--todo 차종구분을 명확히 해야 함. 자가/영업, 승용/승합 등 --}}
                <input type="text" style="width: 80%" name="car_drive_type" value="{{ $order->car->brand->name }}">
            </td>
        </tr>
        <tr>
            <th>연식 (형식)</th>
            <td>
                <input type="text" style="width: 80%;" name="car_year" value="{{ $order->car->year }}" >
            </td>
            <th>변속기</th>
            <td>
                <input type="text" style="width: 80%;" name="car_transmission_cd" value="{{ $order->car->getTransmission ? $order->car->getTransmission->display() : '' }}">
            </td>
        </tr>
        <tr>
            <th>사용연료</th>
            <td>
                <input type="text" style="width: 80%;" name="car_fueltype_cd" value="{{ $order->car->getFuelType ?  $order->car->getFuelType->display() : '' }}">
            </td>
            <th>배기량 (cc)</th>
            <td>
                <input type="text" style="width: 80%;" name="car_output" value="{{ $order->car->displacement }}">
            </td>
        </tr>
        <tr>
            <th>연비</th>
            <td colspan="3">
                <input type="text" style="width: 80%;" name="car_fuel_consumption" value="{{ $order->car ? $order->car->fuel_consumption : '' }}">
            </td>
        </tr>
        </tbody>
    </table>


    <div class="text-right">
        <button class="btn btn-primary text-right" type="submit">저장</button>
    </div>
    {!! Form::close() !!}
</div>
{{--이력 정보--}}
<div class='col-md-12'>
    <h2>이력 정보</h2>
    {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-history', 'enctype'=>"multipart/form-data"]) !!}
    <table class="table table-bordered">
        <colgroup>
            <col style='width:175px;'>
            {{--<col style='width:200px;'>--}}
            {{--<col style='width:120px;'>--}}
            {{--<col style='width:270px;'>--}}
        </colgroup>
        <tbody>
        <tr>
            <th>보험사고 이력</th>
            <td colspan="3">
                <input type="text" name="history_insurance" value="{{ $order->certificates ? $order->certificates->history_insurance : 0 }}">건 &nbsp;&nbsp;&nbsp;
                <button class="btn btn-info" type="button" id="insurance-upload">사고이력 이미지</button>
            </td>
        </tr>
        <tr>
            <th>소유자 이력</th>
            <td colspan="3">
                <input type="text" name="history_owner" value="{{ $order->certificates ? $order->certificates->history_owner : 0 }}">명
            </td>
        </tr>
        <tr>
            <th>정비 이력</th>
            <td colspan="3">
                <input type="text" name="history_maintance" value="{{ $order->certificates ? $order->certificates->history_maintance : 0 }}">번
            </td>
        </tr>
        <tr>
            <th>용도변경이력</th>
            <td colspan="3">

                    <ul id="history_purpose">
                        @if($order->certifacates)
                            @foreach(\App\Helpers\Helper::displayHistoryItem($order->certifacates->history_purpose) as $key => $garage_row)
                                <li>{{ $garage_row }}</li>
                            @endforeach
                        @else
                            <li><strong class="text-danger">용도변경 이력이 없습니다.</strong></li>
                        @endif
                    </ul>




                <div class="input-group">
                    <input type="text" name="certificates_history_purpose" class="form-control" id="certificates_history_purpose" placeholder="용도변경 정보를 입력해주세요.">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="button" id="history_purpose_add">용도변경 이력 추가</button>
                    </span>
                </div>


            </td>
        </tr>
        <tr>
            <th>차고지 이력</th>
            <td colspan="3">

                <ul id="history_garage">
                    @if($order->certifacates)
                        @foreach(\App\Helpers\Helper::displayHistoryItem($order->certifacates->history_garage) as $key => $garage_row)
                            <li>{{ $garage_row }}</li>
                        @endforeach
                    @else
                        <li><strong class="text-danger">차고지 이력이 없습니다.</strong></li>
                    @endif
                </ul>



                <div class="input-group">
                    <input type="text" name="certificates_history_garage" class="form-control" id="certificates_history_garage" placeholder="차고지 주소 및 정보를 입력해주세요.">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="button" id="history_garage_add">차고지 이력 추가</button>
                    </span>
                </div>

            </td>
        </tr>
        </tbody>
    </table>

    <div class="text-right">
        <button class="btn btn-primary text-right" type="submit">저장</button>
    </div>
    {!! Form::close() !!}
</div>
{{--
    가격 산정
    todo 신차출고가격 vat 포함/미포함여부 없음.
    원산지 구분, 최종소유지주소, 신차출고가격(누가 입력??)
--}}
<div class='col-md-12'>
    <h2>가격 산정</h2>
    {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-price', 'enctype'=>"multipart/form-data"]) !!}
    <table class="table table-bordered">
        <colgroup>
            <col style='width:175px;'>
            {{--<col style='width:200px;'>--}}
            {{--<col style='width:120px;'>--}}
            {{--<col style='width:270px;'>--}}
        </colgroup>
        <tbody>
        <tr>
            <th>기준가격(Pst)</th>
            <td colspan="3">
                <input type="text" name="pst" id="pst" value="{{ $order->certificates ? number_format($order->certificates->price) : '' }}">만원
            </td>
        </tr>
        <tr>
            <th rowspan='4'>기본평가(A)</th>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 신차출고가격
            </td>
            <td>
                부가세
                <input type="radio" name="vat" value="true"{{ \App\Helpers\Helper::displayChecked($order->certificates, 'vat', 'Y') }}>포함
                <input type="radio" name="vat" value="false"{{ \App\Helpers\Helper::displayChecked($order->certificates, 'vat', 'N') }}>제외
            </td>
            <td>
                <input type="text" name="new_car_price" id="new_car_price" value="{{ $order->certificates ? number_format($order->certificates->new_car_price) : '' }}">만원
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 등록일 보정(+)
            </td>
            <td>
                <input type="radio" name="basic_registraion" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'standard') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'standard') }}>표준
                <input type="radio" name="basic_registraion" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'excess') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'excess') }}>초과
                <input type="radio" name="basic_registraion" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'shortfall') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'shortfall', true) }}>미달
            </td>
            <td>
                <input type="text" name="basic_registraion_depreciation" id="basic_registraion_depreciation" value="{{ $order->certificates ? $order->certificates->basic_registraion_depreciation : '' }}">만원
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 장착품(추가옵션)
            </td>
            <td colspan="2">
                <input type="text" name="basic_mounting_cd" id="basic_mounting_cd" value="{{ $order->certificates ? $order->certificates->basic_mounting_cd : '' }}"> 만원
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i>  색상 등 기타
            </td>
            <td colspan="2">
                <input type="text" name="basic_etc" id="basic_etc" value="{{ $order->certificates ? $order->certificates->basic_etc : '' }}">만원
            </td>
        </tr>

        <tr>
            <th rowspan="3">사용이력(B)</th>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 주행거리 (+)

            </td>
            <td>
                <input type="radio" name="usage_mileage_cd" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'standard') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'standard') }}>표준
                <input type="radio" name="usage_mileage_cd" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'excess') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'excess') }}>초과
                <input type="radio" name="usage_mileage_cd" value="{{ \App\Helpers\Helper::getCodeValue('standard_cd', 'shortfall') }}"{{ \App\Helpers\Helper::getCodeValue($order->certificates, 'usage_mileage_cd', 'shortfall', true) }}>미달
            </td>
            <td>
                <input type="text" name="usage_mileage_depreciation" id="usage_mileage_depreciation" value="{{ $order->certificates ? $order->certificates->usage_mileage_depreciation : 0 }}">만원
            </td>
        </tr>
        <tr>
            <td rowspan="2">
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 사고/수리이력
            </td>
            <td colspan="2">
                {{--todo 현재 usage_history_cd 필드가 int로 되어 있다. 이부분을 varchar로 변경하거나 각 옵션값을 필드로 가지고 있어야 한다--}}
                무사고 <input type="checkbox" value="{{ \App\Helpers\Helper::getCodeValue('accident_cd', 'none') }}" name="usage_history_cd">
                단순교환 <input type="checkbox" value="{{ \App\Helpers\Helper::getCodeValue('accident_cd', 'simpe_swap') }}" name="usage_history_cd">
                중손상 <input type="checkbox" value="{{ \App\Helpers\Helper::getCodeValue('accident_cd', 'middle_damage') }}" name="usage_history_cd">
                대손상 <input type="checkbox" value="{{ \App\Helpers\Helper::getCodeValue('accident_cd', 'big_damage') }}" name="usage_history_cd">
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>감가금액</td>
            <td>
                <input type="text" name="usage_history_depreciation" id="usage_history_depreciation" value="{{ $order->certificates ? $order->certificates->usage_history_depreciation : 0 }}">만원
            </td>
        </tr>
        <tr>
            {{--todo 차량성능/외관/내장/주요장치 코드 처리해야 함.--}}
            <th rowspan="5">차량 성능 상태(C)</th>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 휠/타이어
            </td>
            <td colspan="2">
                양호 <input type="radio" name="performance_tire_cd" name="good">
                보통 <input type="radio" name="performance_tire_cd" name="normal">
                불량/정비요 <input type="radio" name="performance_tire_cd" name="maintenance">
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 외관(외장)
            </td>
            <td colspan="2">
                양호 <input type="radio" name="performance_exterior_cd" name="good">
                보통 <input type="radio" name="performance_exterior_cd" name="normal">
                불량/정비요 <input type="radio" name="performance_exterior_cd" name="maintenance">
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 실내/내장
            </td>
            <td colspan="2">
                양호 <input type="radio" name="performance_interior_cd" name="good">
                보통 <input type="radio" name="performance_interior_cd" name="noraml">
                불량/정비요 <input type="radio" name="performance_interior_cd" name="maintenance">
            </td>
        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 주요장치/성능
            </td>
            <td colspan="2">
                양호 <input type="radio" name="performance_device_cd" value="good">
                보통 <input type="radio" name="performance_device_cd" value="normal">
                불량/정비요 <input type="radio" name="performance_device_cd" value="maintenance">
            </td>
        </tr>
        <tr>
            <td><i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 감가금액</td>
            <td colspan="2">
                <input type="text" name="performance_depreciation" id="performance_depreciation" value="">만원
            </td>
        </tr>

        <tr>
            <th rowspan="3">특별요인(S)</th>
            <td colspan="3">
                <input type="checkbox" name="special_flooded_cd" value="{{ $order->certificates ? $order->certificates->special_flooded_cd : '' }}" {{ \App\Helpers\Helper::displayChecked($order->certificates, 'special_flooded_cd') }}> 침수차량
                <input type="checkbox" name="special_fire_cd" value="{{ $order->certificates ? $order->certificates->special_fire_cd : '' }}" {{ \App\Helpers\Helper::displayChecked($order->certificates, 'special_fire_cd') }}> 화재차량
                <input type="checkbox" name="special_fulllose_cd" value="{{ $order->certificates ? $order->certificates->special_fulllose_cd : '' }}" {{ \App\Helpers\Helper::displayChecked($order->certificates, 'special_fulllose_cd') }}> 전손차량
                <input type="checkbox" name="special_remodel_cd" value="{{ $order->certificates ? $order->certificates->special_remodel_cd : '' }}" {{ \App\Helpers\Helper::displayChecked($order->certificates, 'special_remodel_cd') }}> 불법개조
                <input type="checkbox" name="special_etc_cd" value="{{ $order->certificates ? $order->certificates->special_etc_cd : '' }}" {{ \App\Helpers\Helper::displayChecked($order->certificates, 'special_etc_cd') }}> 기타요인
            </td>

        </tr>
        <tr>
            <td>
                <i class="glyphicon glyphicon-ok-sign" style="font-size: 0.8em;" aria-hidden="true"></i> 변경이력
            </td>
            <td>
                @if($order->certifacates)
                    <ul>
                        @foreach(\App\Helpers\Helper::displayHistoryItem($order->certifacates->history_purpose) as $key => $garage_row)
                            <li>{{ $garage_row }}</li>
                        @endforeach
                    </ul>
                @else
                    <p><strong class="text-danger">용도변경 이력이 없습니다.</strong></p>
                @endif

            </td>
        </tr>
        <tr>
            <td>감가금액</td>
            <td colspan="2">
                <input type="text" name="special_depreciation" id="special_depreciation" value="{{ $order->certificates ? $order->certificates->special_depreciation : 0 }}">만원
            </td>
        </tr>

        <tr>
            <th>평가금액</th>
            <td colspan="2">V=Pst+(A+B+C+S)</td>
            <td>
                <input type="text" name="valuation" id="valuation" value="{{ $order->certificates ? $order->certificates->valuation : '' }}">만원
            </td>
        </tr>
        <tr>
            <th>종합 의견</th>
            <td colspan="3">
                <textarea name="certification_opinion" class="form-control wysiwyg">{{ $order->certificates ? $order->certificates->opinion : '' }}</textarea>
            </td>
        </tr>
        </tbody>
    </table>
    {!! Form::close() !!}
</div>

{{-- 사고이력 이미지 업로드 model --}}
<div class="modal fade bs-example-modal-lg in purchase-modal" id="insurance-modal" tabindex="-1" role="dialog" aria-labelledby="insurance-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg form-group">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">사고이력 이미지 업로드</h4>
            </div>
            <div class="modal-body">

                <p>
                    <a href="" class="thumbnail">
                        <img src="" id="history_insurance_src">
                    </a>
                </p>
                <div class="input-group">

                    <div class="form-group">
                        <label for="" class="control-label col-md-3">{{ trans('admin/post.attachment') }}</label>

                        <div class="col-md-9">

                            <div class="plugin-attach" id="plugin-attachment"></div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="purchase-modal-close">닫기</button>
            </div>
        </div>
    </div>
</div>

{{-- 용도변경, 차고지 이력 정보 model --}}
<div class="modal fade bs-example-modal-lg in purchase-modal" id="history-modal" tabindex="-1" role="dialog" aria-labelledby="history-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg form-group">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel"><span id="history-title" class=""></span> 이력정보 추가</h4>
            </div>
            <div class="modal-body">

                <div class="input-group">
                    <input type="text" class="form-control" id="history-data" placeholder="이력 정보를 입력해주세요.">
                    <input type="hidden" id="history-method">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="button" id="history_submit">용도변경 이력 추가</button>
                    </span>
                </div>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary history-close" data-dismiss="modal" id="history-modal-close">닫기</button>
            </div>
        </div>
    </div>
</div>

@push( 'header-script' )
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}" />
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}" />
@endpush


@push( 'footer-script' )
<script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>

<script type="text/template" id="qq-template">@include("partials/files", [])</script>
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/fine-uploader-new.css' ) }}" />
<script src="{{ Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/jquery.fine-uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/uploader.js' ) }}"></script>
<script src="{{ Helper::assets( 'js/plugin/post.js' ) }}"></script>

<script type="text/javascript">
    $(function(){
        //기본정보 수정
//        $("#frm-basic").validator();
//
//        //이력정보 수정
//        $("#frm-history").validator();
//
//        //가격산정 수정
//        $("").validator();

        //todo 사고이력 이미지 업로드 테스트
        $("#insurance-upload").on("click", function () {
            $("#insurance-modal").modal();
        });

        $("#history_purpose_add").on("click", function () {
            $("").modal();
        })

        $('#plugin-attachment').fineUploader({
            debug: true,
            //        template: 'qq-template',
            request: {
                inputName: "upfile",
                endpoint: '/order/insurance-file',
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            deleteFile: {
                enabled: true,
                endpoint: '/order/insurance-file-delete',
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            thumbnails: {
                placeholders: {
                    waitingPath: "{{ \App\Helpers\Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/waiting-generic.png' ) }}",
                    notAvailablePath: "{{ \App\Helpers\Helper::assets( 'vendor/fine-uploader/jquery.fine-uploader/placeholders/not_available-generic.png' ) }}",
                }
            },
            validation: {
                            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                itemLimit: 1,
                sizeLimit: 8388608, // 8M = 8 * 1024 * 1024 bytes
                stopOnFirstInvalidFile: true
            },
            callbacks: {
                onSubmit: function (id, fileName) {
                    this.setParams({'certificates_id': "{{ $order->certificates ? $order->certificates->id : ''}}"});
                },
                onComplete: function (id, fileName, responseJSON) {
                    console.log(responseJSON);
                },
                onError: function (e) {
                    console.log('error', e);
                }
            }
        });

        //변경이력 form 초기화
        $("#history-modal-close").on("hide.bs.modal", function () {
            $("#history-method").val('');
            $("#history-data").val('');
        });

        // 용도변경 이력 추가
        $("#history_purpose_add").on("click", function(){
            if($("#certificates_history_purpose").val()){
                history_data("history_purpose", $("#certificates_history_purpose").val());
            }else{
                alert('용도변경 이력 내용을 입력해 주세요.');
                $("#certificates_history_purpose").focus();
            }

        });

        // 차고지 이력 추가
        $("#history_garage_add").on("click", function () {
            if($("#certificates_history_garage").val()){
                history_data("history_garage", $("#certificates_history_garage").val());
            }else{
                alert("차고지 이력 정보를 입력해 주세요.");
                $("#certificates_history_garage").focus();
            }

        });

        $("#history_submit").on("click", function(){
            history_data();
        });

        //todo 평가금액 처리
        $("#valuation").on("click", function(){
            if(confirm("평가금액을 계산하시겠습니까?")){
                $("#valuation").val(sum_certificate_price());

            }else {
                $("#valuation").focus();
            }

        });

        //금액부문 전체 선택
        $("input[type='text']").on("click", function () {
            $(this).select();
        });



    });

    var history_data = function (method, input_data) {
        //todo 데이터 테스트
        var formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("id", "{{ $order->certificates ? $order->certificates->id : '' }}");
        formData.append("method", method);
        formData.append("data", input_data);

        $.ajax({
            url: "",
            data: formData,
            type: "POST",
            success: function(jdata){
                var success = jdata.success;
                var msg = jdata.msg;
                var data = jdata.data;
                if(success == true){
                    $("#"+method+" > li").remove(); // 기존 데이터 삭제
                    $.each(data, function(key, row){
                        $("#"+method).after("<li>" + row + "</li>");
                    });


                    $("#certificates_" + method).val('');



                }else{
                    //갱신 실패
                    alert(msg);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('이력 정보 처리를 실패하였습니다.');
            }

        });
    }

    var sum_certificate_price = function(){
        var Pst = parseInt($("#pst").val());
        var A = parseInt($("#new_car_price").val()) + parseInt($("#basic_registraion_depreciation").val())
        + parseInt($("#basic_mounting_cd").val()) + parseInt($("#basic_etc").val());
        var B = parseInt($("#usage_mileage_depreciation").val()) + parseInt($("#usage_history_depreciation").val());
        var C = parseInt($("#performance_depreciation").val());
        var S = parseInt($("#special_depreciation").val());

        console.log(Pst, A, B, C, S);
        var V = Pst + (A+B+C+S);
        return V;
    }
</script>
@endpush