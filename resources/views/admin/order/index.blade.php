@extends( 'admin.layouts.default' )

@section( 'content' )
<section id="content">

        <div class="container">

                <div class="card">
                        <div class="card-header">
                                <h2>주문관리
                                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                                </h2>

                                <ul class="actions">
                                        <li>
                                                <a href="#collapseExample" class=" waves-effect" type="button" data-toggle="collapse"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <i class="zmdi zmdi-search"></i>
                                        </a>
                                </li>
                        </ul>
                </div>


                <div class="card-body card-search">

                        <div class="jumbotron m-0">

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
                                                        <label class="btn btn-default {{ $status_cd == 100 ? 'active' : '' }} selected_cd">
                                                                {{ Form::radio('status_cd', 100, \App\Helpers\Helper::isCheckd(100, $status_cd), ['name' => 'status_cd']) }}
                                                                주문취소
                                                        </label>
                                                        <label class="btn btn-default {{ $status_cd == 102 ? 'active' : '' }} selected_cd">
                                                                {{ Form::radio('status_cd', 102, \App\Helpers\Helper::isCheckd(102, $status_cd), ['name' => 'status_cd']) }}
                                                                주문완료
                                                        </label>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                                {{--<div class="col-sm-4">--}}
                                                        {{--<select class="selectpicker">--}}
                                                                {{--<option>Mustard</option>--}}
                                                                {{--<option>Ketchup</option>--}}
                                                                {{--<option>Relish</option>--}}
                                                                {{--<option>Toasted</option>--}}
                                                                {{--</select>--}}
                                                                {{--</div>--}}
                                                                <div class="col-sm-3">
                                                                        <div class="input-group">
                                                                                <span class="input-group-addon"><i class="zmdi zmdi-calendar-alt"></i></span>
                                                                                <div class="fg-line">
                                                                                        <input type="text" class="form-control date-picker" name='trs' value='{{ $trs }}' placeholder="{{ trans('common.search.period_start') }}">
                                                                                </div>
                                                                        </div>
                                                                </div>

                                                                <div class="col-sm-3">
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


                                        <table class="table">
                                                <colgroup>
                                                        <col width="8%">
                                                        <col width="14%">
                                                        <col width="10%">
                                                        <col width="20%">
                                                        <col width="20%">
                                                        <col width="14%">
                                                        <col width="*">
                                                </colgroup>
                                                <thead>
                                                        <tr class="active">
                                                                <th class="text-center"><a class="sort" href="#" id="status"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a>
                                                                </th>
                                                                <th class="text-center"><a class="sort" href="#" id="car_number"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 주문번호</a></th>
                                                                <th class="text-center">주문자명</th>
                                                                <th class="text-center">주문자정보</th>
                                                                <th class="text-center">결제정보</th>
                                                                <th class="text-center"><a class="sort" href="#" id="created_at"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 결제일</a></th>
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

                                                                <td class="text-center">
                                                                        {{ $data->chakey }}
                                                                        <br>
                                                                        <small class="text-warning">{{ $data->id }}</small>
                                                                </td>

                                                                <td class="text-center">
                                                                        {{ $data->orderer_name }}
                                                                </td>

                                                                <td class="text-center">
                                                                        <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer ? $data->orderer->email : '-' }}</a>
                                                                        <br/>
                                                                        <small class="text-warning">{{ $data->orderer_mobile }}</small>
                                                                </td>

                                                                <td class="text-center">

                                                                        {{ $data->createChakey($data->car_number) }}
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
                                        {!! $entrys->appends([$sf => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}
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

                // $('.date-picker').datetimepicker({
                //     format: 'YYYY-MM-DD'
                // });
                </script>
                @endpush
