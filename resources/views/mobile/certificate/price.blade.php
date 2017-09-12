@extends( 'mobile.layouts.report' )

@section( 'content' )

    <ul class='report_menu_wrap'>
        <li class=''><a href='cert_report1.html'>자동차 인증서</a></li>
        <li class='select'><a href='cert_report2.html'>가격산정서</a></li>
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
                <th>등록번호</th>
                <td>{{ $order->car_number }}</td>
            </tr>
            <tr>
                <th>최초등록일</th>
                <td>{{ \Carbon\Carbon::parse($order->car->registration_date)->format('Y년 m월 d일') }}</td>
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
                <th>차대번호</th>
                <td>{{ $order->car_number }}/td>
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
            <td>{{ $order->car->getExteriorColor->display() }}(외부) / {{ $order->car->getInteriorColor->display() }}(내부)</td>
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

    <div class='report_title_type2'>상세내역</div>
    <div class='report_table exp'>
        <table>
            <colgroup>
                <col style='width:100px;'>
                <col style='width:130px;'>
                <col style='width:130px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>기준가격</th>
                <td colspan='3'>{{ $order->certificates->price }} 만원</td>
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
                <td>H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. </td>
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
                    <span><strong>발급일</strong> {{ \Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}</span>
                    <span><strong>보증기간</strong> {{ \Carbon\Carbon::parse($order->certificates->created_at)->addMonth(5)->format('Y년 m월 d일') }}</span>
                </div>
                <div class='stamp_wrap'><span>대표 기술사</span><strong>이해선</strong></div>
            </div>
        </div></div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush