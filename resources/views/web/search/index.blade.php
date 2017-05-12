@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>인증서 조회<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 조회</span></div></h2></div>

<div id='sub_wrap'>

    <h3>{{ Html::image(Helper::theme_web( '/img/sub/cert_icon.png')) }}<div class='br20'></div>입력하신 인증서번호 또는 차량번호가 정확하지 않습니다.</h3>
    <h5>인증서번호 또는 차량번호를 다시 확인한 후 입력해 주세요.</h5>

    <div class='br30'></div>

    <div class='ipt_box wid33'>
        <form action="{{ route('search.index') }}">
            <div class='mv_cert_search_wrap'>
                <input type='text' name="q" placeholder='인증서번호 또는 차량번호' value="{{ request("q") }}">
                <button type='submit'><i class="fa fa-search" ></i></button>
            </div>
        </form>
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
