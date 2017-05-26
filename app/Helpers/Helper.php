<?php

namespace App\Helpers;

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

}
