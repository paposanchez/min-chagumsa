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

    public function get($order_id) {

        // 주문조회
        $order = Order::findOrFail($order_id);

        $decrypt_data = $this->generate($order);

        if ($this->validate($decrypt_data, $order->item->layout)) {
            return $decrypt_data;
        } else {
            return false;
        }
    }

    public function set($encrypt_data, $order_id) {

        $order = Order::findOrFail($order_id);
        $decrypt_data = $this->decryt($encrypt_data);

        if ($this->validate($decrypt_data, $order->item->layout)) {

            // SAVE
            return true;
        } else {
            return false;
        }
    }

    public function encryt($decrypt_data) {
        $return = Encrypter::encryption($decrypt_data);
        return $return;
    }

    public function decryt($encrypt_data) {
        $return = Encrypter::decryption($encrypt_data);
        return $return;
    }

    /**
     * 진단데이터에 대한 데이터 레이아웃을 검증
     * @param type $decrypt_data
     * @return boolean
     */
    private function validate($decrypt_data, $layout) {

        return false;
    }

    /**
     * 주문데이터에 대한 진단데이터 레이아웃 생성
     * @param type $order
     */
    private function generate($order) {

        // 적당한
        return $decrypt_data;
    }

}
