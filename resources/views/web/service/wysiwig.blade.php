@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.service')])
@endsection

@section( 'content' )
<div class="container">


        <div class="page-header">
                <h3>DEFAULT</h3>
        </div>


        <div class="page-header">
                <h3>INLINE</h3>
        </div>

    
    
</div>
@endsection
