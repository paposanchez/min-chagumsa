<?php

namespace App\Repositories;

/*
*
* @Project        cargumsa
* @Copyright      leechanrin
* @Created        2017-05-24 오후 5:17:35
* @Filename       CertificateRepository.php
* @Description    Certificate Repository
*
*/
namespace App\Repositories;

use App\Models\DiagnosisFile;
use App\Models\Order;
use App\Models\Code;
use App\Models\Diagnosis;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CertificateRepository {

        protected $cache_extension = 'html';
        protected $order;
        protected $order_id;
        protected $url_prefix;

        public function prepare($order_id)
        {
                $this->order_id = $order_id;
                list($car_number, $order_date) = explode('-',$order_id);

                $order_date = Carbon::createFromFormat('ymd', $order_date);

                $this->order =  Order::whereIn("status_cd",[108, 109])
                ->where('car_number', $car_number)
                ->whereYear('created_at', '=', Carbon::parse($order_date)->format('Y'))
                ->whereMonth('created_at', '=', Carbon::parse($order_date)->format('n'))
                ->whereDay('created_at', '=', Carbon::parse($order_date)->format('j'))
                ->where('open_cd', 1327)
                ->orderBy('id', 'DESC')
                ->first();

                return $this;
        }

        public function prepareWithId($order_id)
        {
                $this->url_prefix = '/certificate';
                $this->order_id = $order_id;
                $this->order =  Order::whereIn("status_cd",[108, 109])->findOrFail($order_id);
                return $this;
        }


        public function cached_path()
        {
                return 'cert/' . $this->order->id ;
        }
        public function cached_file($page, $with_path = false)
        {

                $file = $page . '.' . $this->cache_extension;
                if($with_path)
                {
                        return  $this->cached_path() .'/'. $file;
                }else{
                        return  $file;
                }

        }

        public function cache($page)
        {
                try
                {

                        $html = $this->generate($page);
                        Storage::disk('local')->makeDirectory($this->cached_path(), 0775, true);
                        return Storage::disk('local')->put($this->cached_file($page, true), $html);
                }
                catch (Exception $e)
                {
                        return false;
                }


                return false;
        }


        public function generate($page)
        {

                $order = $this->order;
                $order_id = $this->order_id;
                $url_prefix = $this->url_prefix;

                switch ($page) {

                        case 'performance':
                                $exterior_lefts = Diagnosis::where('orders_id', $this->order->id)->where('group', 2010)->get();
                                $exterior_centers = Diagnosis::where('orders_id', $this->order->id)->where('group', 2011)->get();
                                $exterior_rights = Diagnosis::where('orders_id', $this->order->id)->where('group', 2012)->get();
                                $interior_lefts = Diagnosis::where('orders_id', $this->order->id)->where('group', 2018)->get();
                                $interior_centers = Diagnosis::where('orders_id', $this->order->id)->where('group', 2019)->get();
                                $interior_rights = Diagnosis::where('orders_id', $this->order->id)->where('group', 2020)->get();

                                $diagnosis = $this->order->getDiagnosis();


                                // 주요상태 처리
                                // 상태코드 : 1020
                                // 주요외판 : 2007
                                        // 주요외판상태 : 2009
                                $diagnosis_extra_a = [
                                        1172 => [],
                                        1173 => [],
                                        1174 => [],
                                        1175 => [],
                                        1176 => [],
                                        1328 => []
                                ];
                                // 주요내판 및 골격 : 2014
                                        // 주요내판 및 골격 : 2017
                                $diagnosis_extra_b = [
                                        1172 => [],
                                        1173 => [],
                                        1174 => [],
                                        1175 => [],
                                        1176 => [],
                                        1328 => []
                                ];

                                foreach($diagnosis['entrys'] as $entrys)
                                {

                                        if($entrys['name_cd'] == 2007 || $entrys['name_cd'] == 2014)
                                        {

                                                foreach($entrys['entrys'] as $entry)
                                                {

                                                        if($entry['name_cd'] == 2009 )
                                                        {

                                                                foreach($entry['children'] as $childrens)
                                                                {
                                                                        foreach($childrens['entrys'] as $children)
                                                                        {
                                                                                // $diagnosis_extra_a[$children['selected']][] = $children['name']['display'];
                                                                                $diagnosis_extra_a[$children['selected']][] = [
                                                                                        "id" => $children['name']['id'],
                                                                                        "name"  => $children['name']['display'],
                                                                                        "selected" => $children['selected']
                                                                                ];
                                                                        }
                                                                }

                                                        }

                                                        if($entry['name_cd'] == 2017)
                                                        {

                                                                foreach($entry['children'] as $childrens)
                                                                {
                                                                        foreach($childrens['entrys'] as $children)
                                                                        {
                                                                                $diagnosis_extra_b[$children['selected']][] = [
                                                                                        "id" => $children['name']['id'],
                                                                                        "name"  => $children['name']['display'],
                                                                                        "selected" => $children['selected']
                                                                                ];
                                                                        }

                                                                }

                                                        }


                                                }

                                        }
                                }

                                // dd($diagnosis_extra_a, $diagnosis_extra_b);
                                return view('cert.performance', compact('order', 'order_id', 'url_prefix', 'page' , 'diagnosis', 'diagnosis_extra_a', 'diagnosis_extra_b'))->render();

                                case 'history':
                                    $diagnosis_exterior = Diagnosis::where('orders_id', $order_id)->where('group', 2008)->first();
                                return view('cert.history', compact('order', 'order_id', 'url_prefix', 'page'))->render();

                                case 'price':
                                //특별요인
                                $specials = [];
                                if($this->order->certificates->special_flooded_cd){
                                        $specials[] = '침수차량';
                                }
                                if($this->order->certificates->special_fire_cd){
                                        $specials[] = '화재차량';
                                }
                                if($this->order->certificates->special_fulllose_cd){
                                        $specials[] = '전손차량';
                                }
                                if($this->order->certificates->special_remodel_cd){
                                        $specials[] = '불법개조';
                                }
                                if($this->order->certificates->special_etc_cd){
                                        $specials[] = '기타요인';
                                }
                                $specials = implode(", ", $specials);

                                return view('cert.price', compact('order', 'order_id', 'page', 'url_prefix', 'specials'))->render();

                                default:
                                return view('cert.summary', compact('order', 'order_id','url_prefix',  'page'))->render();
                        }


                }















                // 인증정보 업데이트
                public function update()
                {

                        try {
                                DB::beginTransaction();

                                DB::commit();

                                return true;


                        } catch (Exception $e) {
                                DB::rollBack();

                                return false;

                        }

                }

                // 인증서 발급하기
                public function issue()
                {

                        try {
                                DB::beginTransaction();

                                $this->order->status_cd = 109;
                                $this->order->save();

                                $certificate = $this->order->certificates();
                                $certificate->updated_at = Carbon::now();
                                $certificate->save();

                                DB::commit();

                                return true;


                        } catch (Exception $e) {
                                DB::rollBack();

                                return false;

                        }

                }




        }
