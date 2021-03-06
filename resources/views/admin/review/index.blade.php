@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header  ch-alt">
                    <h2>진단검토관리
                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
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
                            <table class="table">
                                <colgroup>
                                    <col width="8%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="20%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="*">
                                </colgroup>

                                <thead>
                                <tr class="">
                                    <th class="text-center"><a class="sort" href="#" id="status"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center">주문번호</th>
                                    <th class="text-center">주문자정보</th>
                                    <th class="text-center">예약정보</th>
                                    <th class="text-center"><a class="sort" href="#" id="start_at"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 검토완료일</a></th>
                                    <th class="text-center"><a class="sort" href="#" id="completed_at"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 진단완료일</a></th>
                                    <th class="text-center">Remarks</th>

                                </tr>
                                </thead>

                                <tbody>


                                @unless(count($entrys) >0)
                                    <tr>
                                        <td colspan="9" class="no-result">{{ trans('common.no-result') }}</td>
                                    </tr>
                                @endunless

                                @foreach($entrys as $data)

                                    <tr>

                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->status_cd,
                                            'color' =>[
                                            '120' => 'default',
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

                                        <td class="text-center">
                                            {{ $data->chakey }}
                                            <br>
                                            <small class="text-warning">{{ $data->id }}</small>
                                        </td>

                                        <td class="text-center">
                                            @if($user->hasRole('admin'))
                                                <a href="/user/{{ $data->order->orderer_id }}/edit">
                                                    {{ $data->orderItem->order->orderer_name }}
                                                </a>
                                            @else
                                                {{ $data->order->orderer_name }}
                                            @endif

                                            <br/>
                                            <small class="text-warning">{{ $data->order->orderer_mobile }}</small>
                                        </td>

                                        <td class="text-center">
                                            @if($user->hasRole('admin'))
                                                <a href="/user/{{ $data->garage->id }}/edit">{{ $data->garage->name }}</a>
                                            @else
                                                {{ $date->garage->name }}
                                            @endif
                                            <br/>
                                            <small class="text-danger">{{ $data->reservation_at->format("m월 d일 H시") }}</small>
                                        </td>

                                        <td class="text-center">
                                            {{ $data->completed_at->format('m-d H:i') }}
                                        </td>

                                        <td class="text-center">
                                            {{ $data->issued_at ? $data->issued_at->format('m-d H:i') : '-' }}
                                        </td>


                                        <td class="text-center">
                                            @if($data->status_cd == 126)
                                                <a href="{{ route("review.edit", [$data->id]) }}" class="btn btn-danger"
                                                   data-toggle="tooltip" title="인증서 진단정보 수정">검토 수정</a>
                                            @endif

                                            <a href="{{ url("diagnosis", [$data->id]) }}" class="btn btn-default"
                                               data-toggle="tooltip"
                                               title="주문상세보기">상세보기</a>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--page navigation--}}
                            {!! $entrys->appends(['sf' => $sf, 's' => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}

                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                                <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                                <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                            전체
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 126 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 126, \App\Helpers\Helper::isCheckd(126, $status_cd), ['name' => 'status_cd']) }}
                                            검토완료
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 115 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 115, \App\Helpers\Helper::isCheckd(115, $status_cd), ['name' => 'status_cd']) }}
                                            발급완료
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                    <div class="col-sm-2">
                                        {!! Form::select('df', $search_fields2, $df, ['class'=>'selectpicker']) !!}
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar-alt"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name='trs' value='{{ $trs }}' placeholder="{{ trans('common.search.period_start') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name="tre" id="tre" value="{{ $tre }}" placeholder="{{ trans('common.search.period_end') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>
                                    <div class="col-sm-2">
                                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'selectpicker']) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-search-in-page"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control input-sm" id="s" name="s"
                                                       placeholder="검색어" value="{{ $s }}">
                                            </div>
                                        </div>
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
            if($('#sort_orderby').val() == 'asc'){
                $('#sort_orderby').val('desc')
            }else {
                $('#sort_orderby').val('asc')
            }
            $('#frm').submit();
        });

    </script>
@endpush
