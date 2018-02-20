<div class="card">
        <div class="card-header ch-alt">
                <h2>
                        {{ $order_item->id }}
                        <small>{{ $order_item->item->type->display() }}</small>
                        <!-- <small>{{ $order_item->order->chakey }}</small> -->
                </h2>

                <ul class="actions">
                        <li>
                                <a href="">
                                        <i class="zmdi zmdi-delete"></i>
                                </a>
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

                <!-- <span class="btn bgm-red btn-float waves-effect">{{ $order_item->item->typeString() }}</span> -->
        </div>

        <div class="card-body card-padding">
                <ul class="clist clist-angle">
                        <li><span>상품명</span> <a href="" target="_blank">{{ $order_item->item->name }}</a></li>
                        <li><span>생성일</span> {{ $order_item->created_at->format('Y-m-d') }}</li>
                        <li><span>수정일</span> {{ $order_item->updated_at->format('Y-m-d') }}</li>
                </ul>

        </div>
</div>
