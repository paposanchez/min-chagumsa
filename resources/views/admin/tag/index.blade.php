@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.config.tag')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row margin-bottom">

        <div class="col-md-12">

            <p class="form-control-static">
                {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
            </p>

            <table class="table text-middle text-center">
                <colgroup>
                    <col width="10%">
                    <col width="20%" class="">
                    <col width="*" class=" ">
                    <col width="10%" class="">
                    <col width="10%">
                </colgroup>

                <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-center">이름</th>
                        <th class="">설명</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">처리</th>
                    </tr>
                </thead>

                <tbody>

                    @unless(count($entrys) >0)
                    <tr><td colspan="5" class="no-result">{{ trans('common.no-result') }}</td></tr>
                    @endunless

                    @foreach ($entrys as $key => $data)
                    <tr>
                        <td>{{ $data->name }}</td>

                        <td>{{ $data->display_name }}</td>

                        <td class="text-left">{{ $data->description }}</td>

                        <td>{{ $data->created_at->format('Y.m.d') }}</td>

                        <td>
                            <a href="{{ route('role.edit', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="수정">수정</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>


    <div class="row">

        <div class="col-sm-6">

            <a href="{{ route('role.create') }}" class="btn btn-primary">등록</a>

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
