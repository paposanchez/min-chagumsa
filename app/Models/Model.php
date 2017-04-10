<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model extends Model {

    public function getCreatedAtAttribute($date) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

}
