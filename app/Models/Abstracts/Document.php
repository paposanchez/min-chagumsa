<?php
namespace App\Models\Abstracts;

use App\Models\Code;
use Carbon\Carbon;

abstract class Document
{

        protected $document;            // 현재 도큐먼트
        protected $data;                // 생성된 데이터
        protected $chakey_after;
        protected $view;


        public function get(){
                return $this->data;
        }

        public function html(){
                return view($this->view, $this->data);
        }

        public function json()
        {
                return json_encode($this->data);
        }
        public function pdf(){
                $pdf = PDF::loadView($this->view, $this->data);
                return $pdf->stream($this->getChakey(), array('Attachment'=>0));
        }

        public function getChakey()
        {
                return $this->data->chakey . $this->chakey_after;
        }

        // 만료여부
        public function isExpired() {
                return $this->data->status_cd == 116;
        }

        // 만료일까지 남은 시간
        public function countdown()
        {
                return $this->data->expired_at->diffInSeconds(Carbon::now());
        }

        public function code($name_cd)
        {
                try{
                        $code = Code::findOrFail($name_cd);
                        return  $code->toDesign();
                }catch(Exception $e){
                        return 'asdasdasd'.$name_cd;
                }

        }



        public function codeGroup($id)
        {
                try {
                        if($id){
                                $code = Code::findOrFail($id);
                                return Code::getByGroupArray($code->name);
                        }else{
                                return [];
                        }

                }catch(Exception $e) {
                        return [];
                }
        }



        public function order($document)
        {

                $o      = $document->orderItem->order;
                $dcn    = $document->carNumber;
                $dc     = $document->carNumber->car;

                return [
                        "id"            => $document->id,
                        "chakey"        => $document->chakey,
                        "status"        => $document->status->toDesign(),
                        "orderer"       => [
                                "name"          => $o->orderer_name,
                                "mobile"        => $o->orderer_mobile,
                                "email"         => $o->orderer_email
                        ],

                        "car" => [
                                "car_number"    => $dcn->car_number,
                                "vin_number"    => $dc->id,
                                "car_model"     => $dc->getFullName(),
                                "brand"         => $dc->brand->name,
                                "detail"        => $dc->detail->name,
                                "grade"         => $dc->grade->name
                        ],

                        'created_at'            => $document->created_at ? $document->created_at->format('Y-m-d H:i:s') : '',
                        'updated_at'            => $document->updated_at ? $document->updated_at->format('Y-m-d H:i:s') : '',
                        'start_at'              => $document->start_at ? $document->start_at->format('Y-m-d H:i:s') : '', // 진단시작일
                        'completed_at'          => $document->completed_at ? $document->completed_at->format('Y-m-d H:i:s') : '', // 진단완료일
                        'issued_at'             => $document->issued_at ? $document->issued_at->format('Y-m-d H:i:s') : '', // 발급일
                        'expired_at'            => $document->expired_at ? $document->expired_at->format('Y-m-d H:i:s') : '', // 만료일
                ];
        }
}
