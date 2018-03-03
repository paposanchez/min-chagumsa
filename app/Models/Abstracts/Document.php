<?php
namespace App\Models\Abstracts;

use App\Models\Code;
use Carbon\Carbon;

use App\Contracts\Document as IDocument;
use App\Contracts\DocumentRepository as IDocumentRepository;
use App\Models\DocumentOrder;

abstract class Document implements IDocumentRepository
{
        const DOCUMENT_ORDER            = 'order';
        const DOCUMENT_CONFIRM          = 'confirm';            //예약확인
        const DOCUMENT_REVIEW           = 'review';             // 검토중
        const DOCUMENT_REVIEW_COMPLETE  = 'review_complete';    // 검토완료
        const DOCUMENT_ISSUE            = 'complete';           // 발급완료
        const DOCUMENT_EXPIRE           = 'expire';             // 만료

        protected $view;                        // 뷰 템플릿
        protected $document;                    // 현재 도큐먼트
        protected $order;                       // 주문데이터
        protected $status;                      // 문서발급 상태목록


        // 데이터 로드
        public function load($document_id)
        {
                $this->status = Code::getByGroupArray('report_state');
                $this->loadDocument($document_id);
                $this->loadDocumentOrder();
                return $this;
        }

        // 문서변경 이벤트
        protected function getStatusCode($name) {
                foreach($this->status as $status) {
                        if($status['name'] == $name) {
                                return $status['id'];
                        }
                }
                return false;
        }


        // getter
        public function getDocument()
        {
                return $this->document;
        }
        public function getOrder()
        {
                return $this->order;
        }






        // 신청, 신규생성시 처리되므로 패스
        // public function triggerOrder() {
        //         $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_ORDER);
        //         $this->document->save();
        // }
        // 예약확인
        public function triggerConfirm($user_id) {
                $this->document->reservation_user_id = $user_id;
                $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_CONFIRM);
                $this->document->confirm_at        = Carbon::now();
                $this->document->save();
        }
        // 진단시작
        public function triggerReview($user_id) {
                $this->document->engineer_id = $user_id;
                $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_REVIEW);
                $this->document->start_at        = Carbon::now();
                $this->document->save();
        }
        // 진단검토완료
        public function triggerReviewed() {
                $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_REVIEW_COMPLETE);
                $this->document->completed_at        = Carbon::now();
                $this->document->save();
        }
        // 문서 발급
        public function triggerIssued($user_id) {
                // $this->document->issuer_id = $user_id;
                $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_ISSUE);
                $this->document->issued_at        = Carbon::now();
                $this->document->save();
        }
        // 문서 만료
        // 만료는 다른 작업없이 자동으로 처리됨, 다른 처리를 해야 할까?
        public function triggerExpired() {
                $this->document->status_cd = $this->getStatusCode(self::DOCUMENT_EXPIRE);
                $this->document->save();
        }









        // abstract for document repository
        public function toArray()
        {
                return [
                        'order' => $this->order->toArray()
                ];
        }

        public function toHtml(){
                return view($this->view, $this->toArray());
        }

        public function toPdf(){
                $pdf = PDF::loadView($this->view, $this->toArray());
                return $pdf->stream($this->getDocumentNumber(), array('Attachment'=>0));
        }



        // implements  App\Contracts\Document
        // 문서의 만료여부
        public function isExpired() {
                return $this->document->isExpired();
        }
        // 문서의 만료일까지 남은 시간
        public function getCountdown()
        {
                return $this->document->getCountdown();
        }
        // 문서의 문서번호
        public function getDocumentNumber()
        {
                return $this->document->getDocumentKey();
        }
        public function getDocumentLink()
        {
                return $this->document->getDocumentLink();
        }
}
