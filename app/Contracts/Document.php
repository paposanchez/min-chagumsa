<?php
namespace App\Contracts;

interface Document
{
        // 데이터 로드
        public function load($document_id);

        // 데이터 로드
        public function get();

        // 캐쉬삭제
        public function purge();

        // 캐쉬생성
        public function cache();



}
