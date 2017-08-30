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

    @includeIf('flash::message')
        

        {{-- 헤더 메뉴 --}}
        <div id='gnb_wrap'>
            <h1>
                <a href='/'>
                    {{ Html::image(Helper::theme_web( '/img/comm/head_logo.png' )) }}
                </a>
            </h1>
            
            <ul>
                <li><a href='{{ route('information.index') }}'>차검사 소개</a></li>
                {{--<li><a href='{{ route('order.index') }}'>인증서 신청</a></li>--}}
                <li><a href='{{ url("/order") }}'>인증서 신청</a></li>
                {{--<li><a href='{{ route('mypage.order.index') }}'>My 인증서</a></li>--}}
                <li><a href='{{ route('certificate.index') }}'>My 인증서</a></li>

                <li><a href='{{ route('notice.index') }}'>고객센터</a></li>
            </ul>

            <div class='gnb_login_wrap'>
                @if(Auth::check())
                    <a href='{{ route('mypage.order.index') }}'>마이페이지</a>
                    <a href='{{ route('logout') }}'>로그아웃</a>
                @else
                    <a href='{{ route('login') }}'>로그인</a>
                    <a href='{{ route('register.agreement') }}'>회원가입</a>
                @endif
            </div>
            {{--<form action="{{ route('search.index') }}">--}}
                {{--<div class='gnb_search_wrap'>--}}
                    {{--<input type='text' name="q" placeholder='인증서번호 또는 차량번호로 찾기'>--}}
                    {{--<button type='submit'><i class="fa fa-search" ></i></button>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div>
        
    @endsection

    {{-- 본문 섹션 --}}
    @section( 'content-body' )
        
        @yield( 'content' )    
        
    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )
        {{-- 푸터 카피라이트 --}}
        <div id='foot_wrap'>
            <div id='foot_cont'>
                <div class='foot_link'>
                    <h1><a href='/'>
                            {{ Html::image(Helper::theme_web( '/img/comm/head_logo2.png',array('style' => 'margin-top : 5px;') )) }}
                        </a></h1>
                    <ul>
                        <li><a class='{{ (Request::path() == "agreement/usage")? "foot_active": '' }}' href='{{ route('agreement.usage') }}'>이용약관</a></li>
                        <li><a class='{{ (Request::path() == "agreement/term")? "foot_active": '' }}' href='{{ route('agreement.term') }}'>전자금융거래약관</a></li>
                        <li><a class='{{ (Request::path() == "agreement/privacy")? "foot_active": '' }}' href='{{ route('agreement.privacy') }}'>개인정보취급방침</a></li>
                    </ul>
                </div>
                <div class='foot_info_wrap'>
                    <ul class='foot_desc_wrap'>
                        <li class='foot_desc'>
                            <strong>주식회사 짐브러스</strong>
                            <p>주소 : 서울시 마포구 월드컵북로 402, 10충 1026호(상암동, KGIT센터)<br>
                               대표자 : 황병도&nbsp;&nbsp;&nbsp;&nbsp;사업자 등록번호 : 646-88-00594<br>

                               통신판매업신고 : 제 2017-서울마포-1209호</p>
                        </li>
                        <li class='foot_desc'>
                            <strong>고객센터</strong>
                            <p>상담시간 : 오전 9:30분~오후 6시(토요일 및 공휴일은 휴무)<br>
                                주소 : 서울시 마포구 월드컵북로 402, 10충 1026호(상암동, KGIT센터)<br>
                                Tel : 1833-6889 Fax : 0505-333-6889</p>
                        </li>
                        <li class='foot_desc'>
                            <strong>전자금융처리</strong>
                            <p>Tel : 1833-6889 Fax : 0505-333-6889<br>
                                Mail : chagumsa@jimbros.co.kr</p>
                        </li>
                    </ul>
                    <div class='foot_desc'>
                        <strong>Copyright &copy; Ginbros Co., Ltd. All rights reserved.</strong>
                        <p>(주)짐브러스의 사전 서명동의없이 차검사사이트의 일체의 정보,콘텐츠를 상업적인 목적으로 전재, 전송, 스크래핑 등 무단 사용할 수 없습니다.</p>
                    </div>
                </div>
            </div>
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
