@extends( 'web.layouts.default' )

@section( 'content' )

<div id='main_wrap'>

    <div id='main_visual2_wrap'>
        <div class='main_visual2'>

            <div class='mv2_cert_wrap'>
                {{ Html::image(Helper::theme_web( '/img/main/mv2_title.png'), '중고차 공인인증 서비스 차검사') }}
                <ul>
                    <li><a href='{{ url("/sample") }}' target="_blank">인증서 샘플보기</a></li>
                    {{--<li><a href=''>인증서 신청하기</a></li>--}}
                </ul>
            </div>

            <div class='mv2_exp_wrap'>
                <a href='https://goo.gl/R7FNPF'>체험단 신청하기</a>
            </div>

        </div>
    </div>

    <div id='main_service_wrap'>
        <section id="main_service" class="dg-container">
            <div class="dg-wrapper"><a class='service1'></a><a class='service2'></a><a class='service3'></a></div>
            <div class='dg-desc'>
                <div>
                    {{ Html::image(Helper::theme_web( '/img/main/service_desc1.png'), '내외부 점검, 작동상태 점감, 소모품상태 점검, 성능점검 종합의견') }}
                </div>
                <div>
                    {{ Html::image(Helper::theme_web( '/img/main/service_desc2.png'), '차량성능평가, 차량상태점검평가, 차량품질인증평가, 차량침수평가, 차량수리상태평가, 차량가격산정') }}
                </div>
                <div>
                    {{ Html::image(Helper::theme_web( '/img/main/service_desc3.png'), '검증된 차량 상태, 합리적인 가격, 안심 거래, 믿고 맡기는 차검사') }}
                </div>
            </div>
            <nav>	<span class="dg-prev"></span><span class="dg-next"></span></nav>
        </section>
    </div>

    <div id='main_standard_wrap'>
        <div class='main_standard'>
            <strong>
                {{ Html::image(Helper::theme_web( '/img/main/main_standard_text.png')) }}<br />
                <span>차검사 인증서</span>로 안전하고 믿을 수 있는 중고차 거래가 가능합니다.
            </strong>
            <ul>
                <li>주요 사고</li>
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
            <div>
                자동차 품질 평가 및 가격 산정은 자동차관리법 제 58조 1항 등 자동차 가격산정에<br />
                대한 법적 권한을 보유한 <span>차량기술사</span>가 공인합니다.
            </div>
        </div>
    </div>

</div>

@endsection


@push( 'header-script' )
{{ Html::style(Helper::assets( 'themes/v1/web/css/main.css' )) }}
@endpush

@push( 'footer-script' )



{{ Html::script(Helper::assets( 'themes/v1/web/js/main.js' )) }}
{{ Html::script(Helper::assets( 'themes/v1/web/js/modernizr.custom.53451.js' )) }}
{{ Html::script(Helper::assets( 'themes/v1/web/js/jquery.gallery.js' )) }}
<script type="text/javascript">
    $(function () {
        $('#main_service').gallery();

        $('.mv_report').click(function(){
            var order_id = $(this).data('order_id');
            //todo 임시로 order_id 를 1로 입력
            window.open('/certificate/'+1+'/summary',"", "width=1400, height=1400");
        });
    });
</script>
@endpush
