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

        {{-- 헤더 메뉴 --}}
        <div id='gnb_wrap'>
            <h1>
                <a href='/'>
                    {{ Html::image(Helper::theme_web( '/img/comm/head_logo.png' )) }}
                </a>
            </h1>
            
            <ul>
                <li><a href='{{ route('information.index') }}'>카검사 소개</a></li>
                {{--<li><a href='{{ route('order.index') }}'>인증서 신청</a></li>--}}
                <li><a href='{{ url("/order") }}'>인증서 신청</a></li>
                <li><a href='{{ route('mypage.order.index') }}'>My 인증서</a></li>
                <li><a href='{{ route('notice.index') }}'>고객센터</a></li>
            </ul>

            <div class='gnb_login_wrap'>
                @if(Auth::check())
                    <a href='{{ route('mypage.order.index') }}'>마이페이지</a>
                    <a href='{{ route('logout') }}'>로그아웃</a>
                @else
                    <a href='{{ route('login') }}'>로그인</a>
                    <a href='{{ route('register') }}'>회원가입</a>
                @endif
            </div>
            <form action="{{ route('search.index') }}">
                <div class='gnb_search_wrap'>
                    <input type='text' name="q" placeholder='인증서번호 또는 차량번호로 찾기'>
                    <button type='submit'><i class="fa fa-search" ></i></button>
                </div>
            </form>
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
        <div id='foot_wrap'>
            <div id='foot_cont'>
                <div class='foot_link'>
                    <h1><a href='/'>
                            {{ Html::image(Helper::theme_web( '/img/comm/head_logo.png' )) }}
                        </a></h1>
                    <ul>
                        <li><a class='' href='{{ route('agreement.usage') }}'>이용약관</a></li>
                        <li><a class='' href='{{ route('agreement.term') }}'>전자금융거래약관</a></li>
                        <li><a class='' href='{{ route('agreement.privacy') }}'>개인정보취급방침</a></li>
                    </ul>
                </div>
                <div class='foot_info_wrap'>
                    <ul class='foot_desc_wrap'>
                        <li class='foot_desc'>
                            <strong>주식회사 진브로스</strong>
                            <p>주소 : 서울시 강남구 테헤란로 152(역삼동 우성빌딩 4층<br>
                                사업자 등록번호 : 220-86-53175<br>
                                통신판매업신고 : 강남 10630호  Fax : 02-589-8843</p>
                        </li>
                        <li class='foot_desc'>
                            <strong>고객센터</strong>
                            <p>상담시간 : 오전 9시~오후 6시(토요일 및 공휴일은 휴무)<br>
                                주소 : 경기도 부천시 원미구 부일로 223 투나버스 빌딩 6층<br>
                                Tel : 1566-5702 Fax : 02-589-8843    Mail : cs@chagumsa.com</p>
                        </li>
                        <li class='foot_desc'>
                            <strong>전자금융처리</strong>
                            <p>Tel : 1566-5704 Fax : 02-589-8843<br>
                                Mail : gmk_cs@chagumsa.com</p>
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
