@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.post')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <div class="panel panel-default">

                <div class="panel-heading">
                        <span class="panel-title">검색조건</span>

                        {{--<div class="panel-heading-controls">--}}

                                {{--<div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">--}}
                                        {{--<label>--}}
                                                {{--<input type="checkbox" >--}}
                                                {{--<span></span>--}}
                                                {{--</label>--}}
                                                {{--</div>--}}

                                                {{--</div>--}}

                                        </div>

                                        <div class="panel-body">

                                                <form  method="GET" class="form-horizontal no-margin-bottom" role="form">

                                                        <div class="form-group">
                                                                <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/post.board_id') }}</label>
                                                                <div class="col-sm-3">
                                                                        {!! Form::select('board_id', [null=>trans('common.search.first_select')] + $board_list, $request->query('board_id'), ['class'=>'form-control', 'id'=>'inputBoardId']) !!}
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">{{ trans('common.search.period') }}</label>

                                                                <div class="col-sm-3">
                                                                        <div class="input-group">
                                                                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                                                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_start') }}" name='trs' value='{{ $request->get('trs') }}'>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="input-group">
                                                                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                                                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" placeholder="{{ trans('common.search.period_end') }}" name='tre' value='{{ $request->get('tre') }}'>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                                                                <div class="col-sm-3">
                                                                        {!! Form::select('sf', $search_fields, [], ['class'=>'form-control']) !!}

                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}" name='s' value='{{ $request->get('s') }}'>
                                                                </div>
                                                        </div>

                                                        <div class="form-group no-margin-bottom">
                                                                <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                                                                <div class="col-sm-4 col-sm-offset-3">
                                                                        <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
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
                                                                <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                                                                @endunless

                                                                @foreach($entrys as $n => $data)
                                                                <tr>

                                                                        <td class="">
                                                                                {{ $data->id }}
                                                                        </td>

                                                                        <td class="">
                                                                                <a href="{{ route("board.edit", ['id'=> $data->board_id]) }}">{{ \App\Helpers\Helper::getBoard($data->board_id)->name }}</a>
                                                                        </td>


                                                                        <td class="text-left">
                                                                                {{ $data->subject }}
                                                                        </td>


                                                                        <td class="">
                                                                                @if($data->user_id)
                                                                                <a href="{{ route("post.index", ['user_id'=> $data->user_id]) }}">
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
                                                                                <a href="{{ route('post.edit', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="수정">수정</a>
                                                                        </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                </table>

                                        </div>

                                </div>


                                <div class="row">

                                        <div class="col-sm-6">

                                                <a href="{{ route('post.create') }}" class="btn btn-primary">등록</a>

                                        </div>

                                        <div class="col-sm-6 text-right">
                                                {!! $entrys->render() !!}
                                        </div>

                                </div>

                        </div>
                        @endsection



                        @section( 'footer-script' )
                        <script type="text/javascript">

                        </script>
                        @endsection
