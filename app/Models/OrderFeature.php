<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class OrderFeature extends Model {
    protected $table = 'order_features';
    protected $primaryKey = ['orders_id', 'features_id'];
    public $incrementing = false;
    protected $fillable = [
        'orders_id',
        'features_id'
    ];
    public $timestamps = false;

}
