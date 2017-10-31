@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>FAQ</div>

    <dl class='faq_view_wrap'>
        <dt>회원가입은 유료인가요? 결제는 어떻게 해야하나요?</dt>
        <dd>네. 회원가입은 무료이며, 인증 신청 시 국산차와 수입차에 따라 별도의 요금이 청구됩니다.</dd>
    </dl>

    <div class='br20'></div>

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button class='btns btns_navy' style='display:inline-block;' id="list"  data-url="{{ route('mobile.'.$board_namespace.'.index') }}">목록</button>
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