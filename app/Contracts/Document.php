<?php
namespace App\Contracts;

// 인증서 인터페이스
interface Document
{
        public function isExpired();
        public function getCountdown();
        public function getDocumentKey();
        public function getDocumentNumber();
        public function getDocumentLink();
}
