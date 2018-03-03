<?php
namespace App\Models\Abstracts;

use App\Models\Diagnoses;
use Carbon\Carbon;

abstract class Diagnoses;
{

        public static function build(Diagnoses $diagnoses)
        {

                return {
                        "id"            => ($diagnoses->id ? $diagnoses->id : ''),
                        'diagnosis_id'  => $diagnoses->diagnosis_id,
                        'name'          => ($diagnoses->name_cd ? $this->code($diagnoses->name_cd) : ''),
                        'group'         => $diagnoses->group,
                        'use_image'     => $diagnoses->use_image,
                        'use_voice'     => $diagnoses->use_voice,
                        'options_cd'    => $diagnoses->options_cd,
                        'options'       => $this->codeGroup($diagnoses->options_cd),
                        'selected'      => $diagnoses->selected,
                        'except_options'=> explode(",", $diagnoses->except_options),
                        'description'   => $diagnoses->description,
                        'comment'       => $diagnoses->comment,
                        'created_at'    => $diagnoses->created_at->format("Y-m-d H:i:s"),
                        'updated_at'    => ($diagnoses->updated_at ? $diagnoses->updated_at->format("Y-m-d H:i:s") : ''),
                        'files'         => $this->files($diagnoses->files)
                }
        }

}
