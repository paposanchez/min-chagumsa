@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h3>
                <span class="text-lg text-light">
                        <span class="text-danger">{{ $order->status->display() }}</span> |
                    {{ $order->getOrderNumber() }}
                </span>


            <a href="/diagnosis/{{ $order->id }}" target="_blank" class="btn btn-default pull-right"><i
                        class="fa fa-search"></i> 진단정보 보기</a>
        </h3>


        <div class="row">

            <div class="col-xs-7">

                <div class="block bg-white">

                    <h4>주문정보
                        <a class='pull-right text-sm text-danger'
                           href="#" id="cancel-click" data-cancel_order_id="{{ $order->id }}">주문취소</a>
                    </h4>



                    {!! Form::open(['method' => 'POST','route' => ['bcs.order.user-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'userForm', 'enctype'=>"multipart/form-data"]) !!}

                    <div class="form-group">
                        <label for="" class="control-label col-md-3">주문자명</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="name"
                                   value="{{ $order->orderer_name }}" disabled>
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                            @endif
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3">주문자연락처</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="mobile"
                                   value="{{ $order->orderer_mobile }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">
                                        {{ $errors->first('mobile') }}
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button class="btn btn-primary">주문정보 변경</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>


                <div class="block bg-white" style="margin-bottom:10px;">

                    <h4>결제정보</h4>
                    <ul class="list-group">
                        <li class="list-group-item no-border"><span>상품명</span> <em
                                    class="pull-right">{{ $order->item->name }}</em></li>
                        <li class="list-group-item no-border"><span>결제금액</span> <em
                                    class="pull-right">{{ number_format($order->purchase->amount) }}원</em></li>
                        <li class="list-group-item no-border"><span>결제방법</span> <em
                                    class="pull-right">{{ $order->purchase->payment_type->display() }}</em></li>
                        <li class="list-group-item no-border"><span>결제일자</span> <em
                                    class="pull-right">{{ $order->purchase->updated_at }}</em></li>
                        <li class="list-group-item no-border"><span>결제번호</span> <em
                                    class="pull-right">{{ $order->purchase->transaction_id or '-' }}</em></li>
                    </ul>

                </div>


                <div class="block bg-white" style="margin-bottom:10px;">

                    <h4>차량정보</h4>
                    {!! Form::open(['method' => 'POST','route' => ['bcs.order.car-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">
                            차량번호
                        </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="car_number" placeholder=""
                                   value="{{ $order->car_number }}">
                            @if ($errors->has('car_number'))
                                <span class="text-danger">
                                        {{ $errors->first('car_number') }}
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">차량 명</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $order->getCarFullName() }}</p>
                        </div>
                    </div>

                    {{-- todo 추후에 Grades 만 변경이 가능할 예정 --}}
                    {{--<div class="form-group">--}}
                    {{--<label for="" class="control-label col-md-3">브랜드명</label>--}}
                    {{--<div class="col-md-9">--}}

                    {{--<select class="form-control" id="brands" name="brands" disabled="">--}}
                    {{--<option>{{ $order->orderCar->brand->name }}</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="" class="control-label col-md-3">모델명</label>--}}
                    {{--<div class="col-md-9">--}}
                    {{--<select class="form-control" id="models" name="models" disabled="">--}}
                    {{--<option>{{ $order->orderCar->models->name }}</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                    {{--<label for="" class="control-label col-md-3">세부모델명</label>--}}
                    {{--<div class="col-md-9">--}}
                    {{--<select class="form-control" id="details" name="details" disabled="">--}}
                    {{--<option>{{ $order->orderCar->detail->name }}</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                    {{--<label for="" class="control-label col-md-3">등급명</label>--}}
                    {{--<div class="col-md-9">--}}
                    {{--<select class="form-control " id="grades" name="grades" disabled="">--}}
                    {{--<option>{{ $order->orderCar->grade->name }}</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <label for="" class="control-label col-md-3">사고유무</label>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" value="1"
                                           name="accident_state_cd" {{ $order->accident_state_cd == 1 ? 'checked="checked"' : '' }}><span></span>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3">침수여부</label>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-slider--b-flat">
                                <label>
                                    <input type="checkbox" value="1"
                                           name="flooding_state_cd" {{ $order->flooding_state_cd == 1 ? 'checked="checked"' : '' }}><span></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button class="btn btn-primary">차량정보 변경</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>


            <div class="col-xs-5">

                <div class="block bg-white" style="margin-bottom:10px;">

                    <h4 class="">BCS

                        {{--<a class='pull-right text-sm text-danger'--}}
                           {{--href="#" data-toggle="modal" data-target="#bcsModal" id="ch_garage">변경</a>--}}

                    </h4>
                    <ul class="list-group">
                        <li class="list-group-item no-border"><span>대리점</span> <em
                                    class="pull-right">{{ $order->garage->name }}</em></li>
                        <li class="list-group-item no-border"><span>대리점 연락처</span> <em
                                    class="pull-right">{{ $order->garage->user_extra->phone }}</em></li>
                        <li class="list-group-item no-border"><span>엔지니어</span> <em
                                    class="pull-right">{{ $order->engineer ? $order->engineer->name : '-' }}</em></li>
                        <li class="list-group-item no-border"><span>엔지니어 연락처</span> <em
                                    class="pull-right">{{ $order->engineer ? $order->engineer->mobile : '-' }}</em></li>
                    </ul>
                </div>

                <div class="block bg-white">

                    <h4 class="">기술사
                        {{--<a class='pull-right text-sm text-danger'--}}
                           {{--href="#" data-toggle="modal" data-target="#techModal" id="ch_garage">변경</a>--}}
                    </h4>
                    <ul class="list-group">
                        <li class="list-group-item no-border"><span>기술사</span> <em
                                    class="pull-right">{{ $order->technician ? $order->technician->name : '-' }}</em>
                        </li>
                        <li class="list-group-item no-border"><span>기술사 연락처</span> <em
                                    class="pull-right">{{ $order->technician ? $order->technician->mobile : '-' }}</em>
                        </li>
                    </ul>
                </div>


                <div class="block bg-white">

                    <h4>타임라인</h4>

                    <ul class="list-group">
                        <li class="list-group-item no-border">
                            <span>결제완료</span> <em class="pull-right">{{ $order->created_at }}</em>
                        </li>
                        <li class="list-group-item no-border">
                            <span>예약확정</span> <em
                                    class="pull-right">{{ $order->reservation->updated_at ? $order->reservation->updated_at : '-' }}</em>
                        </li>

                        <li class="list-group-item no-border">
                            <span>입고예약</span> <em
                                    class="pull-right">{{ $order->reservation->reservation_at ? $order->reservation->reservation_at : '-' }}</em>
                        </li>

                        <li class="list-group-item no-border">
                            <span>입고시작</span> <em class="pull-right">{{ $order->diagnose_at }}</em>
                        </li>
                        <li class="list-group-item no-border">
                            <span>진단완료</span> <em class="pull-right">{{ $order->diagnosed_at }}</em>
                        </li>
                        <li class="list-group-item no-border">
                            <span>인증시작</span> <em
                                    class="pull-right">{{ $order->certificates ? $order->certificates->created_at : '-' }}</em>
                        </li>
                        <li class="list-group-item no-border">
                            <span>인증완료</span> <em
                                    class="pull-right">{{ $order->certificates ? $order->certificates->updated_at : '-' }}</em>
                        </li>
                        <li class="list-group-item no-border">
                            <span>인증만료</span> <em
                                    class="pull-right">{{ $order->certificates ? $order->certificates->getExpireDate() : '-' }}</em>
                        </li>
                    </ul>
                </div>

            </div>

        </div>


        <p class="text-center">
            <a href="/order" class="btn btn-default">목록으로 돌아가기</a>
        </p>


        {{-- 주문상태 변경 modal --}}
        <div class="modal fade bs-example-modal-lg in order-modal" id="order-modal" tabindex="-1" role="dialog"
             aria-labelledby="order-modal" aria-hidden="true">
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
                                <label class="control-label col-md-2" for="">주문변경</label>
                                <div class="col-md-6">
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="100" id="o_cancel">주문
                                            취소 <span class="label label-info fa" role="alert">주문취소 가능</span></label>
                                    </div>
                                    <br>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="104" id="o_reserved">입고
                                            대기 <span class="label label-info fa" role="alert">주문취소 가능</span></label>
                                    </div>
                                    <br>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="105"
                                                                                          id="o_certificating">입고완료
                                            <span class="label label-info fa" role="alert">주문취소 가능</span></label></div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="106"
                                                                                          id="o_certificating">차량 진단중
                                            <span class="label label-danger fa" role="alert">주문취소 불가</span></label>
                                    </div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="107"
                                                                                          id="o_certificating">진단완료
                                            <span class="label label-danger fa" role="alert">주문취소 불가</span></label>
                                    </div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="108"
                                                                                          id="o_certificating">검토중(발급
                                            대기) <span class="label label-danger fa" role="alert">주문취소 불가</span></label>
                                    </div>
                                    <div class="radio"><label class="radio-inline"><input type="radio" name="status_cd"
                                                                                          value="109"
                                                                                          id="o_certificating">인증서발급완료
                                            <span class="label label-danger fa" role="alert">주문취소 불가</span></label>
                                    </div>
                                </div>
                                <label class="control-label col-md-2" for="">현재 주문상태</label>
                                <div class="col-md-2"><h1>{{ Helper::getCodeName($order->status_cd) }}</h1></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success order-submit" id="order-modal-submit">주문상태 변경
                        </button>
                        <button type="button" class="btn btn-primary order-close" data-dismiss="modal"
                                id="order-modal-close">취소
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 결제정보 모달 --}}
        <div class="modal fade bs-example-modal-lg in purchase-modal" id="purchase-modal" tabindex="-1" role="dialog"
             aria-labelledby="purchase-modal" aria-hidden="true">
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
                            <tr style="background-color: #f1f1f1;">
                                <th colspan="4" class="text-center">환불정보</th>
                            </tr>
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
                        <button type="button" class="btn btn-primary order-close" data-dismiss="modal"
                                id="purchase-modal-close">닫기
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- PG정보 --}}
        <div class="modal fade bs-example-modal-lg in purchase-modal" id="payment-modal" tabindex="-1" role="dialog"
             aria-labelledby="purchase-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="paymentModalLabel">PG사 결제 정보</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer text-center">
                        <button class="btn btn-primary" type="button" id="payment-close">닫기</button>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- container -->







        {!! Form::open(['route' => ["bcs.order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
        <input type="hidden" name="order_id" id="cancel-order_id">
        {!! Form::close() !!}

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

            $("#cancel-click").on("click", function () {
                if (confirm("해당 주문에 대한 결제를 취소하시겠습니까?")) {
                    var order_id = $(this).data("cancel_order_id");
                    if (order_id) {
                        $("#cancel-order_id").val(order_id);
                        $("#cancel-form").submit();
                    } else {
                        alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                    }

                }
            });


        });
    </script>
@endpush