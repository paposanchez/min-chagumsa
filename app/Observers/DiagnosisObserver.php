<?php

namespace App\Observers;

use App\Events\Diagnosis\OnDiagnosisReserveCompleted;
use App\Events\Diagnosis\OnDiagnosisStart;
use App\Events\Diagnosis\OnDiagnosisCompleted;
use App\Events\Diagnosis\OnDiagnosisIssued;
use App\Events\Diagnosis\OnDiagnosisExpired;
use App\Models\Diagnosis;

class DiagnosisObserver
{

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

        public function updated(Diagnosis $diagnosis)
        {

                // 예약확정
                if ($diagnosis->status_cd == 113)
                {
                        event(new OnDiagnosisReserveCompleted($diagnosis, $diagnosis->getOriginal('garage_id')));
                }

                // 검토중
                if ($diagnosis->status_cd == 114)
                {
                        event(new OnDiagnosisStart($diagnosis));
                }

                // 검토완료
                if ($diagnosis->status_cd == 126)
                {
                        event(new OnDiagnosisCompleted($diagnosis));
                }

                // 발급오나료
                if ($diagnosis->status_cd == 115)
                {
                        event(new OnDiagnosisIssued($diagnosis));
                }

                // 만료
                if ($diagnosis->status_cd == 116)
                {
                        event(new OnDiagnosisExpired($diagnosis));
                }

                // if($obj->status_cd = 120){
                //         $this->notify(new OrderCanCeled($obj->order));
                // }
                //
                // if ($obj->reservation_user_id == 0 && $obj->status_cd == 112) {
                //         $this->notify(new DiagnosisOnStartToGarage($obj));
                // }
                //
                // if ($obj->reservationUser->hasRole(['admin', 'garage'] && $obj->status_cd == 113)) {
                //         $this->notify(new DiagnosisConfirmFromUser($obj));
                // }
                //
                // if ($obj->reservationUser->hasRole('member') && $obj->status_cd == 113) {
                //         $this->notify(new DiagnosisConfirm($obj));
                // }
                //
                // if ($obj->reservationUser->hasRole(['admin', 'garage']) && $obj->confirm_at == null) {
                //         $this->notify(new DiagnosisReservationChangeToUser($obj));
                // }
                //
                // if ($obj->status_cd == 126) {
                //         $this->notify(new DiagnosisReviewComplete($obj));
                // }
                //
                // if ($obj->status_cd == 115) {
                //         $this->notify(new DiagnosisIssue($obj));
                // }
                //
                // if ($obj->status_cd == 116) {
                //         $this->notify(new DiagnosisOnExpire($obj));
                // }
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
