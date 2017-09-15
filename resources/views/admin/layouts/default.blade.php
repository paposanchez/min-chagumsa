{{-- LAYOUT --}}
@extends( 'layouts.admin-base' )

@section( 'body-title', config("app.name") )

@section('body-class') layout-wide  @endsection

@section( 'content-header' )
{{-- 헤더 메뉴 --}}
@includeIf( 'admin.partials.header' )
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
@includeIf( 'admin.partials.left' )
@includeIf( 'admin.partials.right' )

@endsection


@section( 'content-header-script' )
@stack('header-script')

<style>

#sidebar-menu .main-menu a {
display: block;
font-size: 13px;
font-weight: 500;
color: #999;
padding: 4px 20px;
}
#sidebar-menu .main-menu a:hover {
color: #11427D;
text-decoration: none;
background-color: transparent;
border-left: 1px solid #11427D;
}

#sidebar-menu .sub-menu a {
padding-top: 1px;
padding-bottom: 1px;
padding-left: 30px;
font-size: 12px;
font-weight: 400;
}

</style>

@endsection


@section( 'content-footer' )
@stack( 'footer-script' )
{{-- 푸터 카피라이트 --}}
@includeIf( 'admin.partials.footer' )
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
