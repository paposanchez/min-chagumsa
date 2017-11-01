<div id="aside-left" class="aside aside-left ">

   <div class="aside-container perfect-scrollbar">
           <div class="aside-profile">

               {{ Helper::imageTag('/avatar/'.Auth::id(), 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}


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

                       <li class="{{ Request::is('order*') ? ' active':''}}"><a href="/order"><i class="fa fa-shopping-cart"></i><span class="nav-label">{{ trans('admin/order.title') }}</span></a></li>

                       <li class="{{ Request::is('diagnosis*') ? ' active':''}}"><a href="/diagnosis"><i class="fa fa-search"></i><span class="nav-label">{{ trans('admin/diagnosis.title') }}</span></a></li>

                       <li class="{{ Request::is('certificate*') ? ' active':''}}"><a href="/certificate"><i class="fa fa-certificate"></i><span class="nav-label">{{ trans('admin/certificate.title') }}</span></a></li>

                       <li class="{{ Request::is('calculation*') ? ' active':''}}"><a href="/calculation"><i class="fa fa-money"></i><span class="nav-label">{{ trans('admin/calculation.title') }}</span></a></li>

                       <li class="{{ Request::is('item*') ? ' active':''}}"><a href="/item"><i class="fa fa-archive"></i><span class="nav-label">{{ trans('admin/item.title') }}</span></a></li>

                       <li class="{{ Request::is('user*') ? ' active':''}}"><a href="/user"><i class="fa fa-group"></i><span class="nav-label">{{ trans('admin/user.title') }}</span></a></li>

                       <li class="{{ Request::is('post*') ? ' active':''}}"><a href="/post"><i class="fa fa-pencil"></i><span class="nav-label">{{ trans('admin/post.title') }}</span></a></li>

                       <li class="{{ Request::is('sms*') ? ' active':''}}"><a href="/sms"><i class="fa fa-comments" aria-hidden="true"></i><span class="nav-label">SMS</span></a></li>

                       <li class="{{ Request::is('coupon*') ? ' active':''}}"><a href="/coupon"><i class="fa fa-qrcode"></i><span class="nav-label">쿠폰</span></a></li>

                       <li class="dropdown {{ Request::is('config*') ? ' active':''}}">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gears"></i><span class="nav-label">{{ trans('admin/config.title') }}</span><b class="caret"></b></a>
                           <ul class="dropdown-menu">
                               <li class="{{ Request::is('config/code*') ? ' active':''}}"><a href="{{ url('/config/code') }}"><span class="nav-label">{{ trans('admin/code.title') }}</span></a></li>
                               <li class="{{ Request::is('config/role*') ? ' active':''}}"><a href="{{ url('/config/role') }}"><span class="nav-label">{{ trans('admin/role.title') }}</span></a></li>
                               {{--<li class="{{ Request::is('config/permission*') ? ' active':''}}"><a href="{{ url('/config/permission') }}"><span class="nav-label">{{ trans('admin/permission.title') }}</span></a></li>--}}
                               <li class="{{ Request::is('config/board*') ? ' active':''}}"><a href="{{ url('/config/board') }}"><span class="nav-label">{{ trans('admin/board.title') }}</span></a></li>
                               {{--<li class="{{ Request::is('config/tag*') ? ' active':''}}"><a href="{{ url('/config/tag') }}"><span class="nav-label">{{ trans('admin/tag.title') }}</span></a></li>--}}
                           </ul>
                       </li>

                   </ul>

               </div>

           </div>

           <div class="aside-footer">

           </div>
   </div>

</div>
