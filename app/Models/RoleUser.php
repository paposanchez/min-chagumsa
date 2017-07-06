<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
//use App\Models\Role;

class RoleUser extends Model {
    protected $table = 'role_user';
    protected $fillable = [
        'user_id',
        'role_id'
    ];
//    public function role() {
//        return $this->hasOne(Role::class, 'id', 'role_id');
//    }

}
