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
				<td>
					{{ $order->getCarFullName()}}
				</td>
				<th>차대번호</th>
				<td>
					{{ $order->car_number}}
				</td>
			</tr>
			<tr>
				<th>차종구분</th>
				<td>
					{{ $order->car->getKind->display() }} / {{ $order->car->passenger }}인
				</td>
				<th>동일성확인</th>
				<td>
					{{ $order->certificates->getVinCd->display() }}
				</td>
			</tr>
			<tr>
				<th>등록번호</th>
				<td>
					{{ $order->car_number}}
				</td>
				<th>연식</th>
				<td>
					{{ $order->car->year }}
				</td>
			</tr>
			<tr>
				<th>최초등록일</th>
				<td>
					{{ Carbon\Carbon::parse($order->car->registration_date)->format('Y년 m월 d일') }}
				</td>
				<th>사용월수</th>
				<td>
					{{--{{ \Carbon\Carbon::parse($order->car->registration_date)->diffInMonths(\Carbon\Carbon::now()) }} 개월--}}
					{{ \App\Helpers\Helper::getMonthNum($order->car->registration_date) }} 개월
				</td>
			</tr>
			<tr>
				<th>변속기</th>
				<td>
					{{ $order->car->getTransmission->display() }}
				</td>
				<th>색상</th>
				<td>
					{{ $order->car->getExteriorColor->display() }}(외부) / {{ $order->car->getInteriorColor->display() }}(내부)
				</td>
			</tr>
			<tr>
				<th>세부모델</th>
				<td>
					{{ $order->getCarFullName()}}
				</td>
				<th>주행거리(km)</th>
				<td>
					{{ number_format($order->mileage) }} km
				</td>
			</tr>
			<tr>
				<th>배기량(cc)</th>
				<td>
					{{ $order->car->displacement }} cc
				</td>
				<th>차량소유자이력</th>
				<td>
					{{ $order->certificates->history_owner }}명
				</td>
			</tr>
			<tr>
				<th>사용연료</th>
				<td>
					{{ $order->car->getFuelType->display() }}
				</td>
				<th>최종등록차고지</th>
				<td>
					@if($order->certificates->history_garage)
					최근 / {{ json_decode($order->certificates->history_garage, true)[0] }}
					@else
						없음
					@endif
				</td>
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
			<span>{{ Carbon\Carbon::parse($order->diagnoses_at)->format('Y년 m월 d일')}}</span>
		</li>
		<li>
			<label>진단장소</label>
			<span>
			<!-- 한스모터스 -->
				{{ $order->garage->user_extra->address }} / {{ $order->garage->name }}
				{{--<img src="http://fakeimg.pl/275x185/" class='img_place'>--}}
			</span>
			<div id="map" style="width:400px;height:300px;margin-left: 90px;"></div>

		</li>
		<li>
			<label>진단담당</label>
			<span>
			<!-- 홍길동 정비사 1급 -->
				{{ $order->engineer->name}}

				{{ Helper::imageTag('/avatar/'.$order->engineer->id, 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile', 'style'=>'width : 170px;')) }}
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
				<td>
					{{--H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.--}}
					{{ $order->certificates->opinion }}
				</td>
				<td class='td_al_c'>인증등급<br><strong class='fsize_50'>{{ $order->certificates->grade }}</strong></td>
			</tr>
			</tbody>
		</table>
	</div>




@endsection




@push( 'header-script' )

@endpush

@push( 'footer-script' )
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=40213ad16ec63811a5a11a733b700b7f&libraries=services,clusterer,drawing"></script>
<script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
        mapOption = {
            center: new daum.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
        };

    // 지도를 생성합니다
    var map = new daum.maps.Map(mapContainer, mapOption);

    // 주소-좌표 변환 객체를 생성합니다

    var geocoder = new daum.maps.services.Geocoder();


    // 주소로 좌표를 검색합니다
    geocoder.addressSearch('{{ $order->garage->user_extra->address }}', function(result, status) {

        // 정상적으로 검색이 완료됐으면
        if (status === daum.maps.services.Status.OK) {

            var coords = new daum.maps.LatLng(result[0].y, result[0].x);

            // 결과값으로 받은 위치를 마커로 표시합니다
            var marker = new daum.maps.Marker({
                map: map,
                position: coords
            });

            // 인포윈도우로 장소에 대한 설명을 표시합니다
            var infowindow = new daum.maps.InfoWindow({
                content: '<div style="width:150px;text-align:center;padding:6px 0;">{{ $order->garage->name }}</div>'
            });
            infowindow.open(map, marker);

            // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
            map.setCenter(coords);
        }
    });
</script>

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
