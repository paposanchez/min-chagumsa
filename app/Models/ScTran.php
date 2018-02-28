<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

/*
* SMS 발송 테이블
*/

class ScTran extends Model
{
        protected $table = "sms.SC_TRAN";

        protected $primaryKey = 'TR_NUM';
        protected $fillable = [
                'TR_NUM',
                'TR_SENDDATE',
                'TR_ID',
                'TR_SENDSTAT',
                'TR_RSLTSTAT',
                'TR_MSGTYPE',
                'TR_PHONE',
                'TR_CALLBACK',
                'TR_MODIFIED',
                'TR_MSG',
                'TR_NET',
                'TR_ETC1',
                'TR_ETC2',
                'TR_ETC3',
                'TR_ETC4',
                'TR_ETC5',
                'TR_ETC6',
                'TR_ROUTEID',
                'TR_RSLTDATE', 'TR_MODIFIED', 'TR_REALSENDDATE'
        ];

        public $timestamps = false;

        public function setUpdatedAt($value)
        {
                return NULL;
        }

        public function setCreatedAt($value)
        {
                return NULL;
        }

        /**
        * SMS 메일 전송
        * @param $tr_phone 발신번호
        * @param $tr_callback 수신번호
        * @param $tr_msg 발신 메세지
        * @param int $tr_sendstat 발송상태 0 - 발송대기 1 - 결과수신 대기 2 - 결과수신 완료
        * @param int $tr_msgtype 문자전송 형태 0 - 일반메세지, 1- 콜백 URL 메세지, 2 - 국제 SMS, 3 - PUSH
        * @param datetime $tr_senddate 발송일시
        * @return array
        *
        * INSERT INTO SC_TRAN (TR_SENDDATE, TR_SENDSTAT, TR_MSGTYPE, TR_PHONE, TR_CALLBACK, TR_MSG) VALUES (NOW(), '0', '1', '수신 번호', '발신 번호', 'http://wap.test.co.kr 테스트');
        */
        public function send($tr_phone, $tr_callback='1833-6889', $tr_msg, $tr_sendstat=0, $tr_msgtype=0, $tr_senddate=''){

                if($tr_senddate){
                        $this->TR_SENDDATE = $tr_senddate;
                }else{
                        $this->TR_SENDDATE = DB::raw('NOW()');
                }
                $this->TR_SENDSTAT = $tr_sendstat;
                $this->TR_MSGTYPE = $tr_msgtype;
                $this->TR_PHONE = $tr_phone;
                $this->TR_CALLBACK = $tr_callback;
                $this->TR_MSG = $tr_msg;

                $error = "";
                $result = false;

                try{
                        $result = $this->save();
                }catch (Exception $e){
                        $error = $e->getMessage();
                }

                return ['result' => $result, 'error' => $error];
        }

        /**
        * 발송 내용 확인
        * @param int $tr_num 발송 번호
        * @param string $send_dt 발송일자
        * @return Models
        */
        public function getSendInfo($tr_num, $send_dt){

        }
}
