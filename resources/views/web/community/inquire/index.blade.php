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
                        <div class="card-header">
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
                                        <tr class="">
                                                <th class="text-center">번호</th>
                                                <th>제목</th>
                                                <th class="text-center">작성일</th>
                                                <th class="text-center">답변여부</th>
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
                                                <td><a href="{{ route("inquire.show", ["id" => $entry->id]) }}">{{ $entry->subject }}</a></td>
                                                <td class="text-center">
                                                        {{ $entry->created_at->format('Y-m-d') }}</th>
                                                        <td class="text-center">
                                                                @if($entry->is_answered == 0)
                                                                <span class="label label-primary">미답변</span>
                                                                @else
                                                                <span class="label label-success">답변완료</span>
                                                                @endif
                                                        </td>
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
