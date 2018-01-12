@extends( 'admin.layouts.default' )

@section( 'content' )
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form">

                    <div class="form-group">
                        <label for="inputBoardId"
                               class="control-label col-sm-3">{{ trans('admin/post.board_id') }}</label>
                        <div class="col-sm-3">
                            {!! Form::select('board_id', [null=>trans('common.search.first_select')] + $board_list, $request->query('board_id'), ['class'=>'form-control', 'id'=>'inputBoardId']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">등록일</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_start') }}" name='trs'
                                       value='{{ $request->get('trs') }}'>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_end') }}" name='tre'
                                       value='{{ $request->get('tre') }}'>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                        <div class="col-sm-3">
                            {!! Form::select('sf', $search_fields, [], ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}"
                                   name='s' value='{{ $request->get('s') }}'>
                        </div>
                    </div>

                    <div class="form-group no-margin-bottom">
                        <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                        <div class="col-sm-4 col-sm-offset-3">
                            <button type="submit" class="btn btn-block btn-primary"><i
                                        class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row margin-bottom">

            <div class="col-md-12">

                <p class="form-control-static">
                    {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
                </p>

                <table class="table text-middle text-center">
                    <colgroup>
                        <col width="8%">
                        <col width="12%">
                        <col width="*">
                        <col width="10%">
                        <col width="8%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-center">게시판</th>
                        <th class="text-left">제목</th>
                        <th class="text-center">작성자</th>
                        <th class="text-center">상태</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">Remarks</th>
                    </tr>
                    </thead>

                    <tbody>

                    @unless(count($entrys) >0)
                        <tr>
                            <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                        </tr>
                    @endunless

                    @foreach($entrys as $n => $data)
                        <tr>

                            <td class="">
                                {{ $data->id }}
                            </td>

                            <td class="">
                                <a href="{{ route("board.edit", ['id'=> $data->board_id]) }}">{{ $data->board->title }}</a>
                            </td>


                            <td class="text-left">
                                {{ $data->subject }}
                            </td>


                            <td class="">
                                @if($data->user_id)
                                    <a href="{{ route("posting.index", ['user_id'=> $data->user_id]) }}">
                                        @endif

                                        {{ $data->name or '-' }}

                                        @if($data->user_id)
                                    </a>
                                @endif
                            </td>

                            <td class="">

                                @if($data->is_shown == 6)
                                    <span class="label label-primary">{{ $data->shown->display() }}</span>
                                @elseif($data->is_shown == 7)
                                    <span class="label label-warning">{{ $data->shown->display() }}</span>
                                @else
                                    <span class="label label-default">{{ $data->shown->display() }}</span>
                                @endif


                            </td>

                            <td class="">
                                {{ $data->created_at->format('m-d H:i') }}
                            </td>

                            <td>
                                <a href="{{ route('posting.edit', $data->id) }}" class="btn btn-default"
                                   data-tooltip="{pos:'top'}" title="수정">수정</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            page navigation
            {!! $entrys->render() !!}

        </div>

    </div>

    ---------------------------------------------------------------------------

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
                            <input type="hidden" name="sort" id="sort_val" value="">
                            <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ old('order_number') ? old('order_number') : 'asc' }}">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default {{ $board_id == '' ? 'active' : '' }}">
                                        {{ Form::radio('board_id', '', \App\Helpers\Helper::isCheckd('', $board_id), ['name' => 'board_id']) }}
                                        전체
                                    </label>
                                    <label class="btn btn-default {{ $board_id == 1 ? 'active' : '' }}">
                                        {{ Form::radio('board_id', 1, \App\Helpers\Helper::isCheckd(1, $board_id), ['name' => 'board_id']) }}
                                        공지사항
                                    </label>
                                    <label class="btn btn-default {{ $board_id == 2 ? 'active' : '' }}">
                                        {{ Form::radio('board_id', 2, \App\Helpers\Helper::isCheckd(2, $board_id), ['name' => 'board_id']) }}
                                        FAQ
                                    </label>
                                    <label class="btn btn-default {{ $board_id == 3 ? 'active' : '' }}">
                                        {{ Form::radio('board_id', 3, \App\Helpers\Helper::isCheckd(3, $board_id), ['name' => 'board_id']) }}
                                        1:1 문의
                                    </label>
                                    <label class="btn btn-default {{ $board_id == 4 ? 'active' : '' }}">
                                        {{ Form::radio('board_id', 4, \App\Helpers\Helper::isCheckd(4, $board_id), ['name' => 'board_id']) }}
                                        BCS 공지사항
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
                            <col width="*">
                            <col width="10%">
                            <col width="8%">
                            <col width="10%">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr class="active">
                            {{--<th class="text-center"><a class="sort" href="#" id="status"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> </a>--}}
                            {{--</th>--}}
                            <th class="text-center"><a class="sort" href="#" id="car_number"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 게시판</a></th>
                            <th class="text-center">제목</th>
                            <th class="text-center">작성자</th>
                            <th class="text-center">상태</th>
                            <th class="text-center"><a class="sort" href="#" id="created_at"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 등록일</a></th>
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
                                    '1' => 'primary',
                                    '2' => 'info',
                                    '3' => 'warning',
                                    '4' => 'default'
                                    ]])
                                        {{ $data->board_id }}
                                    @endcomponent
                                </td>

                                <td class="text-center">
                                    {{ $data->subject }}
                                </td>

                                <td class="text-center">
                                    {{ $data->name}}
                                </td>

                                {{--<td class="text-center">--}}
                                    {{--<a href="/user/{{  }}/edit">{{ $data->name}}</a>--}}
                                    {{--<br/>--}}
                                    {{--<small class="text-warning">{{ $data->orderer_mobile }}</small>--}}
                                {{--</td>--}}

                                <td class="text-center">
                                    <a href="/config/item/{{ $data->orderItem->item->id }}">{{ $data->orderItem->item->name }} <span class="text-muted">{{ number_format($data->orderItem->item->price) }}
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



@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
