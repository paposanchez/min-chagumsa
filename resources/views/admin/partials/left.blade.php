<aside id="sidebar" class="sidebar c-overflow">
        <div class="s-profile">
                <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                                <!-- <img src="/assets/img/demo/profile-pics/1.jpg" alt=""> -->
                                {!! Html::image('/avatar/'.Auth::id()) !!}
                        </div>

                        <div class="sp-info">
                                {{ Auth::user()->name }}

                                <i class="zmdi zmdi-caret-down"></i>
                        </div>
                </a>

                <ul class="main-menu">
                        <li>
                                <a href="{{ route('profile.index') }}"><i class="zmdi zmdi-account"></i> 프로필</a>
                        </li>
                        <!-- <li>
                        <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                </li> -->
                <!-- <li>
                <a href=""><i class="zmdi zmdi-settings"></i> 설정</a>
        </li> -->
        <li>
                <a href="{{ route('logout') }}"><i class="zmdi zmdi-lock"></i> 로그아웃</a>
        </li>
</ul>
</div>

<ul class="main-menu">
        <li class="{{ Request::is('dashboard*') ? ' active':''}}">
                <a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> 대시보드</a>
        </li>

        <li class="sub-menu {{ Request::is('order*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-shopping-cart"></i> 주문관리</a>
                <ul>
                        <li><a href="{{ route('order.index') }}">전체목록</a></li>
                        <li><a href="{{ route('order.create') }}">신규주문</a></li>
                </ul>
        </li>

        <li class="{{ Request::is('diagnosis*') ? ' active':''}}"><a href="{{ route('diagnosis.index') }}"><i class="zmdi zmdi-car"></i> 진단관리</a></li>
        <li class="{{ Request::is('certificate*') ? ' active':''}}"><a href="{{ route('certificate.index') }}"><i class="zmdi zmdi-assignment-account"></i> 인증관리</a></li>
        <li class="{{ Request::is('warranty*') ? ' active':''}}"><a href="{{ route('warranty.index') }}"><i class="zmdi zmdi-assignment-check"></i> 보증관리</a></li>
        <li class="{{ Request::is('purchase*') ? ' active':''}}"><a href="{{ route('purchase.index') }}"><i class="zmdi zmdi-card"></i> 결제관리</a></li>
        <li class="{{ Request::is('calculation*') ? ' active':''}}"><a href="{{ route('calculation.index') }}"><i class="zmdi zmdi-local-atm"></i> 정산관리</a></li>

        <li class="sub-menu {{ Request::is('user*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account-box"></i> 회원관리</a>
                <ul>
                        <li><a href="{{ route('user.index') }}">전체목록</a></li>
                        <li><a href="{{ route('user.create') }}">신규회원</a></li>
                </ul>
        </li>


        <li class="sub-menu {{ Request::is('posting*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-list-numbered"></i> 게시물관리</a>
                <ul>
                        <li><a href="{{ route('posting.index') }}">전체목록</a></li>
                        <li><a href="{{ route('posting.create') }}">신규게시물</a></li>
                        <li><a href="{{ route('comment.index') }}">전체코멘트</a></li>
                </ul>
        </li>

        <li class="sub-menu {{ Request::is('notify*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-notifications-active"></i> 알림관리</a>
                <ul>
                        <li><a href="{{ route('notify.index') }}">전체목록</a></li>
                        <li><a href="{{ route('notify.create') }}">신규알림</a></li>
                </ul>
        </li>

        <li class="sub-menu {{ Request::is('notify*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-local-activity"></i> 쿠폰관리</a>
                <ul>
                        <li><a href="{{ route('coupon.index') }}">전체목록</a></li>
                        <li><a href="{{ route('coupon.create') }}">신규쿠폰</a></li>
                </ul>
        </li>


        <li class="sub-menu {{ Request::is('setting*') ? ' active':''}}">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-settings"></i> 기타관리</a>
                <ul>

                        <li><a href="{{ route('code.index') }}">코드관리</a></li>
                        <li><a href="{{ route('item.index') }}">상품관리</a></li>

                        <li class="sub-menu">
                                <a href="" data-ma-action="submenu-toggle">역활관리</a>
                                <ul>
                                        <li><a href="{{ route('role.index') }}">전체목록</a></li>
                                        <li><a href="{{ route('role.create') }}">신규역활</a></li>
                                </ul>
                        </li>

                        <li class="sub-menu">
                                <a href="" data-ma-action="submenu-toggle">권한관리</a>
                                <ul>
                                        <li><a href="{{ route('permission.index') }}">전체목록</a></li>
                                        <li><a href="{{ route('permission.create') }}">신규권한</a></li>
                                </ul>
                        </li>

                        <li class="sub-menu">
                                <a href="" data-ma-action="submenu-toggle">게시판관리</a>
                                <ul>
                                        <li><a href="{{ route('board.index') }}">전체목록</a></li>
                                        <li><a href="{{ route('board.create') }}">신규게시판</a></li>
                                </ul>
                        </li>



                </ul>
        </li>



</ul>
</aside>
