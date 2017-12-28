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
