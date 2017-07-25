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
                <td colspan='3' class='img_type1'><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"><img src="http://fakeimg.pl/88x50/"></td>
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
                <th><dl class='bubble_desc'><dt>주요외판</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>주요내판</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc right'><dt>사고유무 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>침수흔적 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>차량외판점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc'><dt>차량실내 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>소모품 상태 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>전장품 유리 기어<br>작동상태 점검</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc'><dt>주행테스트</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>고장진단</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>엔진(원동기)</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc'><dt>변속기</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>동력전달</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>조향장치</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th><dl class='bubble_desc'><dt>제동장치</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_bad'>교체</span></td>
            </tr>
            <tr>
                <th><dl class='bubble_desc'><dt>전기</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_good'>양호</span></td>
                <th><dl class='bubble_desc'><dt>타이어</dt><dd>전체적으로 깨끗한 편이고, 약간의 긁힘은 있으나 눈에 띄지는 않음<span>×</span></dd></dl></th>
                <td><span class='status_warn'>정비요망</span></td>
                <th></th>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<div class='br20'></div>

<div class='report_title_type2'>차량정보</div>
<div class='report_desc fsize_14'>
    H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.
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
