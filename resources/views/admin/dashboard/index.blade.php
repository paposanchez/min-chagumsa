@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div id="site-visits" class="dw-item bgm-teal" style="min-height: 260px;">
                <div class="dwi-header">
                    <div class="p-30">
                        <div class="dash-widget-visits"></div>
                    </div>

                    <div class="dwih-title">최근 30일간 주문 수량</div>
                </div>

                <div class="dash-widgets">
                    <div class="row" style="margin: 0 0 0 0">
                        <div class="col-md-4 col-sm-6">
                            <div class="list-group-item media sv-item">
                                <div class="pull-right">
                                    <div class="stats-bar"></div>
                                </div>
                                <div class="media-body">
                                    <small>총 주문 개수</small>
                                    <h3>{{ count($total_order) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="list-group-item media sv-item">
                                <div class="pull-right">
                                    <div class="stats-bar"></div>
                                </div>
                                <div class="media-body">
                                    <small>신규 주문 개수</small>
                                    <h3>{{ count($today_order) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="list-group-item media sv-item">
                                <div class="pull-right">
                                    <div class="stats-bar"></div>
                                </div>
                                <div class="media-body">
                                    <small>취소 주문 개수</small>
                                    <h3>{{ count($cancel_order) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 진단 --}}
            <div class="mini-charts">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-green">
                            <div class="clearfix">
                                <div class="chart chart-pie stats-pie"></div>
                                <div class="count">
                                    <small>총진단</small>
                                    <h2>{{ $total_diagnosis }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-green">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small>신규진단</small>
                                    <h2>{{ $today_diagnosis }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-green">
                            <div class="clearfix">
                                <div class="chart chart-pie stats-pie"></div>
                                <div class="count">
                                    <small>검토전</small>
                                    <h2>{{ $ready_diagnosis }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-green">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small>발급완료</small>
                                    <h2>{{ $completed_diagnosis }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="epc-item bgm-green">
                        <div class="easy-pie main-pie" data-percent="45">
                            <div class="percent">45</div>
                            <div class="pie-title">Total Emails Sent</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-green">
                        <div class="easy-pie main-pie" data-percent="88">
                            <div class="percent">88</div>
                            <div class="pie-title">Sold Items</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-green">
                        <div class="easy-pie main-pie" data-percent="25">
                            <div class="percent">25</div>
                            <div class="pie-title">Spam Mails</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-green">
                        <div class="easy-pie main-pie" data-percent="89">
                            <div class="percent">89</div>
                            <div class="pie-title">Profit Rate</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 평가 --}}
            <div class="mini-charts">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-blue">
                            <div class="clearfix">
                                <div class="chart chart-pie stats-pie"></div>
                                <div class="count">
                                    <small>총진단</small>
                                    <h2>{{ $total_certificate }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-blue">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small>신규진단</small>
                                    <h2>{{ $today_certificate }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-blue">
                            <div class="clearfix">
                                <div class="chart chart-pie stats-pie"></div>
                                <div class="count">
                                    <small>검토전</small>
                                    <h2>{{ $ready_certificate }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-blue">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small>발급완료</small>
                                    <h2>{{ $completed_certificate }} 건</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="epc-item bgm-blue">
                        <div class="easy-pie main-pie" data-percent="45">
                            <div class="percent">45</div>
                            <div class="pie-title">Total Emails Sent</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-blue">
                        <div class="easy-pie main-pie" data-percent="88">
                            <div class="percent">88</div>
                            <div class="pie-title">Sold Items</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-blue">
                        <div class="easy-pie main-pie" data-percent="25">
                            <div class="percent">25</div>
                            <div class="pie-title">Spam Mails</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-blue">
                        <div class="easy-pie main-pie" data-percent="89">
                            <div class="percent">89</div>
                            <div class="pie-title">Profit Rate</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h2>
                        @if($user->hasRole('admin'))
                            최근 1:1 문의
                        @else
                            최근 공지사항
                        @endif
                    </h2>

                    <ul class="actions">
                        <li>
                            <a href="#collapseExample" class=" waves-effect" type="button" data-toggle="collapse"
                               aria-expanded="false" aria-controls="collapseExample">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table">
                        <colgroup>
                            <col width="8%">
                            <col width="*">
                            <col width="10%">
                            <col width="8%">
                            <col width="10%">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr class="active">
                            {{--<th class="text-center"><a class="sort" href="#" id="status"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> </a>--}}
                            {{--</th>--}}
                            <th class="text-center"><a class="sort" href="#" id="board_id"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 게시판</a></th>
                            <th class="text-center">제목</th>
                            <th class="text-center">작성자명</th>
                            <th class="text-center">상태</th>
                            <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 등록일</a></th>
                            <th class="text-center">Remarks</th>
                        </tr>
                        </thead>

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
                                    'code' => $data->board_id,
                                    'color' =>[
                                    '1' => 'primary',
                                    '2' => 'info',
                                    '3' => 'success',
                                    '4' => 'info',
                                    '5' => 'warning',
                                    '6' => 'default'
                                    ]])
                                        {{ $data->board->name }}
                                    @endcomponent
                                </td>

                                <td class="text-center">
                                    {{ $data->subject }}
                                </td>

                                <td class="text-center">
                                    {{ $data->name}}
                                </td>

                                <td class="text-center">
                                    @component('components.badge', [
                                    'code' => $data->is_shown,
                                    'color' =>[
                                    '5' => 'success',
                                    '6' => 'warning',
                                    '7' => 'danger',
                                    ]])
                                        {{ $data->shown->display() }}
                                    @endcomponent

                                </td>

                                <td class="text-center">
                                    {{ $data->created_at->format('m-d H:i') }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route("posting.edit", [$data->id]) }}" class="btn btn-default"
                                       data-toggle="tooltip" title="주문상세보기">상세보기</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </section>

@endsection

@push( 'footer-script' )
    <script type="text/javascript">
        $(document).ready(function () {
            function sparklineLine(id, values, width, height, lineColor, fillColor, lineWidth, maxSpotColor, minSpotColor, spotColor, spotRadius, hSpotColor, hLineColor) {
                $('.' + id).sparkline(values, {
                    type: 'line',
                    width: width,
                    height: height,
                    lineColor: lineColor,
                    fillColor: fillColor,
                    lineWidth: lineWidth,
                    maxSpotColor: maxSpotColor,
                    minSpotColor: minSpotColor,
                    spotColor: spotColor,
                    spotRadius: spotRadius,
                    highlightSpotColor: hSpotColor,
                    highlightLineColor: hLineColor
                });
            }

            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/dashboard/get-json',
                data: {
                    count: 30
                },
                success: function (data) {

                    sparklineLine('dash-widget-visits', data, '100%', '70px', 'rgba(255,255,255,0.7)', 'rgba(0,0,0,0)', 2, '#fff', '#fff', '#fff', 5, 'rgba(255,255,255,0.4)', 'rgba(255,255,255,0.1)');
                },
                error: function (data) {
                    alert(JSON.stringify(data));
                }
            })
        });

    </script>
@endpush
