@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='select' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
        <li><a class='' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
    </ul>

    <div class='br30'></div>

    @foreach($my_orders as $orders)
    <div class='order_info_box'>
        <div class='order_info_title'>
            <strong>주문일</strong>
            <span>{{ Carbon\Carbon::parse($orders->created_at)->format('Y-m-d') }}</span>


            <a href='{{ route('mypage.order.show', ['id'=>$orders->id]) }}'>주문상세보기 ></a>
        </div>
        <div class='order_info_cont'>
            <div class='order_info_desc'>
                <span>주문자</span>
                <span>휴대폰 번호</span>
                <span>차량정보</span>
            </div>
            <div class='order_info_desc'>
                <span>{{ $orders->orderer_name }}</span>
                <span>{{ $orders->orderer_mobile }}</span>
                <span>{{ $orders->getCarFullName() }}</span>
            </div>
            <div class='order_info_btn'>
                {{ $orders->status->display() }}
                @if( $orders->status_cd != 107 )
                <button class='btns btns2'>취소신청</button>
                @endif
            </div>
        </div>
    </div>
    <div class='br20'></div>
    @endforeach

    <div class='br30'></div>

    <div class='order_info_box'>
        <div class='order_info_title'>
            <strong>주문상태 안내</strong>
            <a href='{{ route('faq.index') }}'>FAQ 보러가기 ></a>
        </div>
        <div class='order_info_guide'>
            <ul>
                <li>
                    <div>주문완료</div>
                    <span>결제 및 예약확인이<br>완료되었습니다.</span>
                    <strong>입고정보변경 가능<br>주문취소 가능</strong>
                </li>
                <li>
                    <div>입고일 확정</div>
                    <span>예약한 정비소에서<br>입고일을 확정했습니다.</span>
                    <strong>주문취소 가능</strong>
                </li>
                <li>
                    <div>진단 중</div>
                    <span>입고가 완료되어<br>정비사가 차량상태를<br>점검중입니다.</span>
                </li>
                <li>
                    <div>승인 중</div>
                    <span>점검이 완료되어<br>기술사가 최종 승인을<br>검토중입니다.</span>
                </li>
                <li>
                    <div>발급완료</div>
                    <span>인증서 발급이<br>완료되었습니다.</span>
                </li>
            </ul>
        </div>
    </div>

</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
