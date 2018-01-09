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

<<<<<<< HEAD
                <!-- Add button -->
                <button class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></button>

                <div class="card">
                        <div class="action-header clearfix">
                                <div class="ah-label hidden-xs">Some text here</div>

                                <div class="ah-search">
                                        <input type="text" placeholder="Start typing..." class="ahs-input">

                                        <i class="ahs-close" data-ma-action="action-header-close">&times;</i>
                                </div>

                                <ul class="actions">
                                        <li>
                                                <a href="" data-ma-action="action-header-open">
                                                        <i class="zmdi zmdi-search"></i>
                                                </a>
                                        </li>

                                        <li>
                                                <a href="">
                                                        <i class="zmdi zmdi-time"></i>
                                                </a>
                                        </li>
                                        <li class="dropdown">
                                                <a href="" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="zmdi zmdi-sort"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                                <a href="">Last Modified</a>
                                                        </li>
                                                        <li>
                                                                <a href="">Last Edited</a>
                                                        </li>
                                                        <li>
                                                                <a href="">Name</a>
                                                        </li>
                                                        <li>
                                                                <a href="">Date</a>
                                                        </li>
                                                </ul>
                                        </li>
                                        <li>
                                                <a href="">
                                                        <i class="zmdi zmdi-info"></i>
                                                </a>
                                        </li>
                                </ul>
                        </div>

                        <div class="card-body card-padding">

                                <div class="contacts clearfix row">

                                        @foreach($entrys as $entry)
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                                <div class="c-item">
                                                        <a href="{{ route('user.edit', ['id'=>$entry->id]) }}" class="ci-avatar">

                                                                {!! Html::image('/avatar/'.$entry->id) !!}
                                                        </a>

                                                        <div class="c-info">
                                                                <strong>{{ $entry->name }}</strong>
                                                                <small>{{ $entry->email }}</small>
                                                        </div>

                                                        <div class="c-footer">
                                                                <div class="text-center">{{ $entry->status->display() }}</div>
                                                        </div>
                                                </div>
                                        </div>
                                        @endforeach

                                </div>

                                <div class="load-more">
                                        <a href=""><i class="zmdi zmdi-refresh-alt"></i> Load More...</a>
                                </div>
                        </div>
=======
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
>>>>>>> origin/migration
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
