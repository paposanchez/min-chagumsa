<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use User;


class Coupon extends Model {

    protected $fillable = [
        'coupon_number',
        'is_use',
        'users_id',
        'coupon_kind'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function user(){
        return User::hasOne(User::class, 'users_id', 'id');
    }
}
