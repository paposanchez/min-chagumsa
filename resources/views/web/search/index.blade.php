@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>인증서 조회<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 조회</span></div></h2></div>

<div id='sub_wrap'>        

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
        <div class='cert_list_box'>
                <div class='cert_box_head'>
                        <div>{{ $order->getCarFullName() }}</div>
                        <span><strong>보증기간</strong> 2017년 2월 13일까지</span>
                </div>
                <div class='cert_box_cont'>
                        <div class='cert_box_cont_img'>
                                <img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
                        </div>
                        <div class='cert_box_cont_info'>
                                <ul>
                                        <li><label>연식</label><span>{{ $order->car->year }} 년식</span></li>
                                        <li><label>차대번호</label><span>{{ $order->car->vin_number }}</span></li>
                                        <li><label>차종구분</label><span>{{ $order->car->getKind->display() }} / {{ $order->car->passenger }} 인승</span></li>
                                        <li><label>사용연료</label><span>{{ $order->car->getFuelType->display() }}</span></li>
                                        <li><label>주행거리</label><span>{{ number_format($order->mileage) }} km</span></li>
                                        <li><label>인증서발급일</label><span>{{ Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}</span></li>

                                </ul>
                        </div>
                        <div class='cert_box_cont_result'>
                                <ul>
                                        <li><label>산정가격</label><span><strong>{{ number_format($order->certificates->price) }} </strong>만원</span></li>
                                        <li><label>차량 성능 등급</label><span><strong>{{ $order->certificates->grade }}</strong></span></li>
                                </ul>
                        </div>
                </div>
                <div class='cert_box_foot'>

                        <div class='cert_detail'>
                                <button class='btns btns_green detail' id="detail" data-order_id="{{ $order->id }}">
                                        <i class="fa fa-search" ></i> 상세보기
                                        <input type="text" name="order_id" id="order_id" value="{{ $order->id }}" hidden>
                                </button>
                        </div>
                </div>
        </div>
        @endforeach



</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function (){
        $('.detail').click(function(){
                var order_id = $(this).data('order_id');
                window.open('/certificate/'+order_id+'/summary',"", "width=1400, height=1400");
        });
});
</script>
@endpush
