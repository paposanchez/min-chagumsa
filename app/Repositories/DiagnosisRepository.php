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
use Carbon\Carbon;


use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Models\Code;
use DB;

class DiagnosisRepository {

    protected $obj;


    public function prepare($order_id) {
        $this->obj = Order::findOrFail($order_id);
        $this->diagnoses = $this->obj->diagnoses;
        return $this;
    }

    // 주문데이터의 진단정보를 조회
    public function get() {

        $return = $this->order();
        
        // 레이아웃 적용
        $return['entrys'] = json_decode($this->obj->item->layout, true);

        foreach($return['entrys'] as &$details) {

            $details['name'] = $this->getName($details['name_cd']);

            foreach($details['entrys'] as &$detail) {

                $detail['name'] = $this->getName($detail['name_cd']);
        
                // 진단완료 이상이면 진단데이터 조회 아니면 레이아웃만 조회
                if($return['status'] == 107) {
                    // 레이아웃으로 인해 들어간 entrys를 덮어버린다
                    $detail['entrys'] = $this->getDiagnosesArray($detail['name_cd']);
                }
            
                foreach($detail['children'] as &$children) {
                    
                    $children['name'] = $this->getName($children['name_cd']);

                    // 진단완료 이상이면 진단데이터 조회 아니면 레이아웃만 조회
                    if($return['status'] == 107) {
                        // 레이아웃으로 인해 들어간 entrys를 덮어버린다
                        $children['entrys'] = $this->getDiagnosesArray($children['name_cd']);
                    }

                }

            }

        }
        
        return $return;
    }

    // 주문데이터의 진단정보를 조회
    public function order() {

        $reservation_date = $this->obj->getReservation($this->obj->id)->reservation_at;

        return array(
            'id' => $this->obj->id,
            'engineer_id' => $this->obj->engineer_id,
            'diagnosis_process' => $this->getDiagnosisProcess($reservation_date),
            'order_num' => $this->obj->getOrderNumber(),
            'car_number' => $this->obj->car_number,
            'orderer_name' => $this->obj->orderer_name,
            'orderer_mobile' => $this->obj->orderer_mobile,
            'status_cd' => $this->obj->status_cd,
            'status' => $this->obj->status->display(),
            'car_name' => $this->obj->getCarFullName(),
            'reservation_at' => $reservation_date, // 예약일
            'diagnose_at' => $this->obj->diagnose_at, // 진단시작일
            'diagnosed_at' => $this->obj->diagnosed_at // 진단완료일
        );
    }


    private function diagnosis() {
        $return = [];
        $entrys = $this->obj->diagnosis;

        foreach ($entrys as $entry) {
            $new_return = array(
                "id"            => $entry->id,
                'orders_id'     => $entry->orders_id,
                'group'         => $entry->group,
                'use_image'     => $entry->use_image,
                'use_voice'     => $entry->use_voice,
                'options_cd'    => $entry->options_cd,
                'options'       => $entry->getOptions($entry->options_cd),
                'selected'      => $entry->selected,
                'except_options'=> $entry->except_options,
                'description'   => $entry->description,
                'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                'files'         => $this->files($entry->files)
            );

            $return[] = $new_return;
        }
        return $return;
    }

    private function files($files) {
        $return = [];

        if($files) {
            foreach ($files as $entry) {
                $new_return = array(
                    'id'            => $entry->id,
                    'diagnoses_id'  => $entry->diagnoses_id,
                    'original'      => $entry->original,
                    'source'        => $entry->source,
                    'path'          => $entry->path,
                    'mime'          => $entry->mime,
                    'created_at'    => $entry->created_at->format("Y-m-d H:i:s"),
                    'updated_at'    => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                );

                $return[] = $new_return;
            }
        }

        return $return;
    }


    // 진단내역중 $group(name_cd) 에 따른 항목을 만들어 온
    private function getDiagnosesArray($group) {
        
        $return = [];
        foreach($this->diagnoses as $diagnosis) {

            if($group == $diagnosis->group) {

                $d = $diagnosis;

                if(empty($d->options_cd) === false) {
                     $d['options'] = Code::getByGroupArray($d->options_cd);
                }

                $return[] = $d;
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

        if($this->obj->status_cd >= 107) {
            return 'V';
        }elseif(in_array($this->obj->status_cd, [106])) {
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
        return [];
    }



    // 진단데이터 최초 생성 
    public function save($order_id, $save_data) {

        $json_save_data = json_decode($save_data, true);


        if($json_save_data) {

            // 주문데이터를 기준으로 가져간 형태로 보내진다
            // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
            // 실제저장할 데이터를 모두 detail_item과 detail_file이다

            DB::beginTransaction();

            try{

                foreach($json_save_data as $details) {

                    $inserted_item = Diagnosis::create([
                        'orders_id' => $item['orders_id'],
                        'group'     => $item['group'],
                        'use_image' => $item['use_image'],
                        'use_voice' => $item['use_voice'],
                        'options_cd' => $item['options_cd'],
                        'description' => $item['description']
                    ]);

                    $inserted_item->save();
                }

                DB::commit();
                return true;

            }catch(Exception $e) {

                DB::rollBack();
                return false;

            }

        }


        return false;
    }

    // 진단데이터 수정
    public function update($save_data) {

        $json_save_data = json_decode($save_data, true);


        if($json_save_data) {

            // 주문데이터를 기준으로 가져간 형태로 보내진다
            // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
            // 실제저장할 데이터를 모두 detail_item과 detail_file이다

            DB::beginTransaction();


            try{

                foreach($detail['entrys'] as $item) {

                    // DB::table('diagnosis_detail_items')->where("id", $item['id'])->update(['votes' => 1]);

                    foreach($item['files'] as $file) {

                        // DB::table('diagnosis_files')->update(['votes' => 1]);

                    }

                }

                DB::commit();
                return true;

            }catch(Exception $e) {

                DB::rollBack();
                return false;

            }

        }


        return false;
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
