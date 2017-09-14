<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Cache;

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

    public static function getByGroupArray($group) {
        $entrys = DB::table('codes')
                ->where("group", $group)
                ->orderBy('sort')
                ->orderBy('id')
                ->get();

        $return = [];
        foreach($entrys as $entry) {
            $return[] = self::getArray($entry);
        }

        return $return;
    }

    public static function getArray($code) {
        return array(
            "id" => $code->id,
            "group" => $code->group,
            "name" => $code->name,
            "display" => trans('code.' . $code->group . '.' . $code->name)
        );
    }

    //=======================
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


    public function getName() {

        $return = [];

        $return[] = array(
            'id' => $this->id,
            'name' => $this->name,
            'display' => $this->display()
        );

        return $return[0];
    }
}
