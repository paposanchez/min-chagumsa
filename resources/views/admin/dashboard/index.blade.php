@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <!-- START Revenue -->
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Total Revenue <small class="pull-right text-gray-lighter">22 - 29 May 2016</small></div>
                <div class="panel-body">
                    <h2 class="m-t-0 f-w-300">IDR 10,215,845</h2>
                    <i class="fa fa-fw fa-caret-up text-success"></i> <span class="text-success m-r-1">33,87%</span> <small>from last week</small>
                </div>
            </div>
        </div>
        <!-- END Revenue -->

        <!-- START Total Item Sold -->
        <div class="col-lg-4 col-md-4  col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Total Item Sold <small class="pull-right text-gray-lighter">22 - 29 May 2016</small></div>
                <div class="panel-body">
                    <h2 class="m-t-0 f-w-300">128,980</h2>
                    <i class="fa fa-fw fa-caret-down text-danger"></i> <span class="text-danger m-r-1">33,87%</span> <small>from last week</small>
                </div>
            </div>
        </div>
        <!-- END Total Item Sold -->

        <!-- START Total Visitor -->
        <div class="col-lg-4 col-md-4  col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Total Visitor <small class="pull-right text-gray-lighter">22 - 29 May 2016</small></div>
                <div class="panel-body">
                    <h2 class="m-t-0 f-w-300">2,905,895</h2>
                    <i class="fa fa-fw fa-caret-up text-success"></i> <span class="text-success m-r-1">92,01%</span> <small>from last week</small>
                </div>
            </div>
        </div>
        <!-- END Total Visitor -->

    </div>


    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h2>Default Example <small>You can type anything here...</small></h2>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h2>Default Example <small>You can type anything here...</small></h2>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h2>Default Example <small>You can type anything here...</small></h2>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h2>Default Example <small>You can type anything here...</small></h2>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">
    $('document').ready(function () {

    });

</script>
@endsection
