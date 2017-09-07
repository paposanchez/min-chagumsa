@extends( 'mobile.layouts.default' )

@section( 'content' )







    <div id='main_wrap'>


        <div id='main_visual_wrap'>
            <div class='main_visual'>
                {{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/mv_text.png")) }}
            </div>
        </div>

        <div class='mv_cert_wrap'>
            <div class='mv_cert_box'>
                <a href='' class='mv_cert_btn1'>카검사 인증서 신청하기</a>
            </div>
            <div class='br10'></div>
            <div class='mv_cert_box'>
                <div class='mv_cert_search_wrap'>
                    <input type='text' placeholder='인증서번호 또는 차량번호'>
                    <button type='submit'><i class="fa fa-search" ></i></button>
                </div>
            </div>
        </div>
        <div class='br10'></div>

        <div id='main_service_wrap'>
            <nav>	<div class="msb_prev"></div><div class="msb_next"></div></nav>
            <div class='main_service_box' id='msb_1'>
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon1.png")) }}</div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile('/img/main/msb_text1.png')) }}</div>
            </div>
            <div class='main_service_box' id='msb_2'>
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon2.png")) }}</div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_text2.png")) }}</div>
            </div>
            <div class='main_service_box' id='msb_3'>
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon3.png")) }}'></div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_text3.png")) }}'></div>
            </div>
        </div>

        <div id="main_standard_wrap">
            <div class='main_standard'>
                <strong>중고차 거래의<br><span>새로운 방법을</span> 제시합니다</strong>
                <p>중고차  가치산정에 대한 정확하고 공정한 판단 기준  카검사 인증서!</p>
                <div class='br10'></div>
                <ul>
                    <li>차량 등록정보</li>
                    <li>사고수리</li>
                    <li>주요패널 상태</li>
                    <li>침수흔적</li>
                    <li>차량리콜</li>
                    <li>차량엔진 상태</li>
                    <li>주요부품 작동상태</li>
                    <li>주요소모품 상태</li>
                    <li>차량외관/실내상태</li>
                    <li>종합의견 적정가격</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- ───────────────────────────────────────────────────────────────── -->




@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )



{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/main.js' )) }}--}}
{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/modernizr.custom.53451.js' )) }}--}}
{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/jquery.gallery.js' )) }}--}}
<script type="text/javascript">
//    $(function () {
//        $("#slide-menu").on("click", function(){
//            alert('aaaa');
//            $("#navi_wrap").show(function(){
//                this.css("z-index", 1000);
//            });
//        });
//    });
</script>
@endpush
