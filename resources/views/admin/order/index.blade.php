@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">

        <div class="container">

            <a href="{{ route('order.create') }}" class="btn btn-float btn-primary m-btn"><i class="zmdi zmdi-plus"></i></a>

            <div class="card">

                <div class="card-header ch-alt">
                    <h2>주문관리
                        <small>총 <strong class="text-primary">{{ number_format($entrys->total()) }}</strong>개의 검색결과가
                            있습니다.
                        </small>
                    </h2>
                </div>


                <div class="card-body">

                    <ul class="tab-nav" role="tablist">
                        <li role="presentation" class="active">
                            <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab"
                               aria-expanded="true">
                                검색목록
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab"
                               aria-expanded="false">
                                검색하기
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content p-t-0 p-b-20 p-r-0 p-l-0">

                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">

                            <table class="table text-center">
                                <colgroup>
                                    <col width="8%">
                                    <col width="20%">
                                    <col width="10%">
                                    <col width="12%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="*">
                                </colgroup>
                                <thead>
                                <tr class="">
                                    <th class="text-center"><a class="sort" href="#" id="status"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center">주문번호</th>
                                    <th class="text-center">주문자정보</th>
                                    <th class="text-center">결제정보</th>
                                    <th class="text-center">주문상품</th>
                                    <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 결제일</a></th>
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

                                        <td>
                                            {{ $data->chakey }}
                                            <br>
                                            <small class="text-info">{{ $data->id }}</small>
                                        </td>

                                        <td>
                                            <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer_name }}</a>
                                            <br/>
                                            <small class="text-info">{{ $data->orderer_mobile }}</small>
                                        </td>

                                        <td>
                                            {{ $data->purchase_id }}
                                            <br/>
                                            <small class="text-info">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                                        </td>

                                        <td>
                                            @foreach($data->orderItem as $order_item)
                                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                    <a href="/config/item/{{ $order_item->item->id }}/edit"
                                                       data-toggle="tooltip"
                                                       title="{{ $order_item->item->type->display() }}"
                                                       class="badge">{{ $order_item->item->typeString() }}</a>
                                                @else
                                                    <span data-toggle="tooltip"
                                                          title="{{ $order_item->item->type->display() }}"
                                                          class="badge">{{ $order_item->item->typeString() }}</span>
                                                @endif

                                            @endforeach
                                        </td>


                                        <td>
                                            {{ $data->created_at->format('m-d H:i') }}
                                        </td>

                                        <td>

                                            <a href="{{ url("order", [$data->id]) }}"
                                               class="btn btn-default btn-icon waves-effect waves-float"
                                               data-toggle="tooltip" title="주문상세보기"><i
                                                        class="zmdi zmdi-search-in-page"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{--page navigation--}}
                            {!! $entrys->appends(['status_cd' => $status_cd, $sf => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}

                        </div>


                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal" role="form" id="searchFormCollapse">
                                <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                                <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                    <div class="col-sm-9">

                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                                전체
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 100 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 100, \App\Helpers\Helper::isCheckd(100, $status_cd), ['name' => 'status_cd']) }}
                                                주문취소
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 102 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 102, \App\Helpers\Helper::isCheckd(102, $status_cd), ['name' => 'status_cd']) }}
                                                주문완료
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control input-mask date-picker" name='trs'
                                               value='{{ $trs }}' data-mask="0000-00-00" placeholder="시작일"
                                               autocomplete="off" maxlength="10">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control input-mask date-picker" name='tre'
                                               value='{{ $tre }}' data-mask="0000-00-00" placeholder="종료일"
                                               autocomplete="off" maxlength="10">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>

                                    <div class="col-sm-4">
                                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'selectpicker']) !!}
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="s" name="s"
                                               placeholder="검색어" value="{{ $s }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">검색</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection


@push( 'header-script' )
@endpush


@push( 'footer-script' )
    <script type="text/javascript">
        $('.sort').click(function () {
            var sort_value = $(this).attr('id');
            $('#sort_val').val(sort_value);
            if ($('#sort_orderby').val() == 'asc') {
                $('#sort_orderby').val('desc')
            } else {
                $('#sort_orderby').val('asc')
            }
            $('#searchFormCollapse').submit();
        });

    </script>
@endpush
