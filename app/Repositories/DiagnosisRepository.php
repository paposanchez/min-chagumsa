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
use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Models\Code;

use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Cache;

class DiagnosisRepository {

        protected $obj;


        public function prepare($order_id) {
                $this->order = Order::findOrFail($order_id);
                $this->diagnoses = $this->order->diagnoses;
                return $this;
        }

        // 주문데이터의 진단정보를 조회
        public function get() {

                return Cache::remember('diagnosis.order.' . md5($this->order->id), 60, function () {

                        $return = $this->getOrder();
                        // 레이아웃 적용
                        $return['entrys'] = json_decode($this->order->item->layout, true);

                        foreach($return['entrys'] as &$details) {

                                // 이름코드 데이터
                                $details['name'] = $this->getName($details['name_cd']);

                                foreach($details['entrys'] as &$detail) {

                                        // 이름코드 데이터
                                        $detail['name'] = $this->getName($detail['name_cd']);

                                        // 레이아웃에 덮을 데이터가 있을지 말지 판단
                                        $detail['entrys'] = $this->getDiagnoses($detail['name_cd']);

                                        foreach($detail['children'] as &$children) {

                                                $children['name'] = $this->getName($children['name_cd']);
                                                $children['entrys'] = $this->getDiagnoses($children['name_cd']);

                                        }

                                }

                        }

                        return $return;

                });

        }

        // 주문데이터 완성
        public function getOrder() {

                $reservation_date = $this->order->reservation->reservation_at;
                return array(
                        'id'                => $this->order->id,
                        'engineer_id'       => $this->order->engineer_id,
                        'diagnosis_process' => $this->getDiagnosisProcess($reservation_date),
                        'order_num'         => $this->order->getOrderNumber(),
                        'car_number'        => $this->order->car_number,
                        'orderer_name'      => $this->order->orderer_name,
                        'orderer_mobile'    => $this->order->orderer_mobile,
                        'status_cd'         => $this->order->status_cd,
                        'status'            => $this->order->status->display(),
                        'car_name'          => $this->order->getCarFullName(),
                        'reservation_at'    => $reservation_date->format("Y-m-d H:i:s"), // 예약일
                        'reservation_time'  => $reservation_date->format("H:i"), // 예약시간
                        'diagnose_at'       => ($this->order->diagnose_at ? $this->order->diagnose_at->format("Y-m-d H:i:s") : ''),
                        'diagnosed_at'      => ($this->order->diagnosed_at ? $this->order->diagnosed_at->format("Y-m-d H:i:s") : ''),
                );
        }


        // 진단내역중 $group(name_cd) 에 따른 항목을 만들어 온
        private function getDiagnoses($group) {

                $return = [];
                foreach($this->diagnoses as $diagnosis) {

                        if($group == $diagnosis->group) {
                                $return[] = $this->diagnosis($diagnosis);
                        }

                }

                return $return;

        }

        // 진단데이터 완성형
        private function diagnosis($entry) {
                return array(
                        "id"            => ($entry->id ? $entry->id : null),
                        'orders_id'     => $entry->orders_id,
                        'name'          => ($entry->name_cd ? $this->getName($entry->name_cd) : ''),
                        'group'         => $entry->group,
                        'use_image'     => $entry->use_image,
                        'use_voice'     => $entry->use_voice,
                        'options_cd'    => $entry->options_cd,
                        'options'       => $entry->getOptions($entry->options_cd),
                        'selected'      => $entry->selected,
                        'except_options'=> explode(",", $entry->except_options),
                        'description'   => $entry->description,
                        'comment'   => $entry->comment,
                        'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                        'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                        'files'         => $this->files($entry->files)
                );

        }

        private function files($files) {
                $return = [];
                if($files) {
                        foreach ($files as $entry) {
                                $return[] = array(
                                        'id'            => $entry->id,
                                        'diagnoses_id'  => $entry->diagnoses_id,
                                        'original'      => $entry->original,
                                        'source'        => $entry->source,
                                        'path'          => $entry->path,
                                        'mime'          => $entry->mime,
                                        'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                                        'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                                );
                        }
                }

                return $return;
        }


