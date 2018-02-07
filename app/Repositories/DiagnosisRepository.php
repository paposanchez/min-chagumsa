<?php

namespace App\Repositories;

/*
*
* @Project        cargumsa
* @Copyright      leechanrin
* @Created        2017-05-24 오후 5:17:35
* @Filename       DiagnosisRepository.php
* @Description    진단데이터에 대한 암호화 복호화 검증등을 진한하는 Diagnosis Repository
*
*/

// use App\Services\Encrypter;
use App\Models\Order;
use App\Models\Diagnosis;
use App\Models\Diagnoses;
use App\Models\DiagnosisFile;
use App\Models\Code;
use App\Abstracts\Document as DocumentFactory;
use App\Contracts\Document as IDocument;

use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

final class DiagnosisRepository extends DocumentFactory implements IDocument
{

        protected static $instance;
        protected $document;
        protected $data;
        protected $chakey_after = 'D';
        protected $view = 'document.diagnosis';

        public static function getInstance()
        {
                if (is_null(static::$instance)) {
                        static::$instance = new static();
                }

                return static::$instance;
        }

        public function load($document_id)
        {
                $this->document = Diagnosis::findOrFail($document_id);

                $this->data['order']     = $this->order($this->document);
                $this->data['entrys']   = $this->diagnosis($this->document);

                return $this;
        }

        // 캐쉬삭제
        public function purge()
        {
                return true;
        }

        // 캐쉬생성
        public function cache()
        {
                return true;
        }

        public function order($document) {

                $return = parent::order($document);

                $return["reservation_at"] = [
                        "date" => $document->reservation_at->format('Y-m-d'),
                        "time" => $document->reservation_at->format('H:i'),
                        "fulldate" => $document->reservation_at->format('Y-m-d H:i:s')
                ];

                $return["extra_status"] = $document->extraStatus();

                return $return;
        }

        // 진단데이터 데이터셋
        public function diagnosis($document)
        {

                //@TODO 진단레이아웃은 진단생성시 진단테이블 또는 주문상품 테이블에 들어가도록 변경해야 한다
                // 진단레이아웃
                $return = json_decode($document->orderItem->item->layout, true);
                $entrys = $document->diagnoses;

                foreach($return as &$details) {

                        // 이름코드 데이터
                        $details['name'] = $this->code($details['name_cd']);

                        foreach($details['entrys'] as &$detail) {

                                // 이름코드 데이터
                                $detail['name'] = $this->code($detail['name_cd']);

                                // 레이아웃에 덮을 데이터가 있을지 말지 판단
                                $detail['entrys'] = $this->diagnoses($entrys, $detail['name_cd']);

                                foreach($detail['children'] as &$children) {
                                        $children['name'] = $this->code($children['name_cd']);
                                        $children['entrys'] = $this->diagnoses($entrys, $children['name_cd']);
                                }

                        }

                }

                return $return;
        }


        // 진단내역중 $group(name_cd) 에 따른 항목을 조회된 진단리스트에서 추출
        private function diagnoses($document, $group) {

                $return = [];
                foreach($document as $diagnoses)
                {
                        if($group == $diagnoses->group) {
                                $return[] = $this->detail($diagnoses);
                        }
                }

                return $return;

        }

        // 진단데이터 완성형
        private function detail($entry) {
                return [
                        "id"            => ($entry->id ? $entry->id : ''),
                        'diagnosis_id'  => $entry->diagnosis_id,
                        'name'          => ($entry->name_cd ? $this->code($entry->name_cd) : ''),
                        'group'         => $entry->group,
                        'use_image'     => $entry->use_image,
                        'use_voice'     => $entry->use_voice,
                        'options_cd'    => $entry->options_cd,
                        'options'       => $entry->getOptions($entry->options_cd),
                        'selected'      => $entry->selected,
                        'except_options'=> explode(",", $entry->except_options),
                        'description'   => $entry->description,
                        'comment'       => $entry->comment,
                        'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                        'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                        'files'         => $this->files($entry->files)
                ];

        }

        private function files($files) {
                $return = [];
                if($files) {
                        foreach ($files as $entry) {
                                $return[] = array(
                                        'id'            => $entry->id,
                                        'diagnoses_id'  => $entry->diagnoses_id,
                                        'original'      => $entry->original,
                                        'source'        => $entry->source,
                                        'path'          => $entry->path,
                                        'mime'          => $entry->mime,
                                        'size'          => $entry->size,
                                        'fullpath'      => $entry->getRealPath('app/diagnosis'),
                                        'preview'       => $entry->getPreviewPath(),
                                        'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                                        'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                                );
                        }
                }

                return $return;
        }

}
