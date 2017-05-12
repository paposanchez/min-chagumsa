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

class Order Extends Model
{
    protected $fillable = [
        'id',
        'datekey',
        'carnumber',
        'car_id',
        'garage_id',
        'item_id',
        'purchase_id',
        'orderer_name',
        'orderer_mobile',
        'registration_file_cd',
        'mileage',
        'open_cd',
        'status_cd',
        'created_id',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}