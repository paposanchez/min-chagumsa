<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserExtra extends Model {

    use Notifiable,
        EntrustUserTrait;

    protected $primaryKey = 'id';
    protected $fillable = [
        'registration_number',
        'engineer_number',
        'phone',
        'fax',
        'zipcode',
        'address',
        'address_extra',
        'users_id',
        'created_at',
        'updated_at',
        'user_extrascol',
        'aliance_id',
        'garage_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
