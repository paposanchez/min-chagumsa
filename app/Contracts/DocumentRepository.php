<?php
namespace App\Contracts;

use App\Contracts\Document as IDocument;

interface DocumentRepository
{

        // 데이터 로드
        public function load($document_id);

        // 캐쉬삭제
        public function purge();

        // 캐쉬생성
        public function cache();




        public function toJson();
        public function toHtml();
        public function toPdf();
        public function toArray();
        public function toObject();

        // 주문데이터
        // public function order(IDocument $document);

}
