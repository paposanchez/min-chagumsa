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

            <div class="mini-charts">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-teal">
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
                        <div class="mini-charts-item bgm-red">
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
                        <div class="mini-charts-item bgm-blue">
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
                        <div class="mini-charts-item bgm-pink">
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
                    <div class="epc-item bgm-pink">
                        <div class="easy-pie main-pie" data-percent="45">
                            <div class="percent">45</div>
                            <div class="pie-title">Total Emails Sent</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-orange">
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
                    <div class="epc-item bgm-purple">
                        <div class="easy-pie main-pie" data-percent="89">
                            <div class="percent">89</div>
                            <div class="pie-title">Profit Rate</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mini-charts">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-teal">
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
                        <div class="mini-charts-item bgm-red">
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
                        <div class="mini-charts-item bgm-blue">
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
                        <div class="mini-charts-item bgm-pink">
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
                    <div class="epc-item bgm-pink">
                        <div class="easy-pie main-pie" data-percent="45">
                            <div class="percent">45</div>
                            <div class="pie-title">Total Emails Sent</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="epc-item bgm-orange">
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
                    <div class="epc-item bgm-purple">
                        <div class="easy-pie main-pie" data-percent="89">
                            <div class="percent">89</div>
                            <div class="pie-title">Profit Rate</div>
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
