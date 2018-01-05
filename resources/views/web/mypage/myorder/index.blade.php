@extends( 'web.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>
        <h2>마이페이지
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i
                        class="fa fa-angle-right"></i> <span>주문목록</span></div>
        </h2>
    </div>

    <div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
            <li><a class='select' href='{{ route('mypage.myorder.index') }}'>주문목록</a></li>
            <li><a class='' href='{{ route('mypage.certificate.index') }}'>MY 인증서</a></li>
            <li><a class='' href='{{ route('mypage.profile.index') }}'>회원정보수정</a></li>

            <li class="pull-right" style="font-size:18px;font-weight:200;margin-top:15px;">총
                <strong>{{ number_format($my_orders->total()) }}</strong>개
            </li>
        </ul>

        <div class='br30'></div>

        @unless(count($my_orders))
            <div class="no-result">
                검색된 주문이 없습니다.
            </div>
        @endunless

        @foreach($my_orders as $orders)
            <div class='order_info_box'>
                <div class='order_info_title clearfix '>

                    <a class="text-lg text-light"
                       href="{{ route('mypage.order.show', ['id'=>$orders->id]) }}">{{ $orders->getOrderNumber() }}</a>

                    <small class="pull-right text-muted text-light" data-toggle="tooltip"
                           title="주문일자">{{ $orders->created_at->format('Y년 m월 d일 H:i') }}</small>
                </div>


                <div class='order_info_cont'>

                    <div class='order_info_desc'>
                        <span>주문자정보</span>
                        <span>차량정보</span>
                        <span>주문정보</span>
                    </div>

                    <div class='order_info_desc'>
                        <span>{{ $orders->orderer_name }}</span>
                        <span>{{ $orders->getCarFullName() }}</span>
                        <span>{{ $orders->item->name }}
                            <small class="text-muted">({{ number_format($orders->item->price) }}원)</small></span>
                    </div>

                    <div class='order_info_btn text-center'>


                        @if($orders->status_cd >= 102 && $orders->status_cd < 109)
                            <div class="label label-info">
                                @elseif($orders->status_cd == 109)
                                    <div class="label label-primary">
                                        @else
                                            <div class="label label-default">
                                                @endif
                                                {{ $orders->status->display() }}
                                            </div>

                                    </div>

                            </div>


                    </div>
                    @endforeach
                    <div class="br30"></div>
                    {{-- 페이징 추가 --}}
                    <div class='board_pagination_wrap'>
                        @include('vendor.pagination.web-page', ['paginator' => $my_orders])
                    </div>


                    <div class='order_info_box'>
                        <div class='order_info_title'>
                            <strong>주문상태 안내</strong>
                            <a class="text-light text-sm pull-right no-margin" href='{{ route('faq.index') }}'>FAQ
                                보러가기</a>
                        </div>
                        <div class='order_info_guide'>
                            <ul style="padding-bottom: 20px;">
                                <li>
                                    <div>주문완료</div>
                                    <span class="text-sm">결제 및 예약확인이<br>완료되었습니다.</span>
                                    <strong style="margin-top:30px;" class="text-primary">입고정보변경 가능<br>주문취소 가능</strong>
                                </li>
                                <li>
                                    <div>입고일 확정</div>
                                    <span class="text-sm">예약한 정비소에서<br>입고일을 확정했습니다.</span>
                                    <strong style="margin-top:30px;" class="text-primary">주문취소 가능</strong>
                                </li>
                                <li>
                                    <div>진단 중</div>
                                    <span class="text-sm">입고가 완료되어<br>정비사가 차량상태를<br>점검중입니다.</span>
                                </li>
                                <li>
                                    <div>승인 중</div>
                                    <span class="text-sm">점검이 완료되어<br>기술사가 최종 승인을<br>검토중입니다.</span>
                                </li>
                                <li>
                                    <div>발급완료</div>
                                    <span class="text-sm">인증서 발급이<br>완료되었습니다.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='br30'></div>


                </div>

                {!! Form::open(['route' => ["mypage.order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
                <input type="hidden" name="order_id" id="cancel-order_id">
                {!! Form::close() !!}

                @endsection


                @push( 'header-script' )
                @endpush

                @push( 'footer-script' )
                    <script type="text/javascript">
                        $(function () {
                            $(".cancel-click").on("click", function () {
                                if (confirm("해당 주문에 대한 결제를 취소하시겠습니까?")) {
                                    var order_id = $(this).data("cancel_order_id");
                                    if (order_id) {
                                        $("#cancel-order_id").val(order_id);
                                        $("#cancel-form").submit();
                                    } else {
                                        alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                                    }

                                }
                            });
                        });
                    </script>
    @endpush
