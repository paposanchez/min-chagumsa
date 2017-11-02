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
                <a href='http://cert.chagumsa.com/{{ $order->car_number }}-{{ \App\Models\Order::find($order->id)->created_at->format('ymd')}}/mobile-summary'><div>{{ $order->getOrderNumber() }}</div></a>
            </div>
            <div class='cert_box_cont'>
                <div class='cert_box_cont_img thumbnail'>
                    <img src="http://image.chagumsa.com/diagnosis/{{ $order->getExteriorPicture()[0]->files[0]->id }}-264.png" alt='차량 이미지'>
                </div>
                <div class='cert_box_cont_info'>
                    <ul>
                        <li><label>차량</label><span>{{ $order->getCarFullName() }}</span></li>
                        <li><label>연식</label><span>{{ $order->car->year }} 년식</span></li>
                        <li><label>사용연료</label><span>{{ $order->car->getFuelType->display() }}</span></li>
                        <li><label>주행거리</label><span>{{ number_format($order->mileage) }} km</span></li>
                        <li>
                            <label>인증서발급일</label><span>{{ $order->certificates->updated_at ? $order->certificates->updated_at->format('Y년 m월 d일') : '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class='cert_box_cont_result'>
                <ul>
                    <li><label>산정가격</label><span>{{ number_format($order->certificates->valuation) }}만원</span></li>
                    <li><label>차량 성능 등급</label><span>{{ $order->certificates->certificate_grade->display() }}</span></li>
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

                        ><span>공개여부를 변경하세요.</span>
                    </label>
                </div>
                <div class='cert_detail'>
                    <a class='btn btn-default fa fa-search' id="certi-view"
                       href="http://cert.chagumsa.com/{{ $order->car_number }}-{{ \App\Models\Order::find($order->id)->created_at->format('ymd')}}/mobile-summary"

                    >
                        상세보기
                    </a>
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
            var car_number = $(this).data('car_number');
            var datekey = $(this).data('datekey');
            location.location = "http://cert.chagumsa.com/"+car_number+"-"+datekey+"/mobile-summary";
        });

        $('.open_cd').on('click', function () {


            var open_value = $(this).data('public');

            if ($(this).prop('checked')) {
                open_value = $(this).data('public');
            } else {
                open_value = $(this).data('private');
            }

            $.ajax({
                type: 'get',
                url: '/certificate/change-open-cd',
                data: {
                    'open_cd': open_value,
                    'order_id': $(this).data('idx')
                },
                success: function (response) {
                    alert(response);
                },
                error: function (data) {
                    alert('처리중 오류가 발생했습니다.');
                }
            });


            if ($(this).prop('checked')) {

            }


        });


    });
</script>

@endpush