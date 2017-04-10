@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.config')])
@endsection

@section( 'content' )

<div class="container-fluid">

    <div class="row margin-bottom">

        <div class="col-md-12">

            <p class="form-control-static">
                {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
            </p>

            <table class="table text-center">
                <colgroup>
                    <col width="10%">
                    <col width="25%">
                    <col width="*"> 
                    <col width="20%">
                </colgroup>

                <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-center">GROUP</th>                        
                        <th class="text-center">NAME</th>
                        <th class="text-center">수정일</th>
                    </tr>
                </thead>

                <tbody>

                    @unless(count($entrys) >0)
                    <tr><td colspan="3" class="no-result">{{ trans('common.no-result') }}</td></tr>
                    @endunless

                    @foreach($entrys as $n => $data)
                    <tr>
                        <td>
                            {{ $data->id }}
                        </td>
                        <td class="">
                            {{ $data->group }}
                        </td>

                        <td>
                            {{ $data->name }}
                        </td>

                        <td>
                            {{ $data->updated_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>


    <div class="row">

        <div class="col-sm-6">

        </div>

        <div class="col-sm-6 text-right">
            {!! $entrys->render() !!}
        </div>

    </div>

</div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">

</script>
@endsection
