<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unsubscribe extends Model {

    protected $primaryKey = 'email';
    protected $incrementing = false;
    protected $fillable = [
        'email'
    ];
    protected $dates = ['created_at'];

}
