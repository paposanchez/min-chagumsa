<!doctype html>
<html lang="ko">
<head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>차검사 인증서</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        {!! Html::style(mix('/assets/css/app.css')) !!}
        {{ Html::style(mix('/assets/css/vendor.css')) }}
        {{ Html::script(mix( '/assets/js/app.js' )) }}

        {{ Html::style(Helper::assets( 'themes/v1/web/css/common.css' )) }}
        {{ Html::style(Helper::assets( 'themes/v1/web/css/report.css' )) }}
        {{ Html::script(Helper::assets( 'themes/v1/web/js/common.js' )) }}




</head>

<body class="@yield( 'body-class' )" @yield( 'body-attr' )>

        <div id='document'>

                <div id='report_wrap'>

                        <div class='report_left'>

                                <h1>{{ Html::image(Helper::theme_web( '/img/report/report_logo.png')) }}</h1>
                                <ul>
                                        <li><a class='{{ $page == "summary" ? "select" : '' }}' href="{{ $url_prefix }}/{{ $order_id }}/summary">자동차 요약 보고서</a></li>
                                        <li><a class='{{ $page == "performance" ? "select" : '' }}' href="{{ $url_prefix }}/{{ $order_id }}/performance">자동차 품질 보고서</a></li>
                                        <li><a class='{{ $page == "price" ? "select" : '' }}' href="{{ $url_prefix }}/{{ $order_id }}/price">자동차 가격 산정 보고서</a></li>
                                        <li><a class='{{ $page == "history" ? "select" : '' }}' href="{{ $url_prefix }}/{{ $order_id }}/history">자동차 이력 보고서</a></li>
                                </ul>
                                <p>
                                        <span>Copyright © JIMBROS INC. All rights reserved.</span>
                                        (주)짐브러스의 사전 서명동의없이 차검사사이트의 일체의 정보, 콘텐츠를 상업적인 목적으로 전재, 전송, 스크래핑 등 무단 사용할 수 없습니다.
                                </p>

                        </div>

                        <div class='report_cont'>

                                <div class='report_frame_wrap'>
                                        @if(!$order->isIssued())
                                                <div class="breadcrumb">
                                                        <div class="panel-body">
                                                                <p class="text-primary " style="font-size: 30px;font-style: italic;font-weight: bold"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 미리보기</p>
                                                        </div>
                                                </div>
                                        @endif

                                        <div class='report_frame_title'>
                                                <div class='report_title'>
                                                        <strong>{{ $order->getOrderNumber() }}</strong>
                                                <h2>
                                                        @if($page == 'summary')
                                                                자동차 요약 보고서
                                                        @elseif($page == 'performance')
                                                                자동차 품질 보고서
                                                        @elseif($page == 'history')
                                                                자동차 이력 보고서
                                                        @else
                                                                자동차 가격 산정 보고서
                                                        @endif

                                                </h2>

                                                </div></div>
                                                <div class='report_frame_cont'>


                                                        {{-- 본문 섹션 --}}
                                                        @yield( 'content' )
                                                </div>

                                        </div><!-- report_frame_title //-->

                                </div><!-- report_frame_wrap //-->

                        </div><!-- report_cont //-->

                </div><!-- report_wrap //-->
        </div>

</body>

{{-- tracking script --}}
@if( config('zlara.analytics.cert'))
<script type="text/javascript" >
(function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', "{{ config('zlara.analytics.cert') }}", 'auto');
ga('send', 'pageview');
</script>
@endif
</html>
