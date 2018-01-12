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
                                    <h3>47,896,536</h3>
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
                                    <h3>47,896,536</h3>
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
                                    <h3>47,896,536</h3>
                                </div>
                            </div>
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
                                    <small>Percentage</small>
                                    <h2>99.87%</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-red">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small>Total Sales</small>
                                    <h2>$ 458,778</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-blue">
                            <div class="clearfix">
                                <div class="chart chart-pie stats-pie"></div>
                                <div class="count">
                                    <small>Percentage</small>
                                    <h2>99.87%</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mini-charts-item bgm-pink">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small>Website Traffics</small>
                                    <h2>987,459</h2>
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
            <div class="card">
                <div class="card-header">
                    <h2>Pie Chart</h2>

                    <ul class="actions">
                        <li class="dropdown action-show">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>

                            <div class="dropdown-menu pull-right">
                                <p class="p-20">
                                    You can put anything here
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card-body card-padding">
                    <div id="pie-chart" class="flot-chart-pie" style="padding: 0px; position: relative;"><canvas class="flot-base" width="416" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 416px; height: 300px;"></canvas><canvas class="flot-overlay" width="416" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 416px; height: 300px;"></canvas></div>
                    <div class="flc-pie hidden-xs"><table style="font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #F44336;overflow:hidden"></div></div></td><td class="legendLabel">Toyota</td><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #03A9F4;overflow:hidden"></div></div></td><td class="legendLabel">Nissan</td><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #8BC34A;overflow:hidden"></div></div></td><td class="legendLabel">Hyundai</td><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #FFEB3B;overflow:hidden"></div></div></td><td class="legendLabel">Scion</td><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #009688;overflow:hidden"></div></div></td><td class="legendLabel">Daihatsu</td></tr></tbody></table></div>
                </div>
            </div>
        </div>
    </section>

@endsection
