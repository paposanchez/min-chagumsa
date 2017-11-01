@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form">

                    <div class="form-group">
                        <label for="inputBoardId"
                               class="control-label col-sm-3">{{ trans('admin/order.status') }}</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                    전체
                                </label>
                                <label class="btn btn-default {{ $status_cd == 106 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 106, \App\Helpers\Helper::isCheckd(106, $status_cd), ['name' => 'status_cd']) }}
                                    진단중
                                </label>
                                <label class="btn btn-default {{ $status_cd == 107 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 107, \App\Helpers\Helper::isCheckd(107, $status_cd), ['name' => 'status_cd']) }}
                                    진단완료
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">검색기간</label>
                        <div class="col-sm-2">
                            {!! Form::select('df', $date_fields, $df, ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_start') }}" name='trs'
                                       value='{{ $trs }}'>
                            </div>
                        </div>
                        <div class="col-sm-2">
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
                        <div class="col-sm-2">
                            {!! Form::select('sf', $search_fields, $sf, ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-4">
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
                        <col width="8%">
                        <col width="8%">
                        <col width="*">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">상태</th>
                        <th class="text-center">주문번호</th>
                        <th class="text-center">주문정보</th>
                        <th class="text-center">결제정보</th>
                        <th class="text-center">예약정보</th>
                        <th class="text-center">진단시작일</th>
                        <th class="text-center">진단완료일</th>
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
                                <a href="/item">{{ $data->item->name }} <span
                                            class="text-muted">{{ number_format($data->item->price) }}원</span></a>
                                <br/>
                                <small class="text-warning">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                            </td>


                            <td class="">
                                <a href="/user/{{ $data->garage->id }}/edit">{{ $data->garage->name }}</a>
                                <br/>
                                <small class="text-danger">{{  $data->reservation ? $data->reservation->reservation_at->format("m월 d일 H시") : '-' }}</small>
                            </td>


                            <td>
                                {{ $data->diagnose_at->format('m-d H:i') }}
                            </td>

                            <td>
                                {{ $data->diagnosed_at ? $data->diagnosed_at->format('m-d H:i') : '-' }}
                            </td>


                            <td>
                                {{--@if($data->status_cd == 107)--}}
                                @if($data->status_cd > 105 && $data->status_cd < 108 )
                                    <a href="{{ url("diagnosis", [$data->id]) }}" class="btn btn-danger"
                                       data-toggle="tooltip" title="인증서 진단정보 수정">진단정보 수정</a>
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

            <div class="col-sm-offset-6 col-sm-6 text-right">
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
@endsection



@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
