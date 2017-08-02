<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:52
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\PaymentResult;


class Payment Extends Model
{
    protected $fillable = [
        'id',
        'payMethod',//
        'transType',
        'goodsName',//
        'amt',//
        'moid',//
        'mallUserId',//
        'buyerName',//
        'buyerTel',//
        'buyerEmail',//
        'rcvrMsg',
        'ediDate',//
        'encryptData',
        'quotaFixed',
        'supplyAmt',
        'vat',
        'billReqType',
        'tid',//
        'stateCd',
        'authDate',//
        'authCode',//
        'fnCd',//
        'fnName',//
        'resultCd',//
        'resultMsg',//
        'cardQuota',
        'cardNo',
        'cardPoint',
        'usePoint',
        'balancePoint',
        'BID',
        'cashReceiptType',
        'receiptTypeNo',
        'cashNo',
        'cashTid',
        'mid',//
        'errorCd',
        'errorMsg',
        'orders_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'moid', 'id');
    }

    public function payment_result(){
        return $this->hasOne(PaymentResult::class);
    }

    /**
     * todo PG관련 코드. 향후 pg module로 이관할것.
     */
    public function payment_code(){
        $payment = [
            "card" => [
                3001 => "카드 결제 성공",
                3002 => "VAN실패 응답",
                3011 => "카드번호 오류",
                3012 => "카드가맹점 정보 미확인",
                3013 => "카드 가맹점 개시 안됨",
                3014 => "카드가맹점 정보 오류",
                3022 => "할부개월오류",
                3023 => "할부개월 한도 초과",
                3031 => "무이자할부 카드 아님",
                3032 => "무이자할부 불가 개월수",
                3033 => "무이자할부 가맹점 아님",
                3034 => "무이자할부 구분 미설정",
                3041 => "금액 오류(1000원 미만 신용카드 승인 불가)",
                3051 => "해외카드 미등록 가맹점",
                3052 => "통화코드 오류",
                3053 => "확인 불가 해외카드",
                3054 => "환률전환오류",
                3055 => "인증시 달러승인 불가",
                3056 => "국내카드 달러승인불가",
                3057 => "인증 불가카드",
                3061 => "국민카드 인터넷안전결제 적용 가맹점",
                3062 => "신용카드 승인번호 오류",
                3071 => "매입요청 가맹점 아님",
                3072 => "매입요청 TID 정보 불일치",
                3073 => "기매입 거래",
                3081 => "카드 잔액 값 오류",
                3091 => "제휴카드 사용불가 가맹점",
                3095 => "카드사 실패 응답"
            ],
            "bank" => [
                4000 => "계좌이체 결제 성공",
                4001 => "금결원 오류 응답",
                4002 => "회원사 서비스 불가 은행",
                4003 => "출금일자 불일치",
                4004 => "출금요청금액 불일치",
                4005 => "거래번호(TID) 불일치",
                4006 => "회신 정보 불일치",
                4007 => "계좌이체 승인번호 오류",
                4008 => "은행 시스템 서비스 중단",
            ],
            "vbank" => [
                4100 => "가상계좌 발급 성공",
                4110 => "가상계좌 입금 성공",
                4101 => "가상계좌 최대거래금액 초과",
                4102 => "가상계좌 입금예정일 오류",
                4103 => "가상계좌 입금예정시간 오류",
                4104 => "가상계좌 정보 오류",
            ],
            "mobile" => [
                "A000" => "휴대폰결제 처리 성공",
                "A001" => "휴대폰결제 처리 실패",
                "A002" => "필수입력값(거래키) 누락",
                "A003" => "필수입력값(이통사구분) 누락",
                "A004" => "필수입력값(SMS승인번호) 누락",
                "A005" => "필수입력값(업체TID) 누락",
                "A006" => "필수입력값(휴대폰번호) 누락",
                "A041" => "결제금액 오류",
                "A564" => "휴대폰결제ID설정 오류",
                "A565" => "휴대폰결제ID미설정 오류",
                "A566" => "휴대폰결제사 설정 오류",
                "A567" => "상품구분코드 설정 오류",
                "A568" => "서비스구분코드 설정 오류",

            ],
            "payment_cancel" => [
                2001 => "취소 성공",
                2002 => "취소 진행중",
                2003 => "취소 실패",
                2010 => "취소 요청금액 0원 이하",
                2011 => "취소 금액 불일치",
                2012 => "취소 해당거래 없음",
                2013 => "취소 완료 거래",
                2014 => "취소 불가능 거래",
                2015 => "기 취소 요청",
                2016 => "취소 기한 초과",
                2017 => "취소 불가 회원사",
                2018 => "신용카드 매입후 취소 불가능가맹점",
                2019 => "타 회원사 거래 취소 불가",
                2021 => "매입전취소",
                2022 => "매입후취소",
                2023 => "취소 한도 초과",
                2024 => "취소패스워드 불일치",
                2025 => "취소패스워드 미입력",
                2026 => "입금액보다 취소금액이 큽니다",
                2027 => "에스크로 거래는 구매 또는 구매거절시 취소가능",
                2028 => "부분취소 불가능 가맹점",
                2029 => "부분취소 불가능 결제수단",
                2030 => "해당결제수단 부분취소 불가능 가맹점",
                2031 => "전체금액취소 불가",
                2032 => "취소금액이 취소가능금액보다 큼",
                2033 => "부분취소 불가능금액. 전체취소 이용바람",
                2211 => "환불 성공",
                2212 => "환불 진행중",
                2213 => "환불기한 초과",
                2214 => "환불 불가 회원사",
                2215 => "환불 해당거래 없음",
                2216 => "환불 불가능 거래",
                2217 => "환불 요청금액 0원 이하",
                2218 => "환불 금액 불일치",
                2219 => "환불 완료 거래",
                2220 => "환불 불가 가상계좌",

            ],
            "bank_code" => [
                "001"  => "한국은행",
                "002"  => "KDB 산업은행",
                "003"  => "기업은행",
                "004"  => "국민은행",
                "005"  => "외환은행",
                "007"  => "수협은행",
                "008"  => "수출입은행",
                "011"  => "농협은행",
                "012"  => "농협회원조합",
                "020"  => "우리은행",
                "023"  => "SC 은행",
                "027"  => "한국씨티은행",
                "031"  => "대구은행",
                "032"  => "부산은행",
                "034"  => "광주은행",
                "035"  => "제주은행",
                "037"  => "전북은행",
                "039"  => "경남은행",
                "045"  => "새마을금고",
                "048"  => "신협은행",
                "050"  => "상호저축은행",
                "052"  => "모간스탠리은행",
                "054"  => "HSBC 은행",
                "055"  => "도이치은행",
                "056"  => "에이비엔암로은행",
                "057"  => "JP 모간체이스은행",
                "058"  => "미즈호코퍼레이트은행",
                "059"  => "미쯔비시도코 UFJ 은행",
                "060"  => "B.O.A",
                "071" => "우체국",
                "076" => "신용보증기금",
                "077" => "기술신용보증기금",
                "081" => "하나은행",
                "088" => "신한은행",
                "091" => "친애저축은행",
                "093" => "한국주택금융공사",
                "094" => "서울보증보험",
                "095" => "경찰청",
                "099" => "금융결제원",
                "209" => "동양증권",
                "218" => "현대증권",
                "230" => "미래에셋증권",
                "238" => "대우증권",
                "240" => "삼성증권",
                "243" => "한국투자증권",
                "247" => "우리투자증권",
                "261" => "교보증권",
                "262" => "하이투자증권",
                "263" => "HMC 투자증권",
                "264" => "키움증권",
                "265" => "이트레이드증권",
                "266" => "SK 증권",
                "267" => "대신증권",
                "268" => "솔로몬투자증권",
                "269" => "한화투자증권",
                "270" => "하나대투증권",
                "278" => "신한금융투자",
                "279" => "동부증권",
                "280" => "유진투자증권",
                "287" => "메리츠증권",
                "289" => "NH 투자증권",
                "290" => "부국증권",
                "291" => "신영증권",
                "292" => "NH 농협증권",
                "444" => "IBK ONE 페이",
            ],
            "credit_code" => [
                "01" => "비씨",
                "02" => "KB 국민",
                "03" => "하나(외환)",
                "04" => "삼성",
                "06" => "신한",
                "07" => "현대",
                "08" => "롯데",
                "11" => "씨티",
                "12" => "NH 채움",
                "13" => "수협",
                "14" => "신협",
                "15" => "우리카드",
                "16" => "하나카드",
                "21" => "광주",
                "22" => "전북",
                "23" => "제주",
                "24" => "산은캐피탈",
                "25" => "해외비자",
                "26" => "해외마스터",
                "27" => "해외다이너스",
                "28" => "해외 AMX",
                "29" => "해외 JCB",
                "31" => "SK-OKCashBag",
                "32" => "우체국",
                "33" => "MG 새마을체크카드",
                "34" => "중국은행체크카드",
                "35" => "KDB 체크카드",
                "36" => "현대증권체크카드",
                "37" => "저축은행",
            ]
        ];
    }
}
