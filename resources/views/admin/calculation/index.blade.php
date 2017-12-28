@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<section id="content">
        <div class="container">
                <div class="block-header">
                        <h2>Table</h2>

                        <ul class="actions">
                                <li>
                                        <a href="">
                                                <i class="zmdi zmdi-trending-up"></i>
                                        </a>
                                </li>
                                <li>
                                        <a href="">
                                                <i class="zmdi zmdi-check-all"></i>
                                        </a>
                                </li>
                                <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                        <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                        <a href="">Manage Widgets</a>
                                                </li>
                                                <li>
                                                        <a href="">Widgets Settings</a>
                                                </li>
                                        </ul>
                                </li>
                        </ul>

                </div>

                <div class="card">
                        <div class="card-header">
                                <h2>Basic Table
                                        <small>Basic example without any additional modification classes</small>
                                </h2>
                        </div>

                        <div class="card-body">
                                <table class="table text-center">
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
                                                        <tr class="active">
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

                                                {{--page navigation--}}
                                                {!! $entrys->render() !!}

                                        </div>

                                </div>
                        </section>
                        @endsection


                        @push( 'header-script' )
                        @endpush


                        @push( 'footer-script' )
                        @endpush
