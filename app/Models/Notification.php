<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Notifivation extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_cd',
        'event',
        'template'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

}
