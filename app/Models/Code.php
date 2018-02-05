<?php

namespace App\Models;

use App\Abstracts\Model\Cache AS CacheModel;
use Illuminate\Support\Facades\DB;

/**
*
* @SWG\Definition(
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
class Code extends CacheModel
{

        protected $fillable = [
                'group',
                'name'
        ];

        // 코드의 디스플레이명 출력
        public function display()
        {
                return trans('code.' . $this->group . '.' . $this->name);
        }

        public function namespace()
        {
                return $this->group . '.' . $this->name;
        }

        // 서브코드 조회
        public function children()
        {
                return $this->hasMany(self::class, "group", $this->name);
        }

        // 부모코드 조회
        public function parents()
        {
                return $this->hasMany(self::class, "name", $this->group);
        }

        // 출력형식으로 변환시
        public function toDesign()
        {
                return [
                        "id" => $this->id,
                        "group" => $this->group,
                        "name" => $this->name,
                        "display" => $this->display()

                ];
        }

        public static function getId($group, $name)
        {
                $entry = DB::table('codes')
                ->where("group", $group)
                ->where("name", $name)
                ->first();

                return $entry ? $entry->id : false;
        }

        //--------------------------------------------------- extra funcs
        public static function getSelectList($group = '')
        {
                $where = DB::table('codes')->orderBy('sort');
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

        public static function getByGroup($group)
        {
                $return = DB::table('codes')
                ->where("group", $group)
                ->orderBy('id')
                ->get();
                return $return;
        }

        public static function getByGroupArray($group)
        {
                $entrys = DB::table('codes')
                ->where("group", $group)
                ->orderBy('sort')
                ->orderBy('id')
                ->get();

                $return = [];
                foreach ($entrys as $entry) {
                        $return[] = $entry->toDesign();
                }
                return $return;
        }

        //=======================
        public static function getCodesByGroup($group)
        {
                return DB::table('codes')
                ->where("group", $group)
                ->orderBy('id')
                ->pluck("name", 'id');
        }


        // 특정그룹을 특정 필드명으로 조회
        public static function getCodeFieldArray($group, $field = 'id')
        {

                $return = DB::table('codes')
                ->where("group", $group);

                if ($field == 'name') {
                        return $return->orderBy('name')->pluck("name");
                } else {
                        return $return->orderBy('id')->pluck('id');
                }
        }
}
