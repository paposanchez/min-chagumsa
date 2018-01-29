<div class="card pt-inner">
    <div class="pti-header

        @if($order_item->type_cd == '121')
            bgm-blue
@elseif($order_item->type_cd == '122')
            bgm-pink
@else
            bgm-black
@endif

            ">
        <h2>주문상품번호 {{ $order_item->id }}</h2>
        <div class="ptih-title">{{ $order_item->item->name }}</div>
    </div>

    <div class="pti-body">
        <div class="ptib-item">
            주문번호 : {{ $order_item->order->chakey }}
        </div>
        <div class="ptib-item">
            생성일 : {{ $order_item->created_at->format('Y-m-d') }}
        </div>
    </div>

    <div class="pti-footer">
        @if($order_item->type_cd == '121')
            <a href="{{ url('diagnosis', [$order_item->diagnosis->id]) }}" class="bgm-cyan"><i class="zmdi zmdi-check"></i></a>
        @elseif($order_item->type_cd == '122')
            @if($order_item->certificate)
                <a href="{{ url('certifiate', [$order_item->certificate->id]) }}" class="bgm-cyan"><i class="zmdi zmdi-check"></i></a>
            @else
                <a href="#" class="bgm-cyan"><i class="zmdi zmdi-close"></i></a>
            @endif
        @else
            @if($order_item->warranty)
                <a href="{{ url('warranty', [$order_item->warranty->id]) }}" class="bgm-cyan"><i class="zmdi zmdi-check"></i></a>
            @else
                <a href="#" class="bgm-cyan"><i class="zmdi zmdi-close"></i></a>
            @endif
        @endif



    </div>
</div>
