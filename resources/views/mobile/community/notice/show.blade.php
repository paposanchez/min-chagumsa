@extends( 'mobile.layouts.default' )

@section( 'content' )


    <div id='sub_title_wrap'>공지사항</div>

    <ul class='board_title_wrap'>
        <li>
            <div class='notice'>{{ $data->subject }}</div>
            <span>{{ $data->updated_at ? $data->updated_at->format("Y년m월d일") : $data->created_at->format("Y년m월d일") }}</span>
        </li>
    </ul>

    <div class='board_view_wrap'>
        <div class='board_view_cont'>
            <!-- 컨텐츠 -->
            {!! $data->content !!}
            <!-- 컨텐츠 -->
        </div>

    </div>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' type="button" style='display:inline-block;'>목록</button>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){
        $(".btns_navy").on("click", function () {
            location.href = "{{ url()->previous() }}";
        })
    })
</script>
@endpush