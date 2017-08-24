@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h1 class="page-header">주문 정보</h1>
        <div class="row">

            <div class="col-md-12" >

                {!! Form::open(['method' => 'POST','route' => ['order.store'], 'class'=>'form-horizontal', 'id'=>'frmPost', 'enctype'=>"multipart/form-data"]) !!}

                <input type="hidden" name="order_status" id="order_status">
                <input type="hidden" name="id" value="{{ $order->id }}">




                <div class="form-group">
                    <!-- 유형선택 -->
                    <label for="inputName" class="control-label col-md-2 text-left">주문번호</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" value="{{ $order->datekey }}-{{ $order->car_number }}" style="background-color: #fff;" disabled>
                            {{--<span class="input-group-btn"><button class="btn btn-info" type="button" id="order-purchase">결제졍보</button></span>--}}
                        </div>

                    </div>
                    <label for="inputName" class="control-label-2 col-md-2 text-left">주문상태</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" value="{{ $order->status->display() }}" style="background-color: #fff;" disabled>
                            {{-- todo Admin에서만 나오도록 분기문 삽입해야 함. --}}
{{--                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="order-modify"{{ ($order->status_cd == 100)? " disabled": '' }}>주문상태 변경</button></span>--}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="control-label col-md-2 text-left">
                        주문자
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $order->orderer_name }}" style="background-color: #fff;" disabled>
                    </div>
                    <label for="inputName" class="control-label-2 col-md-2 text-left">
                        차량번호
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $order->car_number }}" style="background-color: #fff;" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="control-label col-md-2 text-left">
                        모델명
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $car ? \App\Helpers\Helper::getCarModel($car) : '' }}" style="background-color: #fff;" disabled>
                    </div>
                    <label for="inputName" class="control-label-2 col-md-2 text-left">
                        색상
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="외장: {{ $car->getExteriorColor ? $car->getExteriorColor->display() : '' }} / 내장: {{ $car->getInteriorColor ? $car->getInteriorColor->display() : '' }}" style="background-color: #fff;" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="control-label col-md-2 text-left">
                        옵션
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="연로타입: {{ $car->getFuelType ?  $car->getFuelType->display() : '미입력' }} / 엔진타입: {{ $car->getEngine ? $car->getEngine->display() : '미입력' }} / 변속기타입: {{ $car->getTransmission ? $car->getTransmission->display() : '미입력' }} / 용도 {{ $car->getType ? $car->getType->display() : '미입력' }}" style="background-color: #fff;" disabled>
                    </div>
                    <label for="inputName" class="control-label-2 col-md-2 text-left">
                        주문일 / 입고일
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $order->created_at }} / {{ $order->diagnose_at ? $order->diagnose_at : '입고대기' }}" style="background-color: #fff;" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="control-label col-md-2 text-left">
                        진단일 / 인증서 발급일
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $order->diagnosed_at ? $order->diagnosed_at : '입고대기' }} / {{ $order->certificates ? $order->certificates->updated_at : '인증대기' }}" style="background-color: #fff;" disabled>
                    </div>
                    <label for="inputName" class="control-label-2 col-md-2 text-left">
                        정비사 / 기술사
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="" value="{{ $order->engineer? $order->engineer->name : '미배정' }} / {{ $order->technicion? $order->technicion->name : '미배정'}}" style="background-color: #fff;" disabled>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="inputName" class="control-label col-md-2 text-left">--}}
                        {{--진단 예약일자--}}
                    {{--</label>--}}
                    {{--<div class="col-md-2">--}}
                        {{--<input name='reservation_date' id="reservation_date" type="text " class="form-control datepicker2" data-format="YYYY-MM-DD" placeholder="예약일자를 입력해주세요." value="{{ $order->reservation->reservation_at->format('Y-m-d') }}" style="background-color: #fff;">--}}
                    {{--</div>--}}
                    {{--<div class="col-md-2">--}}
                        {{--<input type="text" class="form-control" placeholder="" value="" style="background-color: #fff;" disabled>--}}
                        {{--<select class="form-control">--}}
                            {{--<option>선택하세요.</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {!! Form::close() !!}
            </div>



        </div>




        <br>
        <div class="row">

            <div class="col-md-6">

                {{--<a href="{{ route('order.index') }}" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>--}}
                <a href="/order" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>

            </div>

            <div class="col-sm-6 text-right">
            </div>

        </div>

        {{-- 주문상태 변경 modal --}}
        <div class="modal fade bs-example-modal-lg in order-modal" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="order-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">주문상태 변경</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <h3><span class="glyphicon glyphicon-warning-sign"></span> 주문의 취소는 입고대기 이전까지만 가능합니다.</h3>
                            <div class="form-group">
                                <label class="control-label col-md-2 text-left" for="inputName">주문변경</label>
                                <div class="col-md-6">
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="100" id="o_cancel">주문 취소 <span class="label label-info fa" role="alert">주문취소 가능</span></label></div><br>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="104" id="o_reserved">입고 대기 <span class="label label-info fa" role="alert">주문취소 가능</span></label></div><br>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="105" id="o_certificating">입고완료 <span class="label label-info fa" role="alert">주문취소 가능</span></label></div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="106" id="o_certificating">차량 진단중 <span class="label label-danger fa" role="alert">주문취소 불가</span></label></div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="107" id="o_certificating">진단완료 <span class="label label-danger fa" role="alert">주문취소 불가</span></label></div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="108" id="o_certificating">검토중(발급 대기) <span class="label label-danger fa" role="alert">주문취소 불가</span></label></div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd" value="109" id="o_certificating">인증서발급완료 <span class="label label-danger fa" role="alert">주문취소 불가</span></label></div>
                                </div>
                                <label class="control-label col-md-2 text-left" for="inputName">현재 주문상태</label>
                                <div class="col-md-2"><h1>{{ Helper::getCodeName($order->status_cd) }}</h1></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success order-submit" id="order-modal-submit">주문상태 변경</button>
                        <button type="button" class="btn btn-primary order-close" data-dismiss="modal" id="order-modal-close">취소</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 결제정보 모달 --}}
        <div class="modal fade bs-example-modal-lg in purchase-modal" id="purchase-modal" tabindex="-1" role="dialog" aria-labelledby="purchase-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">주문 결제 정보</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <colgroup>
                                <col width="15%">
                                <col width="35%">
                                <col width="15%">
                                <col width="35%">
                            </colgroup>
                            <tbody>
                            <tr>
                                <th class="text-center">결제번호</th>
                                <td>{{ $order->id }}</td>
                                <th class="text-center">결제금액</th>
                                <td>{{ number_format($order->purchase->amount) }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">결제방법</th>
                                <td>{{ Helper::getCodeName($order->purchase->type) }}</td>
                                <th class="text-center">상태</th>
                                <td>{{ Helper::getCodeName($order->status_cd) }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">결제일</th>
                                <td>{{ $order->purchase->created_at }}</td>
                                <th class="text-center">환불완료 여부</th>
                                <td>{{ ($order->refund_status == 1)? "환불완료": "환불미처리" }}</td>
                            </tr>
                            <tr style="background-color: #f1f1f1;"><th colspan="4" class="text-center">환불정보</th> </tr>
                            <tr>
                                <th class="text-center">환불자 성명</th>
                                <td colspan="3">{{ $order->purchase->refund_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">환불 은행</th>
                                <td>{{ $order->purchase->refund_bank }}</td>
                                <th class="text-center">환불계좌</th>
                                <td>{{ $order->purchase->refund_account }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-primary order-close" data-dismiss="modal" id="purchase-modal-close">닫기</button>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- container -->


@endsection

@push ( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            $("#order-modify").on("click", function () {
                $("#order-modal").modal();
            });

            $("#order-purchase").on("click", function(){

                $("#purchase-modal").modal();
            });
            //주문상태 form 초기화
            $("#order-modal").on("hide.bs.modal", function () {
                $("#order_status").val('');
            });

            $("#order-modal-submit").on("click", function (e) {
                if(confirm("주문정보를 변경하시겠습니까?")){

                    var current_status = parseInt('{{ $order->status_cd }}');
                    var choice_status = parseInt($("input[name='status_cd']:checked").val());


                    if(current_status <= 105 && choice_status <= 105){
                        if(current_status == 100){
                            alert('주문취소된 주문은 상태를 변경할 수 없습니다.');
                            e.preventDefault();
                            return false;
                        }else{
                            $("#order_status").val(choice_status);
                            $("#frmPost").submit();
                        }

                    }else if(current_status > 105 && choice_status > 105){
                        $("#order_status").val(choice_status);
                        $("#frmPost").submit();
                    }else{
                        alert('현재 주문상태와 수정하려는 수정상태를 확인해 주세요.\n1. 입고대기이전: 주문취소 가능\n2.점검진행 이후: 주문취소 불가');
                        e.preventDefault();
                        return false;

                    }


                }
            });

//            //########## Pikaday
//            $('.datepicker2').each(function (index, element) {
//                var opt = {
//                    field: element,
//                    format: 'YYYY-MM-DD',
////                    minDate: moment().add(1, 'days').toDate(),
//                    i18n: {
//                        previousMonth: '이전달',
//                        nextMonth: '다음달',
//                        months: '1월.2월.3월.4월.5월.6월.7월.8월.9월.10월.11월.12월.'.split('.'),
//                        weekdays: '월요일.화요일.수요일.목요일.금요일.토요일.일요일'.split('.'),
//                        weekdaysShort: '월.화.수.목.금.토.일.'.split('.')
//                    },
//                };
//
//                if ($(this).data('format')) {
//                    opt.format = $(this).data('format');
//                }
//
//                new Pikaday(opt);
//            });

        });
    </script>
@endpush