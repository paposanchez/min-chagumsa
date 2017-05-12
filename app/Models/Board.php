<?php

namespace App\Models;

use DB;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Board extends Model {

    protected $primaryKey = 'id';
    protected $attributes = array(
        'upload_max_filesize' => 0,
        'upload_max_limit' => 0
    );
    protected $fillable = [
        'name',
        'use_secret',
        'use_captcha',
        'use_comment',
        'use_opinion',
        'use_tag',
        'use_category',
        'use_upload',
        'use_thumbnail',
        'upload_max_filesize',
        'upload_max_limit',
        'status_cd'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function post_count() {
        return $this->hasMany(Post::class)->count();
    }

    public function status() {
        return $this->hasOne('App\Models\Code', 'id', 'status_cd')->where('group', 'yn');
    }

}
