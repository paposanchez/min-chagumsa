@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.certificate')])
@endsection

@section( 'content' )
<section id="content">
        <div class="container">
                <div class="block-header">
                        <h2>Table</h2>

                        <ul class="actions">
                                <li>
                                        <a href="">
                                                <i class="zmdi zmdi-trending-up"></i>
                                        </a>
                                </li>
                                <li>
                                        <a href="">
                                                <i class="zmdi zmdi-check-all"></i>
                                        </a>
                                </li>
                                <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                        <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                        <a href="">Manage Widgets</a>
                                                </li>
                                                <li>
                                                        <a href="">Widgets Settings</a>
                                                </li>
                                        </ul>
                                </li>
                        </ul>

                </div>

                <div class="card">
                        <div class="card-header">
                                <h2>Basic Table
                                        <small>Basic example without any additional modification classes</small>
                                </h2>
                        </div>

                        <div class="card-body">
                                <table class="table text-center">
                                        <colgroup>
                                            <col width="10%">
                                            <col width="*">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="10%">
                                        </colgroup>

                                        <thead>
                                        <tr class="active">
                                            <th class="text-center">#</th>
                                            <th class="text-center">게시판명</th>
                                            <th class="text-center">게시물수</th>
                                            <th class="text-center">사용여부</th>
                                            <th class="text-center">등록일</th>
                                            <th class="text-center">처리</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @unless(count($entrys) >0)
                                            <tr>
                                                <td colspan="5" class="no-result">{{ trans('common.no-result') }}</td>
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
                                                    <a href="{{ route("posting.index", ['board_id'=> $data->id]) }}">{{ $data->post_count() }}</a>
                                                </td>

                                                <td class="">
                                                    {{ $data->status->display() }}
                                                </td>

                                                <td class="">
                                                    {{ $data->created_at->format('Y.m.d') }}
                                                </td>


                                                <td>
                                                    <a href="{{ route('board.edit', $data->id) }}" class="btn btn-default"
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


@push( 'header-script' )
@endpush


@push( 'footer-script' )
@endpush
