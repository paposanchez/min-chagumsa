<header id="header" class="clearfix" data-ma-theme="bluegray">
        <ul class="h-inner">
                <li class="hi-trigger ma-trigger hidden-md hidden-lg" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                        <div class="line-wrap">
                                <div class="line top"></div>
                                <div class="line center"></div>
                                <div class="line bottom"></div>
                        </div>
                </li>

                <li class="hi-logo hidden-xs">
                        <a href="/" class="m-l-10"><img src="http://www.chagumsa.com/assets/themes/v1/web/img/comm/head_logo.png" width="60px"></a>
                </li>

                <li class="pull-left">
                        <ul class="hi-menu">
                                <li>
                                        <a href="{{ route('information.diagnosis') }}" class="">
                                                <span class="him-label">차검사진단서</span>
                                        </a>
                                </li>

                                <li class="">
                                        <a href="{{ route('information.certificate') }}" class="">
                                                <span class="him-label">차검사평가서</span>
                                        </a>
                                </li>

                                <li class="">
                                        <a href="{{ route('information.warranty') }}" class="">
                                                <span class="him-label">차검사인증서</span>
                                        </a>
                                </li>

                                <li class="dropdown hidden-xs">
                                        <a data-toggle="dropdown" href=""><span class="him-label">고객센터</span></a>
                                        <ul class="dropdown-menu dm-icon pull-right">
                                                <li>
                                                        <a href="{{ route('order.index') }}"><i class="zmdi zmdi-face"></i> 공지사항</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('order.index') }}"><i class="zmdi zmdi-settings"></i> FAQ</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('order.index') }}"><i class="zmdi zmdi-settings"></i> 문의하기</a>
                                                </li>
                                        </ul>
                                </li>

                        </ul>
                </li>

                <li class="pull-right">
                        <ul class="hi-menu">

                                <li class="">
                                        <a href="{{ route('order.index') }}" class="btn btn-danger waves-effect">
                                                <span class="him-label">신청하기</span>
                                        </a>
                                </li>
                                <li>
                                        <a href=""><span class="him-label">로그인</span></a>
                                </li>

                        </ul>
                </li>
        </ul>

        <!-- Top Search Content -->
        <div class="h-search-wrap">
                <div class="hsw-inner">
                        <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                        <input type="text">
                </div>
        </div>
</header>
