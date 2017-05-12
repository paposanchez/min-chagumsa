<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 3:01
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'description',
        'status_cd',
        'created_id',
        'updated_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}