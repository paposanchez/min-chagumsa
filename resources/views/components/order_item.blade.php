<div class="card pt-inner">
        <div class="pti-header

        @if($order_item->type_cd == '1')
                bgm-blue
        @elseif($order_item->type_cd == '2')
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
                        Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris iaculis
                        laoreet mattis piuminer lasethol and envy
                </div>
        </div>

        <div class="pti-footer">
                <a href="" class="bgm-cyan"><i class="zmdi zmdi-check"></i></a>
        </div>
</div>
