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


class DiagnosisRepository {


    protected $obj;
    protected $return;


    public function prepare($order_id) {
        $this->obj = Order::findOrFail($order_id);
        return $this;
    }


    // 주문데이터의 진단정보를 조회
    public function get() {

        // 주문정보
        $return = $this->order();

        // 진단그룹
        $return['entrys'] = $this->details();

        return $return;
    }


    // 주문데이터의 진단정보를 조회
    public function order() {

        $this->return = array(
            'id' => $this->obj->id,
            'engineer_id' => $this->obj->engineer_id,
            'diagnosis_process' => $this->obj->diagnosis_status(),
            'order_num' => $this->obj->getOrderNumber(),
            'car_number' => $this->obj->car_number,
            'orderer_name' => $this->obj->orderer_name,
            'orderer_mobile' => $this->obj->orderer_mobile,
            'status_cd' => $this->obj->status_cd,
            'status' => $this->obj->status->display(),
            'car_name' => $this->obj->getCarFullName(),
            'reservation_at' => $this->obj->getReservation($this->obj->id)->reservation_at, // 예약일
            'diagnose_at' => $this->obj->diagnose_at, // 진단시작일
            'diagnosed_at' => $this->obj->diagnosed_at // 진단완료일
        );


        return $this->return;
    }


    private function details() {
        $return = [];
        $details = $this->obj->details;

        foreach ($details as $entry) {
//            dd($entry->);
            $new_return = array(
                "id"            => $entry->id,
                "name_cd"       => $entry->name_cd,
                "name"          => $entry->name->display(),
                "orders_id"     => $entry->orders_id,
                "completed"     => 0,
                "entrys"        => $this->getDetail($entry->detail)
//                "entrys"        => [] //$entry->detail()
            );

            // $new_return["total"] = 0;
            // $new_return["completed"] = 0;
            $return[] = $new_return;
        }
        return $return;

    }

    // 진단목록
    public function getDetail($detail) {

        $return = [];
        foreach ($detail as $entry) {
            $new_return = array(
                "id"            => $entry->id,
                "name_cd"       => $entry->name_cd,
                "name"          => $entry->name->display(),
                "details_id"    => $entry->diagnosis_details_id,
                "description"   => $entry->description,
                "entrys"        => [] //$this->getDetailItem($entry->diagnosis_file)
            );

            $return[] = $new_return;
        }
        return $return;
    }



    private function getDetailItem($files) {
        $return = [];

        foreach ($files as $entry) {
            $new_return = array(
                "id"            => $entry->id,
                "name_cd"       => $entry->name_cd,
                "name"          => $entry->name->display(),
                "orders_id"     => $entry->order_id,
                "completed"     => 0,
            );

            // $new_return["total"] = 0;
            // $new_return["completed"] = 0;
            $return[] = $new_return;
        }
        return $return;
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
