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

class S3Tran Extends Model
{
        protected $fillable = [
                'id',
                'div',
                'trans_id'
        ];
        protected $dates = [
                'created_at', 'updated_at'
        ];



}
