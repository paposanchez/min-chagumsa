@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'>
        <h2>인증서 신청
                <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div>
        </h2>
</div>


<div id='sub_wrap' class='join_wrap order-container'>


        <ul class='join_step type2' id="join_step">
                <li class='on'>
                        <strong>01</strong>
                        <span>주문</span>
                </li>
                <li>
                        <strong>02</strong>
                        <span>차량</span>
                </li>
                <li>
                        <strong>03</strong>
                        <span>결제</span>
                </li>
                <li>
                        <strong>04</strong>
                        <span>완료</span>
                </li>
        </ul>


        {!! Form::open(['route' => ["order.payment-popup"], 'target'=>'purchase-frame', 'class' =>'form-horizontal pt-perspective', 'method' => 'post', 'role' => 'form', 'id' => 'orderFrm']) !!}

        <input type="hidden" name="item_id" id="item_id" value="">
        <input type="hidden" name="payment_price" id="payment_price" value="">
        <input type="hidden" name="payment_method" id="payment_method" value="">
        <input type="hidden" name="sms_id" id="sms_id" autocomplete="off" value="">
        <input type="hidden" name="sms_confirmed" id="sms_confirmed" value="" autocomplete="off" value="">
        <input type="hidden" name="is_complete" id="is_complete" value="" autocomplete="off">
        <input type="hidden" name="orders_id" id="orders_id" value="" autocomplete="off">
        <input type="hidden" name="mobile" id="mobile" value="">
        <input type="hidden" name="use_coupon_number" id="use_coupon_number" autocomplete="off">
        <input type="hidden" name="coupon_id" id="coupon_id" autocomplete="off">


        <div class="pt-page pt-page-1">

                <fieldset id="purchase-orderinfo" >

                        <div class="form-group">
                                <label for="">1. 주문자명</label>

                                <div class="block">
                                        <div class="row">
                                                <div class="col-xs-6">
                                                        <div class="input-group input-group-lg">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                <input type="text" class="form-control input-lg" placeholder='주문자 이름' value="{{ $user->name }}" name="orderer_name" id="orderer_name">
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="">2. 휴대전화번호</label>

                                <div class="block">
                                        <div class="row">
                                                <div class="col-xs-6">
                                                        <div class="input-group input-group-lg">
                                                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                                                <input type='text' id="orderer_mobile" class='form-control ' name="orderer_mobile"
                                                                placeholder='휴대폰 번호' value="" autocomplete="off">
                                                                <span class="input-group-btn">
                                                                        <button class="btn btn-primary  btn-outline" type="button" id="mobile-verification">인증번호 전송</button>
                                                                </span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <div class="form-group">
                                <label for="" class="">3. 입고대리점</label>

                                <div class="block">

                                        <div class="row no-margin-bottom">

                                                <div class="col-xs-4">
                                                        <h6 class="text-left">시도</h6>
                                                        <select class="form-control" size="5" id="areas" name="areas" autocomplete="off" style="padding:15px !important;">
                                                                @foreach($garages as $key => $garage)
                                                                <option value="{{ $garage->area }}">{{ $garage->area }}</option>
                                                                @endforeach
                                                        </select>
                                                </div>

                                                <div class="col-xs-4">
                                                        <h6 class="text-left">구군</h6>
                                                        <select class="form-control" size="5" id="sections" name="sections" autocomplete="off" style="padding: 15px !important;">
                                                                <option disabled="true">구/군을 선택하세요.</option>
                                                        </select>
                                                </div>

                                                <div class="col-xs-4" id="garage_box">
                                                        <h6 class="text-left">대리점</h6>
                                                        <select class="form-control" size="5" id="garages" name="garages" style="padding:15px !important;">
                                                                <option disabled="true">대리점을 선택하세요.</option>
                                                        </select>
                                                </div>

                                        </div>

                                        <span class='help-block' id="select_garage"></span>
                                </div>

                        </div>


                        <div class="form-group">

                                <label for="" style="display:block;">4. 입고희망일</label>

                                <div class="block">
                                        <div class="row">
                                                <div class="col-xs-6">
                                                        <div class="input-group input-group-lg">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" class="form-control datepicker2" data-format="YYYY-MM-DD"
                                                                placeholder="{{ trans('web/order.reservation_date') }}" name='reservation_date'
                                                                id="reservation_date" value='' style="margin-right: 5px;">

                                                        </div>
                                                </div>

                                                <div class="col-xs-3">
                                                        <div class="input-group-lg">
                                                                {!! Form::select('sel_time', $search_fields, [], ['class'=>'form-control ','id'=>'sel_time']) !!}
                                                        </div>

                                                </div>
                                        </div>

                                        <small class='help-block'>{{ trans('web/order.reservation_info') }}</small>
                                </div>
                        </div>

                        <p class="form-control-static text-center">
                                <button type="button" class='btn btn-primary btn-lg wid25  order-page-move' data-index="1">다음</button>
                        </p>
                </fieldset>
        </div>

        <!-- pt-page pt-page-1 -->


        <div class="pt-page pt-page-2">

                <fieldset id="order-info-order">

                        <div class="form-group">
                                <label for="">5. 차량번호</label>

                                <div class="block">
                                        <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                                <input type="text" class="form-control input-lg wid50" id="car_number" placeholder='차량번호' value="{{ old('car_number') }}" name="car_number">
                                        </div>

                                        <small class='help-block'>※ 12저1234 또는 서울12치1233 와 같이 입력해 주세요.</small>
                                </div>
                        </div>




                        <div class="form-group">
                                <label for="">6. 차량모델</label>

                                <div class="block">
                                        <div class="row no-margin-bottom">

                                                <div class="col-xs-3">
                                                        <h6 class="text-left">브랜드</h6>
                                                        <select class="form-control" id="brands" name="brands" autocomplete="off" size="5" style="padding:15px !important;">
                                                                @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                                @endforeach
                                                        </select>
                                                </div>

                                                <div class="col-xs-3">
                                                        <h6 class="text-left">모델</h6>
                                                        <select class="form-control" id="models" name="models" autocomplete="off" size="5" style="padding:15px !important;">
                                                                <option disabled="true">모델을 선택하세요.</option>
                                                        </select>
                                                </div>

                                                <div class="col-xs-3">
                                                        <h6 class="text-left">세부모델</h6>
                                                        <select class="form-control" id="details" name="details" size="5" autocomplete="off" style="padding:15px !important;">
                                                                <option disabled="true">세부모델을 선택하세요.</option>
                                                        </select>
                                                </div>

                                                <div class="col-xs-3">
                                                        <h6 class="text-left">등급</h6>
                                                        <select class="form-control " id="grades" name="grades" size="5" autocomplete="off" style="padding:15px !important;">
                                                                <option disabled="true">등급을 선택하세요.</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                        </div>


                        <div class="form-group">
                                <label for="">7. 침수/사고여부</label>

                                <div class="block">
                                        <div class="row">

                                                <div class="col-xs-6">
                                                        <div class="form-group">
                                                                <label for="">침수여부</label>
                                                                <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                                                        <label>
                                                                                <input type="checkbox" name="flooding"><span>침수차량일 경우 선택하세요</span>
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="col-xs-6">
                                                        <div class="form-group">
                                                                <label for="">사고여부</label>
                                                                <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                                                        <label>
                                                                                <input type="checkbox" name="accident"><span>사고차량일 경우 선택하세요</span>
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                        </div>






                        <div class="form-group">
                                <label for="">8. 차량옵션</label>

                                <div class="block">
                                        <ul class='order_option_wrap'>
                                                <li><strong>외관</strong>
                                                        @foreach($exterior_option as $exterior)
                                                        <div class='option_box'>
                                                                <label>
                                                                        <input type='checkbox' class='psk type2' value="{{ $exterior->id }}" name="options_ck[]">
                                                                        <span class='lbl' name="exterior_ck"> {{ $exterior->display() }}</span>
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                </li>
                                                <li><strong>내장</strong>
                                                        @foreach($interior_option as $interior)
                                                        <div class='option_box'>
                                                                <label>
                                                                        <input type='checkbox' class='psk type2' value="{{ $interior->id }}" name="options_ck[]">
                                                                        <span class='lbl' name="exterior_ck"> {{ $interior->display() }}</span>
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                </li>
                                                <li><strong>안전</strong>
                                                        @foreach($safety_option as $safety)
                                                        <div class='option_box'>
                                                                <label>
                                                                        <input type='checkbox' class='psk type2' value="{{ $safety->id }}" name="options_ck[]">
                                                                        <span class='lbl' name="exterior_ck"> {{ $safety->display() }}</span>
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                </li>
                                                <li><strong>편의</strong>
                                                        @foreach($facilities_option as $facilites)
                                                        <div class='option_box'>
                                                                <label>
                                                                        <input type='checkbox' class='psk type2' value="{{ $facilites->id }}" name="options_ck[]">
                                                                        <span class='lbl' name="exterior_ck"> {{ $facilites->display() }}</span>
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                </li>
                                                <li><strong>멀티미디어</strong>
                                                        @foreach($multimedia_option as $multimedia)
                                                        <div class='option_box'>
                                                                <label>
                                                                        <input type='checkbox' class='psk type2' value="{{ $multimedia->id }}" name="options_ck[]">
                                                                        <span class='lbl' name="exterior_ck"> {{ $multimedia->display() }}</span>
                                                                </label>
                                                        </div>
                                                        @endforeach
                                                </li>
                                        </ul>

                                        <small class='help-block'>※ 추후 가격 산정에 영향을 미치므로 아래 항목 중 장착되어 있는 옵션을 정확히 체크해 주세요.</small>
                                </div>
                        </div>

                        <p class="form-control-static text-center">
                                <button type="button" class='btn btn-default btn-lg wid25 order-page-back' data-index="0">이전</button>
                                <button type="button" class='btn btn-primary btn-lg wid25 order-page-move' data-index="2">다음</button>
                        </p>
                </fieldset>
        </div>
        <!-- pt-page pt-page-2 -->


        <div class="pt-page pt-page-3">

                <fieldset id="order-info-purchase">


                        <div class="form-group">
                                <label for="">9. 상품</label>

                                <div class="block">
                                        <div class="row">
                                                @foreach($items as $item)
                                                <div class="col-xs-3">
                                                        <div class="purchase-item purchase-item-product" data-index="{{ $item->id }}" data-price="{{ $item->price }}">
                                                                <div class="point-price">{{ $item->name }}</div>
                                                                <div class="point-desc text-muted">{{ number_format($item->price) }}원</div>
                                                        </div>
                                                </div>
                                                @endforeach
                                        </div>
                                </div>
                        </div>


                        <div class="form-group">
                                <label for="">10. 결제방법</label>

                                <div class="block">
                                        <div class="row">
                                                <div class="col-xs-4">
                                                        <div class="purchase-item purchase-item-method" id="card" data-index="11">
                                                                <div class="point-icon"><i class="fa fa-credit-card"></i></div>
                                                                <div class="point-desc text-muted">신용/체크카드</div>
                                                        </div>
                                                </div>
                                                <div class="col-xs-4">
                                                        <div class="purchase-item purchase-item-method" id="account" data-index="12">
                                                                <div class="point-icon"><i class="fa fa-krw"></i></div>
                                                                <div class="point-desc text-muted">실시간 계좌이체</div>
                                                        </div>
                                                </div>
                                                <div class="col-xs-4">
                                                        <div class="purchase-item purchase-item-method" id="coupon" data-index="21">
                                                                <div class="point-icon"><i class="fa fa-tags"></i></div>
                                                                <div class="point-desc text-muted">쿠폰결제</div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>


                        <p class="form-control-static text-center">
                                <button type="button" class='btn btn-default btn-lg wid25 order-page-back' data-index="1">이전</button>
                                <button type="button" class='btn btn-primary btn-lg wid25 bmd-modalButton' id="payment-process">결제</button>
                        </p>
                </fieldset>
        </div>
        <!-- pt-page pt-page-3 -->

        {!! Form::close() !!}

