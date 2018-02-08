<?php
namespace App\Models\Abstracts;

use App\Contracts\Diagnoses as IDiagnoses;
use App\Models\Diagnoses;
use Carbon\Carbon;

abstract class DiagnosesEntry implements IDiagnoses;
{

        // protected $data;


        public static function build(IDiagnoses $diagnoses)
        {

                // return {
                //         'name_cd'       => '',
                //         'data'          => '',
                //         'entrys'        => '',
                // }
        }



}
