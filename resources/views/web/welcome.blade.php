@extends( 'web.layouts.default' )

@section( 'content' )

{{-- 본문메인 배너 --}}
@include( 'web.partials.hometainer' )

<section id="content" class="content-alt m-t-25">

        <div class="container">

                <div class="card">
                        <div class="card-header">
                                <h2>Sales Statistics <small>Vestibulum purus quam scelerisque, mollis nonummy metus</small></h2>

                                <ul class="actions">
                                        <li>
                                                <a href="">
                                                        <i class="zmdi zmdi-refresh-alt"></i>
                                                </a>
                                        </li>
                                        <li>
                                                <a href="">
                                                        <i class="zmdi zmdi-download"></i>
                                                </a>
                                        </li>
                                        <li class="dropdown">
                                                <a href="" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                                <a href="">Change Date Range</a>
                                                        </li>
                                                        <li>
                                                                <a href="">Change Graph Type</a>
                                                        </li>
                                                        <li>
                                                                <a href="">Other Settings</a>
                                                        </li>
                                                </ul>
                                        </li>
                                </ul>
                        </div>

                        <div class="card-body">
                                <div class="chart-edge">
                                        <div id="curved-line-chart" class="flot-chart "></div>
                                </div>
                        </div>
                </div>

                <div class="mini-charts">
                        <div class="row">
                                <div class="col-sm-6 col-md-3">
                                        <div class="mini-charts-item bgm-lightgreen">
                                                <div class="clearfix">
                                                        <div class="chart stats-bar"></div>
                                                        <div class="count">
                                                                <small>Website Traffics</small>
                                                                <h2>987,459</h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                        <div class="mini-charts-item bgm-purple">
                                                <div class="clearfix">
                                                        <div class="chart stats-bar-2"></div>
                                                        <div class="count">
                                                                <small>Website Impressions</small>
                                                                <h2>356,785K</h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                        <div class="mini-charts-item bgm-orange">
                                                <div class="clearfix">
                                                        <div class="chart stats-line"></div>
                                                        <div class="count">
                                                                <small>Total Sales</small>
                                                                <h2>$ 458,778</h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                        <div class="mini-charts-item bgm-bluegray">
                                                <div class="clearfix">
                                                        <div class="chart stats-line-2"></div>
                                                        <div class="count">
                                                                <small>Support Tickets</small>
                                                                <h2>23,856</h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="dash-widgets">
                        <div class="row">
                                <div class="col-md-4 col-sm-6">
                                        <div id="site-visits" class="dw-item bgm-teal">
                                                <div class="dwi-header">
                                                        <div class="p-30">
                                                                <div class="dash-widget-visits"></div>
                                                        </div>

                                                        <div class="dwih-title">For the past 30 days</div>
                                                </div>

                                                <div class="list-group lg-even-white">
                                                        <div class="list-group-item media sv-item">
                                                                <div class="pull-right">
                                                                        <div class="stats-bar"></div>
                                                                </div>
                                                                <div class="media-body">
                                                                        <small>Page Views</small>
                                                                        <h3>47,896,536</h3>
                                                                </div>
                                                        </div>

                                                        <div class="list-group-item media sv-item">
                                                                <div class="pull-right">
                                                                        <div class="stats-bar-2"></div>
                                                                </div>
                                                                <div class="media-body">
                                                                        <small>Site Visitors</small>
                                                                        <h3>24,456,799</h3>
                                                                </div>
                                                        </div>

                                                        <div class="list-group-item media sv-item">
                                                                <div class="pull-right">
                                                                        <div class="stats-line"></div>
                                                                </div>
                                                                <div class="media-body">
                                                                        <small>Total Clicks</small>
                                                                        <h3>13,965</h3>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                        <div id="pie-charts" class="dw-item bgm-cyan c-white">
                                                <div class="">
                                                        <div class="dwi-header">
                                                                <div class="dwih-title">Email Statistics</div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="text-center p-20 m-t-25">
                                                                <div class="easy-pie main-pie" data-percent="75">
                                                                        <div class="percent">45</div>
                                                                        <div class="pie-title">Total Emails Sent</div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="p-t-15 p-b-20 text-center">
                                                        <div class="easy-pie sub-pie-1" data-percent="56">
                                                                <div class="percent">56</div>
                                                                <div class="pie-title">Bounce Rate</div>
                                                        </div>
                                                        <div class="easy-pie sub-pie-2" data-percent="84">
                                                                <div class="percent">84</div>
                                                                <div class="pie-title">Total Opened</div>
                                                        </div>
                                                        <div class="easy-pie sub-pie-2" data-percent="21">
                                                                <div class="percent">21</div>
                                                                <div class="pie-title">Total Ignored</div>
                                                        </div>
                                                </div>

                                        </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                        <div class="dw-item bgm-lime">
                                                <div id="weather-widget"></div>
                                        </div>
                                </div>
                        </div>
                </div>

        </div>
</section>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

@endpush
