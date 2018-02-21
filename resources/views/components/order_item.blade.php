<div class="card">
    <div class="card-header ch-alt">
        <h2>
            {{ $order_item->id }}
            <small>{{ $order_item->item->type->display() }}</small>
        <!-- <small>{{ $order_item->order->chakey }}</small> -->
        </h2>

        <ul class="actions">

            <li>
                @component('components.badge', [
                'code' => $order_item->document->status_cd,
                'color' =>[
                '120' => 'default',
                '102' => 'success',
                '112' => 'success',
                '113' => 'warning',
                '114' => 'info',
                '115' => 'primary',
                '116' => 'danger'
                ]])
                    {{ $order_item->document->status ? $order_item->document->status->display() : '미생성' }}
                @endcomponent
            </li>

            <!-- <li>
                    <a href="">
                            <i class="zmdi zmdi-download"></i>
                    </a>
            </li> -->
            <!-- <li class="dropdown">
                    <a href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                    <a href="">Change Date Range</a>
                            </li>
                            <li>
                                    <a href="">Change Graph Type</a>
                            </li>
                            <li>
                                    <a href="">Other Settings</a>
                            </li>
                    </ul>
            </li> -->
        </ul>

        @if($order_item->document->status)
            @if($order_item->type_cd == '121')
                <a class="btn bgm-blue btn-float waves-effect" href="{{ url('diagnosis', [$order_item->document->id]) }}">
                    <i class="zmdi zmdi-mail-send"></i>
                </a>
            @elseif($order_item->type_cd == '122')
                <a class="btn bgm-blue btn-float waves-effect" href="/certificate/{{ $order_item->document->id }}/edit">
                    <i class="zmdi zmdi-mail-send"></i>
                </a>
            @else
                <a href="{{ url('warranty', [$order_item->warranty->id]) }}" class="bgm-cyan"><i class="zmdi zmdi-check"></i></a>
                <a class="btn bgm-blue btn-float waves-effect" href="{{ url('warranty', [$order_item->document->id]) }}">
                    <i class="zmdi zmdi-mail-send"></i>
                </a>
            @endif







        <a class="btn bgm-blue btn-float waves-effect" href="/">
            <i class="zmdi zmdi-mail-send"></i>
        </a>
        @endif
    </div>

    <div class="card-body card-padding">
        <ul class="clist clist-angle">
            <li><span>상품명</span> <a href="" target="_blank">{{ $order_item->item->name }}</a></li>
            <li><span>생성일</span> {{ $order_item->created_at->format('Y-m-d') }}</li>
            <li><span>수정일</span> {{ $order_item->updated_at->format('Y-m-d') }}</li>
        </ul>

    </div>
</div>
