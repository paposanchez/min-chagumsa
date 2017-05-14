<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TaggingTag extends Model {

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tag_group_id',
        'slug',
        'name',
        'suggest',
        'count',
    ];
}
