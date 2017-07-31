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

        {{--<li>--}}
            {{--<strong>회원관련</strong>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'R']) }}" class="{{ \App\Helpers\Helper::faqSelect('R', $category_id) }}">가입/탈퇴</a>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'L']) }}" class="{{ \App\Helpers\Helper::faqSelect('L', $category_id) }}">로그인</a>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'I']) }}" class="{{ \App\Helpers\Helper::faqSelect('I', $category_id) }}">아이디/비밀번호찾기</a>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'M']) }}" class="{{ \App\Helpers\Helper::faqSelect('M', $category_id) }}">회원정보관리</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<strong>결제</strong>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'P']) }}" class="{{ \App\Helpers\Helper::faqSelect('P', $category_id) }}">결제관련</a>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'O']) }}" class="{{ \App\Helpers\Helper::faqSelect('O', $category_id) }}">주문상태</a>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'F']) }}" class="{{ \App\Helpers\Helper::faqSelect('F', $category_id) }}">환불규정</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<strong>인증서신청</strong>--}}
            {{--<a href="{{ route("faq.index", ['category_id' => 'G']) }}" class="{{ \App\Helpers\Helper::faqSelect('G', $category_id) }}">가이드</a>--}}
        {{--</li>--}}

        <li>
            <strong>회원관련</strong>
            <a href="{{ route("faq.index", ['category_id' => '1']) }}" class="{{ \App\Helpers\Helper::faqSelect('1', $category_id) }}">가입/탈퇴</a>
            <a href="{{ route("faq.index", ['category_id' => '2']) }}" class="{{ \App\Helpers\Helper::faqSelect('2', $category_id) }}">로그인</a>
            <a href="{{ route("faq.index", ['category_id' => '3']) }}" class="{{ \App\Helpers\Helper::faqSelect('3', $category_id) }}">아이디/비밀번호찾기</a>
            <a href="{{ route("faq.index", ['category_id' => '4']) }}" class="{{ \App\Helpers\Helper::faqSelect('4', $category_id) }}">회원정보관리</a>
        </li>
        <li>
            <strong>결제</strong>
            <a href="{{ route("faq.index", ['category_id' => '5']) }}" class="{{ \App\Helpers\Helper::faqSelect('5', $category_id) }}">결제관련</a>
            <a href="{{ route("faq.index", ['category_id' => '6']) }}" class="{{ \App\Helpers\Helper::faqSelect('6', $category_id) }}">주문상태</a>
            <a href="{{ route("faq.index", ['category_id' => '7']) }}" class="{{ \App\Helpers\Helper::faqSelect('7', $category_id) }}">환불규정</a>
        </li>
        <li>
            <strong>인증서신청</strong>
            <a href="{{ route("faq.index", ['category_id' => '8']) }}" class="{{ \App\Helpers\Helper::faqSelect('8', $category_id) }}">가이드</a>
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
