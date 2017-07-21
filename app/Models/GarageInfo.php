<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class GarageInfo extends Model {
//    protected $table = 'garage_infos';
    protected $table = 'garage_infos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'garage_id',
        'name',
        'zipcode',
        'area',
        'section',
        'address'
    ];
    protected $dates = ['created_at'];


    public function user(){
        return $this->hasOne(User::class, 'id', 'garage_id');
    }
}
