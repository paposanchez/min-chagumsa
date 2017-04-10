@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )
<div class="container">

    <div class="row">

        <div class="col-md-3 hidden-sm hidden-xs">
            @include( 'web.partials.submenu.community' )
        </div>

        <div class="col-md-9">

            <!--<h3 class="">공지사항 <small>많은 정보를 알려드립니다.</small></h3>-->
            <h3 class="">&nbsp;</h3>

            <table class="table text-middle text-center">
                <colgroup>
                    <col width="8%">
                    <col width="*">
                    <col width="15%">
                    <col width="8%">
                </colgroup>

                <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-left">제목</th>
                        <th class="text-center">작성자</th>
                        <th class="text-center">등록일</th>
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

                        <td class="text-left">
                            <a href="{{ route($board_namespace.'.show', $data->id) }}" class="">
                                {{ str_limit($data->subject, 80) }}
                            </a>
                        </td>


                        <td class="">
                            {{ $data->name or '-' }}
                        </td>

                        <td class="">
                            {{ $data->created_at->format('Y.m.d') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="row margin-vertical">

                <div class="col-sm-6">

                    <a href="{{ route($board_namespace.'.create') }}" class="btn btn-primary">글쓰기</a>

                </div>

                <div class="col-sm-6 text-right">
                    {!! $entrys->render() !!}
                </div>

            </div>


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
