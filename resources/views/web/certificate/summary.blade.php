@extends( 'web.layouts.report' )

@section( 'content' )
	<div class='report_title_type1' style="margin-bottom: 20px;">
		HONDA ACCORD EX
		<span><strong>보증기간</strong> 2017년 3월 31일까지</span>
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
				<th class='td_al_vt' rowspan='3'>산정가격</th>
				<td class='td_al_vb td_al_r' rowspan='3'><strong class='fsize_50'>{{ number_format($order->certificates->valuation) }}</strong><strong class='fsize_20'>만원</strong></td>
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
				<th class='td_al_vt' rowspan='3'>차량 성능 등급</th>
				<td class='td_al_vb td_al_r' rowspan='3'>
					<strong class='fsize_50'>
						{{ $order->certificates->grade }}
					</strong>
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
				<td><strong class='fcol_navy'>
						{{ \Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}
					</strong></td>
			</tr>
			<tr>
				<th class='td_al_vm'>차량 이미지</th>
				<td colspan='3' class='img_type1'>
                    @foreach($exterior_picture_ids as $picture)
                        @if($picture->files)
                            <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $picture->id }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $picture->id }}&format=png&h_pos=10&bg_rgb=ffffff">
                        @else
                            <img src="http://fakeimg.pl/88x50/">
                        @endif
                    @endforeach

                </td>
			</tr>
			</tbody>
		</table>
	</div>

	<div class='br20'></div>

	<div class='report_title_type2'>종합진단 결과</div>
	<div class='report_table exp'>
		<table>
			<colgroup>
				<col style='width:120px;'>
				<col style='width:120px;'>
				<col style='width:120px;'>
				<col style='width:120px;'>
				<col style='width:120px;'>
				<col style='width:120px;'>
			</colgroup>
			<tbody>
			<tr>
				<th><dl class='bubble_desc'><dt>주요외판</dt><dd>{{ $order->certificates->exterior_comment }}<span>×</span></dd></dl></th>
				<td>
                    <span class='
					@if($order->certificates->performance_exterior_cd == 1329)
						status_good
					@elseif($order->certificates->performance_exterior_cd == 1330)
						status_warn
					@else
						status_bad
					@endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_exterior_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>주요내판</dt><dd>{{ $order->certificates->interior_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_interior_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_interior_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_interior_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>사고유무점검</dt><dd>{{ $order->certificates->accident_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_accident_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_accident_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_accident_cd) }}
                    </span>
                </td>
			</tr>

            <tr>
                <th><dl class='bubble_desc'><dt>침수흔적점검</dt><dd>{{ $order->certificates->flooded_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_flooded_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_flooded_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_flooded_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>차량외판점검</dt><dd>{{ $order->certificates->exteriortest_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_exteriortest_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_exteriortest_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_exteriortest_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>차량실내점검</dt><dd>{{ $order->certificates->interiortest_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_interiortest_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_interiortest_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_interiortest_cd) }}
                    </span>
                </td>
            </tr>

            <tr>
                <th><dl class='bubble_desc'><dt>소모품상태점검</dt><dd>{{ $order->certificates->consumption_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_consumption_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_consumption_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_consumption_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>전장품유리기어/작동상태점검</dt><dd>{{ $order->certificates->plugin_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_plugin_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_plugin_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_plugin_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>주행테스트</dt><dd>{{ $order->certificates->driving_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_driving_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_driving_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_driving_cd) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>고장진단</dt><dd>{{ $order->certificates->broken_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_broken_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_broken_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_broken_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>엔진(원동기)</dt><dd>{{ $order->certificates->engine_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_engine_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_engine_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_engine_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>변속기</dt><dd>{{ $order->certificates->transmission_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_transmission_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_transmission_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_transmission_cd) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>동력전달</dt><dd>{{ $order->certificates->power_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_powor_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_powor_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_powor_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>조향장치</dt><dd>{{ $order->certificates->steering_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_steering_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_steering_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_steering_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>제동장치</dt><dd>{{ $order->certificates->braking_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_braking_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_braking_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_braking_cd) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>전기</dt><dd>{{ $order->certificates->electronic_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_electronic_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_electronic_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_electronic_cd) }}
                    </span>
                </td>
                <th><dl class='bubble_desc'><dt>타이어</dt><dd>{{ $order->certificates->tire_comment }}<span>×</span></dd></dl></th>
                <td>
                    <span class='
					@if($order->certificates->performance_tire_cd == 1329)
                            status_good
                    @elseif($order->certificates->performance_tire_cd == 1330)
                            status_warn
                    @else
                            status_bad
                    @endif'>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_tire_cd) }}
                    </span>
                </td>
                <th></th>
                <td></td>

            </tr>

			</tbody>
		</table>
	</div>

	<div class='br20'></div>

	<div class='report_title_type2'>차량정보</div>
	<div class='report_desc fsize_14'>
		{{--H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.--}}
        문구 협의
	</div>

	<div class='line_break'></div>

	<div class='report_desc fcol_navy'>
		이 차검사인증서는 차량판매자가 제공된 정보를 기반으로 하며, 발급일로부터 한달 간 유효합니다. 이 차량에 대한 기타 정보(문제 포함)는 차검사 인증서에서 보고되지 않을 수 있습니다. 차검사인증서는 자동차관리법에 의거하여 차량기술사가 자동차 검사 및 엔진 등 중요 부품에 대한 진단을 토대로 이 차량의 적정 등급 및 가격을 산정하여 제시합니다.
	</div>

	<div class='br30'></div>

	<div class='report_stamp_wrap'>
		<div class='stamp_logo'></div>
		<div class='stamp_wrap'>대표 기술사<strong>이해선</strong></div>
	</div>

	<div class='br30'></div>

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
