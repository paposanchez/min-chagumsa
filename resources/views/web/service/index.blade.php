@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">

        <div class="page-header">
                <h3>COLORS</h3>
        </div>
        <div class="block bg-default">DEFAULT</div>
        <div class="row">

                <div class="col-md-6">
                        <div class="block bg-primary">PRIMARY</div>
                        <div class="block bg-info">INFO</div>
                        <div class="block bg-success">SUCCESS</div>
                        <div class="block bg-warning">WARNING</div>
                        <div class="block bg-danger">DANGER</div>

                        <hr>

                        <div class="block bg-cyan">Cyan</div>
                        <div class="block bg-teal">Teal</div>
                        <div class="block bg-amber">Amber</div>
                        <div class="block bg-orange">Orange</div>
                        <div class="block bg-deeporange">Deep Orange</div>
                        <div class="block bg-red">Red</div>
                        <div class="block bg-pink">Pink</div>
                        <div class="block bg-lightblue">Light Blue</div>
                        <div class="block bg-blue">Blue</div>
                        <div class="block bg-indigo">Indigo</div>
                        <div class="block bg-lime">Lime</div>
                        <div class="block bg-lightgreen">Light Green</div>
                        <div class="block bg-green">Green</div>
                        <div class="block bg-purple">Purple</div>
                        <div class="block bg-deeppurple">Deep Purple</div>
                        <div class="block bg-gray">Gray</div>
                        <div class="block bg-bluegray">Blue Gray</div>
                </div>

                <div class="col-md-6">
                        <div class="block dark bg-primary">PRIMARY DARK</div>
                        <div class="block dark bg-info">INFO DARK</div>
                        <div class="block dark bg-success">SUCCESS DARK</div>
                        <div class="block dark bg-warning">WARNING DARK</div>
                        <div class="block dark bg-danger">DANGER DARK</div>

                        <hr>

                        <div class="block dark bg-cyan">Cyan</div>
                        <div class="block dark bg-teal">Teal</div>
                        <div class="block dark bg-amber">Amber</div>
                        <div class="block dark bg-orange">Orange</div>
                        <div class="block dark bg-deeporange">Deep Orange</div>
                        <div class="block dark bg-red">Red</div>
                        <div class="block dark bg-pink">Pink</div>
                        <div class="block dark bg-lightblue">Light Blue</div>
                        <div class="block dark bg-blue">Blue</div>
                        <div class="block dark bg-indigo">Indigo</div>
                        <div class="block dark bg-lime">Lime</div>
                        <div class="block dark bg-lightgreen">Light Green</div>
                        <div class="block dark bg-green">Green</div>
                        <div class="block dark bg-purple">Purple</div>
                        <div class="block dark bg-deeppurple">Deep Purple</div>
                        <div class="block dark bg-gray">Gray</div>
                        <div class="block dark bg-bluegray">Blue Gray</div>

                </div>

        </div>





</div>
@endsection
