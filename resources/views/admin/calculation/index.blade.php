@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
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
                               class="control-label col-sm-3">{{ trans('admin/calculation.status') }}</label>
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                    전체
                                </label>
                                <label class="btn btn-default {{ $status_cd == 110 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 110, \App\Helpers\Helper::isCheckd(110, $status_cd), ['name' => 'status_cd']) }}
                                    정산대기
                                </label>
                                <label class="btn btn-default {{ $status_cd == 111 ? 'active' : '' }} selected_cd">
                                    {{ Form::radio('status_cd', 111, \App\Helpers\Helper::isCheckd(111, $status_cd), ['name' => 'status_cd']) }}
                                    정산완료
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">정산기간</label>

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
                        <col width="2%">
                        <col width="15%">
                        <col width="13%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="*">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center"><input type="checkbox" class="calculate-checkall"></th>
                        <th class="text-center">주문번호</th>
                        <th class="text-center">가격</th>
                        <th class="text-center">PG 수수료율</th>
                        <th class="text-center">보증료</th>
                        <th class="text-center">공임비용</th>
                        <th class="text-center">얼라이언스 Com</th>
                        <th class="text-center">기술사 Com</th>
                        <th class="text-center">수익</th>
                        <th class="text-center">정산일</th>
                    </tr>
                    </thead>

                    <tbody>

                    @unless(count($entrys)>0)
                        <tr>
                            <td colspan="10" class="no-result">{{ trans('common.no-result') }}</td>
                        </tr>
                    @endunless


                    <?php

                    $subtotals = [
                        'total_price' => 0,
                        'total_pg' => 0,
                        'total_guarantee' => 0,
                        'total_wage' => 0,
                        'total_alliance_income' => 0,
                        'total_tech_income' => 0,
                        'total_income' => 0,

                    ];
                    ?>

                    @foreach($entrys as $data)
                        <tr>
                            <td class=""><input type="checkbox" name="settlement_orders[]" value="{{ $data->id }}"></td>
                            <td class="">{{ $data->getOrderNumber() }}</td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->purchase->amount) }}</span>
                                <br/>
                                <a href="/item/{{ $data->item->id }}/show">
                                    <small class="text-warning">{{ $data->item->name }}</small>
                                    <small class="text-muted">{{ number_format($data->item->price) }}원</small>

                                </a>
                            </td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->getSettlementPGCommission()) }}</span>
                                <br/>
                                <small class="text-warning"><i class="fa fa-percent"></i>{{ $data->item->commission}}
                                </small>
                            </td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->item->guarantee) }}</span>
                                <br/>
                                <small class="text-warning">{{ $data->item->name }}</small>
                            </td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->item->wage) }}</span>
                                <br/>
                                <small class="text-warning">{{ $data->item->name }}</small>

                            </td>

                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->getSettlementAllianceCommission()) }}</span>
                                <br/>
                                <small class="text-warning"><i
                                            class="fa fa-percent"></i>{{ $data->item->alliance_ratio}}</small>
                            </td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->getSettlementTechCommission()) }}</span>
                                <br/>
                                <small class="text-warning"><i class="fa fa-percent"></i>{{ $data->item->certi_ratio}}
                                </small>
                            </td>
                            <td class="">
                                <span><i class="fa fa-won"></i>{{ number_format($data->getSettlementIncome()) }}</span>
                                <br/>
                                <small class="text-warning"><i class="fa fa-percent"></i>{{ $data->item->self_ratio}}
                                </small>
                            </td>
                            <td class="">
                                {{ $data->settlement ? $data->settlement->created_at : '-' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>

                    <tr class="bg-danger">
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"><span><i class="fa fa-won"></i>{{ $subtotals['total_price'] }}</span>
                        </th>
                        <th class="text-center"><span><i class="fa fa-won"></i>{{ $subtotals['total_pg'] }}</span></th>
                        <th class="text-center"><span><i
                                        class="fa fa-won"></i>{{ $subtotals['total_guarantee'] }}</span></th>
                        <th class="text-center"><span><i class="fa fa-won"></i>{{ $subtotals['total_wage'] }}</span>
                        </th>
                        <th class="text-center"><span><i class="fa fa-won"></i>{{ $subtotals['total_alliance_income'] }}</span>
                        </th>
                        <th class="text-center"><span><i
                                        class="fa fa-won"></i>{{ $subtotals['total_tech_income'] }}</span></th>
                        <th class="text-center"><span><i class="fa fa-won"></i>{{ $subtotals['total_income'] }}</span>
                        </th>
                        <th class="text-center"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <div class="row">


            <div class="col-sm-6">
                <button type="button" disabled class="btn btn-primary">정산완료</button>
            </div>


            <div class="col-sm-6 text-right">
                @if($status_cd)
                    {!! $entrys->appends(['status_cd' => $status_cd])->render() !!}
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
