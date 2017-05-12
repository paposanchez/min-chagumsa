<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailConfirmation extends Model {

    public $incrementing = false;
    protected $primaryKey = ['email', 'token'];
    protected $fillable = [
        'email',
        'token',
    ];
    protected $dates = ['created_at', 'updated_at'];

}
