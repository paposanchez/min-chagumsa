<?php

namespace App\Models;
use DB;

class DiagnosesSection
{
        public $name_cd;
        public $name;
        public $entrys;
        public $diagnoses;
        public $diagnoses_id;
        public $description;

        // 레이아웃으로 초기화
        public function __construct(Array $page, $create = false, $diagnosis_id = null)
        {

                $this->name_cd        = $page['name_cd'];
                $this->name     = $this->getNameByCode();

                if(isset($page['entrys'])  && is_array($page['entrys']))
                {
                        foreach($page['entrys'] as $entry)
                        {
                                $this->entrys[] = (new self($entry, $create, $diagnosis_id))->toArray();
                        }
                }else{
                        $this->entrys = [];
                }

                if(isset($page['diagnoses_id']))
                {
                        $this->diagnoses = Diagnoses::find($page['diagnoses_id'])->toDocument();
                        $this->diagnoses_id = $page['diagnoses_id'];
                }else{
                        $this->diagnoses_id = null;
                        $this->diagnoses = null;

                        // 설정된 레이아웃이 있다면
                        if(isset($page['diagnoses']))
                        {
                                // 생성이라면
                                if($create)
                                {
                                        // 신규데이터를 생성하고 그 시퀀스를 저장한다
                                        if(is_array($page['diagnoses']['except_options']))
                                        {
                                                $page['diagnoses']['except_options'] = implode(',',$page['diagnoses']['except_options']);
                                        }
                                        $page['diagnoses']['diagnosis_id'] = $diagnosis_id;
                                        $d = Diagnoses::create($page['diagnoses']);
                                        $this->diagnoses = $d->toDocument();
                                        $this->diagnoses_id = $d->id;
                                }else{
                                        // 생성이 아니라면 데이터 스트럭쳐만 구성
                                        $this->diagnoses = (new Diagnoses($page['diagnoses']))->toDocument();
                                }
                        }
                }
        }


        public function getNameByCode()
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

        public function toArray()
        {
                return [
                        'name_cd'       => $this->name_cd,
                        'name'          => $this->name,
                        'entrys'        => $this->entrys,
                        'diagnoses_id'  => $this->diagnoses_id,
                        'diagnoses'     => $this->diagnoses,
                ];
        }

}
