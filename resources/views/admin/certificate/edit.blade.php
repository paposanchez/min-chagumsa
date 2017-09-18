@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.certificate')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                        {{ $order->getOrderNumber() }}
                </span>

                <a href="/order/{{ $order->id }}" target="_blank" class="btn btn-default pull-right"><i class="fa fa-shopping-cart"></i> 주문보기</a>
        </h3>



                <div class="row">

                        <div class="col-xs-6">


                                <div class="block bg-white" style="margin-bottom:10px;">

                                        <h4>주문정보</h4>
                                        <ul class="list-group">

                                                <li class="list-group-item no-border"><span>주문자명</span> <em class="pull-right">{{ $order->orderer_name }}</em></li>
                                                <li class="list-group-item no-border"><span>주문자연락처</span> <em class="pull-right">{{ $order->orderer_mobile }}</em></li>
                                                <li class="list-group-item no-border"><span>상품명</span> <em class="pull-right">{{ $order->item->name }}</em></li>

                                        </ul>

                                </div>

                        </div>

                        <div class="col-xs-6">

                                <div class="block bg-white" style="margin-bottom:10px;">

                                        <h4>차량정보</h4>
                                        <ul class="list-group">

                                                <li class="list-group-item no-border"><span>차량명</span> <em class="pull-right">{{ $order->getCarFullName()  }}</em></li>
                                                <li class="list-group-item no-border"><span>사고유무</span> <em class="pull-right">{{ $order->accident_state_cd == 1 ? '예' : '아니요' }}</em></li>
                                                <li class="list-group-item no-border"><span>침수여부</span> <em class="pull-right">{{ $order->flooding_state_cd == 1 ? '예' : '아니요' }}</em></li>

                                        </ul>
                                </div>
                        </div>

                </div>

                @include("partials.certificate", ["order" => $order])





















</div><!-- container -->
@endsection

@push( 'footer-script' )
<script type="text/javascript">
/**
* 최종 tab panel 클릭 history 처리
*/

$("ul.nav-pills > li >a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
});

var hash = window.location.hash;
$("#certi_tab a[href='" + hash + "']").tab('show');
</script>
@endpush
