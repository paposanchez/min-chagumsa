<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use User;


class Counsel extends Model {

    protected $table = 'counsels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'content',
        'reply'
    ];

    protected $dates = [
        'created_at','updated_at'
    ];
}
