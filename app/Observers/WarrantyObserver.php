<?php

namespace App\Observers;

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

                // 진단데이터가 업데이트 될 경우 상태값에 따라 노티를 설정한다
                // $this->notify(new WarrantyNotification());

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
