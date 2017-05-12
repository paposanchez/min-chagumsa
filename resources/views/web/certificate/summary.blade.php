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
			<th>차종구분</th>
			<td>수입/승용</td>
			<th>동일성확인</th>
			<td>동일/양호</td>
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
			<th>차량소유자이력</th>
			<td>2명</td>
		</tr>
		<tr>
			<th>사용연료</th>
			<td>Gasoline(휘발유/무연)</td>
			<th>최종등록차고지</th>
			<td>경기도/평택시</td>
		</tr>
	</tbody>
</table>
</div>

<div class='report_desc fcol_pale'>
	해당 내용은 자동차소유자의 자동차등록증, 차적부조회를 통해 조회된 정보를 기반으로 제공합니다. 단 주행거리와 차대번호 동일성 확인은 인증정비소의 차량 진단을 통해 확인된 정보를 기반으로 증빙자료로 사진을 제공합니다.
</div>

<div class='br30'></div>

<div class='report_title_type2'>진단정보</div>
<ul class='report_info_wrap'>
	<li>
		<label>진단일자</label>
		<span>2016년 1월 7일</span>
	</li>
	<li>
		<label>진단장소</label>
		<span>
			한스모터스
			<img src="http://fakeimg.pl/275x185/" class='img_place'>
		</span>
	</li>
	<li>
		<label>진단담당</label>
		<span>
			홍길동 정비사 1급
			<img src="http://fakeimg.pl/170x170/" class='img_person'>
		</span>
	</li>
</ul>

<div class='br10'></div>

<div class='report_title_type2'>주요상태</div>
<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:200px;'>
		<col style='width:200px;'>
		<col style='width:200px;'>
		<col style='width:200px;'>
	</colgroup>
	<tbody>
		<tr>
			<th class='td_al_c' colspan='2'>주요외판</th>
			<th class='td_al_c' colspan='2'>주요 내판 및 골격</th>
		</tr>
		<tr>
			<td colspan='2'>
				<div class='car_check_wrap'>
					<span class='status_char char_x loc1'></span>
					<span class='status_char char_x loc2'></span>
					<span class='status_char char_x loc3'></span>
					<span class='status_char char_x loc4'></span>
					<span class='status_char char_x loc5'></span>
					<span class='status_char char_x loc6'></span>
					<span class='status_char char_x loc7'></span>
					<span class='status_char char_x loc8'></span>
					<span class='status_char char_x loc9'></span>
					<span class='status_char char_x loc10'></span>
					<span class='status_char char_x loc11'></span>
					<span class='status_char char_x loc12'></span>
					<span class='status_char char_x loc13'></span>
				</div>
			</td>
			<td colspan='2'>
				<div class='car_check_wrap type2'>
					<span class='status_char char_x loc1'></span>
					<span class='status_char char_x loc2'></span>
					<span class='status_char char_x loc3'></span>

					<span class='status_char char_x loc4'></span>
					<span class='status_char char_x loc5'></span>
					<span class='status_char char_x loc6'></span>
					<span class='status_char char_x loc7'></span>
					<span class='status_char char_x loc8'></span>
					<span class='status_char char_x loc9'></span>
					<span class='status_char char_x loc10'></span>
					<span class='status_char char_x loc11'></span>
					<span class='status_char char_x loc12'></span>
					<span class='status_char char_x loc13'></span>
					<span class='status_char char_x loc14'></span>
					<span class='status_char char_x loc15'></span>
					<span class='status_char char_x loc16'></span>
					<span class='status_char char_x loc17'></span>
					<span class='status_char char_x loc18'></span>
					<span class='status_char char_x loc19'></span>
				</div>
			</td>
		</tr>
		<tr>
			<td><span class='status_char char_x'>교환이력</span></td>
			<td>후드, 트렁크 리드(백도어)</td>
			<td><span class='status_char char_x'>교환이력</span></td>
			<td>-</td>
		</tr>
		<tr>
			<td><span class='status_char char_w'>용접, 판급수리이력</span></td>
			<td>-</td>
			<td><span class='status_char char_w'>용접, 판급수리이력</span></td>
			<td>-</td>
		</tr>
		<tr>
			<td><span class='status_char char_s'>긁힘(상처)</span></td>
			<td>-</td>
			<td><span class='status_char char_s'>긁힘(상처)</span></td>
			<td>-</td>
		</tr>
		<tr>
			<td><span class='status_char char_c'>부식</span></td>
			<td>-</td>
			<td><span class='status_char char_c'>부식</span></td>
			<td>필러</td>
		</tr>
		<tr>
			<td><span class='status_char char_r'>수리필요(교환,판금)</span></td>
			<td>-</td>
			<td><span class='status_char char_r'>수리필요(교환,판금)</span></td>
			<td>-</td>
		</tr>
	</tbody>
</table>
</div>

<div class='br30'></div>


<div class='report_title_type2'>진단결과</div>
<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:120px;'>
		<col style='width:260px;'>
		<col style='width:145px;'>
		<col style='width:255px;'>
	</colgroup>
	<tbody>
		<tr>
			<th class='td_al_c' colspan='2'>항목</th>
			<th class='td_al_c'>상태</th>
			<th class='td_al_c'>내용</th>
		</tr>
		<tr>
			<td colspan='2' class='fcol_navy'><dl class='tool_desc'><dt>사고유무점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음</dd></dl></td>
			<td><span class='status_good'>수리이력 없음</span></td>
			<td>진단결과 문제없음을 확인함</td>
		</tr>
		<tr>
			<td rowspan='3'>침수흔적점검</td>
			<td class='fcol_navy'><dl class='tool_desc'><dt>엔진룸(휴즈박스)</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음</dd></dl></td>
			<td><span class='status_good'>오염여부(무)</span></td>
			<td rowspan='3'>실내악취는 전혀 나질 않으며 방향제 냄새만 납니다.</td>
		</tr>
		<tr>
			<td class='fcol_navy'><dl class='tool_desc'><dt>실내(앞바닥 등)</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음</dd></dl></td>
			<td><span class='status_warn'>수분 및 오염(무)</span></td>
		</tr>
		<tr>
			<td class='fcol_navy'><dl class='tool_desc'><dt>트렁크(바닥 등)</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음</dd></dl></td>
			<td><span class='status_bad'>수분 및 오염(유)</span></td>
		</tr>
	</tbody>
</table>
</div>

<div class='br30'></div>

<div class='report_table exp'>
<table>
	<colgroup>
		<col style='width:650px;'>
		<col style='width:125px;'>
	</colgroup>
	<tbody>
		<tr>
			<th class='td_al_c' colspan='2'>자동차기술사 종합의견</th>
		</tr>
		<tr>
			<td>H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.</td>
			<td class='td_al_c'>인증등급<br><strong class='fsize_50'>AA</strong></td>
		</tr>
	</tbody>
</table>
</div>
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
