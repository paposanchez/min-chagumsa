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

    /**
     * 진단데이터에 대한 데이터 레이아웃을 검증
     * @param type $decrypt_data
     * @return boolean
     */
    private function validate($decrypt_data, $layout) {
        return false;
    }

    /**
     * 주문객체를 통해 원형주문데이터 구성
     * @param Order $order 주문
     * @return 원형주문데이터
     */
    private function generate(Order $order) {

        // 진단데이터 레이아웃
        $layout = $this->parse_layout($order->item->layout);

        $order_info = $order->toArray();

        $diagnosis = [];

        $diagnosis_group = $order->diagnosis();

        foreach ($diagnosis_group as $diagnosis) {
            
        }

        return $decrypt_data;
    }

    /**
     * 상품테이블의 문자열 레이아웃을 레이아웃 오브젝트로 변경 리턴
     * @param type $layout_string
     * @return array
     */
    private function parse_layout($layout_string) {

        $layout = json_decode(json_encode($layout_string), true);

        return $layout;
    }

}
