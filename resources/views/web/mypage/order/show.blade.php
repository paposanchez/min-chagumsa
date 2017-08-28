@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>주문목록</span></div></h2></div>

<div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
                <li><a class='select' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
                <li><a class='' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
        </ul>

        <div class='br30'></div>

        <div class='order_info_box'>


                <div class='order_info_title clearfix '>

                        <span class="text-lg text-light" >{{ $order->getOrderNumber() }}</span>

                        <small class="pull-right text-muted text-light" data-toggle="tooltip" title="주문일자" >{{ $order->created_at->format('Y년 m월 d일 H:i') }}</small>
                </div>

                <div class='order_info_cont'>
                        <div class='order_info_desc'>
                                <span>주문자정보</span>
                                <span>차량정보</span>
                                <span>주문정보</span>
                        </div>

                        <div class='order_info_desc'>
                            <span>{{ $order->orderer_name }} <small class="text-muted">{{ $order->orderer_mobile }}</small></span>
                            <span>{{ $order->getCarFullName() }}</span>
                            <span>{{ $order->item->name }} <small class="text-muted">{{ number_format($order->item->price) }}원</small></span>
                        </div>

                        <div class='order_info_btn text-center'>
                                {{ $order->status->display() }}
                        </div>
                </div>
        </div>

        <br/>
        <br/>

        <div class="row">
                <div class="col-xs-6 order-info-block">
                        <strong class="text-light text-md">주문정보</strong>
                        <div class="block bg-white">
                                <ul>
                                        <li><strong class="text-light text-muted">주문상품</strong> <span>{{ $order->item->name }}</span></li>
                                        <li><strong class="text-light text-muted">결제방법</strong> <span>{{ \App\Helpers\Helper::getCodeName($order->purchase->type) }}</span></li>
                                        <li><strong class="text-light text-muted">결제금액</strong> <span>{{ $order->item->price }}</span></li>
                                        <li><strong class="text-light text-muted">결제일</strong> <span>{{ $order->purchase->updated_at }}</span>

                                                @if( $order->status_cd != 107 && $order->status_cd != 100 )
                                                <a  href="javascript:;" class="pull-right text-muted" id="cancel" data-cancel_order_id="{{ $order->id }}">결제취소</a>
                                                @endif

                                        </li>


                                </ul>
                        </div>
                </div>

                <div class="col-xs-6 order-info-block">


                        <strong class="text-light text-md">예약정보

                                @if( $order->status_cd != 107 && $order->status_cd != 100 )
                                        <a class='pull-right text-danger' href="{{ route('mypage.order.edit_garage', ['order_id' => $order->id]) }}">변경</a>
                                @endif
                        </strong>
                        <div class="block bg-white">
                                <ul>
                                        <li><strong class="text-light text-muted">예약상태</strong> <span>미정</span>
                                        </li>
                                        <li><strong class="text-light text-muted">입고예정일</strong> <span>{{ Carbon\Carbon::parse($order->reservation->reservation_at)->format('Y년 m월 d일') }}</span>
                                                <a href="">예약변경</a>
                                        </li>
                                        <li><strong class="text-light text-muted">입고대리점</strong> <span>{{ $my_garage->name }} <small>{{ $my_garage->tel }}</small></span></li>
                                </ul>
                        </div>

                        <strong class="text-light text-left">차량정보

                                @if( $order->status_cd != 107 && $order->status_cd != 100 )
                                        <a class='pull-right text-sm text-danger ' href="{{ route('mypage.order.edit_car', ['order_id' => $order->id]) }}">변경</a>
                                @endif
                        </strong>
                        <br class="clearfix"/>
                        <div class="block bg-white">
                                <ul>
                                        <li><strong class="text-light text-muted">차량번호</strong> <span>{{ $order->car_number }}</span></li>
                                        <li><strong class="text-light text-muted">제조사</strong> <span>{{ $order->orderCar->brand->name }}</span></li>
                                        <li><strong class="text-light text-muted">모델</strong> <span>{{ $order->orderCar->models->name }}</span></li>
                                        <li><strong class="text-light text-muted">세무보델</strong> <span>{{ $order->orderCar->detail->name }}</span></li>
                                        <li><strong class="text-light text-muted">등급</strong> <span>{{ $order->orderCar->grade->name }}</span></li>
                                        <li><strong class="text-light text-muted">침수여부</strong> <span>{{ $order->orderCar->flooding }}</span></li>
                                        <li><strong class="text-light text-muted">사고여부</strong> <span>{{ $order->orderCar->accident }}</span></li>
                                        <li><strong class="text-light text-muted">옵션</strong> <span>{{ $features }}</span></li>

                                </ul>
                        </div>
                </div>
        </div>


        <div class='ipt_line wid25'>
                <button class='btns btns_green history-back' style='display:inline-block;' type="button" id="mypage">주문목록 돌아가기</button>
        </div>

</div>


{!! Form::open(['route' => ["mypage.order.cancel"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'cancel-form']) !!}
<input type="hidden" name="order_id" id="cancel-order_id">
{!! Form::close() !!}


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function (){
        $('#mypage').click(function (){
                location.href = '{{ route('mypage.order.index') }}';
        });

        $(".cancel-click").on("click", function(){
                if(confirm("해당 주문에 대한 결제를 취소하시겠습니까?")){
                        var order_id = $(this).data("cancel_order_id");
                        if(order_id){
                                $("#cancel-order_id").val(order_id);
                                $("#cancel-form").submit();
                        }else{
                                alert("해당 주문에 대한 주문번호 오류입니다.\n새로고침 후 결제취소를 진행해 주세요.");
                        }

                }
        });
})
</script>
@endpush
