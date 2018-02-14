<?php
namespace App\Models\Abstracts;

use App\Models\Code;
use Carbon\Carbon;

use App\Contracts\Document as IDocument;
use App\Contracts\DocumentRepository as IDocumentRepository;
use App\Models\DocumentOrder;

abstract class Document implements IDocumentRepository
{

        protected $document;                    // 현재 도큐먼트
        protected $chakey_after;                // 도큐먼트 종류문자
        protected $view;                        // 뷰 템플릿
        protected $expired_status_cd = 116;     // 만료상태코드

        protected $order;                       // 생성된 주문데이터


        protected function loadDocument($document_id)
        {
                throw new Exception("해당 메쏘드를 구현해야 합니다.");
        }
        protected function loadExtra()
        {
                throw new Exception("해당 메쏘드를 구현해야 합니다.");
        }
        protected function loadOrder()
        {
                $this->order = new DocumentOrder($this->document);
        }


        // 데이터 로드
        public function load($document_id) {
                $this->loadDocument($document_id);
                $this->loadOrder();
                return $this;
        }

        // 캐쉬삭제
        public function purge() {
                return true;
        }

        // 캐쉬생성
        public function cache() {
                return true;
        }




        public function toObject()
        {
                return [
                        'order' => $this->order
                ];
        }

        public function toArray()
        {
                return [
                        'order' => $this->order->toArray()
                ];
        }

        public function toHtml(){
                return view($this->view, $this->toArray());
        }

        public function toJson()
        {
                return json_encode($this->toArray());
        }

        public function toPdf(){
                $pdf = PDF::loadView($this->view, $this->toArray());
                return $pdf->stream($this->getDocumentNumber(), array('Attachment'=>0));
        }


        // 문서의 문서번호
        public function getDocumentNumber()
        {
                return $this->order->chakey . $this->chakey_after;
        }

        // 문서의 만료여부
        public function isExpired() {
                return $this->document->status_cd == $this->expired_status_cd;
        }

        // 문서의 만료일까지 남은 시간
        public function getCountdown()
        {
                return $this->document->expired_at->diffInSeconds(Carbon::now());
        }



        // public function code($name_cd)
        // {
        //         try{
        //                 return Code::findOrFail($name_cd)->toDesign();
        //         }catch(Exception $e){
        //                 return $name_cd;
        //         }
        // }
        //
        // public function codeGroup($id)
        // {
        //         try {
        //                 if($id){
        //                         $code = Code::findOrFail($id);
        //                         return Code::getByGroupArray($code->name);
        //                 }else{
        //                         return [];
        //                 }
        //
        //         }catch(Exception $e) {
        //                 return [];
        //         }
        // }



}
