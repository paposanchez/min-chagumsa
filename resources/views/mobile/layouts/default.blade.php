{{-- LAYOUT --}}
@extends( 'layouts.mobile' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )
        <script src="https://use.fontawesome.com/23c54b84b1.js"></script>

        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/common.css' )) }}
        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/sub.css' )) }}
        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/main.css' )) }}
        {{ Html::script(Helper::assets( 'themes/v1/mobile/js/common.js' )) }}


        {!! Html::style(mix('/assets/css/app.css')) !!}
        {{ Html::style(mix('/assets/css/vendor.css')) }}
        {{ Html::style(Helper::assets('themes/v1/mobile/css/mobile.css')) }}

        {{ Html::style(Helper::assets('themes/v1/mobile/css/common_new.css')) }}

        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/main_new.css' )) }}

        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    @section( 'content-header' )

        {{-- 헤더 메뉴 --}}
        @include("mobile.partials.menu")

        <div class='head_wrap'>
            <span><a href="/" style="margin-left: 50px; margin-right: 50px;">{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/comm/head_logo.png"), "차검사", ['id' => 'top-logo']) }}</a></span>
            <div id='menu_btn'><i class="fa fa-bars" id="slide-menu" style="cursor: pointer; margin-right: 15px;"></i></div>
        </div>
        
    @endsection

    {{-- 본문 섹션 --}}
    @section( 'content-body' )
        
        @includeIf('flash::message')
        
        @yield( 'content' )    
        
    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )
        {{-- 푸터 카피라이트 --}}

        <div id="Footer" class="foot_wrap">
            <div class="footer-link">
                <ul>
                    <li><a href="{{ url("agreement/usage") }}" class="{!! (Request::path() == "agreement/usage")? "active":"" !!}">이용약관</a></li>
                    <li><a href="{{ url("agreement/term") }}"  class="{!! (Request::path() == "agreement/term")? "active":"" !!}">전자금융거래약관</a></li>
                    <li><a href="{{ url("agreement/privacy") }}"  class="{!! (Request::path() == "agreement/privacy")? "active":"" !!}">개인정보취급방침</a></li>
                </ul>
                <p>Copyright © JIMBROS Co., Ltd. All rights reserved.</p>
            </div>
        </div>


    @endsection

    {{-- 푸터 스크립트 --}}
    @section( 'content-footer-script' )
        @stack( 'footer-script' )

        <script type="text/javascript">
            $(function () {
                $("#menu_btn").on("click", function () {
                    $("#navi_wrap").animate({width:'toggle'},350);
                });
                $("#navi_close").on("click", function () {
                    $("#navi_wrap").animate({width:'toggle'},350);
                });

                $("#menu-login").on("click", function () {
                    location.href = $(this).data('url');
                });

                $("#order-list").on("click", function () {
                    location.href = $(this).data("url");
                })

            });

        {{-- tracking script --}}
        @if( config('app.analytics'))
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


        @endif
        </script>
    @endsection
