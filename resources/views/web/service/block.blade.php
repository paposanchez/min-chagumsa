@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">


        <div class="page-header">
                <h3>DEFAULT</h3>
        </div>

        <div class="block" role="block">Well done! This is default Alert Message.</div>
        <div class="block block-homescreen" role="block">홈스크린.</div>
        
        

</div>
@endsection
