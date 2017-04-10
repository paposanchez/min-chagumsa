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

            <!--<h3>FAQ <small>자주하는 질문을 찾아보세요.</small></h3>-->
            <h3 class="">&nbsp;</h3>

            <table class="table">
                <colgroup>
                    <col width="10%"/>
                    <col width=""/>
                    <col width="10%"/>
                    <col width="10%"/>
                    <col width="10%"/>
                </colgroup>

                <thead>
                    <tr class="active">
                        <th>번호</th>
                        <th class="text-left">제목</th>
                        <th>구분</th>
                        <th>등록일</th>
                        <th>조회</th>
                    </tr>
                </thead>

                <tbody>
                    @unless (count($entrys) > 0)
                    <tr>
                        <td colspan="5" class="no-result">등록된 게시물이 없습니다.</td>
                    </tr>
                    @endunless

                    @foreach($entrys as $n => $entry)
                    <tr>
                        <td>{{ $entry->post_num }}</td>
                        <td class="text-left"><a href="{{ route('seller.shop.notice.show', $entry->post_num) }}">{{ $entry->subject }}</a></td>
                        <td>{{ $entry->post_kind->code_name }}</td>
                        <td>{{ $entry->created_at->format('Y-m-d') }}</td>
                        <td>{{ number_format($entry->hits) }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="text-center margin-vertical">
                @include('vendor.pagination.default', ['paginator' => $entrys])
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
