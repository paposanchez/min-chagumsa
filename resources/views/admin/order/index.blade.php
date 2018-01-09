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
                    <table class="table">
                        <colgroup>
                            <col width="8%">
                            <col width="13%">
                            <col width="25%">
                            <col width="25%">
                            <col width="14%">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr class="active">
                            <th class="text-center"><i class="fa fa-sort" aria-hidden="true"></i> <a href="#" id="sort">상태</a>
                            </th>
                            <th class="text-center">주문번호</th>
                            <th class="text-center">주문자정보</th>
                            <th class="text-center">결제정보</th>
                            <th class="text-center">결제일</th>
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
                                    <small class="text-muted">{{ $data->car_number }}</small>
                                </td>

                                <td class="text-center">
                                    <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer_name }} <span
                                                class="text-muted">{{ $data->orderer->email }}</span></a>
                                    <br/>
                                    <small class="text-warning">{{ $data->orderer_mobile }}</small>
                                </td>

                                <td class="text-center">
                                    <a href="/item">{{ $data->orderItem->item->name }} <span class="text-muted">{{ number_format($data->orderItem->item->price) }}
                                            원</span></a>
                                    <br/>
                                    <small class="text-warning">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                                </td>

                                <td class="text-center">
                                    {{ $data->created_at->format('m-d H:i') }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ url("order", [$data->id]) }}" class="btn btn-default"
                                       data-toggle="tooltip" title="주문상세보기">상세보기</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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
