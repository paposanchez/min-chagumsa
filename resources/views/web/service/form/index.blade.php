@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Elements
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row ng-pristine ng-valid">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Input</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="" placeholder="Example placeholder...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Disabled input</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="" disabled="" placeholder="Disabled input ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Popover input</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control popover-button-default" placeholder="Input focus trigger popover" data-content="Popover content from <b>data-content</b> attribute 3" title="Top popover" data-trigger="focus" data-placement="top">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select disabled</label>
                        <div class="col-sm-6">
                            <select class="form-control" disabled="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Multiselect</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <select multiple="" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select disabled="" multiple="" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Multiselect list</label>
                        <div class="col-sm-6">
                            <select multiple="" class="form-control" name="">
                                <option value="Dallas Cowboys">Dallas Cowboys</option>
                                <option value="New York Giants">New York Giants</option>
                                <option value="Philadelphia Eagles">Philadelphia Eagles</option>
                                <option value="Washington Redskins">Washington Redskins</option>
                                <option value="Chicago Bears">Chicago Bears</option>
                                <option value="Detroit Lions">Detroit Lions</option>
                                <option value="Green Bay Packers">Green Bay Packers</option>
                                <option value="Minnesota Vikings">Minnesota Vikings</option>
                                <option value="Atlanta Falcons">Atlanta Falcons</option>
                                <option value="Carolina Panthers">Carolina Panthers</option>
                                <option value="New Orleans Saints">New Orleans Saints</option>
                                <option value="Tampa Bay Buccaneers">Tampa Bay Buccaneers</option>
                                <option value="Arizona Cardinals">Arizona Cardinals</option>
                                <option value="St. Louis Rams">St. Louis Rams</option>
                                <option value="San Francisco 49ers">San Francisco 49ers</option>
                                <option value="Seattle Seahawks">Seattle Seahawks</option>
                                <option value="Buffalo Bills">Buffalo Bills</option>
                                <option value="Miami Dolphins">Miami Dolphins</option>
                                <option value="New England Patriots">New England Patriots</option>
                                <option value="New York Jets">New York Jets</option>
                                <option value="Baltimore Ravens">Baltimore Ravens</option>
                                <option value="Cincinnati Bengals">Cincinnati Bengals</option>
                                <option value="Cleveland Browns">Cleveland Browns</option>
                                <option value="Pittsburgh Steelers">Pittsburgh Steelers</option>
                                <option value="Houston Texans">Houston Texans</option>
                                <option value="Indianapolis Colts">Indianapolis Colts</option>
                                <option value="Jacksonville Jaguars">Jacksonville Jaguars</option>
                                <option value="Tennessee Titans">Tennessee Titans</option>
                                <option value="Denver Broncos">Denver Broncos</option>
                                <option value="Kansas City Chiefs">Kansas City Chiefs</option>
                                <option value="Oakland Raiders">Oakland Raiders</option>
                                <option value="San Diego Chargers">San Diego Chargers</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Checkbox</label>
                        <div class="col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox 1
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox 2
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox 3
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" disabled="" value="">
                                    Disabled checkbox
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Inline checkbox</label>
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="" value="option1">
                                Checkbox 1
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="" value="option2">
                                Checkbox 2
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="" value="option3">
                                Checkbox 3
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" disabled="" id="" value="option4">
                                Disabled checkbox
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Radio</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="example-radio1" value="">
                                    Radio 1
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="example-radio1" value="">
                                    Radio 2
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="example-radio1" value="">
                                    Radio 3
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="example-radio1" disabled="" value="">
                                    Disabled radio
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Inline radio</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" id="" name="example-radio1" value="option1">
                                Radio 1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="" name="example-radio1" value="option2">
                                Radio 2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="" name="example-radio1" value="option3">
                                Radio 3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" disabled="" id="" name="example-radio1" value="option4">
                                Disabled radio
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Textarea</label>
                        <div class="col-sm-6">
                            <textarea name="" id="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Textarea disabled</label>
                        <div class="col-sm-6">
                            <textarea name="" disabled="" id="" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Textarea character counter</label>
                        <div class="col-sm-6">
                            <textarea name="" rows="3" class="form-control textarea-counter"></textarea>
                            <div class="character-remaining clear input-description">125 characters left</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Touchspin postfix</label>
                        <div class="col-sm-6">

                            <input  type="text" value="0" name="demo2" class="form-control bootstrap-touchspin">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Touchspin prefix</label>
                        <div class="col-sm-6">


                            <input  type="text" value="0" name="demo2" class="form-control bootstrap-touchspin">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Touchspin vertical</label>
                        <div class="col-sm-6">
                            <input data-vertical="true" type="text" value="0" name="demo2" class="form-control bootstrap-touchspin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Touchspin with Icon</label>
                        <div class="col-sm-6">
                            <input data-vertical="true" data-vertical-icon="true" type="text" value="0" name="demo2" class="form-control bootstrap-touchspin">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Input groups
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row ng-pristine ng-valid">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Positions</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mrg15T mrg15B">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Size</label>
                        <div class="col-sm-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mrg15T mrg15B">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Checkbox</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Radio</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="input-name-2">
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buttons</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-primary" tabindex="-1">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">Go!</button>
                                        </span>
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <input type="text" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" tabindex="-1">Action</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Icons</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon bg-black">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-green">
                                            <i class="fa fa-retweet"></i>
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon bg-white font-green">
                                            <i class="fa fa-tag"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-white">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon btn-primary">
                                            <i class="fa fa-cogs"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-blue">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon bg-red">
                                            <i class="fa fa-bullhorn"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Icons inside</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-inside bg-black">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <span class="input-group-addon addon-inside bg-green">
                                            <i class="fa fa-retweet"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon addon-inside bg-white font-green">
                                            <i class="fa fa-tag"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-inside btn-primary">
                                            <i class="fa fa-cogs"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="input-group mrg15T mrg15B">
                                        <span class="input-group-addon addon-inside bg-blue">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon addon-inside bg-red">
                                            <i class="fa fa-bullhorn"></i>
                                        </span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Date Picker
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row ng-pristine ng-valid">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Basic</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" id="datepicker">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                File upload
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row ng-pristine ng-valid">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Basic</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">File group</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-primary btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="...">
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">File button</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="...">
                                </span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Image preview upload</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="...">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push( 'footer-script' )
<script type="text/javascript">



    $('document').ready(function () {


    });

</script>
@endpush
