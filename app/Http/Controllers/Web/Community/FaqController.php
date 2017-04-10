<?php

namespace App\Http\Controllers\Web\Community;

use App\Models\Post;
use App\Models\Category;
use App\Models\Board;
use App\Http\Controllers\Web\PostController;

class FaqController extends PostController {

    protected $board_id = 2;
    protected $board_namespace = "faq";
    protected $config;
    protected $view_path = 'web.community.faq.';

}
