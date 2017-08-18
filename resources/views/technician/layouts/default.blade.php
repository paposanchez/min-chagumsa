{{-- LAYOUT --}}
@extends( 'layouts.base' )

@section( 'body-title', config("app.name") )

@section('body-class') layout-wide  @endsection

@section( 'content-header' )
{{-- 헤더 메뉴 --}}
@includeIf( 'technician.partials.header' )
@endsection

@section( 'content-body' )

@hasSection('breadcrumbs')
@yield( 'breadcrumbs' )
@endif

@include('flash::message')

<div id="body" class="margin-vertical">
    @yield( 'content' )
</div>

{{-- 본문의 사이드 --}}
@includeIf( 'technician.partials.left' )
@includeIf( 'technician.partials.right' )

@endsection


@section( 'content-header-script' )
@stack('header-script')
@endsection


@section( 'content-footer' )
@stack( 'footer-script' )
{{-- 푸터 카피라이트 --}}
@includeIf( 'technician.partials.footer' )
@endsection

@section( 'content-footer-script' )
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
