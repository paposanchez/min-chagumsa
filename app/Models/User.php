<?php

namespace App\Models;

use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\ConfirmEmail as ConfirmEmailNotification;
use App\Models\Role;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Storage;
use App\Models\UserExtra;

use Illuminate\Support\Facades\Mail;

class User extends Authenticatable {

    use Notifiable,
        EntrustUserTrait;

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
    protected $dates = ['created_at', 'updated_at'];

    public function status() {
        return $this->hasOne('App\Models\Code', 'id', 'status_cd')->where('group', 'user_status');
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

    /**
     *
     */
    public function userExtras(){
        return $this->hasOne(UserExtra::class);
    }

    public function sendVerificationEmail(){

        Mail::send('emails.userverification',
            ['verification_code' => $this->verification_code],
            function ($message){
                $message->to($this->email)->subject("[카검사] 회원 인증 메일입니다.");
                return true;
            }
        );
    }

//    public function getFilesDirectory() {
//        $folderPath = 'user/' . $this->id;
//        if (!in_array($folderPath, Storage::disk('files')->directories())) {
//            Storage::disk('files')->makeDirectory($folderPath);
//        }
//        return $folderPath;
//    }
}
