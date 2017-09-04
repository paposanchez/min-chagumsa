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
        <div id='navi_wrap'><div id='navi_cont'>
                <a class='navi_close'>?옪</a>
                <div class='menu_wrap'>
                    <div class='menu_inner'>

                        <div class='menu_head'>
                            <!-- 로그인 전 -->
                            <div class='menu_head_btn type2'><button class='btns btns_skyblue btn_sdw'>로그인 하기</button></div>
                            <!-- 로그인 전 -->
                            <!-- 로그인 후 -->
                            <div class='menu_head_profile'>
                                <span>User01@gmail.com</span>
                                <a class='profile_setting'><i class="fa fa-cog"></i></a>
                            </div>
                            <div class='menu_head_btn'><button class='btns btns_skyblue btn_sdw'>주문목록</button></div>
                            <!-- 로그인 후 -->
                        </div>
                        <ul class='menu_list'>
                            <li><a class='sub_menu menu1'>카검사 소개</a>
                                <div>
                                    <a class='' href='intro1.html'>서비스 소개</a>
                                    <a class='' href='intro2.html'>카검사인증서란?</a>
                                    <a class='' href='intro3.html'>카검사인증서의 특징</a>
                                    <a class='' href='intro4.html'>신청절차 및 수수류</a>
                                </div>
                            </li>
                            <li><a class='menu2' href=''>인증서 신청</a></li>
                            <li><a class='menu3' href=''>MY 인증서</a></li>
                            <li><a class='menu4' href=''>인증서 찾기</a></li>
                            <li><a class='sub_menu menu5'>고객센터</a>
                                <div>
                                    <a href=''>공지사항</a>
                                    <a href=''>FAQ</a>
                                    <a href=''>1:1 문의</a>
                                    <a href=''>기타 정보</a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class='head_wrap'>
            <a href="/"><h1>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/sub/logo_big.png")) }}</h1></a>
            <div id='menu_btn'><i class="fa fa-bars"></i></div>
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
