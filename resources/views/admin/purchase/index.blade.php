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

                                <td class="text-center">{{ $data->updated_at }}</td>

                                <td class="text-center">

                                    <a href="{{ route("purchase.show", [$data->id]) }}"
                                       class="btn btn-default btn-icon waves-effect waves-float detail"
                                       data-toggle="modal"
                                       data-target="#detailModal" data-id="{{ $data->id }}"
                                       title="결제정보 상세보기"><i class="zmdi zmdi-search-in-page"></i></a>

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

    <!-- Car Modal -->
    <div id="detailModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-blue m-b-20">
                        <h2>결제 상세내용
                            <small></small>
                        </h2>
                        <ul class="actions actions-alt">
                            <li class="dropdown">
                                <a href="#">
                                    <i class="zmdi zmdi-close" data-dismiss="modal"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-padding">
                        <div class="modal-body">
                            {!! Form::open(['method' => 'PATCH','route' => ['purchase.update', 'id' => 0], 'class'=>'form-horizontal', 'id'=>'carForm', 'enctype'=>"multipart/form-data"]) !!}
                                <input type="hidden" name="purchase_id" id="purchase_id" value="">
                                <div class="card-header ch-alt">
                                    <h2>주문관리</h2>
                                </div>
                                <table class="table text-center">
                                    <colgroup>
                                        <col width="8%">
                                        <col width="8%">
                                        <col width="10%">
                                        <col width="12%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="*">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                    <tr class="">
                                        <th class="text-center">상태</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">결제타입</th>
                                        <th class="text-center">결제금액</th>
                                        <th class="text-center">예금주</th>
                                        <th class="text-center">은행</th>
                                        <th class="text-center">계좌번호</th>
                                        <th class="text-center">Remarks</th>
                                    </tr>
                                    </thead>

                                    <tbody id="payment">
                                    <tr>
                                        <td>
                                            1
                                        </td>

                                        <td>
                                            2
                                        </td>

                                        <td>
                                            3
                                        </td>

                                        <td>
                                            4
                                        </td>

                                        <td>
                                            5
                                        </td>

                                        <td>
                                            6
                                        </td>

                                        <td>
                                            7
                                        </td>

                                        <td>
                                            <button
                                               class="btn btn-default btn-icon waves-effect waves-float"
                                               data-toggle="tooltip" title="변경하기"><i
                                                        class="zmdi zmdi-refresh-sync"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            {!! Form::close() !!}
                        </div>

                        <div class="modal-footer">
                            {{--<button type="submit" class="btn btn-success" id="">변경</button>--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(document).on('click', '.detail', function () {
            var id = $(this).data('id');

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/purchase/get-detail',
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#payment').html();
                    $.each(data, function(key, value){

                    });

                },
                error: function (data) {
                    // alert(JSON.stringify(data));
                }
            });
        });

    </script>

@endpush
