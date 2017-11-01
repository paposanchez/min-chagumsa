<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model {

    protected $table = 'user_devices';

    protected $fillable = [
        'users_id',
        'device_id'
    ];
    public $timestamps = false;



}
