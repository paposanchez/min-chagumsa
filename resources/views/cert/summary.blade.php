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

                {{--<th class='td_al_vt'>산정가격</th>--}}
                <th class='text-center'>산정가격</th>
                <td class='td_al_vb td_al_c' style="">
                    <strong class='fsize_50'>{{ number_format($order->certificates->valuation) }}</strong><strong
                            class='fsize_20'>만원</strong>
                </td>
                <th rowspan="3" class="text-center">대표 이미지</th>
                <td rowspan="3">
                    @if($order->certificates->pictures)
                        <img
                                name="picture"
                                src="http://image.chagumsa.com/diagnosis/{{ $order->certificates->pictures}}-264.png"
                                class="img-responsive picture"
                                style="width: 250px;">
                    @else
                        <img
                                name="picture"
                                src="http://image.chagumsa.com/diagnosis/{{ $order->getExteriorPicture()[3]->files[0]->id }}-264.png"
                                class="img-responsive picture"
                                style="width: 250px;">
                    @endif


                </td>
            </tr>
            <tr>

                <th class='text-center'>차량 성능 등급</th>
                <td class='td_al_vb td_al_c'>
                    <strong class='fsize_50'>
                        {{ $order->certificates->certificate_grade ? $order->certificates->certificate_grade->display() : '미입력 (검토중)' }}
                    </strong>
                </td>
            </tr>
            <tr>
                <th class="text-center" style="color: #0b4777;font-weight: bold;">보증기간</th>
                <td class="text-center"
                    style="color: #0b4777;font-weight: bold;">{{ $order->certificates->updated_at->format('Y년 m월 d일') }}
                    ~ {{ $order->certificates->getExpireDate()->format('Y년 m월 d일') }}</td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class='br40'></div>

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
                    {{ $order->certificates->vin_yn_cd ? $order->certificates->getVinCd->display() : '' }}
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
                        {{--/ {{ $order->car->getInteriorColor->display() }}(내부)--}}
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

    <div class='br40'></div>

    <div class='report_title_type2'>종합진단 결과</div>
    <div class="report_table exp">
        <table>
            <colgroup>
                <col style="width: 148px;">
                <col>
                <col style="width: 148px;">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <th class="text-center" colspan="4"
                    style="border-top: #0b4777 2px solid;color: #0b4777;font-weight: bold;">사고/침수진단
                </th>
            </tr>
            <tr>
                <td class="">
                    <dl class='bubble_desc bubble_desc2'>
                        <dt style="text-align: center">사고진단
                            @if($order->certificates->history_comment)
                            {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->history_comment }}<span>×</span></dd>
                    </dl>
                </td>


                <td class="text-center">
                    <div class="total_result">
                        {{ Html::image(Helper::theme_web( '/img/report/accident_car.png')) }}
                        <span class="total_result_text">{{ $order->certificates->usage_history ? $order->certificates->usage_history->display() : '미입력 (검토중)' }}</span>
                    </div>

                </td>
                <td class="">
                    <dl class='bubble_desc bubble_desc2'>
                        <dt style="text-align: center">
                            침수진단
                            @if($order->certificates->flood_comment)
                            {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                            @endif
                            <dd>{{ $order->certificates->flood_comment }}<span>×</span></dd>
                        </dt>

                    </dl>
                </td>
                <td class="text-center">
                    <div class="total_result">
                        {{ Html::image(Helper::theme_web( '/img/report/flooded_car.png')) }}
                        <span class="total_result_text">{{ $order->certificates->usage_flood ? $order->certificates->usage_flood->display() : '미입력 (검토중)' }}</span>
                    </div>

                </td>

            </tr>
            </tbody>
        </table>
    </div>

    <div class='br40'></div>

    {{--<div class='report_title_type2'>종합진단 결과</div>--}}
    <div class='report_table report_table2 exp'>
        <table>
            <colgroup>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:120px;'>
                <col style='width:125px;'>
                <col style='width:120px;'>
            </colgroup>
            <tbody>
            <tr>
                <th class="text-center" colspan="6"
                    style="border-top: #0b4777 2px solid;color: #0b4777;font-weight: bold;background: #f6f6f6;">차량요소 성능진단
                </th>
            </tr>
            <tr>
                <th>
                    <dl class='bubble_desc'>
                        <dt>차량외부점검
                            @if($order->certificates->exterior_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png'), "", ['class' => '']) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->exterior_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_exterior_cd == 1329)
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
                    <dl class='bubble_desc'>
                        <dt>차량내부점검
                            @if($order->certificates->interior_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->interior_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_interior_cd == 1329)
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
                    <dl class='bubble_desc'>
                        <dt>전장장착품작동상태
                            @if($order->certificates->plugin_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
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
                        <dt>고장진단
                            @if($order->certificates->broken_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->broken_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_broken_cd == 1329)
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

                <th>
                    <dl class='bubble_desc'>
                        <dt>원동기
                            @if($order->certificates->engine_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->engine_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_engine_cd == 1329)
                            status_good
@elseif($order->certificates->performance_engine_cd == 1330)
                            status_normal
@elseif($order->certificates->performance_engine_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_engine ? $order->certificates->performance_engine->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>변속기
                            @if($order->certificates->transmission_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->transmission_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_transmission_cd == 1329)
                            status_good
@elseif($order->certificates->performance_transmission_cd == 1330)
                            status_normal
@elseif($order->certificates->performance_transmission_cd == 1331)
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
                        <dt>동력전달
                            @if($order->certificates->power_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->power_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_power_cd == 1329)
                            status_good
@elseif($order->certificates->performance_power_cd == 1330)
                            status_normal
@elseif($order->certificates->performance_power_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_power ? $order->certificates->performance_power->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>조향 및 현가장치
                            @if($order->certificates->steering_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->steering_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_steering_cd == 1329)
                            status_good
@elseif($order->certificates->performance_steering_cd == 1330)
                            status_normal
@elseif($order->certificates->performance_steering_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_steering ? $order->certificates->performance_steering->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>제동장치
                            @if($order->certificates->braking_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->braking_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_braking_cd == 1329)
                            status_good
@elseif($order->certificates->performance_braking_cd == 1330)
                            status_normal
                            @elseif($order->certificates->performance_braking_cd == 1331)
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
                        <dt>전기장치
                            @if($order->certificates->electronic_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->electronic_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_electronic_cd == 1329)
                            status_good
@elseif($order->certificates->performance_electronic_cd == 1330)
                            status_normal
                            @elseif($order->certificates->performance_electronic_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_electronic ? $order->certificates->performance_electronic->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>휠&타이터
                            @if($order->certificates->tire_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->tire_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_tire_cd == 1329)
                            status_good
@elseif($order->certificates->performance_tire_cd == 1330)
                            status_normal
                            @elseif($order->certificates->performance_tire_cd == 1331)
                            status_warn
@else
                            status_bad
@endif'>{{ $order->certificates->performance_tire ? $order->certificates->performance_tire->display() : '미입력 (검토중)' }}
                    </span>
                </td>

                <th>
                    <dl class='bubble_desc'>
                        <dt>주행테스트
                            @if($order->certificates->driving_comment)
                                <div class="comment-img">
                                    {{ Html::image(Helper::theme_web( '/img/report/comment.png')) }}
                                </div>
                            @endif
                        </dt>
                        <dd>{{ $order->certificates->driving_comment }}<span>×</span></dd>
                    </dl>
                </th>
                <td>
                    <span class='
                    @if($order->certificates->performance_driving_cd == 1329)
                            status_good
@elseif($order->certificates->performance_driving_cd == 1330)
                            status_normal
                            @elseif($order->certificates->performance_driving_cd == 1331)
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

    <div class='br40'></div>

    <div class='report_title_type2'>차량정보</div>
    <div class='report_desc fsize_14'>
        {{ $order->certificates->opinion }}
    </div>

    <div class='line_break'></div>

    <div class='report_desc fcol_navy'>
        이 차검사인증서는 차량판매자가 제공된 정보를 기반으로 하며 발급일로부터 3개월 5,000km 까지 유효합니다 이 차량에 대한 기타 정보(문제포함)는 차검사 인증서에서 보고되지 않을 수 있습니다.
        차검사인증서는 자동차관리법에 의거하여 차량기술사가 자동차 검사 및 엔진 등 중요 부품에 대한 진단을 토대로 이 차량의 적정 등급 및 가격을 신청하여 제시합니다.
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
