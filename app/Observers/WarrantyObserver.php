<?php

namespace App\Observers;

use App\Notifications\OrderCanCeled;
use App\Notifications\WarrantyIssue;
use App\Notifications\WarrantyOnExpire;
use Illuminate\Notifications\Notifiable;
use App\Models\Warranty;


class WarrantyObserver
{
    use Notifiable;

    // public function retrieved(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function creating(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function created(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function updating(Warranty $obj)
    // {
    //         //
    // }

    public function updated(Warranty $obj)
    {
        // sample
        // if ($obj->status_cd != $obj->getOriginal('status_cd')) {

        if ($obj->status_cd == 120) {
            $this->notify(new OrderCanCeled($obj->order));
        }

        if ($obj->status_cd == 115) {
            $this->notify(new WarrantyIssue($obj));
        }

        if ($obj->status_cd == 116) {
            $this->notify(new WarrantyOnExpire($obj));
        }
    }

    // public function saving(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function saved(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function deleting(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function deleted(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function restoring(Warranty $obj)
    // {
    //         //
    // }
    //
    // public function restored(Warranty $obj)
    // {
    //         //
    // }
}
