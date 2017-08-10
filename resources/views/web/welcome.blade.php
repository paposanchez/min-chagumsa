@extends( 'web.layouts.default' )

@section( 'content' )

<div id='main_wrap'>

    <div id='main_visual_wrap'>
        <div class='main_visual'>
            <div class='mv_cert_wrap'>
                {{ Html::image(Helper::theme_web( '/img/main/mv_title.png')) }}
                <div class='mv_cert_box'>
                    <a href='{{ route('order.index') }}' class='mv_cert_btn1'>차검사 인증서 신청하기</a>
                </div>
                <div class='mv_cert_box'>
                    {!! Form::open(['method' => 'GET', 'route' => ['search.index']]) !!}
                    <div class='mv_cert_search_wrap'>
                        <input type='text' name="q" placeholder='인증서번호 또는 차량번호'>
                        <button type='submit'><i class="fa fa-search" ></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class='mv_report_wrap'>
                <div class='mv_report'>
                    <a href='/'>{{ Html::image(Helper::theme_web( '/img/main/mv_report_btn.png')) }}</a>
                </div>
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
                {{ Html::image(Helper::theme_web( '/img/main/main_standard_text.png')) }}<br>
                중고차 거래의 <span>새로운 방법을</span>제시합니다.
            </strong>
            <ul>
                <li>차량엔진 상태</li>
                <li>종합의견 적정가격정보</li>
                <li>사고수리 정보</li>
                <li>차량등록 정보</li>
                <li>주요부품 작동상태정보</li>
                <li>차량리콜 정보</li>
                <li>주요패널 상태정보</li>
                <li>차량외관 실내상태정보</li>
                <li>주요소모품 상태정보</li>
                <li>주요부품 작동상태정보</li>
            </ul>
            <div>
                차량가치산정평가는 자동차관리법 제 58조 1항 등 자동차 가격산정에 대한 법적 권한을 보유한<br>
                <span>자동차가술사</span>가 평가하고 가치평가 보고서를 제공합니다. 
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
    });
</script>
@endpush
