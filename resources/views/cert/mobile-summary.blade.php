@extends( 'mobile.layouts.report' )

@section( 'content' )

    <ul class='report_menu_wrap'>
        <li class='select'><a href='{{ url($order->car_number.'-'.\App\Models\Order::find($order->id)->created_at->format('ymd').'/mobile-summary') }}'>자동차 인증서</a></li>
        <li class=''><a href='{{ url($order->car_number.'-'.\App\Models\Order::find($order->id)->created_at->format('ymd').'/mobile-price') }}'>가격산정서</a></li>
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
                <td><strong class='fsize_23'>{{ $order->certificates->certificate_grade ? $order->certificates->certificate_grade->display() : '미입력 (검토중)' }}</strong></td>
            </tr>
            <tr>
                <th>연식</th>
                <td>{{ $order->isIssued() ? $order->car->year : '미입력 (검토중)' }}</td>
            </tr>
            <tr>
                <th>차대번호</th>
                <td>{{ $order->isIssued() ? $order->car->vin_number : '미입력 (검토중)'}}</td>
            </tr>
            <tr>
                <th>차종구분</th>
                <td>{{ $order->car->getKind->display() }} {{ $order->car->passenger }}인승</td>
            </tr>
            <tr>
                <th>사용연료</th>
                <td>{{ $order->isIssued() ? $order->car->getFuelType->display() : '미입력 (검토중)' }}</td>
            </tr>
            <tr>
                <th>주행거리</th>
                <td>
                    @if($order->isIssued())
                        {{ number_format($order->mileage) }} km
                    @else
                        미입력 (검토중)
                    @endif
                </td>
            </tr>
            <tr>
                <th>인증서 발급일</th>
                <td><strong class='fcol_navy'>{{ \Carbon\Carbon::parse($order->certificates->created_at)->format('Y년 m월 d일') }}</strong></td>
            </tr>
            <tr>
                <th>보증기간</th>
                <td><strong class='fcol_navy '>{{ $order->certificates->updated_at->format('Y년 m월 d일') }}
                        ~ {{ $order->certificates->getExpireDate()->format('Y년 m월 d일') }}</td>
            </tr>
            <tr>
                <th>대표이미지</th>
                <td style='text-align: center;'>
                    @if($order->certificates->pictures)
                        <img
                                name="picture"
                                src="http://image.chagumsa.com/diagnosis/{{ $order->certificates->pictures}}-264.png"
                                class="img-thumbnail">
                    @else
                        <img
                                name="picture"
                                src="http://image.chagumsa.com/diagnosis/{{ $order->getExteriorPicture()[3]->files[0]->id }}-264.png"
                                class=" img-thumbnail">
                    @endif
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
                <col style='width:25%;'>
                <col style='width:25%;'>
                <col style='width:25%;'>
                <col style='width:25%;'>
            </colgroup>
            <tbody>
            <tr>
                <th colspan="4" style="text-align: center;"><strong class='fcol_navy'>사고/침수진단</strong></th>
            </tr>
            <tr>
            <tr>
                <td class="">
                    <dt style="text-align: center">
                        사고진단
                    </dt>
                </td>


                <td class="text-center">

                    <div class="total_result">
                        {{ Html::image(Helper::theme_mobile( '/img/report/accident_car.png')) }}
                        <div class="total_text"><span class="total_result_text">{{ $order->certificates->usage_history ? $order->certificates->usage_history->display() : '미입력 (검토중)' }}</span></div>
                    </div>

                </td>
                <td class="">
                    <dl class='bubble_desc bubble_desc2'>
                        <dt style="text-align: center">
                            침수진단
                        </dt>

                    </dl>
                </td>
                <td class="text-center">
                    <div class="total_result">
                        {{ Html::image(Helper::theme_mobile( '/img/report/flooded_car.png')) }}
                        <div class="total_text"><span class="total_result_text">{{ $order->certificates->usage_flood ? $order->certificates->usage_flood->display() : '미입력 (검토중)' }}</span></div>
                    </div>

                </td>

            </tr>
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
                <th>
                    <dl class='bubble_desc'>
                        <dt>차량외부점검</dt>
                        <dd>
                            {{ $order->certificates->exterior_comment }}
                            <span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_exterior_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_exterior_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_exterior_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_exterior ? $order->certificates->performance_exterior->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc right'>
                        <dt>고장진단</dt>
                        <dd>
                            {{ $order->certificates->broken_comment }}
                            <span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_broken_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_broken_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_broken_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_broken ? $order->certificates->performance_broken->display() : '미입력 (검토중)' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>차량내부점검</dt>
                        <dd>
                            {{ $order->certificates->interior_comment }}
                            <span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_interior_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_interior_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_interior_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_interior ? $order->certificates->performance_interior->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc right'>
                        <dt>원동기</dt>
                        <dd>
                            {{ $order->certificates->engine_comment }}
                            <span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_engine_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_engine_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_engine_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_engine ? $order->certificates->performance_engine->display() : '미입력 (검토중)' }}</span>
                </td>
            </tr>
            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>변속기</dt>
                        <dd>
                            {{ $order->certificates->transmission_comment }}
                            <span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_transmission_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_transmission_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_transmission_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_transmission ? $order->certificates->performance_transmission->display() : '미입력 (검토중)' }}</span>
                </td>



                <th>
                    <dl class='bubble_desc right'>
                        <dt>동력전달</dt>
                        <dd>{{ $order->certificates->power_comment }}<span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_power_cd == 1329)
                            status_good
