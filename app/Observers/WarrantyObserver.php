<?php

namespace App\Observers;


use App\Events\Warranty\OnWarrantyStart;
use App\Events\Warranty\OnWarrantyIssued;
use App\Events\Warranty\OnWarrantyRefused;
use App\Events\Warranty\OnWarrantyExpired;
use App\Models\Warranty;

class WarrantyObserver
{

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

        public function updated(Warranty $warranty)
        {

                // 검토중
                if ($warranty->status_cd == 114)
                {
                        event(new OnWarrantyStart($warranty));
                }

                // 발급오나료
                if ($warranty->status_cd == 115)
                {
                        event(new OnWarrantyIssued($warranty));
                }

                // 발급거절
                // if ($warranty->status_cd == ??)
                // {
                //         event(new OnWarrantyRefused($warranty));
                // }

                // 만료
                if ($warranty->status_cd == 116)
                {
                        event(new OnWarrantyExpired($warranty));
                }

                // sample
                // if ($obj->status_cd != $obj->getOriginal('status_cd')) {

                // if ($obj->status_cd == 120) {
                //         $this->notify(new OrderCanCeled($obj->order));
                // }
                //
                // if ($obj->status_cd == 115) {
                //         $this->notify(new WarrantyIssue($obj));
                // }
                //
                // if ($obj->status_cd == 116) {
                //         $this->notify(new WarrantyOnExpire($obj));
                // }
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
