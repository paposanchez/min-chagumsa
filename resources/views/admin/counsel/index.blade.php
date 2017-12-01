@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.counsel')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form">
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

                <table class="table text-middle text-center" style="table-layout:fixed;">
                    <colgroup>
                        <col width="8%">
                        <col width="8%">
                        <col width="12%">
                        <col width="10%">
                        <col width="*">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">상담번호</th>
                        <th class="text-center">작성자</th>
                        <th class="text-center">이메일</th>
                        <th class="text-center">휴대폰번호</th>
                        <th class="text-center">내용</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">답변상태</th>
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
                                {{ $data->name }}
                            </td>
                            <td class="">
                                {{ $data->email }}
                            </td>
                            <td class="">
                                {{ $data->mobile }}
                            </td>
                            <td class="" style="overflow: hidden;white-space:nowrap;text-overflow:ellipsis;">
                                {{ $data->content }}
                            </td>
                            <td class="">
                                {{ $data->created_at }}
                            </td>
                            <td class="">
                                @if($data->updated_at)
                                    <span style="width:60px;display:inline-block;" class="label label-success">답변 완료</span>
                                @else
                                    <span style="width:60px;display:inline-block;" class="label label-default">미답변</span>
                                @endif
                            </td>
                            <td class="">
                                <a href="{{ route('counsel.edit', $data->id) }}" class="btn btn-default" data-toggle="tooltip"
                                   title="상세보기">상세보기</a>
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

                @if($sf && $s)
                    {!! $entrys->appends([$sf => $s])->render() !!}
                @elseif($trs && $tre)
                    {!! $entrys->appends(['trs' => $trs, 'tre' => $tre])->render() !!}
                @elseif($trs)
                    {!! $entrys->appends(['trs' => $trs])->render() !!}
                @elseif($tre)
                    {!! $entrys->appends(['tre' => $tre])->render() !!}
                @else
                    {!! $entrys->render() !!}
                @endif
            </div>

        </div>

    </div>
@endsection



@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
