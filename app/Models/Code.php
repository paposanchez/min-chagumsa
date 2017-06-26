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

    public function children() {
        return $this->hasMany(\App\Models\Code::class, "group", $this->name);
    }

    public function parents() {
        return $this->hasMany(\App\Models\Code::class, "name", $this->group);
    }

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

}
