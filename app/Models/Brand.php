<?php
/**
* Created by IntelliJ IDEA.
* User: dev
* Date: 2017. 4. 12.
* Time: PM 2:28
*/

namespace App\Models;

use DB;
use App\Models\Abstracts\Cache AS CacheModel;

class Brand extends CacheModel
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'name',
        ];
        protected $dates = ['created_at', 'updated_at'];

        public function models(){
                return $this->hasMany(\App\Models\Models::class, 'brand_id', 'id');
        }



        public static function getList()
        {
                return self::select('id', 'name')
                ->orderByRaw('CASE WHEN id = 5 THEN 8 WHEN id = 6 THEN 9 WHEN id = 4 OR id = 19 OR id = 38 OR id = 74 OR id = 44 THEN 5 WHEN id = 1 OR id = 28 OR id = 45 THEN 1 ELSE 3 END ASC, name ASC')
                ->get();
        }
}
