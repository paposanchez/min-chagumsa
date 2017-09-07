{{-- LAYOUT --}}
@extends( 'layouts.base' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )
        
        {{ Html::style(Helper::assets( 'themes/v1/web/css/common.css' )) }}        
        {{ Html::style(Helper::assets( 'themes/v1/web/css/sub.css' )) }}
        {{ Html::script(Helper::assets( 'themes/v1/web/js/common.js' )) }}
        
        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    @section( 'content-header' )
        
    @endsection

    {{-- 본문 섹션 --}}
    @section( 'content-body' )
        
        @includeIf('flash::message')
        
        @yield( 'content' )    
        
    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )

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
