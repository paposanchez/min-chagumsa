<aside id="sidebar" class="sidebar sidebar-alt c-overflow">
        <div class="s-profile">
                <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                                {!! Html::image('/avatar/'.Auth::id()) !!}
                        </div>

                        <div class="sp-info">
                                @if(Auth::check())
                                {{ Auth::user()->name }}
                                @else
                                로그인하세요
                                @endif


                                <i class="zmdi zmdi-caret-down"></i>
                        </div>
                </a>

                <ul class="main-menu">

                        @if(Auth::check())
                        <li>
                                <a href="{{ route('profile.index') }}"><i class="zmdi zmdi-account"></i> 프로필</a>
                        </li>

                        <li>
                                <a href="{{ route('logout') }}"><i class="zmdi zmdi-lock"></i> 로그아웃</a>
                        </li>
                        @else
                        <li>
                                <a href="{{ route('login') }}"><i class="zmdi zmdi-account"></i> 로그인</a>
                        </li>
                        <li>
                                <a href="{{ route('login') }}"><i class="zmdi zmdi-lock"></i> 회원정보분실</a>
                        </li>

                        <li>
                                <a href="{{ route('register') }}"><i class="zmdi zmdi-account"></i> 회원가입</a>
                        </li>
                        @endif

                </ul>
        </div>


        <ul class="main-menu">
                <li class="{{ Request::is('dashboard*') ? ' active':''}}">
                        <a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> 차검사진단서</a>
                </li>
                <li class="{{ Request::is('dashboard*') ? ' active':''}}">
                        <a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> 차검사평가서</a>
                </li>
                <li class="{{ Request::is('dashboard*') ? ' active':''}}">
                        <a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> 차검사보증서</a>
                </li>
                <li class="sub-menu {{ Request::is('user*') ? ' active':''}}">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account-box"></i> 고객센터</a>
                        <ul>
                                <li><a href="{{ route('user.index') }}">공지사항</a></li>
                                <li><a href="{{ route('user.create') }}">FAQ</a></li>
                        </ul>
                </li>

                <li class="sub-menu {{ Request::is('user*') ? ' active':''}}">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account-box"></i> About</a>
                        <ul>
                                <li><a href="{{ route('user.index') }}">회사소개</a></li>
                                <li><a href="{{ route('user.create') }}">이용약관</a></li>
                                <li><a href="{{ route('user.create') }}">전자금융거래약관</a></li>
                                <li><a href="{{ route('user.create') }}">개인정보취급방침</a></li>
                        </ul>
                </li>



        </ul>
</aside>
