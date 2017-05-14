<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class Verification extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'key',
        'content',
        'created_at',
        'updated_at',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

}
