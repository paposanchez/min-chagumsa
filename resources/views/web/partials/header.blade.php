<header id="header" class="clearfix" data-ma-theme="blue">

        <ul class="h-inner">
                <li class="hi-trigger ma-trigger hidden-md hidden-lg" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                        <div class="line-wrap">
                                <div class="line top"></div>
                                <div class="line center"></div>
                                <div class="line bottom"></div>
                        </div>
                </li>

                <!-- <li class="hi-logo">
                        <a href="/" class="m-l-10">
                                {{ Html::image('/assets/img/logo-symbol.png') }}
                        </a>
                </li> -->

                <li class="pull-left hidden-xs">
                        <ul class="hi-menu hi-menu-lg">
                                <li>
                                        <a href="{{ route('information.diagnosis') }}" class="">
                                                <span class="him-label">차검사진단서</span>
                                        </a>
                                </li>

                                <li class="">
                                        <a href="{{ route('information.certificate') }}" class=" text-lg">
                                                <span class="him-label">차검사평가서</span>
                                        </a>
                                </li>

                                <li class="">
                                        <a href="{{ route('information.warranty') }}" class=" text-lg">
                                                <span class="him-label">차검사인증서</span>
                                        </a>
                                </li>

                                <li class="dropdown hidden-xs">
                                        <a hreaf="" data-toggle="dropdown" aria-expanded="false" class="text-lg"><span class="him-label">고객센터</span></a>
                                        <ul class="dropdown-menu dm-icon pull-right">
                                                <li>
                                                        <a href="{{ route('notice.index') }}">공지사항</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('faq.index') }}">FAQ</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('contact.index') }}">문의하기</a>
                                                </li>
                                        </ul>
                                </li>

                        </ul>
                </li>

                <li class="pull-right">
                        <ul class="hi-menu">
                                <li class="">
                                        <a href="{{ route('cart.index') }}" class="waves-effect">
                                                <span class="him-label">주문하기</span>
                                        </a>
                                </li>

                                @if(Auth::check())
                                <li class="dropdown">
                                        <a hreaf="" data-toggle="dropdown" aria-expanded="false" class="profile-avatar">
                                                {!! Html::image('/avatar/'.Auth::id()) !!}
                                        </a>
                                        <ul class="dropdown-menu dm-icon pull-right">
                                                <li>
                                                        <a href="{{ route('mypage.myorder.index') }}"><i class="zmdi zmdi-shopping-cart"></i> 내 주문</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('mypage.profile.index') }}"><i class="zmdi zmdi-face"></i> 내 정보</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('logout') }}"><i class="zmdi zmdi-lock"></i> 로그아웃</a>
                                                </li>
                                        </ul>
                                </li>

                                @else
                                <li>
                                        <a href="{{ route('login') }}"><span class="him-label">로그인</span></a>
                                </li>
                                @endif


                        </ul>
                </li>
        </ul>

</header>
