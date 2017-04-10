@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">
    <!--http://metricsgraphicsjs.org/-->

    <div class="row">

        <div class="col-md-12">
            <div class="chart" id="fake_users1"></div>
        </div>
        <div class="col-md-12">
            <div class="chart" id="fake_users2"></div>
        </div>
        <div class="col-md-12">
            <div class="chart" id="precision1"></div>
        </div>
        <div class="col-md-12">
            <div class="chart" id="custom-rollover"></div>
        </div>

    </div>

</div>
@endsection


@push( 'header-script' )
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/metrics-graphics/metricsgraphics.css' ) }}" />
@endpush


@push( 'footer-script' )
<script src="{{ Helper::assets( 'vendor/d3/build/d3.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/metrics-graphics/metricsgraphics.min.js' ) }}"></script>
<script type="text/javascript">
d3.json('/json/line', function (data) {
    data = MG.convert.date(data, 'date');
    MG.data_graphic({
        title: "Line Chart",
        description: "This is a simple line chart. You can remove the area portion by adding area: false to the arguments list.",
        data: data,
        width: 600,
        height: 200,
        right: 40,
        target: document.getElementById('fake_users1'),
        x_accessor: 'date',
        y_accessor: 'value'
    });
});
d3.json('/json/line2', function (data) {
    for (var i = 0; i < data.length; i++) {
        data[i] = MG.convert.date(data[i], 'date');
    }

    MG.data_graphic({
        title: "Multi-Line Chart",
        description: "This line chart contains multiple lines.",
        data: data,
        width: 600,
        height: 200,
        right: 40,
        target: '#fake_users2',
        legend: ['Line 1', 'Line 2', 'Line 3'],
        legend_target: '.legend'
    });
});
</script>
@endpush