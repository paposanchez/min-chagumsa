<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class OrderFeature extends Model {
        protected $table = 'order_features';
        protected $primaryKey = ['orders_id', 'features_id'];
        public $incrementing = false;
        protected $fillable = [
                'orders_id',
                'features_id'
        ];
        public $timestamps = false;



        public static function replaceAll($order_id, $params = []) {

                self::where('orders_id',$order_id)->delete();
                $inserts = [];
                if(count($params)) {
                        foreach($params as $param) {
                                array_push($inserts, ["orders_id"=>$order_id, "features_id"=>$param]);
                        }
                        self::insert($inserts);
                }

        }

}
