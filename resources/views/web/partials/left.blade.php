<div id="aside-left" class="aside aside-left perfect-scrollbar">

    <div class="aside-profile">

        {{ Html::image('/avatar/'.Auth::id(), 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}

        <div class="aside-profile-info">
            @if(Auth::check())      
            <a href="{{ route("user.edit", [Auth::id()]) }}" class="aside-profile-info-name">{{ Auth::user()->name }}</a>
            <a href="{{ url("logout") }}" class="text-danger"><i class="fa fa-power-off"></i></a>
            <small class="aside-profile-info-desc">{{ Auth::user()->email }} <span class="text-info">개발팀</span></small>
            @else
            <a href="{{ url("login") }}" class="btn btn-primary btn-sm btn-outline aside-profile-info-name">{{ trans("auth.login") }}</a>
            @endif

        </div>



    </div>

    <div class="navbar navbar-default">

        <div class="navbar-inner">

            <ul class="nav navbar-nav">

                <li class="{{ Request::is('welcome') ? ' active':''}}"><a href="/"><i class="fa fa-home"></i><span class="nav-label">홈</span></a></li>

                <li class="dropdown {{ Request::is('service*') ? ' active on open':''}}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gears"></i><span class="nav-label">서비스</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/service/">THEME</a></li>
                        <li><a href="/service/typo">TYPO</a></li>
                        <li><a href="/service/button">BUTTONS</a></li>
                        <li><a href="/service/alert">ALERT</a></li>
                        <li><a href="/service/table">TABLE</a></li>
                        <li><a href="/service/media">MEDIA</a></li>
                        <li><a href="/service/comment">COMMENT</a></li>
                        <li><a href="/service/card">CARD</a></li>
                        <li><a href="/service/component">COMPONENT</a></li>
                        <li><a href="/service/plugin">PLUGIN</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#">
                                FORM 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/service/form/">기본</a></li>
                                <li><a href="/service/form/advanced">확장</a></li>
                                <li><a href="/service/form/plugin">플러그인</a></li>
                                <li><a href="/service/form/validation">검증</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#">
                                CHART 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/service/chart/">기본</a></li>
                                <li><a href="/service/chart/highchart">HIGHCHART</a></li>
                                <li><a href="/service/chart/d3">D3</a></li>
                                <li><a href="/service/chart/extra">기타</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>











                <li class="dropdown {{ Request::is('community*') ? ' active on open':''}}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-group"></i><span class="nav-label">커뮤니티</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('community/notice*') ? ' active':''}}"><a href="{{ url('/community/notice') }}"><span class="nav-label">공지사항</span></a></li>
                        <li class="{{ Request::is('community/faq*') ? ' active':''}}"><a href="{{ url('/community/faq') }}"><span class="nav-label">FAQ</span></a></li>
                        <li class="{{ Request::is('community/free*') ? ' active':''}}"><a href="{{ url('/community/free') }}"><span class="nav-label">자유게시판</span></a></li>
                    </ul>
                </li>


            </ul>

        </div>

    </div>

    <div class="aside-footer">

    </div>

</div>
