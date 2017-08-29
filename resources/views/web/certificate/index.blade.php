@extends( 'web.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'>
        <h2>My 인증서<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>My 인증서</span></div></h2>
</div>

<div id='cert_list_wrap'>

        <div class='cert_list_title'>총 <strong>{{ count($orders) }}</strong>개의 인증서를 발급하셨습니다.</div>

        @unless(count($orders))
        <div class="no-result">

                발급받은 인증서가 존재하지 않습니다.
        </div>
        @endunless

        @foreach($orders as $key => $order)
        <div class="cert_list_box
        @if($order->certificates->isExpired())
        expire
        @endif
        ">
                <div class='cert_box_head'>
                        <div>{{ $order->getOrderNumber() }}</div>
                        <span><strong>보증기간</strong> {{ $order->certificates->getExpireDate()->format("Y년 m월 d일 ") }} 까지</span>
                </div>
                <div class='cert_box_cont'>
                        <div class='cert_box_cont_img'>
                                <img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
                        </div>
                        <div class='cert_box_cont_info'>
                                <ul>
                                        <li><label>차량</label><span>{{ $order->getCarFullName() }}</span></li>
                                        <li><label>연식</label><span>{{ $order->car->year }} 년식</span></li>
                                        <li><label>사용연료</label><span>{{ $order->car->getFuelType->display() }}</span></li>
                                        <li><label>주행거리</label><span>{{ number_format($order->mileage) }} km</span></li>
                                        <li><label>차대번호</label><span>{{ $order->car->vin_number }}</span></li>
                                        <li><label>인증서발급일</label><span>{{ $order->certificates->updated_at->format('Y년 m월 d일') }}</span></li>

                                </ul>
                        </div>
                        <div class='cert_box_cont_result'>
                                <div><label>산정가격</label><span><strong>{{ number_format($order->certificates->price) }} </strong>만원</span></div>
                                <div><label>차량 성능 등급</label><span><strong>{{ $order->certificates->grade }}</strong></span></div>
                        </div>
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
$(function (){
        $('.detail').click(function(){
                var order_id = $(this).data('idx');
                window.open('/certificate/'+order_id+'/summary',"", "width=1400, height=1400");
        });

        $('.open_cd').on('click',function (){


                var open_value = $(this).data('public');

                if($(this).prop('checked')) {
                        open_value = $(this).data('public');
                }else{
                        open_value = $(this).data('private');
                }

                $.ajax({
                        type : 'get',
                        url : '/certificate/change-open-cd',
                        data : {
                                'open_cd' : open_value,
                                'order_id' :  $(this).data('idx')
                        },
                        success : function (response) {
                                alert(response);

                                // $.notify({
                                //         type: 'info'
                                // }, {
                                //         element: 'body',
                                //         allow_dismiss: true,
                                //         animate: {
                                //                 enter: 'animated fadeInDown',
                                //                 exit: 'animated fadeOutUp'
                                //         },
                                //         message : response
                                // });
                        },
                        error : function (data) {
                                alert('처리중 오류가 발생했습니다.');
                        }
                });


                if($(this).prop('checked')) {

                }


        });

});
</script>
@endpush
