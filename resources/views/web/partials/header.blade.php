<header id='header' role="header" class="">

    <nav class="navbar navbar-inverse no-margin-bottom">

        <div class="container">

            <div class="navbar-header">

                <a href="#" class="aside-toggle navbar-toggle navbar-icon no-border pull-left" id="aside-toggle-left"><i class="fa fa-bars"></i></a>
                <a href="#" class="aside-toggle navbar-toggle navbar-icon no-border" id="aside-toggle-right"><i class="fa fa-ellipsis-v"></i></a>

                <!--{{ Html::image(Helper::assets('img/logo.png'), 'zlara', array('class' => 'logo', 'title'=>'logo')) }}-->
                <a href="/"  class="navbar-brand">ZLARA</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-rollover" data-dropdown="" aria-haspopup="true" aria-expanded="false">
                        <a href="/service" class="">
                            서비스 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/service/">THEME</a></li>
                            <li><a href="/service/typo">TYPO</a></li>
                            <li><a href="/service/button">BUTTONS</a></li>
                            <li><a href="/service/alert">ALERT</a></li>
                            <li><a href="/service/table">TABLE</a></li>
                            <li><a href="/service/media">MEDIA</a></li>
                            <li><a href="/service/card">CARD</a></li>
                            <li><a href="/service/block">BLOCK</a></li>
                            <li><a href="/service/component">COMPONENT</a></li>
                            <li><a href="/service/comment">COMMENT</a></li>
                            <li><a href="/service/uploader">UPLOADER</a></li>
                            <li><a href="/service/wysiwig">WYSIWIG</a></li>
                            
                            <li class="dropdown dropdown-rollover">
                                <a tabindex="-1" href="#">
                                    FORM 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/service/form/">기본</a></li>
                                    <li><a href="/service/form/advanced">확장</a></li>
                                    <li><a href="/service/form/validation">검증</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-rollover">
                                <a tabindex="-1" href="#">
                                    CHART 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/service/chart/">기본</a></li>
                                    <li><a href="/service/chart/highchart">HIGHCHART</a></li>
                                    <li><a href="/service/chart/d3">D3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown dropdown-rollover" data-dropdown="" aria-haspopup="true" aria-expanded="false">
                        <a href="/pages" class="">
                            페이지 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/service/"></a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-rollover" data-dropdown="" aria-haspopup="true" aria-expanded="false">
                        <a href="/community/" data-toggle="dropdown">
                            커뮤니티
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/community/notice/">공지사항</a></li>
                            <li><a href="/community/faq/">FAQ</a></li>
                            <li><a href="/community/free/">자유게시판</a></li>
                        </ul>
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown dropdown-rollover">

                        <a href="#" class="dropdown-toggle navbar-icon" data-toggle="dropdown" >
                            <i class="fa fa-user"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="http://admin.{{ config('app.domain') }}" target="_blank" class="text-danger">관리자모드</a>
                            </li>

                            @if (Auth::check())
                            <li class="">
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">로그아웃</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                            <li class="">
                                <a href="{{ url('/mypage') }}">마이페이지</a>
                            </li>

                            @else
                            <li class="">
                                <a href="{{ url('/login') }}">로그인</a>
                            </li>
                            <li class="">
                                <a href="{{ url('/register') }}">회원가입</a>
                            </li>
                            @endif
                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

</header>



@section( 'footer' )
<script type="text/javascript">
</script>
@endsection
