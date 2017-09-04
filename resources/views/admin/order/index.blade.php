@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="panel-title">검색조건</span>

            {{--<div class="panel-heading-controls">--}}

                {{--<div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">--}}
                    {{--<label>--}}
                        {{--<input type="checkbox" >--}}
                        {{--<span></span>--}}
                    {{--</label>--}}
                {{--</div>--}}

            {{--</div>--}}
        </div>

        <div class="panel-body">

            <form  method="GET" class="form-horizontal no-margin-bottom" role="form">

                <div class="form-group">
                    <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/order.status') }}</label>
                    <div class="col-sm-6">
                        <button class="btn btn-default" name="status_cd" value="">전체</button>
                        <button class="btn btn-default" name="status_cd" value="100">주문취소</button>
                        <button class="btn btn-default" name="status_cd" value="101">주문신청</button>
                        <button class="btn btn-default" name="status_cd" value="102">주문완</button>
                        <button class="btn btn-default" name="status_cd" value="104">입고대기</button>
                        <button class="btn btn-default" name="status_cd" value="106">진단중</button>
                        <button class="btn btn-default" name="status_cd" value="107">진단완료</button>
                        <button class="btn btn-default" name="status_cd" value="108">검토중</button>
                        <button class="btn btn-default" name="status_cd" value="109">인증발급완료</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_start') }}" name='trs' value=''>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                            <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_end') }}" name='tre' value=''>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                    <div class="col-sm-3">
                        {!! Form::select('sf', $search_fields, [], ['class'=>'form-control']) !!}

                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}" name='s' value=''>
                    </div>
                </div>

                <div class="form-group no-margin-bottom">
                    <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                    <div class="col-sm-4 col-sm-offset-3">
                        <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row margin-bottom">

        <div class="col-md-12">

            <p class="form-control-static">

            </p>

            <table class="table text-middle text-center">
                <colgroup>
                    {{--<col width="10%">--}}
                    <col width="10%">
                    <col width="10%">
                    {{--<col width="10%">--}}
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="25%">
                </colgroup>

                <thead>
                    <tr class="active">
                        {{--<th class="text-center">#</th>--}}
                        <th class="text-center">주문번호</th>
                        <th class="text-center">주문자</th>
                        <th class="text-center">연락처</th>
                        {{--<th class="text-center">정비사</th>--}}
                        {{--<th class="text-center">기술사</th>--}}
                        <th class="text-center">상태</th>
                        <th class="text-center">입고일</th>
                        <th class="text-center">주문일</th>
                        <th class="text-center">수정</th>
                    </tr>
                </thead>

                <tbody>

                    @unless(count($entrys) >0)
                    <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                    @endunless

                    @foreach($entrys as $data)

                    <tr>
                        {{--<td class="">--}}
                            {{--<input type="checkbox">--}}
                        {{--</td>--}}
                        <td class="text-center">
                            <a href="{{ route('order.show', $data->id) }}">{{ $data->getOrderNumber() }}</a>
                        </td>
                        <td class="">
                            {{ $data->orderer_name }}
                        </td>
                        <td class="">
                            {{ $data->orderer_mobile }}
                        </td>

                        {{--<td class="">--}}
                            {{--@if($data->engineer)--}}
                                {{--{{ $data->engineer ? $data->engineer->name : '-' }}--}}
                            {{--@endif--}}
                        {{--</td>--}}

                        {{--<td class="">--}}
                            {{--@if($data->technicion)--}}
                                {{--{{ $data->technicion ? $data->technicion->name : '-' }}--}}
                            {{--@endif--}}
                        {{--</td>--}}

                        <td>
                            {{ $data->status->display() }}
                        </td>
                        <td >
                            {{ $data->reservation ? $data->reservation->reservation_at->format('Y-m-d H시 i분') : ''}}
                        </td>
                        <td>
                            {{ $data->created_at->format('Y-m-d H시 i분') }}
                        </td>

                        <td>

                            {{--@if($data->status_cd == 102)--}}
                            @if($data->status_cd >= 101 && $data->status_cd <= 104 )
                                @if($data->reservation)
                                <button type="button" title="예약변경" data-idx="{{ $data->reservation->id  }}" data-date="{{  $data->reservation->reservation_at->format('Y-m-d') }}" data-time="{{  $data->reservation->reservation_at->format('H') }}" data-order_id="{{ $data->id }}" class="btn btn-info changeReservationModalOpen">예약변경</button>
                                <button type="button" title="예약확정" data-idx="{{ $data->reservation->id  }}" data-order_id="{{ $data->id }}" class="btn btn-danger confirmReservation">예약확정</button>
                                @endif
                            @endif
                            <a href="{{ url("order", [$data->id]) }}" class="btn btn-default">상세보기</a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">

        <div class="col-sm-6">

            {{--<a href="{{ route('order.edit', $data->id) }}" class="btn btn-primary">등록</a>--}}

        </div>

        <div class="col-sm-6 text-right">
            {!! $entrys->render() !!}
        </div>

    </div>

</div>

<!-- Modal -->
<div id="changeReservationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">예약변경</h4>
            </div>

            <form class="form-horizontal">
                <div class="modal-body">



                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="datepickerReservation" class="control-label">날짜</label>
                        </div>

                        <div class="col-md-10">
                            <input type="text" class="form-control datepicker" placeholder="날짜" id="datepickerReservation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="" class="control-label">시간</label>
                        </div>

                        <div class="col-md-10">
                            <select class="form-control" id="datepickerReservationTime">
                                <option value="09">9시</option><option value="10">10시</option><option value="11">11시</option><option value="12">12시</option><option value="13">13시</option><option value="14">14시</option><option value="15">15시</option><option value="16">16시</option><option value="17">17시</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="order_id" value="">




                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-loading-text="처리중..." type="button" id="reservation_change">예약변경</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                </div>


            </form>
        </div>

    </div>
</div>
@endsection



@push( 'footer-script' )
<script type="text/javascript">
    $(function () {



        $(document).on('click', '.changeReservationModalOpen', function (e) {
            e.preventDefault();

            var d = $(this).data("date");
            var t = $(this).data("time");
            var order_id = $(this).data('order_id');
            $("#datepickerReservation").val(d);
            $("#datepickerReservationTime").val(t);
            $("#order_id").val(order_id);
            $("#changeReservationModal").modal();

        });

        $(document).on('click', '.confirmReservation', function (e) {
            var $obj = $(this);
            var id = $(this).data("idx");
            var order_id = $(this).data("order_id");

            // var t = $(this).data("time");
            //
            // $("#datepickerReservationTime").val(t);

            if(confirm("해당 주문의 예약일자를 확정하시겠습니까?")){
                $.ajax({
                    url:'/order/confirmation/'+id,
                    type:'post',
                    data:{
                        id : id,
                        order_id : order_id
                    },
                    success:function(data){
//                        alert('success');
                        $obj.parent().find('.changeReservationModalOpen').remove();
                        $obj.parent().find('.confirmReservation').remove();
                        location.href = '/order';
                    },
                    error:function(data){
//                        alert('error');
                    }
                })
            }else{
                return false;
            }
        });

        $('#reservation_change').click(function(){
            var date = $("#datepickerReservation").val();
            var time = $("#datepickerReservationTime").val();
            var order_id = $("#order_id").val();


            $.ajax({
                type : 'post',
                url : '/order/reservation_change',
                data : {
                    'order_id' : order_id,
                    'date' : date,
                    'time' : time
                },
                success : function (data){
//                    alert('success');
                    location.href = '/order';
                },
                error : function(data){
                    alert(JSON.stringify(data));
                }
            })
        });
    })
</script>
@endpush
