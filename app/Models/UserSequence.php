<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSequence extends Model {

    use Notifiable,
        EntrustUserTrait;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_seq',
        'users_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
