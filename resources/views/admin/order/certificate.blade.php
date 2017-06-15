<?php
/**
 * Created by PhpStorm.
 * User: muti
 * Date: 2017. 6. 15.
 * Time: PM 5:51
 */
?>
<div role="tabpanel" class="tab-pane" id="certification">
    {{--기본 정보--}}
    <div class='col-md-12'>
        <h2>기본 정보</h2>
        {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-basic', 'enctype'=>"multipart/form-data"]) !!}
        <table class="table table-bordered">
            <colgroup>
                <col style='width:120px;'>
                <col style='width:270px;'>
                <col style='width:120px;'>
                <col style='width:270px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>자동차 등록번호</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_number">
                </td>
                <th>주행거리(km)</th>
                <td>
                    <input type="text" style="width: 80%;" name="mileage">
                </td>
            </tr>
            <tr>
                <th>차대번호</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_id">
                </td>
                <th>동일성확인</th>
                <td>
                    {!! Form::select('attachment_status', $select_attachment_status, [], ['class' =>'form-control']) !!}
                </td>
            </tr>
            <tr>
                <th>최초등록일</th>
                <td>
                    <div class="input-group">
                        <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                        <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" style="width: 78%;" name="car_registration_date">
                    </div>
                </td>
                <th>사용월수</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_history">
                </td>
            </tr>
            <tr>
                <th>차명</th>
                <td>
                    <input type="text" style="width: 80%;" name="detail_name">
                </td>
                <th>세부모델</th>
                <td>
                    <input type="text" style="width: 80%" name="model_name">
                </td>
            </tr>
            <tr>
                <th>색상</th>
                <td>
                    {!! Form::select('car_exterior_color', $select_color, [], ['class'=>'form-control']) !!}
                </td>
                <th>차종</th>
                <td>
                    <input type="text" style="width: 80%" name="car_drive_type">
                </td>
            </tr>
            <tr>
                <th>연식 (형식)</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_year">
                </td>
                <th>변속기</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_transmission">
                </td>
            </tr>
            <tr>
                <th>사용연료</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_fueltype">
                </td>
                <th>배기량 (cc)</th>
                <td>
                    <input type="text" style="width: 80%;" name="car_output">
                </td>
            </tr>
            </tbody>
        </table>


        <div class="text-right">
            <button class="btn btn-primary text-right" type="submit">저장</button>
        </div>
        {!! Form::close() !!}
    </div>
    {{--이력 정보--}}
    <div class='col-md-12'>
        <h2>이력 정보</h2>
        {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-history', 'enctype'=>"multipart/form-data"]) !!}
        <table class="table table-bordered">
            <colgroup>
                <col style='width:175px;'>
                {{--<col style='width:200px;'>--}}
                {{--<col style='width:120px;'>--}}
                {{--<col style='width:270px;'>--}}
            </colgroup>
            <tbody>
            <tr>
                <th>보험사고 이력</th>
                <td colspan="3">
                    <input type="text" name="history_insurance">건 &nbsp;&nbsp;&nbsp;
                    <button>사고이력 이미지 업로드</button>
                </td>
            </tr>
            <tr>
                <th>소유자 이력</th>
                <td colspan="3">
                    <input type="text" name="history_owner">명
                </td>
            </tr>
            <tr>
                <th>정비 이력</th>
                <td colspan="3">
                    <input type="text" name="history_maintance">번
                </td>
            </tr>
            <tr>
                <th>용도변경이력</th>
                <td colspan="3">
                    <input type="radio" name="purpose_true">있음
                    <input type="radio" name="purpose_false">없음
                    <br>
                    <select name="history_purpose">
                        <option selected> -- 선택하세요 -- </option>
                    </select>
                    <br>
                    <button>이력 추가</button>
                </td>
            </tr>
            <tr>
                <th>차고지 이력</th>
                <td colspan="3">
                    <select name="history_garage_1">
                        <option selected> -- 선택하세요 -- </option>
                    </select>
                    <select name="history_garage_2">
                        <option selected> -- 선택하세요 -- </option>
                    </select>
                    <br>
                    <button>이력 추가</button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="text-right">
            <button class="btn btn-primary text-right" type="submit">저장</button>
        </div>
        {!! Form::close() !!}
    </div>
    {{--가격 산정--}}
    <div class='col-md-12'>
        <h2>가격 산정</h2>
        {!! Form::model($order, ['method' => 'PATCH','route' => ['order.update', $order->id], 'class'=>'form-horizontal', 'id'=>'frm-price', 'enctype'=>"multipart/form-data"]) !!}
        <table class="table table-bordered">
            <colgroup>
                <col style='width:175px;'>
                {{--<col style='width:200px;'>--}}
                {{--<col style='width:120px;'>--}}
                {{--<col style='width:270px;'>--}}
            </colgroup>
            <tbody>
            <tr>
                <th>기준가격(Pst)</th>
                <td colspan="3">
                    <input type="text" name="pst">만원
                </td>
            </tr>
            <tr>
                <th rowspan='4'>기본평가(A)</th>
                <td>
                    <input type="checkbox" name="new_car_price"> 신차출고가격
                </td>
                <td>
                    부가세
                    <input type="radio" name="true">포함
                    <input type="radio" name="false">제외
                </td>
                <td>
                    <input type="text" name="car_tax">만원
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="regist_revise"> 등록일 보정(+)
                </td>
                <td>
                    <input type="radio" name="regist_ck" value="standard">표준
                    <input type="radio" name="regist_ck" value="excess">초과
                    <input type="radio" name="regist_ck" value="shortfall">미달
                </td>
                <td>
                    <input type="text" name="revise_price">만원
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="basic_mounting_cd"> 장착품(추가옵션)
                </td>
                <td colspan="2">
                    <input type="text" name="option_price">만원
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="basic_etc"> 색상 등 기타
                </td>
                <td colspan="2">
                    <input type="text" name="color_price">만원
                </td>
            </tr>

            <tr>
                <th rowspan="3">사용이력</th>
                <td>
                    <input type="checkbox" name="usage_mileage_cd"> 주행거리 (+)
                </td>
                <td>
                    <input type="radio" name="mileage_ck" value="standard">표준
                    <input type="radio" name="mileage_ck" value="excess">초과
                    <input type="radio" name="mileage_ck" value="shortfall">미달
                </td>
                <td>
                    <input type="text" name="usage_mileage_depreciation">만원
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    <input type="checkbox" name="usage_history_cd"> 사고/수리이력
                </td>
                <td colspan="2">
                    무사고 <input type="checkbox" name="none">
                    단순교환 <input type="checkbox" name="simpe_swap">
                    중손상 <input type="checkbox" name="middle_damage">
                    대손상 <input type="checkbox" name="big_damage">
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>감가금액</td>
                <td>
                    <input type="text" name="usage_history_depreciation">만원
                </td>
            </tr>
            <tr>
                <th rowspan="5">차량 성능 상태(C)</th>
                <td>
                    <input type="checkbox" name="performance_tire_cd"> 휠/타이어
                </td>
                <td colspan="2">
                    양호 <input type="checkbox" name="good">
                    보통 <input type="checkbox" name="normal">
                    불량/정비요 <input type="checkbox" name="maintenance">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="performance_exterior_cd"> 외관(외장)
                </td>
                <td colspan="2">
                    양호 <input type="checkbox" name="good">
                    보통 <input type="checkbox" name="normal">
                    불량/정비요 <input type="checkbox" name="maintenance">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="performance_interior_cd"> 실내/내장
                </td>
                <td colspan="2">
                    양호 <input type="checkbox" name="good">
                    보통 <input type="checkbox" name="noraml">
                    불량/정비요 <input type="checkbox" name="maintenance">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="performance_device_cd"> 주요장치/성능
                </td>
                <td colspan="2">
                    양호 <input type="checkbox" name="good">
                    보통 <input type="checkbox" name="normal">
                    불량/정비요 <input type="checkbox" name="maintenance">
                </td>
            </tr>
            <tr>
                <td>감가금액</td>
                <td colspan="2">
                    <input type="text" name="performance_depreciation">만원
                </td>
            </tr>

            <tr>
                <th rowspan="3">특별요인(S)</th>
                <td colspan="3">
                    <input type="checkbox" name="special_flooded_cd"> 침수차량
                    <input type="checkbox" name="special_fire_cd"> 화재차량
                    <input type="checkbox" name="special_fulllose_cd"> 전손차량
                    <input type="checkbox" name="special_remodel_cd"> 불법개조
                    <input type="checkbox" name="special_etc_cd"> 기타요인
                </td>

            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="ck"> 변경이력
                </td>
                <td>
                    <input type="radio" name="change_ck" value="rent"> 대여/랜트 <input type="text">
                    <input type="radio" name="change_ck" value="sales"> 영업용 <input type="text">
                    <input type="radio" name="change_ck" value="display"> 관용 <input type="text">
                    <br>
                    <input type="radio" name="change_ck" value="law_firm"> 법인 <input type="text">
                    <input type="radio" name="change_ck" value="etc"> 기타 <input type="text">

                </td>
            </tr>
            <tr>
                <td>감가금액</td>
                <td colspan="2">
                    <input type="text" name="special_depreciation">만원
                </td>
            </tr>

            <tr>
                <th>평가금액</th>
                <td colspan="2">V=Pst+(A+B+C+S)</td>
                <td>
                    <input type="text" name="valuation">만원
                </td>
            </tr>
            <tr>
                <th>종합 의견</th>
                <td colspan="3">
                    <input type="text" name="opinion">
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
