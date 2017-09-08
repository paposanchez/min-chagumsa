{{-- LAYOUT --}}
@extends( 'layouts.base' )

{{-- 헤더 스크립트 --}}
@section( 'content-header-script' )

    {{ Html::style(Helper::assets( 'themes/v1/web/css/common.css' )) }}
    {{ Html::style(Helper::assets( 'themes/v1/web/css/report.css' )) }}
    {{ Html::script(Helper::assets( 'themes/v1/web/js/common.js' )) }}

    @stack('header-script')
@endsection

{{-- 헤더 섹션 --}}
@section( 'content-header' )
    <div id='report_wrap'>

        <div class='report_left'>

            <h1>{{ Html::image(Helper::theme_web( '/img/report/report_logo.png')) }}</h1>
            <ul>
                <li><a class="{{ ( !in_array($page, ['performance','history','price'])) ? ' select': ''}}" href='{{ route('certificate', ['id'=>4,'page'=>'summary']) }}'>자동차 인증서 요약 보고서</a></li>
                <li><a class="{{ $page == 'performance' ? ' select':''}}" href='{{ route('certificate', ['id'=>4,'page'=>'performance']) }}'>자동차 성능진단 보고서</a></li>
                <li><a class="{{ $page == 'history' ? ' select':''}}" href='{{ route('certificate', ['id'=>4,'page'=>'history']) }}'>자동차 이력 보고서</a></li>
                <li><a class="{{ $page == 'price' ? ' select':''}}" href='{{ route('certificate', ['id'=>4,'page'=>'price']) }}'>자동차 가격조사산정서</a></li>
            </ul>
            <p>
                <span>Copyright © JIMBROS INC. All rights reserved.</span>
                (주)짐브러스의 사전 서명동의없이 차검사사이트의 일체의 정보, 콘텐츠를 상업적인 목적으로 전재, 전송, 스크래핑 등 무단 사용할 수 없습니다.
            </p>

        </div>

        <div class='report_cont'>

            <div class='report_frame_wrap'>

                <div class='report_frame_title'>
                    {{--<button class='btns btns_green'><i class="fa fa-download"></i> PDF 다운로드</button>--}}

                    <div class='report_title'><h2>
                            @if($page == 'summary')
                                자동차 인증서 요약 보고서
                            @elseif($page == 'performance')
                                자동차 성능진단 보고서
                            @elseif($page == 'history')
                                자동차 이력 보고서
                            @else
                                자동차 가격조사산정서
                            @endif

                        </h2></div></div>
                <div class='report_frame_cont'>
                    @endsection

                    {{-- 본문 섹션 --}}
                    @section( 'content-body' )

                        @includeIf('flash::message')

                        @yield( 'content' )

                    @endsection

                    {{-- 푸터 섹션 --}}
                    @section( 'content-footer' )
                        {{-- 푸터 카피라이트 --}}
                </div>

            </div><!-- report_frame_title //-->

        </div><!-- report_frame_wrap //-->

    </div><!-- report_cont //-->

    </div><!-- report_wrap //-->

@endsection

{{-- 푸터 스크립트 --}}
@section( 'content-footer-script' )
    @stack( 'footer-script' )
    {{-- tracking script --}}
    @if( config('app.analytics'))
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
            ga('create', "{{ config('app.analytics') }}", 'auto');
            ga('send', 'pageview');
        </script>
    @endif
@endsection
