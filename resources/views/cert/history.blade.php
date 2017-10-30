@extends( 'layouts.report' )

@section( 'content' )


    <div class='report_title_type1' style="margin-bottom: 20px;">
        {{ $order->getCarFullName() }}
    </div>

    <div class='report_title_type2'>기본정보</div>
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
                    {{ $order->isIssued() ? $order->car->vin_number : '미입력 (검토중)'}}
                </td>
            </tr>
            <tr>
                <th>등록번호</th>
                <td>
                    {{ $order->car_number }}
                </td>
                <th>동일성여부</th>
                <td>
                    {{ $order->certificates->getVinCd ? $order->certificates->getVinCd->display() : '미입력 (검토중)' }}
                </td>
            </tr>
            <tr>
                <th>최초등록일</th>
                <td>
                    {{ $order->isIssued() ? \Carbon\Carbon::parse($order->car->registration_date)->format('Y년 m월 d일') : '미입력 (검토중)' }}
                </td>
                <th>연식</th>
                <td>
                    {{ $order->isIssued() ? $order->car->year : '미입력 (검토중)' }}
                </td>
            </tr>
            <tr>
                <th>변속기</th>
                <td>
                    {{ $order->isIssued() ? $order->car->getTransmission->display() : '미입력 (검토중)' }}
                </td>
                <th>색상</th>
                <td>
                    @if($order->isIssued())
                        {{ $order->car->getExteriorColor->display() }}(외부)
                    @else
                        미입력 (검토중)
                    @endif
                </td>
            </tr>
            <tr>
                <th>세부모델</th>
                <td>
                    {{ $order->getCarfullName() }}
                </td>
                <th>주행거리(km)</th>
                <td>
                    @if($order->isIssued())
                        {{ number_format($order->mileage) }} km
                    @else
                        미입력 (검토중)
                    @endif

                </td>
            </tr>
            <tr>
                <th>배기량(cc)</th>
                <td>
                    @if($order->isIssued())
                        {{ number_format($order->car->displacement) }} cc
                    @else
                        미입력 (검토중)
                    @endif
                </td>
                <th>사용연료</th>
                <td>
                    {{ $order->isIssued() ? $order->car->getFuelType->display() : '미입력 (검토중)' }}
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
                        {{ count(explode(',', $order->certificates->history_purpose)) }}건
                    @else
                        없음
                    @endif
                </td>
                <td>
                    {{ $order->certificates->history_purpose ? $order->certificates->history_purpose : '용도변경 이력' }}
                </td>
            </tr>
            <tr>
                <th class='fcol_navy'>차고지 이력</th>
                <td>
                    @if($order->certificates->history_garage)
                        {{ count(explode(',', $order->certificates->history_garage)) }}건
                </td>
                @else
                    없음
                @endif
                <td>
                    {{ $order->certificates->history_garage ? $order->certificates->history_garage : '차고지 이력 없음' }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">

        $(window).on("load", function () {
            $('.bubble_desc dt').click(function () {
                $('.bubble_desc dd').hide();
                $(this).next().show();
            });
            $('.bubble_desc dd').click(function () {
                $(this).hide();
            });
        });


    </script>
@endsection
