@extends( 'admin.layouts.default' )

@section( 'content' )
<section id="content">
        <div class="container">

                <div class="row">

                        <div class="col-sm-7">

                                @if($user->hasRole(['admin']))
                                <div class="card">
                                        <div class="card-header  ch-alt">
                                                <h2>최근 30일간 주문관리내역</h2>
                                        </div>
                                        <div class="card-body card-padding">
                                                <div id="current-monthly-order" class="flot-chart"></div>
                                                <div class="flc-visits"></div>
                                        </div>
                                </div>
                                @endif

                                @if($user->hasRole(['admin', 'garage']))
                                <div class="card">
                                        <div class="card-header  ch-alt">
                                                <h2>최근 30일간 진단관리내역</h2>
                                        </div>
                                        <div class="card-body card-padding">
                                                <div id="current-monthly-diagnosis" class="flot-chart"></div>
                                                <div class="flc-visits"></div>
                                        </div>
                                </div>
                                @endif

                                @if($user->hasRole(['admin', 'technician']))
                                <div class="card">
                                        <div class="card-header  ch-alt">
                                                <h2>최근 30일간 평가관리내역</h2>
                                        </div>
                                        <div class="card-body card-padding">
                                                <div id="current-monthly-certificate" class="flot-chart"></div>
                                                <div class="flc-visits"></div>
                                        </div>
                                </div>
                                @endif
                                @if($user->hasRole(['admin','insurer']))
                                <div class="card">
                                        <div class="card-header  ch-alt">
                                                <h2>최근 30일간 보증관리내역</h2>
                                        </div>
                                        <div class="card-body card-padding">
                                                <div id="current-monthly-warranty" class="flot-chart"></div>
                                                <div class="flc-visits"></div>
                                        </div>
                                </div>
                                @endif

                        </div>

                        <div class="col-sm-5">
                                <div class="card">
                                        <div class="card-header  ch-alt">
                                                <h2>
                                                        @if($user->hasRole('admin'))
                                                        최근 1:1 문의
                                                        @else
                                                        최근 공지사항
                                                        @endif
                                                </h2>
                                        </div>
                                        <div class="card-body">
                                                <table class="table">
                                                        <colgroup>
                                                                <col width="8%">
                                                                <col width="*">
                                                        </colgroup>

                                                        <tbody>
                                                                @unless(count($posts) >0)
                                                                <tr>
                                                                        <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                                                                </tr>
                                                                @endunless

                                                                @foreach($posts as $data)
                                                                <tr>
                                                                        <td class="text-center">
                                                                                @component('components.badge', [
                                                                                'code' => $data->is_answered,
                                                                                'color' =>[
                                                                                '1' => 'success',
                                                                                '0' => 'default'
                                                                                ]])
                                                                                {{ $data->is_answered == 1 ? '답변완료' : '미답변' }}
                                                                                @endcomponent
                                                                        </td>
                                                                        <td>
                                                                                <a href="">{{ $data->subject }}</a>
                                                                        </td>

                                                                        @endforeach
                                                                </tbody>
                                                        </table>

                                                </div>
                                        </div>
                                </div>

                        </div>

                </div>

        </section>

        @endsection

        @push( 'footer-script' )
        <script type="text/javascript">

        $(document).ready(function () {

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/dashboard/get-diagnosis-chart',
                        success: function (response) {
                                var options = {
                                        series: {
                                                stack: 0,
                                                lines: {show: false, steps: false},
                                                bars: {show: true, barWidth: 0.9, align: 'center'}
                                        },
                                        xaxis: {
                                                ticks: response.ticks
                                        },
                                };

                                $.plot($("#current-monthly-diagnosis"), response.data, options);
                        },
                        error: function (response) {
                                alert(JSON.stringify(response));
                        }
                });

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/dashboard/get-order-chart',
                        success: function (response) {
                                var options = {
                                        series: {
                                                stack: 0,
                                                lines: {show: false, steps: false},
                                                bars: {show: true, barWidth: 0.9, align: 'center'}
                                        },
                                        xaxis: {
                                                ticks: response.ticks
                                        },
                                };

                                $.plot($("#current-monthly-order"), response.data, options);
                        },
                        error: function (response) {
                                alert(JSON.stringify(response));
                        }
                });

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/dashboard/get-certificate-chart',
                        success: function (response) {
                                var options = {
                                        series: {
                                                stack: 0,
                                                lines: {show: false, steps: false},
                                                bars: {show: true, barWidth: 0.9, align: 'center'}
                                        },
                                        xaxis: {
                                                ticks: response.ticks
                                        },
                                };

                                $.plot($("#current-monthly-certificate"), response.data, options);
                        },
                        error: function (response) {
                                alert(JSON.stringify(response));
                        }
                });

                $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/dashboard/get-warranty-chart',
                        success: function (response) {
                                var options = {
                                        series: {
                                                stack: 0,
                                                lines: {show: false, steps: false},
                                                bars: {show: true, barWidth: 0.9, align: 'center'}
                                        },
                                        xaxis: {
                                                ticks: response.ticks
                                        },
                                };

                                $.plot($("#current-monthly-warranty"), response.data, options);
                        },
                        error: function (response) {
                                alert(JSON.stringify(response));
                        }
                });
        });
        </script>
        @endpush
