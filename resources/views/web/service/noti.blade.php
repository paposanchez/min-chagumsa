@extends( 'web.layouts.default' )
@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<section class="block bg-primary dark">
    <div class="container container-center">
        <div class="text-center padding-vertical-large">
            <h1 class="text-lighter">SERVICE / <span class="">ALERT</span></h1>
            <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</section>
<div class="container">
    <div class="block-header">
        <h2>Notifications and Dialog</h2>

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
            <h2>Notification <small>Animated Alerts with custome types and alignments</small></h2>
        </div>

        <div class="card-body card-padding">
            <p class="f-500 m-b-20">Notificaions</p>

            <div class="notification-demo row">
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="top" data-align="left" data-icon="fa fa-check">Top Left</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="top" data-align="right" data-icon="fa fa-comments">Top Right</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="top" data-align="center" data-icon="fa fa-comments">Top Center</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="bottom" data-align="left">Bottom Left</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="bottom" data-align="right">Bottom Right</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-from="bottom" data-align="center">Bottom Center</a>
                </div>
            </div>

            <br>

            <p class="f-500 m-b-20">Type</p>
            <div class="notification-demo row">
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="inverse">Default</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-primary waves-effect" data-type="info">Info</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-success waves-effect" data-type="success">Success</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-warning waves-effect" data-type="warning">Warning</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-danger waves-effect" data-type="danger">Danger</a>
                </div>
            </div>

            <br>

            <p class="f-500 m-b-20">Animation</p>
            <div class="notification-demo row">
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated fadeIn" data-animation-out="animated fadeOut">Fade In</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated fadeInLeft" data-animation-out="animated fadeOutLeft">Fade In Left</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight">Fade In Right</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated fadeInUp" data-animation-out="animated fadeOutUp">Fade In Up</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated fadeInDown" data-animation-out="animated fadeOutDown">Fade In Down</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated bounceIn" data-animation-out="animated bounceOut">Bounce In</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated bounceInLeft" data-animation-out="animated bounceOutLeft">Bounce In Left</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated bounceInRight" data-animation-out="animated bounceOutRight">Bounce In Right</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated bounceInUp" data-animation-out="animated bounceOutUp">Bounce In Up</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated rotateInDownRight" data-animation-out="animated rotateOutUpRight">Fall In Right</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated rotateIn" data-animation-out="animated rotateOut">Rotate In</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated flipInX" data-animation-out="animated flipOutX">Flip In X</a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="" class="btn btn-default waves-effect" data-type="default" data-animation-in="animated flipInY" data-animation-out="animated flipOutY">Flip In Y</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Dialog <small>A beautiful replacement for Javascript's boring Alert</small></h2>
        </div>

        <div class="card-body card-padding">
            <div class="row dialog">
                <div class="col-sm-3">
                    <p class="f-500 m-b-20">Basic Example</p>

                    <button class="btn btn-default waves-effect" id="sa-basic">Click me</button>
                </div> 

                <div class="col-sm-3">
                    <p class="f-500 m-b-20">A title with a text under</p>

                    <button class="btn btn-default waves-effect" id="sa-title">Click me</button>
                </div> 

                <div class="col-sm-3">
                    <p class="f-500 m-b-20">A success message!</p>

                    <button class="btn btn-default waves-effect" id="sa-success">Click me</button>
                </div> 

                <div class="col-sm-3">
                    <p class="f-500 m-b-20">A warning message, with a function attached to the "Confirm"-button...</p>

                    <button class="btn btn-default waves-effect" id="sa-warning">Click me</button>
                </div>  
            </div>

            <br><br>

            <div class="row dialog">
                <div class="col-sm-3">
                    <p class="f-500 m-b-20">By passing a parameter, you can execute something else for "Cancel".</p>

                    <button class="btn btn-default waves-effect" id="sa-params">Click me</button>
                </div>   

                <div class="col-sm-3">
                    <p class="f-500 m-b-20">A message with custom Image Header</p>

                    <button class="btn btn-default waves-effect" id="sa-image">Click me</button>
                </div>         

                <div class="col-sm-3">
                    <p class="f-500 m-b-20">A message with auto close timer</p>

                    <button class="btn btn-default waves-effect" id="sa-close">Click me</button>
                </div>          
            </div>
        </div>
    </div>
</div>



@endsection
