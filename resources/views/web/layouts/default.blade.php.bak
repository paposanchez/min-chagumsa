{{-- LAYOUT --}}
@extends( 'layouts.base' )

    {{-- 헤더 스크립트 --}}
    @section( 'content-header-script' )
        @stack('header-script')
    @endsection

    {{-- 헤더 섹션 --}}
    @section( 'content-header' )

    @includeIf('flash::message')

        <div id='gnb_wrap'>
            <div class='gnb_inner'>
                <h1><a href='/'><img src="http://www.chagumsa.com/assets/themes/v1/web/img/comm/head_logo.png"></a></h1>
                <ul>
                    <li><a href='{{ route('information.index') }}'>차검사 팁</a></li>
                    <li><a href='{{ url("/sample") }}' target="_blank">인증서 샘플보기</a></li>
                    <li><a href='{{ url("/order") }}'>신청하기</a></li>
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
                    <strong>1833-6889</strong>
                </div>
            </div>
        </div>

    @endsection

    {{-- 본문 섹션 --}}
    @section( 'content-body' )

        @yield( 'content' )

    @endsection

    {{-- 푸터 섹션 --}}
    @section( 'content-footer' )
        {{-- 푸터 카피라이트 --}}
        <div id="Footer">
            <div class="footer-inner">
                <div class="footer-block01">
                    <div class="footer-block">
                        <div class="footer-company">
                            <h6>COMPANY</h6>
                            <p>(주)짐브러스 ㅣ 서울특별시 마포구 월드컵북로 402 KGIT센터 1026호<br>
                                사업자번호 646-88-00594 ㅣ 통신판매업 제 2017-서울마포-1209호<br>
                                대표 황병도ㅣFAX. 0505-333-6889 ㅣ E-mail. cs@jimbros.co.kr</p>
                        </div>
                    </div>
                    <div class="footer-block">
                        <div class="footer-contact">
                            <h6>CONTACT US</h6>
                            <p><strong>고객센터 1833-6889 </strong>
                                업무 시간 09:30~18:30<br>토, 일요일 및 공휴일 제외</p>
                        </div>
                    </div>
                    <div class="footer-block">
                        <div class="footer-link">
                            <ul>
                                <li><a href="{{ route('agreement.usage') }}">이용약관</a></li>
                                <li><a href="{{ route('agreement.term') }}">전자금융거래약관</a></li>
                                <li><a href="{{ route('agreement.privacy') }}">개인정보취급방침</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-block">
                        <div class="footer-icon">
                            <a href="{{ url('/chagumsa-info') }}" class="lnk01">차검사 소개</a>
                            <a href="{{ url('/chagumsa-info#anc06') }}" class="lnk02">차검사 인증서</a>
                            <a href="{{ url('/chagumsa-info#anc07') }}" class="lnk03">차검사 케어</a>
                        </div>
                    </div>
                </div>
                <div class="footer-block02">
                    <p>Copyright © JIMBROS Co., Ltd. All rights reserved.<br>
                        (주)짐브러스의 사전 서명동의없이 차검사사이트의 일체의 정보,콘텐츠를 상업적인 목적으로 전재, 전송, 스크래핑 등 무단 사용할 수 없습니다.</p>
                    <div class="sns">
                        <a href="https://www.facebook.com/permalink.php?story_fbid=545562222458911&id=539851119696688" class="fb" target="_blank">facebook</a>
                        <a href="http://blog.naver.com/prologue/PrologueList.nhn?blogId=jimbros" class="blog" target="_blank">blog</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    {{-- 푸터 스크립트 --}}
    @section( 'content-footer-script' )
        @stack( 'footer-script' )
        {{-- tracking script --}}
        @if( config('zlara.analytics.default'))
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
            ga('create', "{{ config('zlara.analytics.default') }}", 'auto');
            ga('send', 'pageview');
        </script>
        @endif
    @endsection
