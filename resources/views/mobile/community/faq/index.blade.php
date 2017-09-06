@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>FAQ</div>

    <div class='faq_cate_wrap'>
        <select>
            <option>전체</option>
            <option>가입/탈퇴</option>
            <option>로그인</option>
            <option>아이디/비밀번호찾기</option>
            <option>회원정보관리</option>
            <option>결제관련</option>
            <option>주문상태</option>
            <option>환불규정</option>
            <option>가이드</option>
        </select>
    </div>

    <ul class='faq_list_wrap'>
        <li><a href='{{ url("community/faq/show") }}'>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</a></li>
        <li><a href='{{ url("community/faq/show") }}'>12월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>11월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</a></li>
        <li><a href='{{ url("community/faq/show") }}'>12월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>11월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</a></li>
        <li><a href='{{ url("community/faq/show") }}'>12월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>11월 하반기 공지사항</a></li>
        <li><a href='{{ url("community/faq/show") }}'>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</a></li>
    </ul>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush