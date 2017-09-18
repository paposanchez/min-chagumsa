@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">
    <div class="row">
        <div role="tabpanel" id="certi_tab">
            <ul class="nav nav-pills" role="tablist">
                {{--<li class="active"><a href="#diagnosis" aria-controls="diagnosis" role="tab" data-toggle="tab">진단 정보</a></li>--}}
                <li role="presentation" class=""><a href="#certification" aria-controls="certification" role="tab" data-toggle="tab">차량 인증</a></li>
            </ul>

            <div class="tab-content">
                {{--진단 정보--}}
                <div role="tabpanel" class="tab-pane" id="diagnosis">

                    {{--@foreach($return as $key => $val)--}}
                        {{--{{  dd($key, $val) }}--}}
                    {{--@endforeach--}}
                    {{--@foreach($return as $key => $val)--}}
                        {{--{{  dd($return['entrys'][0]['id']) }}--}}
                    {{--@endforeach--}}

                    {{-- 기본정보 --}}
{{--                    @include("admin.order.diagnosis-basic", [$entrys])--}}

                    {{--주요외판--}}
                    {{--@include("admin.order.diagnosis-outer")--}}

                    {{--주요내판--}}
                    {{--@include("admin.order.diagnosis-inner")--}}

                    {{--침수--}}
                    {{--@include("admin.order.diagnosis-water")--}}


                    {{--내외부점검--}}
                    {{--@include("admin.order.diagnosis-check")--}}

                    {{--주행테스트--}}
                    {{--@include("admin.order.diagnosis-drive-test")--}}

                    {{--작동상태: 엔진/변속기/브레이크/조향장치/누유--}}
                    {{--@include("admin.order.diagnosis-status")--}}

                    {{--작동상태: 타이어/엔진오일/냉각수/브레이크패드/배터리--}}
                    {{--@include("admin.order.diagnosis-status-inner")--}}

                </div>

                {{--차량 인증--}}
                <div role="tabpanel" class="tab-pane active" id="certification">
                    @include("partials.certificate", ["order" => $order])
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>



    <br>
    <div class="row">

        <div class="col-md-6">

            <a href="{{ route('order.index') }}" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>

        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-default" style="margin-right: 15px;">진단 결과 보기</a>
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
