@extends( 'mobile.layouts.report' )

@section( 'content' )

    <ul class='report_menu_wrap'>
        <li class=''><a href='{{ url($order->car_number.'-'.\App\Models\Order::find($order->id)->created_at->format('ymd').'/mobile-summary') }}'>자동차 인증서</a></li>
        <li class='select'><a href='{{ url($order->car_number.'-'.\App\Models\Order::find($order->id)->created_at->format('ymd').'/mobile-price') }}'>가격산정서</a></li>
    </ul>

    <div class='br20'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_table exp'>
        <table>
            <colgroup>
                <col style='width:100px;'>
                <col style='width:260px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>차명</th>
                <td>{{ $order->getCarFullName() }}</td>
            </tr>
            <tr>
                <th>차대번호</th>
                <td>{{ $order->isIssued() ? $order->car->vin_number : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <th>등록번호</th>
                <td>{{ $order->car_number }}</td>
            </tr>
            <tr>
                <th>동일성여부</th>
                <td>{{ $order->certificates->getVinCd ? $order->certificates->getVinCd->display() : '미입력 (검토중)' }}</td>
            </tr>
            <tr>
                <th>변속기</th>
                <td>{{ $order->car->getTransmission->display() }}</td>
            </tr>
            <tr>
                <th>세부모델</th>
                <td>{{ $order->getCarfullName() }}</td>
            </tr>
            <tr>
                <th>배기량(cc)</th>
                <td>{{ number_format($order->car->displacement) }} cc</td>
            </tr>
            <tr>
                <th>연식</th>
                <td>{{ $order->car->year }}</td>
            </tr>
            <tr>
                <th>사용월수</th>
                <td>{{ \Carbon\Carbon::parse($order->car->registration_date)->diffInMonths(\Carbon\Carbon::now()) }} 개월</td>
            </tr>
            <th>색상</th>
            <td>{{ $order->car->getExteriorColor->display() }}(외부)
            </td>
            </tr>
            <th>주행거리(km)</th>
            <td>{{ number_format($order->mileage) }} km</td>
            </tr>
            <tr>
                <th>사용연료</th>
                <td>{{ $order->car->getFuelType->display() }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='br20'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_table exp'>
        <table >
            <colgroup>
                <col style='width:120px;'>
                <col style='width:390px;'>
                <col style='width:265px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>기준가격</th>
                <td colspan='3'><strong>{{ number_format($order->certificates->price) }} 만원</strong></td>
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
                <td>{{ $order->isIssued() ? $order->car->getExteriorColor->display() : '미입력 (검토중)' }}</td>
            </tr>
            <tr>
                <td><strong>감가금액</strong></td>
                <td><strong>{{ number_format($order->certificates->basic_depreciation) }} 만원</strong></td>
            </tr>


            <tr>
                <th rowspan='3'>사용이력</th>
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
            <tr>
                <td><strong>감가금액</strong></td>
                <td><strong>{{ number_format($order->certificates->history_depreciation) }} 만원</strong></td>
            </tr>

            <th rowspan='14'>종합진단결과</th>
            <tr>
                <td>차량외부점검</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_exterior->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>차량내부점검</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_interior->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>전장장착품작동상태</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_plugin->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>고장진단</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_broken->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>원동기</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_engine->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>변속기</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_transmission->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>동력전달</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_power->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>조향 및 현가장치</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_steering->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>제동장치</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_braking->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>전기장치</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_electronic->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>휠&타이터</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_tire->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td>주행테스트</td>
                <td>{{ $order->isIssued() ? $order->certificates->performance_driving->display() : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <td><strong>감가금액</strong></td>
                <td>
                    <strong>{{ number_format($order->certificates->performance_depreciation) }} 만원</strong>
                </td>
            </tr>


            <tr>
                <th rowspan="2">특별요인</th>
                @if($specials)
                    <td colspan='3'>
                        {{ $specials }}
                    </td>
                @endif
            </tr>
            <tr>
                <td><strong>감가금액</strong></td>
                <td><strong>{{ number_format($order->certificates->special_depreciation) }} 만원</strong></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='br10'></div>

    <div class='report_table exp'>
        <table>
            <colgroup>
                <col style='width:100px;'>
                <col style='width:260px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>평가금액</th>
                <td><strong class='fsize_23'>{{ number_format($order->certificates->valuation) }}</strong></td>
            </tr>
            <tr>
                <th>기타의견</th>
                <td>{{ $order->certificates->opinion }} </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='report_desc'>
        <div class='br20'></div>
        『자동차관리법」제58조제1항 제4호 및 같은 법 시행규칙 제120조 제5항, 기술사법 제3조의 직무에 따라 자동차의 가격을 조사·산정하였음을 확인합니다.
        <div class='br20'></div>
    </div>

    <div class='stamp_line_wrap'><div class='stamp_line_cont'>
            <div class='stamp_line_box'>
                <div class='stamp_line_info'>
                    <span><strong>발급일</strong> {{ $order->certificates->updated_at->format('Y년 m월 d일') }}</span>
                    <span><strong>보증기간</strong> {{ $order->certificates->getExpireDate()->format('Y년 m월 d일') }}</span>
                </div>
                <div class='stamp_wrap'><span>대표 기술사</span><strong>이해택</strong></div>
            </div>
        </div></div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush