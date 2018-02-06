<?php

namespace App\Observers;

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
                // sample
                // if ($obj->status_cd != $obj->getOriginal('status_cd')) {

                // 진단데이터가 업데이트 될 경우 상태값에 따라 노티를 설정한다
                // $this->notify(new DiagnosisNotification());

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
