@extends( 'web.layouts.report' )

@section( 'content' )


<div class='report_title_type1' style="margin-bottom: 20px;">
	{{ $order->getCarFullName() }}
</div>

<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:120px;'>
		<col style='width:270px;'>
		<col style='width:120px;'>
		<col style='width:270px;'>
	</colgroup>
	<tbody>
		<tr>
			<th>연식</th>
			<td>
				{{ $order->car->year }}
			</td>
			<th rowspan='6' class='td_al_vt'>사고이력</th>
			<td rowspan='6' class='img_type2'>
				<img src="http://fakeimg.pl/272x205/">
			</td>
		</tr>
		<tr>
			<th>차대번호</th>
			<td>
				{{ $order->car_number }}
			</td>
		</tr>
		<tr>
			<th>차종구분</th>
			<td>
				{{ $order->car->getKind->display() }} {{ $order->car->passenger }}인승
			</td>
		</tr>
		<tr>
			<th>사용연료</th>
			<td>
				{{ $order->car->getFuelType->display() }}
			</td>
		</tr>
		<tr>
			<th>주행거리</th>
			<td>
				{{ number_format($order->mileage) }} km
			</td>
		</tr>
		<tr>
			<th><strong class='fcol_navy'>인증서 발급일</strong></th>
			<td>
				<strong class='fcol_navy'>
					{{ \Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}
				</strong>
			</td>
		</tr>
	</tbody>
</table>
</div>

<div class='br30'></div>

<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:120px;'>
		<col style='width:180px;'>
		<col style='width:480px;'>
	</colgroup>
	<tbody>
		<tr>
			<th class='fcol_navy'>보험사고 이력</th>
			<td>
				@if($order->certificates->history_insurance > 0)
				{{ $order->certificates->history_insurance }}회
				@else
					없음
				@endif
			</td>
			<td>
				@if($order->certificates->history_insurance > 0)
					사고보험처리이력 정보 조회 시 사고이력 있음
				@else
					사고보험처리이력 정보 조회 시 사고이력 없음
				@endif
			</td>
		</tr>
		<tr>
			<th class='fcol_navy'>소유자 이력</th>
			<td>{{ $order->certificates->history_owner }}명</td>
			<td>
				@if($order->certificates->history_owner > 0)
					{{ $order->certificates->history_owner }}명의 이전 소유자가 있었음
				@else
					이전 소유자가 없음
				@endif
			</td>
		</tr>
		<tr>
			<th class='fcol_navy'>정비 이력</th>
			<td>
				@if($order->certificates->history_maintance > 0)
				{{ $order->certificates->history_maintance }}번
				@else
					없음
				@endif
			</td>
			<td>
				@if($order->certificates->history_maintance > 0)
					{{ $order->certificates->history_maintance }}번의 정비이력을 보유함
				@else
					정비이력이 없음
				@endif
			</td>
		</tr>
		<tr>
			<th class='fcol_navy'>용도변경 이력</th>
			<td>
				@if($order->certificates->history_purpose)
					있음
				@else
					없음
				@endif
			</td>
			<td>
				@if($order->certificates->history_purpose)
					@foreach(json_decode($order->certificates->history_purpose, true) as $key => $purpose)
						{{ $purpose }}
					@endforeach
				@else
					용도변경이력이 없음
				@endif
			</td>
		</tr>
		<tr>
			<th class='fcol_navy'>차고지 이력</th>
			<td>
				@if($order->certificates->history_garage)
					최근 / {{ json_decode($order->certificates->history_garage, true)[0] }}</td>
				@else
					없음
				@endif
			{{--<td>강원도/강릉, 경기도/파주</td>--}}
			<td>
				@if($order->certificates->history_garage)
					@foreach(json_decode($order->certificates->history_garage, true) as $key => $garage_row)
						• {{ $garage_row }}
					@endforeach
				@else
					차고지이력이 없음
				@endif
			</td>
		</tr>
	</tbody>
</table>
</div>
@endsection




@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">

    $(window).on("load", function(){
        $('.bubble_desc dt').click(function(){
            $('.bubble_desc dd').hide();
            $(this).next().show();
        });
        $('.bubble_desc dd').click(function(){
            $(this).hide();
        });
    });


</script>
@endpush
