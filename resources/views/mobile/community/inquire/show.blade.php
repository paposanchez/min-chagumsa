@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>1:1문의</div>

    <dl class='inquery_view_wrap faq_query'>
        <dt>문의</dt>
        <dd>
            <div>
                {{ $data->subject }}
            </div>
            <span>{{ $data->updated_at ? $data->updated_at->format("Y-m-d") : $data->created_at->format("Y-m-d")  }}</span>
        </dd>
    </dl>
    <dl class='inquery_view_wrap faq_answer'>
        <dd>
            <div> {!! $data->content !!}</div>
            @foreach($files as $file)
                <span>
                    <a href="/file/download/{{$file->id}}">
                    <i class="fa fa-download" aria-hidden="true"></i>&nbsp;{{ $file->original }}
                    </a>
                </span>
                <br>
            @endforeach
        </dd>
        <dt>
            @if($data->is_answered)
                {!! $data->answer !!}
            @else
                답변대기중입니다.
            @endif
        </dt>
    </dl>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;' id="list" data-url="{{ route('mobile.'.$board_namespace.'.index') }}">목록</button>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $("#list").on("click", function () {
            location.href = $(this).data("url");
        })
    })
</script>

@endpush