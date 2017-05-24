@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
        <li><a class='select' href='{{ route('faq.index') }}'>FAQ</a></li>
        <li><a class='' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
    </ul>

    <div class='br30'></div>

    <ul class="faq_menu">

        <li>
            <strong>회원관련</strong>
            <a href="{{ route("faq.index", ['faq_div' => 'R']) }}" class="{{ \App\Helpers\Helper::faqSelect('R', $faq_div) }}">가입/탈퇴</a>
            <a href="{{ route("faq.index", ['faq_div' => 'L']) }}" class="{{ \App\Helpers\Helper::faqSelect('L', $faq_div) }}">로그인</a>
            <a href="{{ route("faq.index", ['faq_div' => 'I']) }}" class="{{ \App\Helpers\Helper::faqSelect('I', $faq_div) }}">아이디/비밀번호찾기</a>
            <a href="{{ route("faq.index", ['faq_div' => 'M']) }}" class="{{ \App\Helpers\Helper::faqSelect('M', $faq_div) }}">회원정보관리</a>
        </li>
        <li>
            <strong>결제</strong>
            <a href="{{ route("faq.index", ['faq_div' => 'P']) }}" class="{{ \App\Helpers\Helper::faqSelect('P', $faq_div) }}">결제관련</a>
            <a href="{{ route("faq.index", ['faq_div' => 'O']) }}" class="{{ \App\Helpers\Helper::faqSelect('O', $faq_div) }}">주문상태</a>
            <a href="{{ route("faq.index", ['faq_div' => 'F']) }}" class="{{ \App\Helpers\Helper::faqSelect('F', $faq_div) }}">환불규정</a>
        </li>
        <li>
            <strong>인증서신청</strong>
            <a href="{{ route("faq.index", ['faq_div' => 'G']) }}" class="{{ \App\Helpers\Helper::faqSelect('G', $faq_div) }}">가이드</a>
        </li>
    </ul>

    <div class="faq_wrap">
        <dl class="faq_dl">
            @foreach($entrys as $key => $row)
            <dt class="">{{ $row->subject }}</dt>
            <dd style="display: none;">
                {!! nl2br($row->content) !!}
            </dd>
            @endforeach
        </dl>
    </div>

    <div class='br30'></div>

    <div class='board_pagination_wrap'>
        @include('vendor.pagination.web-page', ['paginator' => $entrys])
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
