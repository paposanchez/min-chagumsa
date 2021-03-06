@extends( 'layouts.report' )

@section( 'content' )

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
                    {{ $order->isIssued() ? substr_replace($order->car->vin_number, '*****', -5, 5) : '미입력 (검토중)'}}
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

    <div class='report_desc fcol_pale'>
        해당 내용은 자동차소유자의 자동차등록증, 차적부조회를 통해 조회된 정보를 기반으로 제공합니다. 단 주행거리와 차대번호 동일성 확인은 인증정비소의 차량 진단을 통해 확인된 정보를 기반으로 증빙자료로
        사진을 제공합니다.
    </div>

    <div class='br30'></div>

    <div class='report_title_type2'>진단정보</div>
    <ul class='report_info_wrap'>
        <li>
            <label>진단일자</label>
            <span>{{ $order->diagnose_at->format('Y년 m월 d일')}}</span>
        </li>
        <li>
            <label style="vertical-align: top;">진단장소</label>
            <span>
                {{ $order->garage->user_extra->address }} / {{ $order->garage->name }}

                @foreach($order->garage->user_extra->bcsimg_files as $file)
                    <img src="http://mme.chagumsa.com/resize?logo=1&r=1&width=300&qty=87&w_opt=0.4&w_pos=10&url={{ $file->getPreviewPath() }}&format=png&h_pos=10&bg_rgb=ffffff"
                         class='img_place'>
                @endforeach
                </span>

        </li>
        <li>
            <label>진단담당</label>
            <span>
                @if(strlen($order->engineer->name) < 10)
                    {{ $order->engineer->name }}
                @else
                    {{ $order->engineer->user_extra->ceo_name }}
                @endif
                </span>
        </li>
    </ul>

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

                        <?php $n = 1; ?>
                        @foreach($diagnosis_extra_a as $entrys)
                            @foreach($entrys as $val)
                                @includeIf("partials.carstatus", ['entry' => $val, 'class_name' => 'status_char'])
                                <?php $n++; ?>
                            @endforeach
                        @endforeach
                    </div>
                </td>
                <td colspan='2'>
                    <div class='car_check_wrap type2'>
                        <?php $m = 1; ?>
                        @foreach($diagnosis_extra_b as $n => $entrys)
                            @foreach($entrys as $val)
                                @includeIf("partials.carstatus", ['entry' => $val, 'class_name' => "type2"])
                                <?php $m++; ?>
                            @endforeach
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <td><span class='status_char char_x'>교환이력</span></td>
                <td>
                    @if(count($diagnosis_extra_a[1172]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_a[1172], 'name') !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class='status_char char_x'>교환이력</span></td>
                <td>
                    @if(count($diagnosis_extra_b[1172]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_b[1172], 'name') !!}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td><span class='status_char char_w'>용접, 판급수리이력</span></td>
                <td>
                    @if(count($diagnosis_extra_a[1173]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_a[1173], 'name') !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class='status_char char_w'>용접, 판급수리이력</span></td>
                <td>
                    @if(count($diagnosis_extra_b[1173]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_b[1173], 'name') !!}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td><span class='status_char char_r'>수리필요(교환,판금)</span></td>
                <td>
                    @if(count($diagnosis_extra_a[1174]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_a[1174], 'name') !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class='status_char char_r'>수리필요(교환,판금)</span></td>
                <td>
                    @if(count($diagnosis_extra_b[1174]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_b[1174], 'name') !!}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td><span class='status_char char_s'>긁힘(상처)</span></td>
                <td>
                    @if(count($diagnosis_extra_a[1175]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_a[1175], 'name') !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class='status_char char_s'>긁힘(상처)</span></td>
                <td>
                    @if(count($diagnosis_extra_b[1175]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_b[1175], 'name') !!}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td><span class='status_char char_c'>부식</span></td>
                <td>
                    @if(count($diagnosis_extra_a[1176]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_a[1176], 'name') !!}
                    @else
                        -
                    @endif
                </td>
                <td><span class='status_char char_c'>부식</span></td>
                <td>
                    @if(count($diagnosis_extra_b[1176]))
                        {!! \App\Helpers\Helper::implodeByKey($diagnosis_extra_b[1172], 'name') !!}
                    @else
                        -
                    @endif
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class='br30'></div>


    <div class='report_title_type2'>진단결과</div>
    <div class='report_table exp'>
        <table class="">
            <colgroup>
                <col width="180px">
                <col width="180px">
                <col width="*">
            </colgroup>
            <tbody>

            @foreach($diagnosis['entrys'] as $entrys)

                @foreach($entrys['entrys'] as $k => $entry)

                    @if($loop->first)
                        <tr>
                            <th

                                    @if(count($entrys['entrys']) > 1)
                                    rowspan="{{ count($entrys['entrys']) }}"
                                    @endif

                            >{{ $entrys['name']['display'] }}</th>
                            <th>{{ $entry['name']['display'] }}</th>


                            @if(isset($entry['children']) && count($entry['children']) > 0)
                                <td class="no-padding">
                                    <table class="">
                                        <col width="25%">
                                        <col width="*">
                                        <tbody class="no-border">
                                        @foreach($entry['children'] as $children)
                                            <tr>
                                                <th class="">{{ $children['name']['display'] }}</th>
                                                <td>
                                                    <ul class="list-unstyled no-margin">
                                                        @foreach($children['entrys'] as $child)
                                                            <li class="clearfix">
                                                                @include('partials.diagnosis-view',['entry' =>  $child])
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            @else
                                <td>@each("partials.diagnosis-view", $entry['entrys'], 'entry')</td>
                            @endif

                        </tr>
                    @else
                        <tr>
                            <th>{{ $entry['name']['display'] }}</th>

                            @if(isset($entry['children']) && count($entry['children']) > 0)
                                <td class="no-padding">
                                    <table class="">
                                        <col width="25%">
                                        <col width="*">
                                        <tbody class="no-border">
                                        @foreach($entry['children'] as $children)
                                            <tr>
                                                <th class="">{{ $children['name']['display'] }}</th>
                                                <td>
                                                    <ul class="list-unstyled no-margin">
                                                        @foreach($children['entrys'] as $child)
                                                            <li class="clearfix">
                                                                @include('partials.diagnosis-view',['entry' =>  $child])
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            @else
                                <td>@each("partials.diagnosis-view", $entry['entrys'], 'entry')</td>
                            @endif

                        </tr>
                    @endif

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
                    {{ $order->certificates ? $order->certificates->opinion : '미입력 (검토중)' }}
                </td>
                <td class='td_al_c'>인증등급<br><strong
                            class='fsize_50'>{{ $order->certificates->certificate_grade ? $order->certificates->certificate_grade->display() : '미입력 (검토중)' }}</strong>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(function () {
            //원본 이미지 보기
            $(".get-origin-image").on("click", function () {
                alert('aaaa');
                window.open($(this).data("origin_url"));
            });
        })
    </script>
@endsection

@push( 'footer-script' )

@endpush
