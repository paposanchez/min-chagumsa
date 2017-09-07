@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>1:1문의</div>

    <ul class='board_list_wrap'>
        <li><a href='' class='faq_wait'>
                <div>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='' class='faq_finish'>
                <div>12월 하반기 공지사항</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='' class='faq_finish'>
                <div>11월 하반기 공지사항</div>
                <span>2017년 01월 03일</span>
            </a></li>
    </ul>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;'>글쓰기</button>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush