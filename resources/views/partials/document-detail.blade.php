@if($report_type == 'D')
    <!-- 세부항목 -->
    <dl class="document-information m-t-40">
        <dt><img src="../assets/img/bullet.png"/><span>기본정보</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="600px" />
                    <col width="600px" />
                </colgroup>
                <tbody>
                <tr>
                    <th>차명</th>
                    <td>{{ $data->carNumber->car->getFullName() }}</td>
                </tr>
                <tr>
                    <th>차대번호</th>
                    <td>{{ $data->carNumber->car->cars_id }}</td>
                </tr>
                <tr>
                    <th>등록번호</th>
                    <td>{{ $data->carNumber->car_number }}</td>
                </tr>
                <tr>
                    <th>연식</th>
                    <td>{{ $data->carNumber->car->year }}</td>
                </tr>
                <tr>
                    <th>변속기</th>
                    <td>{{ $data->carNumber->car->getTransmission->display() }}</td>
                </tr>
                <tr>
                    <th>색상</th>
                    <td>{{ $data->carNumber->car->getExteriorColor->display() }}</td>
                </tr>
                <tr>
                    <th>주행거리</th>
                    <td>{{ number_format($data->order->mileage) }}km</td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>



    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>이력정보</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="600px" />
                    <col width="600px" />
                </colgroup>
                <tbody>
                <tr>
                    <th>용도이력</th>
                    <td>없음 (카히스트리)</td>
                </tr>
                <tr>
                    <th>차량번호/소유자변경</th>
                    <td>0회 / 1회 (카히스트리)</td>
                </tr>
                <tr>
                    <th>특수사고이력</th>
                    <td>전손:1/도난:0/침수:1 (카히스트리)</td>
                </tr>
                <tr>
                    <th>사고이력(내차피해 / 타차가해)</th>
                    <td>없음 / 없음 (카히스트리)</td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>


    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>진단정보</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="200px" />
                    <col width="200px" />
                    <col width="200px" />
                    <col width="600px" />
                </colgroup>
                <tbody>
                <tr>
                    <th rowspan="14">차량 내외부 점검</th>
                    <th colspan="2">사고수리 및 상태</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>



                <tr>
                    <th rowspan="4">침수흔전점검</th>
                    <th>실내악취</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>앞좌석 실내바닥</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>트렁크 실내바닥</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>엔짐룸(휴즈박스)</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th rowspan="4">차량 외판점검</th>
                    <th>외판(도장)</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>등화</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>범퍼</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>유리(후사경포함)</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th rowspan="5">차량 실내점검</th>
                    <th>계기패널</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>콘솔박스</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>내장트림</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>시트</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>매트</th>
                    <td>
                        <ul>
                            <li class="on">없음</li>
                            <li>없음</li>
                            <li>없음</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>
