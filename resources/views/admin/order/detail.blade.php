@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12" >

            {!! Form::open(['method' => 'POST','route' => ['order.store', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}

            <input type="hidden" name="order_status" id="order_status">
            <input type="hidden" name="id" value="{{ $order->id }}">

            <div class="form-group " >
                {{--<label for="inputSubject" class="control-label col-md-3">{{ trans('admin/post.subject') }}</label>--}}
                <div class="col-md-12">

                    <div class="input-group">
                        <span class="input-group-addon">주문번호</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->datekey }}-{{ $order->car_number }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문상태</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->status->display() }}" style="background-color: #fff;" disabled>
                        {{-- todo Admin에서만 나오도록 분기문 삽입해야 함. --}}
                        <span class="input-group-btn"><button class="btn btn-primary" type="button" id="order-modify">주문상태 변경</button></span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문자</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->orderer_name }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">차량번호</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->car_number }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">모델명</span>
                        <input type="text" class="form-control" placeholder="" value="{{ \App\Helpers\Helper::getCarModel($order->car) }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">색상</span>
                        <input type="text" class="form-control" placeholder="" value="외장: {{ $order->car->getExteriorColor ? $order->car->getExteriorColor->display() : '' }} / 내장: {{ $order->car->getInteriorColor ? $order->car->getInteriorColor->display() : '' }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">옵션</span>
                        <input type="text" class="form-control" placeholder="" value="연로타입: {{ $order->car->getFuelType ?  $order->car->getFuelType->display() : '미입력' }} / 엔진타입: {{ $order->car->getEngine ? $order->car->getEngine->display() : '미입력' }} / 변속기타입: {{ $order->car->getTransmission ? $order->car->getTransmission->display() : '미입력' }} / 용도 {{ $order->car->getType ? $order->car->getType->display() : '미입력' }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">주문일 / 입고일</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->created_at }} / {{ $order->purchase->reservation_at }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">진단일 / 인증서 발급일</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->diagnose_at }} / {{ $order->certificates->updated_at }}" style="background-color: #fff;" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">정비사 / 기술사</span>
                        <input type="text" class="form-control" placeholder="" value="{{ $order->engineer->name }} / {{ $order->technicion->name }}" style="background-color: #fff;" disabled>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
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

    {{-- 주문상태 변경 modal --}}
    <div class="modal fade bs-example-modal-lg in order-modal" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="zip-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">주문상태 변경</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">현재 주문상태보다 이전 상태로만 변경 가능합니다.</p>
                    <p class="">상태변경으로 인해 초기화된 내역은 복구되지 않습니다.</p>
                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="100" id="o_cancel">주문 취소 <span class="label label-default fa-2x" role="alert">주문을 취소하고 주문자 계좌 또는 카드 환불을 진행합니다.</span></label></div><br>
                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="104" id="o_reserved">입고 대기 <span class="label label-default fa-2x" role="alert">진단 및 검토 내역을 초기화하고 입고 대기 상태로 변경합니다.</span></label></div><br>
                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="108" id="o_certificating">검토중(발급 대기) <span class="label label-default fa-2x" role="alert">검토 내역을 초기화하고 발급대기 상태로 변경합니다.</span></label></div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-success order-submit" id="order-modal-submit">주문상태 변경</button>
                    <button type="button" class="btn btn-primary order-close" data-dismiss="modal" id="order-modal-close">취소</button>
                </div>
            </div>
        </div>
    </div>
    {{----}}

</div><!-- container -->
@endsection

@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $("#order-modify").on("click", function () {
            $("#order-modal").modal();
        });
        //주문상태 form 초기화
        $("#order-modal").on("hide.bs.modal", function () {
            $("#order_status").val('');
        });

        $("#order-modal-submit").on("click", function (e) {
            if(confirm("주문정보를 변경하시겠습니까?")){
                $("#order_status").val($("input[name='status_cd']:checked").val());
                $("#frmPost").submit();
            }
        });


    });
</script>
@endpush





