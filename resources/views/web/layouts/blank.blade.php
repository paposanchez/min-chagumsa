{{-- LAYOUT --}}
@extends( 'layouts.base' )

@section( 'body-title' ){{ config("app.name") }}@endsection

@section('body-class') layout-blank @endsection

@section( 'content-body' )
<div id="body">
    @include('flash::message')

    <div id="content">
        @yield( 'content' )
    </div>
</div>

{{-- 본문의 사이드 --}}
@includeIf( 'web.partials.left' )
@includeIf( 'web.partials.right' )
@endsection


@section( 'content-header-script' )
@yield('header-script')
@endsection

@section( 'content-footer-script' )
{{-- 본문에서 오는 푸터 --}}
@yield( 'footer-script' )

{{-- tracking script --}}
@if( config('app.analytics'))
<script type="text/javascript" >
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', "{{ config('app.analytics') }}", 'auto');ga('send', 'pageview');
</script>
@endif

@endsection