</div>


<div class="modal fade" id="modalSms" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h2 class="modal-title text-lg">휴대전화 번호 인증</h2>
                        </div>

                        <div class="modal-body" style="margin:50px 0px;">



                                <div class="row" style="margin-bottom:10px;">
                                        <div class="col-xs-6 col-xs-offset-3">
                                                <div class="input-group">
                                                        <span class="input-group-addon"><em id="time-clocks">180</em>초</span>
                                                        <input type="text" class="form-control input-lg" id="sms_num" placeholder='인증번호' value="{{ old('car_number') }}" name="sms_num">
                                                </div>



                                        </div>
                                </div>

                                <div class="row">
                                        <div class="col-xs-6 col-xs-offset-3">
                                                <button type="button" class='btn btn-primary btn-block btn-lg' id="modalSms-verify"><i class=" fa fa-check"></i> 인증</button>
                                        </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="modalSms-close">취소</button>

                        </div>
                </div>
        </div>
</div>

<div class="modal modal-lg fade" id="modalPurchase" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content bmd-modalContent">
                        <div class="modal-body">
                                <iframe class="embed-responsive-item" src="javascript:false;" name="purchase-frame" frameborder="0" width="648" height="590"></iframe>
                        </div>
                </div>
        </div>
</div>

<div class="modal fade" id="modal-coupon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h2 class="modal-title text-lg">쿠폰번호 입력</h2>
                        </div>

                        <div class="modal-body">
                                <form class="form-horizontal">

                                        <div class="form-group">
                                                <label for="exampleInputCoupon" class="sr-only">쿠폰 번호</label>
                                                <input type="text" class="form-control input-lg" id="coupon_number" placeholder='쿠폰번호를 입력해 주세요.' name="coupon_number">
                                                <span class="coupon-error text-center"></span>
                                        </div>

                                        <p class="form-control-static text-center">
                                                <button type="button" class="btn btn-default btn-lg" id="modal-coupon-close">취소</button>
                                                <button type="button" class='btn btn-primary btn-lg' id="modal-coupon-verify">인증</button>
                                                <button type="button" class='btn btn-warning  btn-lg' style="display: none;" id="coupon-process">쿠폰결제 진행하기
                                                </button>
                                        </p>
                                </form>
                        </div>
                </div>
        </div>
