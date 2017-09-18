@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
<div class="container-fluid">

        <h3>
                <span class="text-lg text-light" id="dia-top">
                        {{ $order->getOrderNumber() }}
                </span>
        </h3>

        <div class="row">
                <div class="col-md-3">
                        <nav class="nav nav-sidebar"
                        id="sidebar-menu">
                        <ul class="list-unstyled main-menu">
                                @foreach($diagnosis['entrys'] as $entrys)
                                <li class="">
                                        <a href="#dia-{{ $entrys['name']['id'] }}">{{ $entrys['name']['display'] }}</a>
                                        <ul class="list-unstyled sub-menu">
                                                @foreach($entrys['entrys'] as $entry)
                                                <li class=""><a href="#dia-{{ $entry['name']['id'] }}">{{ $entry['name']['display'] }}</a></li>
                                                @endforeach
                                        </ul>
                                </li>
                                @endforeach
                        </ul>
                </nav>
        </div>

        <div class="col-md-9">

                <form class="form-horizontal">

                        @foreach($diagnosis['entrys'] as $entrys)
                        <fieldset>


                                <div class="panel panel-default">
                                        <div class="panel-heading" id="dia-{{ $entrys['name']['id'] }}">
                                                <h4>{{ $entrys['name']['display'] }}
                                                        <a href="#dia-top" class="pull-right"><small>상단으로</small></a>
                                                </h4>
                                        </div>


                                        <table class="table">
                                                <col width="25%">
                                                <col width="*">

                                                <tbody>
                                                        @foreach($entrys['entrys'] as $entry)
                                                        <tr>
                                                                <th>{{ $entry['name']['display'] }}</th>
                                                                <td>
                                                                        @foreach($entry['entrys'] as $entry)
                                                                        @include('admin.partials.diagnosis',['entry' =>  $entry])
                                                                        @endforeach


                                                                        <small>{{ var_dump($entry['children']) }}</small>

                                                                        @if(isset($entry['children']))
                                                                        <table class="table table-bordered">
                                                                                <col width="25%">
                                                                                <col width="*">
                                                                                <tbody>
                                                                                        @foreach($entry['children'] as $children)
                                                                                        <tr>
                                                                                                <th>{{ $children['name']['display'] }}</th>
                                                                                                <td>
                                                                                                        <ul class="list-unstyled">
                                                                                                        @foreach($children['entrys'] as $child)
                                                                                                                <li>
                                                                                                                <small>{{ $child['name']['display'] }}</small>
                                                                                                                @include('admin.partials.diagnosis',['entry' =>  $child])
                                                                                                        </li>
                                                                                                        @endforeach
                                                                                                </ul>
                                                                                                </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                </tbody>
                                                                        </table>
                                                                        @endif

                                                                </td>
                                                        </tr>

                                                        @endforeach

                                                </tbody>
                                        </table>



                                </div>

                        </fieldset>
                        @endforeach

                </form>

        </div>
</div>


</div>
@endsection

@push( 'footer-script' )
<script type="text/javascript">

</script>
@endpush
