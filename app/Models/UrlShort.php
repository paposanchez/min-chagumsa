<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;


class UrlShort extends Model
{


    protected $table = 'urlshort';
    protected $primaryKey = 'id';
    protected $fillable = [
        'url',
        'short'
    ];
    protected $dates = ['created_at', 'updated_at'];

}
