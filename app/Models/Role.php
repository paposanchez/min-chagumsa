<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    public static function getArrayByName() {
        $return = Role::orderBy('display_name')->pluck('description', 'id');

        return $return->toArray();
    }


    public static function getArrayByNameNotMember() {
        $return = Role::orderBy('display_name')->whereNotIn('id', [2])->pluck('description', 'id');

        return $return->toArray();
    }



}
