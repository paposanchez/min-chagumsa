@extends( 'layouts.report' )

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
                                        {{ $order->getCarFullName() }}
                                </td>
                                <th>차대번호</th>
                                <td>
                                        {{ $order->car_number }}
                                </td>
                        </tr>
                        <tr>
                                <th>등록번호</th>
                                <td>
                                        {{ $order->car_number }}
                                </td>
                                <th>연식</th>
                                <td>
                                        {{ $order->car->year }}
                                </td>
                        </tr>
                        <tr>
                                <th>최초등록일</th>
                                <td>
                                        {{ \Carbon\Carbon::parse($order->car->registration_date)->format('Y년 m월 d일') }}
                                </td>
                                <th>사용월수</th>
                                <td>
                                        {{ \Carbon\Carbon::parse($order->car->registration_date)->diffInMonths(\Carbon\Carbon::now()) }} 개월
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
                                        {{ $order->getCarfullName() }}
                                </td>
                                <th>주행거리(km)</th>
                                <td>
                                        {{ number_format($order->mileage) }} km
                                </td>
                        </tr>
                        <tr>
                                <th>배기량(cc)</th>
                                <td>
                                        {{ number_format($order->car->displacement) }} cc
                                </td>
                                <th>사용연료</th>
                                <td>
                                        {{ $order->car->getFuelType->display() }}
                                </td>
                        </tr>
                </tbody>
        </table>
</div>

<div class='br30'></div>

{{-- 나중에 처 --}}
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
                                <td colspan='3'><strong>{{ $order->certificates->price }} 만원</strong></td>
                        </tr>
                        <tr>
                                <th rowspan='3'>기본평가</th>
                                <td>등록일 보정</td>
                                <td>
                                        @if($order->certificates->basic_registraion == 1282)
                                        초과
                                        @elseif($order->certificates->basic_registraion == 1283)
                                        표준
                                        @else
                                        미달
                                        @endif
                                </td>
                        </tr>
                        
                        <tr>
                                <td>색상 등 기타</td>
                                <td>{{ $order->car->getExteriorColor->display() }}</td>
                        </tr>
                        <tr>
                                <th rowspan='2'>사용이력</th>
                                <td>주행거리 평가</td>
                                <td>
                                        @if($order->certificates->usage_mileage_cd == 1282)
                                        초과
                                        @elseif($order->certificates->usage_mileage_cd == 1283)
                                        표준
                                        @else
                                        미달
                                        @endif
                                </td>
                        </tr>
                        <tr>
                                <td>사고/수리이력 평가</td>
                                <td>
                                        @if($order->certificates->usage_history_cd == 1285)
                                        사고이력 없음
                                        @elseif($order->certificates->usage_history_cd == 1286)
                                        단순수리
                                        @elseif($order->certificates->usage_history_cd == 1287)
                                        기본차체판금
                                        @else
                                        기본차체교환/골격수리
                                        @endif
                                </td>
                        </tr>

                        <th rowspan='19'>차량성능상태</th>
                        <tr>
                                <td>주요외판</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_exterior_cd) }}</td>
                        </tr>
                        <tr>
                                <td>침수흔적점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_flooded_cd) }}</td>
                        </tr>
                        <tr>
                                <td>소모품상태점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_consumption_cd) }}</td>
                        </tr>
                        <tr>
                                <td>고장진단</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_broken_cd) }}</td>
                        </tr>
                        <tr>
                                <td>동력전달</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_powor_cd) }}</td>
                        </tr>
                        <tr>
                                <td>전기</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_electronic_cd) }}</td>
                        </tr>

                        <tr>
                                <td>주요내판</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_interior_cd) }}</td>
                        </tr>
                        <tr>
                                <td>차량외판점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_exteriortest_cd) }}</td>
                        </tr>
                        <tr>
                                <td>전장품유리기어/작동상태점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_plugin_cd) }}</td>
                        </tr>
                        <tr>
                                <td>엔진(원동기)</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_engine_cd) }}</td>
                        </tr>
                        <tr>
                                <td>조향장치</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_steering_cd) }}</td>
                        </tr>
                        <tr>
                                <td>타이어</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_tire_cd) }}</td>
                        </tr>

                        <tr>
                                <td>사고유무점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_accident_cd) }}</td>
                        </tr>
                        <tr>
                                <td>차량실내점검</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_interiortest_cd) }}</td>
                        </tr>
                        <tr>
                                <td>주행테스트</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_driving_cd) }}</td>
                        </tr>
                        <tr>
                                <td>변속기</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_transmission_cd) }}</td>
                        </tr>
                        <tr>
                                <td>제동장치</td>
                                <td>{{ \App\Helpers\Helper::getCodeName($order->certificates->performance_braking_cd) }}</td>
                        </tr>

                        <tr>
                                <td>감가금액</td>
                                <td>
                                        @if($order->certificates->performance_depreciation)
                                        -{{ number_format($order->certificates->performance_depreciation) }} 원
                                        @else
                                        0 원
                                        @endif
                                </td>
                        </tr>



                        <tr>
                                <th>특별요인</th>
                                <td colspan='3'>
                                        {{ $specials }}
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
                        <col style='width:655px;'>
                </colgroup>
                <tbody>
                        <tr>
                                <th>평가금액</th>
                                <td><strong class='fsize_40'>{{ number_format($order->certificates->valuation) }}</strong><strong class='fsize_20'>만원</strong></td>
                        </tr>
                        <tr>
                                <th>기타의견</th>
                                <td>
                                        {{ $order->certificates->opinion }}
                                </td>
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
        <span><strong>발급일</strong> {{ $order->certificates->created_at->format('Y년 m월 d일') }}</span>
        <span><strong>보증기간</strong> {{ $order->certificates->created_at->addMonth(5)->format('Y년 m월 d일') }}</span>
        <div class='stamp_wrap'>대표 기술사<strong>이해선</strong></div>
</div>

<div class='br30'></div>

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

@endsection
