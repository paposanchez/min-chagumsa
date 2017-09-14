@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
<div class="container-fluid">


        <div class="row">

                @foreach($entrys['entrys'] as $entry)

                        @foreach($entry as $rows)

                                {{ $rows['name'] }}

                        @endforeach

                @endforeach


        </div>

</div>
@endsection

@push( 'footer-script' )
<script type="text/javascript">

</script>
@endpush
