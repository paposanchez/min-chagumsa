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

use App\Services\Encrypter;
use App\Models\Order;
use App\Models\Item;

class DiagnosisRepository {


    protected $order;
    
    public function prepare($order_id) {
        $this->order = Order::findOrFail($order_id);
        return $this;
    }


    // 주문데이터의 진단정보를 조회
    public function get() {

        // 주문정보
        $return = $this->order();

        // 진단그룹
        $return['details'] = $this->details();

        return $return;
    }


    // 주문데이터의 진단정보를 조회
    public function order() {

        return array(
            'id' => $this->order->id,
            'order_num' => $this->order->getOrderNumber(),
            'car_number' => $this->order->car_number,
            'orderer_name' => $this->order->orderer_name,
            'orderer_mobile' => $this->order->orderer_mobile,
            'status_cd' => $this->order->status_cd,
            'status' => $this->order->status->display(),
            'car_name' => $this->order->getCarFullName(),
            'reservation_at' => $this->order->getReservation($this->order->id)->reservation_at, // 예약일
            'diagnose_at' => $this->order->diagnose_at, // 진단시작일
            'diagnosed_at' => $this->order->diagnosed_at // 진단완료일
        );
    }


    private function details() {
        $return = [];
        $details = $this->order->details;
        foreach ($details as $entry) {

            $new_return = array(
                "id"            => $entry->id,
                "name_cd"       => $entry->name_cd,
                "name"          => $entry->name->display(),
                "orders_id"     => $entry->order_id,
                "total"         => 0,
                "completed"     => 0,
                "entrys"        => $entry->detail($entry)
            );

            // $new_return["total"] = 0;
            // $new_return["completed"] = 0;
            $return[] = $new_return;
        }
        return $return;

    }

    // 진단목록
    private function detail($details) {



    }



    private function detailItem() {

    }





    public function save() {
    }




    
    public function layout() {    
        return $this->order->item->layout;        
    }




//============================================





    /**
     * 진단데이터에 대한 데이터 레이아웃을 검증
     * @param type $decrypt_data
     * @return boolean
     */
    private function validate($decrypt_data, $layout) {
        return false;
    }


    /**
     * 배열로 구성된 검증된 주문진단데이터를 암호화 문자열로 리턴
     * @param array $decrypt_data 상품레이아웃으로 검증된 원형 주문진단데이터
     * @return string 암호화된 검증된 주문진단데이터
     */
    public function encryt($decrypt_data) {
        $return = Encrypter::encryption($decrypt_data);
        return $return;
    }

    /**
     * 암호화된 주문진단데이터를 해독해 배열로 구성된 주문진단데이터로 리턴
     * @param type $encrypt_data 암호화된 주문진단데이터
     * @return array 원형 주문진단데이터
     */
    public function decryt($encrypt_data) {
        $return = Encrypter::decryption($encrypt_data);
        return $return;
    }

}
