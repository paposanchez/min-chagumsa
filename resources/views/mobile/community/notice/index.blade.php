@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>공지사항</div>

    <ul class='board_list_wrap'>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div class='notice'>카검사 사이트 오픈 준비 중 입니다</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div>12월 하반기 공지사항</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div>11월 하반기 공지사항</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div>이벤트 당첨자 발표</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div>서버점검 중 입니다</div>
                <span>2017년 01월 03일</span>
            </a></li>
        <li><a href='{{ url("community/notice/show") }}' class='board'>
                <div>12월 하반기 공지사항</div>
                <span>2017년 01월 03일</span>
            </a></li>
    </ul>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;'>더보기 <i class="fa fa-angle-down"></i></button>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush