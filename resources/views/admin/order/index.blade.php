@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                    <input type="hidden" name="sort" id="sort_val" value="">
                    <div class="form-group">
                        <label for="inputBoardId"
                               class="control-label col-sm-3">{{ trans('admin/order.status') }}</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                    전체
                                </label>
                                <label class="btn btn-default {{ $status_cd == 100 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 100, \App\Helpers\Helper::isCheckd(100, $status_cd), ['name' => 'status_cd']) }}
                                    주문취소
                                </label>
                                <label class="btn btn-default {{ $status_cd == 101 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 101, \App\Helpers\Helper::isCheckd(101, $status_cd), ['name' => 'status_cd']) }}
                                    주문신청
                                </label>
                                <label class="btn btn-default {{ $status_cd == 102 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 102, \App\Helpers\Helper::isCheckd(102, $status_cd), ['name' => 'status_cd']) }}
                                    주문완료
                                </label>
                                <label class="btn btn-default {{ $status_cd == 103 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 103, \App\Helpers\Helper::isCheckd(103, $status_cd), ['name' => 'status_cd']) }}
                                    예약확인
                                </label>
                                <label class="btn btn-default {{ $status_cd == 104 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 104, \App\Helpers\Helper::isCheckd(104, $status_cd), ['name' => 'status_cd']) }}
                                    입고대기
                                </label>
                                <label class="btn btn-default {{ $status_cd == 105 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 105, \App\Helpers\Helper::isCheckd(105, $status_cd), ['name' => 'status_cd']) }}
                                    입고
                                </label>
                                <label class="btn btn-default {{ $status_cd == 106 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 106, \App\Helpers\Helper::isCheckd(106, $status_cd), ['name' => 'status_cd']) }}
                                    진단중
                                </label>
                                <label class="btn btn-default {{ $status_cd == 107 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 107, \App\Helpers\Helper::isCheckd(107, $status_cd), ['name' => 'status_cd']) }}
                                    진단완료
                                </label>
                                <label class="btn btn-default {{ $status_cd == 108 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 108, \App\Helpers\Helper::isCheckd(108, $status_cd), ['name' => 'status_cd']) }}
                                    검토중
                                </label>
                                <label class="btn btn-default {{ $status_cd == 109 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 109, \App\Helpers\Helper::isCheckd(109, $status_cd), ['name' => 'status_cd']) }}
                                    인증발급완료
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_start') }}" name='trs'
                                       value='{{ $trs }}'>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_end') }}" name='tre'
                                       value='{{ $tre }}'>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                        <div class="col-sm-3">
                            {!! Form::select('sf', $search_fields, $sf, ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}"
                                   name='s' value='{{ $s }}'>
                        </div>
                    </div>

                    <div class="form-group no-margin-bottom">
                        <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                        <div class="col-sm-4 col-sm-offset-3">
                            <button type="submit" class="btn btn-block btn-primary"><i
                                        class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row margin-bottom">

            <div class="col-md-12">

                <p class="form-control-static">
                    {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
                </p>


                <table class="table text-middle text-center">

                    <colgroup>

                        <col width="8%">
                        <col width="13%">
                        <col width="13%">
                        <col width="15%">
                        <col width="15%">
                        <col width="9%">
                        <col width="*">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center"><i class="fa fa-sort" aria-hidden="true"></i> <a href="#"
                                                                                                 id="sort">상태</a></th>
                        <th class="text-center">주문번호</th>
                        <th class="text-center">주문정보</th>
                        <th class="text-center">결제정보</th>
                        <th class="text-center">예약정보</th>
                        <th class="text-center">주문일</th>
                        <th class="text-center">Remarks</th>
                    </tr>
                    </thead>

                    <tbody>

                    @unless(count($entrys) >0)
                        <tr>
                            <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                        </tr>
                    @endunless

                    @foreach($entrys as $data)
                        <tr>
                            <td>
                                                        <span
                                                                style="width:60px;display:inline-block;"
                                                                class="label
                                                        @if($data->status_cd == 100)
                                                                        label-default
@elseif($data->status_cd == 106)
                                                                        label-primary
@elseif($data->status_cd == 109)
                                                                        label-success
@else
                                                                        label-info
@endif
                                                                        ">
                                                        {{ $data->status->display() }}
                                                </span>
                            </td>

                            <td class="text-center">
                                {{ $data->getOrderNumber() }}
                                <br/>
                                <small class="text-muted">{{ $data->id }}</small>
                            </td>

                            <td class="">
                                <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer_name }}</a>
                                <br/>
                                <small class="text-warning">{{ $data->orderer_mobile }}</small>
                            </td>

                            <td class="">
                                <a href="/item">{{ $data->item->name }} <span class="text-muted">{{ number_format($data->item->price) }}
                                        원</span></a>
                                <br/>
                                <small class="text-warning">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                            </td>

                            <td class="">
                                <a href="/user/{{ $data->garage->id }}/edit">{{ $data->garage->name }}</a>
                                <br/>
                                <small class="text-danger">{{  $data->reservation ? $data->reservation->reservation_at->format("m월 d일 H시") : '-' }}</small>
                            </td>

                            <td>
                                {{ $data->created_at->format('m-d H:i') }}
                            </td>

                            <td>

                                @if(in_array($data->status_cd, [101,102,103,104]))
                                    <button type="button"
                                            data-date="{{  $data->reservation->reservation_at->format('Y-m-d') }}"
                                            data-time="{{  $data->reservation->reservation_at->format('H') }}"
                                            data-order_id="{{ $data->id }}"
                                            data-order_number="{{ $data->getOrderNumber() }}"
                                            class="btn btn-info changeReservationModalOpen" data-toggle="tooltip"
                                            title="예약 변경">예약변경
                                    </button>
                                    @if(in_array($data->status_cd, [101,102,103]))
                                        <button type="button" data-order_id="{{ $data->id }}"
                                                class="btn btn-danger confirmReservation" data-toggle="tooltip"
                                                data-loading-text="{{ trans('common.button.loading') }}"
                                                title="예약확정">예약확정
                                        </button>
                                    @endif
                                @endif

                                @if($data->status_cd > 107)
                                    <a href="/certificate/{{ $data->id }}" target="_blank" class="btn btn-primary"
                                       data-toggle="tooltip" title="인증서 미리보기"><i class="fa fa-eye"></i></a>
                                @endif

                                @if($data->status_cd == 107)
                                    <button data-id="{{ $data->id }}" class="btn btn-danger certificate-assign"
                                            data-toggle="tooltip" title="인증서 발급시작">인증시작
                                    </button>
                                @endif

                                @if($data->status_cd == 108)
                                    <a href="/certificate/{{ $data->id }}/edit" class="btn btn-danger"
                                       data-toggle="tooltip" title="인증서 발급정보 수정">인증정보 수정</a>
                                @endif

                                @if( $data->status_cd == 104 )
                                    <button type="button" class="btn btn-success diagnosing" id="diagnosing"
                                            data-order_id="{{ $data->id }}">진단시작
                                    </button>
                                @endif

                                <a href="{{ url("order", [$data->id]) }}" class="btn btn-default" data-toggle="tooltip"
                                   title="주문상세보기">상세보기</a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a href="/test" class="btn btn-info">테스트 주문생성</a>
            </div>

            <div class="col-sm-6 text-right">

                @if($status_cd)
                    {!! $entrys->appends(['status_cd' => $status_cd])->render() !!}
                @elseif($sf && $s)
                    {!! $entrys->appends([$sf => $s])->render() !!}
                @elseif($trs && $tre)
                    {!! $entrys->appends(['trs' => $trs, 'tre' => $tre])->render() !!}
                @elseif($trs)
                    {!! $entrys->appends(['trs' => $trs])->render() !!}
                @elseif($tre)
                    {!! $entrys->appends(['tre' => $tre])->render() !!}
                @else
                    {!! $entrys->render() !!}
                @endif

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
                    <input type="hidden" id="order_id" value="">
                    <div class="modal-body">

                        <div class="form-group form-group-lg" style="margin:0px;">
                            <label class="control-label">주문번호</label>
                            <p class="form-control-static">
                                <span id="order_number"></span>
                            </p>
                        </div>

                        <div class="form-group form-group-lg" style="margin:0px;">
                            <label for="datepickerReservation" class="control-label">날짜</label>
                            <input type="text" class="form-control datepicker" placeholder="날짜"
                                   id="datepickerReservation">
                        </div>

                        <div class="form-group form-group-lg" style="margin:0px;">
                            <label for="" class="control-label">시간</label>

                            <select class="form-control" id="datepickerReservationTime">
                                <option value="09">9시</option>
                                <option value="10">10시</option>
                                <option value="11">11시</option>
                                <option value="12">12시</option>
                                <option value="13">13시</option>
                                <option value="14">14시</option>
                                <option value="15">15시</option>
                                <option value="16">16시</option>
                                <option value="17">17시</option>
                            </select>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" data-loading-text="처리중..." type="button"
                                id="reservation_change">예약변경
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div id="diagnosingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">진단시작</h4>
                </div>

                <form class="form-horizontal">
                    <input type="hidden" id="order_id_2" value="">
                    <div class="modal-body">


                        <div class="form-group form-group-lg" style="margin:0px;">
                            <label class="control-label" style="margin-bottom: 10px;">엔지니어 선택</label>
                            <br>
                            <select class="form-control select2" id="engineer" name="engineer" id="select2"
                                    autocomplete="off" style="width: 100%;">
                                @foreach($engineers as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" data-loading-text="처리중..." type="button"
                                id="diagnose_process">진단시작
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


@push( 'header-script' )
    <link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}"/>
