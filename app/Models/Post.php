<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\File;
use App\Models\Comment;
use App\Models\Code;
use App\Models\Board;

/**
 *
 *   @SWG\Definition(
 *         definition="Post",
 *         required={"id"}
 *         @SWG\Property( property="id", type="int64"),
 *         @SWG\Property( property="board", type="int64"),
 *         @SWG\Property( property="user", type="int64"),
 *         @SWG\Property( property="category", type="int64"),
 *         @SWG\Property( property="is_answered", type="int64"),
 *         @SWG\Property( property="is_shown", type="int64"),
 *         @SWG\Property( property="thumbnail", type="int64"),
 *         @SWG\Property( property="subject", type="int64"),
 *         @SWG\Property( property="content", type="int64"),
 *         @SWG\Property( property="name", type="int64"),
 *         @SWG\Property( property="email", type="int64"),
 *         @SWG\Property( property="hit", type="int64"),
 *         @SWG\Property( property="ip", type="int64")
 *     )
 *
 */
class Post extends Model {

    protected $fillable = [
        'board_id',
        'user_id',
        'category_id',
        'is_answered',
        'is_shown',
        'thumbnail',
        'subject',
        'content',
        'name',
        'email',
        'password',
        'hit',
        'ip',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

//    public function tags() {
//        return $this->belongsToMany(Tag::class, 'id', 'user_id');
//    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function files() {
        return $this->hasMany(File::class, 'group_id', 'id')->where("group", 'post');
    }

    public function board() {
//        return $this->hasOne(Board::class, 'id', 'board_id');
        return $this->hasOne(Board::class, 'id', 'category_id');
    }

    public function answered() {
        return $this->hasOne(Code::class, 'id', 'is_answered');
    }

    public function shown() {
        return $this->hasOne(Code::class, 'id', 'is_shown');
    }

}
