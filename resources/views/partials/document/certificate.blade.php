<div class="certificate-summary">

    <div class="container">
        <div class="pure-g">
            <div class="pure-u-8-24">


                <div class="certificate-summary-info">

                    <h3>자동차 가격조사 산정결과</h3>
                    <br/>
                    <p class="text-muted">
                        자동차관리법 제58조 1항, 4호 및 같은법 시행규칭 제120조 5항, 기술사법 제2조의 직무에 따라 자동차의 가격을 조사,산정하였음을 확인합니다.
                    </p>


                    <div class="stamps">
                        <div class="stamp-description">대표기술사</div>
                        <div class="stamp-name">이 해 택</div>
                        <img src="../assets/img/stamp.png" class="stamp" />
                    </div>


                </div>

            </div>
            <div class="pure-u-8-24">


                <div class="certificate-summary-circle certificate-summary-price round">
                    <div class="info">
                        <h6>평가금액</h6>
                        <h1>{{ number_format($data->valuation) }}<small>만원</small></h1>
                        <h4>기준가격 <span>{{ number_format($data->price) }}만원</span></h4>
                    </div>
                </div>

            </div>

            <div class="pure-u-8-24">

                <div class="certificate-summary-circle certificate-summary-grade round">

                    <h6>인증등급</h6>
                    <h1>{{ $data->certificate_grade->display() }}</h1>
                    <h4><span>경미한 범퍼수리 이력<br/>표준주행거리</span></h4>

                </div>

            </div>

        </div>
    </div>

</div>




<div class="container">
    <div class="pure-g">
        <div class="pure-u-8-24">

            <dl class="document-information">
                <dt><img src="../assets/img/bullet.png"/><span>사고/침수</span></dt>
                <dd>
                    <ul class="report">

                        <li class="report-item accident">
                            <img src="../assets/img/report-accident.png"/>
                            <div class="status"><span>사고유무</span> <em>사고차가 아닙니다. (카히스토리)</em></div>
                            <small class="description">단순수리 | 기본차체판금 | 기본차체교환/골격수리 (카히스토리)</small>
                        </li>

                        <li class="report-item flooding">
                            <img src="../assets/img/report-flooding.png"/>
                            <div class="status"><span>침수여부</span> <em>침수차가 아닙니다. (카히스토리)</em></div>
                            <small class="description">침수차입니다. | 침수여부가 의심됩니다. (카히스토리)</small>
                        </li>

                    </ul>
                </dd>
            </dl>

        </div>
        <div class="pure-u-16-24">
            <dl class="document-information">
                <dt><img src="../assets/img/bullet.png"/><span>감가항목</span></dt>
                <dd>

                    <ul class="depreciation">
                        <li>
                            <div class="depreciation-item">
                                <div class="price">{{ number_format($data->basic_depreciation) }}<small>만원</small></div>
                                <div class="description">기본평가</div>
                            </div>
                        </li>

                        <li>
                            <div class="depreciation-item on">
                                <div class="price">{{ number_format($data->history_depreciation) }}<small>만원</small></div>
                                <div class="description">주요이력평가</div>
                            </div>
                        </li>

                        <li>
                            <div class="depreciation-item">
                                <div class="price">{{ number_format($data->performance_depreciation) }}<small>만원</small></div>
                                <div class="description">종합진단결과</div>
                            </div>
                        </li>

                        <li>
                            <div class="depreciation-item">
                                <div class="price">{{ number_format($data->special_depreciation) }}<small>만원</small></div>
                                <div class="description">특별요인</div>
                            </div>
                        </li>
                    </ul>

                </dd>
            </dl>
        </div>

    </div>


    <dl class="document-information">
        <dt><img src="../assets/img/bullet.png"/><span>성능평가</span></dt>
        <dd>

            <ul class="performance">
                <li class="performance-item on">
                    <div class="status round">{{ $data->performance_exterior->display() }}</div>
                    <div class="description">차량외부점검</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_interior->display() }}</div>
                    <div class="description">차량내부점검</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_plugin->display() }}</div>
                    <div class="description">전장장착품 작동상태</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_broken->display() }}</div>
                    <div class="description">고장진단</div>
                </li>
                <li class="performance-item on">
                    <div class="status round">{{ $data->performance_power->display() }}</div>
                    <div class="description">원동기</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_transmission->display() }}</div>
                    <div class="description">변속기</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_engine->display() }}</div>
                    <div class="description">동력전달</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_braking->display()  }}</div>
                    <div class="description">제동장치</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_steering->display() }}</div>
                    <div class="description">조향 및 현가장치</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_electronic->display() }}</div>
                    <div class="description">전기장치</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_tire->display() }}</div>
                    <div class="description">휠&타이어</div>
                </li>
                <li class="performance-item">
                    <div class="status round">{{ $data->performance_driving->display() }}</div>
                    <div class="description">주행테스트</div>
                </li>

            </ul>

        </dd>
    </dl>
</div>