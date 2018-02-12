@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>코드 관리
                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                    </h2>
                </div>

                <div class="card-body">
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

                </div>

                {{--page navigation--}}
                {!! $entrys->render() !!}

            </div>


        </div>
    </section>
@endsection


@push( 'footer-script' )
    <script type="text/javascript">

    </script>
@endpush
