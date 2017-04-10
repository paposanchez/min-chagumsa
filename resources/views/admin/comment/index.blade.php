@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.comment')])
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
                    <col width="*">
                    <col width="10%">
                    <col width="8%">
                    <col width="8%">
                    <col width="10%">
                </colgroup>

                <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-left">내용</th>
                        <th class="text-center">작성자</th>
                        <th class="text-center">상태</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">처리</th>
                    </tr>
                </thead>

                <tbody>

                    @unless(count($entrys) >0)
                    <tr><td colspan="6" class="no-result">{{ trans('common.no-result') }}</td></tr>
                    @endunless

                    @foreach($entrys as $n => $data)
                    <tr>
                        <td class="">
                            {{ $data->id }}
                        </td>

                        <td class="">
                            {{ $data->content }}
                        </td>

                        <td class="">
                            @if($data->user_id)
                            <a href="{{ route("post.index", ['user_id'=> $data->user_id]) }}">
                                @endif
                                {{ $data->name or '-' }}
                                @if($data->user_id)
                            </a>
                            @endif
                        </td>

                        <td class="">
                            <span class="label label-default">{{ $data->shown->name }}</span>
                        </td>

                        <td class="">
                            {{ $data->created_at->format('Y.m.d') }}
                        </td>

                        <td>
                            <a href="{{ route('post.edit', $data->id) }}" class="btn btn-default"  data-tooltip="{pos:'top'}" title="수정">수정</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>


    <div class="row">

        <div class="col-sm-6">

            <a href="{{ route('comment.create') }}" class="btn btn-primary">등록</a>

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
