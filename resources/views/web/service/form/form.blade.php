@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )

<div class="container">

    <div class="row">
        <div class="col-sm-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Controls</span>
                </div>
                <table class="table" id="inputs-table">
                    <thead>
                    <th>Control</th>
                    <th>Default</th>
                    <th>Disabled</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Inputs
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Text input">
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Text input" disabled="">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Textarea
                            </td>
                            <td>
                                <textarea class="form-control" rows="3"></textarea>
                            </td>
                            <td>
                                <textarea class="form-control" rows="3" disabled=""></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Checkboxes
                            </td>
                            <td>
                                <div class="checkbox" style="margin: 0;">
                                    <label>
                                        <input type="checkbox" value="" class="px">
                                        <span class="lbl">Option one</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox" style="margin: 0;">
                                    <label>
                                        <input type="checkbox" value="" disabled="" class="px">
                                        <span class="lbl">Option one</span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Inline checkboxes
                            </td>
                            <td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1" class="px"> <span class="lbl">1</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="option2" checked="" class="px"> <span class="lbl">2</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="option3" class="px"> <span class="lbl">3</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox11" value="option1" disabled="" class="px"> <span class="lbl">1</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox21" value="option2" checked="" disabled="" class="px"> <span class="lbl">2</span>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox31" value="option3" disabled="" class="px"> <span class="lbl">3</span>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Radios
                            </td>
                            <td>
                                <div class="radio" style="margin-top: 0;">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" class="px">
                                        <span class="lbl">Option one</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" class="px">
                                        <span class="lbl">Option two</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="radio" style="margin-top: 0;">
                                    <label>
                                        <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" checked="" disabled="" class="px">
                                        <span class="lbl">Option one</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4" disabled="" class="px">
                                        <span class="lbl">Option two</span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Selects
                            </td>
                            <td>
                                <select class="form-control form-group-margin">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                                <select multiple class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-group-margin" disabled="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                                <select multiple class="form-control" disabled="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">

            <!-- 6. $HEIGHT_SIZING =============================================================================
            
                            Height sizing
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Height sizing</span>
                </div>
                <div class="panel-body form-controls-demo">
                    <input class="form-control input-lg" type="text" placeholder=".input-lg">
                    <input type="text" class="form-control" placeholder="Default input">
                    <input class="form-control input-sm" type="text" placeholder=".input-sm">

                    <select class="form-control input-lg">
                        <option value="">.input-lg</option>
                    </select>

                    <select class="form-control">
                        <option value="">Default select</option>
                    </select>

                    <select class="form-control input-sm">
                        <option value="">.input-sm</option>
                    </select>
                </div>
            </div>


            <!-- 7. $COLUMN_SIZING =============================================================================
            
                            Column sizing
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Column sizing</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <input type="text" class="form-control" placeholder=".col-xs-2">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder=".col-xs-3">
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" placeholder=".col-xs-4">
                        </div>
                    </div>
                </div>
            </div>


            <!-- 8. $INPUT_GROUPS ==============================================================================
            
                            Input groups
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Input groups</span>
                </div>
                <div class="panel-body no-padding-t form-controls-demo">


                    <h6 class="text-light-gray text-semibold text-xs">BASIC EXAMPLE</h6>

                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-addon bg-success no-border">.00</span>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon bg-danger no-border">$</span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon bg-info no-border">.00</span>
                    </div>


                    <hr class="panel-wide">


                    <h6 class="text-light-gray text-semibold text-xs">INPUT GROUPS SIZING</h6>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon text-danger">@</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon text-success">@</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-group input-group-sm">
                        <span class="input-group-addon text-info">@</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>


                    <hr class="panel-wide">


                    <h6 class="text-light-gray text-semibold text-xs">CHECKBOXES AND RADIO ADDONS</h6>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="px-single"><input type="checkbox" name="" value="" class="px"><span class="lbl"></span></label>
                        </span>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="px-single"><input type="radio" name="" value="" class="px"><span class="lbl"></span></label>
                        </span>
                        <input type="text" class="form-control">
                    </div>


                    <hr class="panel-wide">


                    <h6 class="text-light-gray text-semibold text-xs">BUTTON ADDONS</h6>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                        <input type="text" class="form-control">
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>


                    <hr class="panel-wide">


                    <h6 class="text-light-gray text-semibold text-xs">BUTTONS WITH DROPDOWNS</h6>

                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
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
                        <input type="text" class="form-control">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>


                    <hr class="panel-wide">


                    <h6 class="text-light-gray text-semibold text-xs">SEGMENTED BUTTONS</h6>

                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success" tabindex="-1">Action</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                <span class="fa fa-caret-down"></span>
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

                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-outline" tabindex="-1">Action</button>
                            <button type="button" class="btn btn-primary btn-outline dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                <span class="fa fa-caret-down"></span>
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
        <div class="col-sm-6">

            <!-- 9. $DEFAULT_FORM_STATES =======================================================================
            
                            Default form states
            -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Default form states</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="control-label" for="inputDefault-4">Default input</label>
                        <input type="text" class="form-control" id="inputDefault-4">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <div class="form-group has-warning">
                        <label class="control-label" for="inputWarning-4">Input with warning</label>
                        <input type="text" class="form-control" id="inputWarning-4">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <div class="form-group has-error">
                        <label class="control-label" for="inputError-4">Input with error</label>
                        <input type="text" class="form-control" id="inputError-4">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess-4">Input with success</label>
                        <input type="text" class="form-control" id="inputSuccess-4">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Simple form states</span>
                </div>
                <div class="panel-body">

                    <div class="form-group has-warning simple">
                        <label class="control-label" for="inputWarning-42">Input with warning</label>
                        <input type="text" class="form-control" id="inputWarning-42">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <div class="form-group has-error simple">
                        <label class="control-label" for="inputError-42">Input with error</label>
                        <input type="text" class="form-control" id="inputError-42">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <div class="form-group has-success simple">
                        <label class="control-label" for="inputSuccess-42">Input with success</label>
                        <input type="text" class="form-control" id="inputSuccess-42">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Optional icons</span>
                </div>
                <div class="panel-body">

                    <div class="form-group has-feedback">
                        <label class="control-label" for="inputDefault25">Default input</label>
                        <input type="text" class="form-control" id="inputDefault25">
                        <span class="fa fa-comments form-control-feedback"></span>
                    </div>


                    <div class="form-group has-success has-feedback">
                        <label class="control-label" for="inputSuccess25">Input with success</label>
                        <input type="text" class="form-control" id="inputSuccess25">
                        <span class="fa fa-check-circle form-control-feedback"></span>
                    </div>


                    <div class="form-group has-warning has-feedback">
                        <label class="control-label" for="inputWarning25">Input with warning</label>
                        <input type="text" class="form-control" id="inputWarning25">
                        <span class="fa fa-warning form-control-feedback"></span>
                    </div>


                    <div class="form-group has-error has-feedback">
                        <label class="control-label" for="inputError25">Input with error</label>
                        <input type="text" class="form-control" id="inputError25">
                        <span class="fa fa-times-circle form-control-feedback"></span>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

@endsection
