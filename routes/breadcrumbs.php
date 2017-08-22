<?php

//############################## Admin
Breadcrumbs::register('admin', function($breadcrumbs) {
    $breadcrumbs->push(trans("admin/dashboard.title"), route('dashboard.index'));
});
Breadcrumbs::register('admin.user', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/user.title"), route('user.index'));
});
Breadcrumbs::register('admin.post', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/post.title"), route('post.index'));
});
Breadcrumbs::register('admin.bcs-post', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/bcs-post.title"), route('bcs-post.index'));
});
Breadcrumbs::register('admin.comment', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/comment.title"), route('comment.index'));
});

Breadcrumbs::register('admin.config', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/config.title"), route('code.index'));
});
Breadcrumbs::register('admin.config.code', function($breadcrumbs) {
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push(trans("admin/code.title"), route('code.index'));
});
Breadcrumbs::register('admin.config.board', function($breadcrumbs) {
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push(trans("admin/board.title"), route('board.index'));
});
Breadcrumbs::register('admin.config.role', function($breadcrumbs) {
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push(trans("admin/role.title"), route('role.index'));
});
Breadcrumbs::register('admin.config.permission', function($breadcrumbs) {
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push(trans("admin/permission.title"), route('permission.index'));
});
Breadcrumbs::register('admin.config.tag', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/tag.title"), route('tag.index'));
});



Breadcrumbs::register('admin.order', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/order.title"), route('order.index'));
});
Breadcrumbs::register('admin.calculation', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/calculation.title"), route('calculation.index'));
});


Breadcrumbs::register('admin.diagnosis', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push(trans("admin/diagnosis.title"), route('diagnosis.index'));
});



//############################## Web
Breadcrumbs::register('web', function($breadcrumbs) {
    $breadcrumbs->push(trans("web/home.title"), url('/'));
});
Breadcrumbs::register('web.service', function($breadcrumbs) {
    $breadcrumbs->parent('web');
    $breadcrumbs->push(trans("web/service.title"), url('service/index'), ['desc' => trans("web/service.desc")]);
});
Breadcrumbs::register('web.community', function($breadcrumbs) {
    $breadcrumbs->parent('web');
    $breadcrumbs->push(trans("web/community.title"), route('notice.index'), ['desc' => trans("web/community.desc")]);
});
Breadcrumbs::register('web.community.notice', function($breadcrumbs) {
    $breadcrumbs->parent('web.community');
    $breadcrumbs->push(trans("web/notice.title"), route('notice.index'), ['desc' => trans("web/notice.desc")]);
});


Breadcrumbs::register('web.community.inquire', function($breadcrumbs) {
    $breadcrumbs->parent('web.community');
    $breadcrumbs->push(trans("web/inquire.title"), route('notice.index'), ['desc' => trans("web/inquire.desc")]);
});

Breadcrumbs::register('web.community.faq', function($breadcrumbs) {
    $breadcrumbs->parent('web.community');
    $breadcrumbs->push(trans("web/faq.title"), route('faq.index'), ['desc' => trans("web/faq.desc")]);
});
Breadcrumbs::register('web.community.free', function($breadcrumbs) {
    $breadcrumbs->parent('web.community');
    $breadcrumbs->push(trans("web/free.title"), route('free.index'), ['desc' => trans("web/free.desc")]);
});
Breadcrumbs::register('web.mypage', function($breadcrumbs) {
    $breadcrumbs->parent('web');
    $breadcrumbs->push(trans("web/mypage.title"), route('mypage'), ['desc' => trans("web/mypage.desc")]);
});
Breadcrumbs::register('web.mypage.profile', function($breadcrumbs) {
    $breadcrumbs->parent('web.mypage');
    $breadcrumbs->push(trans("web/profile.title"), route('profile.index'), ['desc' => trans("web/profile.desc")]);
});
Breadcrumbs::register('web.mypage.history', function($breadcrumbs) {
    $breadcrumbs->parent('web.mypage');
    $breadcrumbs->push(trans("web/history.title"), route('history.index'), ['desc' => trans("web/history.desc")]);
});


//############################## BCS
Breadcrumbs::register('bcs.order', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/order.title"), route("bcs.order.index"));
});
Breadcrumbs::register('bcs', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/dashboard.title"), url('/'));
});
Breadcrumbs::register('bcs.calculation', function($breadcrumbs) {
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/calculation.title"), route('bcs.calculation.index'));
});
Breadcrumbs::register('bcs.user', function($breadcrumbs) {
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/user.title"), route('bcs.user.index'));
});
Breadcrumbs::register('bcs.notice', function($breadcrumbs) {
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/notice.title"), route('bcs.notice.index'));
});
Breadcrumbs::register('bcs.info', function($breadcrumbs) {
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("bcs/bcs-info.title"), route('bcs.info.index'));
});

//############################## Technician

Breadcrumbs::register('technician.order', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push(trans("admin/order.title"), route("order.index"));
});

Breadcrumbs::register('technician.notice', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push("공지사항", route("notice.index"));
});
Breadcrumbs::register('technician.user.edit', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push("정보수정", route("technician.user.edit"));
});
Breadcrumbs::register('technician.dashboard', function($breadcrumbs){
//    $breadcrumbs->parent('bcs');
    $breadcrumbs->push("대시보드", route("technician.dashboard.index"));
});