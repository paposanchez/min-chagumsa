<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Config;

class Role extends EntrustRole
{


        /**
        * Many-to-Many relations with the user model.
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
        */
        public function users()
        {
                return $this->belongsToMany(Config::get('auth.providers.users.model'), Config::get('entrust.role_user_table'), Config::get('entrust.role_foreign_key'), Config::get('entrust.user_foreign_key'));
        }

        public static function getArrayByName() {
                $return = Role::orderBy('display_name')->pluck('display_name', 'id');

                return $return->toArray();
        }


        public static function getArrayByNameNotMember() {
                $return = Role::orderBy('display_name')->whereNotIn('id', [2])->pluck('display_name', 'id');

                return $return->toArray();
        }

}
