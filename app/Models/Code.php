<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 *
 *   @SWG\Definition(
 *         definition="Code",
 *         @SWG\Property(
 *             property="id",
 *             type="int64"
 *         ),
 *         @SWG\Property(
 *             property="group",
 *             type="string"
 *         ),
 *         @SWG\Property(
 *             property="name",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="display",
 *             type="string"
 *         )
 *     )
 *
 */
class Code extends Model {

    protected $fillable = [
        'group',
        'name'
    ];

    public function display() {
        return trans('code.' . $this->group . '.' . $this->name);
    }


  // `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  // `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  // `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  // `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  // `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,


  //   public function get() {

  //       return [

  //         'id',
  //         'group',
  //         'name',
  //         'created_at',
  //         'updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

  //       ]

          
  //       return trans('code.' . $this->group . '.' . $this->name);
  //   }


    public static function getSelectList($group = '') {

        $where = DB::table('codes')->orderBy('id');
        if ($group) {
            $where->where("group", $group);
        }

        $result = $where->get();
        $return = [];
        foreach ($result as $entry) {
            $return[$entry->id] = trans('code.' . $entry->group . '.' . $entry->name);
        }

        return $return;
    }

    public static function getByGroup($group) {
        $return = DB::table('codes')
                ->where("group", $group)
                ->orderBy('id')
                ->get();


        return $return;
    }

    public static function getCodesByGroup($group) {
        $return = DB::table('codes')
                ->where("group", $group)
                ->orderBy('id')
                ->pluck("name", 'id');
        return $return;
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
}
