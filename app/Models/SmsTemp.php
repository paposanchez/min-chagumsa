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



class SmsTemp Extends Model
{
    protected $fillable = [
        'id',
        "mobile_num",
        "confirm_msg",
        "send_time"
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];



}
