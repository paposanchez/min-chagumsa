@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="page-header">
        <h3>DEFAULT</h3>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h2>Default Example <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>Alternative Example <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-download"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Colored Headers -->


    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-cyan">
                    <h2>Cyan <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-red">
                    <h2>Red <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-orange">
                    <h2>Orange <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-green">
                    <h2>Green <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-purple">
                    <h2>Purple <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-bluegray">
                    <h2>Blue Gray <small>You can type anything here...</small></h2>

                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
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

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>
    </div>



    <div class="page-header">
        <h3>NO HEADER<small>Please refer 'Colors' page in 'User Interface' for more color classes</small></h3>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body card-padding bg-teal c-white">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body card-padding bg-pink c-white">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

    </div>

    <!-- Extra -->
    <div class="page-header">
        <h2>Some Material Design Flavour</h2>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header ch-alt m-b-20">
                    <h2>Some Title <small>Phasellus condimentum ipsum id auctor</small></h2>
                    <ul class="actions">
                        <li>
                            <a href="">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-download"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
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

                    <button class="btn bg-white btn-float btn-circle"><i class="fa fa-plus"></i></button>
                </div>

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header ch-alt m-b-20">
                    <h2>Some Title <small>Phasellus condimentum ipsum id auctor</small></h2>
                    <ul class="actions actions-alt">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
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

                    <button class="btn bg-white btn-float btn-circle"><i class="fa fa-envelope"></i></button>
                </div>

                <div class="card-body card-padding">
                    Cras leo sem, egestas a accumsan eget, euismod at nunc. Praesent vel mi blandit, tempus ex gravida, accumsan dui. Sed sed aliquam augue. Nullam vel suscipit purus, eu facilisis ante. Mauris nec commodo felis. 
                </div>
            </div>
        </div>
    </div>




    <div class="page-header">
        <h1>Panels</h1>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div><!-- /.col-sm-4 -->
    </div>
</div>


@endsection

