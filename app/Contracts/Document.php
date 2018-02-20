<?php
namespace App\Contracts;

interface Document
{

        public function getDocumentKey();
        public function getDocumentLink();

        public function isExpired();
        public function getCountdown();

}
