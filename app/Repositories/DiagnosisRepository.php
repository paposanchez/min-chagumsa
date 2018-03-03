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

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use App\Contracts\DocumentRepository as IDocumentRepository;
use App\Contracts\Document as IDocument;
// use App\Services\Encrypter;
use App\Models\DocumentOrder;
use App\Models\Abstracts\Document as DocumentFactory;
use App\Models\Order;
use App\Models\Diagnosis;
use App\Models\Diagnoses;
use App\Models\DiagnosesFile;
use App\Models\Code;

use App\Models\DiagnosesSection;
use App\Models\DiagnosisBuilder;

final class DiagnosisRepository extends DocumentFactory implements IDocumentRepository
{

        protected static $instance;
        protected $view = 'document.diagnosis';
        protected $layout;

        public static function getInstance()
        {
                if (is_null(static::$instance)) {
                        static::$instance = new static();
                }

                return static::$instance;
        }


        public function loadDocument($document_id)
        {
                $this->document = Diagnosis::findOrFail($document_id);
                return $this;
        }
        public function loadDocumentOrder()
        {
                $this->order = new DocumentOrder($this->document,
                [
                        "reservation_at"        => [
                                "date"          => $this->document->reservation_at->format('Y-m-d'),
                                "time"          => $this->document->reservation_at->format('H:i'),
                                "fulldate"      => $this->document->reservation_at->format('Y-m-d H:i:s')
                        ],

                        // 진단데이터의 이슈상태,
                        "extra_status"  => $this->document->extraStatus()
                ]);
                return $this;
        }


        // 진단검토중
        public function triggerReview($user_id) {

                if($this->document->status_cd == $this->getStatusCode(self::DOCUMENT_CONFIRM))
                {

                        // 진단레이아웃을 재구성한다
                        // 기존 데이터 삭제
                        Diagnoses::where('diagnosis_id', '=', $this->document->id)->delete();

                        // 진단레이아웃 업데이트
                        // 레이아웃용 diagnoses_id
                        $this->layoutBuild(true, $this->document->id);
                        $save_layout = $this->saveLayout($this->layout);

                        $this->document->layout = json_encode($save_layout);
                        // 진단상태를 업데이트 한다.
                        $this->document->engineer_id = $user_id;
                        $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_REVIEW);
                        $this->document->start_at    = Carbon::now();
                        $this->document->save();
                }

                return $this;
        }

        public function layout()
        {
                if(!$this->layout)
                {
                        $this->layoutBuild();
                }
                return $this->layout;
        }

        // 문서의 진단레이아웃 조회
        private function getLayoutObject() {
                return json_decode($this->document->layout, true);
        }

        // DB저장용으로 레이아웃 변경
        private function saveLayout($layout)
        {
                foreach($layout as &$page)
                {
                        $this->section($page);
                }
                return $layout;
        }
        private function section(&$section)
        {
                if($section['entrys'])
                {
                        foreach($section['entrys'] as &$sec)
                        {
                                $this->section($sec);
                        }
                        unset($section['diagnoses_id']);
                }else{
                        unset($section['entrys']);
                }

                unset($section['name']);
                unset($section['diagnoses']);
        }

        private function layoutBuild($create = false, $diagnosis_id = null)
        {
                $layout = $this->getLayoutObject();
                foreach($layout as &$page)
                {
                        $page = (new DiagnosesSection($page,$create,$diagnosis_id))->toArray();
                }
                $this->layout = $layout;
        }
}
