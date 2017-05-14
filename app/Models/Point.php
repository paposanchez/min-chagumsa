<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Point extends Model {
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'point',
        'description',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

}
