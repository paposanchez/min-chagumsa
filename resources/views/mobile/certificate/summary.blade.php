@extends( 'mobile.layouts.report' )

@section( 'content' )

    <ul class='report_menu_wrap'>
        <li class='select'><a href='{{ url("/certificate", ['id' => 4, 'summary']) }}'>자동차 인증서</a></li>
        <li class=''><a href='{{ url("/certificate", ['id' => 4, 'price']) }}'>가격산정서</a></li>
    </ul>

    <div class='br20'></div>

    <div class='report_title_type1'>
        {{ $order->getCarFullName() }}
    </div>

    <div class='report_table exp'>
        <table>
            <colgroup>
                <col style='width:25%;'>
                <col style='width:75%;'>
            </colgroup>
            <tbody>
            <tr>
                <th>산정가격</th>
                <td><strong class='fsize_23'>{{ number_format($order->certificates->valuation) }}만원</strong></td>
            </tr>
            <tr>
                <th>차량 성능 등급</th>
                <td><strong class='fsize_23'>{{ $order->certificates->grade }}</strong></td>
            </tr>
            <tr>
                <th>연식</th>
                <td>{{ $order->car->year }}</td>
            </tr>
            <tr>
                <th>차대번호</th>
                <td>{{ mb_strimwidth($order->car_number, 0, 10, '****') }}</td>
            </tr>
            <tr>
                <th>차종구분</th>
                <td>{{ $order->car->getKind->display() }} {{ $order->car->passenger }}인승</td>
            </tr>
            <tr>
                <th>사용연료</th>
                <td>{{ $order->car->getFuelType->display() }}</td>
            </tr>
            <tr>
                <th>주행거리</th>
                <td>{{ number_format($order->mileage) }} km</td>
            </tr>
            <tr>
                <th>인증서 발급일</th>
                <td><strong class='fcol_navy'>{{ \Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}</strong></td>
            </tr>
            <tr>
                <th>보증기간</th>
                <td><strong class='fcol_navy '>{{ $order->certificates->getExpireDate()->format("Y년 m월 d일 ") }} </strong><span class='exp'>만료</span></td>
            </tr>
            <tr>
                <td colspan='2' class='img_type1'><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='br20'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_table exp'>
        <table>
            <colgroup>
                <col style='width:25%;'>
                <col style='width:25%;'>
                <col style='width:25%;'>
                <col style='width:25%;'>
            </colgroup>
            <tbody>
            <tr>
                <th><dl class='bubble_desc'><dt>주요외판</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc right'><dt>고장진단</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>주요내판</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc right'><dt>엔진(원동기)</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>사고유무 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>자체수리 골격수리</span></td>
                <th><dl class='bubble_desc right'><dt>변속기</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>침수흔적 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc right'><dt>동력전달</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>차량실내 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
                <th><dl class='bubble_desc right'><dt>조향장치</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>소모품 상태 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc right'><dt>제동장치</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>전장품 유리 기어<br>작동상태 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc right'><dt>전기</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>주행테스트</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
                <th></th>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='br10'></div>

    <div class='report_title_type2'>차량기술사 종합의견</div>
    <div class='report_desc'>
        H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.<br>
        <div class='br10'></div>
        <span class='fcol_navy'>· 상세한 진단 결과는 PC에서 확인하실 수 있습니다.</span>
        <div class='br20'></div>
    </div>

    <div class='stamp_line_wrap'><div class='stamp_line_cont'>
            <div class='stamp_wrap'><span>대표 기술사</span><strong>이해택</strong></div>
        </div></div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )


@endpush