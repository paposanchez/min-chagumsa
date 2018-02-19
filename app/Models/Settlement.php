<?php
/**
* Created by IntelliJ IDEA.
* User: dev
* Date: 2017. 4. 12.
* Time: PM 3:01
*/

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\SettlementFeature;

class Settlement extends Model
{
        protected $fillable = [
                'user_id',
                'amount',
                'description',
                'status_cd',
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];


        public function status()
        {
                return $this->hasOne(\App\Models\Code::class, 'id', 'status_cd');
        }

        public function settlement_feature(){
                return $this->hasOne(\App\Models\SettlementFeature::class);
        }
}
