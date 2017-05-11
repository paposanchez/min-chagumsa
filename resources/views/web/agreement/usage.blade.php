@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'><h2>약관 및 정책<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>이용약관</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='select' href='{{ route('agreement.usage') }}'>이용약관</a></li>
        <li><a class='' href='{{ route('agreement.term') }}'>전자금융거래약관</a></li>
        <li><a class='' href='{{ route('agreement.privacy') }}'>개인정보취급방침</a></li>
    </ul>

    <div class='br30'></div>

    <div class='term_wrap'>
        @include( 'web.partials.agreement.usage' )
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
