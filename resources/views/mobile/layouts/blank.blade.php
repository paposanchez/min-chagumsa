{{-- LAYOUT --}}
@extends( 'layouts.base' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )

        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/common.css' ), array(),  env('APP_SECURE', 'true')) }}
        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/sub.css' ), array(),  env('APP_SECURE', 'true')) }}
        {{ Html::script(Helper::assets( 'themes/v1/mobile/js/common.js' ), array(),  env('APP_SECURE', 'true')) }}

        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    @section( 'content-header' )
        <div class='document_login'>
    @endsection

    {{-- 본문 섹션 --}}
    @section( 'content-body' )

        @includeIf('flash::message')

        @yield( 'content' )

    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )
            {{-- 푸터 카피라이트 --}}
            <div id='foot_full_wrap'>
                <div class='foot_full_desc'>
                    <p>Copyright &copy; Ginbros Co., Ltd. All rights reserved.<br>
                        (주)짐브러스의 사전 서명동의없이 차검사사이트의 일체의 정보,콘텐츠를 상업적인 목적으로 전재, 전송, 스크래핑 등 무단 사용할 수 없습니다.</p>
                </div>
            </div>

        </div>
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
