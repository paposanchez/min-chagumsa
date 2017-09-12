@extends( 'mobile.layouts.default' )

@section( 'content' )
    <div id='sub_title_wrap'>1:1문의</div>

    <ul class='board_list_wrap'>
        @foreach($entrys as $key => $entry)
            <li><a href='{{ route("inquire.show", ["id" => $entry->id]) }}' class='faq_wait'>
                    <div>{{ $entry->subject }}</div>
                    <span>{{ Carbon\Carbon::parse($entry->created_at)->format('Y-m-d') }}</span>
                </a>
            </li>

        @endforeach
    </ul>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;' id="write" data-url="{{ url("/community/inquire/create") }}">글쓰기</button>
        </div>

    </div>


@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $("#write").on("click", function () {
            location.href = $(this).data("url");
        })
    })
</script>

@endpush