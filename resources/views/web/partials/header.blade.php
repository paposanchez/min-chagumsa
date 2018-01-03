<header id="header" class="clearfix" data-ma-theme="blue">

        <!-- <nav class="ha-menu" style="background:#000;">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active dropdown">
                        <a href="" data-toggle="dropdown">Headers</a>

                        <ul class="dropdown-menu">
                            <li><a href="textual-menu.html">Textual menu</a></li>
                            <li><a href="image-logo.html">Image logo</a></li>
                            <li><a class="active" href="top-mainmenu.html">Mainmenu on top</a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html">Typography</a></li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">Widgets</a>
                        <ul class="dropdown-menu">
                            <li><a href="widget-templates.html">Templates</a></li>
                            <li><a href="widgets.html">Widgets</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">Tables</a>
                        <ul class="dropdown-menu">
                            <li><a href="tables.html">Normal Tables</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="data-tables.html">Data Tables</a>
                                <ul class="dropdown-menu">
                                    <li><a href="">One</a></li>
                                    <li><a href="">Two</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="false">Forms</a>
                        <ul class="dropdown-menu">
                            <li><a href="form-elements.html">Basic Form Elements</a></li>
                            <li><a href="form-components.html">Form Components</a></li>
                            <li><a href="form-examples.html">Form Examples</a></li>
                            <li><a href="form-validations.html">Form Validation</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="false">User Interface</a>
                        <ul class="dropdown-menu">
                            <li><a href="colors.html">Colors</a></li>
                            <li><a href="animations.html">Animations</a></li>
                            <li><a href="box-shadow.html">Box Shadow</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                            <li><a href="preloaders.html">Preloaders</a></li>
                            <li><a href="notification-dialog.html">Notifications &amp; Dialogs</a></li>
                            <li><a href="media.html">Media</a></li>
                            <li><a href="components.html">Components</a></li>
                            <li><a href="other-components.html">Others</a></li>
                        </ul>
                    </li>

                </ul>
            </nav> -->


        <ul class="h-inner">
                <li class="hi-trigger ma-trigger hidden-md hidden-lg" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                        <div class="line-wrap">
                                <div class="line top"></div>
                                <div class="line center"></div>
                                <div class="line bottom"></div>
                        </div>
                </li>

                <li class="hi-logo">
                        <a href="/" class="m-l-10">
                                {{ Html::image('/assets/img/logo.png') }}
                        </a>
                </li>

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
                                                        <a href="{{ route('notice.index') }}"><i class="zmdi zmdi-face"></i> 공지사항</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('faq.index') }}"><i class="zmdi zmdi-settings"></i> FAQ</a>
                                                </li>
                                                <li>
                                                        <a href="{{ route('contact.index') }}"><i class="zmdi zmdi-settings"></i> 문의하기</a>
                                                </li>
                                        </ul>
                                </li>

                        </ul>
                </li>

                <li class="pull-right">
                        <ul class="hi-menu">
                                <li class="">
                                        <a href="{{ route('order.index') }}" class="waves-effect">
                                                <span class="him-label">신청하기</span>
                                        </a>
                                </li>
                                <li>
                                        <a href="{{ route('login') }}"><span class="him-label">로그인</span></a>
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
