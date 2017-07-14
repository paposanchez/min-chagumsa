<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class OrderFeature extends Model {
    protected $table = 'order_features';
    protected $fillable = [
        'orders_id',
        'features_id'
    ];
    public $timestamps = false;

}
