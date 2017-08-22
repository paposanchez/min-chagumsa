@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.order')])
@endsection

@section( 'content' )
<div class="container-fluid">
    <div class="row">
        @include("admin.order.certificate", ["order" => $order])
    </div>



    <br>
    <div class="row">

        <div class="col-md-12 text-center">

            <a href="{{ route('order.index') }}" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>

        </div>


    </div>


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