        // 앱내에서 진단시작과 관련한 상태코
        // 상세보기 가능
        //     완료후의 모든 주문 V
        // 수정
        //     진행중의 내꺼만 M
        // 시작가능
        //     예약일자이면서 누구의것도 아닌것 Y
        // 기타
        //     그외 X
        private function getDiagnosisProcess($reservation_date) {

                if($this->order->status_cd >= 107) {
                        return 'V';
                }elseif(in_array($this->order->status_cd, [106])) {
                        // 내꺼 여부를 판단한 수 없음, 앱에서 해야
                        return 'M';
                }else {

                        // 시작가능한것들중 오늘것과 아닌것
                        $dt = Carbon::parse($reservation_date);
                        if($dt->isToday()) {
                                return 'Y';
                        }else{
                                return 'X';
                        }

                }

        }

        public function getName($name_cd) {
                $code = Code::where("id", $name_cd)->first();
                if($code) {
                        return  Code::getArray($code);
                }
                return '';
        }



        // 레이아웃 json으로 부터 신규 진단데이터 생성
        public function create() {

                $json_save_data =  json_decode($this->order->item->layout, true);

                if($this->validate($json_save_data)) {

                        DB::beginTransaction();

                        try{

                                //@TODO 진단데이터가 존제하는지 체크되어야함
                                // 기존에 등록된 진단데이터가 있는 경우 모두 삭제되어야 하므로 꼭 확인필요
                                DB::table('diagnoses')->where('orders_id', '=', $this->order->id)->delete();



                                // 주문데이터를 기준으로 가져간 형태로 보내진다
                                // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
                                // 실제저장할 데이터를 모두 detail_item과 detail_file이다
                                foreach($json_save_data as $details) {

                                        foreach($details['entrys'] as $detail) {

                                                foreach($detail['entrys'] as $item) {

                                                        $inserted_item = Diagnosis::create([
                                                                'orders_id'     => $this->order->id,
                                                                'group'         => $detail['name_cd'],
                                                                'name_cd'       => ($item['name_cd'] ? $item['name_cd'] : NULL),
                                                                'use_image'     => $item['use_image'],
                                                                'use_voice'     => $item['use_voice'],
                                                                'options_cd'    => $item['options_cd'],
                                                                'selected'       => NULL,
                                                                'except_options'=> is_array($item['except_options']) ?  implode(",",$item['except_options']) : "",
                                                                'description'   => $item['description']
                                                        ]);
                                                        $inserted_item->save();
                                                }


                                                foreach($detail['children'] as $children) {

                                                        foreach($children['entrys'] as $item) {

                                                                $inserted_item = Diagnosis::create([
                                                                        'orders_id'     => $this->order->id,
                                                                        'group'         => $children['name_cd'],
                                                                        'name_cd'       => ($item['name_cd'] ? $item['name_cd'] : NULL),
                                                                        'use_image'     => $item['use_image'],
                                                                        'use_voice'     => $item['use_voice'],
                                                                        'options_cd'    => $item['options_cd'],
                                                                        'selected'       => NULL,
                                                                        'except_options'=> is_array($item['except_options']) ?  implode(",",$item['except_options']) : "",
                                                                        'description'   => $item['description']
                                                                ]);
                                                                $inserted_item->save();
                                                        }

                                                }

                                        }

                                }

                                return DB::commit();

                        }catch(Exception $e) {

                                DB::rollBack();
                                return false;

                        }

                }


                return false;
        }

        // 진단데이터 수정
        public function update($save_data) {

                //        $json_save_data = json_decode($save_data, true);
                $json_save_data = $save_data;

                if($this->validate($json_save_data)) {

                        // 주문데이터를 기준으로 가져간 형태로 보내진다
                        // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
                        // 실제저장할 데이터를 모두 detail_item과 detail_file이다

                        DB::beginTransaction();

                        try{

                                foreach($json_save_data as $item) {
                                        $diagnosis =  Diagnosis::find($item['id']);
                                        $diagnosis->selected = $item['selected'];
                                        $diagnosis->save();
                                }

                                return DB::commit();

                        }catch(Exception $e) {

                                DB::rollBack();
                                return false;

                        }

                }

                return false;
        }

        /**
        * 진단데이터에 대한 데이터 레이아웃을 검증
        * @param type $decrypt_data
        * @return boolean
        */
        private function validate($decrypt_data) {
                return true;
        }



        public function layout() {
                return $this->order->item->layout;
        }

        //============================================


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
