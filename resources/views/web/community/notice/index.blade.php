@extends( 'web.layouts.default' )

@section( 'content' )
<div class="hometainer hometainer-sub bgm-black text-center">
        <div class="container">
                <h1 class="c-white"> is a fully responsive landing page template</h1>
                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                <a href="" class="btn btn-danger">Get Started</a>
        </div>
</div>

<section id="content" class="content-alt">

        <div class="container">

                <div class="card">
                        <div class="card-header ch-alt">
                            <h2>공지사항
                                <small class="">총 12개의 게시물이 등록되어 있습니다.</small>
                            </h2>
                        </div>

                        <table class="table table-hover ">
                                <colgroup>
                                        <col width='110px;'>
                                        <col width='*'>
                                        <col width='135px;'>
                                        <col width='130px;'>
                                </colgroup>
                                <thead>
                                        <tr class="highlight">
                                                <th class="text-center">번호</th>
                                                <th>제목</th>
                                                <th class="text-center">작성일</th>
                                                <th class="text-center">조회</th>
                                        </tr>
                                </thead>

                                <tbody>

                                        @unless($entrys)
                                        <tr>
                                                <td colspan="4" class="no-result">등록된 공지사항이 없습니다.</td>
                                        </tr>
                                        @endunless

                                        @foreach($entrys as $key => $row)
                                        <tr>
                                                <td class="text-center">{{ $start_num - $key }}</td>
                                                <td>
                                                        <a href="{{ route("notice.show", ["id" => $row->id]) }}">{{ mb_strimwidth($row->subject, 0, 100, '...') }}</a>
                                                </td>
                                                <td class="text-center">{{ $row->updated_at ? $row->updated_at->format("Y-m-d") : $row->created_at->format("Y-m-d") }}</td>
                                                <td class="text-center">{{ number_format($row->hit) }}</td>
                                        </tr>
                                        @endforeach


                                </tbody>
                        </table>

                        {{--page navigation--}}
                        {!! $entrys->render() !!}
                </div>

        </div>
</section>
@endsection
