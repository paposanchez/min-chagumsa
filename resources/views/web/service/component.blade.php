@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">



    <div class="page-header">
        <h3>JUMBOTRON</h3>
    </div>
    <div class="jumbotron">
        <h1>JUMBOTRON</h1>
        <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
    </div>


    <div class="page-header">
        <h3>DROPDOWN</h3>
    </div>

    <div class="dropdown-group">

        <div class="dropdown">
            <ul class="dropdown-menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown ">
            <ul class="dropdown-menu bg-blue" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown ">
            <ul class="dropdown-menu bg-teal" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown ">
            <ul class="dropdown-menu bg-orange" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu bg-bluegray" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu bg-green" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
        </div>

        <br>
        <br>

        <p class="f-500 m-b-5">Dropdown links with icon</p>
        <small>Adding <code>.dm-icon</code> class to the <code>.dropdown-menu</code> will enable extra room for icons in dropdown links.</small>

        <br>
        <br>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu dm-icon" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-home"></i> Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map"></i> Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-envelope"></i> Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map-marker"></i> Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu dm-icon bg-blue" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-home"></i> Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map"></i> Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-envelope"></i> Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map-marker"></i> Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu dm-icon bg-green" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-home"></i> Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map"></i> Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-envelope"></i> Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map-marker"></i> Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu dm-icon bg-orange" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-home"></i> Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map"></i> Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-envelope"></i> Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map-marker"></i> Separated link</a></li>
            </ul>
        </div>

        <div class="dropdown clearfix">
            <ul class="dropdown-menu dm-icon bg-bluegray" role="menu" style="display: block;position: relative;">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-home"></i> Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map"></i> Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-envelope"></i> Something else here</a></li>
                <li class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-map-marker"></i> Separated link</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <ul class="dropdown-menu dropdowns-demo" style="display: block; position: relative;">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="dropdown-menu dropdowns-demo" style="display: block; position: relative;">
                    <li><a href="#">Action<span class="label label-success pull-right">34</span></a></li>
                    <li><a href="#">Another action<span class="badge badge-info pull-right">16</span></a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Dropdown header</li>
                    <li><a href="#"><i class="dropdown-icon fa fa-cloud"></i>&nbsp;&nbsp;With icon</a></li>
                    <li><a href="#">Last action</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>


        <p class="f-500 m-b-20">Alignment</p>

        <div class="clearfix dropdown-group">

            <div class="dropdown">
                <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">Dropdown Left</button>

                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">Dropdown Right</button>

                <ul class="dropdown-menu pull-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <p class="f-500 m-b-20">Dropups - Trigger dropdown menus above elements</p>

        <div class="dropdown-group">
            <div class="dropdown dropup">
                <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false">This is a Dropup</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown dropup">
                <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false">This is another Dropup</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown dropup">
                <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false">This is right aligned Dropup</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <p class="f-500 m-b-20">Button Dropdowns</p>

        <div class="dropdown-group">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false">Default</a>
                <ul class="dropdown-menu pull-left">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">Primary</a>
                <ul class="dropdown-menu pull-left">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown">Info</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-success" data-toggle="dropdown">Success</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">Warning</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-danger" data-toggle="dropdown">Danger</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown">Link</a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>

        <br>
        <br>

        <p class="f-500 m-b-20">Split Button Dropdowns</p>

        <div class="dropdown-group">
            <div class="btn-group">
                <button type="button" class="btn btn-default">Default</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-warning">Warning</button>
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Split button dropdowns</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>




            <div class="page-header">
                <h1>Navbars</h1>
            </div>

            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Project name</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>

            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Project name</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>

        </div>
    </div>

    <div class="page-header">
        <h3>TAB</h3>
    </div>

    <div role="tabpanel">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#home11" aria-controls="home11" role="tab" data-toggle="tab">Home</a></li>
            <li><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">Profile</a></li>
            <li><a href="#messages11" aria-controls="messages11" role="tab" data-toggle="tab">Messages</a></li>
            <li><a href="#settings11" aria-controls="settings11" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home11">
                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
                    Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                <p>In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuada pretium. Phasellus consectetuer vestibulum elit.
                    Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim.
                    Cras ultricies mi eu turpis hendrerit fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse platea dictumst.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile11">
                <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages11">
                <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings11">
                <p>Praesent turpis. Phasellus magna. Fusce vulputate eleifend sapien. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
            </div>
        </div>
    </div>

    <div role="tabpanel">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active  pull-right"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Home</a></li>
            <li role="presentation" class=" pull-right"><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation" class=" pull-right"><a href="#messages1" aria-controls="messages1" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation" class=" pull-right"><a href="#settings1" aria-controls="settings1" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home1">
                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
                    Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                <p>In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuada pretium. Phasellus consectetuer vestibulum elit.
                    Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim.
                    Cras ultricies mi eu turpis hendrerit fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse platea dictumst.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile1">
                <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages1">
                <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings1">
                <p>Praesent turpis. Phasellus magna. Fusce vulputate eleifend sapien. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
            </div>
        </div>
    </div>


    <div role="tabpanel">
        <ul class="nav nav-pills" role="tablist">
            <li class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Home</a></li>
            <li role="presentation" class=""><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation" class=""><a href="#messages1" aria-controls="messages1" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation" class=""><a href="#settings1" aria-controls="settings1" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home1">
                <p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est. Praesent ac massa at ligula laoreet iaculis.
                    Vivamus aliquet elit ac nisl. Nulla porta dolor. Cras dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                <p>In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac felis quis tortor malesuada pretium. Phasellus consectetuer vestibulum elit.
                    Duis lobortis massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim.
                    Cras ultricies mi eu turpis hendrerit fringilla. Donec mollis hendrerit risus. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu enim. In hac habitasse platea dictumst.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile1">
                <p>Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages1">
                <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis.
                    Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat.
                    Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings1">
                <p>Praesent turpis. Phasellus magna. Fusce vulputate eleifend sapien. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis.</p>
            </div>
        </div>
    </div>

    <!--
        <div class="card">
            <div class="card-header">
                <h2>Wizard <small>This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into each step individually.</small></h2>
            </div>
    
            <div class="card-body card-padding">
                <div class="form-wizard-basic fw-container">
                    <ul class="tab-nav text-center fw-nav">
                        <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">First</a></li>
                        <li><a href="#tab2" data-toggle="tab">Second</a></li>
                        <li><a href="#tab3" data-toggle="tab">Third</a></li>
                        <li><a href="#tab4" data-toggle="tab">Forth</a></li>
                        <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
                        <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
                    </ul>
    
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien, cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel placerat augue. Aliquam pharetra mauris neque, sit amet egestas risus semper non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet risus volutpat volutpat. Phasellus vitae turpis a elit tincidunt ornare. Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet vulputate.</p>
                            <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                            <p>Aliquam tempus rutrum neque, a blandit dui. Proin quis elit non est scelerisque pharetra nec id libero. Quisque id tincidunt elit. Maecenas non mauris malesuada, interdum justo et, ullamcorper magna. Nulla libero risus, vestibulum pharetra eleifend in, aliquam ac odio. Sed ligula orci, rhoncus sit amet ipsum vel, vehicula interdum ligula. </p>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
                            <p>Aliquam tempus rutrum neque, a blandit dui. Proin quis elit non est scelerisque pharetra nec id libero. Quisque id tincidunt elit. Maecenas non mauris malesuada, interdum justo et, ullamcorper magna. Nulla libero risus, vestibulum pharetra eleifend in, aliquam ac odio. Sed ligula orci, rhoncus sit amet ipsum vel, vehicula interdum ligula. </p>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien, cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel placerat augue. Aliquam pharetra mauris neque, sit amet egestas risus semper non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet risus volutpat volutpat. Phasellus vitae turpis a elit tincidunt ornare. Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet vulputate.</p>
                        </div>
                        <div class="tab-pane fade" id="tab5">
                            <p>Cras mattis vulputate lacus sed aliquet. Pellentesque ultricies lectus ut augue tincidunt volutpat. Quisque lorem lectus, vulputate et feugiat ac, tincidunt eu neque. Suspendisse et dignissim ex. Praesent finibus vestibulum faucibus. Vestibulum scelerisque aliquam eros, id tincidunt lacus interdum eu. Praesent molestie leo sed varius tempus. Etiam quis turpis eget diam aliquet congue ut non risus. In sed sapien placerat, fermentum odio id, sagittis magna. Donec sollicitudin ipsum eget pretium tincidunt. Mauris venenatis metus a turpis eleifend, vitae tincidunt nunc tristique. Nulla facilisi. In hac habitasse platea dictumst. Curabitur auctor nibh eget mauris iaculis, id tempor ex egestas. Proin nisl diam, malesuada quis ipsum vitae, tincidunt efficitur neque. Nam suscipit magna ac nisl ornare lobortis.</p>
                        </div>
                        <div class="tab-pane fade" id="tab6">
                            <p>Nunc gravida hendrerit turpis a iaculis. Aenean tempus bibendum augue at tempor. Vestibulum nec ligula elementum nisi viverra mattis ac in nibh. Cras eu elementum massa. Integer cursus quam maximus, ornare ex at, bibendum dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus quis eleifend turpis, eget luctus felis.</p>
                        </div>
    
                        <ul class="fw-footer pagination wizard">
                            <li class="previous first disabled"><a class="a-prevent" href=""><i class="fa fa-more-horiz"></i></a></li>
                            <li class="previous disabled"><a class="a-prevent" href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li class="next"><a class="a-prevent" href=""><i class="fa fa-chevron-right"></i></a></li>
                            <li class="next last"><a class="a-prevent" href=""><i class="fa fa-more-horiz"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->


    <div class="page-header">
        <h3>COLLAPSE</h3>
    </div>

    <p>Click the buttons below to show and hide another element via class changes. You can use a link with the <code>href</code> attribute, or a button with the <code>data-target</code> attribute. In both cases, the <code>data-toggle="collapse"</code> is required.</p>

    <div class="btn-demo">
        <a class="btn btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Link with href
        </a>
        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Button with data-target
        </button>
    </div>

    <div class="collapse m-t-10" id="collapseExample">
        <p>Curabitur nisi velit, placerat id diam ac, maximus aliquet ex. Integer in laoreet nisl. Maecenas auctor porta ligula, non interdum dolor hendrerit non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum tortor tellus, commodo suscipit cursus vitae, auctor eu massa. Aliquam nibh dolor, lobortis in molestie eget, tristique ac nunc. Aliquam fringilla aliquam est eu congue.</p>
    </div>

    <br/>

    <div class="panel-group" role="tablist" aria-multiselectable="true">
        <div class="panel panel-collapse">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collapsible Group Item #1
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-collapse">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-collapse">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>



    <div class="page-header">
        <h3>PROGRESS BAR</h3>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            <span class="sr-only">60% Complete</span>
        </div>
    </div>

    <br>

    <p class="f-500 m-b-20">Contextual alternatives</p>
    <div class="progress m-b-10">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
    </div>
    <div class="progress m-b-10">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
    </div>
    <div class="progress m-b-10">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
    </div>
    <div class="progress m-b-10">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
    </div>

    <br>

    <p class="f-500 m-b-20">Striped Progress bars</p>
    <div class="progress progress-striped m-b-10">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
    </div>
    <div class="progress progress-striped m-b-10">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
    </div>
    <div class="progress progress-striped m-b-10">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
    </div>
    <div class="progress progress-striped m-b-10">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
    </div>

    <br>

    <p class="f-500 m-b-20">Stacked Progress bar</p>
    <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 35%">
            <span class="sr-only">35% Complete (success)</span>
        </div>
        <div class="progress-bar progress-bar-warning" style="width: 20%">
            <span class="sr-only">20% Complete (warning)</span>
        </div>
        <div class="progress-bar progress-bar-danger" style="width: 10%">
            <span class="sr-only">10% Complete (danger)</span>
        </div>
    </div>





    <div class="page-header">
        <h1>Carousel</h1>
    </div>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://lorempixel.com/1240/500/" alt="First slide">
            </div>
            <div class="item">
                <img src="http://lorempixel.com/1240/500/" alt="Second slide">
            </div>
            <div class="item">
                <img src="http://lorempixel.com/1240/500/" alt="Third slide">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>






    <div class="row">
        <div class="col-md-6">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">라벨 & 뱃지</span>
                </div>
                <div class="panel-body">

                    <h6 class="">LABELS</h6>

                    <span href="#" class="label label-default">Default</span>
                    <span href="#" class="label label-primary">Primary</span>
                    <span href="#" class="label label-success">Success</span>
                    <span href="#" class="label label-warning">Warning</span>
                    <span href="#" class="label label-danger">Danger</span>
                    <span href="#" class="label label-info">Info</span>

                    <hr class="">

                    <h6 class="">BADGES</h6>
                    <a href="#" class="badge">Default</a>
                    <a href="#" class="badge badge-primary">Primary</a>
                    <a href="#" class="badge badge-success">Success</a>
                    <a href="#" class="badge badge-warning">Warning</a>
                    <a href="#" class="badge badge-danger">Danger</a>
                    <a href="#" class="badge badge-info">Info</a>

                </div>
            </div>


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">preloader</span>
                </div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-md-6">

                            <div class="preloader preloader_google">
                                <div class="preloader_loader"></div>
                            </div>

                            <div class="preloader preloader_timer">
                                <div class="preloader_loader"></div>
                            </div>

                            <div class="preloader preloader_square">
                                <div class="preloader_loader"></div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="preloader preloader_bars">
                                <div class="preloader_loader"></div>
                            </div>

                            <div class="preloader preloader_pulse">
                                <div class="preloader_loader"></div>
                            </div>

                            <div class="preloader preloader_spinner">
                                <div class="preloader_loader"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Progress bars</span>
                </div>
                <div class="panel-body no-padding-t">


                    <h6 class="">DEFAULT</h6>

                    <div class="progress"><div class="progress-bar" style="width: 75%;"></div></div>
                    <div class="progress"><div class="progress-bar progress-bar-info" style="width: 75%;"></div></div>
                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: 75%;"></div></div>
                    <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 75%;"></div></div>
                    <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 75%;"></div></div>
                    <div class="progress"><div class="progress-bar progress-bar-inverse" style="width: 75%;"></div></div>

                    <hr class="">


                    <h6 class="">STRIPED</h6>

                    <div class="progress progress-striped"><div class="progress-bar" style="width: 75%;"></div></div>
                    <div class="progress progress-striped"><div class="progress-bar progress-bar-info" style="width: 75%;"></div></div>
                    <div class="progress progress-striped"><div class="progress-bar progress-bar-success" style="width: 75%;"></div></div>
                    <div class="progress progress-striped"><div class="progress-bar progress-bar-warning" style="width: 75%;"></div></div>
                    <div class="progress progress-striped"><div class="progress-bar progress-bar-danger" style="width: 75%;"></div></div>
                    <div class="progress progress-striped"><div class="progress-bar progress-bar-inverse" style="width: 75%;"></div></div>

                    <hr class="">


                    <h6 class="">ANIMATED</h6>

                    <div class="progress progress-striped active"><div class="progress-bar" style="width: 75%;"></div></div>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: 75%;"></div></div>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-success" style="width: 75%;"></div></div>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-warning" style="width: 75%;"></div></div>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-danger" style="width: 75%;"></div></div>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-inverse" style="width: 75%;"></div></div>

                    <hr class="">


                    <h6 class="">STACKED</h6>

                    <div class="progress">
                        <div class="progress-bar" style="width: 35%"></div>
                        <div class="progress-bar" style="width: 20%"></div>
                        <div class="progress-bar" style="width: 10%"></div>
                    </div>

                    <h6 class="">SIZE</h6>

                    <div class="progress progress-lg"><div class="progress-bar progress-bar-inverse" style="width: 75%;">75%</div></div>
                    <div class="progress progress-sm"><div class="progress-bar progress-bar-inverse" style="width: 75%;">75%</div></div>
                    <div class="progress progress-xs"><div class="progress-bar progress-bar-inverse" style="width: 75%;">75%</div></div>


                    <h6 class="">RIGHT SIDE</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-right" data-transitiongoal="25" style="width: 75%;"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info progress-bar-right" data-transitiongoal="15" style="width: 75%;"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-right" data-transitiongoal="25" style="width: 75%;"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning progress-bar-right" data-transitiongoal="45" style="width: 75%;"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-right" data-transitiongoal="75" style="width: 75%;"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-inverse progress-bar-right" data-transitiongoal="95" style="width: 75%;"></div>
                            </div>
                        </div>

                    </div>

                    <h6 class="">VERTICAL</h6>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="progress progress-striped progress-vertical">
                                <div class="progress-bar" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical">
                                <div class="progress-bar progress-bar-info" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical">
                                <div class="progress-bar progress-bar-warning" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical">
                                <div class="progress-bar progress-bar-danger" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical progress-lg">
                                <div class="progress-bar progress-bar-inverse" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical progress-sm">
                                <div class="progress-bar progress-bar-inverse" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                            <div class="progress progress-striped progress-vertical progress-xs">
                                <div class="progress-bar progress-bar-inverse" data-transitiongoal="25" style="height: 75%;"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <ul id="page-breadcrumb-demo" class="breadcrumb breadcrumb-page" style="display: none;">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active"><a href="#">Data</a></li>
            </ul>


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Breadcrumb</span>
                </div>
                <div class="panel-body no-padding-t">


                    <h6 class="">DEFAULT</h6>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ul>

                    <hr class="">


                    <h6 class="">DARK BACKGROUND</h6>
                    <ul class="breadcrumb bg-inverse dark">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active"><a href="#">Data</a></li>
                    </ul>
                </div>
            </div>
            
            
            
            
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Counters</span>
                </div>
                <div class="panel-body">
                    <div class="counter counter-lg"><span>765</span></div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="counter-separated counter-lg">
                        <span>0</span>
                        <span>0</span>
                        <span>7</span>
                        <span>6</span>
                        <span>5</span>
                    </div>

                    <br>
                    <br>

                    <div class="counter"><span>765</span></div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="counter-separated">
                        <span>0</span>
                        <span>0</span>
                        <span>7</span>
                        <span>6</span>
                        <span>5</span>
                    </div>

                    <br>
                    <br>

                    <div class="counter counter-sm"><span>765</span></div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="counter-separated counter-sm">
                        <span>0</span>
                        <span>0</span>
                        <span>7</span>
                        <span>6</span>
                        <span>5</span>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>



@endsection
