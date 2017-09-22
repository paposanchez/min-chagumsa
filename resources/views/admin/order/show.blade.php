@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <h3>
                <span class="text-lg">
                        <span class="text-danger text-lighter">{{ $order->status->display() }}</span>
                        <span class="text-lighter">| </span>
                        {{ $order->getOrderNumber() }}
                </span>


                @if($order->status_cd > 107)
                <a href="{{ url('certificate', $order->id) }}" target="_blank" class="btn btn-primary pull-right" style="margin-left:10px;" data-toggle="tooltip" title="인증서 미리보기"><i class="fa fa-eye"></i></a>
                @endif

                @if($order->status_cd == 107)
                <button data-id="{{ $order->id }}" class="btn btn-danger pull-right certificate-assign" style="margin-left:10px;" data-toggle="tooltip" title="인증서 발급시작">인증시작</button>
                @endif


                @if($order->status_cd == 108)
                <a href="/certificate/{{ $order->id }}/edit" class="btn btn-warning  pull-right" style="margin-left:10px;" data-toggle="tooltip" title="인증서 발급정보 수정">인증정보 수정</a>
                @endif

                @if($order->status_cd > 106)
                <a href="{{ url("diagnosis", [$order->id]) }}" class="btn btn-danger pull-right" style="margin-left:10px;" data-toggle="tooltip" title="인증서 진단정보 보기">진단정보 보기</a>
                @endif

        </h3>


        <div class="row">

                <div class="col-xs-6">

                        <div class="block bg-white">

                                <h4>주문정보

                                        @if($order->status_cd < 106)
                                        <a class='pull-right text-sm text-danger'
                                        href="#" id="cancel-click" data-cancel_order_id="{{ $order->id }}">주문취소</a>
                                        @endif

                                </h4>



                                {!! Form::open(['method' => 'POST','route' => ['order.user-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'userForm', 'enctype'=>"multipart/form-data"]) !!}


                                @if($order->status_cd < 106)
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">주문자명</label>
                                        <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="" name="name"
                                                value="{{ $order->orderer_name }}">
                                                @if ($errors->has('name'))
                                                <span class="text-danger" >
                                                        {{ $errors->first('name') }}
                                                </span>
                                                @endif
                                        </div>


                                </div>

                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">주문자연락처</label>
                                        <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="" name="mobile"
                                                value="{{ $order->orderer_mobile }}">
                                                @if ($errors->has('mobile'))
                                                <span class="text-danger" >
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

                                @else

                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">주문자명</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->orderer_name }}</p>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">주문자연락처</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->orderer_mobile }}</p>
                                        </div>
                                </div>
                                @endif


                                {!! Form::close() !!}



                        </div>


                        <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>결제정보</h4>
                                <ul class="list-group">
                                        <li class="list-group-item no-border"><span>상품명</span> <em class="pull-right">{{ $order->item->name }}</em></li>
                                        <li class="list-group-item no-border"><span>결제금액</span> <em class="pull-right">{{ number_format($order->purchase->amount) }}원</em></li>
                                        <li class="list-group-item no-border"><span>결제방법</span> <em class="pull-right">{{ $order->purchase->payment_type->display() }}</em></li>
                                        <li class="list-group-item no-border"><span>결제일자</span> <em class="pull-right">{{ $order->purchase->updated_at }}</em></li>
                                        <li class="list-group-item no-border"><span>결제번호</span> <em class="pull-right">{{ $order->purchase->transaction_id or '-' }}</em></li>
                                </ul>

                        </div>


                        <div class="block bg-white" style="margin-bottom:10px;">

                                <h4>차량정보</h4>
                                {!! Form::open(['method' => 'POST','route' => ['order.car-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}

                                @if($order->status_cd < 106)

                                <div class="form-group {{ $errors->has('car_number') ? 'has-error' : '' }}">
                                        <label for="" class="control-label col-md-3">
                                                차량번호
                                        </label>
                                        <div class="col-md-9">
                                                <input type="text" class="form-control" name="car_number" placeholder="" value="{{ $order->car_number }}">
                                                @if ($errors->has('car_number'))
                                                <span class="text-danger" >
                                                        {{ $errors->first('car_number') }}
                                                </span>
                                                @endif
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="control-label col-md-3">차량명</label>
                                        <div class="col-sm-9">
                                                <p class="form-control-static">{{ $order->getCarFullName() }}</p>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">사고유무</label>
                                        <div class="col-md-6">
                                                <div class="checkbox checkbox-slider--b-flat">
                                                        <label>
                                                                <input type="checkbox" value="1" name="accident_state_cd" {{ $order->accident_state_cd == 1 ? 'checked="checked"' : '' }}><span></span>
                                                        </label>
                                                </div>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">침수여부</label>
                                        <div class="col-md-6">
                                                <div class="checkbox checkbox-slider--b-flat">
                                                        <label>
                                                                <input type="checkbox" value="1" name="flooding_state_cd" {{ $order->flooding_state_cd == 1 ? 'checked="checked"' : '' }}><span></span>
                                                        </label>
                                                </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                                <button class="btn btn-primary">차량정보 변경</button>
                                        </div>
                                </div>

                                @else

                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">차량번호</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->car_number }}</p>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">차량명</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->getCarFullName() }}</p>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">사고유무</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->accident_state_cd == 1 ? '예' : '아니요' }}</p>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label for="" class="control-label col-md-3">침수여부</label>
                                        <div class="col-md-9">
                                                <p class="form-control-static">{{ $order->flooding_state_cd == 1 ? '예' : '아니요' }}</p>
                                        </div>
                                </div>
                                @endif

                                
                                {!! Form::close() !!}

                        </div>

                </div>


                <div class="col-xs-6">

                        <div class="block bg-white" style="margin-bottom:10px;">

                                <h4 class="">BCS

                                        @if($order->status_cd < 108)
                                        <a class='pull-right text-sm text-danger' href="#" data-toggle="modal" data-target="#bcsModal" id="ch_garage">변경</a>
                                        @endif

                                </h4>
                                <ul class="list-group">
                                        <li class="list-group-item no-border"><span>대리점</span> <em class="pull-right">{{ $order->garage->name }}</em></li>
                                        <li class="list-group-item no-border"><span>대리점 연락처</span> <em class="pull-right">{{ $order->garage->user_extra->phone }}</em></li>
                                        <li class="list-group-item no-border"><span>엔지니어</span> <em class="pull-right">{{ $order->engineer ? $order->engineer->name : '-' }}</em></li>
                                        <li class="list-group-item no-border"><span>엔지니어 연락처</span> <em class="pull-right">{{ $order->engineer ? $order->engineer->mobile : '-' }}</em></li>
                                </ul>
                        </div>

                        <div class="block bg-white">

                                <h4 class="">기술사

                                        @if($order->status_cd == 108)
                                        <a class='pull-right text-sm text-danger' href="#" data-toggle="modal" data-target="#techModal" id="ch_garage">변경</a>
                                        @endif
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



        {{-- 결제정보 모달 --}}
        <div class="modal fade purchase-modal" id="purchase-modal" tabindex="-1" role="dialog"
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


                        <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="">변경</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>

                </div>
        </div>
</div>

{{-- PG정보 --}}
<div class="modal fade bs-example-modal-lg in purchase-modal" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="purchase-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title" id="paymentModalLabel">PG사 결제 정보</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="">변경</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                </div>
        </div>
</div>

</div><!-- container -->




<!-- Bcs Modal -->
@if($order->status_cd < 108)
<div id="bcsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">BCS 정보 변경</h4>
                        </div>

                        {!! Form::open(['method' => 'POST','route' => ['order.bcs-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'bcsForm', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="modal-body">


                                <div class="modal-body">


                                        <div class="form-group  form-group-lg" style="margin:0px;">
                                                <label  class="control-label">시/도</label>
                                                <select class="form-control" id="areas" autocomplete="off">
                                                        <option>선택해주세요.</option>
                                                        @foreach($garages as $key => $garage)
                                                        <option value="{{ $garage->area }}">{{ $garage->area }}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group  form-group-lg" style="margin:0px;">
                                                <label  class="control-label">구/군</label>
                                                <select class="form-control" id="sections" autocomplete="off">
                                                        <option value="0">선택해주세요.</option>
                                                </select>
                                        </div>
                                        <div class="form-group  form-group-lg {{ $errors->has('garages') ? 'has-error' : '' }}" style="margin:0px;">
                                                <label  class="control-label">대리점</label>
                                                <select class="form-control" id="garages" name="garages" autocomplete="off">
                                                        <option value="0">선택해주세요.</option>
                                                </select>
                                                @if ($errors->has('garages'))
                                                <span class="text-danger">
                                                        {{ $errors->first('garages') }}
                                                </span>
                                                @endif
                                        </div>
                                        <div class="form-group  form-group-lg {{ $errors->has('engineer') ? 'has-error' : '' }}" style="margin:0px;">
                                                <label  class="control-label">엔지니어</label>

                                                <select class="form-control" id="engineer" name="engineer"
                                                {{ $order->engineer ? $order->engineer->id : '' }}

                                                @if($order->engineer)
                                                data-id="{{ $order->engineer->id }}"
                                                @endif

                                                autocomplete="off">
                                                @foreach($engineers as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                        </select>

                                        @if ($errors->has('engineer'))
                                        <span class="text-danger">
                                                {{ $errors->first('engineer') }}
                                        </span>
                                        @endif
                                </div>

                        </div>

                </div>

                <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="">변경</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                </div>
                {!! Form::close() !!}

        </div>

</div>
</div>
@endif

@if($order->status_cd == 108)
<!-- Tech Modal -->
<div id="techModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">기술사 정보변경</h4>
                        </div>


                        {!! Form::open(['method' => 'POST','route' => ['order.tech-update', 'id' => $order->id], 'class'=>'form-horizontal', 'id'=>'techForm', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="modal-body">
                                <div class="form-group  form-group-lg  {{ $errors->has('technician') ? 'has-error' : '' }}" style="margin:0px;">
                                        <label  class="control-label">변경할 기술사를 선택하세요</label>
                                        {!! Form::select('technician', $technicians, [$order->technician ? $order->technician->id : ''], ['class' =>'form-control', 'id' => 'sel_tech']) !!}
                                </div>
                        </div>

                        <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="">변경</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                        {!! Form::close() !!}


                </div>
        </div>
</div>
@endif


{!! Form::open(['route' => ["order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
<input type="hidden" name="order_id" id="cancel-order_id">
{!! Form::close() !!}

@endsection

@push( 'footer-script' )
<script type="text/javascript">
$(function () {

        $('#areas').change(function () {
                var garage_area = $('#areas option:selected').text();

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_section/',
                        data: {
                                'garage_area': garage_area
                        },
                        success: function (data) {

                                //select box 초기화
                                $('#sections').html("");
                                $('#garages').html('<option>대리점을 선택하세요.</option>');

                                //                    $('#sel_area').val(garage_area);
                                $('#sections').append('<option>구/군을 선택하세요.</option>');
                                $.each(data, function (key, value) {
                                        $('#sections').append($('<option/>', {
                                                value: value,
                                                text: value
                                        }));
                                });
                        },
                        error: function (data) {
                                alert('error');
                        }
                })
        });

        $('#sections').change(function () {
                var garage_area = $('#areas option:selected').text();
                var garage_section = $('#sections option:selected').text();

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/order/get_address/',
                        data: {
                                'sel_area': garage_area,
                                'sel_section': garage_section
                        },
                        success: function (data) {
                                $('#garages').html("");

                                $.each(data, function (key, value) {
                                        $('#garages').append($('<option/>', {
                                                value: key,
                                                text: value
                                        }))
                                });
                        },
                        error: function (data) {
                                alert('error');
                        }
                });
        });

        $('#bcs_submit').on('click', function(){
                var garage = $('#garages').val();
                //            var eng = $('#sel_eng').val();

                if(garage != 0){
                        $('#bcsForm').submit();
                }else{
                        alert('정비소를 선택해주세요.');
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
