<?php

namespace App\Observers;

use Illuminate\Notifications\Notifiable;
use App\Models\Certificate;

class CertificateObserver
{
        use Notifiable;

        // public function retrieved(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function creating(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function created(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function updating(Certificate $obj)
        // {
        //         //
        // }

        public function updated(Certificate $obj)
        {
                // sample
                // if ($obj->status_cd != $obj->getOriginal('status_cd')) {

                // 진단데이터가 업데이트 될 경우 상태값에 따라 노티를 설정한다
                // $this->notify(new CertificateNotification());

                // }
        }

        // public function saving(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function saved(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function deleting(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function deleted(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function restoring(Certificate $obj)
        // {
        //         //
        // }
        //
        // public function restored(Certificate $obj)
        // {
        //         //
        // }
}
