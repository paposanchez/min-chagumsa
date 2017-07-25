@extends( 'web.layouts.report' )

@section( 'content' )


<div class='report_title_type1'>
	HONDA ACCORD EX
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
			<td>2005</td>
			<th rowspan='6' class='td_al_vt'>사고이력</th>
			<td rowspan='6' class='img_type2'><img src="http://fakeimg.pl/272x205/"></td>
		</tr>
		<tr>
			<th>차대번호</th>
			<td>1HGCM567X5A03****</td>
		</tr>
		<tr>
			<th>차종구분</th>
			<td>승용 4 Door</td>
		</tr>
		<tr>
			<th>사용연료</th>
			<td>Gasoline(휘발유/무연)</td>
		</tr>
		<tr>
			<th>주행거리</th>
			<td>33,000km</td>
		</tr>
		<tr>
			<th><strong class='fcol_navy'>인증서 발급일</strong></th>
			<td><strong class='fcol_navy'>2017년 1월 13일</strong></td>
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
			<td>0회</td>
			<td>사고보험처리이력 정보 조회 시 사고이력 없음</td>
		</tr>
		<tr>
			<th class='fcol_navy'>소유자 이력</th>
			<td>2명</td>
			<td>2명의 이전 소유자가 있었음</td>
		</tr>
		<tr>
			<th class='fcol_navy'>정비 이력</th>
			<td>2번</td>
			<td>2번의 정비이력을 보유함</td>
		</tr>
		<tr>
			<th class='fcol_navy'>용도변경 이력</th>
			<td>있음</td>
			<td>자가용 > 사업용 > 자가용</td>
		</tr>
		<tr>
			<th class='fcol_navy'>차고지 이력</th>
			<td>최근 경기도/파주</td>
			<td>강원도/강릉, 경기도/파주</td>
		</tr>
	</tbody>
</table>
</div>
@endsection




@push( 'header-script' )
@endpush

@push( 'footer-script' )

<script>
$(window).load(function(){
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
