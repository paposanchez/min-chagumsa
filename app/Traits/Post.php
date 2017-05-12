<?php

/*
 *
 * @Project        zlara
 * @Copyright      leechanrin
 * @Created        2017-03-23 오전 11:36:54
 * @Filename       Latest.php
 * @Description    최근 게시물
 *
 */

namespace App\Traits;

use Storage;
use Illuminate\Http\Request;

/**
 * Description of Uploader
 *
 * @author leechanrin
 */
trait Post {

    public function latest($board_id, $limit = 5, $skin = '') {

        $where = Post::orderBy('id', 'desc');

        $entrys = $where->paginate($limit);

        Blade::directive('latest');
    }

}
