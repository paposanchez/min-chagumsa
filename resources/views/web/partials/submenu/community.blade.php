<div class="list-group list-group-sidebar">
    <h3 class="list-group-heading">
        커뮤니티
    </h3>
    <a href="/community/notice/" class="list-group-item {{ Request::is('community/notice*') ? ' active':''}}">공지사항</a>
    <a href="/community/faq/"  class="list-group-item {{ Request::is('community/faq*') ? ' active':''}}">FAQ</a>
    <a href="/community/free/"  class="list-group-item {{ Request::is('community/free*') ? ' active':''}}">자유게시판</a>
</div>