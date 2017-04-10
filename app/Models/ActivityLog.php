<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model {

    protected $primaryKey = 'id';
    protected $fillable = [
        'log_name',
        'description',
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'properties',
    ];
    protected $dates = ['created_at', 'updated_at'];
}
