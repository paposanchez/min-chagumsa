@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>

<div id='sub_wrap'>


        <div class='join_wrap order-container'>

                <ul class='join_step type2' id="join_step">
                        <li class='on'>
                                <strong>01</strong>
                                <span>주문</span>
                        </li>
                        <li class='on'>
                                <strong>02</strong>
                                <span>차량</span>
                        </li>
                        <li class='on'>
                                <strong>03</strong>
                                <span>결제</span>
                        </li>
                        <li class='on'>
                                <strong>04</strong>
                                <span>완료</span>
                        </li>
                </ul>

                <div class='br30'></div>





                        <div class="block bg-default text-center">

                                <h3>{{ $order->getOrderNumber() }}</h3>

                                <h4>
                                        주문이 성공적으로 완료되었습니다. 감사합니다.
                                </h4>


                        </div>






                <div class="row">
                        <div class="col-xs-6 order-info-block">
                                <strong class="text-light text-md">주문정보</strong>
                                <div class="block bg-white">
                                        <ul>
                                                <li><strong class="text-light text-muted">주문상품</strong> <span>{{ $order->item->name }}</span></li>
                                                <li><strong class="text-light text-muted">결제방법</strong> <span>{{ $order->purchase->payment_type->display() }}</span></li>
                                                <li><strong class="text-light text-muted">결제금액</strong> <span>{{ number_format($order->item->price) }}원</span></li>
                                                <li><strong class="text-light text-muted">결제일</strong> <span>{{ $order->purchase->updated_at }}</span></li>
                                        </ul>
                                </div>
                        </div>

                        <div class="col-xs-6 order-info-block">
                                <strong class="text-light text-md">예약정보</strong>
                                <div class="block bg-white">
                                        <ul>
                                                <li><strong class="text-light text-muted">예약상태</strong> <span>미정</span>
                                                </li>
                                                <li><strong class="text-light text-muted">입고예정일</strong> <span>{{ $reservation->reservation_at->format('Y년 m월 d일') }}</span></li>
                                                <li><strong class="text-light text-muted">입고대리점</strong> <span>{{ $order->garage->name }} <small>{{ $order->garage->user_extra->phone }}</small></span></li>
                                        </ul>
                                </div>
                        </div>
                </div>



                <p class="text-center" style="margin-bottom:30px;">
                        <button type="button" class='btn btn-default btn-lg'>새로운 주문하기</button>
                        <a class='btn btn-default btn-lg' href="/mypage/order/change-reservation/{{ $order->id }}">예약 변경하기</a>
                        <button type="button" class='btn btn-primary btn-lg' id="mypage">주문 상세보기</button>
                </p>


        </div>
        @endsection


        @push( 'header-script' )
        @endpush

        @push( 'footer-script' )
        <script type="text/javascript">
        $(function (){
                $('#home').click(function (){
                        location.href = '/';
                });

                $('#mypage').click(function (){
                        location.href = '{{ route('mypage.order.index') }}';
                });
        });
        </script>

        @endpush
