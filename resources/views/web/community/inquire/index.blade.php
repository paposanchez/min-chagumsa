@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
                <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
                <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
                <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>

        <div class='board_wrap_new'>

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
                                        <td class="text-center">{{ $entry->created_at->format('Y-m-d') }}</th>
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
                </div>

                <div class='br30'></div>


                <div class='board_pagination_wrap'>
                        @include('vendor.pagination.web-page', ['paginator' => $entrys])

                        <a href='{{ route('inquire.create') }}' class='btn btn-primary' style="position:absolute; top:0; right:0;">문의하기</a>
                </div>


        </div>
        @endsection


        @push( 'header-script' )
        @endpush

        @push( 'footer-script' )

        <script type="text/javascript">
        $(function(){
                $('#write').click(function(){
                        location.href='{{ route('inquire.create') }}';
                })
        });
        </script>

        @endpush
