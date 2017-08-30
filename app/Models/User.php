<?php

namespace App\Models;

use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\ConfirmEmail as ConfirmEmailNotification;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Code;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Storage;
use App\Models\UserExtra;


class User extends Authenticatable {

    use Notifiable,
        EntrustUserTrait;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'name',
        'mobile',
        'status_cd',
        'profile',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function status() {
        return $this->hasOne(Code::class, 'id', 'status_cd')->where('group', 'user_status');
    }

    public function user_extra() {
        return $this->hasOne(UserExtra::class, 'users_id', 'id');
    }

    public function role_user() {
        return $this->hasOne(RoleUser::class, 'user_id', 'id');
    }

    public function garageInfo(){
        return $this->hasOne(GarageInfo::class, 'garage_id', 'id');
    }



    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @param  string  $confirmation_code
     * @return void
     */
    public function sendConfirmEmailNotification($confirmation_code) {
        $this->notify(new ConfirmEmailNotification($confirmation_code));
    }

    /**
     * Get user files directory
     *
     * @return string|null
     */
    public function getFilesDirectory() {

        $folderPath = 'users/' . $this->id;

        if (!in_array($folderPath, Storage::directories())) {
            Storage::makeDirectory($folderPath);
        }

        return storage_path('app/' . $folderPath);
    }

    public function order(){
        return $this->belongsTo(Order::class, "id");
    }

    public static function getArrayByName() {
        $return = User::orderBy('name')->pluck('name', 'id');

        return $return->toArray();
    }

    public function restore()
    {
        return false;
    }

    public function files() {
        return $this->hasMany(File::class, 'group_id', 'id')->where("group", 'bcs');
    }

//    public function getFilesDirectory() {
//        $folderPath = 'user/' . $this->id;
//        if (!in_array($folderPath, Storage::disk('files')->directories())) {
//            Storage::disk('files')->makeDirectory($folderPath);
//        }
//        return $folderPath;
//    }
}
