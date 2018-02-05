<?php

namespace App\Observers;

use Illuminate\Notifications\Notifiable;
use App\Models\Order;

use App\Notifications\OrderCompleted;


class OrderObserver
{
        use Notifiable;

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

        public function updated(Order $obj)
        {

                if($obj->status_cd == 102)
                {
                        $this->notify(new OrderCompleted($obj));
                        // $this->notify(new OrderCompletedToGarage($obj));
                        // $this->notify(new OrderCompletedToGarage($obj));
                }
                // if (in_array($obj->status_cd, [100,101,102]))
                // {
                //
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
