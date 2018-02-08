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



use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

use App\Models\Abstracts\Diagnoses as DiagnosesFactory;
use App\Models\Abstracts\Document as DocumentFactory;
use App\Contracts\Document as IDocument;

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
                $layout = json_decode($document->orderItem->item->layout, true);
                $entrys = $document->diagnoses;


                // 페이지들
                foreach($layout as &$page) {

                        // 페이지명
                        $page['name'] = $this->code($page['name_cd']);
                        unset($page['name_cd']);

                        // 그룹들
                        foreach($page['entrys'] as &$groups) {

                                // 그룹명
                                $groups['name'] = $this->code($groups['name_cd']);
                                unset($groups['name_cd']);

                                // 아이템들
                                foreach($groups['entrys'] as &$item) {

                                        if($item['name_cd'])
                                        {

                                                $item['name'] = $this->code($item['name_cd']);
                                                unset($item['name_cd']);


                                                foreach($item['entrys'] as &$i)
                                                {
                                                        // $i['name'] = $this->code($i['name_cd']);
                                                        // unset($i['name_cd']);


                                                }


                                                // print_r($item);
                                                // echo "<hr/>";


                                                // foreach($item['entrys'] as &$i)
                                                // {
                                                //
                                                //         foreach($entrys as $entry)
                                                //         {
                                                //                 if($entry->group == $i['name_cd']) {
                                                //                         $i = $this->item($entry);
                                                //                 }
                                                //         }
                                                //
                                                // }


                                                 // $item['entrys'] = $this->diagnoses($entrys, $item);
                                        }


                                        // if($item['name_cd'])
                                        // {
                                        //
                                        //         // 아이템명
                                        //         $item['name'] = $this->code($item['name_cd']);
                                        //         $item['entrys'] = $this->diagnoses($entrys, $item);
                                        //
                                        // }

                                }


                        }

                }

                dd($layout);

                return $layout;
        }


        // 진단내역중 $group(name_cd) 에 따른 항목을 조회된 진단리스트에서 추출
        private function diagnoses($entrys, $item) {

                $return = [];
                foreach($entrys as $entry)
                {
                        if($entry->group == $item['name_cd']) {
                                $return[] = DiagnosesFactory::build($entry)->toArray();
                        }
                }
                return $return;

        }

        //
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
