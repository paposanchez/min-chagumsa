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

        public function prepare($order_id)
        {
                list($car_number, $order_date) = explode('-',$order_id);

                $order_date = Carbon::createFromFormat('ymd', $order_date);

                $this->order =  Order::whereIn("status_cd",[108, 109])
                ->where('car_number', $car_number)
                ->whereDate('created_at', '=', Carbon::parse($order_date)->format('Y-m-d'))
                ->where('open_cd', 1327)
                ->orderBy('id', 'DESC')
                ->first();

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

                $order = $this->order;
                $order_id = $this->order->getOrderNumber();

                switch ($page) {

                        case 'performance':
                                $exterior_lefts = Diagnosis::where('orders_id', $this->order->id)->where('group', 2010)->get();
                                $exterior_centers = Diagnosis::where('orders_id', $this->order->id)->where('group', 2011)->get();
                                $exterior_rights = Diagnosis::where('orders_id', $this->order->id)->where('group', 2012)->get();
                                $interior_lefts = Diagnosis::where('orders_id', $this->order->id)->where('group', 2018)->get();
                                $interior_centers = Diagnosis::where('orders_id', $this->order->id)->where('group', 2019)->get();
                                $interior_rights = Diagnosis::where('orders_id', $this->order->id)->where('group', 2020)->get();
                                $html = view('cert.performance', compact('order', 'order_id', 'page'))->render();
                                break;
                                case 'history':
                                $html = view('cert.history', compact('order', 'order_id', 'page'))->render();
                                break;
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

                                $html = view('cert.price', compact('order', 'order_id', 'page', 'specials'))->render();
                                break;

                                default:
                                $html = view('cert.summary', compact('order', 'order_id', 'page'))->render();
                                break;
                        }


                        try
                        {

                                Storage::disk('local')->makeDirectory($this->cached_path(), 0775, true);
                                return Storage::disk('local')->put($this->cached_file($page, true), $html);
                        }
                        catch (Exception $e)
                        {
                                return false;
                        }


                        return false;
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
