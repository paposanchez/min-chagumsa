<?php

namespace App\Models;
use DB;

class DiagnosesSection
{
        private $name_cd;
        private $name;
        private $entrys;
        private $diagnoses;
        private $diagnoses_id;


        private $description;
        public function __construct($page)
        {

                $this->name_cd        = $page['name_cd'];
                if(isset($page['entrys'])  && is_array($page['entrys']))
                {
                        foreach($page['entrys'] as $entry)
                        {
                                $this->entrys[] = (new self($entry))->toArray();
                        }
                }else{
                        $this->entrys        = [];
                }

                $this->diagnoses_id     = isset($page['diagnoses_id']) ? $page['diagnoses_id'] : null;
                $this->diagnoses        = isset($page['diagnoses']) ? $page['diagnoses'] : null;

        }

        public function getNameCd()
        {
                return $this->name_cd;
        }

        public function getName()
        {
                try{
                        $return = Code::findOrFail($this->name_cd);
                        return $return->toDesign();
                }catch(Exception $e){
                        return $this->name_cd;
                }
        }

        public function getEntrys()
        {
                return  $this->entrys;
        }

        public function getDiagnoses()
        {
                try{
                        if($this->diagnoses_id)
                        {
                                return Diagnoses::find($this->diagnoses_id)->toDocumentArray();
                        }else{
                                return $this->diagnoses;
                        }
                }catch(Exception $e){
                        return $this->diagnoses;
                }
        }

        public function getDiagnosesId()
        {
                return $this->diagnoses_id;
        }

        public function toArray()
        {
                return [
                        'name_cd'       => $this->getNameCd(),
                        'name'          => $this->getName(),
                        'entrys'        => $this->getEntrys(),
                        'diagnoses_id'  => $this->getDiagnosesId(),
                        'diagnoses'     => $this->getDiagnoses(),
                ];
        }

}
