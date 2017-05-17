{{-- LAYOUT --}}
@extends( 'layouts.base' )

@section('body-class') layout-error @endsection

@section( 'body-title' ){{ config("app.name") }}@endsection

@section( 'content-body' )
<div id="content">
    @yield( 'content' )
</div>

{{-- 본문의 사이드 --}}
@endsection

@section( 'content-header-script' )
@yield('header-script')
@endsection

@section( 'content-footer-script' )
{{-- 본문에서 오는 푸터 --}}
@yield( 'footer-script' )
@endsection
