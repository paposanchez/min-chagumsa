<?php

namespace App\Observers;

use Illuminate\Notifications\Notifiable;
use App\Models\OrderItem;

class OrderItemObserver
{
        use Notifiable;

        // public function retrieved(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function creating(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function created(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function updating(OrderItem $obj)
        // {
        //         //
        // }

        public function updated(OrderItem $obj)
        {
                // sample
                // if ($obj->status_cd != $obj->getOriginal('status_cd')) {

                // 진단데이터가 업데이트 될 경우 상태값에 따라 노티를 설정한다
                // $this->notify(new OrderItemNotification());

                // }
        }

        // public function saving(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function saved(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function deleting(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function deleted(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function restoring(OrderItem $obj)
        // {
        //         //
        // }
        //
        // public function restored(OrderItem $obj)
        // {
        //         //
        // }
}
