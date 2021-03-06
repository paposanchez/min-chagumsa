<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Purchase extends Model
{
        protected $primaryKey = 'id';
        protected $fillable = [
                'id',
                'transaction_id',
                'amount',
                'type',
                'refund_name',
                'refund_account',
                'refund_bank',
                'status_cd',
        ];

        protected $dates = [
                'created_at', 'updated_at'
        ];

        public function order()
        {
                return $this->belongsTo(\App\Models\Order::class, 'id', 'purchase_id');
        }

        public function payment_type()
        {
                return $this->hasOne(\App\Models\Code::class, 'id', 'type');
        }

        public function status()
        {
                return $this->hasOne(\App\Models\Code::class, 'id', 'status_cd');
        }

        public function payment()
        {
                return $this->hasOne(\App\Models\Payment::class, 'moid', 'id');
        }


}
