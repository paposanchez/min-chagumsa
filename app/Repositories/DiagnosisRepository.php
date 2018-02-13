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
use App\Models\DiagnosesSection;
use App\Models\DiagnosisBuilder;


use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;


use App\Models\DocumentOrder;
use App\Models\Abstracts\Diagnoses as DiagnosesFactory;
use App\Models\Abstracts\Document as DocumentFactory;
use App\Contracts\DocumentRepository as IDocumentRepository;
use App\Contracts\Document as IDocument;

final class DiagnosisRepository extends DocumentFactory implements IDocumentRepository
{

        protected static $instance;

        protected $chakey_after = 'D';
        protected $view = 'document.diagnosis';
        protected $diagnosis;

        public static function getInstance()
        {
                if (is_null(static::$instance)) {
                        static::$instance = new static();
                }

                return static::$instance;
        }

        protected function loadDocument($document_id)
        {
                $this->document = Diagnosis::findOrFail($document_id);
        }

        protected function loadOrder()
        {
                $this->order = new DocumentOrder($this->document,
                [
                        "reservation_at"        => [
                                "date"          => $this->document->reservation_at->format('Y-m-d'),
                                "time"          => $this->document->reservation_at->format('H:i'),
                                "fulldate"      => $this->document->reservation_at->format('Y-m-d H:i:s')
                        ],
                        "extra_status"  => $this->document->extraStatus()
                ]);

        }

        // 진단데이터 데이터셋
        protected function loadDiagnosis()
        {
                //@TODO 진단레이아웃은 진단생성시 진단테이블 또는 주문상품 테이블에 들어가도록 변경해야 한다
                // 진단레이아웃
                $layout = json_decode($this->document->layout, true);

                try{

                        // 최초의 레이아웃 수만큼만 처리
                        // 이하는 DiagnosisSection의 recursive로 처리
                        foreach($layout as &$page)
                        {
                                $page = new DiagnosesSection($page);
                        }

                        $this->diagnosis = $layout;

                }catch(Exception $e) {
                        dd($e);
                }
        }

        // 데이터 로드
        public function load($document_id)
        {
                $this->loadDocument($document_id);
                $this->loadOrder();
                $this->loadDiagnosis();
                return $this;
        }

        public function toObject()
        {
                return [
                        'order' => $this->order,
                        'diagnosis' => $this->diagnosis
                ];
        }

        public function toArray()
        {
                $return = [];

                foreach($this->diagnosis as $diagnosis)
                {
                        $return[] = $diagnosis->toArray();
                }
                return [
                        'order' => $this->order->toArray(),
                        'diagnosis' => $return
                ];
        }


        public function update($save_data) {

                $json_save_data = $save_data;

                if($json_save_data) {

                        // 주문데이터를 기준으로 가져간 형태로 보내진다
                        // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
                        // 실제저장할 데이터를 모두 detail_item과 detail_file이다

                        DB::beginTransaction();

                        try{

                                foreach($json_save_data as $item) {
                                        $diagnosis = Diagnosis::find($item['id']);
                                        $diagnosis->selected = $item['selected'];
                                        $diagnosis->save();
                                }

                                return DB::commit();

                        }catch(Exception $e) {

                                DB::rollBack();
                                return false;

                        }

                }

                return false;
        }

}
