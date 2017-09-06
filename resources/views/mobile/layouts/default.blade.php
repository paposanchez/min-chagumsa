{{-- LAYOUT --}}
@extends( 'layouts.mobile' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )
        <script src="https://use.fontawesome.com/23c54b84b1.js"></script>

        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/common.css' )) }}
        {{ Html::style(Helper::assets( 'themes/v1/mobile/css/main.css' )) }}
        {{ Html::script(Helper::assets( 'themes/v1/mobile/js/common.js' )) }}
        
        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    @section( 'content-header' )

        {{-- 헤더 메뉴 --}}
        @include("mobile.partials.menu")

        <div class='head_wrap'>
            <a href="/"><h1>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/sub/logo_big.png")) }}</h1></a>
            <div id='menu_btn'><i class="fa fa-bars" id="slide-menu" style="cursor: pointer"></i></div>
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
        <div class='foot_wrap'>
            <ul>
                <li><a href=''>이용약관</a></li>
                <li><a href=''>전자금융거래약관</a></li>
                <li><a href=''>개인정보 취급방침</a></li>
            </ul>
            <p>Copyright &copy; JIMBROS Co., Ltd. All rights reserved.</p>
        </div>

        <script type="javascript">
            $(function(){

                alert('aaaa');
                $("#slide-menu").on("click", function(){
                    alert('aaaa');
                    $("#navi_wrap").show(function(){
                        this.css("z-index", 1000);
                    });
                });
            });
        </script>
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
