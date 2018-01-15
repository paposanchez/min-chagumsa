@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">

        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2>로스팅 관리
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
                            <input type="hidden" name="sort_orderby" id="sort_orderby"
                                   value="{{ old('order_number') ? old('order_number') : 'asc' }}">
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
                            <th class="text-center"><a class="sort" href="#" id="board_id"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 게시판</a></th>
                            <th class="text-center">제목</th>
                            <th class="text-center">작성자명</th>
                            <th class="text-center">상태</th>
                            <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 등록일</a></th>
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
                            @if($data->roles)
                                @if(count(\GuzzleHttp\json_decode($data->roles, true)) > count(array_diff($user_roles, \GuzzleHttp\json_decode($data->roles, true))))
                                    <tr>
                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->board_id,
                                            'color' =>[
                                            '1' => 'primary',
                                            '2' => 'info',
                                            '3' => 'success',
                                            '4' => 'info',
                                            '5' => 'warning',
                                            '6' => 'default'
                                            ]])
                                                {{ $data->board->name }}
                                            @endcomponent
                                        </td>

                                        <td class="text-center">
                                            {{ $data->subject }}
                                        </td>

                                        <td class="text-center">
                                            {{ $data->name}}
                                        </td>

                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->is_shown,
                                            'color' =>[
                                            '5' => 'success',
                                            '6' => 'warning',
                                            '7' => 'danger',
                                            ]])
                                                {{ $data->shown->display() }}
                                            @endcomponent

                                        </td>

                                        <td class="text-center">
                                            {{ $data->created_at->format('m-d H:i') }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route("posting.edit", [$data->id]) }}" class="btn btn-default"
                                               data-toggle="tooltip" title="주문상세보기">상세보기</a>
                                        </td>
                                    </tr>
                                {{--@else--}}
                                    {{--<tr>--}}
                                        {{--<td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>--}}
                                    {{--</tr>--}}
                                @endif
                            @else
                                <tr>
                                    <td class="text-center">
                                        @component('components.badge', [
                                        'code' => $data->board_id,
                                        'color' =>[
                                        '1' => 'primary',
                                        '2' => 'info',
                                        '3' => 'success',
                                        '4' => 'info',
                                        '5' => 'warning',
                                        '6' => 'default'
                                        ]])
                                            {{ $data->board->name }}
                                        @endcomponent
                                    </td>

                                    <td class="text-center">
                                        {{ $data->subject }}
                                    </td>

                                    <td class="text-center">
                                        {{ $data->name}}
                                    </td>

                                    <td class="text-center">
                                        @component('components.badge', [
                                        'code' => $data->is_shown,
                                        'color' =>[
                                        '5' => 'success',
                                        '6' => 'warning',
                                        '7' => 'danger',
                                        ]])
                                            {{ $data->shown->display() }}
                                        @endcomponent

                                    </td>

                                    <td class="text-center">
                                        {{ $data->created_at->format('m-d H:i') }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route("posting.edit", [$data->id]) }}" class="btn btn-default"
                                           data-toggle="tooltip" title="주문상세보기">상세보기</a>
                                    </td>
                                </tr>
                            @endif
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
