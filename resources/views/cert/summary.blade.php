@extends( 'layouts.report' )

@section( 'content' )
    <div class='report_title_type1' style="margin-bottom: 20px;">
        {{ $order->getOrderNumber() }}
        <span style="font-size:12px;"><strong>보증기간</strong>
            {{--{{ $order->certificates->updated_at->format('Y년 m월 d일 H:i') }}--}}
            {{--~ {{ $order->certificates->getExpireDate()->format('Y년 m월 d일 H:i') }}--}}
            {{ $order->certificates->getExpireDate()->format('Y년 m월 d일 H:i') }} 까지
        </span>
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
                <th class='td_al_vt' rowspan='3'>산정가격</th>
                <td class='td_al_vb td_al_c' rowspan='3'>
                    <strong class='fsize_50'>{{ number_format($order->certificates->valuation) }}</strong><strong
                            class='fsize_20'>만원</strong>
                </td>
            </tr>
            <tr>
                <th>차대번호</th>
                <td>
                    {{ $order->isIssued() ? $order->car_number : '미입력 (검토중)' }}
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
                <th class='td_al_vt' rowspan='3'>차량 성능 등급</th>
                <td class='td_al_vb td_al_c' rowspan='3' style="text-align:center;">
                    <strong class='fsize_50'>
                        {{ $order->certificates->certificate_grade ? $order->certificates->certificate_grade->display() : '미입력 (검토중)' }}
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
                        {{ $order->certificates->updated_at->format('Y년 m월 d일 H:i') }}
                    </strong></td>
            </tr>
            <tr>
                <th class='td_al_vm'>차량 이미지</th>
                <td colspan='3' class='img_type1'>

                    @foreach($order->certificates->getPictures() as $file)
                        <img src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url={{ $file->getPreviewPath() }}&format=png&h_pos=10&bg_rgb=ffffff"
                             class='img_place'>
                    @endforeach
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
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>차량외부점</dt>
                        <dd>{{ $order->certificates->exterior_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_exterior_cd == 1329)
                        status_good
                    @elseif($order->certificates->performance_exterior_cd == 1330)
                        status_warn
                    @else
                        status_bad
                    @endif'>{{ $order->certificates->performance_exterior ? $order->certificates->performance_exterior->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>차량내부점검</dt>
                        <dd>{{ $order->certificates->interior_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_interior_cd == 1329)
                            status_good
@elseif($order->certificates->performance_interior_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_interior ? $order->certificates->performance_interior->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>전장장착품작동상태</dt>
                        <dd>{{ $order->certificates->plugin_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_plugin_cd == 1196)
                            status_good
@else
                            status_bad
@endif'>{{ $order->certificates->performance_plugin ? $order->certificates->performance_plugin->display() : '미입력 (검토중)' }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>고장진단</dt>
                        <dd>{{ $order->certificates->broken_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_broken_cd == 1329)
                            status_good
@elseif($order->certificates->performance_broken_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_broken ? $order->certificates->performance_broken->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>원동기</dt>
                        <dd>{{ $order->certificates->engine_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_engine_cd == 1329)
                            status_good
@elseif($order->certificates->performance_engine_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_engine ? $order->certificates->performance_engine->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>변속기</dt>
                        <dd>{{ $order->certificates->transmission_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_transmission_cd == 1329)
                            status_good
@elseif($order->certificates->performance_transmission_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_transmission ? $order->certificates->performance_transmission->display() : '미입력 (검토중)' }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>동력전달</dt>
                        <dd>{{ $order->certificates->power_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_power_cd == 1329)
                            status_good
@elseif($order->certificates->performance_power_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_power ? $order->certificates->performance_power->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>조향 및 현가장치</dt>
                        <dd>{{ $order->certificates->steering_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_steering_cd == 1329)
                            status_good
@elseif($order->certificates->performance_steering_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_steering ? $order->certificates->performance_steering->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>제동장치</dt>
                        <dd>{{ $order->certificates->braking_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_braking_cd == 1329)
                            status_good
@elseif($order->certificates->performance_braking_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_braking ? $order->certificates->performance_braking->display() : '미입력 (검토중)' }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>전기장치</dt>
                        <dd>{{ $order->certificates->electronic_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_electronic_cd == 1329)
                            status_good
@elseif($order->certificates->performance_electronic_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_electronic ? $order->certificates->performance_electronic->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>휠&타이터</dt>
                        <dd>{{ $order->certificates->tire_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_tire_cd == 1329)
                            status_good
@elseif($order->certificates->performance_tire_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_tire ? $order->certificates->performance_tire->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>주행테스트</dt>
                        <dd>{{ $order->certificates->driving_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_driving_cd == 1329)
                            status_good
@elseif($order->certificates->performance_driving_cd == 1330)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_driving ? $order->certificates->performance_driving->display() : '미입력 (검토중)' }}
                    </span>
                </td>
            </tr>
            </tbody>
        </table>

        <span class="help-block">
            * 종합진단 결과는 보쉬카서비스의 자동차 품질 보고서를 기반으로 하고 있으나 차량기술사가 종합적으로 최종 진단한 내용이기 떄문에 자동차 품질 보고서와 내용이 다를 수 있습니다.
        </span>
    </div>

    <div class='br20'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_desc fsize_14'>
        {{ $order->certificates->opinion }}
    </div>

    <div class='line_break'></div>

    <div class='report_desc fcol_navy'>
        이 차검사인증서는 차량판매자가 제공된 정보를 기반으로 하며 발급일로부터 3개월 5,000km 까지 유효합니다 이 차량에 대한 기타 정보(문제포함)는 차검사 인증서에서 보고되지 않을 수 있습니다. 차검사인증서는 자동차관리법에 의거하여 차량기술사가 자동차 검사 및 엔진 등 중요 부품에 대한 진단을 토대로 이 차량의 적정 등급 및 가격을 신청하여 제시합니다.
    </div>

    <div class='br30'></div>

    <div class='report_stamp_wrap'>
        <div class='stamp_logo'></div>
        <div class='stamp_wrap'>대표 기술사<strong>이해택</strong></div>
    </div>

    <div class='br30'></div>


    <!-- Modal -->
    <div id="pictureModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body text-center" id="modal-body">
                    <img src="http://fakeimg.pl/350x200/" id="img" alt='차량 이미지'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // 진단결과 코멘트 관련
            $('.bubble_desc dt').click(function () {
                $('.bubble_desc dd').hide();
                $(this).next().show();
            });
            $('.bubble_desc dd').click(function () {
                $(this).hide();
            });

            // 차량이미지 관련 modal
            $(".img_type1").delegate(".img", "click", function () {
                var url = $(this).data('url');
                if (url) {
                    // todo 추후에 diagnosis_id 에 대한 image를 loop를 통해 추출
                    $("#img").attr("src", url);
                    $("#pictureModal").modal();
                }
            });


        });


    </script>
@endsection
