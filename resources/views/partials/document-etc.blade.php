@if($report_type == 'D')
    <div class="document-information-info">
        <table>
            <colgroup>
                <col width="20%" />
                <col width="80%" />
            </colgroup>
            <tr>
                <th>유효기간</th>
                <td>
                    2018년 11월 20일 16:00까지
                    <small>발급일로부터 30일 이내</small>
                </td>
            </tr>
            <tr>
                <th>종합의견</th>
                <td>
                    {{ $total_opinion }}
                </td>
            </tr>

        </table>
    </div>
@elseif($report_type == 'C')
    <div class="document-information-info">
        <table>
            <colgroup>
                <col width="20%" />
                <col width="80%" />
            </colgroup>
            <tr>
                <th>유효기간</th>
                <td>
                    {{ $data->expired_at->format('Y년 m월 d일 H:i') }}까지
                    <small>발급일로부터 {{ $data->expire_period }}일 이내</small>
                </td>
            </tr>
            <tr>
                <th>종합의견</th>
                <td>
                    {{ $data->opinion }}
                </td>
            </tr>

        </table>
    </div>
@else
    <div class="container">
        <div class="pure-g">
            <div class="pure-u-1-2">
                <div class="warning">
                    정정,가필,복사된 것 대표이사 직인이 없는것은 무효입니다.<br/>
                    보증서는 계약체결의 증거로 발행되는 것이며, 실제 계약내용도 해당 보증서 내용을 따릅니다.
                </div>
            </div>
            <div class="pure-u-1-2 text-right">
                <div class="stamps">
                    <div class="stamp-description">대표이사</div>
                    <div class="stamp-name">황 병 도</div>
                    <img src="../assets/img/stamp.png" class="stamp" />
                </div>
            </div>
        </div>
    </div>
@endif