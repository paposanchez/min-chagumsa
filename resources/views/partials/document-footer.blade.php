<div class="footer">
    <div class="container">
        <div class="pure-g">
            <div class="pure-u-3-24 left">
                @if($report_type == 'D')
                    <img src="../assets/img/logo-bosch.png" class="logo-partner">
                @elseif($report_type == 'C')
                    <img src="../assets/img/logo-hnt.png" class="logo-partner">
                @else
                    <img src="../assets/img/logo-jimbros.png" class="logo-partner">
                @endif
            </div>
            <div class="pure-u-18-24">
                @if($report_type == 'W')
                    <div class="copyright">
                        우리회사는 보험계약자와 해당 보험약관에 의하여 보험계약을 체결하고 그 증거로써 이 보증서를 발급합니다.<br/>
                        Copyright © JIMBROS INC. All rights reserved.
                    </div>
                @else
                    <div class="copyright">
                        위 평가서 내용은 차검사에서 보증합니다. 명시된 유효기간 내 평가서 내용의 오류 또는 그로 인해 발생하는 피해에 대해서는 차검사를 통해 보호받을 수 있습니다<br/>
                        Copyright © JIMBROS INC. All rights reserved.
                    </div>
                @endif

            </div>
            <div class="pure-u-3-24 text-right">
                <img src="../assets/img/logo-chagumsa.png" class="logo-chagumsa">
            </div>
        </div>

    </div>
</div>
{{-- 분기 필요 --}}




