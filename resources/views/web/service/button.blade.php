@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">
    <div class="page-header">
        <h3>DEFAULT</h3>
    </div>

    <div class="btn-demo">
        <button class="btn btn-default">Default</button>
        <button class="btn btn-info">Info</button>
        <button class="btn btn-primary">Primary</button>
        <button class="btn btn-success">Success</button>
        <button class="btn btn-warning">Warning</button>
        <button class="btn btn-danger">Danger</button>
    </div>

    <div class="page-header">
        <h3>SIZE</h3>
    </div>

    <div class="btn-demo">
        <button class="btn btn-primary btn-lg">Large</button>
        <button class="btn btn-primary">Default</button>
        <button class="btn btn-primary btn-sm">Small</button>
        <button class="btn btn-primary btn-xs">Extra Small</button>
    </div>

    <div class="page-header">
        <h3>DISABLE</h3>
    </div>

    <button class="btn btn-default" disabled="disabled">Default</button>
    <button class="btn btn-info" disabled="disabled">Info</button>
    <button class="btn btn-primary" disabled="disabled">Primary</button>
    <button class="btn btn-success" disabled="disabled">Success</button>
    <button class="btn btn-warning" disabled="disabled">Warning</button>
    <button class="btn btn-danger" disabled="disabled">Danger</button>

    <div class="page-header">
        <h3>WITH ICON</h3>
    </div>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-home"></i> Home</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-search"></i> Search</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-ellipsis-v"></i> More</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-forward"></i> Forward</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-backward"></i> Back</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-refresh"></i> Sync</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-check"></i> Check</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-close"></i> Check</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-navicon"></i> Menu</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-map"></i> Apps</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-check-circle"></i> Done</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-line-chart"></i> Up</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-map"></i> Get</button>
    <button class="btn btn-default btn-icon-text"><i class="fa fa-phone"></i> Call</button>

    <div class="page-header">
        <h3>ONLY ICON</h3>
    </div>

    <button class="btn btn-default"><i class="fa fa-home"></i></button>
    <button class="btn btn-default"><i class="fa fa-search"></i></button>
    <button class="btn btn-default"><i class="fa fa-ellipsis-v"></i></button>
    <button class="btn btn-default"><i class="fa fa-forward"></i></button>
    <button class="btn btn-default"><i class="fa fa-backward"></i></button>
    <button class="btn btn-default"><i class="fa fa-refresh"></i></button>
    <button class="btn btn-default"><i class="fa fa-check"></i></button>
    <button class="btn btn-default"><i class="fa fa-close"></i></button>
    <button class="btn btn-default"><i class="fa fa-navicon"></i></button>
    <button class="btn btn-default"><i class="fa fa-map"></i></button>
    <button class="btn btn-default"><i class="fa fa-check-circle"></i></button>
    <button class="btn btn-default"><i class="fa fa-line-chart"></i></button>
    <button class="btn btn-default"><i class="fa fa-map"></i></button>
    <button class="btn btn-default"><i class="fa fa-phone"></i></button>

    <div class="page-header">
        <h3>ONLY ICON WITH COLOR</h3>
    </div>

    <button class="btn btn-primary"><i class="fa fa-home"></i></button>
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
    <button class="btn btn-success"><i class="fa fa-ellipsis-v"></i></button>
    <button class="btn btn-warning"><i class="fa fa-forward"></i></button>
    <button class="btn btn-danger"><i class="fa fa-backward"></i></button>
    <button class="btn bg-teal"><i class="fa fa-refresh"></i></button>
    <button class="btn bg-orange"><i class="fa fa-check"></i></button>
    <button class="btn bg-cyan"><i class="fa fa-close"></i></button>
    <button class="btn bg-lightgreen"><i class="fa fa-navicon"></i></button>
    <button class="btn bg-lime"><i class="fa fa-map"></i></button>
    <button class="btn bg-amber"><i class="fa fa-check-circle"></i></button>
    <button class="btn bg-gray"><i class="fa fa-line-chart"></i></button>
    <button class="btn bg-lightblue"><i class="fa fa-map"></i></button>
    <button class="btn bg-deeporange"><i class="fa fa-phone"></i></button>



    <div class="page-header">
        <h3>OUTLINE</h3>
    </div>

    <div class="btn-demo">
        <button class="btn btn-default btn-outline">Default</button>
        <button class="btn btn-info btn-outline">Info</button>
        <button class="btn btn-primary btn-outline">Primary</button>
        <button class="btn btn-success btn-outline">Success</button>
        <button class="btn btn-warning btn-outline">Warning</button>
        <button class="btn btn-danger btn-outline">Danger</button>
    </div>



    <div class="page-header">
        <h3>CIRCLE ICON</h3>
    </div>


    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-home"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-search"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-ellipsis-v"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-forward"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-backward"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-refresh"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-check"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-close"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-navicon"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-map"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-check-circle"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-line-chart"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-map"></i></button>
    <button class="btn btn-default btn-icon btn-circle"><i class="fa fa-phone"></i></button>

    <div class="page-header">
        <h3>CIRCLE ICON WITH COLOR</h3>
    </div>
    <button class="btn btn-primary btn-icon btn-circle"><i class="fa fa-home"></i></button>
    <button class="btn btn-info btn-icon btn-circle"><i class="fa fa-search"></i></button>
    <button class="btn btn-success btn-icon btn-circle"><i class="fa fa-ellipsis-v"></i></button>
    <button class="btn btn-warning btn-icon btn-circle"><i class="fa fa-forward"></i></button>
    <button class="btn btn-danger btn-icon btn-circle"><i class="fa fa-backward"></i></button>
    <button class="btn bg-teal btn-icon btn-circle"><i class="fa fa-refresh"></i></button>
    <button class="btn bg-orange btn-icon btn-circle"><i class="fa fa-check"></i></button>
    <button class="btn bg-cyan btn-icon btn-circle"><i class="fa fa-close"></i></button>
    <button class="btn bg-lightgreen btn-icon btn-circle"><i class="fa fa-navicon"></i></button>
    <button class="btn bg-lime btn-icon btn-circle"><i class="fa fa-map"></i></button>
    <button class="btn bg-amber btn-icon btn-circle"><i class="fa fa-check-circle"></i></button>
    <button class="btn bg-gray btn-icon btn-circle"><i class="fa fa-line-chart"></i></button>
    <button class="btn bg-lightblue btn-icon btn-circle"><i class="fa fa-map"></i></button>
    <button class="btn bg-deeporange btn-icon btn-circle"><i class="fa fa-phone"></i></button>


    <button class="btn btn-primary btn-outline btn-icon btn-circle"><i class="fa fa-home"></i></button>
    <button class="btn btn-info btn-outline btn-icon btn-circle"><i class="fa fa-search"></i></button>
    <button class="btn btn-success btn-outline btn-icon btn-circle"><i class="fa fa-ellipsis-v"></i></button>
    <button class="btn btn-warning btn-outline btn-icon btn-circle"><i class="fa fa-forward"></i></button>
    <button class="btn btn-danger btn-outline btn-icon btn-circle"><i class="fa fa-backward"></i></button>



    <div class="page-header">
        <h3>BLOCK</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-default btn-block">Default</button>
            <button class="btn btn-primary btn-block">Primary</button>
        </div>

    </div>


    <div class="page-header">
        <h3>GROUP</h3>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-default">Left</button>
        <button type="button" class="btn btn-default">Middle</button>
        <button type="button" class="btn btn-default">Right</button>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-primary">Left</button>
        <button type="button" class="btn btn-primary">Middle</button>
        <button type="button" class="btn btn-primary">Right</button>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-info">Left</button>
        <button type="button" class="btn btn-info">Middle</button>
        <button type="button" class="btn btn-info">Right</button>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-success">Left</button>
        <button type="button" class="btn btn-success">Middle</button>
        <button type="button" class="btn btn-success">Right</button>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-warning">Left</button>
        <button type="button" class="btn btn-warning">Middle</button>
        <button type="button" class="btn btn-warning">Right</button>
    </div>

    <div class="page-header">
        <h3>TOOLBAR</h3>
    </div>
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group">
            <button type="button" class="btn btn-default">1</button>
            <button type="button" class="btn btn-default">2</button>
            <button type="button" class="btn btn-default">3</button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default">4</button>
            <button type="button" class="btn btn-default">5</button>
            <button type="button" class="btn btn-default">6</button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default">7</button>
            <button type="button" class="btn btn-default">8</button>
            <button type="button" class="btn btn-default">9</button>
        </div>
    </div>

    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">1</button>
            <button type="button" class="btn btn-primary">2</button>
            <button type="button" class="btn btn-primary">3</button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-primary">4</button>
            <button type="button" class="btn btn-primary">5</button>
            <button type="button" class="btn btn-primary">6</button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-primary">7</button>
            <button type="button" class="btn btn-primary">8</button>
            <button type="button" class="btn btn-primary">9</button>
        </div>
    </div>

    <div class="page-header">
        <h3>GROUP SIZING</h3>
    </div>

    <div class="btn-group-demo">
        <div class="btn-group btn-group-lg" role="group">
            <button type="button" class="btn btn-default">Left</button>
            <button type="button" class="btn btn-default">Middle</button>
            <button type="button" class="btn btn-default">Right</button>
        </div>

        <div class="btn-group btn-group-lg" role="group">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </div>
    <br>

    <div class="btn-group-demo">
        <div class="btn-group btn-group" role="group">
            <button type="button" class="btn btn-default">Left</button>
            <button type="button" class="btn btn-default">Middle</button>
            <button type="button" class="btn btn-default">Right</button>
        </div>

        <div class="btn-group btn-group" role="group">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </div>
    <br>

    <div class="btn-group-demo">
        <div class="btn-group btn-group-sm" role="group">
            <button type="button" class="btn btn-default">Left</button>
            <button type="button" class="btn btn-default">Middle</button>
            <button type="button" class="btn btn-default">Right</button>
        </div>

        <div class="btn-group btn-group-sm" role="group">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </div>

    <br>

    <div class="btn-group-demo">
        <div class="btn-group btn-group-xs" role="group">
            <button type="button" class="btn btn-default">Left</button>
            <button type="button" class="btn btn-default">Middle</button>
            <button type="button" class="btn btn-default">Right</button>
        </div>

        <div class="btn-group btn-group-xs" role="group">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </div>




    <div class="page-header">
        <h3>JUSTIFIED GROUP</h3>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Left</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Middle</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Right</button>
        </div>
    </div>

    <br>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Left</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Middle</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Right</button>
        </div>
    </div>


    <div class="page-header">
        <h3>NESTING</h3>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-default">1</button>
        <button type="button" class="btn btn-default">2</button>

        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-primary">1</button>
        <button type="button" class="btn btn-primary">2</button>

        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
    </div>



    <div class="page-header">
        <h3>CHECKBOX</h3>
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="checkbox" autocomplete="off" checked> Checkbox 1 (pre-checked)
        </label>
        <label class="btn btn-default">
            <input type="checkbox" autocomplete="off"> Checkbox 2
        </label>
        <label class="btn btn-default">
            <input type="checkbox" autocomplete="off"> Checkbox 3
        </label>
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-info active">
            <input type="checkbox" autocomplete="off" checked> Checkbox 1 (pre-checked)
        </label>
        <label class="btn btn-info">
            <input type="checkbox" autocomplete="off"> Checkbox 2
        </label>
        <label class="btn btn-info">
            <input type="checkbox" autocomplete="off"> Checkbox 3
        </label>
    </div>

    <div class="page-header">
        <h3>RADIOBOX</h3>
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-danger active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
        </label>
        <label class="btn btn-danger">
            <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
        </label>
        <label class="btn btn-danger">
            <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
        </label>
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-warning active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
        </label>
        <label class="btn btn-warning">
            <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
        </label>
        <label class="btn btn-warning">
            <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
        </label>
    </div>

    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
        </label>
    </div>





    <div class="page-header">
        <h3>PAGINATION</h3>
    </div>

    <h6 class="">DEFAULT</h6>

    <ul class="pagination">
        <li class="disabled"><a href="#" class="fa fa-angle-left"></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="fa fa-angle-right"></a></li>
    </ul>

    <h6 class="">SIZES</h6>

    <ul class="pagination pagination-lg">
        <li><a href="#" class="fa fa-angle-left"></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="fa fa-angle-right"></a></li>
    </ul>
    <ul class="pagination">
        <li><a href="#" class="fa fa-angle-left"></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="fa fa-angle-right"></a></li>
    </ul>
    <ul class="pagination pagination-sm">
        <li><a href="#" class="fa fa-angle-left"></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="fa fa-angle-right"></a></li>
    </ul>

    <div class="page-header">
        <h3>PAGER</h3>
    </div>
    <ul class="pager">
        <li class="disabled"><a href="#">← Older</a></li>
        <li><a href="#">Newer →</a></li>
    </ul>
    <ul class="pager">
        <li class="previous"><a href="#">← Older</a></li>
        <li class="next"><a href="#">Newer →</a></li>
    </ul>


</div>
@endsection
