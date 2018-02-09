<?php
namespace App\Models;

use Carbon\Carbon;
use App\Contracts\Document as IDocument;

use App\Models\Code;
use App\Models\CarNumber;
use App\Models\Order;

// 문서생성시 사용하는 주문데이터 모델
final class DocumentOrder
{

        protected $id;
        protected $chakey;
        protected $status;
        protected $orderer;
        protected $car;
        protected $created_at;
        protected $updated_at;
        protected $start_at;// 진단시작일
        protected $completed_at;// 진단완료일
        protected $issued_at;// 발급일
        protected $expired_at;// 만료일

        // protected $data;
        protected $parameters;



        function __construct(IDocument $document, Array $parameters = [])
        {

                $this->id            = $document->id;
                $this->chakey        = $document->chakey;
                $this->status        = $document->status->toDesign();
                $this->orderer       = $this->getOrderer($document->orderItem->order);
                $this->car           = $this->getCar($document->carNumber);
                $this->created_at    = $document->created_at ? $document->created_at->format('Y-m-d H:i:s') : '';
                $this->updated_at    = $document->updated_at ? $document->updated_at->format('Y-m-d H:i:s') : '';
                $this->start_at      = $document->start_at ? $document->start_at->format('Y-m-d H:i:s') : ''; // 진단시작일
                $this->completed_at  = $document->completed_at ? $document->completed_at->format('Y-m-d H:i:s') : ''; // 진단완료일
                $this->issued_at     = $document->issued_at ? $document->issued_at->format('Y-m-d H:i:s') : ''; // 발급일
                $this->expired_at    = $document->expired_at ? $document->expired_at->format('Y-m-d H:i:s') : ''; // 만료일

                $this->parameters    = $parameters;
                return $this;
        }

        public function toArray()
        {
                return array_merge($this->parameters,  [
                        "id"            => $this->id,
                        "chakey"        => $this->chakey,
                        "status"        => $this->status,
                        "orderer"       => $this->orderer,
                        "car"           => $this->car,
                        'created_at'    => $this->created_at,
                        'updated_at'    => $this->updated_at,
                        'start_at'      => $this->start_at,
                        'completed_at'  => $this->completed_at,
                        'issued_at'     => $this->issued_at,
                        'expired_at'    => $this->expired_at,
                ]);
        }


        private function getCar(CarNumber $dcn)
        {
                $dc     = $dcn->car;
                return [
                        "car_number"    => $dcn->car_number,
                        "vin_number"    => $dc->id,
                        "car_model"     => $dc->getFullName(),
                        "brand"         => $dc->brand->name,
                        "detail"        => $dc->detail->name,
                        "grade"         => $dc->grade->name
                ];
        }
        private function getOrderer(Order $o) {
                return [
                        "name"          => $o->orderer_name,
                        "mobile"        => $o->orderer_mobile,
                        "email"         => $o->orderer_email
                ];
        }

}
