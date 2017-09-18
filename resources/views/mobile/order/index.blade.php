@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>인증서 신청</div>

    <div class='br30'></div>

    <div id='sub_wrap'>

        <div class='join_wrap'>

            <ul class='join_step type'>
                <li class='on' id="s1">
                    <strong>01</strong>
                    <span>기본정보 입력</span>
                </li>
                <li id="s2">
                    <strong>02</strong>
                    <span>입고정보 선택</span>
                </li>
                <li id="s3">
                    <strong>03</strong>
                    <span>결제하기</span>
                </li>
                <li id="s4">
                    <strong>04</strong>
                    <span>주문완료</span>
                </li>
            </ul>

            <div class='br30'></div>

            {!! Form::open(['route' => ["order.payment-process"], 'class' =>'form-horizontal pt-perspective', 'method' => 'post', 'role' => 'form', 'id' => 'orderFrm', 'autocomplete' => 'off']) !!}
            <input type="hidden" name="brands" id="brands">
            <input type="hidden" name="models" id="models">
            <input type="hidden" name="details" id="details">
            <input type="hidden" name="grades" id="grades">
            <input type="hidden" id="brands_name">
            <input type="hidden" id="models_name">
            <input type="hidden" id="details_name">
            <input type="hidden" id="grades_name">
            <input type="hidden" id="items_id">

            <input type="hidden" name="areas" id="areas">
            <input type="hidden" name="sections" id="sections">
            <input type="hidden" name="garages" id="garages">

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

            <div class='order_info_box2'>
                <div class='order_info_title2'>
                    <strong>9. 상품</strong>
                </div>
                <div class='order_info_cont2'>
                    <div class="block">
                        <div class="row">
                            @foreach($items as $item)
                                <div class="col-xs-3">
                                    <div class="purchase-item purchase-item-product" data-index="{{ $item->id }}" data-price="{{ $item->price }}" disabled>
                                        <div class="point-price">{{ $item->name }}</div>
                                        <div class="point-desc text-muted">{{ number_format($item->price) }}원</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- 기본정보 입력 --}}
            <div id="step1">
                <div class='join_term_wrap'>
                    <label>1. 주문자명</label>
                    <div class='ipt_line br10'>
                        <input type='text' class='ipt' placeholder='주문자 이름' value="{{ $user->name }}" name="orderer_name" id="orderer_name" required>
                    </div>
                </div>

                <div class='br30'></div>

                <div class="join_term_wrap">
                    <label>2. 휴대전화번호</label>
                    <div class='ipt_mob_cert'>
                        <div><input type='text' class='ipt' placeholder='휴대폰 번호'name="orderer_mobile" id="orderer_mobile" required></div>
                        <button class='btns btns_skyblue' id="mobile-verification" type="button">인증번호 전송</button>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 휴대폰 번호 인증 시 주문 관리를 위한 용도로만 사용되며, 이외 목적으로 사용되지 않습니다.
                    </div>
                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>3. 입고대리점</label>
                    <div class='ipt_mob_cert'>
                        <div><input type='text' class='ipt bcs-select' id="garage-summary" readonly></div>
                        <button class='btns btns_skyblue bcs-select' type="button">입고대리점 선택</button>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 차량을 입고하고자하는 대리점을 설정해 주세요.
                    </div>


                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>4. 입고희망일</label>
                    <div class='ipt_dual_input br10'>
                        {{--<div style='width:70%;'>--}}
                            {{--<input type='date' class='ipt'>--}}
                        {{--</div>--}}
                        <div class="input-group input-group-lg" style='width:70%;'>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control datepicker2" data-format="YYYY-MM-DD"
                                   placeholder="{{ trans('web/order.reservation_date') }}" name='reservation_date'
                                   id="reservation_date" value='' style="margin-right: 5px;">

                        </div>
                        <div style='width:30%;'>
                            {!! Form::select('sel_time', $search_fields, [], ['id'=>'sel_time']) !!}
                        </div>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 희망일을 선택하시면 입력하신 휴대폰 번호로 해당 대리점에서 가능여부를 유선상으로 안내 후 확정해 드립니다.
                    </div>
                </div>



            </div>


            {{-- 기본 정보 입력 완료--}}

            {{-- 입고일/대리점 선택 --}}
            <div id="step2">

                <div class='join_term_wrap'>
                    <label>5. 차량번호</label>
                    <div class='ipt_line br10'>
                        <input type='text' class='ipt' id="car_number" placeholder='차량번호' value="{{ old('car_number') }}" name="car_number">
                    </div>
                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>6. 차량 모델</label>
                    <div class='ipt_mob_cert'>
                        <div><input type='text' class='ipt brand' id="car-summary" readonly></div>
                        <button class='btns btns_skyblue brand' type="button" id="brand">차량 모델 선택</button>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 소유하신 차량의 정확한 모델을 설정해 주세요.
                    </div>


                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>7. 침수/사고여부</label>
                    <div class='ipt_line br10'>

                        <div class="row row-tab">

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">침수여부</label>
                                    <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                        <label>
                                            <input name="flooding" type="checkbox"><span>침수차량일 경우 선택하세요</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">사고여부</label>
                                    <div class="checkbox checkbox-slider--c checkbox-slider-md">
                                        <label>
                                            <input name="accident" type="checkbox"><span>사고차량일 경우 선택하세요</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            {{--입고일/대리점 선택 완료--}}

            {{-- 결제폼 --}}
            <div id="step3">
                <div class='br20'></div>

                <div class='order_info_box2'>
                    <div class='order_info_title2'>
                        <strong>9. 상품</strong>
                    </div>
                    <div class='order_info_cont2'>
                        <div class="block">
                            <div class="row">
                                @foreach($items as $item)
                                    <div class="col-xs-3">
                                        <div class="purchase-item purchase-item-product" data-index="{{ $item->id }}" data-price="{{ $item->price }}" disabled>
                                            <div class="point-price">{{ $item->name }}</div>
                                            <div class="point-desc text-muted">{{ number_format($item->price) }}원</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class='br20'></div>

                <div class='join_term_wrap'>
                    <label>10. 결제방법</label>
                    <div class='br10'></div>
                    <div class='order_info_box2'>
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
            </div>

            <div class='br30'></div>

            <div class='ipt_line'>
                {{--<button class="btns btns_skyblue" type="button" style="display: none; width:30%;">이전</button> <button class='btns btns_green' style='display:inline-block;' id="step-btn" data-step="1" type="button">다음</button>--}}

                <div class="row">
                    <div class="col-md-6">
                        <p class="text-right"><button class="btns btns_skyblue" style="display:inline-block;" type="button" id="step-prev">이전</button></p>
                    </div>
                    <div class="col-md-6">
                        <button class="btns btns_green" style="display:inline-block;" id="step-btn" data-step="1" type="button">다음</button>
                    </div>
                </div>

            </div>

        </div>


    </div>

    {!! Form::close() !!}

    {{-- 모델선택 modal --}}

    <div class="modal fade pannel_brand_title" id="modal-brand" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class='pannel_title' style="cursor: pointer;">차량모델 선택<a class="close" data-dismiss="modal" style="margin-top: 15px; margin-right: 15px;color:#fff;">×</a></div>
                </div>

                <div class="modal-body">

                    <div class="panel-group" id="accordion-car">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-car" href="#collapse1">브랜드 선택 <span id="selected_brand" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">

                                <div class="panel-body">
                                    <ul id="brand-list" class="item_nav">
                                        @foreach($brands as $brand)
                                            {{--                                    <li class="brand_chk" data-value="{{ $brand->id }}" data-name="{{ $brand->name }}" data-toggle="collapse" href="#collapse2">{{ $brand->name }}</li>--}}
                                            <li class="brand_chk" data-value="{{ $brand->id }}" data-name="{{ $brand->name }}">{{ $brand->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-car" href="#collapse2">모델 선택 <span id="selected_model" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul id="model-list" class="item_nav"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-car" href="#collapse3">세부모델 선택 <span id="selected_detail" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul id="detail-list" class="item_nav"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-car" href="#collapse3">등급 선택 <span id="selected_grade" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul id="grade-list" class="item_nav"></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer"><p class="text-center"><button class="btns btns_skyblue" id="selected-car" type="button">차량선택 완료</button> <button class="btns btn-primary" data-dismiss="modal">닫기</button></p></div>
            </div>
        </div>
    </div>

    {{-- sms 모달 --}}

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

    {{-- 입고대리점 선택 모달 --}}

    <div class="modal fade pannel_brand_title" id="modal-bcs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class='pannel_title' style="cursor: pointer;">입고대리점 선택<a class="close" data-dismiss="modal" style="margin-top: 15px; margin-right: 15px;color:#fff;">×</a></div>
                </div>

                <div class="modal-body">

                    <div class="panel-group" id="accordion-bcs">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-bcs" href="#collapse1-bcs">시도 선택 <span id="selected_area" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse1-bcs" class="panel-collapse collapse in">

                                <div class="panel-body">
                                    <ul id="area-list" class="item_nav">
                                        @foreach($garages as $key => $garage)
                                            <li class="area_chk" data-value="{{ $garage->area }}" data-name="{{ $garage->area }}">{{ $garage->area }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-bcs" href="#collapse2-bcs">지역 선택 <span id="selected_section" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse2-bcs" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul id="section-list" class="item_nav"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-bcs" href="#collapse3-bcs">대리점 선택 <span id="selected_bcs" class="selected_item"></span></a>
                                </h4>
                            </div>
                            <div id="collapse3-bcs" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul id="bcs-list" class="item_nav"></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer"><p class="text-center"><button class="btns btns_skyblue" id="selected-bcs" type="button">입고대리점 선택</button> <button class="btns btn-primary" data-dismiss="modal">닫기</button></p></div>
            </div>
        </div>
    </div>

    {{-- 결제 모달 --}}
    <div class="modal modal-lg fade" id="modalPurchase" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bmd-modalContent">
                <div class="modal-body" style="width: 0px; height: 0px; padding: 0px;">
                    <iframe class="embed-responsive-item" src="javascript:false;" name="purchase-frame" frameborder="0" width="648" height="590"></iframe>
                </div>
            </div>
        </div>
    </div>

    {{-- 쿠폰 모달 --}}
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

@endpush

@push( 'footer-script' )

<script type="text/javascript">

    var countdown;

$(function () {
    $("#options").on("click", function () {
        $("#modal-option").modal();
    });

    //시도선택 모달
    $(".bcs-select").on("click", function () {
        $("#modal-bcs").modal();
    })
    //시도 선택
    $(".area_chk").on("click", function(){

        //지역,대리점 선택 초기화
        delete_section();

        var garage_area = $(this).data("value");

        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/order/get_section/',
            data: {
                'garage_area': garage_area
            },
            success: function (data) {

                $.each(data, function (key, value) {

                    $("#section-list").append($("<li/>", {
                        "data-value": value,
                        text: value,
                        "data-area": garage_area
                    }));
                });
            },
            error: function () {
                alert('error');
            },
            beforeSend: function () {
                $("#areas").val(garage_area);
                $("#selected_area").html("<li class='glyphicon glyphicon-ok'></li> " + garage_area);
            },
            complete: function () {
                $("#collapse1-bcs").collapse('hide');
                $("#collapse3-bcs").collapse('hide');
                $("#collapse2-bcs").collapse('show');
            }
        });
    });

    //지역 선택
    $("#section-list").delegate("li", "click", function(){

        //대리점 초기화
        delete_garage();

        var garage_section = $(this).data("value");
        var garage_area = $(this).data("area");

        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/order/get_address/',
            data: {
                'sel_area': garage_area,
                'sel_section': garage_section
            },
            success: function (data) {

                $.each(data, function (key, value) {
                    $('#bcs-list').append($('<li/>', {
                        "data-value": key,
                        text: value
                    }))
                });
            },
            error: function (data) {
                alert('error');
            },
            beforeSend: function(){
                $("#sectins").val(garage_section);
                $("#selected_section").html("<li class='glyphicon glyphicon-ok'></li> " + garage_section);
            },
            complete: function(){
                $("#collapse1-bcs").collapse('hide');
                $("#collapse2-bcs").collapse('hide');
                $("#collapse3-bcs").collapse('show');
            }
        });

    });

    //대리점 선택
    $("#bcs-list").delegate("li", "click", function(){
        var garage_id = $(this).data("value");
        var garage_name = $(this).text();
        $("#garages").val(garage_id);

        $("#bcs-list").css({'background': '#fff'});
        $(this).css({'background': '#efefef'});


        $.ajax({
            type : 'get',
            dataType : 'json',
            url : '/order/get_full_address',
            data : {
                'garage_id' : garage_id
            },
            success : function (data){
                if(data == 'error'){
                    alert('해당 대리점 주소를 수신하는데 실패하였습니다.');
                }else{
                    $("#garage-summary").val( data + ' ' + garage_name );
                }

            },
            error : function (data){
                alert(data);
            },
            complete: function(){
                $("#modal-bcs").modal("hide");
            }
        });

    });




    //브랜드선택 모달
    $(".brand").on("click", function () {
        $("#modal-brand").modal();
    });

    //brand 선택
    $(".brand_chk").on("click", function(){

        //모델,세부모델,등급 초기화
        delete_models();

        var brand_val = $(this).data("value");
        var brand_name = $(this).data("name");



        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/order/get_models/',
            data: {'brand': brand_val},
            success: function (data) {

                $.each(data, function (key, value) {
                    $('#model-list').append($('<li/>', {
                        "data-value": value.id,
                        text: value.name,
                        class: 'model_chk',
                        "data-name": value.name
                    }));
                });
            },
            error: function (data) {
                alert('처리중 오류가 발생했습니다.');
            },
            beforeSend: function(){
                $("#brands").val(brand_val);

                $("#selected_brand").html("<li class='glyphicon glyphicon-ok'></li> " + brand_name);

                $("#collapse1").collapse("hide");
            },
            complete: function () {
                $("#brands_name").val(brand_name);
                $("#collapse2").collapse('show');
            }
        });
    });

    //모델선택
    $("#model-list").delegate("li", "click", function(){

        //세부모델, 등급 초기화
        delete_details();

        var model_id = $(this).data("value");
        var model_name = $(this).data("name");


        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/order/get_details/',
            data: {'model': model_id},
            success: function (data) {

                $.each(data, function (key, value) {
                    $('#detail-list').append($('<li/>', {
                        "data-value": value.id,
                        text: value.name,
                        class: "detail_chk",
                        "data-name": value.name
                    }));
                });

            },
            error: function (data) {
                alert('처리중 오류가 발생했습니다.');
            },
            beforeSend: function(){
                $("#models").val(model_id);

                $("#selected_model").html("<li class='glyphicon glyphicon-ok'></li> " + model_name);

                $("#collapse2").collapse('hide');
            },
            complete: function(){
                $("#models_name").val(model_name);
                $("#collapse3").collapse('show');
            }
        });

    });

    //세부모델 선택
    $("#detail-list").delegate("li", "click", function(){

        //초기화
        delete_grades();

        var detail_id = $(this).data("value");
        var detail_name = $(this).data("name");

        console.log(detail_id, detail_name);
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/order/get_grades/',
            data: {'detail': detail_id},
            success: function (data) {

                console.log(data);
                $.each(data, function (key, value) {
                    $('#grade-list').append($('<li/>', {
                        "data-value": value.id,
                        text: value.name,
                        class: "grade_chk",
                        "data-name": value.name,
                        "data-items_id": value.items_id
                    }));
                });

            },
            error: function (data) {
                alert('처리중 오류가 발생했습니다.');
            },
            beforeSend: function(){

                $("#details").val(detail_id);
                $("#selected_detail").html("<li class='glyphicon glyphicon-ok'></li> " + detail_name);

                $("#collapse3").collapse('hide');
            },
            complete: function(){
                $("#details_name").val(detail_name);
                $("#collapse4").collapse('show');
            }
        });
    });

    //등급 선택
    $("#grade-list").delegate("li", "click", function(){
        var grade_id = $(this).data("value");
        $("#grades").val(grade_id);
        $("#grades_name").val($(this).data("name"));
        $("#items_id").val($(this).data("items_id"));

        $("#grade-list li").css({'background': '#fff'});
        $(this).css({'background': '#efefef'});
    });

    //모델선택 완료
    $("#selected-car").on("click", function(){
        if($("#brands").val() && $("#models").val() && $("#details").val() && $("#grades").val()){
            $("#car-summary").val(
                $("#brands_name").val() + ' > ' + $("#models_name").val()  + ' > ' +  $("#details_name").val()  + ' > ' +  $("#grades_name").val()
            );
            $("#modal-brand").modal("hide");
        }
    });


    //단계별 폼 validate
    $("#step-btn").on("click", function(){
        var current_step = parseInt($(this).data("step"));
        step_validate(current_step);
    });


    //sms 관련
    //sms 전송


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
        } catch (e) { }

    });



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

    //이전 버튼처리
    $("#step-prev").on("click", function(){
        var current_step = parseInt($("#step-btn").data("step"));

        if(current_step != 1){
            var prev_step = current_step -1;
            $("#step-btn").data("step", prev_step);
            $("#step"+current_step).fadeOut(function () {
                $("#step" + prev_step).fadeIn(function () {
                    $("#s" + current_step).removeClass("on");
                });
            });
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

});

/**
 * model 이하를 모두 삭제하기
 */
var delete_models = function(){
//    alert('model');
    $("#models").val('');
    delete_details(); //세부모델 이하 모두 삭제

    $("#collapse3").collapse('hide');
    $("#detail-list li").remove();
    $("#selected_model").html('');
};
/**
 *
 */
var delete_details = function(){
//    alert('detail');
    $("#details").val('');
    delete_grades(); //등급 관면 모두 삭제

    $("#collapse4").collapse('hide');
    $("#detail-list li").remove();
    $("#selected_detail").html('');
};
/**
 * grade 관련 내용을 모두 삭제하기
 */
var delete_grades = function(){
//    alert('grade');
    $("#grades").val('');
    $("#grade-list li").remove();

};

/**
 * 지역 이하 모두 초기화
 */
var delete_section = function(){
   $("#sections").val('');
   delete_garage();

   $("#section-list li").remove();
};

/**
 * 대리점 정보 모두 초기화
 */
var delete_garage = function(){
    $("#garages").val('');
    $("#bcs-list li").remove();
};

/**
 * 각 입력폼 확인 및 제어
 * @param current_step int step 단계
 */
var step_validate = function(current_step){

    var is_valid = false;

    if(current_step == 1){
        //사용자명
        if (!$('#orderer_name').val()) {
            alert('주문자명을 입력하세요.');
            $('#orderer_name').focus();
            return;
        }

        //휴대폰 인증
        if (!$('#sms_id').val()) {
            alert('휴대전화번호를 확인해주세요.');
            $('#orderer_mobile').focus();
            return;
        }

        // 입고대리점 검사
        if (!$('#garages').val()) {
            alert('입고대리점을 선택해주세요.');
            $("#areas").focus();
            return;
        }

        // 입고희망일 검사
        if (!$('#reservation_date').val()) {
            alert('예약일을 선택해주세요.');
            $("#reservation_date").focus();
            return;
        }

        is_valid = true;

    }else if(current_step == 2){

        if (car_num_chk($("#car_number").val()) == 1) {
            alert('차량번호를 정확히 입력해주세요.');
            $('#car_number').focus();
            return;
        }

        // 차량 모델 검사
        if (!$('#grades').val()) {
            alert('차량 모델 정보를 선택하세요.');
            $('#brands').focus();
            return;
        }
        is_valid = true;

    }else if(current_step == 3){

        if(!$("#payment_price").val()){
            alert('상품을 선택해 주세요.');
            return;
        }
        if(!$("#payment_method").val()){
            alert('결제방법을 선택해 주세요.');
            return;
        }
//        //결제모달을 띄움
//        $('#modalPurchase').modal({
//            backdrop: 'static',
//            keyboard: false,
//            show: true,
//            width: 1000,
//            height: 1000
//        });
//
//        $('#orderFrm').attr('target', 'purchase-frame').submit();
//        $('#modalPurchase').on('show.bs.modal', function (event) {
//
//        });
        $('#orderFrm').submit();

    }else{
        if(confirm('잘못된 접근입니다.\n새로고침 하시겠습니까?')){
            location.reload();
        }
    }

    if(is_valid === true){
        var next_step = parseInt(current_step) + 1;

        $("#step-btn").data("step", next_step);
        $("#step" + current_step).fadeOut(function(){
            $("#step" + next_step).fadeIn(function () {
                $("#s"+next_step).addClass("on");
            });
        });
    }else{
    }


}

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