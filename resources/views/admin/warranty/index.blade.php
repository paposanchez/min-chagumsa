@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>보증 관리
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
                            <table class="table text-center">
                                <colgroup>
                                    <col width="8%">
                                    <col width="14%">
                                    <col width="10%">
                                    <col width="20%">
                                    <col width="10%">
                                    <col width="8%">
                                    <col width="8%">
                                    <col width="*">
                                </colgroup>

                                <thead>
                                <tr class="active">
                                    <th class="text-center"><a class="sort" href="#" id="status"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center">주문번호</th>
                                    <th class="text-center">주문자명</th>
                                    <th class="text-center">주문자정보</th>
                                    <th class="text-center">차량모델</th>
                                    <th class="text-center"><a class="sort" href="#" id="completed_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 발급일</a></th>
                                    <th class="text-center">만료일</th>
                                    <th class="text-center">Remarks</th>

                                </tr>
                                </thead>

                                <tbody>


                                @unless(count($entrys) >0)
                                    <tr>
                                        <td colspan="8"
                                            class="no-result text-center">{{ trans('common.no-result') }}</td>
                                    </tr>
                                @endunless

                                @foreach($entrys as $data)
                                    <tr>
                                        <td>
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
                                        </td>

                                        <td>
                                            {{ $data->order->orderer_name }}
                                        </td>

                                        <td class="text-center">
                                            <a href="/user/{{ $data->order->orderer_id }}/edit">{{ $data->order->orderer ? $data->order->orderer->email : '-' }}</a>
                                            <br/>
                                            <small class="text-warning">{{ $data->order->orderer_mobile }}</small>
                                        </td>


                                        <td class="text-center">
                                            {{ $data->carNumber->car->getFullName() }}
                                        </td>

                                        <td class="text-center">{{ $data->completed_at ? $data->completed_at->format('m-d H:i') : '-' }}</td>

                                        <td class="text-center">

                                            {{ $data->completed_at ? $data->getExpireDate()->format('Y-m-d H:i') : '-' }}

                                            @if($data->status_cd == 116)
                                                <br/>
                                                @if($data->certificates->isExpired())
                                                    <small class="text-muted">만료됨</small>
                                                @else
                                                    <small class="text-warning">
                                                        {{ number_format($data->certificates->getCountdown()) }}일 남음
                                                    </small>
                                                @endif
                                            @endif

                                        </td>


                                        <td class="text-center">

                                            <a href="/order/{{ $data->id }}" class="btn btn-default"
                                               data-toggle="tooltip"
                                               title="상세보기">상세보기</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--page navigation--}}
                            {!! $entrys->appends([$sf => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}
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
                                        <label class="btn btn-default {{ $status_cd == 112 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 112, \App\Helpers\Helper::isCheckd(112, $status_cd), ['name' => 'status_cd']) }}
                                            신청
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 114 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 114, \App\Helpers\Helper::isCheckd(114, $status_cd), ['name' => 'status_cd']) }}
                                            검토중
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 115 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 115, \App\Helpers\Helper::isCheckd(115, $status_cd), ['name' => 'status_cd']) }}
                                            발급완료
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 116 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 117, \App\Helpers\Helper::isCheckd(117, $status_cd), ['name' => 'status_cd']) }}
                                            인증만료
                                        </label>
                                        <label class="btn btn-default {{ $status_cd == 120 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('status_cd', 120, \App\Helpers\Helper::isCheckd(120, $status_cd), ['name' => 'status_cd']) }}
                                            취소
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar-alt"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name='trs'
                                                       value='{{ $trs }}'
                                                       placeholder="{{ trans('common.search.period_start') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name="tre" id="tre"
                                                       value="{{ $tre }}"
                                                       placeholder="{{ trans('common.search.period_end') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>
                                    <div class="col-sm-3">
                                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'selectpicker']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-sm" id="s" name="s"
                                                   placeholder="검색어" value="{{ $s }}">
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
@endpush
