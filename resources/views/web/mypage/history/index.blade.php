@extends( 'web.layouts.default' )

@section('breadcrumbs')
    @includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.mypage.history')])
@endsection

@section( 'content' )
    <div class="container">

        <div class="row">

            <div class="col-md-3 hidden-sm hidden-xs">
                @include( 'web.partials.submenu.mypage' )
            </div>

            <div class="col-md-9">

                <table class="table">
                    <colgroup>
                        <col width="10%"/>
                        <col width=""/>
                        <col width="10%"/>
                        <col width="10%"/>
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th>#</th>
                        <th class="text-left">내용</th>
                        <th>등록일</th>
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
                            <td>{{ $entry->id }}</td>

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

@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {

        });
    </script>
@endpush
