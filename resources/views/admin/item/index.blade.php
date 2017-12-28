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

                                                <col width="8%">
                                                <col width="*">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="8%">
                                                <col width="10%">

                                        </colgroup>

                                        <thead>
                                                <tr class="active">
                                                        <th class="text-center">#</th>
                                                        <th class="text-left">상품명</th>
                                                        <th class="text-center">가격</th>
                                                        <th class="text-center">PG 수수료율</th>
                                                        <th class="text-center">보증료</th>
                                                        <th class="text-center">공임비용</th>
                                                        <th class="text-center">얼라이언스 Com</th>
                                                        <th class="text-center">기술사 Com</th>
                                                        <th class="text-center">수익</th>
                                                        <th class="text-center">Remarks</th>
                                                </tr>
                                        </thead>

                                        <tbody>

                                                @unless(count($entrys)>0)
                                                <tr>
                                                        <td colspan="10" class="no-result">{{ trans('common.no-result') }}</td>
                                                </tr>
                                                @endunless

                                                @foreach($entrys as $data)
                                                <tr>
                                                        <td class=""><a href="/item/{{ $data->id }}/show">{{ $data->id }}</a></td>
                                                        <td class="text-left">{{ $data->name}}</td>
                                                        <td class=""><i class="fa fa-won"></i>{{ number_format($data->price) }}</td>
                                                        <td class="">{{ $data->commission}}%</td>
                                                        <td class=""><i class="fa fa-won"></i>{{ number_format($data->guarantee) }}</td>
                                                        <td class=""><i class="fa fa-won"></i>{{ number_format($data->wage) }}</td>

                                                        <td class="">{{ $data->alliance_ratio }}%</td>
                                                        <td class="">{{ $data->certi_ratio }}%</td>
                                                        <td class="">{{ $data->self_ratio }}%</td>

                                                        <td>
                                                                <a href="{{ route('item.show', ['id' => $data->id]) }}" class="btn btn-default">상세보기</a>
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
