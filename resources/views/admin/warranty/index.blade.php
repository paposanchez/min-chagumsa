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
                                                <col width="15%">
                                                <col width="20%">
                                                <col width="12%">
                                                <col width="12%">
                                                <col width="12%">
                                                <col width="*">
                                        </colgroup>

                                        <thead>
                                                <tr class="active">
                                                        <th class="text-center">상태</th>
                                                        <th class="text-center">주문번호</th>
                                                        <th class="text-center">BCS</th>
                                                        <th class="text-center">기술사</th>
                                                        <th class="text-center">발급일</th>
                                                        <th class="text-center">만료일</th>
                                                        <th class="text-center">Remarks</th>

                                                </tr>
                                        </thead>

                                        <tbody>


                                                @unless(count($entrys) >0)
                                                <tr>
                                                        <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                                                </tr>
                                                @endunless

                                                @foreach($entrys as $data)

                                                <tr>

                                                        <td>
                                                                @component('components.badge', [
                                                                'code' => $data->status_cd,
                                                                'color' =>[
                                                                        '108' => 'info',
                                                                        '109' => 'success'
                                                                ]])
                                                                {{ $data->status->display() }}
                                                                @endcomponent

                                                        </td>

                                                        <td class="text-center">
                                                                {{ $data->getOrderNumber() }}
                                                                <br/>
                                                                <small class="text-warning">{{ $data->id }}</small>
                                                        </td>

                                                        <td class="">
                                                                <a href="/user/{{ $data->engineer_id }}/edit">{{ $data->engineer->name }}</a>
                                                                <br/>
                                                                <small class="text-warning">{{ $data->engineer->mobile }}</small>
                                                        </td>


                                                        <td class="">
                                                                @if($data->technician)
                                                                <a href="/user/{{ $data->technician->id }}/edit">{{ $data->technician->name }}</a>
                                                                <br/>
                                                                <small class="text-warning">{{ $data->technician->mobile }}</small>
                                                                @else
                                                                -
                                                                @endif
                                                        </td>

                                                        <td>{{ $data->status_cd == 109 ? $data->certificates->updated_at->format('m-d H:i') : '-' }}</td>

                                                        <td>
                                                                {{ $data->status_cd == 109 ? $data->certificates->getExpireDate()->format('Y-m-d H:i') : '-'  }}

                                                                @if($data->status_cd == 109)
                                                                <br/>
                                                                @if($data->certificates->isExpired())
                                                                <small class="text-muted">만료됨</small>
                                                                @else
                                                                <small class="text-warning">
                                                                        {{ number_format($data->certificates->getCountdown()) }}일 남음
                                                                </small>
                                                                @endif
                                                                @endif

                                                        </td>


                                                        <td class="text-right">
                                                                @if($data->status_cd > 107)
                                                                <a href="/certificate/{{ $data->id }}" target="_blank" class="btn btn-info" data-toggle="tooltip" title="인증서 미리보기"><i class="zmdi zmdi-search-in-page"></i></a>
                                                                @endif

                                                                @if($data->status_cd == 107)
                                                                <button data-id="{{ $data->id }}" class="btn btn-danger certificate-assign" data-toggle="tooltip" title="인증서 발급시작">시작</button>
                                                                @endif


                                                                @if($data->status_cd == 108)
                                                                <a href="/certificate/{{ $data->id }}/edit" class="btn btn-warning" data-toggle="tooltip" title="인증서 발급정보 수정">수정</a>
                                                                @endif

                                                                <a href="/order/{{ $data->id }}" class="btn btn-default" data-toggle="tooltip" title="상세보기">상세보기</a>

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
