@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>주문목록</div>

    <div id='sub_wrap'>

        <div class='br20'></div>
        <div class='join_term_wrap'>
            <label style='padding-left:4px;'>주문상세</label>
        </div>
        <div class='br10'></div>
        <div class='order_info_box'>
            <div class='order_info_title'>
                <div class='od_line'>
                    <label>주문일</label>
                    <span>{{ $order->created_at->format('Y년 m월 d일 H:i') }}</span>
                </div>
                <div class='od_line'>
                    <label>주문번호</label>
                    <span>{{ $order->getOrderNumber() }}</span>
                </div>
            </div>
            <div class='order_info_cont'>
                {{ $order->orderer_name }}<br>
                연락처 <small class="text-muted">{{ $order->orderer_mobile }}</small></span><br>
                차량정보 {{ $order->getCarFullName() }}
                <div class='order_info_btn'>
                    {{ $order->status->display() }}
                    @if( $order->status_cd >= 101 && $order->status_cd <= 104 )
                        <button class='btns btns_navy' id="cancel-click"
                                data-cancel_order_id="">취소신청</button>
                    @endif
                </div>
            </div>
        </div>


        <div class='order_detail_box'>
            <div class='order_detail_title'>
                주문 정보
            </div>
            <div class='od_line'>
                <label>주문상품</label>
                <span>{{ $order->item->name }}</span>
            </div>
            <div class='od_line'>
                <label>결제 방법</label>
                <span>
				{{ $order->purchase->payment_type->display() }}
			</span>
            </div>
            <div class='od_line'>
                <label>결제 금액</label>
                <span>
				{{ number_format($order->item->price) }}원
			</span>
            </div>
            <div class='od_line'>
                <label>결제일</label>
                <span>
				{{ $order->purchase->updated_at->format('Y-m-d H') }}시
			</span>
            </div>
        </div>

        <div class='order_detail_box'>
            <div class='order_detail_title'>
                차량 정보
                @if( $order->status_cd > 100 && $order->status_cd < 105)
                    <button class='btns btns2' data-target="{{ url("/mypage/order/change-car", [$order->id]) }}">변경</button>
                @endif
            </div>
            <div class='od_line'>
                <label>차량번호</label>
                <span>{{ $order->car_number }}</span>
            </div>
            <div class='od_line'>
                <label>제조사</label>
                <span>{{ $order->orderCar->brand->name }}</span>
            </div>
            <div class='od_line'>
                <label>모델</label>
                <span>{{ $order->orderCar->models->name }}</span>
            </div>
            <div class='od_line'>
                <label>세무보델</label>
                <span>{{ $order->orderCar->detail->name }}</span>
            </div>
            <div class='od_line'>
                <label>등급</label>
                <span>{{ $order->orderCar->grade->name }}</span>
            </div>
            <div class='od_line'>
                <label>침수여부</label>
                <span>{{ $order->flooding_state_cd == 1 ? "예" : "아니요" }}</span>
            </div>
            <div class='od_line'>
                <label>사고여부</label>
                <span>{{ $order->accident_state_cd == 1 ? "예" : "아니요"  }}</span>
            </div>
            <div class='od_line'>
                <label>옵션</label>
                <span>{!! $features ? implode(', ',  $features) : '없음' !!}</span>
            </div>
        </div>

        <div class='order_detail_box'>
            <div class='order_detail_title'>
                예약 정보
                @if( $order->status_cd > 100 && $order->status_cd < 105)
                    <button class='btns btns2' data-target="{{ url("/mypage/order/change-reservation", [$order->id]) }}">변경</button>
                @endif
            </div>
            <div class='od_line'>
                <label>입고대리점</label>
                <span>
                    {{ $order->garage->name }}<br>
                    {{ $order->garage->user_extra->phone }}<br>
                    {{ $order->garage->user_extra->address }}
                </span>
            </div>
            <div class='od_line'>
                <label>입고예정일</label>
                <span>{{ $order->reservation->reservation_at->format('Y년 m월 d일 H시 i분') }}</span>
            </div>
            <div class='od_line'>
                <label>예약상태</label>
                <span>{{ $order->status->display() }}</span>
            </div>
            <div class='od_line'>
                <label>예약확정</label>
                <span>{{ $order->reservation->updated_at ? $order->reservation->updated_at->format('Y년 m월 d일 H시 i분') : '-' }}</span>
            </div>
        </div>

        <div class='br30'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' data-target="{{ url("/mypage/order") }}" id="order-list" style='display:inline-block;'>주문목록 돌아가기</button>
        </div>


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
//        $("#order-list").on("click", function () {
//            location.href = $(this).data("target");
//        });

        $(".btns").on("click",function () {
            var url = $(this).data("target");
            if(url){
                location.href = url;
            }
        })
        $("#cancel-click").on("click", function () {
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