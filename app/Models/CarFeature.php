<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 2:42
 */

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class CarFeature extends Model
{
    protected $fillable = [
        'features_id',
        'orders_id'
    ];
}