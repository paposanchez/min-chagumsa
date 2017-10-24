@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.user')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>
            </div>

            <div class="panel-body">

                <form  method="GET" class="form-horizontal no-margin-bottom" role="form">

                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                        <div class="col-sm-3">
                            {!! Form::select('sf', $search_fields, $sf, ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}" name='s' value='{{ $s }}'>
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
                        <col width="10%">
                        <col width="20%">
                        <col width="10%">
                        <col width="30%">
                        <col width="20%">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        {{--<th class="text-center">#</th>--}}
                        <th class="text-center">정비사 번호</th>
                        <th class="">이메일</th>
                        <th class="text-center">성명</th>
                        <th class="text-center">전화번호</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">처리</th>
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

                            <td class="text-left">
                                {{ $data->email }}
                            </td>

                            <td class="">
                                {{ $data->name }}
                            </td>

                            <td>
                                {{ $data->mobile }}
                            </td>

                            <td class="">
                                {{ isset($data->created_at) ? $data->created_at->format('Y.m.d')  : '-' }}
                            </td>

                            <td>
                                <a href="{{ route('bcs.user.edit', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="수정">수정</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>


        <div class="row">

            <div class="col-sm-6">

                <a href="{{ url('user/create') }}" class="btn btn-primary">등록</a>

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