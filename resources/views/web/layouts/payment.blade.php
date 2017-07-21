{{-- LAYOUT --}}
@extends( 'layouts.pay-base' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )
        
        {{ Html::style(Helper::assets( 'themes/v1/web/css/common.css' )) }}        
        {{ Html::style(Helper::assets( 'themes/v1/web/css/sub.css' )) }}
{{--        {{ Html::script(Helper::assets( 'themes/v1/web/js/common.js' )) }}--}}
        
        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    {{--@section( 'content-header' )--}}

        {{-- 헤더 메뉴 --}}
        {{--<div id='gnb_wrap'>--}}
            {{--<h1>--}}
                {{--<a href='/'>--}}
                    {{--{{ Html::image(Helper::theme_web( '/img/comm/head_logo.png' )) }}--}}
                {{--</a>--}}
            {{--</h1>--}}
            {{----}}
            {{--<ul>--}}
                {{--<li><a href='{{ route('information.index') }}'>카검사 소개</a></li>--}}
                {{--<li><a href='{{ route('order.index') }}'>인증서 신청</a></li>--}}
                {{--<li><a href='{{ url("/order") }}'>인증서 신청</a></li>--}}
                {{--<li><a href='{{ route('mypage.order.index') }}'>My 인증서</a></li>--}}
                {{--<li><a href='{{ route('notice.index') }}'>고객센터</a></li>--}}
            {{--</ul>--}}

            {{--<div class='gnb_login_wrap'>--}}
                {{--@if(Auth::check())--}}
                    {{--<a href='{{ route('mypage.order.index') }}'>마이페이지</a>--}}
                    {{--<a href='{{ route('logout') }}'>로그아웃</a>--}}
                {{--@else--}}
                    {{--<a href='{{ route('login') }}'>로그인</a>--}}
                    {{--<a href='{{ route('register') }}'>회원가입</a>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<form action="{{ route('search.index') }}">--}}
                {{--<div class='gnb_search_wrap'>--}}
                    {{--<input type='text' name="q" placeholder='인증서번호 또는 차량번호로 찾기'>--}}
                    {{--<button type='submit'><i class="fa fa-search" ></i></button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{----}}
    {{--@endsection--}}

    {{-- 본문 섹션 --}}
    @section( 'content-body' )
        
        @includeIf('flash::message')
        
        @yield( 'content' )    
        
    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )
        {{-- 푸터 카피라이트 --}}

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
