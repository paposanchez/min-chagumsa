<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    protected $primaryKey = 'id';
    protected $fillable = [
        'original',
        'source',
        'path',
        'size',
        'extension',
        'mime',
        'hash',
        'download',
        'group',
        'group_id',
    ];
    protected $dates = ['created_at', 'updated_at'];

}
