@extends( 'web.layouts.report' )

@section( 'content' )

<div class='report_title_type2'>차량정보</div>
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
			<th>차명</th>
			<td>HONDA ACCORD</td>
			<th>차대번호</th>
			<td>AHGCM567X5A034****</td>
		</tr>
		<tr>
			<th>등록번호</th>
			<td>05구 9876</td>
			<th>연식</th>
			<td>2005</td>
		</tr>
		<tr>
			<th>최초등록일</th>
			<td>2005년 12월 5일</td>
			<th>사용월수</th>
			<td>5년 6개월</td>
		</tr>
		<tr>
			<th>변속기</th>
			<td>자동(오토)</td>
			<th>색상</th>
			<td>흰색(외부) / 갈색(내부)</td>
		</tr>
		<tr>
			<th>세부모델</th>
			<td>2005 HONDA ACCORD EX</td>
			<th>주행거리(km)</th>
			<td>30,000</td>
		</tr>
		<tr>
			<th>배기량(cc)</th>
			<td>2,500</td>
			<th>사용연료</th>
			<td>Gasoline(휘발유/무연)</td>
		</tr>
	</tbody>
</table>
</div>

<div class='br30'></div>

<div class='report_title_type2'>차량정보</div>
<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:120px;'>
		<col style='width:390px;'>
		<col style='width:265px;'>
	</colgroup>
	<tbody>
		<tr>
			<th>기준가격</th>
			<td colspan='3'><strong>2,600만원</strong></td>
		</tr>
		<tr>
			<th rowspan='3'>기본평가</th>
			<td>등록일 보정</td>
			<td>표준</td>
		</tr>
		<tr>
			<td>장착품(추가옵션)평가</td>
			<td>썬루프, 네비게이션</td>
		</tr>
		<tr>
			<td>색상 등 기타</td>
			<td>무채색</td>
		</tr>
		<tr>
			<th rowspan='2'>사용이력</th>
			<td>주행거리 평가</td>
			<td>초과</td>
		</tr>
		<tr>
			<td>사고/수리이력 평가</td>
			<td>무사고</td>
		</tr>
		<tr>
			<th rowspan='4'>차량성능상태</th>
			<td>외관(외장)</td>
			<td>양호</td>
		</tr>
		<tr>
			<td>실내, 내장</td>
			<td>보통</td>
		</tr>
		<tr>
			<td>주요장치, 성능상태</td>
			<td>양호</td>
		</tr>
		<tr>
			<td>휠, 타이어 상태</td>
			<td>불량</td>
		</tr>
		<tr>
			<th>특별요인</th>
			<td colspan='3'>불법개조, 변경이력(대여, 렌트)</td>
		</tr>
	</tbody>
</table>
</div>

<div class='br30'></div>

<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:120px;'>
		<col style='width:655px;'>
	</colgroup>
	<tbody>
		<tr>
			<th>평가금액</th>
			<td><strong class='fsize_40'>2,000</strong><strong class='fsize_20'>만원</strong></td>
		</tr>
		<tr>
			<th>기타의견</th>
			<td>H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. </td>
		</tr>
	</tbody>
</table>
</div>

<div class='report_desc'>
	『자동차관리법』제58조제1항 제4호 및 같은 법 시행규칙 제120조 제5항, 기술사법 제3조의 직무에 따라 자동차의 가격을 조사·산정하였음을 확인합니다. 
</div>

<div class='br30'></div>
<div class='br30'></div>

<div class='report_stamp_wrap'>
	<span><strong>발급일</strong> 2017년 1월 13일</span>
	<span><strong>보증기간</strong> 2017년 2월 13일</span>
	<div class='stamp_wrap'>대표 기술사<strong>이해선</strong></div>
</div>

<div class='br30'></div>
@endsection




@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script>
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