@elseif($order->certificates->performance_power_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_power_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_power ? $order->certificates->performance_power->display() : '미입력 (검토중)' }}</span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc right'>
                        <dt>조향 및 현가장치</dt>
                        <dd>{{ $order->certificates->steering_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_steering_cd == 1329)
                            status_good
@elseif($order->certificates->performance_steering_cd == 1330)
                            status_normal
@elseif($order->certificates->performance_steering_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_steering ? $order->certificates->performance_steering->display() : '미입력 (검토중)' }}</span>
                </td>

                <th>
                    <dl class='bubble_desc right'>
                        <dt>제동장치</dt>
                        <dd>{{ $order->certificates->braking_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_braking_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_braking_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_braking_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_braking ? $order->certificates->performance_braking->display() : '미입력 (검토중)' }}</span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>전장장착품<br>작동상태</dt>
                        <dd>{{ $order->certificates->plugin_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_plugin_cd == 1196)
                            status_good
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_plugin ? $order->certificates->performance_plugin->display() : '미입력 (검토중)' }}</span>
                </td>

                <th>
                    <dl class='bubble_desc right'>
                        <dt>전기장치</dt>
                        <dd>{{ $order->certificates->electronic_comment }}<span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_electronic_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_electronic_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_electronic_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_electronic ? $order->certificates->performance_electronic->display() : '미입력 (검토중)' }}</span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>휠&타이터</dt>
                        <dd>{{ $order->certificates->tire_comment }}<span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                    <span class='@if($order->certificates->performance_tire_cd == 1329)
                            status_good
                        @elseif($order->certificates->performance_tire_cd == 1330)
                            status_normal
                        @elseif($order->certificates->performance_tire_cd == 1331)
                            status_warn
                        @else
                            status_bad
                        @endif'>{{ $order->certificates->performance_tire ? $order->certificates->performance_tire->display() : '미입력 (검토중)' }}</span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>주행테스트</dt>
                        <dd>{{ $order->certificates->driving_comment }}<span>×</span>
                        </dd>
                    </dl>
                </th>
                <td>
                     <span class='@if($order->certificates->performance_driving_cd == 1329)
                             status_good
                        @elseif($order->certificates->performance_driving_cd == 1330)
                             status_normal
@elseif($order->certificates->performance_driving_cd == 1331)
                             status_warn
@else
                             status_bad
@endif'>{{ $order->certificates->performance_driving ? $order->certificates->performance_driving->display() : '미입력 (검토중)' }}</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class='br10'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_desc'>
        {{ $order->certificates->opinion }}
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