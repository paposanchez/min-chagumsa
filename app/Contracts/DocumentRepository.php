<?php
namespace App\Contracts;

use App\Contracts\Document as IDocument;

interface DocumentRepository
{

        // 데이터 로드
        public function load($document_id);
        public function loadDocument($document_id);
        public function loadDocumentOrder();
        // 문서생성을 위한 최종데이터 구성
        // public function build();

        // 캐쉬삭제
        // public function purge();
        // 캐쉬생성
        // public function cache();
        public function toHtml();
        public function toPdf();
        public function toArray();

}