</div>


@endsection


@push( 'header-script' )
<style>
.bmd-modalContent {
        box-shadow: none;
        background-color: transparent;
        border: 0;
}

.bmd-modalContent iframe {
        display: block;
        margin: 0 auto;
}
</style>
@endpush


@push( 'footer-script' )
<script type="text/javascript">
var countdown;
var car_num_chk = function (car_num) {
        var pattern1 = /\d{2}[가-힣ㄱ-ㅎㅏ-ㅣ\x20]\d{4}/g; // 12저1234
        var pattern2 = /[가-힣ㄱ-ㅎㅏ-ㅣ\x20]{2}\d{2}[가-힣ㄱ-ㅎㅏ-ㅣ\x20]\d{4}/g; // 서울12치1233

        if (!pattern1.test(car_num)) {
                if (!pattern2.test(car_num)) {
                        return 1;
                }
                else {
                        return 2;
                }
        }
        else {
                return 2;
        }
}


$(document).ready(function () {

        $('.pt-page-1').show();
        $('.pt-page-2').hide();
        $('.pt-page-3').hide();

        $(document).on("click", ".order-page-move", function () {
                var n = $(this).data('index');
                var car_num = $('#car_number').val();

                // 1 depth 다음버튼
                if (n == '1') {

                        //사용자명
                        if (!$('#orderer_name').val()) {
                                alert('주문자명을 입력하세요.');
                                $('#orderer_name').focus();

                                // $('#orderer_name').closest('.form-group').addClass('has-error');
                                // $('#orderer_name').closest('.block').addClass('bg-danger');
                                //
                                return false;
                        }

                        //휴대폰 인증
                        if (!$('#sms_id').val()) {
                                alert('휴대전화번호를 확인해주세요.');
                                $('#orderer_mobile').focus();

                                // $('#orderer_mobile').closest('.form-group').addClass('has-error');
                                // $('#orderer_mobile').closest('.block').addClass('bg-danger');
                                return false;
                        }

                        // 입고대리점 검사
                        if (!$('#garages option:selected').val()) {
                                alert('입고대리점을 선택해주세요.');
                                $("#areas").focus();
                                return false;
                        }

                        // 입고희망일 검사
                        if (!$('#reservation_date').val()) {
                                alert('예약일을 선택해주세요.');
                                $("#reservation_date").focus();
                                return false;
                        }

                        $('.pt-page-1').fadeOut();
                        $('.pt-page-2').fadeIn();
                        $('#join_step li').eq(1).addClass('on');

                        return;
                }

                // 2 depth 다음버튼
                if (n == '2') {
                        // 차량번호 검사
                        if (car_num_chk(car_num) == 1) {
                                alert('차량번호를 정확히 입력해주세요.');
                                $('#car_number').focus();
                                return false;
                        }

                        // 차량 모델 검사
                        if (!$('#grades option:selected').val()) {
                                alert('차량 모델 정보를 선택하세요.');
                                $('#brands').focus();
                                return false;
                        }

                        $('.pt-page-2').fadeOut();
                        $('.pt-page-3').fadeIn();
                        $('#join_step li').eq(2).addClass('on');
                        return;
                }
        });


        $(document).on("click", ".order-page-back", function () {
                var n = $(this).data('index');

                // 1 depth 다음버튼
                if (n == '0') {
                        $('.pt-page-1').fadeIn();
                        $('.pt-page-2').fadeOut();
                        $('#join_step li').eq(1).removeClass('on');
                        return;
                }

                // 2 depth 다음버튼
                if (n == '1') {
                        $('.pt-page-2').fadeIn();
                        $('.pt-page-3').fadeOut();
                        $('#join_step li').eq(2).removeClass('on');

                        return;
                }
        });
});

