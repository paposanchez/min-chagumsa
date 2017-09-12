@extends( 'mobile.layouts.default' )

@section( 'content' )

    <!-- 제조사 패널-->
    <div id='manu_pannel' class='pannel_wrap'>
        <div class='pannel_title'>제조사</div>
        <dl>
            <dt>국산차</dt>
            <dd>
                <ul>
                    <li><a>현대</a></li>
                    <li><a>제네시스</a></li>
                    <li><a>기아</a></li>
                    <li><a>쉐보레(GM대우)</a></li>
                    <li><a>르노삼성</a></li>
                    <li><a>쌍용</a></li>
                    <li><a>기타 제조사</a></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>수입차</dt>
            <dd>
                <ul>
                    <li><a>BMW</a></li>
                    <li><a>GMC</a></li>
                    <li><a>닛산</a></li>
                    <li><a>다이하쯔</a></li>
                    <li><a>아우디</a></li>
                </ul>
            </dd>
        </dl>
    </div>
    <!-- 제조사 패널-->

    <!-- 옵션 패널-->
    <div id='option_pannel' class='pannel_wrap'>
        <div class='pannel_title'>차량옵션</div>
        <dl>
            <dt>외관</dt>
            <dd>
                <ul>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 제논 헤드램프 (HID)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 전동접이 사이드미러</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 선루프(순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 선루프(비순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 루프랙</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 알루미늄휠</span></label></div></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>내장</dt>
            <dd>
                <ul>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 스티러일 휠 리모컨</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 파워 스티어링</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> ECM</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 가죽 시트</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 전동 시트(운전석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 전동 시트(동승석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 열선 시트(앞좌석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 열선 시트(뒷자석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 메모리 시트</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 통풍 시트(앞좌석)</span></label></div></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>안전</dt>
            <dd>
                <ul>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 에어백(운전석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 에어백(동승석)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 에어백(사이트)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 커튼 에어백</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 후방 감지센서</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 후방 카메라</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> ABS</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> TCS(미끄럼 방지)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 차체 자세 제어 장치</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> ECS(전자제어 서스펜션)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> TPMS(타이어 공기압감지)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 파워 도어록</span></label></div></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>편의</dt>
            <dd>
                <ul>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 자동 에어컨</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 무선도어 잠금장치</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 스마트 키</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 파워 트렁크</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 파워 윈도우</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 크루즈 컨트롤</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 네비게이션(순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 네비게이션(비순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 핸즈프리</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 하이패스</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 버튼시동키</span></label></div></li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>멀티미디어</dt>
            <dd>
                <ul>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> CD 플레이어</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> CD 체인저</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> AV 시스템(순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> AV 시스템(비순정)</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> 뒷자석 TV</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> AUX단자</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> USB단자</span></label></div></li>
                    <li><div class='ipt_line'><label><input type='checkbox' class='psk'><span class='lbl'> iPod단자</span></label></div></li>
                </ul>
            </dd>
        </dl><div class='br30'></div><div class='br30'></div><div class='br30'></div>
        <div class='pannel_confirm'>
            <div class='ipt_line'>
                <button class='btns btns_green' style='display:inline-block;'>다음</button>
            </div>
        </div>
    </div>
    <!-- 옵션 패널-->

    <div id='sub_title_wrap'>인증서 신청</div>

    <div class='br30'></div>

    <div id='sub_wrap'>

        <div class='join_wrap'>

            <ul class='join_step type2'>
                <li class='on'>
                    <strong>01</strong>
                    <span>기본정보 입력</span>
                </li>
                <li>
                    <strong>02</strong>
                    <span>입고정보 선택</span>
                </li>
                <li>
                    <strong>03</strong>
                    <span>결제하기</span>
                </li>
                <li>
                    <strong>04</strong>
                    <span>주문완료</span>
                </li>
            </ul>

            <div class='br30'></div>
            <div class='br20'></div>

            {{-- 기본정보 입력 --}}
            <div id="step1">
                <div class='join_term_wrap'>
                    <label>주문자 정보</label>
                    <div class='ipt_line br10'>
                        <input type='text' class='ipt' placeholder='주문자 이름'>
                    </div>
                    <div class='ipt_mob_cert'>
                        <div><input type='text' class='ipt' placeholder='휴대폰 번호'></div>
                        <button class='btns btns_skyblue'>인증번호 전송</button>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 휴대폰 번호 인증 시 주문 관리를 위한 용도로만 사용되며, 이외 목적으로 사용되지 않습니다.
                    </div>
                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>차량 정보</label>
                    <div class='ipt_line br10'>
                        <input type='text' class='ipt' placeholder='차량번호'>
                    </div>
                    <div class='br10'></div>
                    <ul class='car_manu_wrap'>
                        <li id='car_manu1_btn'>제조사</li>
                        <li id='car_manu2_btn' class='car_manu_dis'>모델</li>
                        <li id='car_manu3_btn' class='car_manu_dis'>세부모델</li>
                    </ul>
                </div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>차량 옵션</label>
                    <div class='ipt_line br10'>
                        <span class='ipt_arr' id='car_option_btn'><input type='text' class='ipt' placeholder='차량옵션' readonly></span>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 추후 가격 산정에 영향을 미치므로 옵션항목 중 장착되어 있는 옵션을 정확히 체크해 주세요.
                    </div>
                </div>
            </div>


            {{-- 기본 정보 입력 완료--}}

            {{-- 입고일/대리점 선택 --}}
            <div id="step2">
                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>입고대리점</label>
                    <div class='ipt_line br10'>
                        <span class='ipt_arr' id='car_option_btn'><input type='text' class='ipt' placeholder='대리점을 선택하세요' readonly></span>
                    </div>
                </div>

                <div class='join_term_wrap'>
                    <label>입고희망일</label>
                    <div class='ipt_dual_input br10'>
                        <div style='width:70%;'>
                            <input type='date' class='ipt'>
                        </div>
                        <div style='width:30%;'>
                            <select>
                                <option>9시</option>
                                <option>10시</option>
                                <option>11시</option>
                                <option>12시</option>
                                <option>13시</option>
                                <option>14시</option>
                                <option>15시</option>
                                <option>16시</option>
                                <option>17시</option>
                                <option>18시</option>
                                <option>19시</option>
                            </select>
                        </div>
                    </div>
                    <div class='ipt_guide2' style='color:#bbb;'>
                        ※ 희망일을 선택하시면 입력하신 휴대폰 번호로 해당 대리점에서 가능여부를 유선상으로 안내 후 확정해 드립니다.
                    </div>
                </div>
            </div>

            {{--입고일/대리점 선택 완료--}}

            {{-- 결제폼 --}}
            <div id="step3">
                <div class='br20'></div>

                <div class='order_info_box2'>
                    <div class='order_info_title2'>
                        <strong>결제 예정 내역</strong>
                    </div>
                    <div class='order_info_cont2'>
                        <div class='order_info_desc2'>
                            <span>주문자</span>
                            <span>휴대폰 번호</span>
                            <span>차량정보</span>
                        </div>
                        <div class='order_info_desc2'>
                            <span>홍길동</span>
                            <span>010-1234-5678</span>
                            <span>폭스바겐 뉴 파사트 2.0 TDI</span>
                        </div>
                    </div>
                </div>

                <div class='br20'></div>

                <div class='order_calc_wrap'><ul>
                        <li class='calc1'>수입차 가격<span>100,000원</span></li>
                        <li class='calc2'>프로모션 할인<span>100,000원</span></li>
                        <li>최종 결제 금액<span>0원</span></li>
                    </ul></div>

                <div class='br30'></div>

                <div class='join_term_wrap'>
                    <label>결제 수단 선택</label>
                    <div class='br10'></div>
                    <div class='ipt_dual_input br10'>
                        <div style='width:50%;'>
                            <div class='ipt_line'>
                                <label>
                                    <input type='radio' class='psk' name='payment_method' checked>
                                    <span class='lbl'> 신용/체크카드</span>
                                </label>
                            </div>
                        </div>
                        <div style='width:50%;'>
                            <div class='ipt_line'>
                                <label>
                                    <input type='radio' class='psk' name='payment_method'>
                                    <span class='lbl'> 실시간 계좌이체</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='br30'></div>

            <div class='ipt_line'>
                <button class='btns btns_green' style='display:inline-block;'>다음</button>
            </div>

        </div>


    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">

</script>

@endpush