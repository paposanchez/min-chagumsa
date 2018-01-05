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
                                <h2>FAQ
                                        <small class="">총 12개의 게시물이 등록되어 있습니다.</small>
                                </h2>
                        </div>

                        <table class="table table-hover ">
                                <colgroup>
                                        <col width='110px;'>
                                        <col width='200px;'>
                                        <col width='*'>

                                </colgroup>
                                <thead>
                                        <tr class="">
                                                <th class="text-center">번호</th>
                                                <th class="text-center">카테고리</th>
                                                <th>제목</th>
                                        </tr>
                                </thead>
                                <tbody>

                                        @unless(count($entrys))
                                        <tr>
                                                <td colspan="4" class="no-result">등록된 문의가 없습니다.</td>
                                        </tr>
                                        @endunless

                                        @foreach($entrys as $key => $entry)
                                        <tr>
                                                <td class="text-center">{{ $start_num - $key }}</td>
                                                <td class="text-center">{{ $entry->category_id }}</td>
                                                <td><a href="{{ route("faq.show", ["id" => $entry->id]) }}">{{ $entry->subject }}</a></td>

                                                @endforeach
                                        </tbody>
                                </table>

                                {{--page navigation--}}
                                {!! $entrys->render() !!}
                        </div>

                </div>
        </section>
        @endsection
