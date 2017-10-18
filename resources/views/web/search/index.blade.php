@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>인증서 조회<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 조회</span></div></h2></div>

<div id='sub_wrap'>
        <div class='cert_list_title'>총 <strong>{{ count($orders) }}</strong>개의 인증서가 검색되었습니다.</div>

        @unless(count($orders))
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
        @endunless



        @foreach($orders as $key => $order)
                <div class="cert_list_box
        @if($order->certificates->isExpired())
                        expire
@endif
                        ">
                        <div class='cert_box_head'>
                                <div>{{ $order->getOrderNumber() }}</div>
                                <span><strong>보증기간</strong> {{ $order->certificates->getExpireDate()->format("Y년 m월 d일 ") }}
                                        까지</span>
                        </div>
                        <div class='cert_box_cont'>
                                <div class='cert_box_cont_img'>
                                        @if($order->certificates->pictures)
                                                <img
                                                        name="picture"
                                                        src="http://cdn.chagumsa.com/diagnosis/{{ $order->certificates->pictures }}"
                                                        class="img-responsive picture"
                                                        style="width: 290px;height: 290px;">
                                        @else
                                                {{--<img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>--}}
                                                <img
                                                        name="picture"
                                                        src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=400&qty=80&url=http://cdn.chagumsa.com/diagnosis/{{ $order->getExteriorPicture()[0]->files[0]->id }}"
                                                        class="img-responsive picture"
                                                        style="width: 290px;height: 290px;">
                                        @endif

                                </div>
                                <div class='cert_box_cont_info'>
                                        <ul>
                                                <li><label>차량</label><span>{{ $order->getCarFullName() }}</span></li>
                                                <li><label>연식</label><span>{{ $order->car->year }} 년식</span></li>
                                                <li><label>사용연료</label><span>{{ $order->car->getFuelType->display() }}</span></li>
                                                <li><label>주행거리</label><span>{{ number_format($order->mileage) }} km</span></li>
                                                <li><label>차대번호</label><span>{{ $order->car->vin_number }}</span></li>
                                                <li>
                                                        <label>인증서발급일</label><span>{{ $order->certificates->updated_at ? $order->certificates->updated_at->format('Y년 m월 d일') : '-' }}</span>
                                                </li>

                                        </ul>
                                </div>
                                <div class='cert_box_cont_result' style="margin-top: 50px;">
                                        <div><label>산정가격</label><span><strong>{{ number_format($order->certificates->price) }} </strong>만원</span>
                                        </div>
                                        <div><label>차량 성능 등급</label><span><strong>{{ $order->certificates->certificate_grade->display() }}</strong></span>
                                        </div>
                                </div>
                        </div>
                        <div class='cert_box_foot'>
                                <div class='cert_detail'>
                                        <button class='btn btn-default fa fa-search detail' data-car_number="{{ $order->car_number }}"
                                                data-datekey="{{ \App\Models\Order::find($order->id)->created_at->format('ymd')}}">
                                                상세보기
                                        </button>
                                </div>
                        </div>
                </div>
        @endforeach

        {{--<div class="br30"></div>--}}
        {{-- 페이징 추가 --}}
        {{--<div class='board_pagination_wrap'>--}}
                {{--@include('vendor.pagination.web-page', ['paginator' => $orders])--}}
        {{--</div>--}}


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function (){
    $('.detail').click(function () {
        var car_number = $(this).data('car_number');
        var datekey = $(this).data('datekey');
        window.open('http://cert.chagumsa.com/'+car_number+'-'+datekey, "", "width=1400, height=1400");
    });
});
</script>
@endpush
