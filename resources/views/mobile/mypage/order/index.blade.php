@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>주문목록</div>

    <div id='sub_wrap'>

        <div class='br20'></div>

        @foreach($my_orders as $orders)
            <div class='order_info_box'>
                <div class='order_info_title'>
                    <div class='od_line'>
                        <label>주문일</label>
                        <span>{{ $orders->created_at->format('Y년 m월 d일 H:i') }}</span>
                            <a href='{{ url('mypage/order', ['id'=>$orders->id]) }}'>〉</a>
                    </div>
                </div>
                <div class='order_info_cont'>
                    {{ $orders->orderer_name }}<br>
                    {{ $orders->mobile }}<br>
                    {{ $orders->getCarFullName() }}
                    <div class='order_info_btn'>
                        {{ $orders->status->display() }}
                        @if($orders->status_cd < 105 && $orders->status_cd > 100)
                        <button class='btns btns_navy cancel-click' data-cancel_order_id="{{ $orders->id }}">취소신청</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class='br30'></div>

        @endforeach
        <div id="append-rows"></div>

        <div class="br20"></div>
        <div id='sub_wrap'>

            <div class='ipt_line'>
                <button id="next" type="button" class='btns btns_navy' style='display:inline-block;' data-page="2">
                    더보기
                </button>
            </div>

        </div>

        @unless(count($my_orders))
        <div class='order_info_box'>
            <h3>주문데이터가 없습니다.</h3>
        </div>
        @endunless

        <div class='br20'></div>

        <div class='order_detail_title'>
            주문상태가 궁금하세요?
            <button class='btns btns2' id="faq" data-url="{{ url("/community/faq?category_id=18") }}">FAQ 보기</button>
        </div>

    </div>

    {!! Form::open(['route' => ["mobile.mypage.order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
    <input type="hidden" name="order_id" id="cancel-order_id">
    {!! Form::close() !!}

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $("#faq").on("click", function () {
            location.href = $(this).data("url")
        });

        $("div").delegate(".order_info_btn", "click", function(event){
            event.stopPropagation();
            event.preventDefault();

            if (confirm("해당 주문에 대한 결제를 취소하시겠습니까?")) {
                var order_id = $(this).data("cancel_order_id");
                if (order_id) {
                    $("#cancel-order_id").val(order_id);
                    $("#cancel-form").submit();
                } else {
                    alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                }

            }

            event.cancelBubble = true;
        });

        $("#next").on("click", function () {
            $.ajax({
                url: "/mypage/order/next",
                type: "post",
                data: {"page": $("#next").data("page")},
                dataType: "json",
            }).done(function (data) {


                if(data.status == 'ok' && data.my_orders != null){
                    var next_page = parseInt($("#next").data("page")) + 1;

                    $("#next").data('page', next_page);
                    //render html
                    $("#append-rows").append(data.my_orders);
                }else{
                    alert(data.msg);
                }
            }).fail(function () {
                alert(data.msg);
            });
        });
    });
</script>

@endpush