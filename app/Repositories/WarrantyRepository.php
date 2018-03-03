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
use App\Models\Certificate;
use App\Models\Code;

final class WarrantyRepository extends DocumentFactory implements IDocumentRepository
{

        protected static $instance;
        protected $view = 'document.certificate';
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
                $this->document = Certificate::findOrFail($document_id);
                return $this;
        }

}
