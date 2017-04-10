@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

    <div class="page-header">
        <h3>jQuery Knob</h3>
    </div>
    <div class="row">
        <div class="col-md-2">
            <p>Display value</p>
            <input class="knob" data-toggle="knob" data-width="100" data-height="120" data-min="-100" data-displayPrevious=true data-fgColor="#26B99A" value="44">
        </div>
        <div class="col-md-2">
            <p>&#215; 'cursor' mode</p>
            <input class="knob" data-toggle="knob" data-width="100" data-height="120" data-cursor=true data-fgColor="#34495E" value="29">
        </div>
        <div class="col-md-2">
            <p>Step 0.1</p>
            <input class="knob" data-toggle="knob" data-width="100" data-height="120" data-min="-10000" data-displayPrevious=true data-fgColor="#26B99A" data-max="10000" data-step=".1" value="0">
        </div>
        <div class="col-md-2">
            <p>Angle arc</p>
            <input class="knob" data-toggle="knob" data-width="100" data-height="120" data-angleOffset=-125 data-angleArc=250 data-fgColor="#34495E" data-rotation="anticlockwise" value="35">
        </div>
        <div class="col-md-2">
            <p>Alternate design</p>
            <input class="knob" data-toggle="knob" data-width="110" data-height="120" data-displayPrevious=true data-fgColor="#26B99A" data-skin="tron" data-thickness=".2" value="75">
        </div>
        <div class="col-md-2">
            <p>Angle offset</p>
            <input class="knob" data-toggle="knob" data-width="100" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
        </div>
    </div>

</div>


@endsection
