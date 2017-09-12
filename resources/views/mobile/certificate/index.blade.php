@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>My 인증서</div>

    <div id='cert_list_wrap'>

        <div class='cert_list_title'>총 <strong>{{ count($orders) }}</strong>개의 인증서를 발급하셨습니다.</div>

        @unless(count($orders))
            <div class="no-result">

                발급받은 인증서가 존재하지 않습니다.
            </div>
        @endunless

        @foreach($orders as $key => $order)
        <div class='cert_list_box{{($order->certificates->isExpired())? " expire": ''}}'>
                    <div class='cert_box_head'>
                <a href=''><div>{{ $order->getCarFullName() }}</div></a>
            </div>
            <div class='cert_box_cont'>
                <div class='cert_box_cont_img'>
                    <img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
                </div>
                <div class='cert_box_cont_info'>
                    <ul>
                        <li><label>차대번호</label><span>{{ $order->car->vin_number }}</span></li>
                        <li><label>인증서발급일</label><span>{{ $order->certificates->updated_at ? $order->certificates->updated_at->format('Y년 m월 d일') : '-' }}</span></li>
                        <li><label>보증기간</label><span>{{ $order->certificates->getExpireDate()->format("Y년 m월 d일 ") }} 까지</span></li>
                    </ul>
                </div>
            </div>
            <div class='cert_box_cont_result'>
                <ul>
                    <li><label>산정가격</label><span>{{ number_format($order->certificates->price) }}만원</span></li>
                    <li><label>차량 성능 등급</label><span>{{ $order->certificates->grade }}</span></li>
                </ul>
            </div>
            <div class='cert_box_foot'>
                <div class="checkbox checkbox-slider--c checkbox-slider-md">
                    <label>
                        <input type="checkbox" class="open_cd" {{ $order->open_cd == '' }} data-idx="{{ $order->id }}"
                               @foreach($select_open_cd as $key => $val)
                               data-{{ $val }}="{{ $key }}"

                               @if($val == 'public' && $order->open_cd == $key)
                               checked
                                @endif
                                @endforeach

                        ><span>&nbsp;다른 사람이 인증서를 볼 수 있도록 하려면 인증서 공개로 변경하세요.</span>
                    </label>
                </div>
                <div class='cert_detail'>
                    <button class='btn btn-default fa fa-search detail' data-idx="{{ $order->id }}">
                        상세보기
                    </button>
                </div>
            </div>
        </div>
        @endforeach


    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $('.detail').click(function () {
            var order_id = $(this).data('idx');
            window.open('/certificate/' + order_id + '/summary', "", "width=1400, height=1400");
        });
    });
</script>

@endpush