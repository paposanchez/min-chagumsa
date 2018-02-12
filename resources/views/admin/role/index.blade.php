@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <a href="{{ route('role.create') }}" class="btn btn-float btn-primary m-btn"><i class="zmdi zmdi-plus"></i></a>
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>역할 관리
                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                    </h2>
                </div>

                <div class="card-body">
                    <table class="table text-center">
                        <colgroup>
                            <col width="10%">
                            <col width="20%" class="">
                            <col width="*" class=" ">
                            <col width="10%" class="">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>

                        <thead>
                        <tr class="active">
                            <th class="text-center">#</th>
                            <th class="text-center">{{ trans('admin/role.name') }}</th>
                            <th class="text-center">역할표현명</th>
                            <th class="">{{ trans('admin/role.description') }}</th>
                            <th class="text-center">{{ trans('admin/role.created_at') }}</th>
                            <th class="text-center">{{ trans('admin/role.action') }}</th>
                        </tr>
                        </thead>


                        <tbody>

                        @unless(count($entrys) >0)
                            <tr>
                                <td colspan="5" class="no-result">{{ trans('common.no-result') }}</td>
                            </tr>
                        @endunless

                        @foreach ($entrys as $key => $data)
                            <tr>
                                <td>{{ $data->id }}</td>

                                <td>{{ $data->name }}</td>

                                <td>{{ $data->display_name }}</td>

                                <td class="text-left">{{ $data->description }}</td>

                                <td>{{ isset($data->created_at)? $data->created_at->format('Y.m.d'): '-' }}</td>

                                <td>
                                    <a href="{{ route('role.edit', $data->id) }}" class="btn btn-default"
                                       data-tooltip="{pos:'top'}"
                                       title="{{ trans('common.button.edit') }}">{{ trans('common.button.edit') }}</a>
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


@push( 'header-script' )
@endpush


@push( 'footer-script' )
@endpush
