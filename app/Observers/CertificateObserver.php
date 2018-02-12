<?php

namespace App\Observers;

use App\Notifications\CertificateIssue;
use App\Notifications\CertificateOnExpire;
use App\Notifications\CertificateOnReady;
use App\Notifications\OrderCanCeled;
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

//        if ($obj->status_cd == 112) {
//            $this->notify(new CertificateOnReady($obj));
//        }

        if ($obj->status_cd == 120) {
            $this->notify(new OrderCanCeled($obj->order));
        }

        if ($obj->status_cd == 115) {
            $this->notify(new CertificateIssue($obj));
        }

        if ($obj->status_cd == 116) {
            $this->notify(new CertificateOnExpire($obj));
        }


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
