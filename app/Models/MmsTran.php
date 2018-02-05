<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

/*
* SMS 발송 테이블
*/

class MmsTran extends Model
{


        protected $table = "sms.MMS_MSG";
        protected $primaryKey = 'MSGKEY';
        protected $fillable = [
                "SUBJECT",
                "PHONE",
                "CALLBACK",
                "STATUS",
                "REQDATE",
                "MSG",
                "FILE_CNT",
                "FILE_CNT_REAL",
                "FILE_PATH1",
                "FILE_PATH1_SIZ",
                "FILE_PATH2",
                "FILE_PATH2_SIZ",
                "FILE_PATH3",
                "FILE_PATH3_SIZ",
                "FILE_PATH4",
                "FILE_PATH4_SIZ",
                "FILE_PATH5",
                "FILE_PATH5_SIZ",
                "EXPIRETIME",
                "SENTDATE",
                "RSLTDATE",
                "REPORTDATE",
                "TERMINATEDDATE",
                "RSLT",
                "TYPE",
                "TELCOINFO",
                "ROUTE_ID",
                "ID",
                "POST",
                "ETC1",
                "ETC2",
                "ETC3",
                "ETC4",
                "MULTI_SEQ",
                "TEMPLATE_KEY",
                "BAR_CODE",
                "BAR_CODE_MERGE_TXT"
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
        * MMS/PUSH/LMS 전송
        * @param $tr_phone string 수신번호[필수]
        * @param string $tr_callback string 발신번호[1833-6889]
        * @param $subject string 메세지 제목[필수]
        * @param $tr_msg string 전송 메세지[필수]
        * @param string $tr_msgtype string 메세지종류(mms, html, push, url)
        * @param string $tr_senddate datetime 전송 예약시간. 즉시 발송시 미입력
        * @return array
        */
        public function send($tr_phone, $tr_callback='1833-6889', $subject, $tr_msg, $tr_msgtype='mms', $tr_senddate=''){


                if($tr_senddate){
                        $this->REQDATE = $tr_senddate;
                }else{
                        $this->REQDATE = DB::raw('NOW()');
                }

                $this->SUBJECT = $subject;
                $this->PHONE = $tr_phone;
                $this->CALLBACK = $tr_callback;
                $this->STATUS = 0;
                $this->MSG = $tr_msg;
                $this->type = $this->getMmsType($tr_msgtype);

                $error = "";
                $result = "";

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

        protected function getMmsType($type){
                switch ($type){
                        case 'mms': $code = 0;break;
                        case 'html': $code = 7;break;
                        case 'url': $code = 1;break;
                        case 'push': $code = 4;break;
                        default: $code = 0;
                }
                return $code;
        }
}
