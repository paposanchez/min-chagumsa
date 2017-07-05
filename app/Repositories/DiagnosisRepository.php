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





use App\Models\DiagnosisDetails;
use App\Models\DiagnosisDetail;
use App\Models\DiagnosisDetailItem;
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

        // 진단완료 이상이면 진단데이터 조회 아니면 레이아웃만 조회
        if($return['status'] == 107) {

            foreach($return['entrys'] as &$details) {

                foreach($details as &$detail) {
                
                    // 레이아웃으로 인해 들어간 entrys를 덮어버린다
                    $detail['entrys'] = $this->getDiagnosesArray($detail['name_cd']);
                    $detail['children']['entrys'] = $this->getDiagnosesArray($detail['children']['name_cd']);

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
                'files'         => $this->getDetailFile($entry->diagnosis_file)
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
                $return[] = $diagnosis;
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



    // 진단데이터 최초 생성 
    public function save($order_id, $save_data) {

        $json_save_data = json_decode($save_data, true);


        if($json_save_data) {

            // 주문데이터를 기준으로 가져간 형태로 보내진다
            // 따라서 loop의 depth에 유의하며 각 저장을 처리한다
            // 실제저장할 데이터를 모두 detail_item과 detail_file이다

//            DB::beginTransaction();


            try{

                foreach($json_save_data as $details) {

                    $inserted_item = Diagnosis::create([
                        'orders_id' => $item['orders_id'],
                        'group'     => $item['group'],
                        'use_image' => $item['use_image'],
                        'use_voice' => $item['use_voice'],
                        'options_cd' => $item['options_cd'],
                        'name_cd' => 0,
                        'description' => $item['description']
                    ]);

                    $inserted_item->save();

                


                    // $inserted_details = DiagnosisDetails::create([
                    //     'name_cd' => $details['name_cd'],
                    //     'orders_id' => $order_id
                    // ]);
                    // $inserted_details->save();


                    // foreach($details['entrys'] as $detail) {
                    //     $inserted_detail = DiagnosisDetail::create([
                    //         'name_cd' => $detail['name_cd'],
                    //         'diagnosis_details_id' => $inserted_details->id,
                    //         'description' => $detail['description']
                    //     ]);
                    //     $inserted_detail->save();

                    //     foreach($detail['entrys'] as $item) {
                    //         if($item['options_cd'] != null){
                    //             $inserted_item = DiagnosisDetailItem::create([
                    //                 'diagnosis_detail_id' => $inserted_detail->id,
                    //                 'use_image' => $item['use_image'],
                    //                 'use_voice' => $item['use_voice'],
                    //                 'options_cd' => $item['options_cd'],
                    //                 'name_cd' => 0,
                    //                 'description' => $item['description']
                    //             ]);
                    //         }else{
                    //             $inserted_item = DiagnosisDetailItem::create([
                    //                 'diagnosis_detail_id' => $inserted_detail->id,
                    //                 'use_image' => $item['use_image'],
                    //                 'use_voice' => $item['use_voice'],
                    //                 'name_cd' => 0,
                    //                 'description' => $item['description']
                    //             ]);
                    //         }


                    //         $inserted_item->save();

                    //     }

                    //     if($detail['children']) {

                    //         foreach($detail['children'] as $children_detail) {
                    //             $inserted_children_detail = DiagnosisDetail::create([
                    //                 'parent_id' => $inserted_detail->id,
                    //                 'name_cd' => $children_detail['name_cd'],
                    //                 'diagnosis_details_id' => $inserted_details->id,
                    //                 'description' => $children_detail['description']
                    //             ]);
                    //             $inserted_children_detail->save();


                    //             foreach($children_detail['entrys'] as $children_item) {
                    //                 $inserted_children_item = DiagnosisDetailItem::create([
                    //                     'diagnosis_detail_id' => $inserted_detail->id,
                    //                     'use_image' => $children_item['use_image'],
                    //                     'use_voice' => $children_item['use_voice'],
                    //                     'options_cd' => $children_item['options_cd'],
                    //                     'description' => $children_item['description']
                    //                 ]);
                    //                 $inserted_children_item->save();

                    //             }

                    //         }

                    //     }

                    // }

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


    //=============================================== 제거할 func

    public function getDetailFile($files) {
        $return = [];

        if($files) {
            foreach ($files as $entry) {
                $new_return = array(
                    'id'    => $entry->id,
                    'diagnosis_detail_items_id'   => $entry->diagnosis_detail_items_id,
                    'original'   => $entry->original,
                    'source'   => $entry->source,
                    'path'   => $entry->path,
                    'mime'   => $entry->mime,
                    'created_at'   => $entry->created_at->format("Y-m-d H:i:s"),
                    'updated_at'   => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                );

                $return[] = $new_return;
            }
        }

        return $return;
    }




    private function details() {
        $return = [];
        $details = $this->obj->diagnosis_details;

        foreach ($details as $entry) {
            $new_return = array(
                "id"            => $entry->id,
                "name"          => $entry->name->getName(),
                "orders_id"     => $entry->orders_id,
                "completed"     => 0,
                "entrys"        => $this->getDetail($entry->diagnosis_detail_children)
            );

            $return[] = $new_return;
        }
        return $return;

    }



    // 진단목록
    public function getDetail($detail) {

        $return = [];

        if($detail) {
            foreach ($detail as $entry) {
                $new_return = array(
                    "id"            => $entry->id,
                    "name"          => $entry->name->getName(),
                    "details_id"    => $entry->diagnosis_details_id,
                    "description"   => $entry->description,
                    "entrys"        => $this->getDetailItem($entry->diagnosis_item),
                    "children"      => $this->getDetail($entry->children),
                );

                $return[] = $new_return;
            }
        }
        return $return;
    }


    private function getDetailItem($items) {
        $return = [];

        if($items) {
            foreach ($items as $entry) {
                $new_return = array(
                    "id"                    => $entry->id,
                    'diagnosis_detail_id'   => $entry->diagnosis_detail_id,
                    'use_image'   => $entry->use_image,
                    'use_voice'   => $entry->use_voice,
                    'options_cd'   => $entry->options_cd,
                    'options'   => $entry->getOptions($entry->options_cd),
                    'selected'   => $entry->selected,
                    'required_image_options'   => $entry->required_image_options,
                    'description'   => $entry->description,
                    'created_at'   => $entry->created_at->format("Y-m-d H:i:s"),
                    'updated_at'   => ($entry->updated_at ? $entry->updated_at->format("Y-m-d H:i:s") : ''),
                    'files' => $this->getDetailFile($entry->diagnosis_file)
                );

                $return[] = $new_return;
            }
        }

        return $return;
    }


}
