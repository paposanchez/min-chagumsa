<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:44
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class Feature Extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];
    protected $dates = ['created_at', 'updated_at'];

}