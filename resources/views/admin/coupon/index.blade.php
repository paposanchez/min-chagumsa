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

                                                <col width="12%">
                                                <col width="12%">
                                                <col width="*">
                                                <col width="12%">
                                                <col width="12%">
                                                <col width="12%">
                                        </colgroup>

                                        <thead>
                                                <tr class="active">
                                                        <th>#</th>
                                                        <th class="text-left">쿠폰종류</th>
                                                        <th class="text-left">쿠폰번호</th>
                                                        <th class="">사용자</th>
                                                        <th class="">등록일</th>
                                                        <th class="">사용일</th>
                                                </tr>
                                        </thead>

                                        <tbody>

                                                @unless($entrys)
                                                <tr>
                                                        <td colspan="6" class="no-result">발행된 쿠폰이 없습니다.</td>
                                                </tr>
                                                @endunless

                                                @foreach($entrys as $data)
                                                <tr>
                                                        <td class="">{{ $data->id }}</td>
                                                        <td class="text-left">{{ $data->coupon_kind}}</td>
                                                        <td class="text-left">{{ $data->coupon_number }}</td>
                                                        <td class="">{{ $data->user ? $data->user->name : '' }}</td>
                                                        <td class="">{{ $data->created_at }}</td>
                                                        <td class="">{{ $data->updated_at }}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
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
