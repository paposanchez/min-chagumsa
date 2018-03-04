<?php

namespace App\Observers;

use App\Models\Order;
use App\Events\OnOrderCancled;
use App\Events\OnOrderCompleted;

class OrderObserver
{

        // public function retrieved(Order $obj)
        // {
        //         //
        // }
        //
        // public function creating(Order $obj)
        // {
        //         //
        // }
        //
        // public function created(Order $obj)
        // {
        //         //
        // }

        // public function updating(Order $obj)
        // {
        // }

        public function updated(Order $order)
        {

                if ($order->status_cd == 100) {
                        event(new OnOrderCancled($order));
                }

                if ($order->status_cd == 102) {
                        event(new OnOrderCompleted($order));
                }

                // if ($obj->status_cd == 100) {
                //         $this->notify(new OrderCanCeled($obj));
                // }
                //
                // if ($obj->status_cd == 102) {
                //         $this->notify(new OrderCompleted($obj));
                //         // $this->notify(new OrderCompletedToGarage($obj));
                //         // $this->notify(new OrderCompletedToGarage($obj));
                // }
        }

        // public function saving(Order $obj)
        // {
        //         //
        // }
        //
        // public function saved(Order $obj)
        // {
        //         //
        // }
        //
        // public function deleting(Order $obj)
        // {
        //         //
        // }
        //
        // public function deleted(Order $obj)
        // {
        //         //
        // }
        //
        // public function restoring(Order $obj)
        // {
        //         //
        // }
        //
        // public function restored(Order $obj)
        // {
        //         //
        // }
}
