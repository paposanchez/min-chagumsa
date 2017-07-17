<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

/*
 * SMS 발송 테이블
 */

class MmsMsg extends Model
{
    protected $primaryKey = 'MSGKEY';
    protected $fillable = [
        'MSGKEY',
        'SUBJECT',
        'PHONE',
        'CALLBACK',
        'STATUS',
        'MSG',
        'FILE_CNT',
        'FILE_CNT_REAL',
        'FILE_PATH1',
        'FILE_PATH1_SIZ',
        'FILE_PATH2',
        'FILE_PATH2_SIZ',
        'FILE_PATH3',
        'FILE_PATH3_SIZ',
        'FILE_PATH4',
        'FILE_PATH4_SIZ',
        'FILE_PATH5',
        'FILE_PATH5_SIZ',
        'EXPIRETIME',
        'RSLT',
        'TYPE',
        'TELCOINFO',
        'ROUTE_ID',
        'ID',
        'POST',
        'ETC1',
        'ETC2',
        'ETC3',
        'ETC4',
        'MULTI_SEQ',
        'TEMPLATE_KEY',
        'BAR_CODE',
        'BAR_CODE_MERGE_TXT'
    ];
    protected $dates = [
        'REQDATE', 'SENTDATE', 'RSLTDATE', 'REPORTDATE', 'TERMINATEDDATE'
    ];

    public function setUpdatedAt($value)
    {
        return NULL;
    }

    public function setCreatedAt($value)
    {
        return NULL;
    }

    //todo MMS 사용여부 확인 후 구성해야함.
    public function send(){

    }
}