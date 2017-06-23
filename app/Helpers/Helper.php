<?php

namespace App\Helpers;

use App\Models\Code;
use App\Models\Models;
use Mockery\Exception;

class Helper {

    public static function assets($path, $secure = null) {
        return app('url')->asset("assets/" . $path, $secure);
    }

    public static function assets_upload($path) {
        return '/upload/' . $path;
    }

    public static function theme_web($path) {
        return app('url')->asset("assets/themes/v1/web" . $path);
    }

    public static function theme_mobile($path) {
        return app('url')->asset("assets/themes/v1/mobile" . $path);
    }

    /**
     * 역할 이름을 문자열로 리턴한다
     * @param type $roles
     * @return type
     */
    public static function roles($roles) {
        $return = [];

        foreach ($roles as $role) {
            $return[] = $role->display_name;
        }

        return implode(",", $return);
    }

    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
    public static function formatBytes($size, $precision = 2) {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {

            return $size;
        }
    }

    /**
     * 게시판 rowCount처리 메소드
     * @param int $total
     * @param int $page
     * @param int $limit
     * @return integer
     */
    public static function getStartNum($rows){
        $total = $rows->total();
        $page = $rows->currentPage();
        $limit = $rows->perPage();
        return $total - (($page -1) * $limit);
    }

    /**
     * 등록일 처리 helper
     * @param string $create
     * @param string $update
     * @param string $format
     * @return string
     */
    public static function getDbDate($create, $update='', $format='Y-m-d'){

        if($update){
            $ctime = strtotime($create);
            $utime = strtotime($update);
            if($ctime > $utime){
                $db_time = date($format, $ctime);
            }else{
                $db_time = date($format, $utime);
            }
        }else{
            $db_time = date($format, strtotime($create));
        }

        return $db_time;
    }

    //'R', 'L', 'I', 'M', 'P', 'O', 'F', 'G'
    public static function faqSelect($code, $faq_div){
        if($faq_div == $code){
            return 'select';
        }else{
            return '';
        }
    }

    /**
     * 차량의 제조사/모델/세부모델/등급을 출력 메소드
     * @param $car
     * @return string
     */
    public static function getCarModel($car){

        try{
            $car_txt = $car->brand->name . ' / ' ;
        }catch (\Exception $e){
            $car_txt = '';
        }

        try {
            if ($car->models->name == $car->detail->name) {
                $car_txt .= $car->models->name ;
            } else {
                $car_txt .= $car->models->name . " / " . $car->detail->name;
            }
        }catch (\Exception $e){
            try{
                $car_txt .= $car->models->name;
            }catch (\Exception $e){
//                dd('aaa');
//                $car_txt .= "[".$e->getMessage()."]";
            }
        }



        if($car->grade){
            $car_txt .= " / " .$car->grade->name;
        }
        return $car_txt;


    }

    /**
     * 개월수를 구하는 메소드
     * @param $date yyyy-mm-dd
     * @return integer
     */
    public static function getMonthNum($date){
        $nowY = date("y");
        $nowM = date("m");

        $postY = date("y", strtotime($date));
        $postM = date("m", strtotime($date));

        $dist = ($nowY-$postY)*12 + ($nowM-$postM);

        return $dist;
    }

    /**
     * 용도변경이력 소유자이력 차고지 이력 등 리스트 출력
     * @param $garage
     * @param string $div
     * @return array|bool
     */
    public static function displayHistoryItem($garage, $div=';'){

        if($garage){
            return explode($div, $garage);
        }else{
            return false;
        }
    }

    /**
     * code 값을 기준으로 checkbox checked 여부 판단
     * @param Models $standard
     * @param string $key
     * @param string $value
     * @param bool $default
     * @param string checked|selected
     * @return string
     */
    public static function displayChecked($standard, $key, $value='', $default=false, $option='checked'){

        if($default === true){
            return ' '.$option;
        }else{
            if($standard !== null){
                if($value){
                    $code = Code::orderBy('id', 'desc')->where('group', $key)->where('name', $value)->first();
                }else{
                    $code = Code::orderBy('id', 'desc')->where('group', $key)->first();
                }

                if($standard->$key == $code->id){
                    return ' '.$option;
                }
            }
        }
        return '';
    }

    /**
     * codes ID를 리턴하는 메소드
     * @param $group
     * @param $name
     * @return int|null
     */
    public static function getCodeValue($group, $name){

        $code = Code::orderBy('id', 'desc')->where('group', $group)->where('name', $name)->first();
        if($code){
            return $code->id;
        }else{
            return null;
        }
    }

    public static function getCodeSelectArray($code_group, $group_name, $default=''){

        if($default){
            $select_list = ['' => $default];
        }else{
            $select_list = [];
        }

        foreach ($code_group as $id => $name){
            $select_list[$id] = trans('code.'. $group_name .'.' . $name);
        }
        return $select_list;
    }
}
