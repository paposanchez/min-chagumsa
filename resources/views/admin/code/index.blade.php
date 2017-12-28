@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
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
