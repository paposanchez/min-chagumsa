@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">


        <div class="page-header">
                <h3>DEFAULT</h3>
        </div>

        <div class="alert alert-default" role="alert">Well done! This is default Alert Message.</div>
        <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
        <div class="alert alert-info" role="alert">Heads up! This alert needs your attention, but it's not super important.</div>
        <div class="alert alert-warning" role="alert">Warning! Better check yourself, you're not looking too good.</div>
        <div class="alert alert-danger" role="alert">Oh snap! Change a few things up and try submitting again.</div>


        <div class="page-header">
                <h3>DISMISS</h3>
        </div>
        <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Well done! You successfully read this important alert message.
        </div>
        <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Heads up! This alert needs your attention, but it's not super important.
        </div>
        <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Warning! Better check yourself, you're not looking too good.
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Oh snap! Change a few things up and try submitting again.
        </div>

        <div class="page-header">
                <h3>LINK</h3>
        </div>
        <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Well done! You successfully read <a href="" class="alert-link">this important alert message.</a>
        </div>
        <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Heads up! This <a href="" class="alert-link">alert needs your attention</a>, but it's not super important.
        </div>
        <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Warning! Better check yourself, you're <a href="" class="alert-link">not looking too good.</a>
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Oh snap! <a href="" class="alert-link">Change a few things up</a> and try submitting again.
        </div>



        <div class="page-header">
                <h3>TOOLTIPS</h3>
        </div>
        <p class="">
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Tooltip on top</button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right">Tooltip on right</button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Tooltip on bottom</button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tooltip on left">Tooltip on left</button>
        </p>

        <div class="page-header">
                <h3>POPOVER</h3>
        </div>

        <p class="">Popover on Click</p>
        <div class="">
                <!-- Top -->
                <button class="btn btn-default" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Top
                </button>

                <!-- Right -->
                <button class="btn btn-default" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Right
                </button>

                <!-- Bottom -->
                <button class="btn btn-default" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Bottom
                </button>

                <!-- Left -->
                <button class="btn btn-default" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Left
                </button>
        </div>

        <br>
        <br>

        <p class="">Popover on Hover</p>
        <div class="">
                <!-- Top -->
                <button class="btn btn-default" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Top
                </button>

                <!-- Right -->
                <button class="btn btn-default" data-trigger="hover" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Right
                </button>

                <!-- Bottom -->
                <button class="btn btn-default" data-trigger="hover" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Bottom
                </button>

                <!-- Left -->
                <button class="btn btn-default" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." title="" data-original-title="Popover Title">
                        Left
                </button>
        </div>

        <div class="page-header">
                <h3>MODAL</h3>
        </div>

        <div class="clearfix">
                <div class="modal" style="display:block;position:relative;z-index: 1;"> <!-- Inline style just for preview -->
                        <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                                <p>Curabitur blandit mollis lacus. Nulla sit amet est. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.</p>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-success">Save changes</button>
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <br>
        <br>

        <p class="">Modals have two optional sizes, available via modifier classes to be placed on a <code>.modal-dialog</code>.</p>
        <p class="">
                <a data-toggle="modal" href="#modalDefault" class="btn btn-default">Modal - Default</a>
                <a data-toggle="modal" href="#modalNarrower" class="btn btn-default">Modal - Small</a>
                <a data-toggle="modal" href="#modalWider" class="btn btn-default">Modal - Large</a>
                <a data-toggle="modal" href="#noAnimation" class="btn btn-default">Without Animation</a>
                <a data-toggle="modal" href="#preventClick" class="btn btn-default">Prevent Outside Click</a>
        </p>


        <!-- Modal Default -->
        <div class="modal fade" id="modalDefault" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>

        <!-- Modal Small -->
        <div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>

        <!-- Modal Large -->
        <div class="modal fade" id="modalWider" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>

        <div class="modal" id="noAnimation" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>

        <div class="modal fade" id="preventClick" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper. Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla. Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Save changes</button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                </div>
        </div>



        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                </div>
                                <div class="modal-body">
                                        <h4>Text in a modal</h4>
                                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

                                        <h4>Popover in a modal</h4>
                                        <p>This <a href="#" role="button" class="btn btn-default popover-test" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">button</a> should trigger a popover on click.</p>

                                        <h4>Tooltips in a modal</h4>
                                        <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

                                        <hr>

                                        <h4>Overflowing text to show scroll behavior</h4>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                </div>

        </div>




        <div class="page-header">
                <h3>PAGE ALERT</h3>
        </div>

        <p>
                <button data-toggle="alert" data-type="default" data-position="center" data-title="test" data-message="<strong>Default!</strong> Best check yo self, you're not looking too good." class="btn btn-default">Default</button>&nbsp;&nbsp;
                <button data-toggle="alert" data-type="warning" data-title="test" data-message="<strong>Warning!</strong> Best check yo self, you're not looking too good." class="btn btn-warning">Add warning</button>&nbsp;&nbsp;
                <button data-toggle="alert" data-type="danger" data-title="test" data-message="<strong>Oh snap!</strong> Change a few things up and try submitting again." class="btn btn-danger">Add error</button>&nbsp;&nbsp;
                <button data-toggle="alert" data-type="success" data-title="test" data-message="<strong>Well done!</strong> You successfully read this important alert message." class="btn btn-success">Add success</button>&nbsp;&nbsp;
                <button data-toggle="alert" data-type="info" data-title="test" data-message="<strong>Heads up!</strong> This alert needs your attention, but it's not super important." class="btn btn-info">Add info</button>&nbsp;&nbsp;
        </p>

        <div class="page-header">
                <h3>NOTIFY</h3>
        </div>

        <p>
                <button data-toggle="notify" data-type="default" data-position="center" data-title="test" data-message="<strong>Default!</strong> Best check yo self, you're not looking too good." class="btn btn-default">Default</button>&nbsp;&nbsp;
                <button data-toggle="notify" data-type="warning" data-title="test" data-message="<strong>Warning!</strong> Best check yo self, you're not looking too good." class="btn btn-warning">Add warning</button>&nbsp;&nbsp;
                <button data-toggle="notify" data-type="danger" data-title="test" data-message="<strong>Oh snap!</strong> Change a few things up and try submitting again." class="btn btn-danger">Add error</button>&nbsp;&nbsp;
                <button data-toggle="notify" data-type="success" data-title="test" data-message="<strong>Well done!</strong> You successfully read this important alert message." class="btn btn-success">Add success</button>&nbsp;&nbsp;
                <button data-toggle="notify" data-type="info" data-title="test" data-message="<strong>Heads up!</strong> This alert needs your attention, but it's not super important." class="btn btn-info">Add info</button>&nbsp;&nbsp;
        </p>

        <div class="page-header">
                <h3>MODAL ALERT</h3>
        </div>
        <p>
                <button class="btn btn-success" data-toggle="modal" data-backdrop="static" data-target="#modals-alerts-success">Success</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-target="#modals-alerts-danger">Danger</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-target="#modals-alerts-warning">Warning</button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-info" data-toggle="modal" data-backdrop="static" data-target="#modals-alerts-info">Info</button>
        </p>


        <div id="modals-alerts-success" class="modal modal-alert modal-success fade">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="modal-title">Some alert title</div>
                                <div class="modal-body">Some alert text</div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                </div>
                        </div>
                </div>
        </div>



        <div id="modals-alerts-danger" class="modal modal-alert modal-danger fade">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <i class="fa fa-times-circle"></i>
                                </div>
                                <div class="modal-title">Some alert title</div>
                                <div class="modal-body">Some alert text</div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                                </div>
                        </div>
                </div>
        </div>



        <div id="modals-alerts-warning" class="modal modal-alert modal-warning fade">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <i class="fa fa-warning"></i>
                                </div>
                                <div class="modal-title">Some alert title</div>
                                <div class="modal-body">Some alert text</div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
                                </div>
                        </div>
                </div>
        </div>



        <div id="modals-alerts-info" class="modal modal-alert modal-info fade">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <i class="fa fa-info-circle"></i>
                                </div>
                                <div class="modal-title">Some alert title</div>
                                <div class="modal-body">Some alert text</div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
                                </div>
                        </div>
                </div>
        </div>


</div>
@endsection
