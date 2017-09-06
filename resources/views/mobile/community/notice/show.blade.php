@extends( 'mobile.layouts.default' )

@section( 'content' )


    <div id='sub_title_wrap'>공지사항</div>

    <ul class='board_title_wrap'>
        <li>
            <div class='notice'>카검사 사이트 오픈 준비 중 입니다</div>
            <span>2017년 01월 03일</span>
        </li>
    </ul>

    <div class='board_view_wrap'>
        <div class='board_view_cont'>
            <!-- 컨텐츠 -->
            <img src="http://fakeimg.pl/700x260/">

            <p>
                카검사 공식 웹사이트를 오픈 준비 중 입니다.<br>
                BOSCH의 90년 역사의 세계적인 차량 정비 네트워크에서 전문적인 진단장비와 검증된 기술 노하우를 바탕으로 정확하게 진단합니다. <br>
                차량기술에 관한 고도의 전문가 그룹 H&T가 기술사법 및 자동차관리법에 근거한 체계적으로 차량상태 평가로 공정하게 가치를 산정합니다. <br>
                소비자가 본인의 차량 또는 사고자하는 차량의 정확한 진단결과와 공정한 가격을 확인할 수 있도록 카검사 인증서를 통해 투명하게 정보를 공개합니다.
            </p>
            <!-- 컨텐츠 -->
        </div>

    </div>

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