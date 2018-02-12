<?php

namespace App\Observers;

use App\Models\Diagnosis;
use App\Notifications\DiagnosisConfirm;
use App\Notifications\DiagnosisConfirmFromUser;
use App\Notifications\DiagnosisIssue;
use App\Notifications\DiagnosisOnExpire;
use App\Notifications\DiagnosisOnStartToGarage;
use App\Notifications\DiagnosisReservationChagneToGarage;
use App\Notifications\DiagnosisReservationChangeToUser;
use App\Notifications\DiagnosisReviewComplete;
use App\Notifications\OrderCanCeled;
use Illuminate\Notifications\Notifiable;
use App\Models\Diagnosis;

class DiagnosisObserver
{
    use Notifiable;

    // public function retrieved(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function creating(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function created(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function updating(Diagnosis $obj)
    // {
    //         //
    // }

    public function updated(Diagnosis $obj)
    {
        if($obj->status_cd = 120){
            $this->notify(new OrderCanCeled($obj->order));
        }

        if ($obj->reservation_user_id == 0 && $obj->status_cd == 112) {
            $this->notify(new DiagnosisOnStartToGarage($obj));
        }

        if ($obj->reservationUser->hasRole('member') && $obj->status_cd == 113) {
            $this->notify(new DiagnosisConfirm($obj));
        }

        if ($obj->reservationUser->hasRole(['admin', 'garage'] && $obj->status_cd == 113)) {
            $this->notify(new DiagnosisConfirmFromUser($obj));
        }

        if ($obj->reservationUser->hasRole(['admin', 'garage']) && $obj->confirm_at == null) {
            $this->notify(new DiagnosisReservationChangeToUser($obj));
        }

        if ($obj->status_cd == 126) {
            $this->notify(new DiagnosisReviewComplete($obj));
        }

        if ($obj->status_cd == 115) {
            $this->notify(new DiagnosisIssue($obj));
        }

        if ($obj->status_cd == 116) {
            $this->notify(new DiagnosisOnExpire($obj));
        }
    }

    // public function saving(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function saved(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function deleting(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function deleted(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function restoring(Diagnosis $obj)
    // {
    //         //
    // }
    //
    // public function restored(Diagnosis $obj)
    // {
    //         //
    // }
}
