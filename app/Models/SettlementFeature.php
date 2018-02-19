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

use App\Models\Order;
use App\Models\Settlement;

class SettlementFeature extends Model
{
        protected $primaryKey = 'id';

        protected $fillable = [
                'settlements_id',
                'users_id',
                'order_items_id',
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order_items(){
                return $this->hasOne(\App\Models\OrderItem::class);
        }

        public function users(){
                return $this->hasOne(\App\Models\User::class);
        }

        public function settlement(){
                return $this->hasOne(\App\Models\Settlement::class);
        }
}
