<div id="aside-left" class="aside aside-left perfect-scrollbar">

    <div class="aside-profile">

        {{ Html::image('/avatar/'.Auth::id(), 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}

        <div class="aside-profile-info">
            <a href="{{ route("user.edit", [Auth::id()]) }}" class="aside-profile-info-name">{{ Auth::user()->name }}</a>
            <a href="{{ url("logout") }}" class="text-danger"><i class="fa fa-power-off"></i></a>
            <small class="aside-profile-info-desc">{{ Auth::user()->email }} <span class="text-info">/ {{ Auth::user()->status->display() }}</span></small>
        </div>

    </div>

    <div class="navbar navbar-default">

        <div class="navbar-inner">

            <ul class="nav navbar-nav">

                <li class="{{ Request::is('dashboard*') ? ' active':''}}"><a href="/dashboard"><i class="fa fa-gear"></i><span class="nav-label">{{ trans('admin/dashboard.title') }}</span></a></li>

                <li class="{{ Request::is('order*') ? ' active':''}}"><a href="/order"><i class="fa fa-shopping-basket"></i><span class="nav-label">{{ trans('admin/order.title') }}</span></a></li>

                <li class="{{ Request::is('calculation*') ? ' active':''}}"><a href="/calculation"><i class="fa fa-line-chart"></i><span class="nav-label">{{ trans('admin/calculation.title') }}</span></a></li>

                <li class="{{ Request::is('user*') ? ' active':''}}"><a href="/user"><i class="fa fa-group"></i><span class="nav-label">엔지니어 관리</span></a></li>

                <li class="{{ Request::is('notice*') ? ' active':''}}"><a href="{{ url('/notice') }}"><i class="fa fa-pencil"></i><span class="nav-label">공지사항</span></a></li>

                {{--<li class="{{ Request::is('bcs*') ? ' active':''}}"><a href="{{ route('bcs-info') }}"><i class="fa fa-pencil"></i><span class="nav-label">BCS-인포</span></a></li>--}}
                <li class="{{ Request::is('info*') ? ' active':''}}"><a href="{{ url('/info') }}"><i class="fa fa-pencil"></i><span class="nav-label">BCS-인포</span></a></li>

            </ul>

        </div>

    </div>

    <div class="aside-footer">

    </div>

</div>
