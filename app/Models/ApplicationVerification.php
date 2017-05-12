<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:22
 */


namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class ApplicationVerification Extends Model
{

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'log_name',
        'link'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}