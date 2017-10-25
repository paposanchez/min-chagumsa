<?php
/**
 * Created by PhpStorm.
 * User: muti
 * Date: 2017. 10. 10.
 * Time: PM 5:45
 */

namespace App\Repositories;

use Predis\Client;

class CertiRedisRepository extends CertificateRepository
{
    protected $redis, $expire, $cache_id, $expire_at=false;

    /**
     * CertiRedisRepository constructor.
     * @param $cache_id string 캐쉬 아이디
     * @param int $expire 만료 시간초
     */

    public function __construct($cache_id, $expire=86400)
    {
        $this->cache_id = $cache_id;

        $redis_host = env('REDIS_HOST', '127.0.0.1');

        $this->redis = new Client([
            'host' => $redis_host
        ]);
        $this->expire = $expire;
    }

    /**
     * 일자 기준 만료시 선언하는 메소드
     * @param $date string 만료 주기
     */
    public function setExpireTime($date){
        $this->expire_at = $date;
    }

    /**
     * 주문정보 조회
     * @param $order_id
     * @return $this
     */
    public function prepare($order_id)
    {

        return parent::prepare($order_id);
    }


    /**
     * 설정된 캐쉬 또는 데이터 조회 메소드
     * @param $page string
     * @return string HTML
     */
    public function getCacheHtml($page){

        if(!$this->redis->get($this->cache_id)){

            $generate = $this->generate($page);

            $this->redis->set($this->cache_id, $generate);

            try{
                if(!$this->expire_at){ // 일자 기준 만료기간이 설정되지 않았다면,
                    if($this->expire !== false){
                        $this->redis->expire($this->cache_id, $this->expire);
                        $this->redis->ttl($this->cache_id);
                    }
                    // expire 값이 없거나 0일경우에는 만료되지 않음.

                }else{ //캐시 만료가 일자 기준으로 설정되었다면

                    $this->redis->expireat($this->cache_id, $this->expire_at);
                    $this->redis->ttl($this->cache_id);
                }
            }catch (\Exception $e){
                // expire_at 이 에러 발생시 expire을 기준으로 만료함
                if($this->expire !== false){
                    $this->redis->expire($this->cache_id, $this->expire);
                    $this->redis->ttl($this->cache_id);
                }
            }





        }else{

            $generate = $this->redis->get($this->cache_id);

        }

        return $generate;
    }

    /**
     * 캐시 삭제 메소드
     * @return bool
     */
    public function deleteCache(){

        try{
            $this->redis->del($this->cache_id);
            return true;
        }catch ( \Exception $e){
            return false;
        }

    }
}