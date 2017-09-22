@extends( 'layouts.report' )

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
                                        @if($order->isIssued())
                                                {{ $order->car->year }} 년식
                                        @else
                                                미입력 (검토중)
                                        @endif
                                </td>

                                <td rowspan='6' class='img_type2'>

                                        @if($exterior_picture_ids[0]->files)
                                        <img class="img" src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $exterior_picture_ids[0]->id }}&format=png&h_pos=10&bg_rgb=ffffff" alt='차량 이미지' id="imgSrc" data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $exterior_picture_ids[0]->id }}&format=png&h_pos=10&bg_rgb=ffffff">
                                        @else
                                        <img src="http://fakeimg.pl/272x205/">
                                        @endif



                                </td>
                        </tr>
                        <tr>
                                <th>차대번호</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->vin_number : '미입력 (검토중)' }}
                                </td>
                        </tr>
                        <tr>
                                <th>차종구분</th>
                                <td>
                                        @if($order->isIssued())
                                                {{ $order->car->getKind->display() }} {{ $order->car->passenger }}인승
                                        @else
                                                미입력 (검토중)
                                        @endif


                                </td>
                        </tr>
                        <tr>
                                <th>사용연료</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->getFuelType->display() : '미입력 (검토중)' }}
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
                                                {{ $order->certificates->updated_at->format('Y년 m월 d일') }}
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
                                        {{ count(explode(',', $order->certificates->history_garage)) }}건</td>
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
