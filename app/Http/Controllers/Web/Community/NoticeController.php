<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;

class NoticeController extends PostController {

    protected $board_id = 1;
    protected $board_namespace = "notice";
    protected $config;
    protected $view_path = 'web.community.default.';

}