@elseif($report_type == 'C')
    <!-- 세부항목 -->
    <dl class="document-information m-t-40">
        <dt><img src="../assets/img/bullet.png"/><span>기본정보</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="600px"/>
                    <col width="600px"/>
                </colgroup>
                <tbody>
                <tr>
                    <th>차명</th>
                    <td>{{ $data->carNumber->car->getFullName() }}</td>
                </tr>
                <tr>
                    <th>차대번호</th>
                    <td>{{ $data->carNumber->cars_id }}</td>
                </tr>
                <tr>
                    <th>등록번호</th>
                    <td>{{ $data->carNumber->car_number }}</td>
                </tr>
                <tr>
                    <th>연식</th>
                    <td>{{ $data->carNumber->car->year }}</td>
                </tr>
                <tr>
                    <th>변속기</th>
                    <td>{{ $data->carNumber->car->getTransmission->display() }}</td>
                </tr>
                <tr>
                    <th>색상</th>
                    <td>{{ $data->carNumber->car->getExteriorColor->display() }}</td>
                </tr>
                <tr>
                    <th>주행거리</th>
                    <td>{{ number_format($data->order->mileage) }}km</td>
                </tr>
                <tr>
                    <th>배기량(cc)</th>
                    <td>{{ number_format($data->carNumber->car->displacement) }}cc</td>
                </tr>
                <tr>
                    <th>사용연료</th>
                    <td>{{ $data->carNumber->car->getFuelType->display() }}</td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>



    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>기본이력정</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="600px"/>
                    <col width="600px"/>
                </colgroup>
                <tbody>
                <tr>
                    <th>용도이력</th>
                    <td>없음 (카히스토리)</td>
                </tr>
                <tr>
                    <th>차량번호/소유자변경</th>
                    <td>0회 / 1회 (카히스토리)</td>
                </tr>
                <tr>
                    <th>특수사고이력</th>
                    <td>전손:1/도난:0/침수:1 (카히스토리)</td>
                </tr>
                <tr>
                    <th>사고이력(내차피해 / 타차가해)</th>
                    <td>없음 / 없음 (카히스토리)</td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>

    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>기본이력정</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="600px"/>
                    <col width="600px"/>
                </colgroup>
                <tbody>
                <tr>
                    <th>정비이력</th>
                    <td>없음 (카히스토리)</td>
                </tr>
                <tr>
                    <th>최종차고지</th>
                    <td>서울시 강남구 (카히스토리)</td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>



    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>종합진단결과</span></dt>
        <dd class="document-information-info">
            <table class="">
                <colgroup>
                    <col width="200px"/>
                    <col width="200px"/>
                    <col width="200px"/>
                    <col width="600px"/>
                </colgroup>
                <tbody>

                <tr>
                    <th colspan="3">기준가격</th>
                    <td>
                        <ul>
                            <li>{{ number_format($data->price) }}</li>
                        </ul>
                    </td>
                </tr>



                <tr>
                    <th rowspan="3">기본평가</th>
                    <th colspan="2">등록일보정</th>
                    <td>
                        <ul>
                            <li>{{ $data->registration->display() }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">색상 등 기타</th>
                    <td>
                        <ul>
                            <li>{{ $data->carNumber->car->getExteriorColor->display() }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">감가금액</th>
                    <td>
                        <ul>
                            <li>{{ number_format($data->basic_depreciation) }}</li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th rowspan="4">주요이력평가</th>
                    <th colspan="2">주행거리 평가</th>
                    <td>
                        <ul>
                            <li>{{ $data->usage_mileage->display() }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">사고/수리이력 평가</th>
                    <td>
                        <ul>
                            <li>{{ $data->usage_history->display() }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">침수점검 평가</th>
                    <td>
                        <ul>
                            <li>{{ $data->usage_flood->display() }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">감가금액</th>
                    <td>
                        <ul>
                            <li>{{ number_format($data->history_depreciation) }}</li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th rowspan="13">종합진단결과</th>
                    <th colspan="2">차량외부점검</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_exterior_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">차량내부점검</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_interior_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">전장장착품작동상태</th>
                    <td>
                        <ul>
                            @foreach($operation_state_cd as $key=>$val )
                                <li class="{{ $certificate->performance_plugin_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">고장진단</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_broken_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">원동기</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_engine_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">변속기</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_transmission_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">동력전달</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_power_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">조향장치 및 현가장치</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_steering_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">제동장치</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_braking_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">전기장치</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_electronic_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">휠&타이어</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_tire_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">주행테스트</th>
                    <td>
                        <ul>
                            @foreach($certificate_states as $key=>$val )
                                <li class="{{ $certificate->performance_driving_cd == $key ? 'on' : '' }}">{{ $val }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">감가금액</th>
                    <td>
                        <ul>
                            <li>{{ number_format($data->performance_depreciation) }}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th rowspan="">특별요인</th>
                    <th colspan="2">감가금액</th>
                    <td>
                        <ul>
                            <li>{{ number_format($data->special_depreciation) }}</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </dd>
    </dl>
@endif