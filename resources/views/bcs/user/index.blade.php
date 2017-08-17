@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
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
                        <label for="inputBoardId" class="control-label col-sm-3 text-center">검색조건</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="엔지니어 검색" >
                        </div>
                        <div>
                            <button class="btn btn-primary">검색</button>
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
                        <col width="20%" class="">
                        <col width="20%" class=" ">
                        <col width="10%">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="">이메일</th>
                        <th class="text-center">성명</th>
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

                            <td class="">
                                {{ isset($data->created_at) ? $data->created_at->format('Y.m.d')  : '-' }}
                            </td>

                            <td>
                                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="수정">수정</a>
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