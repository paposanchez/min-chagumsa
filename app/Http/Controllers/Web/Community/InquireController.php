<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;

class InquireController extends PostController {

    protected $board_id = 3;
    protected $board_namespace = "inquire";
    protected $config;
    protected $view_path = 'web.community.inquire.';

}
