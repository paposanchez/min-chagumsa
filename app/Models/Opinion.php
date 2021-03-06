<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model {

    protected $primaryKey = 'id';
    protected $fillable = [
        'post_id',
        'user_id',
        'opinion',
        'ip',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
