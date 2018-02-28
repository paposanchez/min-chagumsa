@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>코드 관리
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
                                    <col width="15%">
                                    <col width="25%">
                                    <col width="25%">
                                    <col width="*">
                                </colgroup>

                                <thead>
                                <tr class="active">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">GROUP</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">Display</th>
                                </tr>
                                </thead>

                                <tbody>

                                @unless(count($entrys) >0)
                                    <tr>
                                        <td colspan="4" class="no-result">{{ trans('common.no-result') }}</td>
                                    </tr>
                                @endunless

                                @foreach($entrys as $n => $data)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td class="">
                                            {{ $data->group }}
                                        </td>

                                        <td>
                                            {{ $data->name }}
                                        </td>

                                        <td>
                                            {{ trans('code.'.$data->group.'.'.$data->name) }}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--page navigation--}}
                            {!! $entrys->render() !!}
                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal" role="form" id="searchFormCollapse">

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


@push( 'footer-script' )
    <script type="text/javascript">

    </script>
@endpush