$(function () {

        // 정비소 관련 리스트
        $('#areas').change(function () {
                var garage_area = $('#areas option:selected').text();

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_section/',
                        data: {
                                'garage_area': garage_area
                        },
                        success: function (data) {

                                //select box 초기화
                                $('#sections').html("");
                                $('#garages').html('<option disabled="true">대리점을 선택하세요.</option>');

                                $('#sel_area').val(garage_area);
                                $.each(data, function (key, value) {
                                        $('#sections').append($('<option/>', {
                                                value: value,
                                                text: value
                                        }));
                                });
                        },
                        error: function () {
                                alert('error');
                        }
                })
        });

        $('#sections').change(function () {
                var garage_area = $('#areas option:selected').text();
                var garage_section = $('#sections option:selected').text();

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_address/',
                        data: {
                                'sel_area': garage_area,
                                'sel_section': garage_section
                        },
                        success: function (data) {
                                //                    alert(JSON.stringify(data));
                                $('#garages').html("");

                                $.each(data, function (key, value) {
                                        $('#garages').append($('<option/>', {
                                                //                            value: value.id,
                                                value: key,
                                                text: value
                                        }))
                                });
                        },
                        error: function (data) {
                                alert('error');
                        }
                });
        });

        $('#garage_box').delegate('#garages option', 'click', function(){
                var garage_id = $(this).val();

                $.ajax({
                        type : 'get',
                        dataType : 'json',
                        url : '/order/get_full_address',
                        data : {
                                'garage_id' : garage_id
                        },
                        success : function (data){
                                // $('#select_garage').html('');
                                $('#select_garage').html('※ 선택하신 정비소의 주소 : '+data);
                        },
                        error : function (data){
                                alert(data);
                        }
                });
        });


        //sms 전송
        var timeCountdown = function () {

                clearInterval(countdown); //countdown 초기화

                var expired = 180;

                countdown = setInterval(function () {
                        var sms_id = $("#sms_id").val();
                        var sms_confirmed = $("#sms_confirmed").val();

                        if (expired == 0) {
                                $("#time-clocks").html(expired);
                                if (!sms_confirmed && sms_id) {
                                        //                         alert("인증코드 입력시간이 초과했습니다.\nSMS 인증을 다시 시도해 주세요." + expired);
                                        alert("인증코드 입력시간이 초과했습니다.\nSMS 인증을 다시 시도해 주세요.");

                                        smsTempDelete(sms_id);// 인증 번호관련 사항을 삭제함.
                                }
                                clearInterval(countdown);

                                $("#mobile-verification").prop('disabled', false); //인증버튼을 다시 풀어줌

                                return false;
                        } else {
                                if (!sms_confirmed) {
                                        $("#time-clocks").html(expired);
                                }
                        }
                        expired--;
                }, 1000);
        };

        // 휴대전화번호 인증
        $(document).on("click", "#mobile-verification", function () {
                var regExp = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;
                var number = $('#orderer_mobile').val();
                if (!regExp.test(number)) {
                        alert("잘못된 휴대폰 번호입니다. 숫자, - 를 포함한 숫자만 입력하세요.");
                        return false;
                }
                if (!number) {
                        alert("휴대전화번호를 입력하세요.");
                        return false;
                }

                $("#mobile-verification").prop('disabled', true);
                $('#mobile').val(number);
                $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '/order/send-sms',
                        data: {'mobile_num': number},
                        success: function (jdata) {
                                if (jdata.result == 'OK') {
                                        //time 체크 시작
                                        timeCountdown();

                                        $('#modalSms').modal({
                                                backdrop: 'static',
                                                keyboard: false,
                                                show: true
                                        });

                                        $('#sms_id').val(jdata.id);

                                } else {
                                        //                        console.log(jdata);
                                        alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");
                                        return false;
                                }
                        },
                        error: function (qXHR, textStatus, errorThrown) {
                                alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");
                                return false;
                        }
                });
        });


        // 인증취소
        $(document).on("click", "#modalSms-close", function () {


                var number = $('#orderer_mobile').val();

                try {
                        clearInterval(countdown);
                        $('#modalSms').modal('hide');
                } catch (e) {
                }


                // $.ajax({
                //         type: 'post',
                //         dataType: 'json',
                //         url: '/order/delete-sms',
                //         data: {'mobile_num': number},
                //         success: function (jdata) {
                //                 $('#modalSms').modal('hide');
                //                 $('#orderer_mobile').val("");
                //                 $("#mobile-verification").prop('disabled', false); //SMS 인증번호를 활성화 함
                //                 alert("인증번호 전송을 취소하였습니다.");
                //         },
                //         error: function (qXHR, textStatus, errorThrown) {
                //                 return false;
                //         },
                //         complete: function (e) {
                //                 $("#time-clocks").html(180);
                //         }
                // });

        });

        var smsTempDelete = function (sms_id) {
                if (sms_id) {
                        $.ajax({
                                type: 'post',
                                dataType: 'json',
                                url: '/order/delete-sms',
                                data: {'sms_id': sms_id},
                                success: function (jdata) {
                                        $('#modalSms').modal('hide');
                                }
                        });
                }

        };

        $(document).on("click", "#modalSms-verify", function () {
                var sms_num = $("#sms_num").val();
                if (sms_num) {
                        $.ajax({
                                type: 'post',
                                dataType: 'json',
                                url: '/order/is-sms',
                                data: {
                                        'sms_num': sms_num,
                                        'sms_id': $("#sms_id").val()
                                },
                                success: function (jdata) {
                                        if (jdata.result == 'OK') {
                                                $("#sms_confirmed").val(1);
                                                alert('휴대폰 인증이 완료 되었습니다. \n입고 대리점 및 입고 희망일을 선택해 주세요.');
                                                $('#modalSms').modal('hide');
                                                $("#orderer_mobile").prop('disabled', true);
                                        } else {
                                                alert('인증번호가 잘못 입력되었습니다.\n인증번호를 다시 입력해 주세요.');
                                                $("#sms_num").focus();
                                        }
                                },
                                error: function (qXHR, textStatus, errorThrown) {
                                        return false;
                                }
                        });
                } else {
                        alert('전송된 인증번호를 입력해 주세요.');
                        return false;
                }

        });


        // brands 선택 시
        $('#brands').change(function () {
                var brand = $('#brands option:selected').val();
                $('#brand_id').val(brand);
                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_models/',
                        data: {'brand': brand},
                        success: function (data) {
                                $('#models').html('');

                                $('#details').html('<option disabled="true">세부모델을 선택하세요.</option>');
                                $('#grades').html('<option disabled="true">등급을 선택하세요.</option>');

                                $.each(data, function (key, value) {
                                        $('#models').append($('<option/>', {
                                                value: value.id,
                                                text: value.name
                                        }));
                                });
                        },
                        error: function (data) {
                                alert('처리중 오류가 발생했습니다.');
                        }
                });
        });

        // models 선택 시
        $('#models').change(function () {

                var model = $('#models option:selected').val();
                $('#models_id').val(model);
                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_details/',
                        data: {'model': model},
                        success: function (data) {
                                $('#details').html('');
                                $('#grades').html('<option disabled="true">등급을 선택하세요.</option>');

                                $.each(data, function (key, value) {
                                        $('#details').append($('<option/>', {
                                                value: value.id,
                                                text: value.name
                                        }));
                                });

                        },
                        error: function (data) {
                                alert('처리중 오류가 발생했습니다.');
                        }
                });
        });

        // detail 선택 시
        $('#details').change(function () {
                var detail = $('#details option:selected').val();
                $('#detail_id').val(detail);
                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_grades/',
                        data: {'detail': detail},
                        success: function (data) {
                                $('#grades').html('');

                                $.each(data, function (key, value) {
                                        $('#grades').append($('<option/>', {
                                                value: value.id,
                                                text: value.name
                                        }));
                                });

                        },
                        error: function (data) {
                                alert('처리중 오류가 발생했습니다.');
                        }
                });
        });

        $('#grades').change(function () {
                var grade = $('#grades option:selected').val();
                $('#grade_id').val(grade);
                $('#car_full_name').val(
                        $('#brands option:selected').text() + " " +
                        $('#models option:selected').text() + " " +
                        $('#details option:selected').text() + " " +
                        $('#grades option:selected').text() + " "
                );
        });





        /////////////////////// 결제 관련

    // 상품선택
    $(document).on("click", ".purchase-item-product", function () {

        $('.purchase-item-product').removeClass("active");
        $(this).toggleClass("active");

        $('#item_id').val($(this).data("index"));
        $('#payment_price').val($(this).data("price"));
    });


    $(document).on("click", ".purchase-item-method", function () {
        $('.purchase-item-method').removeClass("active");
        $(this).toggleClass("active");
        var item_id = $('#item_id').val();

        if ($(this).data('index') == '21') { //쿠폰
            if(item_id.length != 0){
                $('#payment_method').val($(this).data("index"));
                $('#modal-coupon').modal();
            }else{
                alert('상품을 선택하세요.');
                $('#payment_method').val('');
                $(this).removeClass('active');
            }
        }else{
            $('#payment_method').val($(this).data("index"));
        }
    });

    //쿠폰 모달 제어

    $("#modal-coupon-close").on("click", function () {
        $("#coupon_number").val("");
        $('#payment_method').val('');
        $("#coupon").removeClass("active");
        $("#modal-coupon").modal('hide');
    });

    $("#modal-coupon-verify").on("click", function () {

        var coupon_number = $("#coupon_number").val();


        if (coupon_number.length > 9 && coupon_number.length < 21) {
            $.ajax({
                url: "/order/coupon-verify",
                type: "post",
                dataType: "json",
                data: {'coupon_number': coupon_number, '_token': '{{ csrf_token() }}'},
                success: function (jdata, textStatus, jqXHR) {
                    var verify = jdata.status;

                    if (verify === 'ok') {
                        //인증서 유효성 확인됨.

                        $("#use_coupon_number").val(jdata.coupon_number);
                        $("#coupon_id").val(jdata.id);

                        $(".coupon-error").css({'color': '#0b4777'});
                        //인증버튼을 결제처리 버튼으로 변경한다.

                        $("#modal-coupon-verify").attr("disabled", "disabled");
                        $("#coupon-process").show(0.5);

                    } else {
                        $(".coupon-error").css({'color': 'red'});
                        $("#coupon_number").select();

                    }
                    $(".coupon-error").text(jdata.msg);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $(".coupon-error").css({'color': 'red'});
                    $("#coupon_number").focus();
                    $(".coupon-error").text('쿠폰번호를 확인하지 못하였습니다.');
                }
            });
        } else {

            $(".coupon-error").css({'color': 'red'});
            $("#coupon_number").focus();
            $(".coupon-error").text('쿠폰번호를 확인해주세요');
        }

    });

    //쿠폰 결제 진행
    $("#coupon-process").on("click", function () {

        var use_coupon_number = $("#use_coupon_number").val();
        var coupon_id = $("#coupon_id").val();
        if (use_coupon_number && coupon_id) {
            $("#orderFrm").removeAttr("target");
            $("#orderFrm").attr("action", "{{ url("order/coupon-process") }}");
            $("#orderFrm").submit();
        }
    });


    $("#payment-process").on("click", function () {
                var item_id = $('#item_id').val();
                var payment_method = $('#payment_method').val();

                if(item_id.length == 0){
                    alert('상품을 선택하세요.');
                    $('#payment_method').val('');
                }else if(payment_method.length == 0){
                        alert('결제 방법을 선택하세요.');
                }else{
                        $('#modalPurchase').modal({
                                backdrop: 'static',
                                keyboard: false,
                                show: true,
                                width: 1000,
                                height: 1000
                        });
                }

        });


        $('#modalPurchase').on('show.bs.modal', function (event) {
                $('#orderFrm').attr('target', 'purchase-frame').submit();
        });


});

