@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>

<div id='sub_wrap'>


	<div class='join_wrap'>

		<ul class='join_step type2'>
			<li class='on link'>
				<strong>01</strong>
				<span>기본정보 입력</span>
			</li>
			<li class='on link'>
				<strong>02</strong>
				<span>입고정보 선택</span>
			</li>
			<li class='on'>
				<strong>03</strong>
				<span>결제하기</span>
			</li>
			<li>
				<strong>04</strong>
				<span>주문완료</span>
			</li>
		</ul>

		<div class='br30'></div>
		<div class='br20'></div>

		{!! Form::open(['route' => ["order.payment-popup"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'purchase-form', 'target' => "payment"]) !!}
		<input name="datekey" value="{{ $order->datekey }}" type="hidden">
		<input name="cars_id" value="{{ $order->cars_id }}" type="hidden">
		<input name="id" id="moid" type="hidden" value="{{ $order->id }}">{{-- 주문번호 --}}
		<input name="goodsName" id="goodsName" type="hidden" value="{{ $order->datekey }}-{{ $order->car_number }}">{{-- 상품명 --}}
		<input name="buyerName" id="buyerName" type="hidden" value="{{ $order->orderer_name }}">{{-- 구매자명 --}}
		<input name="buyerTel" id="buyerTel" type="hidden" value="{!! str_replace("-", "", $order->orderer_mobile) !!}">{{-- 구매자연락처 --}}
		<input name="buyerEmail" id="buyerEmail" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">{{-- 구매자메일주소 --}}
		<input name="userIp" id="userIp" type="hidden" value="{{ $_SERVER['REMOTE_ADDR'] }}">{{--  --}}
		<input type="hidden" name="amt" id="amt" autocomplete="off">
		<input type="hidden" name="product_name" id="product_name" autocomplete="off">


		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>기본정보 내역</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>주문자</span>
					<span>휴대폰 번호</span>
					<span>차량정보</span>
				</div>

				<div class='order_info_desc'>
					<span>{{ $order->orderer_name }}</span>
					<span>{{ $order->orderer_mobile }}</span>
					<span>{{ $order->getCarFullName() }}</span>
				</div>
			</div>
		</div>

		<div class='br30'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>입고정보 내역</strong>
			</div>
			<div class='order_info_cont'>
				<div class='order_info_desc'>
					<span>입고희망일</span>
					<span>입고대리점 명</span>
					<span>입고대리점 주소</span>
				</div>

				<div class='order_info_desc'>
					<span>{{ $request->reservaton_date }}  {{ $request->sel_time }}시</span>
					<span>임시 정비소명</span>
					<span>{{ $garage_info->name }} {{ $garage_info->address }}</span>
				</div>
			</div>
		</div>

		<div class='line_break'></div>

		<div class='item_info_box' id="item_info_box">
			<div class='order_info_title'>
				<strong>인증서 종류 선택</strong>
			</div>

			<div class='ipt_line'>
				<label hidden>
					<input type='radio' class='psk' id="item_choice" name='item_choice' value="111" >
					<span class='lbl'> dddd</span>
				</label>
				<div class="ipt_guide2 span_warning"> ※ 차량등록증에 등록된 배기량에 따라 정확히 선택해 주세요.<br> &nbsp;&nbsp;&nbsp;&nbsp;배기량 선택이 잘못된 경우, 차량 입고 시 재주문 처리가 될 수 있습니다.</div>
				<div class="br10"></div>
				@foreach($items as $item)
				<label>
					<input type='radio' class='psk item_choice' name='item_choice' value="{{ $item->id }}" autocomplete="off" data-product_name="{{ $order->datekey }}-{{ $order->car_number }}/{{ $item->name }}({!! $item->car_sort == 'N'? '국산차': '수입차' !!})">
					<span class='lbl'> {{ $item->name }}<span style="color: #a3cd16;"> ({!! $item->car_sort == 'N'? '국산차': '수입차' !!})</span></span>
				</label>&nbsp;&nbsp;&nbsp;&nbsp;
				@endforeach



			</div>

		</div>

		<div class='br10'></div>

		<div class='order_calc_wrap'>
			<ul>
				<li class='calc1'>
					인증서 신청 가격
					<span>
						<strong id="item_price"></strong>
						원
					</span>
				</li>
				<li class='calc2'>프로모션 할인
					<span>
						<strong id="promotion_price"></strong>
						원
					</span>
				</li>
				<li>최종 결제 금액<span>
						<strong id="total_price"></strong>
						원
					</span>
				</li>
			</ul>
		</div>

		<div class='br30'></div>

		<div class='order_info_box'>
			<div class='order_info_title'>
				<strong>결제 수단 선택</strong>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method' value="11" autocomplete="off">
					<span class='lbl'> 신용/체크카드</span>
				</label>
			</div>

			<div class='br10'></div>

			<div class='ipt_line'>
				<label>
					<input type='radio' class='psk' name='payment_method' value="12" autocomplete="off">
					<span class='lbl'> 실시간 계좌이체</span>
				</label>
			</div>

			<div class='br10'></div>

		</div>

		<div class='line_break'></div>

		<div class='br10'></div>

		<div class='ipt_line wid45'>
			<button class='btns btns_blue wid45' style='display:inline-block;' type="button" id="payment-back">이전</button>&nbsp;&nbsp; <button type="button" class='btns btns_green wid45' style='display:inline-block;' id="payment-process">결제진행</button>
		</div>
		{!! Form::close() !!}

	</div>


</div>
@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    var number_format = function(num){
        var stringNum = num.toString();
        var stringNum = stringNum.split("");
        var c = 0;
        if (stringNum.length>3) {
            for (var i=stringNum.length; i>-1; i--) {
                if ( (c==3) && ((stringNum.length-i)!=stringNum.length) ) {
                    stringNum.splice(i, 0, ",");
                    c = 0;
                }
                c++
            }
            return stringNum;
        }
        return num;
    }

    $(function (){
        $('.item_choice').on("click", function (){
            var sel_item = $(this).val();

            //상품명 처리
            var product_name = $(this).data("product_name");
            console.log(product_name);

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/sel_item/',
                data : {
                    'sel_item' : sel_item
                },
                success: function (data){
                    $('#item_price').html(number_format(data.price));
                    $("#amt").val(data.price);
                    $('#promotion_price').html(0);
                    $('#total_price').html(number_format(data.price - 0));

					$("#product_name").val(product_name);
                }
            })

        });
        $("#payment-process").on("click", function(){

            var pay_checked = $("input:radio[name='payment_method']:checked").val();

			if($("#amt").val() && pay_checked != undefined){
			    //팝업 실제 처리 부문 주석처리함
//                window.open("", 'payment', 'width=516,height=455,scrollbars=no,toolbar=no,location=no,resizable=yes,status=no,menubar=no,left=400,top=300');
                var payment_window = window.open("", 'payment', 'width=840,height=555,scrollbars=yes,toolbar=no,location=no,resizable=yes,status=no,menubar=no,left=400,top=300');
                $("#purchase-form").submit();
                payment_window.focus();
			}else{

			    if($("#amt").val() == ''){
			        alert('인증서 종류를 선택해 주세요.');
			        return false;
				}
				if(pay_checked == undefined){
			        alert('결제 수단을 선택해 주세요.\n차량점검 인증 결제는 신용/체크카드, 실시간 계좌이체만 가능합니다.');
			        return false;
				}
			}

        });

        $("#payment-back").on("click", function () {
            history.back();
        })
    });


</script>
@endpush
