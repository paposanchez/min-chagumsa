<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Code extends Model {

    protected $fillable = [
        'group',
        'name'
    ];

    public function display() {
        return trans('code.' . $this->group . '.' . $this->name);
    }

//    public static function getCodesWithDisplayNameByGroup($group) {
//        $results = DB::table('codes')
//                ->where("group", $group)
//                ->orderBy('id')
//                ->get();
//
//
//        $return = [];
//        foreach ($results as $entry) {
//            $return[$entry->id] = [
//                $entry->id,
//                trans('code.' . $entry->group . '.' . $entry->name)
//            ];
//        }
//
//        return $return;
//    }

    public static function getByGroup($group) {
        return DB::table('codes')
                        ->where("group", $group)
                        ->orderBy('id')
                        ->get();
    }

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

}
