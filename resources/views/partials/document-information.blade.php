<dl class="document-information">
    <dt><img src="../assets/img/bullet.png"/><span>기본정보</span></dt>
    <dd class="document-information-basic">
        @if($report_type == 'W')
            <table>
                <colgroup>
                    <col width="8%" />
                    <col width="15.33%" />
                    <col width="8%" />
                    <col width="15.34%" />
                    <col width="8%" />
                    <col width="15.33%" />
                </colgroup>
                <tr>
                    <th>피보험자</th>
                    <td>{{ $data->carNumber->cars_id }}</td>
                    <th>상품명</th>
                    <td>{{ $data->orderItem->item->name }}</td>
                    <th>수리한도</th>
                    <td>2,000,000원</td>
                </tr>
                <tr>
                    <th>계약일</th>
                    <td>{{ $data->created_at->format('Y년 m월 d일') }}</td>
                    <th>수리보증기간</th>
                    <td>{{ $data->issued_at->format('Y년 m월 d일') }}~{{ $data->expired_at->format('Y년 m월 d일') }}</td>
                    <th>계약자이름</th>
                    <td>{{ $data->order->orderer_name }}</td>
                </tr>
            </table>
        @else
            <table>
                <colgroup>
                    <col width="8%" />
                    <col width="15.33%" />
                    <col width="8%" />
                    <col width="15.34%" />
                    <col width="8%" />
                    <col width="15.33%" />
                </colgroup>
                <tr>
                    <th>차명</th>
                    <td>{{ $data->carNumber->car->getFullName() }}</td>
                    <th>차대번호</th>
                    <td>{{ $data->carNumber->cars_id }}</td>
                    <th>등록번호</th>
                    <td>{{ $data->carNumber->car_number }}</td>
                </tr>
                <tr>
                    <th>연식</th>
                    <td>{{ $data->carNumber->car->year }}</td>
                    <th>주행거리(km)</th>
                    <td>{{ number_format($data->order->mileage) }}km</td>
                    <th>사용연료</th>
                    <td>{{ $data->carNumber->car->getFuelType->display() }}</td>
                </tr>
                <tr>
                    <th>배기량(cc)</th>
                    <td>{{ number_format($data->carNUmber->car->displacement) }}cc</td>
                    <th>색상</th>
                    <td>{{ $data->carNumber->car->getExteriorColor->display() }}</td>
                    <th>변속기</th>
                    <td>{{ $data->carNumber->car->getTransmission->display() }}</td>
                </tr>

            </table>
        @endif
    </dd>

</dl>

<dl class="document-information">
    @if($report_type == 'W')
        <dt><img src="../assets/img/bullet.png" /><span>차량정보</span></dt>
        <dd class="document-information-basic">
            <table>
                <colgroup>
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="15%" />
                </colgroup>
                <tr>
                    <th>차명</th>
                    <td class="text-center">{{ $data->carNumber->car->getFullName() }}</td>
                    <th>연식</th>
                    <td class="text-center">{{ $data->carNumber->car->year }}</td>
                    <th>뜽록번호</th>
                    <td class="text-center">{{ $data->carNumber->car_number }}</td>
                </tr>
            </table>
        </dd>
    @else
        <dt><img src="../assets/img/bullet.png" /><span>이력정보</span></dt>
        <dd class="document-information-basic">
            <table>
                <colgroup>
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="15%" />
                    <col width="10%" />
                    <col width="15%" />
                </colgroup>
                <tr>
                    <th>용도이력</th>
                    <td class="text-center">없음 (카히스토리)</td>
                    <th>차량번호/소유자변경</th>
                    <td class="text-center">0/1 (카히스토리)</td>
                    <th>특수사고이력</th>
                    <td class="text-center">전손:1/도난:0/침수:1 (카히스토리)</td>
                    <th>사고이력(내차피해/타차가해)</th>
                    <td class="text-center">없음/없음 (카히스토리)</td>
                </tr>
            </table>
        </dd>
    @endif
</dl>