<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Coupon extends Model
{

    protected $fillable = [
        'coupon_number',
        'status_cd',
        'is_use',
        'users_id',
        'coupon_kind',
        'amount'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function status()
    {
        return $this->hasOne(Code::class, 'id', 'status_cd');
    }
}
