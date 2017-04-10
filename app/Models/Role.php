<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    public static function getArrayByName() {
        $return = Role::orderBy('display_name')->pluck('display_name', 'id');
        
        return $return->toArray();
    }

}
