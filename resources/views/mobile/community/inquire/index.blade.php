@extends( 'mobile.layouts.default' )

@section( 'content' )
    <div id='sub_title_wrap'>1:1문의</div>

    <dl class='inquery_view_wrap faq_query'>
        <dt>문의</dt>
        <dd>
            <div>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</div>
            <span>2017년 01월 03일</span>
        </dd>
    </dl>
    <dl class='inquery_view_wrap faq_answer'>
        <dt>답변</dt>
        <dd>
            <div>네. 회원가입은 무료이며, 인증서 신청 시 국산차와 수입차에 따라 별도의 요금이 청구됩니다.</div>
            <span><a href=''>screenshot01.png</a></span>
        </dd>
    </dl>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;'>목록</button>
        </div>

    </div>


@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush