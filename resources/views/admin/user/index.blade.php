@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
    <section id="content">

        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h2>Basic Table
                        <small>Basic example without any additional modification classes</small>
                    </h2>
                </div>


                <div class="card-body">
                    <table class="table">
                        <colgroup>
                            <col width="8%">
                            <col width="*">
                            <col width="15%">
                            <col width="8%">
                            <col width="8%">
                            <col width="10%">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr class="active">
                            <th class="text-center">#</th>
                            <th class="text-center">이메일</th>
                            <th class="text-center">이름</th>
                            <th class="text-center">역할</th>
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

                                <td class="text-center">
                                    {{ $data->id }}
                                </td>

                                <td class="text-center">
                                    {{ $data->email }}
                                </td>

                                <td class="text-center">
                                    {{ $data->name }}
                                    <br/>
                                    <small class="text-warning">{{ $data->mobile ? $data->mobile : '-' }}</small>
                                </td>

                                <td class="text-center">
                                    <span class="label label-default">{!! $data->roles->implode('display_name', '</span> <span class="label label-default">') !!}</span>
                                </td>

                                <td class="text-center">
                                    <span class="label label-info">{{ $data->status->display() }}</span>
                                </td>

                                <td class="text-center">
                                    {{ $data->created_at }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('user.edit', $data->id) }}" class="btn btn-default"
                                       data-tooltip="{pos:'top'}" title="수정">수정</a>
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
