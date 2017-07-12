@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>인증서 조회<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 조회</span></div></h2></div>

<div id='sub_wrap'>

    @if(count($result) == 0 )
        <h3>{{ Html::image(Helper::theme_web( '/img/sub/cert_icon.png')) }}<div class='br20'></div>입력하신 인증서번호 또는 차량번호가 정확하지 않습니다.</h3>
        <h5>인증서번호 또는 차량번호를 다시 확인한 후 입력해 주세요.</h5>

        <div class='br30'></div>

        <div class='ipt_box wid33'>
            <form action="{{ route('search.index') }}">
                <div class='mv_cert_search_wrap'>
                    <input type='text' name="q" placeholder='인증서번호 또는 차량번호' value="{{ request("q") }}">
                    <button type='submit'><i class="fa fa-search" ></i></button>
                </div>
            </form>
        </div>
    @else
        <div class='order_info_box'>
            <div class='order_info_title'>
                <strong>주문일</strong>
                <span>{{ Carbon\Carbon::parse($result[0]->created_at)->format('Y-m-d') }}</span>

                <a href=''>주문상세보기 ></a>
            </div>
            <div class='order_info_cont'>
                <div class='order_info_desc'>
                    <span>주문일</span>
                    <span>주문번호</span>
                    <span>주문자</span>
                    <span>휴대폰 번호</span>
                    <span>차량정보</span>
                </div>
                <div class='order_info_desc'>
                    <span>{{ Carbon\Carbon::parse($result[0]->created_at)->format('Y-m-d') }}</span>
                    <span>{{ $result[0]->getOrderNumber() }}</span>
                    <span>{{ $result[0]->order_number }}</span>
                    <span>{{ $result[0]->orderer_name }}</span>
                    <span>{{ $result[0]->orderer_mobile }}</span>
                    <span>{{ $result[0]->getCarFullName() }}</span>
                </div>
                <div class='order_info_btn'>
                    인증 완료
                    {{--<button class='btns btns2'>취소신청</button>--}}
                </div>
            </div>
        </div>
    @endif
</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
