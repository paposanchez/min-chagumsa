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
                            <col width="14%" class="">
                            <col width="20%" class=" ">
                            <col width="20%" class="">
                            <col width="14%">
                            <col width="*">
                        </colgroup>

                        <thead>
                        <tr class="active">
                            <th class="text-center">상태</th>
                            <th class="text-center">주문자명</th>
                            <th class="text-center">주문자정보</th>
                            <th class="text-center">결제정보</th>
                            <th class="text-center">결제일</th>
                            {{--<th class="text-center">{{ trans('admin/role.action') }}</th>--}}
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

                                <td class="text-center">{{ $data->order->orderer_name }}</td>

                                <td class="text-center">
                                    <a href="/user/{{ $data->order->orderer_id }}/edit">{{ $data->order->orderer ? $data->order->orderer->email : '-' }}</a>
                                    <br/>
                                    <small class="text-warning">{{ $data->order->orderer_mobile }}</small>
                                </td>

                                <td class="text-center">
                                    @foreach($data->order->orderItem as $order_item)
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                            <a href="/config/item/{{ $order_item->item->id }}/edit">* {{ $order_item->item->type->display() }}</a>
                                        @else
                                            * {{ $order_item->item->type->display() }}
                                        @endif

                                    @endforeach
                                    <br/>
                                    <small class="text-warning">{{ $data->payment_type->display() }}</small>
                                </td>

                                <td class="text-center">{{ $data->created_at->format('Y.m.d') }}</td>

                                {{--<td class="text-center">--}}
                                    {{--<a href="{{ route('purchase.edit', $data->id) }}" class="btn btn-default"--}}
                                       {{--data-tooltip="{pos:'top'}"--}}
                                       {{--title="{{ trans('common.button.edit') }}">{{ trans('common.button.edit') }}</a>--}}
                                {{--</td>--}}
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
