<div class="list-group list-group-sidebar">
    <h3 class="list-group-heading">
        마이페이지
    </h3>
    <a href="{{ route("profile.index") }}" class="list-group-item {{ Request::is('profile*') ? ' active':''}}">{{ trans("web/profile.title") }}</a>
    <a href="{{ route("history.index") }}" class="list-group-item {{ Request::is('history*') ? ' active':''}}">{{ trans("web/history.title") }}</a>
</div>
