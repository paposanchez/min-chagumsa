@extends( 'web.layouts.default' )

@section( 'content' )
	<div id='sub_title_wrap'><h2>My 인증서<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>My 인증서</span></div></h2></div>

	<div id='cert_list_wrap'>

		<div class='cert_list_title'><span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>님이 발급받은 인증서입니다.</div>

		@foreach($orders as $key => $order)
		<div class='cert_list_box'>
			<div class='cert_box_head'>
				<div>{{ $order->getCarFullName() }}</div>
				<span><strong>보증기간</strong> 2017년 2월 13일까지</span>
			</div>
			<div class='cert_box_cont'>
				<div class='cert_box_cont_img'>
					<img src="http://fakeimg.pl/270x204/" alt='차량 이미지'>
				</div>
				<div class='cert_box_cont_info'>
					<ul>
						<li><label>연식</label><span>{{ $order->car->year }} 년식</span></li>
						<li><label>차대번호</label><span>{{ $order->car->vin_number }}</span></li>
						<li><label>차종구분</label><span>{{ $order->car->getKind->display() }} / {{ $order->car->passenger }}인승</span></li>
						<li><label>사용연료</label><span>{{ $order->car->getFuelType->display() }}</span></li>
						<li><label>주행거리</label><span>{{ number_format($order->mileage) }}km</span></li>
						<li><label>인증서발급일</label><span>{{ Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}</span></li>

					</ul>
				</div>
				<div class='cert_box_cont_result'>
					<ul>
						<li><label>산정가격</label><span><strong>{{ number_format($order->certificates->price) }}</strong>만원</span></li>
						<li><label>차량 성능 등급</label><span><strong>{{ $order->certificates->grade }}</strong></span></li>
					</ul>
				</div>
			</div>
			<div class='cert_box_foot'>
				{!! Form::select('open_cd', $select_open_cd, [$order->open_cd],
				 ['class'=>'form-control btns btns2 wid20', 'required', 'data-order_id' => $order->id]) !!}
				<div class='cert_msg'>다른 사람이 인증서를 볼 수 있도록 하려면 인증서 공개로 변경하세요</div>
				<div class='cert_detail'>
					<button class='btns btns_green detail' id="detail" data-order_id="{{ $order->id }}">
						<i class="fa fa-search" ></i> 상세보기
						<input type="text" name="order_id" id="order_id" value="{{ $order->id }}" hidden>
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
		    var order_id = $(this).data('order_id');
			window.open('/certificate/'+order_id+'/summary',"", "width=1400, height=1400");
		});

		$('.cert_box_foot [name=open_cd]').change(function (){
            var sel_open_cd = $(this).val();
		   	var order_id = $(this).data('order_id');
		    if(sel_open_cd != 0) {
            	$.ajax({
                    type : 'get',
                    dataType : 'json',
					url : '/certificate/change-open-cd',
					data : {
                        '_token' : '{{ csrf_token() }}',
						'open_cd' : sel_open_cd,
						'order_id' : order_id
					},
					success : function (data) {
                        location.href="/certificate";
					},
					error : function (data) {
                        alert('처리중 오류가 발생했습니다.');
					}
				})
		    }
		    else{
		        alert('인증서 공개여부를 선택하세요.');
                location.href="/certificate";
			}
		});
	});
</script>
@endpush
