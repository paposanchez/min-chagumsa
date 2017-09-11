@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.order')])
@endsection

@section( 'content' )
<div class="container-fluid">
    <h1 class="page-header">주문 정보</h1>
    <div class="row">

        <div class="col-md-12">

            {!! Form::open(['method' => 'POST','route' => ['technician.order.store'], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}

            <input type="hidden" name="order_status" id="order_status">
            <input type="hidden" name="id" value="{{ $order->id }}">

            <div class="form-group">
                <!-- 유형선택 -->
                <label for="inputName" class="control-label col-md-2 text-left">주문번호</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder=""
                               value="{{ $order->getOrderNumber() }}" style="background-color: #fff;" disabled>
                    </div>

                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">주문상태</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder=""
                               value="{{ $order->status->display() }}" style="background-color: #fff;" disabled>
                        {{-- todo Admin에서만 나오도록 분기문 삽입해야 함. --}}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    주문자
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $order->orderer_name }}"
                           style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    차량번호
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="" value="{{ $order->car_number }}"
                           style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    모델명
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="{{ $car ? \App\Helpers\Helper::getCarModel($car) : '' }}"
                           style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    색상
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="외장: {{ $car->getExteriorColor ? $car->getExteriorColor->display() : '' }} / 내장: {{ $car->getInteriorColor ? $car->getInteriorColor->display() : '' }}"
                           style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    옵션
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="연로타입: {{ $car->getFuelType ?  $car->getFuelType->display() : '미입력' }} / 엔진타입: {{ $car->getEngine ? $car->getEngine->display() : '미입력' }} / 변속기타입: {{ $car->getTransmission ? $car->getTransmission->display() : '미입력' }} / 용도 {{ $car->getType ? $car->getType->display() : '미입력' }}"
                           style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    주문일 / 입고일
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="{{ $order->created_at }} / {{ $order->diagnose_at ? $order->diagnose_at : '입고대기' }}"
                           style="background-color: #fff;" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="control-label col-md-2 text-left">
                    진단일 / 인증서 발급일
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="{{ $order->diagnosed_at ? $order->diagnosed_at : '입고대기' }} / {{ $order->certificates ? $order->certificates->updated_at : '인증대기' }}"
                           style="background-color: #fff;" disabled>
                </div>
                <label for="inputName" class="control-label-2 col-md-2 text-left">
                    정비사 / 기술사
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder=""
                           value="{{ $order->engineer? $order->engineer->name : '미배정' }} / {{ $order->technicion? $order->technicion->name : '미배정'}}"
                           style="background-color: #fff;" disabled>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" id="diagnosis-info"><div class="col-md-12 text-center alert alert-info"><h1><span class="fa fa-arrow-circle-down"></span> 인증서 상세 내역</h1></div></div>

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




