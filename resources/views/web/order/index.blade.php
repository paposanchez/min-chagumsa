@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>


<div id='sub_wrap'>

    <div class='join_wrap order-container'>

        <ul class='join_step' id="join_step">
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


        {!! Form::open(['route' => ["order.payment-popup"], 'target'=>'purchase-frame', 'class' =>'form-horizontal pt-perspective',  'method' => 'post', 'role' => 'form', 'id' => 'orderFrm']) !!}
{{--        {!! Form::open(['route' => ["order.complete"], 'target'=>'purchase-frame', 'class' =>'form-horizontal pt-perspective',  'method' => 'post', 'role' => 'form', 'id' => 'orderFrm']) !!}--}}


        <input type="hidden" name="item_id" id="item_id" value="" >
        <input type="hidden" name="payment_price" id="payment_price" value="" >
        <input type="hidden" name="payment_method" id="payment_method" value="" >
        <input type="hidden" name="sms_id" id="sms_id" autocomplete="off">
        <input type="hidden" name="sms_confirmed" id="sms_confirmed" value="" autocomplete="off">
        <input type="hidden" name="is_complete" id="is_complete" value="" autocomplete="off" >
        <input type="hidden" name="orders_id" id="orders_id" value="" autocomplete="off" >


<!--         <input name="cars_id" value="" type="hidden">
        <input name="id" id="moid" type="hidden" value="">{{-- 주문번호 --}}
        <input name="goodsName" id="goodsName" type="hidden" value="">{{-- 상품명 --}}
        <input name="buyerName" id="buyerName" type="hidden" value="">{{-- 구매자명 --}}
        <input name="buyerTel" id="buyerTel" type="hidden" value="">{{-- 구매자연락처 --}}
        <input name="buyerEmail" id="buyerEmail" type="hidden" value="">{{-- 구매자메일주소 --}}
        <input name="userIp" id="userIp" type="hidden" value="{{ $_SERVER['REMOTE_ADDR'] }}">{{--  --}}
        <input type="hidden" name="amt" id="amt" autocomplete="off">
        <input type="hidden" name="product_name" id="product_name" autocomplete="off">
 -->

        <div class="pt-page pt-page-1">
        <fieldset id="purchase-orderinfo" >

            <div class="row">

                <div class="col-xs-6">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">주문자명</label>
                        <input type="text" class="form-control input-lg" id="exampleInputEmail1 " laceholder='주문자 이름' value="{{ $user->name }}" name="orderer_name">
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">휴대전화번호</label>

                        <div class="input-group input-group-lg">                  
                            <input type='text' id="orderer_mobile" class='form-control ' name="orderer_mobile" placeholder='휴대폰 번호' value="" autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-default2" type="button" id="mobile-verification">인증번호 전송</button>
                            </span>
                        </div>
                    </div>
                </div>

            </div> 

            <div class="form-group">
                    <label for="exampleInputEmail1" class="">입고대리점</label>


                    <div class="row no-margin-bottom">

                        <div class="col-xs-4">
                            {{--{!! Form::select('sel_area', $garages, [], ['class'=>'form-control', 'size'=>"5",   'id'=>'sel_area']) !!}--}}
                            <select class="form-control" size="5" id="areas" name="areas" autocomplete="off">
                                @foreach($garages as $key => $garage)
                                    {{--<option value="{{ $garage->id }}">{{ $garage->area }}</option>--}}
                                    <option value="{{ $garage->area }}">{{ $garage->area }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-xs-4">
                            {{--{!! Form::select('sel_section', [""=> "구군을 선택하세요"], [], ['class'=>'form-control', 'size'=>"5",  'id'=>'sel_section']) !!}--}}
                            <select class="form-control" size="5" id="sections" name="sections"  autocomplete="off">
                                <option disabled="true">구/군을 선택하세요.</option>
                            </select>
                        </div>

                        <div class="col-xs-4">
{{--                            {!! Form::select('garage', [""=> "대리점을 선택하세요"], [], ['class'=>'form-control', 'size'=>"5",  'id'=>'garage']) !!}--}}
                            <select class="form-control" size="5" id="garages" name="garages"  autocomplete="off">
                                <option disabled="true">대리점을 선택하세요.</option>
                            </select>
                        </div>

                    </div>

                </div>




                <div class="form-group">

                    <label for="exampleInputEmail1" style="width:100%;">입고희망일 
                        <small class='text-info pull-right'>{{ trans('web/order.reservation_info') }}</small>
                    </label>

                    <div class="row">
                        <div class="col-xs-9">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control datepicker2" data-format="YYYY-MM-DD" placeholder="{{ trans('web/order.reservation_date') }}" name='reservation_date' id="reservation_date" value='' style="margin-right: 5px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-default2" type="button" id="calendar-opener"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="input-group-lg">

                                {!! Form::select('sel_time', $search_fields, [], ['class'=>'form-control ', 'id'=>'sel_time']) !!}

                            </div>

                        </div>
                    </div>



                </div>


            <p class="form-control-static text-center">
                <button type="button" class='btn btn-primary2 btn-lg wid25  order-page-move' data-index="1">다음</button>
            </p>


        </div>
        </fieldset>
        <!-- pt-page pt-page-1 -->


    <div class="pt-page pt-page-2" style="height:1200px;" >

            <fieldset id="order-info-order">


            <div class="form-group">
                <label for="exampleInputEmail1">차량번호</label>
                <input type="text" class="form-control input-lg wid50" id="car_number" placeholder='차량번호' value="{{ old('car_number') }}" name="car_number">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1" class="">모델정보</label>


                <div class="row no-margin-bottom">

                    <div class="col-xs-3">
                        <select class="form-control" id="brands" name="brands" autocomplete="off" size="5">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-xs-3">
                        <select class="form-control " id="models" name="models" autocomplete="off" size="5">
                        <option disabled="true">모델을 선택하세요.</option>
                        </select>
                    </div>

                    <div class="col-xs-3">
                        <select class="form-control " id="details" name="details" size="5" autocomplete="off">
                        <option disabled="true">세부모델을 선택하세요.</option>
                        </select>
                    </div>

                    <div class="col-xs-3">
                        <select class="form-control " id="grades" name="grades" size="5" autocomplete="off">
                        <option disabled="true">등급을 선택하세요.</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">침수여부</label>
                        <div class="checkbox checkbox-slider--c checkbox-slider-md">
                            <label>
                                <input type="checkbox" name="flooding"><span>침수차량일 경우 선택하세요</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">사고여부</label>
                        <div class="checkbox checkbox-slider--c checkbox-slider-md">
                            <label>
                                <input type="checkbox" name="accident"><span>사고차량일 경우 선택하세요</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">차량옵션 
                    <small class='text-danger pull-right'>추후 가격 산정에 영향을 미치므로 아래 항목 중 장착되어 있는 옵션을 정확히 체크해 주세요.</small>
                </label>
            
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
              

            </div>


                <p class="form-control-static text-center">
                    <button type="button" class='btn btn-default2 btn-lg wid25 order-page-move' data-index="0">이전</button>
                    <button type="button" class='btn btn-primary2 btn-lg wid25 order-page-move' data-index="2">다음</button>
                </p>
            </fieldset>
        </div>
        <!-- pt-page pt-page-2 -->


        <div class="pt-page pt-page-3" >

            <fieldset id="order-info-purchase">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="">상품</label>

                    <div class="row">
                        @foreach($items as $item)
                        <div class="col-xs-3">
                            {{--<div class="purchase-item purchase-item-product" data-index="{{ $item->id }}" data-display="3">--}}
                            <div class="purchase-item purchase-item-product" data-index="{{ $item->id }}" data-price="{{ $item->price }}">
                                <div class="point-price">{{ $item->name }}</div>
                                <div class="point-desc text-muted">{{ number_format($item->price) }}원</div>
                            </div>
                        </div>
                        @endforeach
                    </div>                

                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1" class="">결제방법</label>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="purchase-item purchase-item-method" data-index="11">
                                <div class="point-icon"><i class="fa fa-credit-card"></i></div>
                                <div class="point-desc text-muted">신용/체크카드</div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="purchase-item purchase-item-method" data-index="12">
                                <div class="point-icon"><i class="fa fa-krw"></i></div>
                                <div class="point-desc text-muted">실시간 계좌이체</div>
                            </div>
                        </div>
                    </div>                

                </div>

                <p class="form-control-static text-center">
                    <button type="button" class='btn btn-default2 btn-lg wid25 order-page-move' data-index="1">이전</button>
                    <button type="button" class='btn btn-primary2 btn-lg wid25 bmd-modalButton' id="payment-process">결제</button>
                </p>
            </fieldset>
        </div>
        <!-- pt-page pt-page-3 -->

        {!! Form::close() !!}

    </div>

</div>









<div class="modal fade" id="modalSms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center">휴대전화번호 인증</h2>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="sr-only">인증번호</label>
                        <p class="text-center form-control-static"><span id="time-clocks">300</span> 초</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="sr-only">인증번호</label>
                        <input type="text" class="form-control input-lg" id="sms_num" placeholder='인증번호' value="{{ old('car_number') }}" name="sms_num">
                    </div>

                    <p class="form-control-static text-center">
                        <button type="button" class="btn btn-default2 btn-lg" id="modalSms-close">취소</button>
                        <button type="button" class='btn btn-primary2 btn-lg' id="modalSms-verify">인증</button>
                    </p>
                </form>
            </div>
                        <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-success">Save changes</button>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div> -->
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



@endsection


@push( 'header-script' )

{{ Html::style(Helper::assets( 'vendor/tympanus/css/component.css' )) }}
{{ Html::style(Helper::assets( 'vendor/tympanus/css/animations.css' )) }}

<style>
.pt-perspective {
    /*min-height:1000px;*/
    min-height:800px;
    
}
.pt-page {
    /*height:1200px;*/
    background: transparent !important;
}

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
{{ Html::script(Helper::assets( 'vendor/tympanus/js/modernizr.custom.js' )) }}

<script type="text/javascript">


var PageTransitions = (function() {

    var $main = $( '#orderFrm' ),
        $pages = $main.children( 'div.pt-page' ),
        $paginator = $("#join_step li"),
        animcursor = 1,
        pagesCount = $pages.length,
        current = 0,
        isAnimating = false,
        endCurrPage = false,
        endNextPage = false,
        animEndEventNames = {
            'WebkitAnimation' : 'webkitAnimationEnd',
            'OAnimation' : 'oAnimationEnd',
            'msAnimation' : 'MSAnimationEnd',
            'animation' : 'animationend'
        },
        // animation end event name
        animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
        // support css animations
        support = Modernizr.cssanimations;
    
    function init() {

        $pages.each( function() {
            var $page = $( this );
            $page.data( 'originalClassList', $page.attr( 'class' ) );
        } );

        $pages.eq( current ).addClass( 'pt-page-current' );

    }

    function nextPage(options ) {
        var animation = (options.animation) ? options.animation : options;

        if( isAnimating ) {
            return false;
        }

        isAnimating = true;
        
        var $currPage = $pages.eq( current );


        if(options.showPage) {
            current = options.showPage;
        }else{
            current = 0;
        }

        // if(options.showPage){
        //     if( options.showPage < pagesCount - 1 ) {
        //         current = options.showPage;
        //     }
        //     else {
        //         current = 0;
        //     }
        // }
        // else{
        //     if( current < pagesCount - 1 ) {
        //         ++current;
        //     }
        //     else {
        //         current = 0;
        //     }
        // }

//        console.log(current);

        $.each($paginator, function(i, obj){

            if(i <= current) {
                $(obj).addClass('on');
            }else{
                $(obj).removeClass('on');
            }

        });



        var $nextPage = $pages.eq( current ).addClass( 'pt-page-current' ),
            outClass = '', inClass = '';

        switch( animation ) {

            case 'back':
              outClass = 'pt-page-rotateSlideOut';
                inClass = 'pt-page-rotateSlideIn';
                break;
           
            default:
                outClass = 'pt-page-rotateSlideOut';
                inClass = 'pt-page-rotateSlideIn';
                break;
        }


        $currPage.addClass( outClass ).on( animEndEventName, function() {
            $currPage.off( animEndEventName );
            endCurrPage = true;
            if( endNextPage ) {
                onEndAnimation( $currPage, $nextPage );
            }
        } );

        $nextPage.addClass( inClass ).on( animEndEventName, function() {
            $nextPage.off( animEndEventName );
            endNextPage = true;
            if( endCurrPage ) {
                onEndAnimation( $currPage, $nextPage );
            }
        } );

        if( !support ) {
            onEndAnimation( $currPage, $nextPage );
        }

    }

    function onEndAnimation( $outpage, $inpage ) {
        endCurrPage = false;
        endNextPage = false;
        resetPage( $outpage, $inpage );
        isAnimating = false;
    }

    function resetPage( $outpage, $inpage ) {
        $outpage.attr( 'class', $outpage.data( 'originalClassList' ) );
        $inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' );
    }

    init();

    return { 
        init : init,
        nextPage : nextPage,
    };

})();

var countdown;

    $(function (){

        $(document).on("click", ".order-page-move", function() {
            var n = $(this).data('index');
            var car_num = $('#car_number').val();
            var d = {
                'showPage' : n
            };
            // 이전버튼
            if( n== '0') {
                d.animation = 'back';
                PageTransitions.nextPage(d);
            }
            // 1 depth 다음버튼
            else if(n == 1){
                //휴대폰 인증
                if(!$('#sms_id').val()){
                    alert('sms인증을 확인해주세요.');
                    $('#orderer_mobile').focus();
                    return false;
                }

                // 입고대리점 검사
                else if(!$('#garages option:selected').val()){
                    alert('입고대리점을 선택해주세요.');
                    $("#areas").focus();
                    return false;
                }

                // 입고희망일 검사
                else if(!$('#reservation_date').val()){
                    alert('예약일을 선택해주세요.');
                    $("#reservation_date").focus();
                    return false;
                }else{
                    $('.pt-perspective').css('min-height', '1000px');
                    PageTransitions.nextPage(d);
                }
            }
            // 2 depth 다음버튼
            else if( n == '2'){
                // 차량번호 검사
                if(car_num_chk(car_num) == 1){
                    alert('차량번호를 정확히 입력해주세요.');
                    $('#car_number').focus();
                    return false;
                }
                // 차량 모델 검사
                else if(!$('#grades option:selected').val()){
                    alert('차량 모델 정보를 선택하세요.');
                    $('#brands').focus();
                    return false;
                }else{
                    $('.pt-perspective').css('min-height', '800px');
                    PageTransitions.nextPage(d);
                }

            }
            // 3, 4 버튼
            else {
                PageTransitions.nextPage(d);
            }
//            PageTransitions.nextPage(d);

        });

        var car_num_chk = function(car_num)
        {
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

        // 상품선
        $(document).on("click", ".purchase-item-product", function() {

            $('.purchase-item-product').removeClass("active");
            $(this).toggleClass("active");

            $('#item_id').val($(this).data("index"));
            $('#payment_price').val($(this).data("price"));
        });


        $(document).on("click", ".purchase-item-method", function() {
            $('.purchase-item-method').removeClass("active");
            $(this).toggleClass("active");
            $('#payment_method').val($(this).data("index"));

        });


        // 정비소 관련 리스트
        $('#areas').change(function () {
            var garage_area = $('#areas option:selected').text();

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/get_section/',
                data : {
                    '_token': '{{ csrf_token() }}',
                    'garage_area' : garage_area
                },
                success : function (data) {
                    //select box 초기화
                    $('#sections').html("");
                    $('#garages').html('<option disabled="true">대리점을 선택하세요.</option>');

                    $('#sel_area').val(garage_area);
                    $.each(data, function (key, value) {
                        $('#sections').append($('<option/>', {
//                            value: value.id,
                            value: value.section,
                            text : value.section
                        }));
                        // garage list append
//                        $('#garages').append($('<option/>', {
//                            value: value.id,
//                            text : value.name
//                        }))
                    });
                },
                error : function () {
                    alert('error');
                }
            })
        });

        $('#sections').change(function () {
            var garage_area = $('#areas option:selected').text();
            var garage_section = $('#sections option:selected').text();

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/get_address/',
                data : {
                    'sel_area' : garage_area,
                    'sel_section' : garage_section,
                    '_token': '{{ csrf_token() }}'
                },
                success : function (data){
                    $('#garages').html("");

                    $.each(data, function (key, value) {
                        $('#garages').append($('<option/>', {
//                            value: value.id,
                            value: value.name,
                            text : value.name
                        }))
                    });
                },
                error : function (data) {
                    alert('error');
                }
            });
        });




         //sms 전송
         var timeCountdown = function(){

             clearInterval(countdown); //countdown 초기화

             var expired = 180;

             countdown = setInterval(function(){
                 var sms_id = $("#sms_id").val();
                 var sms_confirmed = $("#sms_confirmed").val();

                 if(expired == 0){
                     $("#time-clocks").html(expired);
                     if(!sms_confirmed && sms_id){
//                         alert("인증코드 입력시간이 초과했습니다.\nSMS 인증을 다시 시도해 주세요." + expired);
                         alert("인증코드 입력시간이 초과했습니다.\nSMS 인증을 다시 시도해 주세요.");

                         smsTempDelete(sms_id);// 인증 번호관련 사항을 삭제함.
                     }
                     clearInterval(countdown);
                     $("#mobile-verification").prop('disabled', false); //인증버튼을 다시 풀어줌
                     return false;
                 }else {
                     if (!sms_confirmed) {
                         $("#time-clocks").html(expired);
                     }
                 }
                 expired--;
             }, 1000);
         };

        // 휴대전화번호 인증
        $(document).on("click", "#mobile-verification", function() {
            var regExp = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;
            var number = $('#orderer_mobile').val();
            if(!regExp.test(number)){
                alert("잘못된 휴대폰 번호입니다. 숫자, - 를 포함한 숫자만 입력하세요.");
                return false;
            }
            if(!number) {
                alert("휴대전화번호를 입력하세요.");
                return false;
            }

            $("#mobile-verification").prop('disabled', true);

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/order/send-sms',
                data: {'mobile_num': number} ,
                success: function(jdata){
                    if(jdata.result == 'OK'){
                        //time 체크 시작
                        timeCountdown();

                        $('#modalSms').modal({
                          backdrop: 'static',
                          keyboard: false,
                          show : true
                        });

                        $('#sms_id').val(jdata.id);

                    }else{
//                        console.log(jdata);
                        alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");                       
                        return false;
                    }
                },
                error: function(qXHR, textStatus, errorThrown){
                    alert("SMS 전송을 실패하였습니다.\n 핸드폰 번호 확인 후 '인증번호 전송버튼'을 클릭해 주세요.");
                    return false;
                }
            });
        });


        // 인증취소
        $(document).on("click", "#modalSms-close", function() {



            var number = $('#orderer_mobile').val();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: '/order/delete-sms',
                data: {'mobile_num': number} ,
                success: function(jdata){
                    $('#modalSms').modal('hide');
                    $('#orderer_mobile').val("");
                    $("#mobile-verification").prop('disabled', false); //SMS 인증번호를 활성화 함
                    alert("인증번호 전송을 취소하였습니다.");
                },
                error: function(qXHR, textStatus, errorThrown){
                    return false;
                }
            });

        });

        var smsTempDelete = function(sms_id){
            if(sms_id){
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/order/delete-sms',
                    data: {'sms_id': sms_id, '_token': "{{ csrf_token() }}"},
                    success: function(jdata){
                        $('#modalSms').modal('hide');
                    }
                });
            }

        };

        $(document).on("click", "#modalSms-verify", function() {
            var sms_num = $("#sms_num").val();
            if(sms_num){
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '/order/is-sms',
                    data: {
                        'sms_num': sms_num,
                        'sms_id': $("#sms_id").val(),
                        "_token": "{{ csrf_token() }}"
                    } ,
                    success: function(jdata){
                        if(jdata.result == 'OK'){
                            $("#sms_confirmed").val(1);
                            alert('인증이 완료 되었습니다.\n차량정보를 입력헤 주세요.');
                            $('#modalSms').modal('hide');
                            $("#orderer_mobile").prop('disabled', true);
                        }else{
                            alert('인증번호가 잘못 입력되었습니다.\n인증번호를 다시 입력해 주세요.');
                            $("#sms_num").focus();
                        }
                    },
                    error: function(qXHR, textStatus, errorThrown){
                        return false;
                    },
//                    complete: function(){
//                        $('#modalSms').modal('hide');
//                    }
                });
            }else{
                alert('전송된 인증번호를 입력해 주세요.');
            }

        });



        $('#modalSms').on('show.bs.modal', function (event) {
          // var button = $(event.relatedTarget) // Button that triggered the modal
          // var recipient = button.data('whatever') // Extract info from data-* attributes
          // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          // var modal = $(this)
          // modal.find('.modal-title').text('New message to ' + recipient)
          // modal.find('.modal-body input').val(recipient)
        });



    

        // brands 선택 시
        $('#brands').change(function(){
            var brand = $('#brands option:selected').val();
            $('#brand_id').val(brand);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_models/',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    'brand' : brand
                },
                success: function(data){
                    $('#models').html('');

                    $('#details').html('<option disabled="true">세부모델을 선택하세요.</option>');
                    $('#grades').html('<option disabled="true">등급을 선택하세요.</option>');

                    $.each(data, function (key, value) {
                        $('#models').append($('<option/>', {
                            value: value.id,
                            text : value.name
                        }));
                    });
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        // models 선택 시
        $('#models').change(function(){

            var model = $('#models option:selected').val();
            $('#models_id').val(model);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_details/',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    'model' : model
                },
                success: function(data){
                    $('#details').html('');
                    $('#grades').html('<option disabled="true">등급을 선택하세요.</option>');

                    $.each(data, function (key, value) {
                        $('#details').append($('<option/>', {
                            value: value.id,
                            text : value.name
                        }));
                    });

                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        // detail 선택 시
        $('#details').change(function(){
            var detail = $('#details option:selected').val();
            $('#detail_id').val(detail);
            $.ajax({
                type : 'get',
                dataType: 'json',
                url: '/order/get_grades/',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    'detail' : detail
                },
                success: function(data){
                    $('#grades').html('');

                    $.each(data, function (key, value) {
                        $('#grades').append($('<option/>', {
                            value: value.id,
                            text : value.name
                        }));
                    });

                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }});
        });

        $('#grades').change(function(){
            var grade = $('#grades option:selected').val();
            $('#grade_id').val(grade);
            $('#car_full_name').val(
                $('#brands option:selected').text()+" "+
                $('#models option:selected').text()+" "+
                $('#details option:selected').text()+" "+
                $('#grades option:selected').text()+" "
            );
        });



        $("#payment-process").on("click", function(){

            var u = "{{ route('order.payment-popup') }}";

            // $('#orderFrm').submit();

             $('#modalPurchase').modal({
              backdrop: 'static',
              keyboard: false,
              show : true,
              width : 1000,
              height : 1000
            });

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
            i18n: {
                previousMonth: '이전달',
                nextMonth: '다음달',
                months: '1월.2월.3월.4월.5월.6월.7월.8월.9월.10월.11월.12월.'.split('.'),
                weekdays: '월요일.화요일.수요일.목요일.금요일.토요일.일요일'.split('.'),
                weekdaysShort: '월.화.수.목.금.토.일.'.split('.')
            },
        };

        if ($(this).data('format')) {
            opt.format = $(this).data('format');
        }

        new Pikaday(opt);
    });


    var paymentSubmit = function (orders_id, is_complete, action) {
        if( is_complete == undefined){
            is_complete = 0;
        }else{
            is_complete = 1;
        }

        $("#orders_id").val(orders_id);

        $("#is_complete").val(is_complete);
        $("#modalPurchase").modal('hide');

        if(action == 1){
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
