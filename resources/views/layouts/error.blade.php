{{-- LAYOUT --}}
@extends( 'layouts.base' )

@section('body-class')
@endsection

@section( 'body-title' ){{ config("app.name") }}@endsection

@section( 'content-header-script' )
        @stack('header-script')
@endsection

@section( 'content-body' )
        @yield( 'content' )
@endsection

@section( 'content-footer-script' )
        @stack( 'footer-script' )
@endsection