//########## Pikaday
$('.datepicker2').each(function (index, element) {
        var opt = {
                field: element,
                format: 'YYYY-MM-DD',
                minDate: moment().add(1, 'days').toDate(),
                disableWeekends: true,
                i18n: {
                        previousMonth: '이전달',
                        nextMonth: '다음달',
                        months: '1월.2월.3월.4월.5월.6월.7월.8월.9월.10월.11월.12월.'.split('.'),
                        weekdays: '월요일.화요일.수요일.목요일.금요일.토요일.일요일'.split('.'),
                        weekdaysShort: '일.월.화.수.목.금.토.'.split('.')
                },
        };

        if ($(this).data('format')) {
                opt.format = $(this).data('format');
        }

        new Pikaday(opt);
});

// 달력이미지 클릭
// $('#calendar-opener').click(function () {
//         $("#reservation_date").click();
// });


var paymentSubmit = function (orders_id, is_complete, action) {
        if (is_complete == undefined) {
                is_complete = 0;
        } else {
                is_complete = 1;
        }

        $("#orders_id").val(orders_id);

        $("#is_complete").val(is_complete);
        $("#modalPurchase").modal('hide');

        if (action == 1) {
                $("#orderFrm").attr("action", "/order/complete");
                $("#orderFrm").removeAttr("target");
                $('#orderFrm').submit();
        }
};


var paymentClose = function () {
        $("#modalPurchase").modal('hide');
}
</script>
@endpush
