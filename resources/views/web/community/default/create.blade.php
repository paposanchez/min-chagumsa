@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.notice')])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">

        <div class="col-md-3">
            @include( 'web.partials.submenu.community' )
        </div>

        <div class="col-md-9">


        </div>

    </div>

</div>
@endsection

@section( 'footer-script' )
<script type="text/javascript">
    $(function () {

    });
</script>
@endsection
