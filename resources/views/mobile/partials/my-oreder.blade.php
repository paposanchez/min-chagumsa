{{-- mypage pagenavigation 부문 파일 --}}
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