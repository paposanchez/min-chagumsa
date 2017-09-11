@extends( 'mobile.layouts.default' )

@section( 'content' )







    <div id='main_wrap'>





        <!--
	<div id='main_visual_wrap'>
		<div class='main_visual'>
			<img src='../img/main/mv_text.png'>
		</div>
	</div>

	<div class='mv_cert_wrap'>
		<div class='mv_cert_box'>
			<a href='' class='mv_cert_btn1'>차검사 인증서 신청하기</a>
		</div>
		<div class='br10'></div>
		<div class='mv_cert_box'>
			<div class='mv_cert_search_wrap'>
				<input type='text' placeholder='인증서번호 또는 차량번호'>
				<button type='submit'><i class="fa fa-search" ></i></button>
			</div>
		</div>
	</div>
	-->
        <div id='mv2_wrap'>
            <div class='mv2_top'>
                {{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/mv2_top_text.png")) }}
                {{--<a href=''>인증서 신청하기</a>--}}
                {{--<a href=''>인증서 신청하기</a>--}}
            </div>
            <div class='mv2_btm'>
                {{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/mv2_btm_text.png")) }}
                <a href=''>체험단 신청하기</a>
            </div>
        </div>

        <div id='main_service_wrap'>
            <nav>	<div class="msb_prev"></div><div class="msb_next"></div></nav>
            <div class='main_service_box' id='msb_1' data-index="0">
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon1.png")) }}</div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_text1.png")) }}</div>
            </div>
            <div class='main_service_box' id='msb_2' data-index="1">
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon2.png")) }}</div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_text2.png")) }}</div>
            </div>
            <div class='main_service_box' id='msb_3' data-index="2">
                <div class='msb_top'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_icon3.png")) }}</div>
                <div class='msb_btm'>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/main/msb_text3.png")) }}</div>
            </div>
        </div>

        <div id='main_standard_wrap'>
            <div class='main_standard'>
                <strong><span>차검사 인증서</span>로 안전하고 믿을수 있는<br>중고차 거래가 가능합니다.</strong>
                <p>중고차의 정확한 품질평가와 공정한 가격산정에 대한 공인 인증 서비스!</p>
                <div class='br10'></div>
                <ul>
                    <li>주요사고</li>
                    <li>구조적 손상</li>
                    <li>침수여부</li>
                    <li>엔진 및 구동장치</li>
                    <li>전장 및 주요부품</li>
                    <li>차량 내 · 외부 수리상태</li>
                    <li>로드테스트 기반 운행상태</li>
                    <li>차량운행이력</li>
                    <li>리콜정보</li>
                    <li>차량옵션평가</li>
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
    $(function () {

        var c = 1;

        $(".msb_next").on("click", function(){

            var n = c+1;
            if(c < 3){
                $("#msb_" + c).hide();
                $("#msb_" + n).fadeIn(400);
                c++;
            }else{
                $("#msb_" + c).hide();
                $("#msb_1").fadeIn(400);
                c=1;
            }


        });

        $(".msb_prev").on("click", function(){
            var p = c-1;
            if(c > 1){
                $("#msb_" + c).hide();
                $("#msb_" + p).fadeIn(400);
                c--;
            }else{
                $("#msb_1").hide();
                $("#msb_3").fadeIn(400);
                c=3;
            }
        });

    });
</script>
@endpush
