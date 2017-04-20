<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Code extends Model {

    protected $fillable = [
        'group',
        'name'
    ];

    public function getAvailabilityAttribute() {
        return $this->calculateAvailability();
    }

//    public static function getCodesByGroup($group) {
//        $codes = DB::table('codes')
//                ->where("group", $group)
//                ->orderBy('id')
//                ->pluck("name", 'id');
//
//        foreach ($codes as $seq => &$code) {
//            $code->display_name = trans(implode('.', ['code', $group, $code]));
//        }
//        return $codes;
//    }

    public static function getCodesByGroup($group) {
        return DB::table('codes')
                        ->where("group", $group)
                        ->orderBy('id')
                        ->pluck("name", 'id');
    }

    public static function getCodeFieldArray($group, $field = 'id') {

        $return = DB::table('codes')
                ->where("group", $group);

        if ($field == 'name') {
            return $return->orderBy('name')->pluck("name");
        } else {
            return $return->orderBy('id')->pluck('id');
        }
    }

    public function translate($code){

    }

}