@endpush


@push( 'footer-script' )
    <script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
    <script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#sort').click(function () {
                $('#sort_val').val('order_num');
                $('#frm').submit();
            });

            $(document).on('click', '.changeReservationModalOpen', function (e) {
                e.preventDefault();
                var d = $(this).data("date");
                var t = $(this).data("time");
                var order_id = $(this).data('order_id');
                var order_number = $(this).data("order_number");
                $("#datepickerReservation").val(d);
                $("#datepickerReservationTime").val(t);
                $("#order_id").val(order_id);
                $("#order_number").html(order_number);
                $("#changeReservationModal").modal();

            });

            $(document).on('click', '.confirmReservation', function (e) {
                var $obj = $(this);
                var order_id = $(this).data("order_id");

                if (confirm("해당 주문의 예약일자를 확정하시겠습니까?")) {
                    $.ajax({
                        url: '/order/confirmation/' + order_id,
                        type: 'post',
                        data: {
                            order_id: order_id
                        },
                        success: function (data) {

                            $obj.parent().find('.changeReservationModalOpen').remove();
                            $obj.parent().find('.confirmReservation').remove();
                            location.href = '/order';
                        },
                        error: function (data) {
                            alert('문제가 발생했습니다. 관리자에게 문의해주세요.');
                        }
                    })
                } else {
                    return false;
                }
            });

            $('#reservation_change').click(function () {
                var date = $("#datepickerReservation").val();
                var time = $("#datepickerReservationTime").val();
                var order_id = $("#order_id").val();

                $.ajax({
                    type: 'post',
                    url: '/order/reservation_change',
                    data: {
                        'order_id': order_id,
                        'date': date,
                        'time': time
                    },
                    success: function (data) {
                        alert('예약날짜가 변경되었습니다.');
                    },
                    error: function (data) {
                        alert('처리중 오류가 발생하였습니다. 잠시후 다시 시도해주세요.');
                    }
                })
            });

            $('.select2').select2();

            $('.diagnosing').click(function () {
                var order_id = $(this).data('order_id');
                $('#order_id_2').val(order_id);
                $('#diagnosingModal').modal();
            });

            $('#diagnose_process').click(function () {
                var engineer_id = $('.select2').val();
                var order_id = $('#order_id_2').val();
                if (confirm('해당 엔지니어로 진단을 시작하시겠습니까?')) {
                    $.ajax({
                        type: 'post',
                        url: '/order/diagnosing',
                        data: {
                            'order_id': order_id,
                            'engineer_id': engineer_id
                        },
                        success: function (data) {
                            alert('진단이 시작되었습니다. 수정이 가능합니다.');
                            location.href = '/diagnosis/' + order_id;
                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                        }
                    })
                }
            });
        })
    </script>
@endpush
