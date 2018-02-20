@extends( 'admin.layouts.default' )

@section( 'content' )
<section id="content">
        <div class="container">
                <div class="card">
                        <div class="card-header ch-alt">
                                <h2>결제관리
                                        <small>결제관리</small>
                                </h2>
                        </div>

                        <div class="card-body">
                                <table class="table text-center">
                                        <colgroup>
                                                <col width="8%">
                                                <col width="10%" class="">
                                                <col width="10%" class="">
                                                <col width="10%" class="">
                                                <col width="10%">
                                                <col width="20%">
                                                <col width="15%">
                                                <col width="*">
                                        </colgroup>

                                        <thead>
                                                <tr class="">
                                                        <th class="text-center">상태</th>
                                                        <th class="text-center">주문번호</th>
                                                        <th class="text-center">결제번호</th>
                                                        <th class="text-center">결제방법</th>
                                                        <th class="text-center">결제금액</th>
                                                        <th class="text-center">PG</th>
                                                        <!-- <th class="text-center">결제내역</th> -->
                                                        <th class="text-center">결제일</th>
                                                        <th class="text-center">Remarks</th>
                                                </tr>
                                        </thead>


                                        <tbody>

                                                @unless(count($entrys) >0)
                                                <tr>
                                                        <td colspan="5" class="no-result">{{ trans('common.no-result') }}</td>
                                                </tr>
                                                @endunless

                                                @foreach ($entrys as $key => $data)
                                                <tr>
                                                        <td class="text-center">
                                                                @component('components.badge', [
                                                                'code' => $data->status_cd,
                                                                'color' =>[
                                                                '100' => 'default',
                                                                '102' => 'success',
                                                                '112' => 'success',
                                                                '113' => 'warning',
                                                                '114' => 'info',
                                                                '115' => 'primary',
                                                                '116' => 'danger'
                                                                ]])
                                                                {{ $data->status->display() }}
                                                                @endcomponent
                                                        </td>

                                                        <td>{{ $data->order->id }}</td>
                                                        <td>{{ $data->id }}</td>


                                                        <td>{{ $data->payment_type->display() }}</td>

                                                        <td>{{ $data->amount }}</td>

                                                        <td>{{ $data->pg }}</td>




                                                        <!-- <td class="text-center">
                                                                <a href="/user/{{ $data->order->orderer_id }}/edit">{{ $data->order->orderer ? $data->order->orderer->email : '-' }}</a>
                                                                <br/>
                                                                <small class="text-warning">{{ $data->order->orderer_mobile }}</small>
                                                        </td> -->



                                                        <!-- <td class="text-center">
                                                                @foreach($data->order->orderItem as $order_item)
                                                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                                <a href="/config/item/{{ $order_item->item->id }}/edit" data-toggle="tooltip" title="{{ $order_item->item->type->display() }}" class="badge">{{ $order_item->item->typeString() }}</a>
                                                                @else
                                                                <span data-toggle="tooltip" title="{{ $order_item->item->type->display() }}" class="badge">{{ $order_item->item->typeString() }}</span>
                                                                @endif

                                                                @endforeach
                                                                <br/>
                                                                <small class="text-warning">{{ $data->payment_type->display() }}</small>
                                                        </td> -->

                                                        <td class="text-center">{{ $data->updated_at }}</td>

                                                        <td class="text-center">

                                                                <a href="{{ route("purchase.show", [$data->id]) }}" class="btn btn-default btn-icon waves-effect waves-float" data-toggle="tooltip" title="결제정보 상세보기"><i class="zmdi zmdi-search-in-page"></i></a>



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
