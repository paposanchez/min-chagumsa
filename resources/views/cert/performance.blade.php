@extends( 'layouts.report' )

@section( 'content' )

<div class='report_title_type2'>차량정보</div>
<div class='report_table exp'>
        <table>
                <colgroup>
                        <col style='width:120px;'>
                        <col style='width:280px;'>
                        <col style='width:120px;'>
                        <col style='width:280px;'>
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
                                        {{ $order->isIssued() ? $order->car->getKind->display() : '' }} / {{ $order->car->passenger }}인
                                </td>
                                <th>동일성확인</th>
                                <td>
                                        {{ $order->certificates->vin_yn_cd ? $order->certificates->getVinCd->display() : '' }}
                                </td>
                        </tr>
                        <tr>
                                <th>등록번호</th>
                                <td>
                                        {{ $order->car_number}}
                                </td>
                                <th>연식</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->year : '-' }}
                                </td>
                        </tr>
                        <tr>
                                <th>최초등록일</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->registration_date : '' }}
                                </td>
                                <th>사용월수</th>
                                <td>

                                        {{ $order->isIssued() ? $order->car->registration_date : '' }} 개월
                                </td>
                        </tr>
                        <tr>
                                <th>변속기</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->getTransmission->display() : '' }}
                                </td>
                                <th>색상</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->getExteriorColor->display() : '' }}(외부) / {{ $order->isIssued() ? $order->car->getInteriorColor->display() : '' }}(내부)
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
                                        {{ $order->isIssued() ? $order->car->displacement : '' }} cc
                                </td>
                                <th>차량소유자이력</th>
                                <td>
                                        {{ $order->isIssued() ? $order->certificates->history_owner : '' }}명
                                </td>
                        </tr>
                        <tr>
                                <th>사용연료</th>
                                <td>
                                        {{ $order->isIssued() ? $order->car->getFuelType->display() : '' }}
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
                <span>{{ $order->diagnose_at->format('Y년 m월 d일')}}</span>
        </li>
        <li>
                <label>진단장소</label>
                <span>
                        <!-- 한스모터스 -->
                        {{ $order->garage->user_extra->address }} / {{ $order->garage->name }}

                        @foreach($order->garage->user_extra->bcsimg_files as $file)
                        <img src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url={{ $file->getPreviewPath() }}&format=png&h_pos=10&bg_rgb=ffffff" class='img_place'>
                        @endforeach
                </span>

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


{{ dd($diagnosis) }}

<div class='br10'></div>

<div class='report_title_type2'>주요상태</div>
<div class='report_table exp'>
        <table>
                <colgroup>
                        <col width="200px">
                        <col width="200px">
                        <col width="200px">
                        <col width="200px">
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
        <table class="">
                <colgroup>
                        <col width="200px">
                        <col width="200px">
                        <col width="*">
                        <!-- <col width="200px"> -->
                </colgroup>
                <tbody>

                        @foreach($diagnosis['entrys'] as $entrys)

                                @foreach($entrys['entrys'] as $k => $entry)

                                        {{ var_dump($entry) }}

                                @endforeach
                        @endforeach


                </tbody>
        </table>
</div>



<div class='br30'></div>

<div class='report_table exp'>
        <table>
                <colgroup>
                        <col style='width:650px;'>
                        <col style='width:150px;'>
                </colgroup>
                <tbody>
                        <tr>
                                <th class='td_al_c' colspan='2'>자동차 기술사 종합의견</th>
                        </tr>
                        <tr>
                                <td>
                                        {{--H&T 차량기술법인에서 인증한 차량 성능 등급이 AA로 전반적으로 양호한 상태이나, 차량 구조적 손상 및 수리 상태 점검 결과, 정비가 필요한 부분이 있습니다. 또 차량 소모품 상태 검검 결과 배터리의 수명이 다 되어 교체를 해야 하니 참고하시길 바랍니다.--}}
                                        {{ $order->certificates->opinion }}
                                </td>
                                <td class='td_al_c'>인증등급<br><strong class='fsize_50'>{{ $order->certificates->certificate_grade ? $order->certificates->certificate_grade->display() : '' }}</strong></td>
                        </tr>
                </tbody>
        </table>
</div>


@endsection
