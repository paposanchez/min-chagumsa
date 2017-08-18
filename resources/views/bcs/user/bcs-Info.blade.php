@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            {!! Form::open(['method' => 'POST','route' => ['user.bcs-store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}



            {!! Form::close() !!}

        </div>
    </div>

</div>


@endsection


@push( 'footer-script' )
    <script type="text/javascript">

    </script>
@endpush
